<?php

namespace App\Controller;

use App\Entity\OffreDeCasting;
use App\Repository\OffreRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api', name: 'app_api')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $offre_castings = $em->getRepository(OffreDeCasting::class);
        $oc = $offre_castings->findAll();
        foreach ($oc as $o) {
            $a[] = [
                'intitule' => $o->getNom(),
                'dateDebut' => $o->getDateDebut(),
                'dateFin' => $o->getDateFin(),
                'reference' => $o->getReferenceOffre(),

            ];
        }
        return new JsonResponse($a);

    }
}
