<?php

namespace MSI\MembersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CommunicationController extends Controller {

    public function listEmailAction(Request $request) {
        $session = $request->getSession();
        $translator = $this->get('translator');
        $ariane = $translator->trans('msi.members.members.fil.listEmail', array(), 'Communication');
        $session->set('fileAriane', $ariane);
        $session->set('module', 'members');
        $session->set('menu', 'com');
        $session->set('submenu', 'listEmail');
        return $this->render('MSIMembersBundle:Communication:listEmail.html.twig');
    }

    public function sendEmailAction(Request $request) {
        $session = $request->getSession();
        $translator = $this->get('translator');
        $ariane = $translator->trans('msi.members.members.fil.sendEmail', array(), 'Communication');
        $session->set('fileAriane', $ariane);
        $session->set('module', 'members');
        $session->set('menu', 'com');
        $session->set('menu', 'sendEmail');
        return $this->render('MSIMembersBundle:Communication:sendEmail.html.twig');
    }

}
