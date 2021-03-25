<?php

/* 
 * Public Controller
 */

if(isset($_GET['help'])){
    
    require THE_ROOT."/controller/public/help.public.controller.php";
    
    exit();
}

require THE_ROOT."/controller/public/home.public.controller.php";

