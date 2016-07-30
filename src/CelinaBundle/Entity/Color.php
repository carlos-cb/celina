<?php

namespace CelinaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Color
 */
class Color
{
    /**
     * @var int
     */
    private $id;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString() {
        return strval($this->id);
    }
    /**
     * @var string
     */
    private $colorNameEs;

    /**
     * @var string
     */
    private $colorNameEn;

    /**
     * @var string
     */
    private $colorFoto;


    /**
     * Set colorNameEs
     *
     * @param string $colorNameEs
     * @return Color
     */
    public function setColorNameEs($colorNameEs)
    {
        $this->colorNameEs = $colorNameEs;

        return $this;
    }

    /**
     * Get colorNameEs
     *
     * @return string 
     */
    public function getColorNameEs()
    {
        return $this->colorNameEs;
    }

    /**
     * Set colorNameEn
     *
     * @param string $colorNameEn
     * @return Color
     */
    public function setColorNameEn($colorNameEn)
    {
        $this->colorNameEn = $colorNameEn;

        return $this;
    }

    /**
     * Get colorNameEn
     *
     * @return string 
     */
    public function getColorNameEn()
    {
        return $this->colorNameEn;
    }

    /**
     * Set colorFoto
     *
     * @param string $colorFoto
     * @return Color
     */
    public function setColorFoto($colorFoto)
    {
        if(!empty($colorFoto)) {
            $this->colorFoto = $colorFoto;
        }
        
        return $this;
    }

    /**
     * Get colorFoto
     *
     * @return string 
     */
    public function getColorFoto()
    {
        return $this->colorFoto;
    }
    /**
     * @var \CelinaBundle\Entity\Product
     */
    private $product;


    /**
     * Set product
     *
     * @param \CelinaBundle\Entity\Product $product
     * @return Color
     */
    public function setProduct(\CelinaBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \CelinaBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }
}
