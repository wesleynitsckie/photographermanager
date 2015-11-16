<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\Controller\FOSRestController;

class BookingsController extends FOSRestController
{
    /**
     * @Route("/list")
     * @Template()
     */
    public function getListAction()
    {
        return array(
                // ...
            );    }

}
