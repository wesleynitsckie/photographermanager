<?php
namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SeperateMeUser extends AbstractType
{
    /**
     *  Builds the form for the Seperate.Me user
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('task')
            ->add('dueDate', null, array('widget' => 'single_text'))
            ->add('save', 'submit');
    }

    /**
     * Returns the name of the form
     *
     * @return string
     */
    public function getName()
    {
        return 'seperateme_user_registeration';
    }
}

?>