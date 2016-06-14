<?php 

namespace MainBundle\Controller;

/**
 * 
 */
 class RunPython
 {
 	

 	public function run(){
 		/*$output = null;
		exec('python HelloPython.py', $output, $return); 
		print_r($output);
		print_r($return);*/

		/*passthru('python HelloPython.py',$return);*/
		/*print_r($return);*/
		/*echo $return[1];*/

		$command = escapeshellcmd('C:/Python27/python.exe "E:/Semester 05/Modules/SoftwareEngineering/Project/APAGS/src/MainBundle/Controller/HelloPython.py"');
		$output = shell_exec($command);
		/*print_r($output);*/
		return $output;
 	}
 	
 } 
 
