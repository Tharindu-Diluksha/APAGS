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
use MainBundle\Entity\User;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $runpython = new RunPython();
        $output = $runpython->run();
        print($output);
        return $this->render('MainBundle:Default:index.html.twig');
    }

    public function logincontrolAction($id,$pwd){

        $password = $pwd;

        $em = $this->getDoctrine()->getManager();
        $loguser = $em->getRepository('MainBundle:User')->find($id);

        if ($loguser->getPassword()==$pwd){
            if ($loguser->getRole()=='s'){

                /*session_start();*/

                $_SESSION['userID'] = $id;
                $response = $this->forward('StudentBundle:Default:myhome', array(
                    'userid' => $id,
                ));
                // ... further modify the response or return it directly
                return $response;
            }
            elseif ($loguser->getRole()=='i'){
                /*session_start();*/

                $_SESSION['userID'] = $id;
                $response = $this->forward('InstructorBundle:Default:home', array(
                    'userid' => $id,
                ));
                // ... further modify the response or return it directly
                return $response;
        }
        }

        $loguser->getPassword();


    }

    public function runfileAction($text,$userid,$assignmentid)
    {
        $assignment_file = 'apags'.$userid.$assignmentid.'.py';
        $output_file = 'apags'.$userid.$assignmentid.'.txt';

        /* write code to a python file */
        $filehandle = new FileHandle();
        $filehandle->writeToFile($text,$assignment_file);

        /* run the main idle python file to run the assignment*/
        $processmain = new Process('C:/Python27/python.exe C:/APAGS/ApagsMain.py C:/APAGS/'.$assignment_file.' C:/APAGS/'.$output_file);
        $processmain->run();

        /* open the output result file and read it line by line */
        $fileoutput = array();
        $myfile = fopen("C:/APAGS/".$output_file, "r") or die("Unable to open file!");

        while(!feof($myfile)) {
            $line = fgets($myfile);
            echo $line . "<br>";
            array_push($fileoutput,$line);
        }
        fclose($myfile);

        /* IF errors in written program */
        if ($fileoutput[0] ==null){
            $process = new Process('C:/Python27/python.exe C:/APAGS/'.$assignment_file);

            $process->run();

            $error = $process->getErrorOutput();
            if ($error==null){
                $output=$process->getOutput();
                $outputarray = explode( '\n',$output);
                echo "actual file";
                print_r($outputarray);
                $process->clearOutput();
            }
            else{
                print($process->getErrorOutput());
                $process->clearErrorOutput();
            }

        }
        else{
            /* If the program executed without problems */
            echo "text file";
           print_r($fileoutput);
        }

    	return $this->render('MainBundle:Default:index.html.twig');
    }

    public function writetofileAction($text){
    /* Save to python file */
        $filehandle = new FileHandle();
        $filehandle->writeToFile($text);
        return $this->render('MainBundle:Default:index.html.twig');
    }

    public function saveassignmentAction($assignmentid,$classid,$name,$description,$duedate,$duetime, $totalmarks, $testcasetype,$inputs,$outputs,$testcasemarks,$userid){
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
        $assignment->setClassId($classid);
        $assignment->setName($name);
        $assignment->setInstructorId($userid);
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
