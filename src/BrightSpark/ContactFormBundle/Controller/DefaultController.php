<?php

namespace BrightSpark\ContactFormBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/contactform/")
     */
    public function indexAction()
    {
        return $this->render('ContactFormBundle:Default:index.html.twig');
    }
}
