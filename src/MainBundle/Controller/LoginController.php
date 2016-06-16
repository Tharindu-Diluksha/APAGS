<?php
/**
 * Created by PhpStorm.
 * User: Tharindu Diluksha
 * Date: 6/15/2016
 * Time: 8:39 PM
 */

namespace MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MainBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    public function loginAction(Request $request){

        $user = new User();

        $form = $this->createFormBuilder($user)
            ->add('id', TextType::class)
            ->add('password', PasswordType::class)
            /*->add('role', TextType::class)
            ->add('email', EmailType::class)*/
            ->add('login', SubmitType::class, array('label' => 'Login'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // ... perform some action, such as saving the task to the database
            $id = $form['id']->getData();
            $pwd = $form['password']->getData();

            $response = $this->forward('MainBundle:Default:logincontrol', array(
                'id'  => $id,
                'pwd' => $pwd,
            ));

            // ... further modify the response or return it directly

            return $response;

        }


        return $this->render('MainBundle:Pages:loginpage.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    public function registerAction(){
        return $this->render('MainBundle:Pages:register.html.twig');
    }
}