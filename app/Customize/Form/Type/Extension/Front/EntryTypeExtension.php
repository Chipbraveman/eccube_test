<?php

namespace Customize\Form\Type\Extension\Front;

use Eccube\Form\Type\Front\EntryType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints as Assert;
use Customize\Form\Type\Extension\Front\CustomerCodeType;

class EntryTypeExtension extends AbstractTypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('transaction', ChoiceType::class, [
            'required' => true,
            'constraints' => [
                new Assert\NotBlank(),
            ],
            'choices'  => [
                '売掛のお客様' => 'accounts',
                '現金会員（プランツクラブ）のお客様' => 'cash',
                '新規' => 'new',
            ],
            'expanded' => true,
            'multiple' => false,
        ])
        ->add('store', ChoiceType::class, [
            'required' => true,
            'constraints' => [
                new Assert\NotBlank(),
            ],
            'choices'  => [
                '大田店' => 'ota',
                '世田谷店' => 'setagaya',
                '横浜店' => 'yokohama',
                '大阪店' => 'osaka',
                '名古屋松原店' => 'matsubara',
                '名古屋名港店' => 'meiko',
            ],
            'expanded' => true,
            'multiple' => false,
        ])
        ->add('company_kana', TextType::class, [
            'required' => false,
            ])
        ->add('code', CustomerCodeType::class, [
            'required' => false,
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return EntryType::class;
    }
    
    /**
     * {@inheritdoc}
     */
    public static function getExtendedTypes(): iterable
    {
        yield EntryType::class;
    }
}
