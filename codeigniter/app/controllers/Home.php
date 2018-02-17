<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
  private $tabs = [  'multi' => [
                                  [ 'name' => 'id', 'display' => 'id' ],
                                  [ 'name' => 'brand', 'display' => 'Brand' ],
                                  [ 'name' => 'sku_model', 'display' => 'SKU_model' ],
                                  [ 'name' => 'itemname', 'display' => 'ItemName' ],
                                  [ 'name' => 'itemupc', 'display' => 'ItemUPC' ],
                                  [ 'name' => 'itemmainimagelink', 'display' => 'ItemMainImageLink' ],
                                  [ 'name' => 'singleitemcostusd', 'display' => 'SingleItemCostUSD' ],
                                  [ 'name' => 'itemcasepack', 'display' => 'ItemCasePack' ],
                                  [ 'name' => 'singleitemretailusd', 'display' => 'SingleItemRetailUSD' ],
                                  [ 'name' => 'singleitemmapusd', 'display' => 'SingleItemMapUSD' ],
                                  [ 'name' => 'amazonasin', 'display' => 'AmazonASIN' ],
                                  [ 'name' => 'amazonlivelink', 'display' => 'AmazonLiveLink' ],
                      ],
                      'basic' => [
                                  [ 'name' =>'id', 'display' => 'ID', 'disabled' => true ],
                                  [ 'name' =>'brand', 'display' => 'Brand' ],
                                  [ 'name' =>'sku_model', 'display' => 'SKU_Model' ],
                                  [ 'name' =>'itemname', 'display' => 'ItemName' ],
                                  [ 'name' =>'itemdescription', 'display' => 'ItemDescription' ],
                                  [ 'name' =>'itemupc', 'display' => 'ItemUPC' ],
                      ],
                      'shipping' => [
                                  [ 'name' => 'singleitemlength', 'display' => 'SingleItemLength' ],
                                  [ 'name' => 'singleitemweight', 'display' => 'SingleItemWeight' ],
                                  [ 'name' => 'singleitemwidth', 'display' => 'SingleItemWidth' ],
                                  [ 'name' => 'singleitemheight', 'display' => 'SingleItemHeight' ],
                                  [ 'name' => 'singleitemdepth', 'display' => 'SingleItemDepth' ],
                                  [ 'name' => 'singlepackagelength', 'display' => 'SinglePackageLength' ],
                                  [ 'name' => 'singlepackagewidth', 'display' => 'SinglePackageWidth' ],
                                  [ 'name' => 'singlepackageheight', 'display' => 'SinglePackageHeight' ],
                                  [ 'name' => 'singlepackageweight', 'display' => 'SinglePackageWeight' ],
                                  [ 'name' => 'itemdimunit', 'display' => 'ItemDimUnit' ],
                                  [ 'name' => 'itemweightunit', 'display' => 'ItemWeightUnit' ],
                                  [ 'name' => 'packagedimunit', 'display' => 'PackageDimUnit' ],
                                  [ 'name' => 'liquid', 'display' => 'Liquid' ],
                                  [ 'name' => 'glass', 'display' => 'Glass' ],
                                  [ 'name' => 'sealedcap', 'display' => 'SealedCap' ],
                                  [ 'name' => 'packagingtype', 'display' => 'PackagingType' ]
                      ],
                      'details' => [
                                  [ 'name' => 'itemfluidounces', 'display' => 'ItemFluidOunces' ],
                                  [ 'name' => 'itemvolumemil', 'display' => 'ItemVolumeMil' ],
                                  [ 'name' => 'itemingredients', 'display' => 'ItemIngredients' ],
                                  [ 'name' => 'itembenefits', 'display' => 'ItemBenefits' ],
                                  [ 'name' => 'itemsuggesteduse', 'display' => 'ItemSuggestedUse' ],
                                  [ 'name' => 'itemdirections', 'display' => 'ItemDirections' ],
                                  [ 'name' => 'itemcountryoforigin', 'display' => 'ItemCountryOfOrigin' ],
                                  [ 'name' => 'shelflife', 'display' => 'ShelfLife' ]
                      ],
                      'images' => [
                                  [ 'name' => 'itemmainimagelink', 'display' => 'ItemMainImageLink' ],
                                  [ 'name' => 'itemimagelink2', 'display' => 'ItemImageLink2' ],
                                  [ 'name' => 'itemimagelink3', 'display' => 'ItemImageLink3' ],
                                  [ 'name' => 'itemimagelink4', 'display' => 'ItemImageLink4' ],
                                  [ 'name' => 'itemimagelink5', 'display' => 'ItemImageLink5' ]
                      ],
                      'electric' => [
                                  [ 'name' => 'electroniccomponent', 'display' => 'ElectronicComponent' ],
                                  [ 'name' => 'voltage', 'display' => 'Voltage' ],
                                  [ 'name' => 'electriccertification', 'display' => 'ElectricCertification' ],
                                  [ 'name' => 'batteriesrequired', 'display' => 'BatteriesRequired' ],
                                  [ 'name' => 'batteriesincluded', 'display' => 'BatteriesIncluded' ],
                                  [ 'name' => 'howmanybatteries', 'display' => 'HowManyBatteries' ],
                                  [ 'name' => 'batterytype', 'display' => 'BatteryType' ]
                      ],
                      'pricing' => [
                                  [ 'name' => 'singleitemcostusd', 'display' => 'SingleItemCostUSD' ],
                                  [ 'name' => 'singleitemretailusd', 'display' => 'SingleItemRetailUSD' ],
                                  [ 'name' => 'singleitemmapusd', 'display' => 'SingleItemMapUSD' ]
                      ],
                      'safety' => [
                                  [ 'name' => 'msdslink', 'display' => 'MSDSLink' ],
                                  [ 'name' => 'datesubmittedtodb', 'display' => 'DateSubmittedtoDB' ],
                                  [ 'name' => 'warnings', 'display' => 'Warnings' ]
                      ],
                      'amazon' => [
                                  [ 'name' => 'amazontitle', 'display' => 'AmazonTitle' ],
                                  [ 'name' => 'amazonbulletpoint1', 'display' => 'AmazonBulletPoint1' ],
                                  [ 'name' => 'amazonbulletpoint2', 'display' => 'AmazonBulletPoint2' ],
                                  [ 'name' => 'amazonbulletpoint3', 'display' => 'AmazonBulletPoint3' ],
                                  [ 'name' => 'amazonbulletpoint4', 'display' => 'AmazonBulletPoint4' ],
                                  [ 'name' => 'amazonbulletpoint5', 'display' => 'AmazonBulletPoint5' ],
                                  [ 'name' => 'amazondescription', 'display' => 'AmazonDescription' ],
                                  [ 'name' => 'amazonkeywords', 'display' => 'AmazonKeywords' ],
                                  [ 'name' => 'amazonsubmissionid', 'display' => 'AmazonSubmissionID' ],
                                  [ 'name' => 'amazonchannel', 'display' => 'AmazonChannel' ],
                                  [ 'name' => 'amazonvendorcode', 'display' => 'AmazonVendorCode' ],
                      ],
                ];

	public function index()
	{
    if( ! $this->ion_auth->logged_in( ) )
      redirect( '/auth/register' );
    $page = $this->input->get( 'page' );
    $data[ 'user' ]  = $this->ion_auth->user()->row();
    $data[ 'page' ]  = ( $page ? $page : 'multi' );
    $data['pages']   = $this->tabs;

    $this->load->view( 'header', $data );
    $this->load->view( 'home', $data  );
    $this->load->view( 'footer' );
	}
  public function create()
  {
      if( ! $this->ion_auth->logged_in( ) )
        redirect( '/auth/register' );
      $page = $this->input->get( 'page' );
      $data[ 'user' ]  = $this->ion_auth->user()->row();
      $data[ 'page' ]  = ( $page ? $page : 'multi' );

      $this->load->helper( 'display_tab' );
      $data[ 'tabs' ]  = $this->tabs;

      $this->load->view( 'header', $data );
      $this->load->view( 'create', $data );
      $this->load->view( 'footer' );
  }
  public function edit( $id )
  {
      if( ! $this->ion_auth->logged_in( ) )
        redirect( '/auth/register' );
      $page = $this->input->get( 'page' );
      $data[ 'user' ]  = $this->ion_auth->user()->row();
      $data[ 'tabs' ]  = $this->tabs;

      $this->load->model( 'product_model' );
      $data['product'] = $this->product_model->get( $id ); 

      $this->load->helper( 'display_tab' );

      $this->load->view( 'header', $data );
      $this->load->view( 'edit', $data );
      $this->load->view( 'footer' );
  }
  public function xok( )
  {
      if( ! $this->ion_auth->logged_in( ) )
        redirect( '/auth/register' );
      $page = $this->input->get( 'page' );
      $data[ 'user' ]  = $this->ion_auth->user()->row();
      $data[ 'tabs' ]  = $this->tabs;

      $this->load->model( 'product_model' );

      $this->load->helper( 'display_tab' );

      $this->load->view( 'header', $data );
      $this->load->view( 'xok', $data );
      $this->load->view( 'footer' );
  }
}
