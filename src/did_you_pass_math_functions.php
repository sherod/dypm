<?
class DidYouPassMath
{
	
	//Basic Config (You shouldn't need to touch this unless you want something out of the ordinary...
	
	var $_k2 = false;										//Change false to true if you are using the k2 theme
	var $_no_session_cookies = false;			//Change false to true to turn off the requirement for session cookies 
	
    function DidYouPassMath()
    {
        add_action('comment_form', array(&$this, 'comment_form'));	
        add_action('comment_post', array(&$this, 'comment_post'));	
    }


    function comment_form()
    {
        global $wpdb, $user_ID, $_SERVER, $dypm_strings;

        // If the user is logged in, dont prompt for code
        if (isset($user_ID)) {
            return $post_ID;
        }
        
        $operand1 = rand(0,10);
        $operand2 = rand(0,10);
        
        $sum = $operand1 + $operand2;
        $dypm_strings['question'] = str_replace("%operand1",$operand1,$dypm_strings['question']);
        $dypm_strings['question'] = str_replace("%operand2",$operand2,$dypm_strings['question']);
               
        ?>
        <div id="answerdiv">
       
       
    	     <p>
            <input type="text" name="answer" id="answer" size="6" tabindex="4" /> <label for="answer"><?=$dypm_strings['question']?></label>     
<?
 if ($this->_no_session_cookies)
 	{
?>           
	<input type="hidden" name="no_session" id="no_session" size="6" tabindex="4" value="<?=$sum?>" />
<?
	}
?>


            </p>
        </div>
        
         <script type="text/javascript">
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
        global $wpdb, $user_ID, $_POST, $_SESSION, $comment_type, $comment_count_cache, $dypm_strings;

        $answer = $_POST['answer'];
				$entry_id= $_POST['comment_post_ID'];
				$no_session_answer = $_POST['no_session'];
				
        // If the user is not logged in check the security code
        if ( !$user_ID  && ($comment_type === '')) {
            // puke on an empty code
            if ( '' == $answer ) {            
      					$wpdb->query("DELETE FROM {$wpdb->comments} WHERE comment_ID = {$post_ID}"); //roll back  
      					//Recount the comments
      					$count = $wpdb->get_var("select count(*) from $wpdb->comments where comment_post_id = {$entry_id} and comment_approved = '1'");	
								$wpdb->query("update $wpdb->posts set comment_count = $count where ID = {$entry_id}");
								$comment_count_cache[$entry_id]--;
  							if ($this->_k2)
  							{
  								fail( __($dypm_strings['noanswer']) );
  							}
  							else
                {
               		die( __($dypm_strings['noanswer']) );
               	}
            }

            // verify the code against the session cookie or hidden var.
            if (( $_SESSION['DYPM_MATH_ANSWER'] != $answer) || ($this->_no_session_cookies && ($_SESSION['DYPM_MATH_ANSWER'] != $no_session_answer))) {
                $wpdb->query("DELETE FROM {$wpdb->comments} WHERE comment_ID = {$post_ID}"); //roll back  
              	//Recount the comments
              	//Recount the comments
      					$count = $wpdb->get_var("select count(*) from $wpdb->comments where comment_post_id = {$entry_id} and comment_approved = '1'");	
								$wpdb->query("update $wpdb->posts set comment_count = $count where ID = {$entry_id}");
								$comment_count_cache[$entry_id]--;
  							if ($this->_k2)
  							{
  								fail( __($dypm_strings['wronganswer']) );
  							}
  							else
                {
               		die( __($dypm_strings['wronganswer']) );
               	}
            } else {
								//Clean up
                unset($_SESSION['DYPM_MATH_ANSWER']);
            }
        }
        return $post_ID;
    }
    
}   ///:~