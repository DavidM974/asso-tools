<?php

namespace MSI\UserBundle\Controller;

use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;


class ProfileUserController extends BaseController {

    public function editAction(Request $request) {

        $user = $this->get('security.context')->getToken()->getUser();
        $formFactory = $this->container->get('msi_user.edit.form.factory');
        $form = $formFactory->createForm();
        $form->remove('roles'); // delete the option to choose the role for the profile only in admin panel
        $form->setData($user);

        $formAvatar = $this->container->get('msi_user.avatar.form.factory')->createForm();
        $formAvatar->setData($user);
        //init the user password edit form
        $formPwd = $this->container->get('msi_user.password.form.factory')->createForm();
        $formPwd->setData($user);

        // Vérifie si je suis bien en Post et valide le formulaire
        if ($form->handleRequest($request)->isValid()) {
            $userManager = $this->container->get('fos_user.user_manager');
            $userManager->updateUser($user);
            $url = $this->generateUrl('msi_user_edit_user');
            $session = $request->getSession();
            $session->getFlashBag()->add('info_user_edit', $this->get('translator')->trans('msi.core.admin.edit.user.info', array('%username%' => $user->getUsername()), 'Admin')
            );

            return $this->redirect($url);
        }

        return $this->render('MSIUserBundle:Profile:edit_profile.html.twig', array('form' => $form->createView(), 
            'formAvatar' => $formAvatar->createView(), 
            'formPwd' => $formPwd->createView(), 
            'user' => $user, 
            'edit_profile' => true));
    }

    public function editAvatarAction(Request $request) {
        $user = $this->get('security.context')->getToken()->getUser();


        $formUser = $this->container->get('msi_user.edit.form.factory')->createForm();
        $formUser->remove('roles');
        $formUser->setData($user);
        $formAvatar = $this->container->get('msi_user.avatar.form.factory')->createForm();
        $formAvatar->setData($user);
        //init the user password edit form
        $formPwd = $this->container->get('msi_user.password.form.factory')->createForm();
        $formPwd->setData($user);
        if ($formAvatar->handleRequest($request)->isValid()) {
            $userManager = $this->container->get('fos_user.user_manager');
            $userManager->updateUser($user);
            $url = $this->generateUrl('msi_user_edit_avatar_user');
            $session = $request->getSession();
            $session->getFlashBag()->add('info_user_edit', $this->get('translator')->trans('msi.core.admin.edit.user.info', array('%username%' => $user->getUsername()), 'Admin')
            );

            return $this->redirect($url);
        }
        return $this->render('MSIUserBundle:Profile:edit_profile.html.twig', array('form' => $formUser->createView(),
                    'formAvatar' => $formAvatar->createView(),
                    'formPwd' => $formPwd->createView(),
                    'user' => $user,
                    'edit_avatar' => true));
    }

    public function editPasswordAction(Request $request) {
       $user = $this->get('security.context')->getToken()->getUser();

        $formUser = $this->container->get('msi_user.edit.form.factory')->createForm();
        $formUser->remove('roles');
        $formUser->setData($user);
        $formAvatar = $this->container->get('msi_user.avatar.form.factory')->createForm();
        $formAvatar->setData($user);
        //init the user password edit form
        $formPwd = $this->container->get('msi_user.password.form.factory')->createForm();
        $formPwd->setData($user);

        if ($formPwd->handleRequest($request)->isValid()) {
            $userManager = $this->container->get('fos_user.user_manager');
            $userManager->updateUser($user);
            $url = $this->generateUrl('msi_user_edit_pwd_user');
            $session = $request->getSession();
            $session->getFlashBag()->add('info_user_edit', $this->get('translator')->trans('msi.core.admin.edit.user.pwd.info', array('%username%' => $user->getUsername()), 'Admin')
            );
            return $this->redirect($url);
        }

        return $this->render('MSIUserBundle:Profile:edit_profile.html.twig', array('form' => $formUser->createView(),
                    'formAvatar' => $formAvatar->createView(),
                    'formPwd' => $formPwd->createView(),
                    'user' => $user,
                    'edit_pwd' => true));
    }

}
