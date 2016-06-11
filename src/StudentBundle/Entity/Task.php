<?php

/**
 * Created by PhpStorm.
 * User: Tharindu Diluksha
 * Date: 6/10/2016
 * Time: 9:28 AM
 */
namespace StudentBundle\Entity;

class Task
{
    protected $task;

    public function getTask()
    {
        return $this->task;
    }

    public function setTask($task)
    {
        $this->task = $task;
    }

}