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

		passthru('python HelloPython.py',$return);
		/*print_r($return);*/
		echo $return[1];
 	}
 	
 } 
 
