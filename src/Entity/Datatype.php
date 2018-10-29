<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Datatype
 *
 * @ORM\Table(name="datatype")
 * @ORM\Entity
 */
class Datatype
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255, nullable=false)
     */
    private $category = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="subcategory", type="string", length=255, nullable=false)
     */
    private $subcategory = '0';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getSubcategory(): ?string
    {
        return $this->subcategory;
    }

    public function setSubcategory(string $subcategory): self
    {
        $this->subcategory = $subcategory;

        return $this;
    }


}
