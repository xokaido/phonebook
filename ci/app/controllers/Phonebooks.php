<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phonebooks extends CI_Controller {

  private $user;  // Store a logged in user here
  public function __construct()
  {
      parent::__construct();
      if ( ! $this->ion_auth->logged_in() )
        redirect('auth/register');

      $this->user = $this->ion_auth->user()->row();
      $this->load->model( 'phonebook_model' );

  }

	public function index()
	{
      $this->load->library('Datatables');

      echo $this->datatables
                ->select( "id, name, phone, notes, created_on" )
                ->from( "phonebooks")
                ->where('user_id', $this->user->id )
                ->generate();

	}
  public function add()
  {
    if( $this->phonebook_model->add() )
      echo 'Success!';
    else
      echo 'Failure!';
  }
  public function edit()
  {
    if( $this->phonebook_model->edit() )
      echo 'Success!';
    else
      echo 'Failure!';
  }
  public function delete()
  {
    if( $this->phonebook_model->delete( ) )
      echo 'Success!';
    else
      echo 'Failure!';
  }

}
