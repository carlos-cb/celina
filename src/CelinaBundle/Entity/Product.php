<?php

namespace CelinaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 */
class Product
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $productNameEs;

    /**
     * @var string
     */
    private $productNameEn;

    /**
     * @var float
     */
    private $price;

    /**
     * @var string
     */
    private $codigo;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $foto;


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
     * Set productNameEs
     *
     * @param string $productNameEs
     * @return Product
     */
    public function setProductNameEs($productNameEs)
    {
        $this->productNameEs = $productNameEs;

        return $this;
    }

    /**
     * Get productNameEs
     *
     * @return string 
     */
    public function getProductNameEs()
    {
        return $this->productNameEs;
    }

    /**
     * Set productNameEn
     *
     * @param string $productNameEn
     * @return Product
     */
    public function setProductNameEn($productNameEn)
    {
        $this->productNameEn = $productNameEn;

        return $this;
    }

    /**
     * Get productNameEn
     *
     * @return string 
     */
    public function getProductNameEn()
    {
        return $this->productNameEn;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return Product
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set foto
     *
     * @param string $foto
     * @return Product
     */
    public function setFoto($foto)
    {
        if(!empty($foto)){
            $this->foto = $foto;
        }
        return $this;
    }

    /**
     * Get foto
     *
     * @return string 
     */
    public function getFoto()
    {
        return $this->foto;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $colors;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->colors = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add colors
     *
     * @param \CelinaBundle\Entity\Color $colors
     * @return Product
     */
    public function addColor(\CelinaBundle\Entity\Color $colors)
    {
        $this->colors[] = $colors;

        return $this;
    }

    /**
     * Remove colors
     *
     * @param \CelinaBundle\Entity\Color $colors
     */
    public function removeColor(\CelinaBundle\Entity\Color $colors)
    {
        $this->colors->removeElement($colors);
    }

    /**
     * Get colors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getColors()
    {
        return $this->colors;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $fotodetalles;


    /**
     * Add fotodetalles
     *
     * @param \CelinaBundle\Entity\Fotodetalle $fotodetalles
     * @return Product
     */
    public function addFotodetalle(\CelinaBundle\Entity\Fotodetalle $fotodetalles)
    {
        $this->fotodetalles[] = $fotodetalles;

        return $this;
    }

    /**
     * Remove fotodetalles
     *
     * @param \CelinaBundle\Entity\Fotodetalle $fotodetalles
     */
    public function removeFotodetalle(\CelinaBundle\Entity\Fotodetalle $fotodetalles)
    {
        $this->fotodetalles->removeElement($fotodetalles);
    }

    /**
     * Get fotodetalles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFotodetalles()
    {
        return $this->fotodetalles;
    }
    /**
     * @var \CelinaBundle\Entity\Category
     */
    private $category;

    /**
     * Set category
     *
     * @param \CelinaBundle\Entity\Category $category
     * @return Product
     */
    public function setCategory(\CelinaBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \CelinaBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Get category
     *
     * @return \CelinaBundle\Entity\Category
     */
    public function getCategoryName()
    {
        return $this->category->getCategoryNameEs();
    }

    public function __toString() {
        return strval($this->id);
    }
    /**
     * @var array
     */
    private $size;


    /**
     * Set size
     *
     * @param array $size
     * @return Product
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return array 
     */
    public function getSize()
    {
        return $this->size;
    }
}
