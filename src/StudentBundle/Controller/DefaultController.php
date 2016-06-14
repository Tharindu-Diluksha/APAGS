<?php

namespace StudentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use StudentBundle\Entity\Task;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

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

    public function runmeAction(Request $request)
    {
        $task = new Task();

        $form = $this->createFormBuilder($task)
            ->add('task', TextareaType::class, array('attr' => array('cols' => '100', 'rows' => '50'),))
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // ... perform some action, such as saving the task to the database
            $data = $form['task']->getData();

            $response = $this->forward('MainBundle:Default:runfile', array(
                'text'  => $data,
            ));

            // ... further modify the response or return it directly

            return $response;

        }


        return $this->render('StudentBundle:Pages:runme.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function runmetestAction(Request $request){

        // create a task to write python file
        $task = new Task();

        $form = $this->createFormBuilder($task)
            ->add('task', TextareaType::class, array('attr' => array('cols' => '100', 'rows' => '50'),))
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // ... perform some action, such as saving the task to the database
            $data = $form['task']->getData();

            $response = $this->forward('MainBundle:Default:writetofile', array(
                'text'  => $data,
            ));

            // ... further modify the response or return it directly

            return $response;

        }


        return $this->render('StudentBundle:Pages:runmetest.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}
