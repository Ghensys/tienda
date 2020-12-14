<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Articulo;
use App\Entity\Carrito;
use App\Form\ArticuloType;
use App\Form\CarritoType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;


class ArticuloController extends AbstractController
{
    /**
     * @Route("/articulo", name="articulo")
     */
    public function index(Request $request, SluggerInterface $slugger): Response
    {
        $articulo = new Articulo();
        $form = $this->createForm(ArticuloType::class, $articulo);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('image_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    throw new Exception;
                }

                $articulo->setImage($newFilename);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($articulo);
            $em->flush();
            $this->addFlash('success', "Registro Exitoso"); 

            return $this->redirectToRoute('articulo');
        }

        return $this->render('articulo/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/", name="articuloList")
     */
    public function list()
    {
        $em = $this->getDoctrine()->getManager();
        $articulos = $em->getRepository('App\Entity\Articulo')->findAll();

        return $this->render('articulo/list.html.twig', [
            'articulos' => $articulos
        ]);
    }

    /**
     * @Route("/articulo/{id}", name="ArticuloShow")
     */
    public function show(string $id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $articulo = $em->getRepository('App\Entity\Articulo')->findBy(['id'=> $id]);
        $tallas = $em->getRepository('App\Entity\Talla')->findAll();

        $compra = new Carrito();
        $form = $this->createForm(CarritoType::class, $compra);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $compra->setArticulo($articulo[0]);
            $compra->setPrecioUnitario($articulo[0]->getPrecioUnitario());
            $em = $this->getDoctrine()->getManager();
            $em->persist($compra);
            $em->flush();
            $this->addFlash('success', "Compra Exitoso"); 

            return $this->redirectToRoute('carrito');
        }
       
        return $this->render('articulo/show.html.twig', [
            'articulo' => $articulo,
            'tallas' => $tallas,
            'form' => $form->createView()
        ]);

    }
}
