<?php

namespace App\Controller;

use App\Entity\Application;
use App\Form\Type\ApplicationType;
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
    public function new(Request $request, $id): Response
    {
        $application = new Application();

        $form = $this->createForm(ApplicationType::class, $application);
        $application->setOffreIdentifiant($id);
        $application->setApplicationDate(new \DateTime('today'));

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $application = $form->getData();
            // ... perform some action, such as saving the task to the database

            return $this->redirectToRoute('offre');
        }

        return $this->renderForm('application/new.html.twig', [
            'form' => $form,
        ]);
    }
}
