<?php

namespace App\Entity;

use App\Repository\InventarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InventarioRepository::class)
 */
class Inventario
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Articulo::class, inversedBy="inventarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Articulo;

    /**
     * @ORM\ManyToOne(targetEntity=Talla::class, inversedBy="inventarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $talla;

    /**
     * @ORM\ManyToOne(targetEntity=Color::class, inversedBy="inventarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $color;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="float")
     */
    private $precio;

    /**
     * @ORM\OneToMany(targetEntity=Carrito::class, mappedBy="inventario")
     */
    private $carritos;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cantidad;

    public function __construct()
    {
        $this->carritos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticulo(): ?Articulo
    {
        return $this->Articulo;
    }

    public function setArticulo(?Articulo $Articulo): self
    {
        $this->Articulo = $Articulo;

        return $this;
    }

    public function getTalla(): ?Talla
    {
        return $this->talla;
    }

    public function setTalla(?Talla $talla): self
    {
        $this->talla = $talla;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

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
            $carrito->setInventario($this);
        }

        return $this;
    }

    public function removeCarrito(Carrito $carrito): self
    {
        if ($this->carritos->removeElement($carrito)) {
            // set the owning side to null (unless already changed)
            if ($carrito->getInventario() === $this) {
                $carrito->setInventario(null);
            }
        }

        return $this;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(?int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }
}
