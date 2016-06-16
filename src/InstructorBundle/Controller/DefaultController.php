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
    private $userinsid;
    public function homefirstAction($userid)
    {
        $this->userinsid=$userid;
        return $this->render('InstructorBundle:Pages:inshomepage.html.twig',array(
            'userid'=>$this->userinsid,
        ));
    }

    public function homeAction()
    {

        return $this->render('InstructorBundle:Pages:inshomepage.html.twig',array(
            'userid'=>$_SESSION['userID'],
        ));
    }

    /* Load every class of the instructor */
    public function myclassesAction(){

        /* get data from databse */
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT T
            FROM MainBundle:Classes T
            WHERE T.instructor_id=:instid'
        )->setParameter('instid', $_SESSION['userID']);



        $myclasses = $query->getResult();


        /* render the page */
        return $this->render('InstructorBundle:Pages:insmyclasses.html.twig',array(
            'userid'=>$_SESSION['userID'],
            'myclasses' => $myclasses,
        ));
    }

    public function create_assignment_through_classAction($classid){
        $response = $this->forward('InstructorBundle:Default:create_assignment', array(
            'classid' => $classid,
        ));
        // ... further modify the response or return it directly
        return $response;
    }

    /* load assignments to class */
    public function see_class_assignmentsAction($classid){
        $response = $this->forward('InstructorBundle:Default:see_assignment', array(
            'classid' => $classid,
        ));
        // ... further modify the response or return it directly
        return $response;
    }

    /* load assignments to class */
    public function see_assignmentAction($classid){
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT T
            FROM MainBundle:AssignmentDB T
            WHERE T.class_id=:clid'
        )->setParameter('clid', $classid);

        $myassignments = $query->getResult();

        /* render the page */
        return $this->render('InstructorBundle:Pages:insclassassignment.html.twig',array(
            'userid'=>$_SESSION['userID'],
            'classid' => $classid,
            'assignments' => $myassignments,
        ));

    }

    /* load submissions */
    public function see_submitted_resultsAction($assignmentid){
        $response = $this->forward('InstructorBundle:Default:see_result', array(
            'assignmentid' => $assignmentid,
        ));
        // ... further modify the response or return it directly
        return $response;
    }
    public function see_resultAction($assignmentid){
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT T
            FROM MainBundle:SubmittedAssignment T
            WHERE T.asgn_id=:asgid'
        )->setParameter('asgid', $assignmentid);

        $mysubmittedassignments = $query->getResult();

        /* render the page */
        return $this->render('InstructorBundle:Pages:inssubmittedassignment.html.twig',array(
            'userid' => $_SESSION['userID'],
            'assignmentid'=>$assignmentid,
            'assignments' => $mysubmittedassignments,
        ));
    }

    public function ins_see_test_resultAction($stid,$asid){

        $fileoutput = array();
        $myfile = fopen("C:/APAGS/apags".$stid.$asid."result.txt", "r") or die("Unable to open file!");

        /*while(!feof($myfile)) {
            $line = fgets($myfile);
            array_push($fileoutput,$line);
        }*/
        $filecontent = fread($myfile,filesize("C:/APAGS/apags".$stid.$asid."result.txt"));
        fclose($myfile);

        $fileline = explode(" newline ",$filecontent);
        /*print_r($fileline);*/
        $expectedout = explode(" ",$fileline[0]);
        $stdout = explode(" ",$fileline[1]);
        $testmarks = explode(" ",$fileline[2]);
        /*print_r($expectedout);
        print_r($stdout);
        print_r($testmarks);*/
        $testresult = array();

        for ($x=0;$x<sizeof($expectedout);$x++){
            $testresult[$x]['expec']=$expectedout[$x];
            $testresult[$x]['out']=$stdout[$x];
            $testresult[$x]['mark']=$testmarks[$x];
            $testresult[$x]['no']=$x+1;
        }

        return $this->render('InstructorBundle:Pages:inssubmittedtestresult.html.twig',array(
            'stdid' => $stid,
            'testresult' => $testresult,
            /*'expectedout' => $expectedout,
            'stdout' => $stdout,
            'testmarks' => $testmarks,*/
        ));


    }


    /* Create assignment view and pass it to save*/
    public function create_assignmentAction(Request $request,$classid){

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT T.id
            FROM MainBundle:AssignmentDB T
            ORDER BY T.id DESC'
        );
        $lastid = $query->setMaxResults(1)->getOneOrNullResult();

        $assignment = new Assignment();

        $assignment->setAssignmentid($lastid['id']+1);
        $assignment->setClassid($classid);

        $form = $this->createFormBuilder($assignment)
            ->add('AssignmentID',TextType::class, array('label' => false))
            ->add('ClassID',TextType::class, array('label' => false))
            ->add('Name',TextType::class, array('label' => false))
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
            $name = $form['Name']->getData();
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
                'name'=>$name,
                'description' => $description,
                'duedate' => $duedate,
                'duetime' => $duetime,
                'totalmarks' =>$totalmarks,
                'testcasetype' => $testcasetype,
                'inputs' => $inputs,
                'outputs' => $outputs,
                'testcasemarks' => $testcasemarks,
                'userid' => $_SESSION['userID'],
            ));
            // ... further modify the response or return it directly
            return $response;



        }

        return $this->render('InstructorBundle:Pages:insAssignment.html.twig', array(
            'form' => $form->createView(),
            'userid' => $_SESSION['userID'],
        ));
    }
}
