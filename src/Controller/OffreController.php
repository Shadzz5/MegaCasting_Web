<?php

namespace App\Controller;

use App\Entity\Civilite;
use App\Entity\Domaine;
use App\Entity\OffreDeCasting;
use App\Entity\TypeContrat;
use App\Repository\OffreRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class OffreController extends AbstractController
{
    #[Route('/offre/{categorie?}', name: 'offre')]
    public function offre(Request $request, SessionInterface $session, ManagerRegistry $doctrine, $categorie, OffreRepository $offreRepository): Response
    {
        $em = $doctrine->getManager();
        $search = '';

        if ($request->query->get("get")) {
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
        $typeContrat = $em->getRepository(TypeContrat::class);
        $domaine = $em->getRepository(Domaine::class);
        $d = $domaine->findAll();
        $tc = $typeContrat->findAll();

        $domaine = $request->query->get('selectDomaine');
        $typeContrat = $request->query->get('selectTypeContrat');

        if ($domaine != null) {
            $oc = $offreRepository->findByDomaine($domaine);
        }
        if ($typeContrat != null) {
            $oc = $offreRepository->findByContrat($typeContrat);
        } else {
            $offre_castings = $em->getRepository(OffreDeCasting::class);
            $oc = $offre_castings->findAll();
        }
        return $this->render('offre/offre.html.twig', [
            'offre_castings' => $oc,
            'domaines' => $d,
            'typeContrats' => $tc,
            'search' => $search,
            'empty' => $bool,
            'categorie' => $categorie,
        ]);
    }

    #[Route('/offre/{id}', name: 'show')]
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
