<?php

/**
 * Class UserRight
 * Mapping of the UserRight table
 */
class UserRight extends MappingTableAbstract {

    // PROPERTIES
    protected int $id_user_right;
    protected int $date_authorized_user_right;
    protected int $fkey_status_id;
    protected int $fkey_user_id;

}