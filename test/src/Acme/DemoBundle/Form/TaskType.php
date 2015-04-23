<?php
/**
 * Created by PhpStorm.
 * User: harvey
 * Date: 15-4-23
 * Time: 下午5:19
 */
// src/Acme/TaskBundle/Form/Type/TaskType.php
namespace Acme\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description');

        $builder->add('tags', 'collection', array('type' => new TagType()));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\DemoBundle\Entity\Task',
        ));
    }

    public function getName()
    {
        return 'task';
    }
}