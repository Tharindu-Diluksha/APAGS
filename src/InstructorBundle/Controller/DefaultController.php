<?php

namespace InstructorBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use InstructorBundle\Entity\Assignment;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('InstructorBundle:Default:index.html.twig');
    }

    public function create_assignmentAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT T.id
            FROM MainBundle:AssignmentDB T
            ORDER BY T.id DESC'
        );
        $lastid = $query->setMaxResults(1)->getOneOrNullResult();

        $assignment = new Assignment();

        $assignment->setAssignmentid($lastid['id']+1);

        $form = $this->createFormBuilder($assignment)
            ->add('AssignmentID',TextType::class, array('label' => false))
            ->add('ClassID',TextType::class, array('label' => false))
            ->add('Description',TextareaType::class, array('label' => false,'attr' => array('cols' => '100', 'rows'
            => '10'),))
            ->add('DueDate',DateType::class, array('label' => false))
            ->add('DueTime',TimeType::class, array('label' => false))
            ->add('TotalMarks',IntegerType::class, array('label' => false))
            ->add('Nooftestcases',IntegerType::class, array('label' => false))
            ->add('Testcasetype',ChoiceType::class,array(
                'choices'  => array(
                    'Only Output' => 'oo',
                    'Input & Output' => 'io',
                ),
                'label' => false,
            ))
            ->add('inputs',CollectionType::class,array(
                'entry_type' => TextType::class,
                'allow_add' => true,
                'label' => false,
            ))
            ->add('outputs',CollectionType::class,array(
                'entry_type' => TextType::class,
                'allow_add' => true,
                'label' => false,
            ))
            ->add('testcasemarks',CollectionType::class,array(
                'entry_type' => IntegerType::class,
                'allow_add' => true,
                'label' => false,
            ))
            ->add('save', SubmitType::class, array('label' => 'Create Assignment'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            // ... perform some action, such as saving the task to the database
            $assignmentid = $form['AssignmentID']->getData();
            $classid = $form['ClassID']->getData();
            $description = $form['Description']->getData();
            $duedate = $form['DueDate']->getData();
            $duetime = $form['DueTime']->getData();
            $totalmarks = $form['TotalMarks']->getData();
            $testcasetype = $form['Testcasetype']->getData();
            $inputs = $form['inputs']->getData();
            $outputs = $form['outputs']->getData();
            $testcasemarks = $form['testcasemarks']->getData();

            $response = $this->forward('MainBundle:Default:saveassignment', array(
                'assignmentid' => $assignmentid,
                'classid' => $classid,
                'description' => $description,
                'duedate' => $duedate,
                'duetime' => $duetime,
                'totalmarks' =>$totalmarks,
                'testcasetype' => $testcasetype,
                'inputs' => $inputs,
                'outputs' => $outputs,
                'testcasemarks' => $testcasemarks,
            ));
            // ... further modify the response or return it directly
            return $response;



        }

        return $this->render('InstructorBundle:Pages:insAssignment.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
