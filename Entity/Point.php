<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PointRepository")
 */
class Point
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Point", mappedBy="parent")
     */
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Point", inversedBy="children")
    
     */
    private $parent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $coordinates;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image_url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PointsName", mappedBy="fk_point", orphanRemoval=true)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PointsDescription", mappedBy="fkPoint", orphanRemoval=true)
     */
    private $description;

   
    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->name = new ArrayCollection();
        $this->description = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Collection|Point[]
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChild(Point $child): self
    {
        if (!$this->children->contains($child)) {
            $this->children[] = $child;
            $child->setParent($this);
        }

        return $this;
    }

    public function removeChild(Point $child): self
    {
        if ($this->children->contains($child)) {
            $this->children->removeElement($child);
            // set the owning side to null (unless already changed)
            if ($child->getParent() === $this) {
                $child->setParent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Point[]
     */
    public function getParent()
    {
        return $this->parent;
    }

    public function addParent(Point $parent): self
    {
        if (!$this->parent->contains($parent)) {
            $this->parent[] = $parent;
            $parent->setParentId($this);
        }

        return $this;
    }

    public function removeParent(Point $parent): self
    {
        if ($this->parent->contains($parent)) {
            $this->parent->removeElement($parent);
            // set the owning side to null (unless already changed)
            if ($parent->getParentId() === $this) {
                $parent->setParentId(null);
            }
        }

        return $this;
    }

    public function getCoordinates(): ?string
    {
        return $this->coordinates;
    }

    public function setCoordinates(string $coordinates): self
    {
        $this->coordinates = $coordinates;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->image_url;
    }

    public function setImageUrl(?string $image_url): self
    {
        $this->image_url = $image_url;

        return $this;
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

    /**
     * @return Collection|PointsName[]
     */
    public function getName(): Collection
    {
        return $this->name;
    }

    // public function addName(PointsName $name): self
    // {
    //     if (!$this->name->contains($name)) {
    //         $this->name[] = $name;
    //         $name->setPlaceo($this);
    //     }

    //     return $this;
    // }

    // public function removeName(PointsName $name): self
    // {
    //     if ($this->name->contains($name)) {
    //         $this->name->removeElement($name);
    //         // set the owning side to null (unless already changed)
    //         if ($name->getPlaceo() === $this) {
    //             $name->setPlaceo(null);
    //         }
    //     }

    //     return $this;
    // }
    

    /**
     * @return Collection|PointsDescription[]
     */
    public function getDescription(): Collection
    {
        return $this->description;
    }

    // public function addDescription(PointsDescription $description): self
    // {
    //     if (!$this->description->contains($description)) {
    //         $this->description[] = $description;
    //         $description->setDescription($this);
    //     }

    //     return $this;
    // }

    // public function removeDescription(PointsDescription $description): self
    // {
    //     if ($this->description->contains($description)) {
    //         $this->description->removeElement($description);
    //         // set the owning side to null (unless already changed)
    //         if ($description->getDescription() === $this) {
    //             $description->setDescription(null);
    //         }
    //     }

    //     return $this;
    // }


}
