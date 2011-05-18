<?php
/*
Plugin Name: Did You Pass Math? (Brazilian Portuguese Version)
Plugin URI: http://www.herod.net/dypm/
Description: Restricts comment spam by throwing the commenter a simple math question.
Author: Steven Herod, Rodolpho Arruda (translation)
Version: 3.0
Author URI: http://blogs.herod.net/steven/
*/
if (!class_exists('DidYouPassMath')) {
@session_start();

// Note, you need the '%operand1' and '$operand2' in the string below if you want to see the numbers you are adding up!
$dypm_strings['question'] = "Anti-Spam: Qual o resultado da soma de %operand1  com %operand2 ?  ";
$dypm_strings['wronganswer'] = "Desculpe, mas pelo jeito voce bombou em matematica!!";
$dypm_strings['noanswer'] = "Responda a pergunta!";

require_once('did_you_pass_math_functions.php');

		

}   //end if
$didyoupassmath = new DidYouPassMath();
?>