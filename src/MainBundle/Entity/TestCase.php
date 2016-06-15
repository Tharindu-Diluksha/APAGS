<?php
/**
 * Created by PhpStorm.
 * User: Tharindu Diluksha
 * Date: 6/15/2016
 * Time: 1:03 PM
 */

namespace MainBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="testcase")
 */
class TestCase
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $asgn_id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $input;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $output;
    /**
     * @ORM\Column(type="integer")
     */
    private $marks;


        /* Getters and setters*/
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAsgnId()
    {
        return $this->asgn_id;
    }

    /**
     * @param mixed $asgn_id
     */
    public function setAsgnId($asgn_id)
    {
        $this->asgn_id = $asgn_id;
    }

    /**
     * @return mixed
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @param mixed $input
     */
    public function setInput($input)
    {
        $this->input = $input;
    }

    /**
     * @return mixed
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * @param mixed $output
     */
    public function setOutput($output)
    {
        $this->output = $output;
    }

    /**
     * @return mixed
     */
    public function getMarks()
    {
        return $this->marks;
    }

    /**
     * @param mixed $marks
     */
    public function setMarks($marks)
    {
        $this->marks = $marks;
    }


}