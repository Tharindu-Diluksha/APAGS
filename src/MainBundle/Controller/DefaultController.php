<?php

namespace MainBundle\Controller;

/*require_once __DIR__.'/../vendor/autoload.php';*/
/*require_once __DIR__.'"E:Semester 05/Modules/SoftwareEngineering/Project/APAGS/vendor/autoload.php"';*/


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MainBundle\Controller\FileHandle;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use MainBundle\Entity\AssignmentDB;
use MainBundle\Entity\TestCase;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $runpython = new RunPython();
        $output = $runpython->run();
        print($output);
        return $this->render('MainBundle:Default:index.html.twig');
    }

    public function runfileAction($text)
    {

        $filehandle = new FileHandle();
        $filehandle->writeToFile($text);

        $process = new Process('C:/Python27/python.exe "E:/Semester 05/Modules/SoftwareEngineering/Project/APAGS/web/130578F0002.py"');

        $process->run();
       /* echo $process->getIncrementalOutput();
        echo $process->getOutput();*/
        $error = $process->getErrorOutput();
        if ($error==null){
            $output=$process->getOutput();
            /*$outputarray = explode('',$output);*/
            print_r($output);
            $process->clearOutput();
        }
        else{
            print($process->getErrorOutput());
            $process->clearErrorOutput();
        }
    	return $this->render('MainBundle:Default:index.html.twig');
    }

    public function writetofileAction($text){
    /* Save to python file */
        $filehandle = new FileHandle();
        $filehandle->writeToFile($text);
        return $this->render('MainBundle:Default:index.html.twig');
    }

    public function saveassignmentAction($assignmentid,$classid,$description,$duedate,$duetime,$totalmarks,$testcasetype,$inputs,$outputs,$testcasemarks){
        /* save the assignment and test cases to database*/
        echo $assignmentid;
        echo $classid;
        echo $description;
        print_r($duedate);
        print_r($duetime);
        echo $totalmarks;
        echo $testcasetype;
        print_r($inputs);
        print_r($outputs);
        print_r($testcasemarks);

        $assignment = new AssignmentDB();// create assignemntDB class to save created assignment to db

        $assignment->setId($assignmentid);
        $assignment->setName("first assgn");
        $assignment->setInstructorId('0001');
        $assignment->setDescription($description);
        $assignment->setTotalmarks($totalmarks);
        $assignment->setDueDate($duedate);
        $assignment->setDueTime($duetime);

        $em = $this->getDoctrine()->getManager();

        $em->persist($assignment); //save the assignment to databse
        $em->flush();




        /* save test cases to database */
        $inputsize = sizeof($inputs);
        $outputsize = sizeof($outputs);

        $query = $em->createQuery(
            'SELECT T.id
            FROM MainBundle:TestCase T
            ORDER BY T.id DESC'
        );

        if ($inputsize>=1){
            $y=0;
            for ($x=0;$x<$inputsize;$x++){

                $lasttestid = $query->setMaxResults(1)->getOneOrNullResult();

                $testcase = new TestCase();

                $testcase->setId($lasttestid['id']+1);
                $testcase->setAsgnId($assignmentid);
                $testcase->setInput($inputs[$x]);
                $testcase->setOutput($outputs[$x]);
                $testcase->setMarks($testcasemarks[$x]);

                $em->persist($testcase);
                $em->flush();
            }
        }
        elseif ($outputsize>=1){
            $y=0;
            for ($x=0;$x<$outputsize;$x++){

                $lasttestid = $query->setMaxResults(1)->getOneOrNullResult();

                $testcase = new TestCase();

                $testcase->setId($lasttestid['id']+1);
                $testcase->setAsgnId($assignmentid);
                $testcase->setInput('');
                $testcase->setOutput($outputs[$x]);
                $testcase->setMarks($testcasemarks[$x]);

                $em->persist($testcase);
                $em->flush();
            }
        }



        return $this->render('MainBundle:Default:index.html.twig');

    }


}
