<?php
/**
 * Created by PhpStorm.
 * User: Tharindu Diluksha
 * Date: 6/16/2016
 * Time: 12:12 PM
 */

namespace StudentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MainBundle\Entity\Studentclasses;
use MainBundle\Entity\Classes;


class StudentclassController extends Controller
{
    /* Load every class of the student */
    public function myclassesAction(){

        /* get data from databse */
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT T
            FROM MainBundle:Studentclasses T
            WHERE T.student_id=:stid'
        )->setParameter('stid', $_SESSION['userID']);

        $myclasses = $query->getResult();
        $classarray = array();
        foreach ($myclasses as $myclass){
            $classidname = array();
            $classid = $myclass->getClassId();
            $em = $this->getDoctrine()->getManager();
            $query = $em->createQuery(
                'SELECT T.name
            FROM MainBundle:Classes T
            WHERE T.id=:classid'
            )->setParameter('classid',$classid );
            $classname = $query->setMaxResults(1)->getOneOrNullResult();
            /*array_push($classidnames,$classid);
            array_push($classidnames,$classname);*/
            $classidname['id']=$classid;
            $classidname['name']=$classname['name'];
            array_push($classarray,$classidname);
        }

        /* render the page */
        return $this->render('StudentBundle:Pages:stdmyclasses.html.twig',array(
            'userid'=>$_SESSION['userID'],
            'myclasses' => $classarray,
        ));
    }


    public function load_class_assignmentsAction($classid){
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT T
            FROM MainBundle:AssignmentDB T
            WHERE T.class_id=:classid'
        )->setParameter('classid',$classid );
        $classassignments = $query->getResult();

        /* render the page */
        return $this->render('StudentBundle:Pages:classassignment.html.twig',array(
            'userid'=>$_SESSION['userID'],
            'classid'=>$classid,
            'assignment' => $classassignments,
        ));
    }

    public function submit_assignments_through_classAction($assignmentid){
        $response = $this->forward('StudentBundle:Default:runmetest', array(
            'assignmentid' => $assignmentid,
        ));

        // ... further modify the response or return it directly

        return $response;
    }

}