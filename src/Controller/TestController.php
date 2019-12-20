<?php

namespace App\Controller;

use App\Entity\Quizz;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/test", name="test_")
 */
class TestController extends AbstractController
{
    /**
     * @Route("/earth", name="earth", methods={"GET","POST"})
     */
    public function earth()
    {
        $quizzA = $this->getDoctrine()
            ->getRepository(Quizz::class)
            ->findOneBy([
                'name' => 'Terre partie 1',
            ]);

        $questions = $quizzA->getQuestions();

        return $this->render('test/terre.html.twig', [
            'quizz_a'   => $quizzA,
            'questions' => $questions
        ]);
    }

    /**
     * @Route("/moon", name="moon")
     */
    public function moon()
    {
        $quizzA = $this->getDoctrine()
            ->getRepository(Quizz::class)
            ->findOneBy([
                'name' => 'Lune partie 1',
            ]);

        $questions = $quizzA->getQuestions();

        return $this->render('test/moon.html.twig', [
            'quizz_a'   => $quizzA,
            'questions' => $questions
        ]);
    }

    /**
     * @Route("/mars", name="mars")
     */
    public function mars()
    {
        $quizzA = $this->getDoctrine()
            ->getRepository(Quizz::class)
            ->findOneBy([
                'name' => 'Mars partie 1',
            ]);

        $questions = $quizzA->getQuestions();

        return $this->render('test/mars.html.twig', [
            'quizz_a'   => $quizzA,
            'questions' => $questions
        ]);
    }

    /**
     * @Route("/neptune", name="neptune")
     */
    public function neptune()
    {
        $quizzA = $this->getDoctrine()
            ->getRepository(Quizz::class)
            ->findOneBy([
                'name' => 'Neptune partie 1',
            ]);

        $questions = $quizzA->getQuestions();

        return $this->render('test/neptune.html.twig', [
            'quizz_a'   => $quizzA,
            'questions' => $questions
        ]);
    }

    /**
     * @Route("/saturne", name="saturne")
     */
    public function saturne()
    {
        $quizzA = $this->getDoctrine()
            ->getRepository(Quizz::class)
            ->findOneBy([
                'name' => 'Saturne partie 1',
            ]);

        $questions = $quizzA->getQuestions();

        return $this->render('test/saturne.html.twig', [
            'quizz_a'   => $quizzA,
            'questions' => $questions
        ]);
    }

    /**
     * @Route("/venus", name="venus")
     */
    public function venus()
    {
        $quizzA = $this->getDoctrine()
            ->getRepository(Quizz::class)
            ->findOneBy([
                'name' => 'Venus partie 1',
            ]);

        $questions = $quizzA->getQuestions();

        return $this->render('test/venus.html.twig', [
            'quizz_a'   => $quizzA,
            'questions' => $questions
        ]);
    }

    /**
     * @Route("/jupiter", name="jupiter")
     */
    public function jupiter()
    {
        $quizzA = $this->getDoctrine()
            ->getRepository(Quizz::class)
            ->findOneBy([
                'name' => 'Jupiter partie 1',
            ]);

        $questions = $quizzA->getQuestions();

        return $this->render('test/jupiter.html.twig', [
            'quizz_a'   => $quizzA,
            'questions' => $questions
        ]);
    }

    /**
     * @Route("/uranus", name="uranus")
     */
    public function uranus()
    {
        $quizzA = $this->getDoctrine()
            ->getRepository(Quizz::class)
            ->findOneBy([
                'name' => 'Uranus partie 1',
            ]);

        $questions = $quizzA->getQuestions();

        return $this->render('test/uranus.html.twig', [
            'quizz_a'   => $quizzA,
            'questions' => $questions
        ]);
    }

    /**
     * @Route("/mercure", name="mercure")
     */
    public function mercure()
    {
        $quizzA = $this->getDoctrine()
            ->getRepository(Quizz::class)
            ->findOneBy([
                'name' => 'Mercure partie 1',
            ]);

        $questions = $quizzA->getQuestions();

        return $this->render('test/mercure.html.twig', [
            'quizz_a'   => $quizzA,
            'questions' => $questions
        ]);
    }

    /**
     * @Route("/sun", name="sun")
     */
    public function sun()
    {
        $quizzA = $this->getDoctrine()
            ->getRepository(Quizz::class)
            ->findOneBy([
                'name' => 'Soleil partie 1',
            ]);

        $questions = $quizzA->getQuestions();

        return $this->render('test/sun.html.twig', [
            'quizz_a'   => $quizzA,
            'questions' => $questions
        ]);
    }
}
