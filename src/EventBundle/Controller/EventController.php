<?php

namespace EventBundle\Controller;


use EventBundle\Entity\Evenement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Event controller.
 *
 * @Route("event")
 */
class EventController extends Controller
{

    /**
     * Lists all event entities.
     *
     * @Route("/", name="event_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        return $this->render('EventBundle:event:index.html.twig');

    }

    /**
     * Creates a new event entity.
     *
     * @Route("/new", name="event_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $event = new Evenement();
        $form = $this->createForm('EventBundle\Form\EvenementType', $event);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($event);
            $em->flush();

        }
            return $this->render('EventBundle:event:new.html.twig', array(
                'event' => $event,
                'form' => $form->createView(),
            ));

    }

    /**
     * Finds and displays a event entity.
     *
     * @Route("/{idEvenement}", name="event_show")
     * @Method("GET")
     */
    public function showAction(Evenement $event )
    {
        $deleteForm = $this->createDeleteForm($event);

        return $this->render('EventBundle:event:show.html.twig', array(
            'event' => $event,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing event entity.
     *
     * @Route("/{idEvenement}/edit", name="demande_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Evenement $event )
    {

    }

    /**
     * Deletes a event entity.
     *
     * @Route("/{idEvenement}", name="event_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Evenement $event )
    {

    }

    /**
     * Creates a form to delete a event entity.
     *
     * @param Evenement $event The event entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Evenement $event )
    {

    }
}
