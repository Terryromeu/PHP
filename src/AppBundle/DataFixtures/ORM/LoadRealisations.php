<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Realisations;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadRealisations implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $Realisations = new Realisations();
        $Realisations->setName('Projet');
        $Realisations->setLangage('Réseau');
        $Realisations->setDescription('Projet / cas d\'étude - Cas sur une entreprise de 200
employés, adressage IP, plan d\'architecture, redondance,
anti-SPOF, GLBP, Spanning tree,...');
        $Realisations->setAnnee(2017);
        $manager->persist($Realisations);

        $Realisations = new Realisations();
        $Realisations->setName('Projet');
        $Realisations->setLangage('Réseau');
        $Realisations->setDescription('Projet / cas d’étude - Cas sur deux serveur Windows,
redondance, AD, DNS, DHCP, GPO...');
        $Realisations->setAnnee(2017);
        $manager->persist($Realisations);

        $manager->flush();
    }
}