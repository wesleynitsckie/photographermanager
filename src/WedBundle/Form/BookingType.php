<?php

namespace WedBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BookingType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('bookingDateTime')
            ->add('name')
            ->add('client','entity', array(
                'class' => 'WedBundle:Client',
                'property' => 'firstName'
            ))
            ->add('type','entity', array(
                'class' => 'WedBundle:Type',
                'property' => 'name'
            ))
            ->add('latlng', 'oh_google_maps')
            ->add('location')
            ->add('isComplete')

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WedBundle\Entity\Booking'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wedbundle_booking';
    }
}
