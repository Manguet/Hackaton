<?php

namespace App\Controller;

use App\Entity\Badge;
use App\Entity\Quizz;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/answer", name="answer_")
 */
class AnswerController extends AbstractController
{
    /**
     * @Route("", name="index", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $answer1 = $request->request->get('answer1');
        $answer2 = $request->request->get('answer2');
        $answer3 = $request->request->get('answer3');
        $answer4 = $request->request->get('answer4');
        $answer5 = $request->request->get('answer5');

        if ($answer1 === 'good' && $answer2 === 'good' && $answer3 === 'good' && $answer4 === 'good' && $answer5 === 'good') {
            $quizzB = $this->getDoctrine()
                ->getRepository(Quizz::class)
                ->findOneBy([
                    'name' => 'Terre partie 2',
                ]);

            $questions = $quizzB->getQuestions();

            return $this->render('answer/terre.html.twig', [
                'quizz_b'   => $quizzB,
                'questions' => $questions
            ]);
        } else {
            return $this ->render('answer/fail.html.twig');
        }
    }

    /**
     * @Route("/lastAnswer", name="second", methods={"GET","POST"})
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function second(Request $request, EntityManagerInterface $entityManager)
    {
        $answer1 = $request->request->get('answer1');
        $answer2 = $request->request->get('answer2');
        $answer3 = $request->request->get('answer3');
        $answer4 = $request->request->get('answer4');
        $answer5 = $request->request->get('answer5');

        if ($answer1 === 'good' && $answer2 === 'good' && $answer3 === 'good' && $answer4 === 'good' && $answer5 === 'good') {
            $badge = $this->getDoctrine()
                ->getRepository(Badge::class)
                ->findOneBy(['name' => 'Décollage']);

            $user = $this->getUser();
            $userBadges = $user->addBadge($badge);
            $entityManager->persist($userBadges);
            $entityManager->flush();

            return $this->render('answer/success.html.twig');
        } else {
            return $this ->render('answer/fail.html.twig');
        }
    }
}
