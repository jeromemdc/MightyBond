<?php
class Facebook_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		
		$config = array(
						'appId'  => '187516361438511',
						'secret' => '5edf333208433fbc7043a004d3651aa1',
						'cookie' => true
						);
		
		$this->load->library('facebook', $config);
		Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYPEER] = false; 
		Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYHOST] = 2;
		// Set a new app id to use

		$user = $this->facebook->getUser();

		// We may or may not have this data based on whether the user is logged in.
		//
		// If we have a $user id here, it means we know the user is logged into
		// Facebook, but we don't know if the access token is valid. An access
		// token is invalid if the user logged out of Facebook.
		$profile = null;
		if($user)
		{
			try {
			    // Proceed knowing you have a logged in user who's authenticated.
				$profile = $this->facebook->api('/'.$user.'?fields=id,name,link,email,username');
			} catch (FacebookApiException $e) {
				error_log($e);
			    $user = null;
			}		
		}
		
		$fb_data = array(
						'me' => $profile,
						'uid' => $user,
						//'loginUrl' => $this->facebook->getLoginUrl(array('req_perms' => 'email','user_birthday','user_photos',)),
						'loginUrl' => $this->facebook->getLoginUrl(array('scope' => 'user_photos,email,publish_stream,user_birthday','redirect_uri' => base_url().'main/fb',)),
						'loginUrl2' => $this->facebook->getLoginUrl(array('scope' => 'user_photos,email,publish_stream,user_birthday','redirect_uri' => base_url().'mobile/fb',)),
						'logoutUrl' => $this->facebook->getLogoutUrl(),
					);

		$this->session->set_userdata('fb_data', $fb_data);
	}


	public function get_signed_request(){
		if( isset( $_REQUEST['signed_request'] ) )
		{
			$encoded_sig = null;
			$payload = null;
			list( $encoded_sig, $payload ) = explode( '.', $_REQUEST['signed_request'], 2 );
			$sig = base64_decode( strtr( $encoded_sig, '-_', '+/' ) );
			$data = json_decode( base64_decode( strtr( $payload, '-_', '+/' ), true ) );
			return $data;
		}
		return false;
		
	}

	function get_user() {
		$query = $this->facebook->getUser();
		if ($query) {
			$data['is_true'] = TRUE;
			$data['facebook_uid'] = $query;
			return $data;
		} else {
			$data['is_true'] = FALSE;
			return $data;
		}

	}
	
} 
