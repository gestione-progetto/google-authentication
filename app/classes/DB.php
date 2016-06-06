<?php

/*
 * This file is the data-base class.
 *
 * (c) Antonio Pierro <antonio.pierro@gmail.com>
 *
 */
class DB {
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli('localhost', 'root', 'rt14', 'website');
    }

    public function query($sql)
    {
        return $this->mysqli->query($sql);
    }
}