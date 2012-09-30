<?php

namespace Padam87\KnockoutJSBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\Extension\Core\EventListener\ResizeFormListener;

class KnockoutType extends \Symfony\Component\Form\Extension\Core\Type\CollectionType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        if ($options['allow_add'] && $options['prototype']) {
            $prototype = $builder->create('${id}', $options['type'], $options['options']);
            $builder->setAttribute('prototype', $prototype->getForm());
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'knockout';
    }
}
