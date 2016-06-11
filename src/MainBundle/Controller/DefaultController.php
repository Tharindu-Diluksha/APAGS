<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MainBundle\Controller\FileHandle;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	RunPython::run();
        return $this->render('MainBundle:Default:index.html.twig');
    }

    public function writefileAction($text)
    {

    	/*$text = $request->attributes->get('text');*/
    	FileHandle::writeToFile($text);
    	return $this->render('MainBundle:Default:index.html.twig');
    }

    public function writetofileAction($text){

        $filehandle = new FileHandle();
        $filehandle->writeToFile($text);
        return $this->render('MainBundle:Default:index.html.twig');
    }


}
