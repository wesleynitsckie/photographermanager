<?php

namespace WedBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ShootsController extends Controller
{
    /**
     * @Route("/book", name="_shoots_book")
     * @Template("WedBundle:Shoots:book.html.twig")
     */
    public function bookAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/", name="_shoots")
     * @Template("WedBundle:Shoots:index.html.twig")
     */
    public function indexAction()
    {
        return array(
                // ...
            );    }

}
