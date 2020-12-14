<?php

namespace App\Entity;

use App\Repository\TallaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TallaRepository::class)
 */
class Talla
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
     * @ORM\OneToMany(targetEntity=Inventario::class, mappedBy="talla")
     */
    private $inventarios;

    /**
     * @ORM\OneToMany(targetEntity=Carrito::class, mappedBy="talla")
     */
    private $carritos;

    public function __construct()
    {
        $this->articulos = new ArrayCollection();
        $this->inventarios = new ArrayCollection();
        $this->carritos = new ArrayCollection();
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
            $inventario->setTalla($this);
        }

        return $this;
    }

    public function removeInventario(Inventario $inventario): self
    {
        if ($this->inventarios->removeElement($inventario)) {
            // set the owning side to null (unless already changed)
            if ($inventario->getTalla() === $this) {
                $inventario->setTalla(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Carrito[]
     */
    public function getCarritos(): Collection
    {
        return $this->carritos;
    }

    public function addCarrito(Carrito $carrito): self
    {
        if (!$this->carritos->contains($carrito)) {
            $this->carritos[] = $carrito;
            $carrito->setTalla($this);
        }

        return $this;
    }

    public function removeCarrito(Carrito $carrito): self
    {
        if ($this->carritos->removeElement($carrito)) {
            // set the owning side to null (unless already changed)
            if ($carrito->getTalla() === $this) {
                $carrito->setTalla(null);
            }
        }

        return $this;
    }
}
