<?php

/*
 * This abstract class must be extended by all the classes that manage SQL tables
 */

abstract class ManagerTableAbstract {

    protected MyPDO $db;

    public function __construct(MyPDO $c) {
        $this->db = $c;
    }

}
