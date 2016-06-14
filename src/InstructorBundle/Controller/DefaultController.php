<?php

namespace InstructorBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use InstructorBundle\Entity\Assignment;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('InstructorBundle:Default:index.html.twig');
    }

    public function create_assignmentAction(Request $request){

        $assignment = new Assignment();

        $form = $this->createFormBuilder($assignment)
            ->add('AssignmentID',TextType::class)
            ->add('ClassID',TextType::class)
            ->add('DueDate',DateType::class)
            ->add('DueTime',TimeType::class)
            ->add('TotalMarks',IntegerType::class)
            ->add('Firstemail',EmailType::class)
            ->add('emails',CollectionType::class,array(
                'entry_type' => TextType::class,
                'allow_add' => true,
            ))
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            // ... perform some action, such as saving the task to the database
            $assignmentid = $form['AssignmentID']->getData();
            $classid = $form['ClassID']->getData();
            $duedate = $form['DueDate']->getData();
            $duetime = $form['DueTime']->getData();
            $totalmarks = $form['TotalMarks']->getData();
            $firstmail = $form['Firstemail']->getData();
            $newmails = $form['emails']->getData();

            $response = $this->forward('MainBundle:Default:saveassignment', array(
                'assignmentid' => $assignmentid,
                'classid' => $classid,
                'duedate' => $duedate,
                'duetime' => $duetime,
                'totalmarks' =>$totalmarks,
                'firstmail' => $firstmail,
                'newmails' => $newmails,
            ));
            // ... further modify the response or return it directly
            return $response;
            /*return $this->render('StudentBundle:Pages:myhome.html.twig');*/
        }

        return $this->render('InstructorBundle:Pages:insAssignment.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
