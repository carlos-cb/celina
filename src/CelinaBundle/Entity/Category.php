<?php

namespace CelinaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 */
class Category
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $categoryNameEs;

    /**
     * @var string
     */
    private $categoryNameEn;

    /**
     * @var string
     */
    private $description;


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
     * Set categoryNameEs
     *
     * @param string $categoryNameEs
     * @return Category
     */
    public function setCategoryNameEs($categoryNameEs)
    {
        $this->categoryNameEs = $categoryNameEs;

        return $this;
    }

    /**
     * Get categoryNameEs
     *
     * @return string 
     */
    public function getCategoryNameEs()
    {
        return $this->categoryNameEs;
    }

    /**
     * Set categoryNameEn
     *
     * @param string $categoryNameEn
     * @return Category
     */
    public function setCategoryNameEn($categoryNameEn)
    {
        $this->categoryNameEn = $categoryNameEn;

        return $this;
    }

    /**
     * Get categoryNameEn
     *
     * @return string 
     */
    public function getCategoryNameEn()
    {
        return $this->categoryNameEn;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Category
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

    /**
     * Add products
     *
     * @param \CelinaBundle\Entity\Product $products
     * @return Category
     */
    public function addProduct(\CelinaBundle\Entity\Product $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \CelinaBundle\Entity\Product $products
     */
    public function removeProduct(\CelinaBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }
    
    public function __toString() {
        return strval($this->id);
    }
}
