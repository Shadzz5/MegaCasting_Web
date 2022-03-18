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

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(Request $request, SessionInterface $session, ManagerRegistry $doctrine): Response
    {

        $em = $doctrine->getManager();
        $civilitesRepo = $em->getRepository(Civilite::class);
        $offre_castings = $em->getRepository(OffreDeCasting::class);
        $m = $civilitesRepo->find(1);
        $mme = $civilitesRepo->find(2);
        $civilites = $civilitesRepo->findALl();
        $oc = $offre_castings->findAll();
       //$countDomaine = $offre_castings->getDomaine()[0]->count();
        //$countMetier = $offre_castings->getMetier()[0]->count();
        return $this->render('test/index.html.twig', [
            'monsieur' => $m,
            'madame' => $mme,
            'civilites' => $civilites,
            'offre_castings' => $oc,
            //'countDomaine' => $countDomaine,
            //'countMetier' => $countMetier,

        ]);
    }
}
