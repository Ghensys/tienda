<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Inventario;
use App\Form\InventarioType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;


class InventarioController extends AbstractController
{
    /**
     * @Route("/inventario", name="inventario")
     */
    public function index(Request $request, SluggerInterface $slugger): Response
    {
        $inventario = new Inventario();
        $form = $this->createForm(InventarioType::class, $inventario);
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

                $inventario->setImage($newFilename);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($inventario);
            $em->flush();
            $this->addFlash('success', "Registro Exitoso"); 

            return $this->redirectToRoute('inventario');
        }

        return $this->render('inventario/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
