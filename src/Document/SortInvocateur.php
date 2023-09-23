<?php

namespace App\Document;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\GraphQl\Query;
use ApiPlatform\Metadata\GraphQl\QueryCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
#[ApiResource(
    graphQlOperations: [
        new Query(),
        new QueryCollection()
    ],
    operations: [
        new Get(),
        new GetCollection(),
    ]
)]
class SortInvocateur
{
    /**
     * @MongoDB\Id(strategy="NONE", type="string")
     */
    private $id;

    /**
     * @MongoDB\Field(type="string")
     */
    private $idSort;

    /**
     * @MongoDB\Field(type="string")
     */
    private $name;

    /**
     * @MongoDB\Field(type="string")
     */
    private $description;

    /**
     * @MongoDB\Field(type="string")
     */
    private $cooldown;

    /**
     * @MongoDB\Field(type="hash")
     */
    private $modes;

    /**
     * @MongoDB\Field(type="string")
     */
    private $range;

    /**
     * @MongoDB\Field(type="string")
     */
    private $image;

    // GETTER & SETTER

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getIdSort(): ?string
    {
        return $this->idSort;
    }

    public function setIdSort(string $idSort): self
    {
        $this->idSort = $idSort;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getCooldown(): ?string
    {
        return $this->cooldown;
    }

    public function setCooldown(string $cooldown): self
    {
        $this->cooldown = $cooldown;
        return $this;
    }

    public function getModes(): ?array
    {
        return $this->modes;
    }

    public function setModes(array $modes): self
    {
        $this->modes = $modes;
        return $this;
    }

    public function getRange(): ?string
    {
        return $this->range;
    }

    public function setRange(string $range): self
    {
        $this->range = $range;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;
        return $this;
    }
}
