<?php

// Dependencies
require_once '../model/MappingTableAbstract.php';
require_once '../model/Help.php';

// Creation of new instances for the tests
$classEmpty = new Help([]);

// Display of test results
?>
<pre>
    Class Empty : <?php var_dump($classEmpty); ?>
</pre>
