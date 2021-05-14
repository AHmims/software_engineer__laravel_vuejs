<?php

namespace App\Dto;

class ProductDto
{
    #region Fields declaration
    private string $name;
    private string $description;
    private $price;
    private string $image;
    private $categories = array();
    #endregion
    //
    /**
     * * Class constructor
     * @param string $name
     * @param string $description
     * @param double $price
     * @param string $image;
     * @param int[] $categories;
     */
    public function __construct(string $name, string $description, $price, string $image, $categories)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->categories = $categories;
    }
    //


    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get the value of description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     * 
     * @param double $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * Get the value of image
     *
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * Get the value of categories
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set the value of categories
     * 
     * @param int[] $categories
     */
    public function setCategories($categories): void
    {
        $this->categories = $categories;
    }
}
