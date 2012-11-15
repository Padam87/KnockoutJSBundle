<?php

namespace Padam87\KnockoutJSBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Acme\PizzaBundle\Form\Type\CustomerType;
use Acme\PizzaBundle\Form\Type\OrderItemType;

class OrderFormType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('customer', new CustomerType())
            ->add('items', 'knockout', array(
                'type'         => new OrderItemType(),
                'allow_add'    => true,
                'allow_delete' => true,
                'prototype'    => true,
            ))
        ;
    }
	
	public function getDefaultOptions(array $options)
	{
		return array(
			'knockout' => true,
		);
	}

    public function getName()
    {
        return 'order';
    }
}