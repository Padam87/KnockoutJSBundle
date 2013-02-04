<?php
namespace Padam87\KnockoutJSBundle\Twig\Extension;

use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("twig.extension.knockout")
 * @DI\Tag("twig.extension")
 */
class KnockoutExtension extends \Twig_Extension
{
    public $environment;

    /**
     * {@inheritdoc}
     */
    public function initRuntime(\Twig_Environment $environment)
    {
        $this->environment = $environment;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            'knockout'   => new \Twig_Function_Method($this, 'createViewModel'),
        );
    }

    public function createViewModel($params, $script = true)
    {
        $knockout = $this->environment->render("Padam87KnockoutJSBundle::knockout.js.twig", $params);

        if ($script === true) {
            return '<script>' . $knockout . '</script>';
        }

        return $knockout;
    }

    public function getName()
    {
        return 'knockout';
    }
}
