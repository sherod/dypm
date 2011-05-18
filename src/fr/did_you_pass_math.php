<?php
/*
Plugin Name: Did You Pass Math? (French version)
Plugin URI: http://www.herod.net/dypm/
Description: Restricts comment spam by throwing the commenter a simple math question.
Author: Steven Herod, Midori (Translation)
Version: 3.0
Author URI: http://blogs.herod.net/steven/
*/
if (!class_exists('DidYouPassMath')) {
@session_start();

// Note, you need the '%operand1' and '$operand2' in the string below if you want to see the numbers you are adding up!
$dypm_strings['question'] = "Anti-Spam: Quelle est la somme de %operand1 et %operand2 ?  ";
$dypm_strings['wronganswer'] = "D&eacute;sol&eacute; mais apparament vous n'avez pas le niveau en Math !!";
$dypm_strings['noanswer'] = "Vous devez répondre &agrave; la question !";

require_once('did_you_pass_math_functions.php');

		

}   //end if
$didyoupassmath = new DidYouPassMath();
?>