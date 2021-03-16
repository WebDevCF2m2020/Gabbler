<?php

/**
 * Class Online
 * Mapping of the online table
 */
class Online extends MappingTableAbstract {

    // PROPERTIES
    protected int $id_online;
    protected string $last_activity_online;
    protected int $connected_online = 2 ;
    protected int $fkey_user_id;

}