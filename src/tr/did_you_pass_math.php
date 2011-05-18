<?php
/*
Plugin Name: Did You Pass Math? (Turkish version)
Plugin URI: http://www.herod.net/dypm/
Description: Restricts comment spam by throwing the commenter a simple math question.
Author: Steven Herod, H. Çagri TOPÇU (translation)
Version: 3.0
Author URI: http://blogs.herod.net/steven/
*/
if (!class_exists('DidYouPassMath')) {
@session_start();

// Note, you need the '%operand1' and '$operand2' in the string below if you want to see the numbers you are adding up!
$dypm_strings['question'] = "Anti-Spam:  %operand1 , %operand2 daha kaç eder?";
$dypm_strings['wronganswer'] = "Üzgünüm, Yanlis cevap! Matematikten kaç almistin?";
$dypm_strings['noanswer'] = "Butonun altindaki soruya cevap ver!";

require_once('did_you_pass_math_functions.php');

		

}   //end if
$didyoupassmath = new DidYouPassMath();
?>