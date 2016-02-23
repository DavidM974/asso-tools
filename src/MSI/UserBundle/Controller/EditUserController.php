<?php

namespace MSI\UserBundle\Controller;

use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;


class EditUserController extends BaseController {

    public function editAction(Request $request, $id) {

        $userManager = $this->container->get('fos_user.user_manager');
        $userToEdit = $userManager->findUserBy(array('id' => $id));
        $formFactory = $this->container->get('msi_user.edit.form.factory');
        $form = $formFactory->createForm();
        $form->setData($userToEdit);

        $formAvatar = $this->container->get('msi_user.avatar.form.factory')->createForm();
        $formAvatar->setData($userToEdit);
        //init the user password edit form
        $formPwd = $this->container->get('msi_user.password.form.factory')->createForm();
        $formPwd->setData($userToEdit);

        // Vérifie si je suis bien en Post et valide le formulaire
        if ($form->handleRequest($request)->isValid()) {
            $userManager->updateUser($userToEdit);
            $url = $this->generateUrl('msi_user_admin_edit_user', array('id' => $userToEdit->getId()));
            $session = $request->getSession();
            $session->getFlashBag()->add('info_user_edit', $this->get('translator')->trans('msi.core.admin.edit.user.info', array('%username%' => $userToEdit->getUsername()), 'Admin')
            );

            return $this->redirect($url);
        }

        return $this->render('MSIUserBundle:Profile:edit_user.html.twig', array('form' => $form->createView(), 'formAvatar' => $formAvatar->createView(), 'formPwd' => $formPwd->createView(), 'userToEdit' => $userToEdit, 'edit_user' => true));
    }

    public function editAvatarAction(Request $request, $id) {
        $userManager = $this->container->get('fos_user.user_manager');
        $userToEdit = $userManager->findUserBy(array('id' => $id));


        $formUser = $this->container->get('msi_user.edit.form.factory')->createForm();
        $formUser->setData($userToEdit);
        $formAvatar = $this->container->get('msi_user.avatar.form.factory')->createForm();
        $formAvatar->setData($userToEdit);
        //init the user password edit form
        $formPwd = $this->container->get('msi_user.password.form.factory')->createForm();
        $formPwd->setData($userToEdit);
        if ($formAvatar->handleRequest($request)->isValid()) {

            $userManager->updateUser($userToEdit);
            $url = $this->generateUrl('msi_user_admin_edit_avatar_user', array('id' => $userToEdit->getId()));
            $session = $request->getSession();
            $session->getFlashBag()->add('info_user_edit', $this->get('translator')->trans('msi.core.admin.edit.user.info', array('%username%' => $userToEdit->getUsername()), 'Admin')
            );

            return $this->redirect($url);
        }
        return $this->render('MSIUserBundle:Profile:edit_user.html.twig', array('form' => $formUser->createView(),
                    'formAvatar' => $formAvatar->createView(),
                    'formPwd' => $formPwd->createView(),
                    'userToEdit' => $userToEdit,
                    'edit_avatar' => true));
    }

    public function editPasswordAction(Request $request, $id) {
        $userManager = $this->container->get('fos_user.user_manager');
        $userToEdit = $userManager->findUserBy(array('id' => $id));

        $formUser = $this->container->get('msi_user.edit.form.factory')->createForm();
        $formUser->setData($userToEdit);
        $formAvatar = $this->container->get('msi_user.avatar.form.factory')->createForm();
        $formAvatar->setData($userToEdit);
        //init the user password edit form
        $formPwd = $this->container->get('msi_user.password.form.factory')->createForm();
        $formPwd->setData($userToEdit);

        if ($formPwd->handleRequest($request)->isValid()) {
            $userManager = $this->container->get('fos_user.user_manager');
            $userManager->updateUser($userToEdit);
            $url = $this->generateUrl('msi_user_admin_edit_avatar_user', array('id' => $userToEdit->getId()));
            $session = $request->getSession();
            $session->getFlashBag()->add('info_user_edit', $this->get('translator')->trans('msi.core.admin.edit.user.pwd.info', array('%username%' => $userToEdit->getUsername()), 'Admin')
            );
            return $this->redirect($url);
        }

        return $this->render('MSIUserBundle:Profile:edit_user.html.twig', array('form' => $formUser->createView(),
                    'formAvatar' => $formAvatar->createView(),
                    'formPwd' => $formPwd->createView(),
                    'userToEdit' => $userToEdit,
                    'edit_pwd' => true));
    }

}
