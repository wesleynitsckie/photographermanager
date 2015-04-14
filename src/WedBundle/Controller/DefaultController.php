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
        return array();
    }
}
