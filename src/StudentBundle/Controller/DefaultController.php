<?php

namespace StudentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('StudentBundle:Default:index.html.twig');
    }

    public function myhomeAction()
    {
    	return $this->render('StudentBundle:Pages:myhome.html.twig');
    }

    public function runmeAction()
    {
    	return $this->render('StudentBundle:Pages:runme.html.twig');
    }
}
