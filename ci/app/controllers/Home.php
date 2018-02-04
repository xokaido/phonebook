<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
    if( ! $this->ion_auth->logged_in( ) )
      redirect( '/auth/register' );
    $data[ 'user' ]  = $this->ion_auth->user()->row();
    return $this->load->view( 'xok', $data );
	}
}
