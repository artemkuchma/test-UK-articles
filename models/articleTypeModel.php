<?php

class articleTypeModel
{
    public $table;
    public $dbc;

    public function __construct()
    {
        $this->table = 'article_types';
        $this->dbc = Connect_db::getConnection();
    }

    public function isTableEmpty()
    {
        return $this->dbc->isTableEmpty($this->table);
    }

}