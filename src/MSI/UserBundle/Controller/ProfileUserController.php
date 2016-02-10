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
    public function editProfileAvatarAction($avatarActif, Request $request)
    {
          $user = $this->get('security.context')->getToken()->getUser();
            
            //init the globale user edit form
            $formUser = $this->container->get('msi_user.edit.form.factory')->createForm();
            $formUser->setData($user);
            //init the user avatar edit form
            $formAvatar = $this->container->get('msi_user.avatar.form.factory')->createForm();
            $formAvatar->setData($user);
            if($formAvatar->handleRequest($request)->isValid())
            {
                $userManager = $this->container->get('fos_user.user_manager');
                $userManager->updateUser($user);
                $url = $this->generateUrl('fos_user_profile_edit');            
                $session = $request->getSession();
                $session->getFlashBag()->add('avatar_user_edit', 
                        $this->get('translator')->trans('msi.core.admin.edit.user.avatar.info',  array('%username%' => $user->getUsername()) , 'Admin')
                );
                return $this->redirect($url);
            }
            return $this->render('MSIUserBundle:Profile:edit_avatar.html.twig', array('formAvatar' => $formAvatar->createView(),'avatarActif' => $avatarActif));
    }
    
}