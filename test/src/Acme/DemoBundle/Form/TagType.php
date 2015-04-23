<?php
/**
 * Created by PhpStorm.
 * User: harvey
 * Date: 15-4-23
 * Time: 下午5:17
 */
// src/Acme/TaskBundle/Form/Type/TagType.php
namespace Acme\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TagType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\DemoBundle\Entity\Tag',
        ));
    }

    public function getName()
    {
        return 'tag';
    }
}