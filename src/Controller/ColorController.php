<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Color;
use App\Form\MyColorType;
use Symfony\Component\HttpFoundation\Request;

class ColorController extends AbstractController
{
    /**
     * @Route("/color", name="color")
     */
    public function index(Request $request): Response
    {
        $color = new Color();
        $form = $this->createForm(MyColorType::class, $color);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($color);
            $em->flush();
            $this->addFlash('success', "Registro Exitoso"); 

            return $this->redirectToRoute('color');
        }

        return $this->render('color/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/color/form", name="colorForm")
     */
    public function form(Request $request): Response
    {
        $color = new Color();
        $form = $this->createForm(MyColorType::class, $color);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($color);
            $em->flush();
        }
        return $this->render('color/index.html.twig', [
            'controller_name' => 'ColorController',
            'form' => $form->createView()
        ]);
    }
}
