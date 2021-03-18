<?php

// THE_ROOT's project
define('THE_ROOT', dirname(__DIR__));

// Common's dependencies
require_once THE_ROOT . "/config/config.php";

// Create autoload
spl_autoload_register(
    function ($className) {
        require THE_ROOT."/model/" . $className . ".php";
    }
);

// create 3 instances of MyPDO with static getInstance() => 1 connexion because it's a singleton
$a = MyPDO::getInstance(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD, ENV_DEV);
$b = MyPDO::getInstance(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD, ENV_DEV);
$c = MyPDO::getInstance(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD, ENV_DEV);
?>
<h3>Singleton MyPDO</h3>
<p>// create 3 instances of MyPDO with static getInstance() => 1 connexion because it's a singleton<br>
    $a =
    MyPDO::getInstance(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,DB_USER,DB_PASSWORD,ENV_DEV);<br>
    $b =
    MyPDO::getInstance(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,DB_USER,DB_PASSWORD,ENV_DEV);<br>
    $c =
    MyPDO::getInstance(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,DB_USER,DB_PASSWORD,ENV_DEV);
</p>
<pre><?php var_dump($a, $b, $c) ?></pre>
<?php
// create 3 instances with new MyPDO => 3 connexion because it is not a singleton
$d = new MyPDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD, ENV_DEV);
$e = new MyPDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD, ENV_DEV);
$f = new MyPDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD, ENV_DEV);
?>
<h3>Multiple connection MyPDO</h3>
<p>// create 3 instances with new MyPDO => 3 connexion because it is not a singleton<br>
    $d = new
    MyPDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,DB_USER,DB_PASSWORD,ENV_DEV);<br>
    $e = new
    MyPDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,DB_USER,DB_PASSWORD,ENV_DEV);<br>
    $f = new
    MyPDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,DB_USER,DB_PASSWORD,ENV_DEV);
</p>
<pre><?php var_dump($d, $e, $f) ?></pre>