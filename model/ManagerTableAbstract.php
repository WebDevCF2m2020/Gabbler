<?php


abstract class ManagerTableAbstract
{
    protected MyPDO $db;

    public function __construct(MyPDO $c)
    {
        $this->db = $c;
    }
}