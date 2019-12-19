<?php

namespace App\Controller;

use App\Entity\UserImage;
use App\Form\UserImageType;
use App\Repository\UserImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user-image", name="user_image_")
 */
class UserImageController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(UserImageRepository $userImageRepository): Response
    {
        return $this->render('user_image/index.html.twig', [
            'user_images' => $userImageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $userImage = new UserImage();
        $form = $this->createForm(UserImageType::class, $userImage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($userImage);
            $entityManager->flush();

            return $this->redirectToRoute('user_image_index');
        }

        return $this->render('user_image/new.html.twig', [
            'user_image' => $userImage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(UserImage $userImage): Response
    {
        return $this->render('user_image/show.html.twig', [
            'user_image' => $userImage,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, UserImage $userImage): Response
    {
        $form = $this->createForm(UserImageType::class, $userImage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_image_index');
        }

        return $this->render('user_image/edit.html.twig', [
            'user_image' => $userImage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"DELETE"})
     */
    public function delete(Request $request, UserImage $userImage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$userImage->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($userImage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_image_index');
    }
}
