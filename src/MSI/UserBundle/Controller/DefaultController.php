<?php

namespace MSI\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MSIUserBundle:Default:index.html.twig');
    }
    
    public function checkUsernameAction(Request $request) {
        if ($request->isXMLHttpRequest()) {
            $username = $request->get('username');
             $user = $this->get('fos_user.user_manager')
                         ->findUserBy(array('username' => $username));
            if($user == null){
                $return = array('status' => 'OK', 
                    'message' => $this->get('translator')->trans('msi.user.register.checkusername.valid', array('%username%' => $username), 'Register')
                    );
            }
            else{
                $return = array('status' => 'ERROR', 
                    'message' => $this->get('translator')->trans('msi.user.register.checkusername.error', array('%username%' => $username), 'Register')
                    );
            }
            $response = new Response(json_encode($return));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
        return new Response('This is not ajax!', 400);
    }
}
