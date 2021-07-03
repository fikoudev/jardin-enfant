<?php

namespace ClassBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ClassBundle:Default:index.html.twig');
    }
}
