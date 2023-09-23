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
class Champion
{
    /**
     * @MongoDB\Id(strategy="NONE", type="string")
     */
    private $id;

    /**
     * @MongoDB\Field(type="string")
     */
    private $idChamp;

    /**
     * @MongoDB\Field(type="string")
     */
    private $key;

    /**
     * @MongoDB\Field(type="string")
     */
    private $name;

    /**
     * @MongoDB\Field(type="string")
     */
    private $title;

    /**
     * @MongoDB\Field(type="string")
     */
    private $image;

    /**
     * @MongoDB\Field(type="hash")
     */
    private $skins = [];

    /**
     * @MongoDB\Field(type="string")
     */
    private $lore;

    /**
     * @MongoDB\Field(type="string")
     */
    private $blurb;

    /**
     * @MongoDB\Field(type="hash")
     */
    private $tags = [];

    /**
     * @MongoDB\Field(type="string")
     */
    private $partype;
    
    /**
     * @MongoDB\Field(type="hash")
     */
    private $spells = [];

    /**
     * @MongoDB\Field(type="hash")
     */
    private $passive = [];

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

    public function getIdChamp(): ?string
    {
        return $this->idChamp;
    }

    public function setIdChamp(string $idChamp): self
    {
        $this->idChamp = $idChamp;
        return $this;
    }

    public function getKey(): ?string
    {
        return $this->key;
    }

    public function setKey(string $key): self
    {
        $this->key = $key;
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function getSkins(): array
    {
        return $this->skins;
    }

    public function setSkins(array $skins): self
    {
        $this->skins = $skins;
        return $this;
    }

    public function getLore(): ?string
    {
        return $this->lore;
    }

    public function setLore(string $lore): self
    {
        $this->lore = $lore;
        return $this;
    }

    public function getBlurb(): ?string
    {
        return $this->blurb;
    }

    public function setBlurb(string $blurb): self
    {
        $this->blurb = $blurb;
        return $this;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function setTags(array $tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    public function getPartype(): ?string
    {
        return $this->partype;
    }

    public function setPartype(string $partype): self
    {
        $this->partype = $partype;
        return $this;
    }

    public function getSpells(): array
    {
        return $this->spells;
    }

    public function setSpells(array $spells): self
    {
        $this->spells = $spells;
        return $this;
    }

    public function getPassive(): array
    {
        return $this->passive;
    }

    public function setPassive(array $passive): self
    {
        $this->passive = $passive;
        return $this;
    }
}