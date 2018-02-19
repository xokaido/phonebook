<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
  private $data; // A POST data 

  public function __construct()
  {
      $this->data = $this->input->post( 'data' );
      if( empty( $this->data ) )
        $this->data = $this->input->post( );
  }

  public function add( $array = false )
  {
      if( !empty( $array ) )
        $this->data = $array;

      if( isset( $this->data[ 'id' ] ) )
        unset( $this->data[ 'id' ] );
      
      $this->db->set( $this->data );
      if( $this->db->insert( 'products' ) )
        return true;
    return false;
  }
  public function edit( $array = false )
  {
      if( !empty( $array ) )
        $this->data = $array;
      $this->db->set( $this->data );
      if( $this->db->replace( 'products', $this->data ) )
        return true;
      return false;
  }
  public function delete( $id = false )
  {
      if( !empty( $id ) )
        $this->data[ 'id' ] = $id;
      $this->db->where( 'id', $this->data['id'] );
      if( $this->db->delete([ 'products' ]) )
        return true;
      return false;
  }
  public function get( $id = false )
  {
      if( !$id )
        return false;
      $product = $this->db->get_where('products', [ 'id' => $id ] );
    return $product->row( );
  }
  public function export( $ids = false )
  {
      if( !$ids )
        return false;
      $products = $this->db->select( )
                           ->from( 'products' )
                           ->where_in('id', $ids )
                           ->get( )
                           ->result( );
      if( $products )
        return $products;
    return false;
  }
}
  

