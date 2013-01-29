<?php

namespace Padam87\KnockoutJSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Padam87\KnockoutJSBundle\Form\OrderType;

/**
 * @Route("/ko")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $order = $em->getRepository('Padam87BaseBundle:Order')->findOneBy(array());

        $form = $this->createForm(new OrderType(), $order);

        if ($this->getRequest()->getMethod() === 'POST') {
            $form->bindRequest($this->getRequest());

            $order = $form->getData();

            $em->persist($order);
            $em->flush();

            return $this->redirect($this->generateUrl("padam87_knockoutjs_default_index"));
        }

        return array(
            'form' => $form->createView()
        );
    }
}
