<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MainBundle\Controller as maincont;
use MainBundle\Resources\Entity\User;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AdminBundle:Default:index.html.twig');
    }

    public function userCreateAction(){
    	$user = new User();
    	$user->setUserId("0002");
		$user->setRole("A");
		$user->setPassword("1234");

    	CreateUser::saveUser($user);
        return $this->render('AdminBundle:Default:index.html.twig');
	}
}
