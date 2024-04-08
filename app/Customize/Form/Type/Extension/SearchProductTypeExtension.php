<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Customize\Form\Type\Extension;

use Eccube\Repository\CategoryRepository;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Eccube\Form\Type\SearchProductType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Eccube\Entity\Tag;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SearchProductTypeExtension extends AbstractTypeExtension
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * SearchProductType constructor.
     *
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
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
        $builder->add('tag', EntityType::class, [
                'class' => Tag::class,
                'required' => false,
                'choice_label' => 'name',
                'expanded' => true,
                'multiple' => true,
                'placeholder' => false,
                'constraints' => [
                ],
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return SearchProductType::class;
    }

    /**
     * Return the class of the type being extended.
     */
    public static function getExtendedTypes(): iterable
    {
        return [SearchProductType::class];
    }
}
