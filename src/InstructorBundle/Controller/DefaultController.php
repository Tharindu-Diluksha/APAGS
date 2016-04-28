<?php

namespace InstructorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('InstructorBundle:Default:index.html.twig');
    }
}
