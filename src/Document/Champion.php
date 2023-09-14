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

    /**
     * @MongoDB\Field(type="string")
     */
    protected $type;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $format;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $version;

    /**
     * @MongoDB\EmbedOne(targetDocument=ChampionData::class)
     */
    protected $data;

    // getters and setters
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

    /**
     * @MongoDB\Field(type="string")
     */
    protected $key;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $name;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $title;

    // getters and setters
}