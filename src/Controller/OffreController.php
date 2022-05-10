<?php

namespace App\Controller;

use App\Entity\Civilite;
use App\Entity\Domaine;
use App\Entity\Metier;
use App\Entity\OffreDeCasting;
use App\Entity\TypeContrat;
use App\Pagination;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Paginator;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class OffreController extends AbstractController
{
    #[Route('/offre/{id}', name: 'show', requirements: ['id' => '\d+'])]
    public function show($id, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $offre_castings = $em->getRepository(OffreDeCasting::class);
        $casting = $offre_castings->find($id);

        return $this->render('offre/show.html.twig', [
            'casting' => $casting,
        ]);
    }

    #[Route('/offre/{categorie?}', name: 'offre')]
    public function offre(Request $request, SessionInterface $session, ManagerRegistry $doctrine, $categorie, Paginator $paginator): Response
    {
        $em = $doctrine->getManager();
        $offreRepository = $em->getRepository(OffreDeCasting::class);
        $search = '';


        if ($request->query->get("q")) {
            $search = $request->query->get('q');
        }

        if ((strlen(trim($search)) != 0)) {
            $offre_castings = $em->createQuery('SELECT o FROM App\Entity\OffreDeCasting o WHERE o.nom LIKE :search ');
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
        $metier = $em->getRepository(Metier::class);

        $d = $domaine->findAll();
        $tc = $typeContrat->findAll();
        $m = $metier->findAll();

        $selectDomaine = $request->query->get('selectDomaine');
        $selectTypeContrat = $request->query->get('selectTypeContrat');
        $selectMetier = $request->query->get('selectMetier');

        if ($selectTypeContrat != 0) {
            $oc = $offreRepository->findByContrat($selectTypeContrat);
        }
        if ($selectDomaine != 0) {
            $oc = $offreRepository->findByDomaine($selectDomaine);
        }
        if ($selectMetier != 0) {
            $oc = $offreRepository->findByMetier($selectMetier);
        }

        $pagination = $paginator->paginate(
            $oc,
            $request->query->getInt('page', 1), /*page number*/
        );
//        $limit = 18;
//        $page = (int)$request->query->get("page", 1);
//        $oc = $offreRepository->getPaginateCastings($page, $limit);
//        $total = $offreRepository->getTotalCastings();

        // Pass through the 3 above variables to calculate pages in twig
        return $this->render('offre/offre.html.twig', [
            'offre_castings' => $oc,
            'domaines' => $d,
            'metiers' => $m,
            'typeContrats' => $tc,
            'search' => $search,
            'empty' => $bool,
            'categorie' => $categorie,
//            'total' => $total,
//            'page' => $page,
//            'limit' => $limit

        ]);
    }


}
