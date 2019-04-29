<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\CVFormation;

class LoadCVFormation implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $cvformation = new CVFormation();
        $cvformation->setDiplome('Baccalauréat de Science Technologique du
Management et de la Gestion');
        $cvformation->setParticularite('Mention AB');
        $cvformation->setPeriode('2015');
        $cvformation->setVille('Jonzac');
        $manager->persist($cvformation);

        $cvformation = new CVFormation();
        $cvformation->setDiplome('L1 Mathématiques et informatique appliquées
aux sciences humaines et sociales');
        $cvformation->setParticularite('Obtenue');
        $cvformation->setPeriode('2016');
        $cvformation->setVille('Talence');
        $manager->persist($cvformation);

        $cvformation = new CVFormation();
        $cvformation->setDiplome('École d\'Ingénieurie Informatique');
        $cvformation->setParticularite('Bachelor 3');
        $cvformation->setPeriode('Actuel');
        $cvformation->setVille('Bordeaux');
        $manager->persist($cvformation);


        $manager->flush();
    }
}