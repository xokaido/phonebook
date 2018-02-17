<?php
function display_tab( $tab, $product = false )
{
foreach( $tab as $v )  :
?>

    <div class="form-group">
      <div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;">
        <label for="<?=$v['display'];?>"><?=$v['display'];?>:</label>
      </div>
      <div class="col-sm-7 col-md-7 col-lg-7">
        <input
          <?=check_if_disabled( $v );?>
          value="<?=set_value( $product, $v['name'] );?>"
          type="text"
          id="<?=$v['display'];?>"
          name="<?=$v['name'];?>"
          placeholder="<?=$v['display'];?>"
          style="overflow:hidden"
          class="form-control  form-control-sm"
        />
      </div>
      <div style="clear:both;"> </div>
    </div>

  <?php endforeach;
}
function  check_if_disabled( $array )
{
  return  ( ( isset( $array[ 'disabled' ] ) ) ? 'disabled="disabled" ' : '' );
}
function set_value( $product = false, $name )
{
  if( $product && isset( $product->{ $name } ) ) 
    return $product->{ $name };
  return '';
}