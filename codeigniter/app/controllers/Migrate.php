<?php

class Migrate extends CI_Controller
{

  public function index()
  {
      if( !is_cli() )
        die( 'NON CLI use is strictly prohibited!!!...' );

      $this->load->library('migration');
      if ( $this->migration->latest() === FALSE ) 
          show_error( $this->migration->error_string( ) );
      else
          echo "Migrations ran successfully" . PHP_EOL;
  }

}