<?php

namespace App\Controller;

use App\Entity\Postulation;
use App\Form\Type\ApplicationType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApplicationController extends AbstractController
{
    #[Route('{id}/new', name: 'postuler')]
    public function new(Request $request, $id, ManagerRegistry $doctrine): Response
    {
        $user = $this->getUser();
        $application = new Postulation();
        $application->setDatePostulation(new \DateTime('today'));
        $form = $this->createForm(ApplicationType::class, $application);

        $em = $doctrine->getManager();
        $query = $em->createQuery('SELECT c FROM App\Entity\OffreDeCasting c WHERE c.identifiant = :id')->setMaxResults(1);
        $query->setParameter('id', $id);
        $casting = $query->getResult()[0];

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $application->setArtiste($user);
            $application->setOffreDeCasting($casting);
            $application->setMotivation($form['motivation']->getData());
            $em->persist($application);
            $em->flush();

            return $this->redirectToRoute('offre');
        }
        return $this->renderForm('application/new.html.twig', [
            'form' => $form,
        ]);
    }
}
