<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Categoria;
use App\Form\CategoriaType;
use Symfony\Component\HttpFoundation\Request;


class CategoriaController extends AbstractController
{
    /**
     * @Route("/categoria", name="categoria")
     */
    public function index(Request $request): Response
    {
        $categoria = new Categoria();
        $form = $this->createForm(CategoriaType::class, $categoria);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categoria);
            $em->flush();
            $this->addFlash('success', "Registro Exitoso"); 

            return $this->redirectToRoute('categoria');
        }

        return $this->render('categoria/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/categoria1", name="categoria1")
     */
    public function show(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $record = $em->getRepository('App\Entity\Categoria')->findAll();
        //print_r($record);exit;
        //var_dump($record);die;

        return $this->render('categoria/data.html.twig', [
            'data' => $record
        ]);
    }
}
