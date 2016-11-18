<?php

class Email_model extends CI_Model 
{
	/*
	*	Send an email
	*	@param string $table
	* 	@param string $where
	*
	*/
	public function send_mail($receiver, $sender, $message)
	{
		$this->load->library('email');

		$this->email->from($sender['email'], $sender['name']);
		$this->email->to($receiver['email']);
		
		$this->email->subject($message['subject']);
		$this->email->message($message['text']);
		
		$this->email->send();
		
		return TRUE;
	}
	
	/*
	*	Send an email via mandrill api
	*	@param string $user_email
	* 	@param string $user_name
	*	@param string $subject
	* 	@param string $message
	*	@param string $sender_email
	* 	@param string $shopping
	*	@param string $from
	* 	@param string $button
	* 	@param string $cc
	*
	*/
	function send_mandrill_mail($user_email, $user_name, $subject, $message, $sender_email = NULL, $shopping = NULL, $from = NULL, $button = NULL, $cc = NULL)
	{
		if(!isset($sender_email)){
			$sender_email = "sumedicalcentre@strathmore.edu";
		}
		if(!isset($shopping)){
			$shopping = "";
		}
		if(!isset($from)){
			$from = "Strathmore University Medical Center";
		}
		
		if(!isset($button)){
			//$button = '<a class="mcnButton " title="Confirm Account" href="http://www.intorelook.com.au" target="_blank" style="font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;">Shop Now</a>';
			$button = '';
		}
		
		$template_name = 'medical';
		$template_content = array(
			array(
				'name' => 'salutation',
				'content' => $user_name
			),
			array(
				'name' => 'body',
				'content' => $message
			),
			array(
				'name' => 'sub-text',
				'content' => $shopping
			),
			array(
				'name' => 'button',
				'content' => $button
			)
		);
		$message = array(
			//'html' => '<p>Example HTML content</p>',
			'text' => $message,
			'subject' => $subject,
			'from_email' => $sender_email,
			'from_name' => $from,
			'to' => array(
				array(
				'email' => $user_email,
				'name' => $user_name,
				'type' => 'to'
			)
		),
		'headers' => array('Reply-To' => $sender_email),
		'important' => false,
		'track_opens' => null,
		'track_clicks' => null,
		'auto_text' => null,
		'auto_html' => null,
		'inline_css' => null,
		'url_strip_qs' => null,
		'preserve_recipients' => null,
		'view_content_link' => null,
		'bcc_address' => $cc,
		'tracking_domain' => null,
		'signing_domain' => null,
		'return_path_domain' => null,
		'merge' => true,
		'global_merge_vars' => array(
			array(
				'name' => 'merge1',
				'content' => 'merge1 content'
			)
		),
		'merge_vars' => array(
			array(
				'rcpt' => $sender_email,
				'vars' => array(
					array(
						'name' => 'merge2',
						'content' => 'merge2 content'
					)
				)
			)
		),
		'tags' => array('mandrill-mail'),
		'subaccount' => NULL, //'customer-123',
		'google_analytics_domains' => array('www.strathmore.edu'),
		'google_analytics_campaign' => 'alvaromasitsa104@gmail.com',
		'metadata' => array('website' => 'www.strathmore.edu'),
		'recipient_metadata' => array(
			array(
				'rcpt' => $sender_email,
				'values' => array('user_id' => 123456)
			)
		),
		/*'attachments' => array(
		array(
		'type' => 'text/plain',
		'name' => 'myfile.txt',
		'content' => 'ZXhhbXBsZSBmaWxl'
		)
		),*/
		'attachments' => NULL,
		'images' => NULL
		/*'images' => array(
		array(
		'type' => 'image/png',
		'name' => 'IMAGECID',
		'content' => 'ZXhhbXBsZSBmaWxl'
		)
		)*/
		);
		$async = false;
		$ip_pool = 'Main Pool';
		$send_at = date("H.i");
		
		$response = $this->mandrill->messages->sendTemplate($template_name, $template_content, $message);
		
		/*if($response == TRUE)
		{
			return TRUE;
		}
		
		else
		{
			return $response;
		}*/
		return $response;
	} 
}
?>