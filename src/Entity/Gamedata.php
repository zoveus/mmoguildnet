<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Gamedata
 *
 * @ORM\Table(name="gamedata", indexes={@ORM\Index(name="name", columns={"id", "name"})})
 * @ORM\Entity
 */
class Gamedata
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="game_id", type="integer", nullable=true)
     */
    private $gameId = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="datatype_id", type="integer", nullable=true)
     */
    private $datatypeId = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=16777215, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tooltip", type="text", length=16777215, nullable=true)
     */
    private $tooltip;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Datavalue", mappedBy="gamedata")
     */
    private $datavalues;

    public function __construct()
    {
        $this->datavalues = new ArrayCollection();
    }

    /**
     * @return Collection|Datavalue[]
     */
    public function getDatavalues(): Collection
    {
        return $this->datavalues;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGameId(): ?int
    {
        return $this->gameId;
    }

    public function setGameId(?int $gameId): self
    {
        $this->gameId = $gameId;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

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

    public function getTooltip(): ?string
    {
        return $this->tooltip;
    }

    public function setTooltip(?string $tooltip): self
    {
        $this->tooltip = $tooltip;

        return $this;
    }
}
