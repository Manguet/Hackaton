<?php

namespace App\Controller;

use App\Entity\Multimedia;
use App\Form\MultimediaType;
use App\Repository\MultimediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/multimedia")
 */
class MultimediaController extends AbstractController
{
    /**
     * @Route("/", name="multimedia_index", methods={"GET"})
     */
    public function index(MultimediaRepository $multimediaRepository): Response
    {
        return $this->render('multimedia/index.html.twig', [
            'multimedia' => $multimediaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="multimedia_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $multimedia = new Multimedia();
        $form = $this->createForm(MultimediaType::class, $multimedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($multimedia);
            $entityManager->flush();

            return $this->redirectToRoute('multimedia_index');
        }

        return $this->render('multimedia/new.html.twig', [
            'multimedia' => $multimedia,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="multimedia_show", methods={"GET"})
     */
    public function show(Multimedia $multimedia): Response
    {
        return $this->render('multimedia/show.html.twig', [
            'multimedia' => $multimedia,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="multimedia_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Multimedia $multimedia): Response
    {
        $form = $this->createForm(MultimediaType::class, $multimedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('multimedia_index');
        }

        return $this->render('multimedia/edit.html.twig', [
            'multimedia' => $multimedia,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="multimedia_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Multimedia $multimedia): Response
    {
        if ($this->isCsrfTokenValid('delete'.$multimedia->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($multimedia);
            $entityManager->flush();
        }

        return $this->redirectToRoute('multimedia_index');
    }
}
