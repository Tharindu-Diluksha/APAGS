<?php
namespace MainBundle\Controller;

/**
 * 
 */
 class FileHandle
 {
 	
 	public function writeToFile($text)
 	{
 		$index ="130578F";
 		$assignment ="0002";
 		/*$text = "Hello World Test File Handle! \nWriting to test.txt file!! \nnew line added";*/
 		$file = fopen("C:/APAGS/".$index.$assignment.".py", "a+");
 		$filename= "C:/APAGS/apags".$index.$assignment.".py";
 		file_put_contents($filename, $text);
 		fclose($file);

 	}
 }