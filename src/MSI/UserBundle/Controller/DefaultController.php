<?php

namespace MSI\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MSIUserBundle:Default:index.html.twig');
    }
}
