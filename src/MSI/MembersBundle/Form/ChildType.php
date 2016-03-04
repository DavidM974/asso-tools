<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MSI\MembersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

/**
 * Description of ChildType
 *
 * @author David
 */
class ChildType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('firstname', TextType::class, array('label' => 'msi.user.edit.firstname', 'translation_domain' => 'Profile', 'required' => false))
                ->add('lastname', TextType::class, array('label' => 'msi.user.edit.lastname', 'translation_domain' => 'Profile', 'required' => false))
                ->add('birth', BirthdayType::class, array('label' => 'msi.members.birth', 'translation_domain' => 'Members', 'required' => false, 'placeholder' => array(
                        'year' => 'msi.members.year',
                        'month' => 'msi.members.month',
                        'day' => 'msi.members.day',
                    ))
                )
                ->add('sex', ChoiceType::class, array('label' => 'Sexe ',
                    'multiple' => false,
                    'expanded' => true,
                    'choices' => array(
                        0 => '<i class="fa fa-female" style = "font-size: 24px;"></i>',
                        1 => '<i class="fa fa-male" style = "font-size: 24px;"></i>',
                    ),
                    'required' => false,
                    'empty_value' => false // delete the none field
                ))
                ->add('scolar_category', EntityType::class, array(
                    'class' => 'MSIMembersBundle:Scolar_categories',
                    'choice_label' => 'label',
                    'label' => 'msi.members.scolar.category',
                    'required' => false,
                    'translation_domain' => 'Members'
                )
                        )
        ;
    }

    public function getBlockPrefix() {
        return 'msi_member_add_child';
    }

    // For Symfony 2.x
    public function getName() {
        return $this->getBlockPrefix();
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'MSI\MembersBundle\Entity\Child',
        ));
    }

}
