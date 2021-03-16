<?php

/**
 * Class Reported
 * Mapping of the Reported's table
 */
class Reported extends MappingTableAbstract {

    // PROPERTIES
    protected int $id_reported;
    protected string $inquiry_reported;
    protected int $processed_reported = 1;
    protected int $fkey_category_id;
    protected int $fkey_message_id;

}