<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PointsNameRepository")
 */
class PointsName
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
    * @Groups({"point:read","point:write"})
     */
    private $langCode;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Point", inversedBy="name")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"point:write"})
     */
    private $fk_point;

    /**
     * @ORM\Column(type="string", length=255)
    * @Groups({"point:read","point:write"})
     */
    private $name;

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
        return $this->fk_point;
    }

    public function setFkPoint(?Point $fk_point): self
    {
        $this->fk_point = $fk_point;

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
}
