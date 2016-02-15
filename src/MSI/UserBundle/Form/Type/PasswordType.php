<?php

namespace MSI\UserBundle\Form\Type;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;
use FOS\UserBundle\Util\LegacyFormHelper;
 
class PasswordType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->remove('username')
                ->remove('email')
                ->add('plainPassword', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\RepeatedType'), array(
                'type' => LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\PasswordType'),
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
                ))
                ->add('update', 'submit', array('label' => 'profile.edit.submit', 'translation_domain' => 'FOSUserBundle'))
        ;
    }
    
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';

    }

    public function getBlockPrefix()
    {
        return 'msi_user_edit_password';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
     
}
