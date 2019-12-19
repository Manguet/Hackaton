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
        $answer1 = $request->request->get('answer1');
        $answer2 = $request->request->get('answer2');
        $answer3 = $request->request->get('answer3');
        $answer4 = $request->request->get('answer4');
        $answer5 = $request->request->get('answer5');

        if ($answer1 === 'good' && $answer2 === 'good' && $answer3 === 'good' && $answer4 === 'good' && $answer5 === 'good') {
            return $this->render('answer/index.html.twig', [
                'controller_name' => 'AnswerController',
            ]);
        } else {
            return $this ->render('answer/fail.html.twig');
        }
    }
}
