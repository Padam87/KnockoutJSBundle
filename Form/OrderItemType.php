<?php

namespace Padam87\KnockoutJSBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;

class OrderItemType extends \Padam87\BaseBundle\Form\OrderItemType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Padam87\BaseBundle\Entity\OrderItem'
        );
    }

    public function getName()
    {
        return 'order';
    }
}
