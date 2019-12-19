<?php

namespace App\Controller;

use App\Entity\Chapter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/documentation", name="documentation_")
 */
class DocumentationController extends AbstractController
{
    /**
     * @Route("/{id}", name="planet")
     */
    public function chapterByPlanet($id)
    {
        $chapters = $this->getDoctrine()
            ->getRepository(Chapter::class)
            ->findAll();

        $chapter = $this->getDoctrine()
            ->getRepository(Chapter::class)
            ->find($id);

        $contents    = $chapter->getContents();
        $multimedias = $chapter->getMultimedia();

        return $this->render('documentation/content.html.twig', [
            'chapters'    => $chapters,
            'chapter'     => $chapter,
            'contents'    => $contents,
            'multimedias' => $multimedias,
        ]);
    }
}
