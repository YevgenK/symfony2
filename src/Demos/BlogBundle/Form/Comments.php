<?php
/**
 * Created by JetBrains PhpStorm.
 * User: YevgenK
 * Date: 30.06.13
 * Time: 21:21
 * To change this template use File | Settings | File Templates.
 */

namespace Demos\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class Comments extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('comment');
        $builder->add('dueDate', null, array('widget' => 'single_text'));
    }

    public function getName()
    {
        return 'comment';
    }
}