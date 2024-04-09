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
     * store_name.
     *
     * dtb_Product.store_name
     *
     * @var string|null
     * @ORM\Column(name="store_name", type="text", nullable=true)
     */
    private $store_name;

    //store_name
    public function getStoreName()
    {
        $name = explode(',', $this->store_name);
        return $name;
    }

    /**
     * @param string|null $store_name
     * @return ProductTrait
     */
    public function setStoreName($store_name)
    {
        if(is_string($store_name)){
            $this->store_name = $store_name;
        }
        else {
            $name = implode(',', $store_name);
            $this->store_name = $name;
        }
        return $this;
    }
}