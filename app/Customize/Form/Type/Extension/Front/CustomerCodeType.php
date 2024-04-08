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

namespace Customize\Form\Type\Extension\Front;


use Eccube\Common\EccubeConfig;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class CustomerCodeType extends AbstractType
{
    /**
     * @var EccubeConfig
     */
    protected $eccubeConfig;

    /**
     * CustomerCodeType constructor.
     *
     * @param EccubeConfig $eccubeConfig
     */
    public function __construct(
        EccubeConfig $eccubeConfig
    ) {
        $this->eccubeConfig = $eccubeConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $options['lastcode_options']['required'] = $options['required'];
        $options['firstcode_options']['required'] = $options['required'];

        // required の場合は NotBlank も追加する
        if ($options['required']) {
            $options['lastcode_options']['constraints'] = array_merge([
                new Assert\NotBlank(),
            ], $options['lastcode_options']['constraints']);

            $options['firstcode_options']['constraints'] = array_merge([
                new Assert\NotBlank(),
            ], $options['firstcode_options']['constraints']);
        }

        if (!isset($options['options']['error_bubbling'])) {
            $options['options']['error_bubbling'] = $options['error_bubbling'];
        }

        if (empty($options['lastcode_name'])) {
            $options['lastcode_name'] = $builder->getName().'02';
        }
        if (empty($options['firstcode_name'])) {
            $options['firstcode_name'] = $builder->getName().'01';
        }

        $builder
            ->add($options['lastcode_name'], TextType::class, array_merge_recursive($options['options'], $options['lastcode_options']))
            ->add($options['firstcode_name'], TextType::class, array_merge_recursive($options['options'], $options['firstcode_options']))
        ;

        $builder->setAttribute('lastcode_name', $options['lastcode_name']);
        $builder->setAttribute('firstcode_name', $options['firstcode_name']);
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $builder = $form->getConfig();
        $view->vars['lastcode_name'] = $builder->getAttribute('lastcode_name');
        $view->vars['firstcode_name'] = $builder->getAttribute('firstcode_name');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'options' => [],
            'lastcode_options' => [
                'attr' => [
                    'placeholder' => '2桁',
                ],
                'constraints' => [
                    new Assert\Length([
                        'max' => $this->eccubeConfig['eccube_code02_len'],
                    ]),
                ],
            ],
            'firstcode_options' => [
                'attr' => [
                    'placeholder' => '4桁',
                ],
                'constraints' => [
                    new Assert\Length([
                        'max' => $this->eccubeConfig['eccube_code01_len'],
                    ]),
                ],
            ],
            'lastcode_name' => '',
            'firstcode_name' => '',
            'error_bubbling' => false,
            'inherit_data' => true,
            'trim' => true,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'code';
    }
}
