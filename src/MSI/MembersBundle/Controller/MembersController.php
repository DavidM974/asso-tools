<?php

namespace MSI\MembersBundle\Controller;


use MSI\MembersBundle\Entity\Member;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MSI\MembersBundle\Form\MembersFormType;

class MembersController extends Controller {

    public function indexAction(Request $request) {
        $session = $request->getSession();
        $translator = $this->get('translator');
        $ariane = $translator->trans('msi.members.members.fil.index', array(), 'Members');
        $session->set('fileAriane', $ariane);
        $session->set('module','members');
        return $this->render('MSIMembersBundle:Members:index.html.twig');
    }
    
    public function listAction(Request $request) {
        $session = $request->getSession();
        $translator = $this->get('translator');
        $ariane = $translator->trans('msi.members.members.fil.list', array(), 'Members');
        $session->set('fileAriane', $ariane);
        $session->set('module','members');
        $session->set('menu','list');
        return $this->render('MSIMembersBundle:Members:list.html.twig');
    }

    public function addAction(Request $request) {
        $session = $request->getSession();
        $translator = $this->get('translator');
        $ariane = $translator->trans('msi.members.members.fil.add', array(), 'Members');
        $session->set('fileAriane', $ariane);
        $session->set('module','members');
        $session->set('menu','add');
        
       // 1) build the form
        $member = new Member();
        $form = $this->createForm(new MembersFormType(), $member);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $member->setPassword($password);

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($member);
            $em->flush();

            // ... do any other work - like send them an email, etc
            // maybe set a "flash" success message for the user

           // return $this->redirectToRoute('replace_with_some_route');
        }  
        
        
        
        return $this->render('MSIMembersBundle:Members:add.html.twig', array('form' => $form->createView()));
    }

    public function importAction(Request $request) {
        $session = $request->getSession();
        $translator = $this->get('translator');
        $ariane = $translator->trans('msi.members.members.fil.import', array(), 'Members');
        $session->set('fileAriane', $ariane);
        $session->set('module','members');
        $session->set('menu','import');
        return $this->render('MSIMembersBundle:Members:import.html.twig');
    }
    
    public function statAction(Request $request) {
        $session = $request->getSession();
        $translator = $this->get('translator');
        $ariane = $translator->trans('msi.members.members.fil.stat', array(), 'Members');
        $session->set('fileAriane', $ariane);
        $session->set('module','members');
        $session->set('menu','stat');
        return $this->render('MSIMembersBundle:Members:stat.html.twig');
    }
    
    public function comAction(Request $request) {
        $session = $request->getSession();
        $translator = $this->get('translator');
        $ariane = $translator->trans('msi.members.members.fil.com', array(), 'Members');
        $session->set('fileAriane', $ariane);
        $session->set('module','members');
        $session->set('menu','com');
        return $this->render('MSIMembersBundle:Members:com.html.twig');
    }

}
