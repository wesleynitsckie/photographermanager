<?php

namespace WedBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use WedBundle\Entity\BusinessProfile;
use WedBundle\Form\BusinessProfileType;

/**
 * BusinessProfile controller.
 *
 *
 */
class BusinessProfileController extends Controller
{

    /**
     * Lists all BusinessProfile entities.
     *
     * @Route("/", name="businessprofile")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        //Find this user's business profile
        $user = $this->container->get('security.context')->getToken()->getUser();
        $entity = $user->getBusinessProfile();
        return array(
            'entity'      => $entity,
        );
    }
    /**
     * Creates a new BusinessProfile entity.
     *
     * @Route("/", name="businessprofile_create")
     * @Method("POST")
     * @Template("WedBundle:BusinessProfile:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BusinessProfile();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user = $this->container->get('security.context')->getToken()->getUser();
            $entity->setUser($user);
            $entity->upload();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('businessprofile_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a BusinessProfile entity.
     *
     * @param BusinessProfile $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(BusinessProfile $entity)
    {
        $form = $this->createForm(new BusinessProfileType(), $entity, array(
            'action' => $this->generateUrl('businessprofile_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BusinessProfile entity.
     *
     * @Route("/new", name="businessprofile_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BusinessProfile();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BusinessProfile entity.
     *
     * @Route("/{id}", name="businessprofile_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WedBundle:BusinessProfile')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BusinessProfile entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BusinessProfile entity.
     *
     * @Route("/edit", name="businessprofile_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WedBundle:BusinessProfile')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BusinessProfile entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a BusinessProfile entity.
    *
    * @param BusinessProfile $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BusinessProfile $entity)
    {
        $form = $this->createForm(new BusinessProfileType(), $entity, array(
            'action' => $this->generateUrl('businessprofile_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BusinessProfile entity.
     *
     * @Route("/{id}", name="businessprofile_update")
     * @Method("PUT")
     * @Template("WedBundle:BusinessProfile:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WedBundle:BusinessProfile')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BusinessProfile entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('businessprofile_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BusinessProfile entity.
     *
     * @Route("/{id}", name="businessprofile_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WedBundle:BusinessProfile')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BusinessProfile entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('businessprofile'));
    }

    /**
     * Creates a form to delete a BusinessProfile entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('businessprofile_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
