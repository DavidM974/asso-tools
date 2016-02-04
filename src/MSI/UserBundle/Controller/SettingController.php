<?php

namespace MSI\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SettingController extends Controller {

    public function loginBackgroundAction() {
            $em = $this->getDoctrine()->getManager();
            $parameter = $em->getRepository('MSICoreBundle:Parameter')->getSetting();
            if ($parameter and empty($parameter->getImageLogin1Name()) and 
                    empty($parameter->getImageLogin2Name()) and empty($parameter->getImageLogin3Name()))
                $parameter = false;
        return $this->render('MSIUserBundle:Security:loginBackground.html.twig', array(
                    'setting' => $parameter,
        ));
    }
    
    public function loginLogoAction() {
            $em = $this->getDoctrine()->getManager();
            $parameter = $em->getRepository('MSICoreBundle:Parameter')->getSetting();
            if ($parameter and empty($parameter->getLogoName()))
                $parameter = false;
        return $this->render('MSIUserBundle:Security:loginLogo.html.twig', array(
                    'setting' => $parameter,
        ));
    }

}
