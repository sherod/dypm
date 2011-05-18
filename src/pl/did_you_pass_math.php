<?php
/*
Plugin Name: Did You Pass Math? (Wersja Polska)
Plugin URI: http://www.herod.net/dypm/
Description: Restricts comment spam by throwing the commenter a simple math question.
Author: Steven Herod, Piotr Saweczko (translation)
Version: 3.0
Author URI: http://blogs.herod.net/steven/
*/
if (!class_exists('DidYouPassMath')) {
@session_start();

// Note, you need the '%operand1' and '$operand2' in the string below if you want to see the numbers you are adding up!
$dypm_strings['question'] = "Anti-Spam: Suma liczb %operand1 i %operand2 ?  ";
$dypm_strings['wronganswer'] = "Przykro mi, ale oblales test z matmy!!";
$dypm_strings['noanswer'] = "Podaj wynik obliczenia!";

require_once('did_you_pass_math_functions.php');

		

}   //end if
$didyoupassmath = new DidYouPassMath();
?>