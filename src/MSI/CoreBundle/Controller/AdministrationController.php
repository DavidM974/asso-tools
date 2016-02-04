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

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MSI\CoreBundle\Entity\Parameter;
use MSI\CoreBundle\Form\ParameterType;

class AdministrationController extends Controller {

    public function indexAction(Request $request) {
        //Init ariane path
        $session = $request->getSession();
        $translator = $this->get('translator');
        $ariane = $translator->trans('msi.core.admin.fil.index', array(), 'Admin');
        $session->set('fileAriane', $ariane);
        return $this->render('MSICoreBundle:Administration:index.html.twig');
    }

    public function usersAction(Request $request) {
        $session = $request->getSession();
        $translator = $this->get('translator');
        $ariane = $translator->trans('msi.core.admin.fil.users', array(), 'Admin');
        $session->set('fileAriane', $ariane);
        $listUsers = $this->getDoctrine()
                ->getManager()
                ->getRepository('MSIUserBundle:User')
                ->findAll();
        return $this->render('MSICoreBundle:Administration:users.html.twig', array(
                    'listUsers' => $listUsers,
        ));
    }

    public function settingsAction(Request $request) {
        $session = $request->getSession();
        $translator = $this->get('translator');
        $ariane = $translator->trans('msi.core.admin.fil.settings', array(), 'Admin');
        $session->set('fileAriane', $ariane);
        $em = $this->getDoctrine()->getManager();
        $parameter = $em->getRepository('MSICoreBundle:Parameter')->getSetting();
        if (!$parameter) {
            $parameter = new Parameter();
        }
        $form = $this->createForm(new ParameterType(), $parameter);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($parameter);
            $em->flush();
        }

        return $this->render('MSICoreBundle:Administration:settings.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

}
