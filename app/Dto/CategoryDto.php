<?php

namespace App\Dto;

use JsonSerializable;

class CategoryDto implements JsonSerializable
{
    #region Fields declaration

    private int $id;
    private string $name;
    private int $parentId;

    #endregion

    /**
     * * Class constructor
     * @param string $name
     * @param CategoryDto $parent
     * @param int $id
     */
    public function __construct(string $name, int $parentId, int $id = -1)
    {
        $this->id = $id;
        $this->name = $name;
        $this->parentId = $parentId;
    }

    /**
     * 
     */
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

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
     * Get the value of parentId
     *
     * @return int
     */
    public function getParentId(): int
    {
        return $this->parentId;
    }

    /**
     * Set the value of parentId
     *
     * @param int $parentId

     */
    public function setParentId(int $parentId): void
    {
        $this->parentId = $parentId;
    }
}
