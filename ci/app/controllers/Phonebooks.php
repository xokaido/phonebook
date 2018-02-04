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
  public function add()
  {
    list( $id, $name, $phone, $created_on, $notes ) = $this->input->post( 'data' );
    $datetime = date( 'Y-m-d H:i:s' );
    $data = [
              'user_id'     => $this->ion_auth->user()->row()->id,
              'name'        => ( !empty( $name ) ? $name : 'n/a' ), 
              'phone'       => ( !empty( $phone ) ? $phone : 'n/a' ),
              'created_on'  => ( !empty( $created_on ) ? $created_on : $datetime ),
              'updated_on'  => $datetime,
              'notes'       => ( !empty( $notes ) ? $notes : 'n/a' )
    ];
    if( $this->db->insert( 'phonebooks', $data ) )
      echo 'Success!';
    else
      echo 'Failure!';

  }
  public function edit()
  {
    list( $id, $name, $phone, $created_on, $notes ) = $this->input->post( 'data' );
    
    $data = [ 'id'          => $id,
              'user_id'     => $this->ion_auth->user()->row()->id,
              'name'        => $name, 
              'phone'       => $phone, 
              'created_on'  => $created_on,
              'notes'       => $notes
    ];
    if( $this->db->replace( 'phonebooks', $data ) )
      echo 'Success!';
    else
      echo 'Failure!';

  }
  public function delete()
  {
    list( $id, $name, $phone, $created_on, $notes ) = $this->input->post( 'data' );
    $this->db->where( 'id', $id );
    if( $this->db->delete([ 'phonebooks' ]) )
      echo 'Success!';
    else
      echo 'Failure!';

  }
}
