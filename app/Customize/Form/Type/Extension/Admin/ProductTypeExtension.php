<?php

namespace Customize\Form\Type\Extension\Admin;

use Eccube\Form\Type\Admin\ProductType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class ProductTypeExtension extends AbstractTypeExtension
{
     /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('store_name', ChoiceType::class, [
                'required' => false,
                'choices'  => [
                    '店舗1' => 'store1',
                    '店舗2' => 'store2',
                    '店舗3' => 'store3',
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                ],
                'expanded' => true,
                'multiple' => true,
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return ProductType::class;
    }

    /**
     * {@inheritdoc}
     */
    public static function getExtendedTypes(): iterable
    {
        yield ProductType::class; // ProductTypeを拡張
    }
}