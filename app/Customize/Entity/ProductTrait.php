<?php
// app/Customize/Entity/ProductTrait.php
namespace Customize\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation as Eccube;

/**
  * @Eccube\EntityExtension("Eccube\Entity\Product")
 */
trait ProductTrait
{
    /**
     * @ORM\Column(type="string", nullable=true)
     * @Eccube\FormAppend(
     *  auto_render=true,
     *  options={
     *   "required": false,
     *   "label":"メーカー"
     *  }
     * )
     */
    public $store_name;

    //transaction
    public function getStoreName()
    {
        return $this->store_name;
    }

    /**
     * @param string|null $store_name
     * @return CustomerTrait
     */
    public function setStoreName($store_name)
    {
        $this->transaction = $store_name;
        return $this;
    }
}