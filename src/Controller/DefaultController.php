<?php

namespace App\Controller;

use App\Entity\Chapter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="app_")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("", name="index")
     */
    public function index()
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("planets", name="quizz")
     */
    public function quizzHomepage()
    {
        return $this->render('systeme/index.html.twig');
    }

    /**
     * @Route("documentation", name="documentation")
     */
    public function chapters()
    {
        $chapters = $this->getDoctrine()
            ->getRepository(Chapter::class)
            ->findAll();

        return $this->render('documentation/index.html.twig', [
            'chapters' => $chapters,
            ]);
    }
}
