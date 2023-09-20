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
class Rune
{
    /**
     * @MongoDB\Id(strategy="NONE", type="string")
     */
    private $id;

    /**
     * @MongoDB\Field(type="int")
     */
    private $idRune;

    /**
     * @MongoDB\Field(type="string")
     */
    private $key;

    /**
     * @MongoDB\Field(type="string")
     */
    private $icon;

    /**
     * @MongoDB\Field(type="string")
     */
    private $name;

    /**
     * @MongoDB\Field(type="hash")
     */
    private $slots;

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

        public function getIdRune(): ?int
        {
            return $this->idRune;
        }
    
        public function setIdRune(int $idRune): self
        {
            $this->idRune = $idRune;
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

        public function getIcon(): ?string
        {
            return $this->icon;
        }
    
        public function setIcon(string $icon): self
        {
            $this->icon = $icon;
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

        public function getSlots(): ?array
        {
            return $this->slots;
        }
    
        public function setSlots(array $slots): self
        {
            $this->slots = $slots;
            return $this;
        }
}
