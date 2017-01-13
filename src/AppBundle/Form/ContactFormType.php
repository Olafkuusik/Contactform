<?php

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('birthday', DateType::class, [
                'widget' => 'single_text'
    ])
            ->add('phonenumber')
            ->add('address')
            ->add('isFamily');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Contacts'
        ]);
    }

    public function getName()
    {
        return 'app_bundle_contact_form_type';
    }
}
