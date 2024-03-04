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

namespace Customize\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation\EntityExtension;


/**
 * @EntityExtension("Eccube\Entity\Customer")
 */
trait CustomerTrait {

    /**
     * @var string|null
     *
     * @ORM\Column(name="transaction", type="string", nullable=true)
     */
    private $transaction;

     /**    
     * @var string|null
     *
     * @ORM\Column(name="customer_code01", type="string", length=255)
     */
    private $customer_code01;
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="customer_code02", type="string", length=255)
     */
    private $customer_code02;

    /**
     * @var string|null
     *
     * @ORM\Column(name="store", type="string", length=255)
     */
    private $store;

     /**
     * @var string|null
     *
     * @ORM\Column(name="company_kana", type="string", length=255)
     */
    private $company_kana;
    
    //transaction
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * @param string|null $transaction
     * @return CustomerTrait
     */
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;
        return $this;
    }

    //customer_code01
    public function getCustomerCode01()
    {
        return $this->customer_code01;
    }

    /**
     * @param string|null $customer_code01
     * @return CustomerTrait
     */
    public function setCustomerCode01($customer_code01)
    {
        $this->customer_code01 = $customer_code01;
        return $this;
    }

    //customer_code02
    public function getCustomerCode02()
    {
        return $this->customer_code02;
    }

    /**
     * @param string|null $customer_code02
     * @return CustomerTrait
     */
    public function setCustomerCode02($customer_code02)
    {
        $this->customer_code02 = $customer_code02;
        return $this;
    }

     //store
     public function getStore()
     {
         return $this->store;
     }
 
     /**
      * @param string|null $store
      * @return CustomerTrait
      */
     public function setStore($store)
     {
         $this->store = $store;
         return $this;
     }

     //Company_kana
     public function getCompanyKana()
     {
         return $this->company_kana;
     }
 
     /**
      * @param string|null $company_kana
      * @return CustomerTrait
      */
     public function setCompanyKana($company_kana)
     {
         $this->company_kana = $company_kana;
         return $this;
     }

}
