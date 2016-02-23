<?php

namespace MSI\MembersBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MSI\MembersBundle\Entity\Pro_social_categories;

class LoadPro_social_categories implements FixtureInterface {

    public function load(ObjectManager $manager) {
        $labels = array(
            'Agriculteurs exploitants',
            "Artisans, commerçants et chefs d'entreprise",
            'Cadres et prof intellec. supérieurs',
            'Prof intermédiaires',
            'Employés',
            'Ouvriers',
            'Sans profession'
        );

        foreach ($labels as $label) {
            $pro_social_cat = new Pro_social_categories();
            $pro_social_cat->setLabel($label);
            $manager->persist($pro_social_cat);
        }
        
        $manager->flush();
    }

}
