<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PointsDescriptionRepository")
 */
class PointsDescription
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Point", inversedBy="description")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"point:write"})
     */
    private $fkPoint;

    /** @ORM\Column(type="string") 
    * @Groups({"point:read","point:write"})
    */
     private $langCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
    * @Groups({"point:read","point:write"})
     */
    private $description;

    public function getId()
    {
        return $this->id;
    }

    public function getLangCode(): ?string
    {
        return $this->langCode;
    }

    public function setLangCode(string $langCode): self
    {
        $this->langCode = $langCode;

        return $this;
    }

    public function getFkPoint(): ?Point
    {
        return $this->fkPoint;
    }

    public function setFkPoint(?Point $fkPoint): self
    {
        $this->fkPoint = $fkPoint;

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
}
