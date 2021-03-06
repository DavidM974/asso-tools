<?php

namespace MSI\UserBundle\Form\Type;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;
use \MSI\CoreBundle\Form\ImageType;
 
class avatarUserFormType extends BaseType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder->remove('current_password')
                ->remove('username')
                ->remove('email')
                ->add('imageFile', 'vich_image', array(
                        'label'             => 'msi.user.edit.avatar',
                        'translation_domain'=> 'Profile',
                        'required'          => false,
                        'allow_delete'      => true, // not mandatory, default is true
                        'download_link'     => true, // not mandatory, default is true
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
        return 'msi_edit_avatar_user';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
     
}