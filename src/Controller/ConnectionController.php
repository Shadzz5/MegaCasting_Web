<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ConnectionController extends AbstractController
{
    #[Route('/connection', name: 'connection')]
    public function index(Request $request, SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        return $this->render('connection/connection.html.twig', [
        ]);
    }
}
