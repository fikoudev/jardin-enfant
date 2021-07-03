<?php

namespace EnfantBundle\Controller;



use EnfantBundle\Entity\Enfant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Enfant controller.
 *
 * @Route("enfant")
 */
class EnfantController extends Controller
{
    /**
     * Lists all enfant entities.
     *
     * @Route("/", name="enfant_index")
     * @Method("GET")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $isAdmin = $this->isGranted('ROLE_ADMIN');


        return $this->render('EnfantBundle:enfant:index.html.twig');
    }
    /**
     * Creates a new enfant entity.
     *
     * @Route("/new", name="enfant_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $enfant = new Enfant();

        $form = $this->createForm('EnfantBundle\Form\EnfantType', $enfant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($enfant);
            $em->flush();


            return $this->redirectToRoute('enfant_index', array('idEnfant' => $enfant->getIdEnfant()));
        }

        return $this->render('EnfantBundle:enfant:new.html.twig', array(
            'enfant' => $enfant,
            'form' => $form->createView(),
        ));

    }

}
