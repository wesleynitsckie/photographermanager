<?php

namespace WedBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CalendarController extends Controller
{
    /**
     * @Route("/", name="_calendar")
     * @Template()
     */
    public function indexAction()
    {
        return array(
                // ...
            );    }

}
