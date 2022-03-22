<?php

namespace App\Controller;

use App\Entity\Civilite;
use App\Entity\Domaine;
use App\Entity\OffreDeCasting;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class OffreController extends AbstractController
{
    #[Route('/offre', name: 'offre')]
    public function index(Request $request, SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $search = '';

        if (isset($_GET['q'])) {
            $search = $request->query->get('q');
        }
        if ((strlen(trim($search)) != 0)) {
            $offre_castings = $em->createQuery('SELECT c FROM App\Entity\OffreDeCasting c WHERE c.intituleOffre LIKE :search ');
            $offre_castings->setParameter('search', '%' . $search . '%');
            $oc = $offre_castings->getResult();
        } else {
            $offre_castings = $em->getRepository(OffreDeCasting::class);
            $oc = $offre_castings->findAll();
        }
        if (empty($oc)) {
            $bool = true;
        } else {
            $bool = false;
        }
        $civilite = $em->getRepository(Civilite::class);
        $domaine = $em->getRepository(Domaine::class);
        $d = $domaine->findAll();
        $c = $civilite->findAll();
        return $this->render('offre/offre.html.twig', [
            'offre_castings' => $oc,
            'domaines' => $d,
            'civilites' => $c,
            'search' => $search,
            'empty' => $bool

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

}
