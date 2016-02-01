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

class EditUserController extends BaseController
{
    
    public function editAction(Request $request, $id)
    {

            $userManager = $this->container->get('fos_user.user_manager');
            $userToEdit = $userManager->findUserBy(array('id' => $id));
            $formFactory = $this->container->get('msi_user.edit.form.factory');
            $form = $formFactory->createForm();
            $form->setData($userToEdit);
            

            // Vérifie si je suis bien en Post et valide le formulaire
            if($form->handleRequest($request)->isValid())
            {
                $userManager->updateUser($userToEdit);
               
                $url = $this->generateUrl('msi_user_admin_edit_user',  array('id' => $userToEdit->getId()));
                $session = $request->getSession();
                $session->getFlashBag()->add('info_user_edit', 
                        $this->get('translator')->trans('msi.core.admin.edit.user.info',  array('%username%' => $userToEdit->getUsername()) , 'Admin')
                );
 
                return $this->redirect($url);
            }
        
        return $this->render('MSIUserBundle:Profile:edit_user.html.twig', array('form' => $form->createView(), 'userToEdit' => $userToEdit));
    }
}