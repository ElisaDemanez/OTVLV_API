<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use  App\Exception\PointIsNotParent;
use  App\Exception\PointIsNotChild;


/**
 * @ApiResource(
 *     normalizationContext={"groups"={"point_read", "points_read_simple"}},
 *     denormalizationContext={"groups"={"point_write"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={"type": "exact"})

 * @ORM\Entity(repositoryClass="App\Repository\PointRepository")
 */
class Point
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"point_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
    * @Groups({"point_read","point_write","points_read_simple"})
     */
    private $type;

    /**
     * @ORM\Column(type="float")
     * @Groups({"point_read","point_write"})
     */
    private $latitude;

    /**
     * @ORM\Column(type="float")
     * @Groups({"point_read","point_write"})
     */
    private $longitude;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"point_read","point_write","points_read_simple"})
     */
    private $image_url;

        
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PointsName", mappedBy="fk_point", orphanRemoval=true,cascade={"persist"})
    * @Groups({"point_read","point_write"})
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PointsDescription", mappedBy="fk_point", orphanRemoval=true,cascade={"persist"})
    * @Groups({"point_read","point_write"})
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Point", mappedBy="parent", cascade={"persist"})
     * @Groups({"point_read","point_write"})
     */
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Point", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * @Groups({"point_read","point_write"})
     */
    private $parent;

    
    public function __construct()
    {
        $this->name = new ArrayCollection();
         $this->description = new ArrayCollection();
         $this->children = new ArrayCollection();
         
    }

    public function getId()
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

  
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

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


  /**
     * @return Collection|PointsName[]
     */
    public function getName(): Collection
    {
        return $this->name;
    }

    public function addName(PointsName $name): self
    {
        if (!$this->name->contains($name)) {
            $this->name[] = $name;
            $name->setFkPoint($this);

        }

        return $this;
    }

    public function removeName(PointsName $name): self
    {
        if ($this->name->contains($name)) {
            $this->name->removeElement($name);
            // set the owning side to null (unless already changed)
            if ($name->getFkPoint() === $this) {
                $name->setFkPoint(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection|PointsDescription[]
     */
    public function getDescription(): Collection
    {
        return $this->description;
    }

    public function addDescription(PointsDescription $description): self
    {
        if (!$this->description->contains($description)) {
            $this->description[] = $description;
            $description->setFkPoint($this);
        }

        return $this;
    }

    public function removeDescription(PointsDescription $description): self
    {
        if ($this->description->contains($description)) {
            $this->description->removeElement($description);
            // set the owning side to null (unless already changed)
            if ($description->getFkPoint() === $this) {
                $description->setFkPoint(null);
            }
        }

        return $this;
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
            if($this->type != "parent") {
                throw new PointIsNotParent(sprintf('The point %u you\'re trying to add children to is not of type "parent"', $this->id ));
            }
            elseif($child->type !="children") {
                throw new PointIsNotChild(sprintf('The child point you\'re trying to add is not of type "children" but of type %u',$child->type ));
            }
            else {
            $this->children[] = $child;
            $child->addParent($this);
            }
        }
        return $this;
    }

    public function removeChild(Point $child): self
    {
        if ($this->children->contains($child)) {
            $this->children->removeElement($child);
            // set the owning side to null (unless already changed)
            if ($child->getParent() === $this) {
                $child->removeParent($child->getParent());
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

    public function addParent(Point $parent): ?self
    {
        $this->parent = $parent;
        return $this;
    }

    public function removeParent(Point $parent): self
    {
       $this->parent = null ;
       return $this;
    }

  
}
