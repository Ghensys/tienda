<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Talla;
use App\Form\TallaType;
use Symfony\Component\HttpFoundation\Request;


class TallaController extends AbstractController
{
    /**
     * @Route("/talla", name="talla")
     */
    public function index(Request $request): Response
    {
        $talla = new Talla();
        $form = $this->createForm(TallaType::class, $talla);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($talla);
            $em->flush();
            $this->addFlash('success', "Registro Exitoso"); 

            return $this->redirectToRoute('talla');
        }
        
        return $this->render('talla/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}