<?php

class Mail_model extends CI_Model {


    public function sendMail($to, $link, $time) {
        $subject = 'Your Bulkhouse Account Membership Details';
        $from = 'vsuppport@bulkhouse.in';
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        $message = '<html><body><div style="width:100%; border : 1px solid #eee; border-top-left-radius: 5px; border-top-right-radius: 5px;background-color: #eee;"><table style="width:100%;"><tr><td style="vertical-align: top;">	<center>		<img src="http://sellerportal.bhagents.in/images/icon.png" style="width:25%;"><br/>	</center></td></tr><tr><td style="vertical-align: middle; padding:5px;">	<center>	<div style="padding:10px;">	<center>		<span style="font-size: 1.2em;">Welcome '.$to.'...!</span>	</center>	</div>	</center>	<br/>	<center>	<p style="font-size: .9em">	This is your first step in registration as a Vendor with Bulkhouse. 	Please Click the link  below to verify the E-mail ID and to activate your account.	<br/><br/><br/><br/>	<a href="'.$link.'" style="text-decoration: none; background-color: firebrick; color:white; padding:10px; border-radius: 5px;">Click Here to Activate Account</a>	<br/><br/>	<br/><br/><span style="font-size: .8em"><a href="'.$link.'"  rel="nofollow">Click Here</a>&nbsp;if you cannot click on the link. Please note that this link expires on '.date('d-m-Y H:i:s', $time).' .<br/>In order for you to maximize the benefits of your membership, you will be required to complete the further registration formalities! <br/>In case you are unable to login, please contact us<br/>	Email-Address: <b>vsupport@bulkhouse.in</b> &nbsp; Phone Number: <b>+91 891 393 93 93</b></span>	</p>	</center></td></tr></table><br/><br/></div><div style="width:98.5%;height: 60px; background-color: firebrick; color:white; padding-top:10px;padding-right: 10px; padding-left: 10px;"><span style="font-size:.9em">	<center><span style="font-size: .7em">Address:LEVEL II, THE OFFICE, PLOT NO 39, OCEAN VIEW LAYOUT, VISAKHAPATNAM-530003, INDIA. </span><br/><span style="font-size: .7em">EMAIL: VSUPPORT@BULKHOUSE.IN, PHONE NO: (+91) 733-115-6422 </span><br/><span style="font-size: .7em">&copy;Copyrights Bulkhouse Trading India Private Ltd. All rights reserved</span>	</center>	</span></div></body></html>';
        if (mail($to, $subject, $message, $headers)) {
            return 'yes';
        } else {
            return 'no';
        }
    }
    
    public function send_email_smtp($to, $link, $time) {
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        // SMTP Port - the port that you is required
        $config['smtp_port'] = 465;
        // SMTP Username like. (abc@gmail.com)
        $config['smtp_user'] = 'vsupport@bulkouse.in';
        // SMTP Password like (abc***##)
        $config['smtp_pass'] = 'bulk@lwyz';
        // Load email library and passing configured values to email library
        $this->load->library('email', $config);
        // Sender email address
        $this->email->from('vsupport@bulkouse.in', 'vsupport@bulkouse.in');
        // Receiver email address.for single email
        $this->email->to($to);
        //send multiple email
       // $this->email->to(abc@gmail.com,xyz@gmail.com,jkl@gmail.com);
        // Subject of email
        $this->email->subject('Your Bulkhouse Account Membership Details');
        // Message in email
        $message = '<html><body><div style="width:100%; border : 1px solid #eee; border-top-left-radius: 5px; border-top-right-radius: 5px;background-color: #eee;"><table style="width:100%;"><tr><td style="vertical-align: top;">	<center>		<img src="http://sellerportal.bhagents.in/images/icon.png" style="width:25%;"><br/>	</center></td></tr><tr><td style="vertical-align: middle; padding:5px;">	<center>	<div style="padding:10px;">	<center>		<span style="font-size: 1.2em;">Welcome '.$to.'...!</span>	</center>	</div>	</center>	<br/>	<center>	<p style="font-size: .9em">	This is your first step in registration as a Vendor with Bulkhouse. 	Please Click the button below to verify the E-mail ID and to activate your account.	<br/><br/><br/><br/>	<a href="'.$link.'" style="text-decoration: none; background-color: firebrick; color:white; padding:10px; border-radius: 5px;">Click Here to Activate Account</a>	<br/><br/>	<br/><br/><span style="font-size: .8em">Please note that this link expires on '.date('d-m-Y H:i:s', $time).' .<br/>In order for you to maximize the benefits of your membership, you will be required to complete the further registration formalities! <br/>In case you are unable to login, please contact us<br/>	Email-Address: <b>vsupport@bulkhouse.in</b> &nbsp; Phone Number: <b>+91 891 393 93 93</b></span>	</p>	</center></td></tr></table><br/><br/></div><div style="width:98.5%;height: 60px; background-color: firebrick; color:white; padding-top:10px;padding-right: 10px; padding-left: 10px;"><span style="font-size:.9em">	<center><span style="font-size: .7em">Address:LEVEL II, THE OFFICE, PLOT NO 39, OCEAN VIEW LAYOUT, VISAKHAPATNAM-530003, INDIA. </span><br/><span style="font-size: .7em">EMAIL: VSUPPORT@BULKHOUSE.IN, PHONE NO: (+91) 733-115-6422 </span><br/><span style="font-size: .7em">&copy;Copyrights Bulkhouse Trading India Private Ltd. All rights reserved</span>	</center>	</span></div></body></html>';
        $this->email->message($message);
        // It returns boolean TRUE or FALSE based on success or failure
        if($this->email->send()) {
            echo "Yes";
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function sendPassword($to, $password) {
        $subject = 'Your Bulkhouse Account Password';
        $from = 'info@bhagents.in';
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
         $message = '<html><body><div style="width:100%; border : 1px solid #eee; border-top-left-radius: 5px; border-top-right-radius: 5px;background-color: #eee;"><table style="width:100%;"><tr><td style="vertical-align: top;">	<center>		<img src="http://sellerportal.bhagents.in/images/icon.png" style="width:25%;"><br/>	</center></td></tr><tr><td style="vertical-align: middle; padding:5px;">	<center>	<div style="padding:10px;">	<center>		<span style="font-size: 1.2em;">Dear '.$to.'...!</span>	</center>	</div>	</center>	<br/>	<center>	<p style="font-size: .9em">	Your Password for Bulkhouse Seller Account is : '.$password.' <br/><br/><br/><br/></body></html>';
        if (mail($to, $subject, $message, $headers)) {
            return 'yes';
        } else {
            return 'no';
        }
    }

}
