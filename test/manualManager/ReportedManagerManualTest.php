<?php
/*
 * Test ReportedMessage
 */

// Common's dependencies
require_once "../../config/config.php";

// Create autoload to model folder
spl_autoload_register(
    function ($className) {
        require "../../model/" . $className . ".php";
    }
);

// DB Singleton connection
$DB = MyPDO::getInstance(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD, ENV_DEV);

// Create instance
$test = new ReportedManager($DB);

// data selection
$result = $test->selectAll();

if (empty($result)) {
    echo "<h1>pas de données pour la table Reported</h1>";
} else {
    foreach ($result as $item) {
        // creation of a type object
        $object = new Reported($item);
        echo "<hr>";
        echo "<p>{$object->getIdReported()}</p>";
        echo "<p>{$object->getInquiryReported()}</p>";
        echo "<p>{$object->getProcessedReported()}</p>";
        echo "<p>{$object->getFkeyCategoryId()}</p>";
        echo "<p>{$object->getFkeyMessageId()}</p>";
    }
}

// TEST method :

var_dump($test->viewReportedById(1));

$data = new Reported([
    'inquiry_reported' => 'test',
    'fkey_message_id' => 1,
    'fkey_category_id' => 1
]);
var_dump($test->newReported($data));

var_dump($test->updateReported($data));