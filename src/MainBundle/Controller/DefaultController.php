<?php

namespace MainBundle\Controller;

/*require_once __DIR__.'/../vendor/autoload.php';*/
/*require_once __DIR__.'"E:Semester 05/Modules/SoftwareEngineering/Project/APAGS/vendor/autoload.php"';*/


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MainBundle\Controller\FileHandle;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

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
        $process = new Process('C:/Python27/python.exe "E:/Semester 05/Modules/SoftwareEngineering/Project/APAGS/src/MainBundle/Controller/HelloPython.py"');
        $process->run();
       /* echo $process->getIncrementalOutput();
        echo $process->getOutput();*/
        $error = $process->getErrorOutput();
        if ($error==null){
            $output=$process->getOutput();
            $outputarray = explode('',$output);
            print_r($outputarray);
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

    public function saveassignmentAction($assignmentid,$classid,$duedate,$duetime,$totalmarks,$firstmail,$newmails){
        echo $assignmentid;
        echo $classid;
        print_r($duedate);
        print_r($duetime);
        echo $totalmarks;
        echo $firstmail;
        print_r($newmails);

        return $this->render('MainBundle:Default:index.html.twig');

    }


}
