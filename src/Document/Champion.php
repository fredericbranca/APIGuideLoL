<?php

namespace App\Document;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
#[ApiResource]
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

    /**
     * @MongoDB\Field(type="string")
     */
    protected $type;

    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @MongoDB\Field(type="string")
     */
    protected $format;

    public function getFormat(): ?string
    {
        return $this->format;
    }

    /**
     * @MongoDB\Field(type="string")
     */
    protected $version;

    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * @MongoDB\EmbedOne(targetDocument=ChampionData::class)
     */
    protected $data;

    public function getData(): ?ChampionData
    {
        return $this->data;
    }

    // /**
    //  * @MongoDB\EmbedOne(targetDocument=Keys::class)
    //  */
    // protected $keys;

    // public function getKeys(): ?Keys
    // {
    //     return $this->keys;
    // }
}

/** 
 * @MongoDB\EmbeddedDocument 
 */
class ChampionData
{
    /**
     * @MongoDB\Field(type="string")
     */
    protected $id;

    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @MongoDB\Field(type="string")
     */
    protected $key;

    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @MongoDB\Field(type="string")
     */
    protected $name;

    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @MongoDB\Field(type="string")
     */
    protected $title;

    public function getTitle(): ?string
    {
        return $this->title;
    }

    // getters and setters
}