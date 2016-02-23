<?php

namespace MSI\MembersBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MSI\MembersBundle\Entity\Services;

class LoadServices implements FixtureInterface {

    public function load(ObjectManager $manager) {
        $labels = array(
            'Service A',
            'Service B',
            'Service C'
        );

        foreach ($labels as $label) {
            $services = new Services();
            $services->setLabel($label);
            $manager->persist($services);
        }
        
        $manager->flush();
    }

}
