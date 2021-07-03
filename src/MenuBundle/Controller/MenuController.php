<?php

namespace MenuBundle\Controller;


use MenuBundle\Entity\Menu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Menu controller.
 *
 * @Route("menu")
 */
class MenuController extends Controller
{
    /**
     * Lists all menu entities.
     *
     * @Route("/", name="menu_index")
     * @Method("GET")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $isAdmin = $this->isGranted('ROLE_ADMIN');
        if ($isAdmin) {
            $menus = $em->getRepository('MenuBundle:Menu')->findAll();
        } else {
            $menus = $em->getRepository('MenuBundle:Menu')->findBy(['userId' => $this->getUser()->getId()]);
        }

        return $this->render('MenuBundle:menu:index.html.twig', array(
            'menus' => $menus,
        ));
    }

    /**
     * Creates a new menu entity.
     *
     * @Route("/new", name="menu_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $menu = new Menu();
        $form = $this->createForm('MenuBundle\Form\MenuType', $menu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $menu->setUserId($this->getUser()->getId());
            $em->persist($menu);
            $em->flush();

            $mailer = $this->get('mailer');
            $message = (new \Swift_Message('Demande'))
                ->setFrom('farook.laabidi@gmail.com')
                ->setTo($this->getUser()->getEmail())
                ->setBody(
                    "Votre Menu est prise en considération et sera taité le plus tot possible"

                );

            $mailer->send($message);
            return $this->redirectToRoute('menu_index', array('idMenu' => $menu->getIdMenu()));
        }

        return $this->render('MenuBundle:menu:new.html.twig', array(
            'menu' => $menu,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a menu entity.
     *
     * @Route("/{idMenu}", name="menu_show")
     * @Method("GET")
     */
    public function showAction(Demande $menu)
    {
        $deleteForm = $this->createDeleteForm($menu);

        return $this->render('MenuBundle:menu:show.html.twig', array(
            'menu' => $menu,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing menu entity.
     *
     * @Route("/{idMenu}/edit", name="menu_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Menu $menu)
    {
        $deleteForm = $this->createDeleteForm($menu);
        $editForm = $this->createForm('MenuBundle\Form\MenuType', $menu);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $mailer = $this->get('mailer');
            $message = (new \Swift_Message('Menu'))
                ->setFrom('farook.laabidi@gmail.com')
                ->setTo($this->getUser()->getEmail())
                ->setBody(
                    "Votre Menu a été modifier et prise en considération et sera taité le plus tot possible"

                );

            $mailer->send($message);
            return $this->redirectToRoute('menu_index', array('idMenu' => $menu->getIdMenu()));
        }

        return $this->render('MenuBundle:menu:edit.html.twig', array(
            'menu' => $menu,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a menu entity.
     *
     * @Route("/{idMenu}", name="menu_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Menu $menu)
    {
        $form = $this->createDeleteForm($menu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($menu);
            $em->flush();

            $mailer = $this->get('mailer');
            $message = (new \Swift_Message('Menu'))
                ->setFrom('farook.laabidi@gmail.com')
                ->setTo($this->getUser()->getEmail())
                ->setBody(
                    "Votre Menu a été retiré "

                );

            $mailer->send($message);
        }

        return $this->redirectToRoute('menu_index');
    }

    /**
     * Creates a form to delete a menu entity.
     *
     * @param Menu $menu The menu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Menu $menu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('menu_delete', array('idMenu' => $menu->getIdMenu())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
