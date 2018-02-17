<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use \League\Csv\Writer;
use League\Csv\Reader;
use League\Csv\Statement;

class Products extends CI_Controller {

  private $user;  // Store a logged in user here
  public function __construct()
  {
      parent::__construct();
      if ( ! $this->ion_auth->logged_in() )
        redirect('auth/register');

      $this->user = $this->ion_auth->user()->row();
      $this->load->model( 'product_model' );

  }

	public function index()
	{
      $this->load->library('Datatables');

      echo $this->datatables
                ->select( "*" )
                ->from( "products")
                // ->where('user_id', $this->user->id )
                ->generate();
	}
  public function add()
  {

    if( $this->product_model->add() )
      echo 'Success!';
    else
      echo 'Failure!';
  }
  public function xok()
  {
    $this->output->set_status_header( 503 );
    echo json_encode( $this->input->post( ) );
  }
  public function edit()
  {
    if( $this->product_model->edit() )
      $this->send_message( 'Success!' );
    else
      $this->send_message( 'Could not update the record!', 503 );
  }
  public function delete()
  {
    if( $this->product_model->delete( ) )
      echo 'Success!';
    else
      echo 'Failure!';
  }
  private function send_message( $message, $status = 200 )
  {
      $this->output->set_status_header( $status );
      echo json_encode( [ 'message' => $message ]);
  }
  public function export()
  {
      $ids      = explode( ',', $this->input->post( 'ids' ) );
      $products = $this->product_model->export( $ids );
      if( $products )
      {
          $exports  = json_decode( json_encode( $products ), true );
          $filename = 'products-'. date( 'Y-m-d_H:i:s' ) .'.csv';
          $csv      = Writer::createFromFileObject( new SplTempFileObject( ) );

          $csv->insertOne( array_keys( $exports[0] ) );
          $csv->insertAll( $exports );
          $csv->output( $filename );
          exit;
      }
      else
        echo "No products to export!";
  }
  public function import()
  {
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'gif|jpg|png|csv|xls';
      $config['max_size']             = 102400;
      $config['max_width']            = 10240;
      $config['max_height']           = 7680;
      $config['overwrite']            = false;

      $this->load->library('upload', $config);


      if ( ! $this->upload->do_upload('csvfile'))
          $data = [ 'error' => $this->upload->display_errors() ];
      else
          $data = [ 'upload_data' => $this->upload->data() ];

      if( isset( $data[ 'error' ] ) && !empty( $data[ 'error' ] ) ) 
      {
          echo "Alerting error!";
      }
      else
      {
          $uploaded_csv_file = $data[ 'upload_data' ][ 'full_path' ];
          $csv = Reader::createFromPath(  $uploaded_csv_file, 'r' );
          $csv->setHeaderOffset(0); 

          $stmt    = ( new Statement() );
          $records = $stmt->process( $csv );

          foreach ($records as $record) 
          {
              if(  !empty( $record[ 'id' ] ) )
                  $this->product_model->edit( $record );
              else
                  $this->product_model->add( $record );
          }

      }
  }

}
