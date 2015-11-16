<?php

namespace WedBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use WedBundle\Entity\Mailbox;
use WedBundle\Form\MailboxType;

/**
 * Mailbox controller.
 *
 * @Route("/")
 */
class MailboxController extends Controller
{

    /**
     * Lists all Mailbox entities.
     *
     * @Route("/", name="mailbox")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WedBundle:Mailbox')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Mailbox entity.
     *
     * @Route("/create", name="mailbox_create")
     * @Method("POST")
     * @Template("WedBundle:Mailbox:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Mailbox();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mailbox_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Mailbox entity.
     *
     * @param Mailbox $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Mailbox $entity)
    {
        $form = $this->createForm(new MailboxType(), $entity, array(
            'action' => $this->generateUrl('mailbox_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Mailbox entity.
     *
     * @Route("/new", name="mailbox_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Mailbox();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Mailbox entity.
     *
     * @Route("/{id}", name="mailbox_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WedBundle:Mailbox')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mailbox entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Mailbox entity.
     *
     * @Route("/{id}/edit", name="mailbox_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WedBundle:Mailbox')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mailbox entity.');
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
    * Creates a form to edit a Mailbox entity.
    *
    * @param Mailbox $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Mailbox $entity)
    {
        $form = $this->createForm(new MailboxType(), $entity, array(
            'action' => $this->generateUrl('mailbox_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Mailbox entity.
     *
     * @Route("/{id}", name="mailbox_update")
     * @Method("PUT")
     * @Template("WedBundle:Mailbox:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WedBundle:Mailbox')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mailbox entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('mailbox_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Mailbox entity.
     *
     * @Route("/{id}", name="mailbox_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WedBundle:Mailbox')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Mailbox entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl(''));
    }

    /**
     * Creates a form to delete a Mailbox entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mailbox_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
