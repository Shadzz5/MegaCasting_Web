<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AbonnementController extends AbstractController
{
    #[Route('/abonnement', name: 'abonnement')]
    public function abonnement(): Response
    {
        return $this->render('abonnement/abonnement.html.twig', [
            'controller_name' => 'AbonnementController',
        ]);
    }
}
