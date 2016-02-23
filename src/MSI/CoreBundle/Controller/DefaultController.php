<?php

namespace MSI\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    public function indexAction(Request $request) {
        //Init ariane path
        $session = $request->getSession();
        $ariane = "<li><span>Dashboard</span></li>";
        $session->set('fileAriane', $ariane);
        $session->set('module','Dashboard');
        $session->set('menu','');
        return $this->render('MSICoreBundle:Default:dashboard.html.twig');
    }
    
    public function headerProfileAction() {
        return $this->render('MSICoreBundle:Header:headerProfile.html.twig');
    }
    
    public function fileArianeAction(Request $request) {
        $session = $request->getSession();
        
        return $this->render('MSICoreBundle:Header:fileAriane.html.twig', array('fileAriane' => $session->get('fileAriane')));
    }

    public function menuLeftAction(Request $request) {
        return $this->render('MSICoreBundle:MenuLeft:menuLeft.html.twig');
    }
}
