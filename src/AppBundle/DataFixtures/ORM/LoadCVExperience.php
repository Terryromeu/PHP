<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\CVExperience;

class LoadCVExperience implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $CVExperience = new CVExperience();
        $CVExperience->setAnnee(2017);
        $CVExperience->setPeriode('Septembre - Novembre');
        $CVExperience->setIntitule('Projet Réseau');
        $CVExperience->setVille('Bordeaux');
        $manager->persist($CVExperience);

        $CVExperience = new CVExperience();
        $CVExperience->setAnnee(2017);
        $CVExperience->setPeriode('Décembre');
        $CVExperience->setIntitule('Projet Windows');
        $CVExperience->setVille('Bordeaux');
        $manager->persist($CVExperience);

        $CVExperience = new CVExperience();
        $CVExperience->setAnnee(2018);
        $CVExperience->setPeriode('Janvier - Décembre');
        $CVExperience->setIntitule('Magasinier - Conseiller');
        $CVExperience->setVille('Bordeaux-Lac');
        $manager->persist($CVExperience);


        $manager->flush();
    }
}