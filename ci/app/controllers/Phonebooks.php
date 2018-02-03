<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phonebooks extends CI_Controller {

	public function index()
	{

      $user = $this->ion_auth->user()->row();
      $this->load->library('Datatables');

      echo $this->datatables
                ->select( "id, name, phone, notes, created_on" )
                ->from( "phonebooks")
                ->where('user_id', $user->id )
                ->generate();

	}
}
