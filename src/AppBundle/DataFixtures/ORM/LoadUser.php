<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use Simon\PlatformBundle\Entity\Image;

class LoadUser implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $User = new User();
        $User->setUsername('Admin');
        $User->setEmail('admin@admin.fr');
        $User->setSalt('LHPwzfKbHPipylJu8kb2Fu6CJ7apMWRhNgTn8g3.BbU');
        $User->setPassword('Z0DZ5t36z0aAfKZJ+Q8M8CeJFR3vHHHjI0OsobW5COA41eqHY/q8a+H2+E+2SNlOnLuyxeAqa0gS/hk856LIng=='); // = 'Admin'
        $User->setEnabled(1);
        $User->setRoles(["ROLE_SUPER_ADMIN", "ROLE_ADMIN", "ROLE_USER"]);
        $manager->persist($User);


        $manager->flush();
    }
}