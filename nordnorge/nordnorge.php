<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
 <div id="nordNorgeMap" class="main-map">
  <?php include(dirname(__FILE__) . "/nordnorge.svg"); ?>
 </div>
 <div id="finnmarkMap" class="sub-map">
  <span class="bt-back"></span>
  <?php include(dirname(__FILE__) . "/finnmark.svg"); ?>
 </div>
 <div id="tromsMap" class="sub-map">
  <span class="bt-back"></span>
  <?php include(dirname(__FILE__) . "/troms.svg"); ?>
 </div>
 <div id="nordlandMap" class="sub-map">
  <span class="bt-back"></span>
  <?php include(dirname(__FILE__) . "/nordland.svg"); ?>
 </div>
