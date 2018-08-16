<?php
$p = $_GET['p'];
require_once('head.php');

if (!isset($p)){
    require_once('principal.php');
} else {
    require_once("p$p.php");
}

require_once('footer.php');
    
