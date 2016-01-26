<?php

namespace MSI\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class DefaultController extends Controller {

    public function indexAction() {
        $user = $this->getUser();

        if (null === $user) {
          // @todo Ici, l'utilisateur est anonyme ou l'URL n'est pas derrière un pare-feu
          //throw new AccessDeniedException('Accès limité aux personne authentifié.');
        } else {
          // @todo Ici, stocker donner dans la session si première authentification
            
        }
        return $this->render('MSICoreBundle:Default:dashboard.html.twig');
    }
    
    public function headerProfileAction() {
        return $this->render('MSICoreBundle:Header:headerProfile.html.twig');
    }
    
    public function fileArianeAction() {
        return $this->render('MSICoreBundle:Header:fileAriane.html.twig');
    }

    public function menuLeftAction() {
        return $this->render('MSICoreBundle:MenuLeft:menuLeft.html.twig');
    }
}
