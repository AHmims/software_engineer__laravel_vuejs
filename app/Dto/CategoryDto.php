<?php

namespace App\Dto;

class CategoryDto
{
    #region Fields declaration
    private int $id;
    private string $name;
    private ?CategoryDto $parent;
    #endregion
    //
    /**
     * * Class constructor
     * @param string $name
     * @param CategoryDto $parent
     * @param int $id
     */
    public function __construct(string $name, ?CategoryDto $parent, int $id = -1)
    {
        $this->id = $id;
        $this->name = $name;
        $this->parent = $parent;
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
     * Get the value of parent
     *
     * @return CategoryDto
     */
    public function getParent(): CategoryDto
    {
        return $this->parent;
    }

    /**
     * Set the value of parent
     *
     * @param CategoryDto $parent

     */
    public function setParent(CategoryDto $parent): void
    {
        $this->parent = $parent;
    }
}
