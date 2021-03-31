<?php

/* 
 * Public Controller
 */

// help page controller
if(isset($_GET['help'])){
    
    require THE_ROOT."/controller/public/help.public.controller.php";
    
    exit();
}

// home page controller
require THE_ROOT."/controller/public/home.public.controller.php";

