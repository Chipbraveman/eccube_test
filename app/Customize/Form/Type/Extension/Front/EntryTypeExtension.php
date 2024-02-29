<?php

namespace Customize\Form\Type\Extension\Front;

use Eccube\Form\Type\Front\EntryType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class EntryTypeExtension extends AbstractTypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('category', TextType::class, [
            'required' => true,
            'constraints' => [
                new Assert\NotBlank(),
              ]
        ])
        ->add('partner', TextType::class, [
            'required' => true,
            'constraints' => [
                new Assert\NotBlank(),
              ]
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
