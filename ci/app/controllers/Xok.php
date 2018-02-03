<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Xok extends CI_Controller {

	public function index()
	{
    // $this->load->add_package_path(APPPATH.'third_party/ion_auth/');

    // $this->load->library('ion_auth');
    // $this->load->library('migration');
    // if ($this->migration->current() === FALSE)
    //   echo "Going false!";
    // else
    //   echo "Where are migrations?...";
    //  if ( $this->migration->latest() === FALSE ) 
    //       show_error($this->migration->error_string());
    //   else
    //       echo "Migrations run successfully" . PHP_EOL;

    // $identity = 'xokaido@xokaido.com';
    // $password = 'password';
    // $remember = TRUE; // remember the user
    // if( ! $this->ion_auth->login($identity, $password ) )
    //   die( 'You are not logged in yet!' );
    // else
    //   die( 'Logged in!' );
  

    echo "This is it!";
		// $this->load->view('welcome_message');
	}
}
