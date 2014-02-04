<?php

    //GET some values
    $name = $_POST['name'];
    $email  = $_POST['email'];
    $message =  str_replace('\\"','"',str_replace('\\\'','\'',$_POST['message']));   //end of message
    $submition = 
	'Name: '.$name. '<br />
	Email: '.$email.'<br />
	Message: '.$message.'<br />'
    ;

    $from   = $email;
    $headers  = "From: $from \r\n";
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $subject = 'New form subsmision on JSForm at Github';
    $to = $email;

    //validate name
    if ( $name == 'Name' || $name == '') {
        echo 'Please type your name';
    //validate email
    } else if ( $email == 'Email' || $email == '') {
        echo 'Please type your email address.';
    } else if ( !preg_match( "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
        echo 'Enter a valid email adrees.';
    //validate message
    } else if ( $message == 'Message' || $message == '' ) {
        echo 'Please type a message.';
    // now lets send the email.
    } else {

        $sent = mail($to, $subject, $submition, $headers);

        if($sent) {
            echo 'Your message has been sent.';
        } else {
            echo 'Bahh you fail..';
        }

    }

?>
