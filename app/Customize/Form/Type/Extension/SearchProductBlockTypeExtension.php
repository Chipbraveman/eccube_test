<?php

namespace Customize\Form\Type\Extension;

use Eccube\Form\Type\SearchProductBlockType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Eccube\Repository\CategoryRepository;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Eccube\Entity\Tag;

/**
 * タグの検索フォームを追加
 * @see https://umebius.com/eccube/product_list_tag_search/
 */
class SearchProductBlockTypeExtension extends AbstractTypeExtension
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $Categories = $this->categoryRepository
            ->getList(null, true);

        $builder->add('category_id', EntityType::class, [
            'class' => 'Eccube\Entity\Category',
            'choice_label' => 'NameWithLevel',
            'choices' => $Categories,
            'placeholder' => 'common.select__all_products',
            'required' => false,
        ]);
        $builder->add('name', SearchType::class, [
            'required' => false,
            'label' => 'common.search_keyword',
            'attr' => [
                'maxlength' => 50,
            ],
        ]);
        $builder->add('store', ChoiceType::class, [
            'required' => false,
            'choices'  => [
                '店舗1' => 'store1',
                '店舗2' => 'store2',
                '店舗3' => 'store3',
            ],
            'expanded' => true,
            'multiple' => true,
        ]);
        $builder
             ->add(
                'tag',
                EntityType::class,
                [
                    'class' => Tag::class,
                    'required' => false,
                    'choice_label' => 'name',
                    'expanded' => true,
                    'multiple' => true,
                    'placeholder' => false,
                    'constraints' => [
                    ],
                ]
            )

        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return SearchProductBlockType::class;
    }

    /**
     * Return the class of the type being extended.
     */
    public static function getExtendedTypes(): iterable
    {
        return [SearchProductBlockType::class];
    }
}