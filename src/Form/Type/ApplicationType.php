<?php

namespace App\Form\Type;

use App\Entity\Application;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('offreIdentifiant', HiddenType::class)
            ->add('nom', TextType::class, ['required' => false])
            ->add('prenom', TextType::class, ['required' => false])
            ->add('email', EmailType::class, ['required' => false])
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'Homme' => 1,
                    'Femme' => 0
                ]
            ])
            ->add('motivation', TextareaType::class, ['required' => false])
            ->add('dateAnniversaire', DateType::class, [
                'years' => range(date('Y'), date('Y') - 80),
            ])
            ->add('applicationDate', HiddenType::class)
            ->add('cv', FileType::class, ['mapped' => false, 'required' => false])
            ->add('save', SubmitType::class, ['label' => 'Postuler']);;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Application::class,
        ]);
    }
}

?>