<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phonebook_model extends CI_Model
{
  private $data; // A phonebook data 

  public function __construct()
  {
      $datetime = date( 'Y-m-d H:i:s' );
      list( $id, $name, $phone, $created_on, $notes ) = $this->input->post( 'data' );
      $this->data = [
                'id'          => ( !empty( $id ) ? $id : ''),
                'user_id'     => $this->ion_auth->user()->row()->id,
                'name'        => ( !empty( $name ) ? $name : 'n/a' ), 
                'phone'       => ( !empty( $phone ) ? $phone : 'n/a' ),
                'created_on'  => ( !empty( $created_on ) ? $created_on : $datetime ),
                'updated_on'  => $datetime,
                'notes'       => ( !empty( $notes ) ? $notes : 'n/a' )
      ];
  }

  public function add()
  {
      if( $this->db->insert( 'phonebooks', $this->data ) )
        return true;
    return false;
  }
  public function edit()
  {
      if( $this->db->replace( 'phonebooks', $this->data ) )
        return true;
      return false;
  }
  public function delete()
  {
      $this->db->where( 'id', $this->data['id'] );
      if( $this->db->delete([ 'phonebooks' ]) )
        return true;
      return false;
  }
}
  

