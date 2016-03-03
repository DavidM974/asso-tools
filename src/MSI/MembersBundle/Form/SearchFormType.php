<?php

namespace MSI\MembersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotBlank;

class SearchFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
                ->add('firstname', TextType::class, array('label' => 'msi.user.edit.firstname', 'translation_domain' => 'Profile', 'required' => false))
                ->add('lastname', TextType::class, array('label' => 'msi.user.edit.lastname', 'translation_domain' => 'Profile', 'required' => false))
                ->add('familySituation', ChoiceType::class, array(
                    'label' => 'msi.members.family.situation',
                    'translation_domain' => 'Members',
                    'multiple' => true,
                    'expanded' => true,
                    'choices' => array(
                        'S' => 'msi.members.civility.single',
                        'M' => 'msi.members.civility.maried',
                        'V' => 'msi.members.civility.veuf',
                        'D' => 'msi.members.civility.divorce',
                        'R' => 'msi.members.civility.remaried'
                    ),
                    'required' => false,
                    'empty_value' => false // delete the none field
                ))
                ->add('phone', NumberType::class, array('label' => 'msi.user.edit.phone', 'translation_domain' => 'Profile', 'required' => false))
                ->add('mobile', NumberType::class, array('label' => 'msi.user.edit.mobile', 'translation_domain' => 'Profile', 'required' => false))
                ->add('sex', ChoiceType::class, array('label' => 'Sexe ',
                    'multiple' => true,
                    'expanded' => false,
                    'choices' => array(
                        0 => '<i class="fa fa-female" style = "font-size: 24px;"></i>',
                        1 => '<i class="fa fa-male" style = "font-size: 24px;"></i>',
                    ),
                    'required' => false,
                    'empty_value' => false // delete the none field
                ))
                ->add('email', EmailType::class, array('label' => 'Email ', 'required' => false,))
                ->add('address', TextareaType::class, array('label' => 'msi.user.edit.address', 'translation_domain' => 'Profile', 'required' => false))
                ->add('zipcode', EntityType::class, array(
                    'class' => 'MSICoreBundle:Zipcode',
                    'choice_label' => 'zipcode'
                ))
                ->add('city', EntityType::class, array(
                    'class' => 'MSICoreBundle:City',
                    'choice_label' => 'label'
                ))
                ->add('activeMember', CheckboxType::class, array('label' => 'msi.member.active', 'required' => false,))
                ->add('age_start', TextType::class, array('label' => 'msi.members.tranche ', 'required' => false,))
                ->add('age_end', TextType::class, array('label' => 'msi.members.tranche ', 'required' => false,))
                ->add('professional_social_category', EntityType::class, array(
                    'multiple' => true,
                    'expanded' => true,
                    'class' => 'MSIMembersBundle:Pro_social_categories',
                    'choice_label' => 'label'
                ))
                ->add('date_debut', TextType::class, array('label' => 'msi.members.date_debut ', 'required' => false,))
                ->add('date_fin', TextType::class, array('label' => 'msi.members.date_fin', 'required' => false,))
                ->add('services', EntityType::class, array(
                    'multiple' => true,
                    'expanded' => false,
                    'class' => 'MSIMembersBundle:Services',
                    'choice_label' => 'label',
                    'required' => false
                ))
                ->add('baptised', ChoiceType::class, array(
                    'label' => 'msi.members.isbaptised',
                    'translation_domain' => 'Members',
                    'multiple' => false,
                    'expanded' => true,
                    'choices' => array(
                        'ALL' => 'msi.members.civility.single',
                        'YES' => 'msi.members.civility.maried',
                        'NO' => 'msi.members.civility.veuf',
                    ),
                    'required' => false,
                    'empty_value' => false // delete the none field
                ))
                ->add('scolar_category', ChoiceType::class, array(
                    'label' => 'msi.members.isbaptised',
                    'translation_domain' => 'Members',
                    'multiple' => false,
                    'expanded' => true,
                    'class' => 'MSIMembersBundle:Scolar_categories',
                    'empty_value' => 'Tous',
                    'choice_label' => 'label',
                    'required' => false,
                        )
                )
                ->add('result_type', ChoiceType::class, array(
                    'label' => 'msi.members.result_type',
                    'translation_domain' => 'Members',
                    'multiple' => false,
                    'expanded' => true,
                    'choices' => array(
                        'list' => 'msi.members.result.list',
                        'barChart' => 'msi.members.result.bar',
                        'areaChart' => 'msi.members.result.area',
                        'lineChart' => 'msi.members.result.line',
                    ),
                    'constraints' => array(
                        new NotBlank(),
                    ),
                    'empty_value' => false // delete the none field
                ))
                ->add('search', SubmitType::class, array('label' => 'msi.members.submit', 'translation_domain' => 'Members'))
        ;
    }

    public function getBlockPrefix() {
        return 'msi_member_search';
    }

    // For Symfony 2.x
    public function getName() {
        return $this->getBlockPrefix();
    }

    public function configureOptions(OptionsResolver $resolver) {
        
    }

}
