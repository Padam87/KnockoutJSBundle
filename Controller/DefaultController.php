<?php

namespace Padam87\KnockoutJSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Padam87\KnockoutJSBundle\Form\OrderFormType;

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

        $order = $em->getRepository('AcmePizzaBundle:Order')->findOneBy(array());
        
        $form = $this->createForm(new OrderFormType(), $order);
        
        if($this->getRequest()->getMethod() === 'POST') {
            $form->bindRequest($this->getRequest());
            
            $order = $form->getData();
            
            foreach($order->getItems() as $item) {
                $item->setOrder($order);
                $order->addItem($item);
                $em->persist($item);
            }
            
            $em->persist($order);
            $em->flush();
            
            $this->redirect($this->generateUrl("padam87_knockoutjs_default_index"));
        }
        
        return array(
            'form' => $form->createView()
        );
    }
}
