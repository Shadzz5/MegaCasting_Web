<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ConnexionController extends AbstractController
{
    #[Route('/connexion', name: 'connexion')]
    public function index(Request $request, SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        return $this->render('connexion/connexion.html.twig', [
        ]);
    }
}
