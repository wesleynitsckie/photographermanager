<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{


    /**
     * This is the search function for find a photographer by name
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Do a lookup for a photographer",
     *  filters={
     *      {"name"="name", "dataType"="string"}
     *  },
     * output="WedBundle\Entity\User"
     * )
     * @Route("/search")
     */
    public function getSearchAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $name = $request->get('name');
        $entities = $em->getRepository('WedBundle:User')
                ->createQueryBuilder('o')
                ->where('o.businessName LIKE :bname')
                ->setParameter('bname', $name)
                ->getQuery()
                ->getResult();
        return $entities;
    }

    /**
     * Link the client with the photographer
     *
     * @ApiDoc(
     *      resource=true,
     *      description="Do a lookup for a photographer",
     *      input="WedBundle\Form\ClientType",
     *      output="WedBundle\Entity\Client"
     * )
     * @Route("/link")
     */
    public function postLinkClientAction(){

    }

}
