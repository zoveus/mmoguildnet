<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Datavalue
 *
 * @ORM\Table(name="datavalue")
 * @ORM\Entity
 */
class Datavalue
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    //@ORM\Column(name="gamedata_id", type="integer", nullable=true)
    /**
     * @var int|null
     *
     * @ORM\Column(name="gamedata_id", type="integer", nullable=true)
     */
    private $gamedataId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Gamedata", inversedBy="datavalues")
     * @ORM\JoinColumn(name="gamedata_id", referencedColumnName="id")
     */
    private $gamedata;

    /**
     * @var int|null
     *
     * @ORM\Column(name="datatype_id", type="integer", nullable=true)
     */
    private $datatypeId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type = '0';

    /**
     * @var float|null
     *
     * @ORM\Column(name="value", type="float", precision=10, scale=0, nullable=true)
     */
    private $value = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description = '0';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGamedataId(): ?int
    {
        return $this->gamedataId;
    }

    public function setGamedataId(?int $gamedataId): self
    {
        $this->gamedataId = $gamedataId;

        return $this;
    }

    public function getGamedata(): ?Gamedata
    {
        return $this->gamedata;
    }

    public function setGamedata(?Gamedata $gamedata): self
    {
        $this->gamedata = $gamedata;

        return $this;
    }

    public function getDatatypeId(): ?int
    {
        return $this->datatypeId;
    }

    public function setDatatypeId(?int $datatypeId): self
    {
        $this->datatypeId = $datatypeId;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(?float $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }


}
