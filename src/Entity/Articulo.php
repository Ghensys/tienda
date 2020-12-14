<?php

namespace App\Entity;

use App\Repository\ArticuloRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticuloRepository::class)
 */
class Articulo
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
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=Carrito::class, mappedBy="articulo")
     */
    private $carritos;

    /**
     * @ORM\ManyToOne(targetEntity=Color::class, inversedBy="articulos")
     */
    private $color;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $precio_unitario;

    public function __construct()
    {
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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

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
            $carrito->setArticulo($this);
        }

        return $this;
    }

    public function removeCarrito(Carrito $carrito): self
    {
        if ($this->carritos->removeElement($carrito)) {
            // set the owning side to null (unless already changed)
            if ($carrito->getArticulo() === $this) {
                $carrito->setArticulo(null);
            }
        }

        return $this;
    }

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getPrecioUnitario(): ?float
    {
        return $this->precio_unitario;
    }

    public function setPrecioUnitario(?float $precio_unitario): self
    {
        $this->precio_unitario = $precio_unitario;

        return $this;
    }
}
