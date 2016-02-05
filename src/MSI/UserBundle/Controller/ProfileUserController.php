<?php

namespace MSI\UserBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use \MSI\UserBundle\Form\Type\EditUserFormType;

class ProfileUserController extends BaseController
{
    

    // path msi_user_profile_edit_avatar
    public function editProfileAvatarAction(Request $request)
    {
          $user = $this->get('security.context')->getToken()->getUser();
            

            $formUser = $this->container->get('msi_user.edit.form.factory')->createForm();
            $formUser->setData($user);
            
            $formAvatar = $this->container->get('msi_user.avatar.form.factory')->createForm();
            $formAvatar->setData($user);
            if($formAvatar->handleRequest($request)->isValid())
            {
                $userManager = $this->container->get('fos_user.user_manager');
                $userManager->updateUser($user);
                  // Move the file to the directory where brochures are stored
                $url = $this->generateUrl('fos_user_profile_edit');
                $session = $request->getSession();
                $session->getFlashBag()->add('info_user_edit', 
                        $this->get('translator')->trans('msi.core.admin.edit.user.info',  array('%username%' => $user->getUsername()) , 'Admin')
                );
 
                return $this->redirect($url);
            }
            return $this->render('MSIUserBundle:Profile:edit_avatar.html.twig', array('formAvatar' => $formAvatar->createView(), 
                                                                                        'edit_avatar' => true));
    }
    
}