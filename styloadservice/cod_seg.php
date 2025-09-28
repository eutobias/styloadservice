<?php
  $cod=$_GET[cod];
  $angulo=rand(-20,20);
  $im = @imagecreatefrompng ("images/bt_cod.png"); /* Attempt to open */
  $white = imagecolorallocate($im, 255,255,255);
  $black = imagecolorallocate($im, 0,0,0);
  imagettftext($im, 20, $angulo, 40, 40, $black, "images/font_cod.ttf",
  $cod);
  imagepng($im);
  imagedestroy($im);
?>
