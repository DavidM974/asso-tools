<?php

namespace MSI\MembersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class MembersFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
                ->add('firstname', TextType::class, array('label' => 'msi.user.edit.firstname', 'translation_domain' => 'Profile', 'required' => false))
                ->add('lastname', TextType::class, array('label' => 'msi.user.edit.lastname', 'translation_domain' => 'Profile', 'required' => false))
                ->add('familySituation', ChoiceType::class, array(
                    'label' => 'msi.members.family.situation',
                    'translation_domain' => 'Members',
                    'multiple' => false,
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
                ->add('birth', BirthdayType::class, array('label' => 'msi.members.birth', 'translation_domain' => 'Members', 'required' => false, 'placeholder' => array(
                        'year' => 'msi.members.year',
                        'month' => 'msi.members.month',
                        'day' => 'msi.members.day',
                    ))
                )
                ->add('legalResponsable', TextType::class, array('label' => 'msi.members.legalResponsable', 'translation_domain' => 'Members', 'required' => false))
                ->add('phone', TextType::class, array('label' => 'msi.user.edit.phone', 'translation_domain' => 'Profile', 'required' => false))
                ->add('mobile', TextType::class, array('label' => 'msi.user.edit.mobile', 'translation_domain' => 'Profile', 'required' => false))
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
                ->add('email', EmailType::class, array('label' => 'Email ', 'required' => false,))
                ->add('address', TextareaType::class, array('label' => 'msi.user.edit.address', 'translation_domain' => 'Profile', 'required' => false))
                /* ->add('zipcode', EntityType::class, array(
                  'class' => 'MSICoreBundle:Zipcode',
                  'choice_label' => 'zipcode'
                  )) */
                ->add('city', EntityType::class, array(
                    'class' => 'MSICoreBundle:City',
                    'choice_label' => 'label',
                    'label' => 'msi.members.city',
                    'required' => false
                ))
                ->add('baptism_date',TextType::class, array('label' => 'msi.members.baptism.date', 'translation_domain' => 'Members', 'required' => false,))
                ->add('imageFile', 'vich_image', array(
                    'label' => 'msi.user.edit.avatar',
                    'translation_domain' => 'Profile',
                    'required' => false,
                    'allow_delete' => true, // not mandatory, default is true
                    'download_link' => true, // not mandatory, default is true
                ))
                ->add('professional_social_category', EntityType::class, array(
                    'class' => 'MSIMembersBundle:Pro_social_categories',
                    'choice_label' => 'label',
                    'label' => 'msi.members.psc',
                    'required' => false
                ))
                ->add('born_again_date', TextType::class, array('label' => 'msi.members.born.again', 'translation_domain' => 'Members', 'required' => false,))
                ->add('baptism_localisation', TextType::class, array('label' => 'msi.members.baptism.localisation', 'translation_domain' => 'Members', 'required' => false))
                ->add('services', EntityType::class, array(
                    'multiple' => true,
                    'expanded' => false,
                    'class' => 'MSIMembersBundle:Services',
                    'choice_label' => 'label',
                    'required' => false,
                    'label' => 'msi.members.services',
                    'translation_domain' => 'Members'
                    
                ))
                ->add('imageGrant', CheckboxType::class, array('label' => 'msi.members.image.grant', 'translation_domain' => 'Members', 'required' => false,))
                ->add('add', SubmitType::class, array('label' => 'msi.members', 'translation_domain' => 'Members'))
                ->add('marriedTo', EntityType::class, array(
                    'class' => 'MSIMembersBundle:Member',
                    'choice_label' => 'firstname', // prénom et adresse
                    'label' => 'msi.members.marriedTo',
                    'translation_domain' => 'Members',
                    'required' => false
                ))
                ->add('childs', CollectionType::class, array(
                    'entry_type' => ChildType::class,
                    'allow_add'    => true,
                    'allow_delete' => true
                ))
        ;
    }

    public function getBlockPrefix() {
        return 'msi_member_add';
    }

    // For Symfony 2.x
    public function getName() {
        return $this->getBlockPrefix();
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'MSI\MembersBundle\Entity\Member',
        ));
    }

}
