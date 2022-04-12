<?php

namespace App\Controller;

use App\Entity\OffreDeCasting;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class LayoutController extends AbstractController
{
    public function countCastings(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();

        $offreCastings = $em->getRepository(OffreDeCasting::class);

        $results = $offreCastings->createQueryBuilder('c')
            ->select('count(c.identifiant)')
            ->getQuery()
            ->getSingleScalarResult();

        $resultsDate = $offreCastings->createQueryBuilder('c')
            ->select('max(c.dateDebut)')
            ->getQuery()
            ->getSingleScalarResult();

        return $this->render('layout/footer.html.twig', [
            'results' => $results,
            'resultsDate' => $resultsDate
        ]);
    }
}
