<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Point", inversedBy="name")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fk_point;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"point_read","point_write","points_read_simple"})
     */
    private $nametext;

    /**
     * @ORM\Column(type="string", length=10)
     * @Groups({"point_read","point_write"})
     */
    private $langCode;

    public function getId()
    {
        return $this->id;
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

    public function getNametext(): ?string
    {
        return $this->nametext;
    }

    public function setNametext($nametext): ?self
    {
        $this->nametext = $nametext;

        return $this;
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
}
