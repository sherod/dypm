<?php
/*
Plugin Name: Did You Pass Math?
Plugin URI: http://www.herod.net/dypm/
Description: Restricts comment spam by throwing the commenter a simple math question.
Author: Steven Herod
Version: 3.0
Author URI: http://blogs.herod.net/steven/
*/
if (!class_exists('DidYouPassMath')) {
@session_start();

// Note, you need the '%operand1' and '$operand2' in the string below if you want to see the numbers you are adding up!
$dypm_strings['question'] = "Anti-Spam: Wat is de som van %operand1 en %operand2? ";
$dypm_strings['wronganswer'] = "Sorry, blijkbaar kan je niet rekenen!!";
$dypm_strings['noanswer'] = "Beantwoordt de vraag!";

require_once('did_you_pass_math_functions.php');

		

}   //end if
$didyoupassmath = new DidYouPassMath();
?>