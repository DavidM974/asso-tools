<?php

namespace MSI\MembersBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MSI\MembersBundle\Entity\Family_situations;

class LoadFamily_situations implements FixtureInterface {

    public function load(ObjectManager $manager) {
        $labels = array(
            'Célibataire',
            'Marié',
            'Veuf',
            'Divorcé',
            'Remarié'
        );

        foreach ($labels as $label) {
            $family_situation = new Family_situations();
            $family_situation->setLabel($label);
            $manager->persist($family_situation);
        }
        
        $manager->flush();
    }

}
