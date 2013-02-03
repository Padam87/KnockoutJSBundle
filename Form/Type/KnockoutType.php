<?php

namespace Padam87\KnockoutJSBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("form.type.knockout")
 * @DI\Tag("form.type", attributes = { "alias" = "knockout" })
 */
class KnockoutType extends CollectionType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        if ($options['allow_add'] && $options['prototype']) {
            $prototype = $builder->create('__id__', $options['type'], $options['options']);
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
