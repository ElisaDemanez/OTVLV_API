<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
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
     * @ORM\Column(type="string", length=10)
     * @Groups({"point_read","point_write"})
     */
    private $langCode;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"point_read","point_write"})
     */
    private $descriptionText;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Point", inversedBy="description")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fk_point;

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

    public function getDescriptionText(): ?string
    {
        return $this->descriptionText;
    }

    public function setDescriptionText( $descriptionText): ?self
    {
        $this->descriptionText = $descriptionText;

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
}
