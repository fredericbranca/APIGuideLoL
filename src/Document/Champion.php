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
        new GetCollection()
    ]
)]
class Champion
{
    /**
     * @MongoDB\Id(strategy="NONE", type="string")
     */
    protected $id;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @MongoDB\Field(type="string")
     */
    protected $idChamp;

    public function getIdChamp(): ?string
    {
        return $this->idChamp;
    }

    public function setIdChamp(string $idChamp): self
    {
        $this->idChamp = $idChamp;
        return $this;
    }

    /**
     * @MongoDB\Field(type="string")
     */
    protected $key;

    public function getKey(): ?string
    {
        return $this->key;
    }

    public function setKey(string $key): self
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @MongoDB\Field(type="string")
     */
    protected $name;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @MongoDB\Field(type="string")
     */
    protected $title;

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @MongoDB\Field(type="hash")
     */
    protected $image = [];

    public function getImage(): array
    {
        return $this->image;
    }

    public function setImage(array $image): self
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @MongoDB\Field(type="hash")
     */
    protected $skins = [];

    public function getSkins(): array
    {
        return $this->skins;
    }

    public function setSkins(array $skins): self
    {
        $this->skins = $skins;
        return $this;
    }

    /**
     * @MongoDB\Field(type="string")
     */
    protected $lore;

    public function getLore(): ?string
    {
        return $this->lore;
    }

    public function setLore(string $lore): self
    {
        $this->lore = $lore;
        return $this;
    }

    /**
     * @MongoDB\Field(type="string")
     */
    protected $blurb;

    public function getBlurb(): ?string
    {
        return $this->blurb;
    }

    public function setBlurb(string $blurb): self
    {
        $this->blurb = $blurb;
        return $this;
    }

    /**
     * @MongoDB\Field(type="hash")
     */
    protected $tags = [];

    public function getTags(): array
    {
        return $this->tags;
    }

    public function setTags(array $tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @MongoDB\Field(type="string")
     */
    protected $partype;

    public function getPartype(): ?string
    {
        return $this->partype;
    }

    public function setPartype(string $partype): self
    {
        $this->partype = $partype;
        return $this;
    }

    /**
     * @MongoDB\Field(type="hash")
     */
    protected $spells = [];

    public function getSpells(): array
    {
        return $this->spells;
    }

    public function setSpells(array $spells): self
    {
        $this->spells = $spells;
        return $this;
    }

    /**
     * @MongoDB\Field(type="hash")
     */
    protected $passive = [];

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
