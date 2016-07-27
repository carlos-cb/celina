<?php

namespace CelinaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fotodetalle
 */
class Fotodetalle
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $fotodetalle;

    /**
     * @var int
     */
    private $position;


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
     * Set fotodetalle
     *
     * @param string $fotodetalle
     * @return Fotodetalle
     */
    public function setFotodetalle($fotodetalle)
    {
        if(!empty($fotodetalle)) {
            $this->fotodetalle = $fotodetalle;
        }
        return $this;
    }

    /**
     * Get fotodetalle
     *
     * @return string 
     */
    public function getFotodetalle()
    {
        return $this->fotodetalle;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Fotodetalle
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }
    /**
     * @var \CelinaBundle\Entity\Product
     */
    private $product;


    /**
     * Set product
     *
     * @param \CelinaBundle\Entity\Product $product
     * @return Fotodetalle
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
