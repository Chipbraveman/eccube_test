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
     * @ORM\Column(name="category", type="string", nullable=true)
     */
    private $category;

    /**
     * @return string|null
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string|null $category
     * @return CustomerTrait
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

      /**
     * @var string|null
     *
     * @ORM\Column(name="partner", type="string", nullable=true)
     */
    private $partner;

    /**
     * @return string|null
     */
    public function getPartner()
    {
        return $this->partner;
    }

    /**
     * @param string|null $category
     * @return CustomerTrait
     */
    public function setpartner($partner)
    {
        $this->partner = $partner;
        return $this;
    }
}
