<?php

namespace WedBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * Test delete action
     *
     * @Route("/", name="_dashboard")
     * @Template("WedBundle:Default:index.html.twig")
     */
    public function indexAction()
    {
        $bookings = $this->getDoctrine()
            ->getRepository("WedBundle:Booking")
            ->findByisComplete(false);
        $clients = $this->getDoctrine()
            ->getRepository("WedBundle:Client")
            ->findAll();
        return array('bookings' => count($bookings),
                    'clients' => count($clients)
            );
    }
}
