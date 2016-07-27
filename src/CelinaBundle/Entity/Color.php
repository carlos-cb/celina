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
     * @var string
     */
    private $colorName;

    /**
     * @var string
     */
    private $colorCodigo;


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
     * Set colorName
     *
     * @param string $colorName
     * @return Color
     */
    public function setColorName($colorName)
    {
        $this->colorName = $colorName;

        return $this;
    }

    /**
     * Get colorName
     *
     * @return string 
     */
    public function getColorName()
    {
        return $this->colorName;
    }

    /**
     * Set colorCodigo
     *
     * @param string $colorCodigo
     * @return Color
     */
    public function setColorCodigo($colorCodigo)
    {
        $this->colorCodigo = $colorCodigo;

        return $this;
    }

    /**
     * Get colorCodigo
     *
     * @return string 
     */
    public function getColorCodigo()
    {
        return $this->colorCodigo;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $products;

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
}
