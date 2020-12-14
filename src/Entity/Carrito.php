<?php

namespace App\Entity;

use App\Repository\CarritoRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Talla;

/**
 * @ORM\Entity(repositoryClass=CarritoRepository::class)
 */
class Carrito
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Articulo::class, inversedBy="carritos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $articulo;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantidad;

    /**
     * @ORM\Column(type="float")
     */
    private $precio_unitario;

    /**
     * @ORM\ManyToOne(targetEntity=Talla::class, inversedBy="carritos")
     * @ORM\OrderBy({"id" = "ASC"})
     */
    private $talla;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticulo(): ?Articulo
    {
        return $this->articulo;
    }

    public function setArticulo(?Articulo $articulo): self
    {
        $this->articulo = $articulo;

        return $this;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getPrecioUnitario(): ?float
    {
        return $this->precio_unitario;
    }

    public function setPrecioUnitario(float $precio_unitario): self
    {
        $this->precio_unitario = $precio_unitario;

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
}
