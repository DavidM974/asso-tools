<?php

namespace MSI\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ParameterType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('logoFile', 'vich_image', array(
                    'required' => false,
                    'allow_delete' => true, // not mandatory, default is true
                    'download_link' => true, // not mandatory, default is true
                    'label' => ' ',
                ))
                ->add('imageLogin1File', 'vich_image', array(
                    'required' => false,
                    'allow_delete' => true, // not mandatory, default is true
                    'download_link' => true, // not mandatory, default is true
                    'label' => ' '
                ))
                ->add('imageLogin2File', 'vich_image', array(
                    'required' => false,
                    'allow_delete' => true, // not mandatory, default is true
                    'download_link' => true, // not mandatory, default is true
                    'label' => ' '
                ))
                ->add('imageLogin3File', 'vich_image', array(
                    'required' => false,
                    'allow_delete' => true, // not mandatory, default is true
                    'download_link' => true, // not mandatory, default is true
                    'label' => ' '
                ))
                ->add('Envoyer', 'submit')
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'MSI\CoreBundle\Entity\Parameter',
        ));
    }

}
