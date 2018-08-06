<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
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
     */
    private $lang_code;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Point", inversedBy="name")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fk_point;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

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
