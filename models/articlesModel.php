<?php

class articlesModel
{
    public $table;
    public $dbc;

   public function __construct()
   {
       $this->table = 'articles';
       $this->dbc = Connect_db::getConnection();
   }

   public function isTableEmpty()
   {
       return $this->dbc->isTableEmpty($this->table);
   }



}