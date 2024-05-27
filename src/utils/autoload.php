<?php
$controladores = glob(CONTROLLERS . '/*.php');
$models = glob(MODELS . '/*.php');
foreach ($controladores as $c) {
    include_once($c);
}
foreach ($models as $m) {
    include_once($m);
}
