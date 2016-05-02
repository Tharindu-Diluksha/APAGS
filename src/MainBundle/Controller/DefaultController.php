<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	RunPython::run();
        return $this->render('MainBundle:Default:index.html.twig');
    }

    public function writefileAction($text)
    {
    	$text = $request->attributes->get('text');
    	FileHandle::writeToFile($text);
    	return $this->render('MainBundle:Default:index.html.twig');
    }
}
