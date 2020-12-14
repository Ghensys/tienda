<?php

namespace App\Entity;

use App\Repository\ColorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ColorRepository::class)
 */
class Color
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity=Inventario::class, mappedBy="color")
     */
    private $inventarios;

    /**
     * @ORM\OneToMany(targetEntity=Articulo::class, mappedBy="color")
     */
    private $articulos;

    public function __construct()
    {
        $this->articulos = new ArrayCollection();
        $this->inventarios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection|Inventario[]
     */
    public function getInventarios(): Collection
    {
        return $this->inventarios;
    }

    public function addInventario(Inventario $inventario): self
    {
        if (!$this->inventarios->contains($inventario)) {
            $this->inventarios[] = $inventario;
            $inventario->setColor($this);
        }

        return $this;
    }

    public function removeInventario(Inventario $inventario): self
    {
        if ($this->inventarios->removeElement($inventario)) {
            // set the owning side to null (unless already changed)
            if ($inventario->getColor() === $this) {
                $inventario->setColor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Articulo[]
     */
    public function getArticulos(): Collection
    {
        return $this->articulos;
    }

    public function addArticulo(Articulo $articulo): self
    {
        if (!$this->articulos->contains($articulo)) {
            $this->articulos[] = $articulo;
            $articulo->setColor($this);
        }

        return $this;
    }

    public function removeArticulo(Articulo $articulo): self
    {
        if ($this->articulos->removeElement($articulo)) {
            // set the owning side to null (unless already changed)
            if ($articulo->getColor() === $this) {
                $articulo->setColor(null);
            }
        }

        return $this;
    }
}
