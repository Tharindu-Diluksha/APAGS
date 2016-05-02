<?php
namespace AdminBundle\Controller;


use MainBundle\Resources\Entity\User;
use Symfony\Component\Config\Definition\Exception\Exception;
use MainBundle\Controller\connection;

class CreateUser{

    public static function saveUser(User $user){

        $conn = connection::getConnectionObject(); // get the connection object
        $con = $conn->getConnection();

        $sql = $con->prepare("INSERT INTO users VALUES (?,?,?)");  // making a prepared statement 
        $id = $user->getUserId();
        $password = $user->getPassword();
        $role = $user->getRole();
        
        $sql->bind_param("sss",$id,$password,$role);

        if ( $sql->execute()==TRUE) {  // execute the sql querry
            echo "New User added successfully"; // successfully added
        } else {
            echo "ERROR in adding User :"; //If error 
        }
    }
}    