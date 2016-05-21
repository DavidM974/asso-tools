<?php

namespace MSI\PastoralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PastoralController extends Controller {

    public function indexAction(Request $request) {
        $session = $request->getSession();
        $translator = $this->get('translator');
        $ariane = $translator->trans('msi.pastoral.fil', array(), 'Pastoral');
        $session->set('fileAriane', $ariane);
        $session->set('module', 'pastoral');
        return $this->render('MSIPastoralBundle:Pastoral:index.html.twig');
    }
    
    public function reportAction(Request $request) {
        $session = $request->getSession();
        $translator = $this->get('translator');
        $ariane = $translator->trans('msi.pastoral.fil.report', array(), 'Pastoral');
        $session->set('fileAriane', $ariane);
        $session->set('module', 'pastoral');
        $session->set('menu', 'report');
        return $this->render('MSIPastoralBundle:Pastoral:report.html.twig');
    }
    
    public function myReportAction(Request $request) {
        $session = $request->getSession();
        $translator = $this->get('translator');
        $ariane = $translator->trans('msi.pastoral.fil.my.report', array(), 'Pastoral');
        $session->set('fileAriane', $ariane);
        $session->set('module', 'pastoral');
        $session->set('menu', 'myReport');
        return $this->render('MSIPastoralBundle:Pastoral:myReport.html.twig');
    }
    
    public function newReportAction(Request $request) {
        $session = $request->getSession();
        $translator = $this->get('translator');
        $ariane = $translator->trans('msi.pastoral.fil.new.report', array(), 'Pastoral');
        $session->set('fileAriane', $ariane);
        $session->set('module', 'pastoral');
        $session->set('menu', 'newReport');
        return $this->render('MSIPastoralBundle:Pastoral:newReport.html.twig');
    }

}
