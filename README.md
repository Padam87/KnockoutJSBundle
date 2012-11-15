# KnockoutJS Bundle #

Integrates knockout.js into Symfony2, provides automatic code generation for collections.

## Simple example ##

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

Settings the knockout option to true enables the viewModel generation for this form.

I have added the items field with the KnockoutType, which extends the CollectionType, and is handled the same way as a collection.

## Installation

###Composer:

    "padam87/knockout-js-bundle": "dev-master",

###AppKernel:

    $bundles = array(
		...
        new Padam87\KnockoutJSBundle\Padam87KnockoutJSBundle(),
    );

###config.yml:

	imports:
	    ...
	    - { resource: "@Padam87KnockoutJSBundle/Resources/config/config.yml" }

###Add the js to your page.

    <script src="{{ asset('bundles/padam87knockoutjs/js/knockout-2.1.0.js') }}"></script>

## Dependencies

None. For testing purposes I used my BaseBundle, if you want to test it, you have to include it in your composer.json file too. No deps...

## Stuff to do

- Make it work without building the whole form at once with {{ form_widget(form) }}

- Generator. Right now works for simple collection modifications(add, edit, remove), but it would be nice to have a generator, that just generates the js, and lets us fine tune it a bit.

