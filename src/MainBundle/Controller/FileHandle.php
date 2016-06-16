<?php
namespace MainBundle\Controller;

/**
 * 
 */
 class FileHandle
 {
 	
 	public function writeToFile($text,$assignment_file)
 	{
 		/*$index ="130578F";
 		$assignment ="0002";*/
 		/*$text = "Hello World Test File Handle! \nWriting to test.txt file!! \nnew line added";*/
 		$file = fopen("C:/APAGS/".$assignment_file, "a+");
 		$filename= "C:/APAGS/".$assignment_file;
 		file_put_contents($filename, $text);
 		fclose($file);

 	}
 }