<?php

namespace ClassBundle\Controller;


use ClassBundle\Entity\Classe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class controller.
 *
 * @Route("classe")
 */
class ClassController extends Controller
{

    /**
     * Lists all class entities.
     *
     * @Route("/", name="classe_index")
     * @Method("GET")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $isAdmin = $this->isGranted('ROLE_ADMIN');

        if ($isAdmin) {
            $classes = $em->getRepository('ClassBundle:Classe')->findAll();
        } else {
            $classes = $em->getRepository('ClassBundle:Classe')->findBy(['idClasse' => $this->getIdClasse()]);
        }


        return $this->render('ClassBundle:class:index.html.twig', array(
            'classes' => $classes,
        ));


    }

    /**
     * Creates a new classe entity.
     *
     * @Route("/new", name="classe_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $class = new Classe();

        $form = $this->createForm('ClassBundle\Form\ClasseType', $class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($class);
            $em->flush();


            return $this->redirectToRoute('classe_index', array('idClasse' => $class->getIdClasse()));
        }

        return $this->render('ClassBundle:class:new.html.twig', array(
            'class' => $class,
            'form' => $form->createView(),
        ));

    }
}
