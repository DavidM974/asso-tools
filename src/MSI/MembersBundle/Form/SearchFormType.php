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
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class SearchFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
                ->add('firstname', TextType::class, array('label' => 'msi.user.edit.firstname', 'translation_domain' => 'Profile', 'required' => false))
                ->add('lastname', TextType::class, array('label' => 'msi.user.edit.lastname', 'translation_domain' => 'Profile', 'required' => false))
                ->add('familySituation', ChoiceType::class, array(
                    'label' => 'msi.members.family.situation',
                    'translation_domain' => 'Members',
                    'multiple' => true,
                    'expanded' => false,
                    'choices' => array(
                        'S' => 'msi.members.civility.single',
                        'M' => 'msi.members.civility.maried',
                        'V' => 'msi.members.civility.veuf',
                        'D' => 'msi.members.civility.divorce',
                        'R' => 'msi.members.civility.remaried'
                    ),
                    'required' => false,
                    'empty_value' => 'Tous' // delete the none field
                ))
                ->add('phone', NumberType::class, array('label' => 'msi.user.edit.phone', 'translation_domain' => 'Profile', 'required' => false))
                ->add('mobile', NumberType::class, array('label' => 'msi.user.edit.mobile', 'translation_domain' => 'Profile', 'required' => false))
                ->add('sex', ChoiceType::class, array('label' => 'Sexe ',
                    'multiple' => false,
                    'expanded' => true,
                    'choices' => array(
                        'ALL' =>'msi.members.all',
                        0 => '<i class="fa fa-female" style = "font-size: 24px;"></i>',
                        1 => '<i class="fa fa-male" style = "font-size: 24px;"></i>',
                    ),
                    'empty_value' => false,
                    'data' => 'ALL',
                    'required' => false,
                ))
                ->add('email', EmailType::class, array('label' => 'Email ', 'required' => false,))
                ->add('address', TextareaType::class, array('label' => 'msi.user.edit.address', 'translation_domain' => 'Profile', 'required' => false))
                ->add('zipcode', EntityType::class, array(
                    'class' => 'MSICoreBundle:Zipcode',
                    'choice_label' => 'zipcode',
                    'required' => false,
                    'empty_value' => 'Tous'
                ))
                ->add('city', EntityType::class, array(
                    'class' => 'MSICoreBundle:City',
                    'choice_label' => 'label',
                    'required' => false,
                    'empty_value' => 'Tous'
                ))
                ->add('activeMember', ChoiceType::class, array(
                    'label' => 'msi.members.active',
                    'translation_domain' => 'Members',
                    'multiple' => false,
                    'expanded' => true,
                    'choices' => array(
                        'ALL' => 'msi.members.all',
                        'YES' => 'msi.members.yes',
                        'NO' => 'msi.members.no',
                    ),
                    'data' => 'ALL',
                    'required' => false,
                    'empty_value' => false // delete the none field
                ))
                ->add('age_start', HiddenType::class, array('label' => 'msi.members.tranche ', 'required' => false,))
                ->add('age_end', HiddenType::class, array('label' => 'msi.members.tranche ', 'required' => false,))
                ->add('professional_social_category', EntityType::class, array(
                    'multiple' => true,
                    'expanded' => false,
                    'class' => 'MSIMembersBundle:Pro_social_categories',
                    'choice_label' => 'label',
                    'required' => false,
                    'empty_value' => 'Tous'
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
                        'ALL' => 'msi.members.all',
                        'YES' => 'msi.members.yes',
                        'NO' => 'msi.members.no',
                    ),
                    'data' => 'ALL',
                    'required' => false,
                    'empty_value' => false // delete the none field
                ))
                ->add('result_type', ChoiceType::class, array(
                    'label' => 'msi.members.result_type',
                    'translation_domain' => 'Members',
                    'multiple' => false,
                    'expanded' => true,
                    'choices' => array(
                        'list' => '<i class="fa fa-list"></i>',
                        'barChart' => '<i class="fa fa-area-chart"></i>',
                        'areaChart' => '<i class="fa fa-bar-chart"></i>',
                        'lineChart' => '<i class="fa fa-line-chart"></i>',
                    ),
                    'data' => 'list',
                    'constraints' => array(
                        new NotBlank(),
                    ),
                    
                    'empty_value' => false // delete the none field
                ))
                ->add('search', SubmitType::class, array('label' => 'msi.members.search', 'translation_domain' => 'Members'))
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
