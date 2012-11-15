<?php

namespace Padam87\KnockoutJSBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;

class OrderType extends \Padam87\BaseBundle\Form\OrderType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('items')
            ->add('items', 'knockout', array(
                'type'         => new \Padam87\BaseBundle\Form\OrderItemType(),
                'allow_add'    => true,
                'allow_delete' => true,
                'prototype'    => true,
                'by_reference'  => false,
            ))
        ;
    }
	
	public function getDefaultOptions(array $options)
	{
		return array(
			'knockout' => true,
            'data_class' => 'Padam87\BaseBundle\Entity\Order'
		);
	}

    public function getName()
    {
        return 'order';
    }
}