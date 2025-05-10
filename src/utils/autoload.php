<?php
$controladores = glob(CONTROLLERS . "/*.php");
$models = glob(MODELS . "/*.php");
$repositories = glob(REPOSITORIES . "/*.php");
require MODELS . "/EntityModel.php";
foreach ($controladores as $c) {
    require_once $c;
}
foreach ($models as $m) {
    require_once $m;
}
foreach ($repositories as $r) {
    require_once $r;
}
