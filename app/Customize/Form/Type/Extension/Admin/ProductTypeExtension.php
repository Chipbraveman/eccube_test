<?php

namespace Customize\Form\Type\Extension\Admin;

use Eccube\Form\Type\Admin\ProductType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductTypeExtension extends AbstractTypeExtension
{
  // どのフォームを拡張するかを宣言（EC-CUBEのバージョンによって記述方法が異なる）
  public static function getExtendedTypes(): iterable
  {
      yield ProductType::class; // ProductTypeを拡張
  }

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
      // 追加したいフィールドを記述
      // TextTypeで文字列を入力するフィールドを指定
      // 「'required' => false」で入力必須ではないことを指定
      $builder
          ->add('store_name', TextType::class, [
              'required' => false
          ]);
  }
}