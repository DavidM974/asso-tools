<?php

namespace MSI\MembersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MSIMembersBundle:Default:index.html.twig');
    }
}
