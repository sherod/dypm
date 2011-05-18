<?php
/*
Plugin Name: Did You Pass Math?
Plugin URI: http://www.herod.net/dypm/
Description: Restricts comment spam by throwing the commenter a simple math question.
Author: Steven Herod
Version: 2.0
Author URI: http://blogs.herod.net/steven/
*/
if (!class_exists('DidYouPassMath')) {
@session_start();
class DidYouPassMath
{
    function DidYouPassMath()
    {
        add_action('comment_form', array(&$this, 'comment_form'));	
        add_action('comment_post', array(&$this, 'comment_post'));	
    }

    function comment_form()
    {
        global $wpdb, $user_ID, $_SERVER;

        // If the user is logged in, dont prompt for code
        if (isset($user_ID)) {
            return $post_ID;
        }
        
        $operand1 = rand(0,10);
        $operand2 = rand(0,10);
        
        $sum = $operand1 + $operand2;
        
        ?>
        
        <div id="answerdiv">
       
            <p>
            <input type="text" name="answer" id="answer" size="6" tabindex="4" /> <label for="answer">Anti-Spam: Quanto fa <?=$operand1?> sommato a <?=$operand2?>?  </label>     
            </p>
        </div>
        
         <script language="JavaScript" type="text/javascript">
            var urlField = document.getElementById("url");
            var submitp = urlField.parentNode;
            var answerDiv = document.getElementById("answerdiv");
            submitp.appendChild(answerDiv, urlField);
        </script>
                
        <?php
        
        $_SESSION['DYPM_MATH_ANSWER'] = $sum;        
        return $post_ID;
    }

    function comment_post($post_ID)
    {
        global $wpdb, $user_ID, $_POST, $_SESSION;

        $answer = $_POST['answer'];
        // If the user is not logged in check the security code
        if ( !$user_ID ) {
            // puke on an empty code
            if ( '' == $answer ) {            
      					$wpdb->query("DELETE FROM {$wpdb->comments} WHERE comment_ID = {$post_ID}"); //roll back  
                die( __('Rispondi alla domanda!') );
            }

            // verify the code against the database.
            if ( $_SESSION['DYPM_MATH_ANSWER'] != $answer ) {
                $wpdb->query("DELETE FROM {$wpdb->comments} WHERE comment_ID = {$post_ID}"); //roll back  
                die("Spiacente, sembra che tu non abbia studiato matematica!!");

            } else {
                //were ok, delete the image from db
                unset($_SESSION['DYPM_MATH_ANSWER']);
            }
        }
        return $post_ID;
    }

}   ///:~
}   //end if
$didyoupassmath = new DidYouPassMath();
?>
