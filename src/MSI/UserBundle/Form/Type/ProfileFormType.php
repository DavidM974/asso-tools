<?php

namespace MSI\UserBundle\Form\Type;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;
 
class ProfileFormType extends BaseType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder->add('firstname', null, array('label' => 'msi.user.edit.firstname', 'translation_domain' => 'Profile','required' => false))
                ->add('lastname', null, array('label' => 'msi.user.edit.lastname', 'translation_domain' => 'Profile','required' => false))
                ->add('civility', 'choice', array(
                    'label' => 'msi.user.edit.civility', 
                    'translation_domain' => 'Profile',
                    'choices' => array(
                        'M' => 'msi.user.edit.m',
                        'MME' => 'msi.user.edit.mme',
                        'MLLE' => 'msi.user.edit.mlle'
                    ),
                    'required' => false
                ))
                ->add('birth', 'date', array('label' => 'msi.user.edit.birth',
                                                    'translation_domain' => 'Profile',
                                                    'format' => 'dd/MM/yyyy',
                                                    'attr' => array('class' => 'date'),
                                                    'required' => false,
                                                    'years' => range(1920, date('Y'))
                ))
                ->add('phone', null, array('label' => 'msi.user.edit.phone', 'translation_domain' => 'Profile','required' => false))
                ->add('mobile', null, array('label' => 'msi.user.edit.mobile', 'translation_domain' => 'Profile','required' => false))
                ->add('address', 'textarea', array('label' => 'msi.user.edit.address', 'translation_domain' => 'Profile','required' => false))
                ->add('update', 'submit', array('label' => 'profile.edit.submit', 'translation_domain' => 'FOSUserBundle'))
        ;
    }
    
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';

    }

    public function getBlockPrefix()
    {
        return 'msi_user_profile';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
     
}