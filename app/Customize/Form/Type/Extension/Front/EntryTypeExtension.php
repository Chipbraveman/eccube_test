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
                '売掛のお客様' => '売掛のお客様',
                '現金会員（プランツクラブ）のお客様' => '現金会員（プランツクラブ）のお客様',
                '新規' => '新規',
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
                '大田店' => '大田店',
                '世田谷店' => '世田谷店',
                '横浜店' => '横浜店',
                '大阪店' => '大阪店',
                '名古屋松原店' => '名古屋松原店',
                '名古屋名港店' => '名古屋名港店',
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
