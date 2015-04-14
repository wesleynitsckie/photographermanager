<?php

namespace WedBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BillingController extends Controller
{
    /**
     * @Route("/", name="_billing")
     * @Template()
     */
    public function indexAction()
    {
        return array(
                // ...
            );    }

}
