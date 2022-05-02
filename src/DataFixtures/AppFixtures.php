<?php

namespace App\DataFixtures;

use App\Entity\Civilite;
use App\Entity\Artiste;
use App\Entity\Domaine;
use App\Entity\Metier;
use App\Entity\OffreDeCasting;
use App\Entity\Organisation;
use App\Entity\TypeContrat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $civ1 = new Civilite();
        $civ1->setNom("Monsieur");
        $civ1->setNomcourt("M.");

        $civ2 = new Civilite();
        $civ2->setNom("Madame");
        $civ2->setNomcourt("Mme");

        $civ3 = new Civilite();
        $civ3->setNom("Mademoiselle");
        $civ3->setNomcourt("Mlle");

        $manager->persist($civ1);
        $manager->persist($civ2);
        $manager->persist($civ3);

        $i = 0;


        $artiste = new Artiste();
        $artiste->setIdentifiantcivilite($civ1);
        $password = $this->hasher->hashPassword($artiste, 'Not24get');
        $artiste->setPassword($password);
        $artiste->setNom('Quiercelin');
        $artiste->SetPrenom('Kevin');
        $artiste->SetEmail('quiercelinkevin@gmail.com');
        $artiste->setDatenaissance(new \DateTime());
        $artiste->setVerification(true);
        $manager->persist($artiste);

        $organisation = new Organisation();
        $nom = 'Organisation1';
        $organisation->setNom($nom);
        $organisation->setAdresseemail(strtolower($nom . "@test.com"));
        $organisation->setAdresse('4 rue des florinoles');
        $organisation->setCodepostal(53360);
        $organisation->setNumerotelephone(010203040506);
        $manager->persist($organisation);


        $typeContrat1 = new TypeContrat();
        $typeContrat1->setNomcontrat('CDI');
        $typeContrat2 = new TypeContrat();
        $typeContrat2->setNomcontrat('CTT');
        $typeContrat3 = new TypeContrat();
        $typeContrat3->setNomcontrat('CDD');

        $manager->persist($typeContrat1);
        $manager->persist($typeContrat2);
        $manager->persist($typeContrat3);

        $domaine1 = new Domaine();
        $domaine1->setNom('Pièce de théâtre');

        $domaine2 = new Domaine();
        $domaine2->setNom('Concert');

        $domaine3 = new Domaine();
        $domaine3->setNom('Film');

        $domaine4 = new Domaine();
        $domaine4->setNom('Série');

        $domaine5 = new Domaine();
        $domaine5->setNom('Cirque');

        $domaine6 = new Domaine();
        $domaine6->setNom('Spectacle de danse');

        $manager->persist($domaine1);
        $manager->persist($domaine2);
        $manager->persist($domaine3);
        $manager->persist($domaine4);
        $manager->persist($domaine5);
        $manager->persist($domaine6);


        $metier1 = new Metier();
        $metier1->setNom('Danseur');
        $metier1->setDomaine($domaine6);

        $metier2 = new Metier();
        $metier2->setNom('Chanteur');
        $metier2->setDomaine($domaine2);

        $metier3 = new Metier();
        $metier3->setNom('Acteur');
        $metier3->setDomaine($domaine3);

        $metier4 = new Metier();
        $metier4->setNom('Dresseur');
        $metier4->setDomaine($domaine5);

        $metier5 = new Metier();
        $metier5->setNom('Funambule');
        $metier5->setDomaine($domaine5);

        $metier6 = new Metier();
        $metier6->setNom('Comédien');
        $metier6->setDomaine($domaine1);

        $manager->persist($metier1);
        $manager->persist($metier2);
        $manager->persist($metier3);
        $manager->persist($metier4);
        $manager->persist($metier5);
        $manager->persist($metier6);

        for ($i; $i < 28; $i++) {


            $offre = new OffreDeCasting();
            $offre->setNom('offre1');
            $offre->setDateDebut(new \DateTime('2022-01-01'));
            $offre->setDatefin(new \DateTime('2022-01-03'));
            $offre->setMetier($metier1);
            $offre->setOrganisation($organisation);
            $offre->setTypeContrat($typeContrat3);
            $offre->setReference("0123456789");
            $offre->setVille("Laval");

            $offre2 = new OffreDeCasting();
            $offre2->setNom('offre2');
            $offre2->setDateDebut(new \DateTime('2022-01-01'));
            $offre2->setDatefin(new \DateTime('2022-01-03'));
            $offre2->setMetier($metier4);
            $offre2->setOrganisation($organisation);
            $offre2->setTypeContrat($typeContrat1);
            $offre2->setReference("0123456789");
            $offre2->setVille("Laval");

            $offre3 = new OffreDeCasting();
            $offre3->setNom('offre3');
            $offre3->setDateDebut(new \DateTime('2022-01-01'));
            $offre3->setDatefin(new \DateTime('2022-01-03'));
            $offre3->setMetier($metier2);
            $offre3->setOrganisation($organisation);
            $offre3->setTypeContrat($typeContrat2);
            $offre3->setReference("0123456789");
            $offre3->setVille("Laval");

            $offre4 = new OffreDeCasting();
            $offre4->setNom('offre4');
            $offre4->setDateDebut(new \DateTime('2022-01-01'));
            $offre4->setDatefin(new \DateTime('2022-01-03'));
            $offre4->setMetier($metier4);
            $offre4->setOrganisation($organisation);
            $offre4->setTypeContrat($typeContrat1);
            $offre4->setReference("0123456789");
            $offre4->setVille("Laval");


            $offre5 = new OffreDeCasting();
            $offre5->setNom('offre5');
            $offre5->setDateDebut(new \DateTime('2022-01-01'));
            $offre5->setDatefin(new \DateTime('2022-01-03'));
            $offre5->setMetier($metier2);
            $offre5->setOrganisation($organisation);
            $offre5->setTypeContrat($typeContrat2);
            $offre5->setReference("0123456789");
            $offre5->setVille("Laval");

            $offre6 = new OffreDeCasting();
            $offre6->setNom('offre6');
            $offre6->setDateDebut(new \DateTime('2022-01-01'));
            $offre6->setDatefin(new \DateTime('2022-01-03'));
            $offre6->setMetier($metier5);
            $offre6->setOrganisation($organisation);
            $offre6->setTypeContrat($typeContrat3);
            $offre6->setReference("0123456789");
            $offre6->setVille("Laval");

            $manager->persist($offre);
            $manager->persist($offre2);
            $manager->persist($offre3);
            $manager->persist($offre4);
            $manager->persist($offre5);
            $manager->persist($offre6);
        }

        $manager->flush();
    }
}
