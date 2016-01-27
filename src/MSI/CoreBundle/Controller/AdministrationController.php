<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdministrationController
 *
 * @author David
 */

namespace MSI\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdministrationController extends Controller {
  
    public function indexAction(Request $request) {
        //Init ariane path
        $session = $request->getSession();
        $translator = $this->get('translator');
        $ariane = $translator->trans('msi.core.admin.fil.index',  array() , 'Admin');
        $session->set('fileAriane', $ariane);
        
        return $this->render('MSICoreBundle:Administration:index.html.twig');
    }

    public function usersAction() {
        $listUsers = $this->getDoctrine()
                ->getManager()
                ->getRepository('MSIUserBundle:User')
                ->findAll();
        return $this->render('MSICoreBundle:Administration:users.html.twig', array(
                    'listUsers' => $listUsers,
        ));
    }


    public function addUserAction() {
        return $this->render('MSICoreBundle:Administration:addUser.html.twig');
    }


    public function settingsAction() {
        return $this->render('MSICoreBundle:Administration:settings.html.twig');
    }

}
