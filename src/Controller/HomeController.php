<?php

namespace App\Controller;

use App\Entity\Civilite;
use App\Entity\OffreDeCasting;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Request $request, SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $offre_castings = $em->getRepository(OffreDeCasting::class);
        $oc = $offre_castings->findAll();

        return $this->render('home/home.html.twig', [
            'offre_castings' => $oc,
        ]);
    }

    #[Route('/{id}', name: 'show')]
    public function show($id, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $offre_castings = $em->getRepository(OffreDeCasting::class);
        $casting = $offre_castings->find($id);

        return $this->render('offre/show.html.twig', [
            'casting' => $casting,
        ]);
    }

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
