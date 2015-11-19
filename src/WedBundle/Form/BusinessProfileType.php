<?php

namespace WedBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BusinessProfileType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('data' => 'Nitsckie Photography'))
            ->add('address', 'textarea', array('required' =>false,'data' => '34 Botha Stree'))
            ->add('url', 'url', array('label' => 'Website URL', 'required' =>false, 'data' => 'http://www.nitsckiephotography.co.za'))
            ->add('facebookUrl', 'url', array('label' => 'FaceBook Page URL', 'required' =>false, 'data' => 'http://facebook.com/pages/nitsckiephotography'))
            ->add('twitterId','text', array('required' =>false, 'data' => 'nitsckiephot'))
            ->add('email', 'email', array('label' => 'Business Email', 'required' =>false, 'data' => 'info@nitsckiephotography.co.za') )
            ->add('about', 'textarea', array('required' =>false,'data' => 'Default value'))
            ->add('packages','textarea',  array(
                    'attr' => array('class' => 'tinymce'),
                    'required' =>false,
                    'data' => 'Default value'
                )
            )
            ->add('file', 'file', array('label' => 'Logo', 'required' =>false));

    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WedBundle\Entity\BusinessProfile'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wedbundle_businessprofile';
    }
}
