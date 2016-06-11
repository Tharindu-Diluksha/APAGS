<?php 
namespace MainBundle\Controller;

use mysqli;

/**
 * Singleton class
 *
 */
final class connection
{
    private $con;
    public static function getConnectionObject()
    {
        static $conn =null ;
        if ($conn === null) {
            $conn = new connection();
        }
        return  $conn;
    }


    private function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password ="12345";
        $dbname = "APAGS";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else{

            $this->con=$conn;
        }
    }
    public function getConnection(){
        return $this->con;
    }

}
