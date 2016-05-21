<?php

namespace MSI\MembersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StatisticController extends Controller {

    public function evoMembersAction(Request $request) {
        $session = $request->getSession();
        $translator = $this->get('translator');
        $ariane = $translator->trans('msi.members.members.fil.evoMembers', array(), 'Members');
        $session->set('fileAriane', $ariane);
        $session->set('module', 'members');
        $session->set('menu', 'stat');
        return $this->render('MSIMembersBundle:Statistic:evoMembers.html.twig');
    }
    
        public function activeMembersAction(Request $request) {
        $session = $request->getSession();
        $translator = $this->get('translator');
        $ariane = $translator->trans('msi.members.members.fil.activeMembers', array(), 'Members');
        $session->set('fileAriane', $ariane);
        $session->set('module', 'members');
        $session->set('menu', 'stat');
        return $this->render('MSIMembersBundle:Statistic:activeMembers.html.twig');
    }
    
        public function newMembersAction(Request $request) {
        $session = $request->getSession();
        $translator = $this->get('translator');
        $ariane = $translator->trans('msi.members.members.fil.newMembers', array(), 'Members');
        $session->set('fileAriane', $ariane);
        $session->set('module', 'members');
        $session->set('menu', 'stat');
        return $this->render('MSIMembersBundle:Statistic:newMembers.html.twig');
    }
    
        public function membersPerDistrictAction(Request $request) {
        $session = $request->getSession();
        $translator = $this->get('translator');
        $ariane = $translator->trans('msi.members.members.fil.membersPerDistrict', array(), 'Members');
        $session->set('fileAriane', $ariane);
        $session->set('module', 'members');
        $session->set('menu', 'stat');
        return $this->render('MSIMembersBundle:Statistic:membersPerDistrict.html.twig');
    }
    
        public function evoBaptAction(Request $request) {
        $session = $request->getSession();
        $translator = $this->get('translator');
        $ariane = $translator->trans('msi.members.members.fil.evoBapt', array(), 'Members');
        $session->set('fileAriane', $ariane);
        $session->set('module', 'members');
        $session->set('menu', 'stat');
        return $this->render('MSIMembersBundle:Statistic:evoBapt.html.twig');
    }

}
