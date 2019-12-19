<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/answer", name="answer_")
 */
class AnswerController extends AbstractController
{
    /**
     * @Route("", name="index", methods={"GET","POST"})
     */
    public function index(Request $request)
    {
        $data = $request;
        dd($data);
        return $this->render('answer/index.html.twig', [
            'controller_name' => 'AnswerController',
        ]);
    }
}
