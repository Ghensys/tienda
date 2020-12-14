<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarritoController extends AbstractController
{
    /**
     * @Route("/carrito", name="carrito")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $carrito = $em->getRepository('App\Entity\Carrito')->findOrderByTalla();

        $precio = 0;
        $total_sin_envio = 0;
        $costo_envio = 0;
        $envio_gratis = false;

        foreach($carrito as $value) {
            $precio = $value->getPrecioUnitario() * $value->getCantidad();
            $costo_envio = $costo_envio + 5;
            if($total_sin_envio === 0) {
                $total_sin_envio = $precio;
            }
            else {
                $total_sin_envio = $total_sin_envio+$precio;
            }
        }

        if($total_sin_envio > 50) {
            $envio_gratis = true;
            $costo_envio = 0;
        }

        return $this->render('carrito/index.html.twig', [
            'carrito' => $carrito,
            'total' => $total_sin_envio,
            'costo_envio' => $costo_envio,
            'envio' => $envio_gratis
        ]);
    }
}
