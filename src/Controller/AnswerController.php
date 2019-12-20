<?php

namespace App\Controller;

use App\Entity\Badge;
use App\Entity\Planet;
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

    /**
     * @Route("/moon", name="moon", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function moon(Request $request)
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
                    'name' => 'Lune partie 2',
                ]);

            $questions = $quizzB->getQuestions();

            return $this->render('answer/moon.html.twig', [
                'quizz_b'   => $quizzB,
                'questions' => $questions
            ]);
        } else {
            return $this ->render('answer/fail.html.twig');
        }
    }

    /**
     * @Route("/moonSecond", name="moon2", methods={"GET","POST"})
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function moonAgain(Request $request, EntityManagerInterface $entityManager)
    {
        $answer1 = $request->request->get('answer1');
        $answer2 = $request->request->get('answer2');
        $answer3 = $request->request->get('answer3');
        $answer4 = $request->request->get('answer4');
        $answer5 = $request->request->get('answer5');

        if ($answer1 === 'good' && $answer2 === 'good' && $answer3 === 'good' && $answer4 === 'good' && $answer5 === 'good') {
            $badge = $this->getDoctrine()
                ->getRepository(Badge::class)
                ->findOneBy(['name' => 'Appolo']);

            $user = $this->getUser();
            $userBadges = $user->addBadge($badge);
            $entityManager->persist($userBadges);

            $entityManager->flush();

            return $this->render('answer/success.html.twig');
        } else {
            return $this ->render('answer/fail.html.twig');
        }
    }

    /**
     * @Route("/mars", name="mars", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function mars(Request $request)
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
                    'name' => 'Mars partie 2',
                ]);

            $questions = $quizzB->getQuestions();

            return $this->render('answer/mars.html.twig', [
                'quizz_b'   => $quizzB,
                'questions' => $questions
            ]);
        } else {
            return $this ->render('answer/fail.html.twig');
        }
    }

    /**
     * @Route("/marsSecond", name="mars2", methods={"GET","POST"})
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function marsAgain(Request $request, EntityManagerInterface $entityManager)
    {
        $answer1 = $request->request->get('answer1');
        $answer2 = $request->request->get('answer2');
        $answer3 = $request->request->get('answer3');
        $answer4 = $request->request->get('answer4');
        $answer5 = $request->request->get('answer5');

        if ($answer1 === 'good' && $answer2 === 'good' && $answer3 === 'good' && $answer4 === 'good' && $answer5 === 'good') {
            $badge = $this->getDoctrine()
                ->getRepository(Badge::class)
                ->findOneBy(['name' => 'Mars Rover']);

            $user = $this->getUser();
            $userBadges = $user->addBadge($badge);
            $entityManager->persist($userBadges);

            $entityManager->flush();

            return $this->render('answer/success.html.twig');
        } else {
            return $this ->render('answer/fail.html.twig');
        }
    }

    /**
     * @Route("/mercure", name="mercure", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function mercure(Request $request)
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
                    'name' => 'Mercure partie 2',
                ]);

            $questions = $quizzB->getQuestions();

            return $this->render('answer/mercure.html.twig', [
                'quizz_b'   => $quizzB,
                'questions' => $questions
            ]);
        } else {
            return $this ->render('answer/fail.html.twig');
        }
    }

    /**
     * @Route("/mercureSecond", name="mercure2", methods={"GET","POST"})
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function mercureAgain(Request $request, EntityManagerInterface $entityManager)
    {
        $answer1 = $request->request->get('answer1');
        $answer2 = $request->request->get('answer2');
        $answer3 = $request->request->get('answer3');
        $answer4 = $request->request->get('answer4');
        $answer5 = $request->request->get('answer5');

        if ($answer1 === 'good' && $answer2 === 'good' && $answer3 === 'good' && $answer4 === 'good' && $answer5 === 'good') {
            $badge = $this->getDoctrine()
                ->getRepository(Badge::class)
                ->findOneBy(['name' => 'Sailor Mercury']);

            $user = $this->getUser();
            $userBadges = $user->addBadge($badge);
            $entityManager->persist($userBadges);

            $entityManager->flush();

            return $this->render('answer/success.html.twig');
        } else {
            return $this ->render('answer/fail.html.twig');
        }
    }

    /**
     * @Route("/jupiter", name="jupiter", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function jupiter(Request $request)
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
                    'name' => 'Jupiter partie 2',
                ]);

            $questions = $quizzB->getQuestions();

            return $this->render('answer/jupiter.html.twig', [
                'quizz_b'   => $quizzB,
                'questions' => $questions
            ]);
        } else {
            return $this ->render('answer/fail.html.twig');
        }
    }

    /**
     * @Route("/neptune", name="neptune", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function neptune(Request $request)
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
                    'name' => 'Neptune partie 2',
                ]);

            $questions = $quizzB->getQuestions();

            return $this->render('answer/neptune.html.twig', [
                'quizz_b'   => $quizzB,
                'questions' => $questions
            ]);
        } else {
            return $this ->render('answer/fail.html.twig');
        }
    }

    /**
     * @Route("/saturne", name="saturne", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function saturne(Request $request)
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
                    'name' => 'Saturne partie 2',
                ]);

            $questions = $quizzB->getQuestions();

            return $this->render('answer/saturne.html.twig', [
                'quizz_b'   => $quizzB,
                'questions' => $questions
            ]);
        } else {
            return $this ->render('answer/fail.html.twig');
        }
    }

    /**
     * @Route("/uranus", name="uranus", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function uranus(Request $request)
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
                    'name' => 'Uranus partie 2',
                ]);

            $questions = $quizzB->getQuestions();

            return $this->render('answer/uranus.html.twig', [
                'quizz_b'   => $quizzB,
                'questions' => $questions
            ]);
        } else {
            return $this ->render('answer/fail.html.twig');
        }
    }

    /**
     * @Route("/venus", name="venus", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function venus(Request $request)
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
                    'name' => 'Venus partie 2',
                ]);

            $questions = $quizzB->getQuestions();

            return $this->render('answer/venus.html.twig', [
                'quizz_b'   => $quizzB,
                'questions' => $questions
            ]);
        } else {
            return $this ->render('answer/fail.html.twig');
        }
    }

    /**
     * @Route("/sun", name="sun", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function sun(Request $request)
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
                    'name' => 'Sun partie 2',
                ]);

            $questions = $quizzB->getQuestions();

            return $this->render('answer/sun.html.twig', [
                'quizz_b'   => $quizzB,
                'questions' => $questions
            ]);
        } else {
            return $this ->render('answer/fail.html.twig');
        }
    }

    /**
     * @Route("/jupiterSecond", name="jupiter2", methods={"GET","POST"})
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function jupiterAgain(Request $request, EntityManagerInterface $entityManager)
    {
        $answer1 = $request->request->get('answer1');
        $answer2 = $request->request->get('answer2');
        $answer3 = $request->request->get('answer3');
        $answer4 = $request->request->get('answer4');
        $answer5 = $request->request->get('answer5');

        if ($answer1 === 'good' && $answer2 === 'good' && $answer3 === 'good' && $answer4 === 'good' && $answer5 === 'good') {
            $badge = $this->getDoctrine()
                ->getRepository(Badge::class)
                ->findOneBy(['name' => 'Jupiter Thunder']);

            $user = $this->getUser();
            $userBadges = $user->addBadge($badge);
            $entityManager->persist($userBadges);

            $entityManager->flush();

            return $this->render('answer/success.html.twig');
        } else {
            return $this ->render('answer/fail.html.twig');
        }
    }

    /**
     * @Route("/neptuneSecond", name="neptune2", methods={"GET","POST"})
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function neptuneAgain(Request $request, EntityManagerInterface $entityManager)
    {
        $answer1 = $request->request->get('answer1');
        $answer2 = $request->request->get('answer2');
        $answer3 = $request->request->get('answer3');
        $answer4 = $request->request->get('answer4');
        $answer5 = $request->request->get('answer5');

        if ($answer1 === 'good' && $answer2 === 'good' && $answer3 === 'good' && $answer4 === 'good' && $answer5 === 'good') {
            $badge = $this->getDoctrine()
                ->getRepository(Badge::class)
                ->findOneBy(['name' => 'Neptuna']);

            $user = $this->getUser();
            $userBadges = $user->addBadge($badge);
            $entityManager->persist($userBadges);

            $entityManager->flush();

            return $this->render('answer/success.html.twig');
        } else {
            return $this ->render('answer/fail.html.twig');
        }
    }

    /**
     * @Route("/saturneSecond", name="saturne2", methods={"GET","POST"})
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function saturneAgain(Request $request, EntityManagerInterface $entityManager)
    {
        $answer1 = $request->request->get('answer1');
        $answer2 = $request->request->get('answer2');
        $answer3 = $request->request->get('answer3');
        $answer4 = $request->request->get('answer4');
        $answer5 = $request->request->get('answer5');

        if ($answer1 === 'good' && $answer2 === 'good' && $answer3 === 'good' && $answer4 === 'good' && $answer5 === 'good') {
            $badge = $this->getDoctrine()
                ->getRepository(Badge::class)
                ->findOneBy(['name' => 'Saturna']);

            $user = $this->getUser();
            $userBadges = $user->addBadge($badge);
            $entityManager->persist($userBadges);

            $entityManager->flush();

            return $this->render('answer/success.html.twig');
        } else {
            return $this ->render('answer/fail.html.twig');
        }
    }

    /**
     * @Route("/sunSecond", name="sun2", methods={"GET","POST"})
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function sunAgain(Request $request, EntityManagerInterface $entityManager)
    {
        $answer1 = $request->request->get('answer1');
        $answer2 = $request->request->get('answer2');
        $answer3 = $request->request->get('answer3');
        $answer4 = $request->request->get('answer4');
        $answer5 = $request->request->get('answer5');

        if ($answer1 === 'good' && $answer2 === 'good' && $answer3 === 'good' && $answer4 === 'good' && $answer5 === 'good') {
            $badge = $this->getDoctrine()
                ->getRepository(Badge::class)
                ->findOneBy(['name' => 'Burning Man']);

            $user = $this->getUser();
            $userBadges = $user->addBadge($badge);
            $entityManager->persist($userBadges);

            $entityManager->flush();

            return $this->render('answer/success.html.twig');
        } else {
            return $this ->render('answer/fail.html.twig');
        }
    }

    /**
     * @Route("/uranusSecond", name="uranus2", methods={"GET","POST"})
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function uranusAgain(Request $request, EntityManagerInterface $entityManager)
    {
        $answer1 = $request->request->get('answer1');
        $answer2 = $request->request->get('answer2');
        $answer3 = $request->request->get('answer3');
        $answer4 = $request->request->get('answer4');
        $answer5 = $request->request->get('answer5');

        if ($answer1 === 'good' && $answer2 === 'good' && $answer3 === 'good' && $answer4 === 'good' && $answer5 === 'good') {
            $badge = $this->getDoctrine()
                ->getRepository(Badge::class)
                ->findOneBy(['name' => 'UrAnus']);

            $user = $this->getUser();
            $userBadges = $user->addBadge($badge);
            $entityManager->persist($userBadges);

            $entityManager->flush();

            return $this->render('answer/success.html.twig');
        } else {
            return $this ->render('answer/fail.html.twig');
        }
    }

    /**
     * @Route("/venusSecond", name="venus2", methods={"GET","POST"})
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function venusAgain(Request $request, EntityManagerInterface $entityManager)
    {
        $answer1 = $request->request->get('answer1');
        $answer2 = $request->request->get('answer2');
        $answer3 = $request->request->get('answer3');
        $answer4 = $request->request->get('answer4');
        $answer5 = $request->request->get('answer5');

        if ($answer1 === 'good' && $answer2 === 'good' && $answer3 === 'good' && $answer4 === 'good' && $answer5 === 'good') {
            $badge = $this->getDoctrine()
                ->getRepository(Badge::class)
                ->findOneBy(['name' => 'Sailor Venus']);

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
