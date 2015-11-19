<?php

namespace WedBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use WedBundle\Form\BusinessType;

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

    /**
     * @Route("/businessprofile2", name="2businessProfile")
     * @Template()
     */
    public function businessProfileAction(Request $request){
        $user = $this->container->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new BusinessType(), $user);
        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted()) {

            //var_dump('form submitted');die;
            $em = $this->getDoctrine()->getManager();
            $user->upload();
            $em->persist($user);
            $em->flush();
        }
        return array('form' => $form->createView());

    }
}
