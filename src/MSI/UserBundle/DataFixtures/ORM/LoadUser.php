<?php

namespace MSI\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use MSI\UserBundle\Entity\User;

class LoadUser implements FixtureInterface, ContainerAwareInterface {

    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager) {
        /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->container->get('fos_user.user_manager');
        $user1 = $userManager->createUser();
        $user1->setUsername('Superadmin');
        $user1->setEmail('super.admin@gmail.com');
        $user1->setPlainPassword('admin');
        $user1->setRoles(array('ROLE_SUPER_ADMIN'));
        $user1->setEnabled(true);
        $userManager->updateUser($user1);

        $user2 = $userManager->createUser();
        $user2->setUsername('Admin');
        $user2->setEmail('admin@gmail.com');
        $user2->setPlainPassword('Admin');
        $user2->setRoles(array('ROLE_ADMIN'));
        $user2->setEnabled(true);
        $userManager->updateUser($user2);

        $user3 = $userManager->createUser();
        $user3->setUsername('Pasteur');
        $user3->setEmail('pasteur@gmail.com');
        $user3->setPlainPassword('Pasteur');
        $user3->setRoles(array('ROLE_PASTEUR'));
        $user3->setEnabled(true);
        $userManager->updateUser($user3);

        $user4 = $userManager->createUser();
        $user4->setUsername('Secretaire');
        $user4->setEmail('secretaire@gmail.com');
        $user4->setPlainPassword('Secretaire');
        $user4->setRoles(array('ROLE_SECRETAIRE'));
        $user4->setEnabled(true);
        $userManager->updateUser($user4);
    }

}
