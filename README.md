# KnockoutJS Bundle #

Integrates knockout.js into Symfony2, provides automatic code generation for collections.

## Simple example ##

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

Settings the knockout option to true enables the viewModel generation for this form.

I have added the items field with the KnockoutType, which extends the CollectionType, and is handled the same way as a collection.

## Installation

Please don't forget to install assets, and add the js to your page.

        <script src="{{ asset('bundles/padam87knockoutjs/js/knockout-2.1.0.js') }}"></script>

AppKernel:

        $bundles = array(
			...
            new Padam87\DDSlickBundle\Padam87KnockoutJSBundle(),
        );

Autoload:

		$loader->registerNamespaces(array(
		    ...
		    'Padam87'          => __DIR__.'/../vendor/bundles',
		));

config.yml:

		imports:
		    ...
		    - { resource: "@Padam87KnockoutJSBundle/Resources/config/config.yml" }

## Dependencies

None. For testing purposes I used my BaseBundle, if you want to test it, you have to include it in your composer.json file too. No deps...

## Stuff to do

- Make it work without building the whole form at once with {{ form_widget(form) }}

- Generator. Right now works for simple collection modifications(add, edit, remove), but it would be nice to have a generator, that just generates the js, and lets us fine tune it a bit.

