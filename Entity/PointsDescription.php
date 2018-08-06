<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
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

   /** @ORM\Column(type="string") 
   */
    private $lang_code;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Point", inversedBy="description")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fkPoint;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    public function getId()
    {
        return $this->id;
    }

    public function getLangCode(): ?string
    {
        return $this->lang_code;
    }

    public function setLangCode(string $lang_code): self
    {
        $this->lang_code = $lang_code;

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
