<?php

namespace MSI\UserBundle\Form\Type;

use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegistrationFormType extends BaseType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('roles', ChoiceType::class, array(
                        'label' => 'msi.user.register.roles', 'translation_domain' => 'Register',
                        'multiple' => true,
                        'expanded' => false,
                        'choices' => array(
                        'ROLE_SECRETAIRE' => 'msi.user.register.secretary',
                        'ROLE_PASTEUR' => 'msi.user.register.pastor',
                        'ROLE_ADMIN' => 'msi.user.register.admin',
                        ))) 
        ->add('locale', ChoiceType::class, array(
                        'translation_domain' => 'Register',
                        'multiple' => false,
                        'expanded' => false,
                        'choices' => array(
                        'FR' => 'msi.user.registration.locale.fr',
                        'GB' => 'msi.user.registration.locale.en',
                        ),
                        'required' => false,
                        )) 
        ;

        // add your custom field
    }

    public function getParent() {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix() {
        return 'msi_user_registration';
    }

    // For Symfony 2.x
    public function getName() {
        return $this->getBlockPrefix();
    }

}
