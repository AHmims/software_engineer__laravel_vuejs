<?php

namespace App\Dto;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use JsonSerializable;
use Symfony\Component\VarDumper\VarDumper;

class ProductDto implements JsonSerializable
{
    #region Fields declaration
    private int $id;
    private string $name;
    private string $description;
    private $price;
    private string $image;
    private Collection $categories;
    #endregion
    //
    /**
     * * Class constructor
     * @param string $name
     * @param string $description
     * @param double $price
     * @param string $image
     * @param array $categories
     * @param int $id;
     */
    public function __construct(string $name, string $description, $price, string $image, Collection $categories, int $id = -1)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->categories = $categories;
    }

    //
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

    /**
     * Method to check if the Product data provided by the user is valid
     */
    public function validate(): bool
    {
        $validator = Validator::make(get_object_vars($this), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|url',
            'categories' => 'required|array'
        ]);

        // if valid
        if (!$validator->fails()) {
            //check if price is sup than 0
            if ($this->price <= 0)
                return false;
            //check if categories array is only filled with integers
            foreach ($this->categories as $category) {
                if (is_string($category))
                    return false;
            }
        }
        //
        return true;
    }

    //

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

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
     * 
     * @return Illuminate\Support\Collection
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    /**
     * Set the value of categories
     * 
     * @param Collection $categories
     */
    public function setCategories(Collection $categories): void
    {
        $this->categories = $categories;
    }
}
