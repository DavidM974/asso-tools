<?php

namespace MSI\MembersBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
        return $this->render('MSIMembersBundle:Members:add.html.twig');
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
