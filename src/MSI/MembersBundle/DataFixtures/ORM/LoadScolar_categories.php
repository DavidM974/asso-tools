<?php

namespace MSI\MembersBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MSI\MembersBundle\Entity\Scolar_categories;

class LoadScolar_categories implements FixtureInterface {

    public function load(ObjectManager $manager) {
        $labels = array(
            'Crèche',
            'Maternelle',
            'Primaire',
            'Collège',
            'Lycée'
        );

        foreach ($labels as $label) {
            $scolar_cat = new Scolar_categories();
            $scolar_cat->setLabel($label);
            $manager->persist($scolar_cat);
        }
        
        $manager->flush();
    }

}
