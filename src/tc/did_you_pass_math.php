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
$dypm_strings['question'] = "Anti-Spam: 請告訴我 %operand1 加 %operand2 是多少?   ";
$dypm_strings['wronganswer'] = "Oh My God, 你回答錯囉!! 如果你是不小心的再來一次吧!";
$dypm_strings['noanswer'] = "你必須回答這個小小的測驗，有些賭博網站很討厭，造成你的困擾請見諒!";

require_once('did_you_pass_math_functions.php');

		

}   //end if
$didyoupassmath = new DidYouPassMath();
?>