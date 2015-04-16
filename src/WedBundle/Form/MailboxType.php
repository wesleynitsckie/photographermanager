<?php

namespace WedBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MailboxType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('clientId')
            ->add('subject')
            ->add('body', 'textarea')
            ->add('created')
            ->add('parentId')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WedBundle\Entity\Mailbox'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wedbundle_mailbox';
    }
}
