<?php
function display_tab( $tab, $product = false )
{
foreach( $tab as $v )  :
  $disabled = check_if_disabled( $v );
if(  $disabled ) : ?>
        <input
          value="<?=set_value( $product, $v['name'] );?>"
          type="<?=$disabled;?>"
          id="<?=$v['display'];?>"
          name="<?=$v['name'];?>"
          placeholder="<?=$v['display'];?>"
          style="overflow:hidden"
          class="form-control  form-control-sm"
        />

<?php else: ?>
    <div class="form-group">
      <div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;">
        <label for="<?=$v['display'];?>"><?=$v['display'];?>:</label>
      </div>
      <div class="col-sm-7 col-md-7 col-lg-7">
        <input
          value="<?=set_value( $product, $v['name'] );?>"
          type="<?=check_if_disabled( $v );?>"
          id="<?=$v['display'];?>"
          name="<?=$v['name'];?>"
          placeholder="<?=$v['display'];?>"
          style="overflow:hidden"
          class="form-control  form-control-sm"
        />
      </div>
        <?=( ( isset( $v[ 'html' ] ) && !empty( $v[ 'html' ] ) ) ? $v['html' ] : '' );?>
      <div style="clear:both;"> </div>
    </div>
<?php endif; ?>

  <?php endforeach;
}
function  check_if_disabled( $array )
{
  return  ( ( isset( $array[ 'disabled' ] ) ) ? 'hidden' : false );
}
function set_value( $product = false, $name )
{
  if( $product && isset( $product->{ $name } ) ) 
    return $product->{ $name };
  return '';
}