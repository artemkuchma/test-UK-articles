<?php

class Connect_db {

    private static $connection;
    private $PDO;
    private function __clone(){}
    private function __wakeup(){}

    private   function __construct($dsn, $user, $pass){

        $this->PDO = new PDO($dsn, $user, $pass);
        $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getConnection()
    {
            if(!self::$connection){
                self::$connection = new Connect_db(DSN, DB_USER, DB_PASS);
            }
            return self::$connection;
    }


    public function getDate($sql, array $placeholders=[])
    {

        $sth = $this->PDO->prepare($sql);
        $sth->execute($placeholders);
        return $sth->fetchAll(PDO::FETCH_ASSOC);

    }

    public function runDump()
    {
        $sql = file_get_contents(PUBLIC_DIR.'/uploads/test_gb_article.sql');
        $this->PDO->exec($sql);
    }

   public function checkTable()
   {
       $sql = "SHOW TABLES;";
       $sth = $this->PDO->prepare($sql);
       $sth->execute();
       $result = $sth->fetch();
       if($result){
           return true;
       }
       return false;
   }

    public function isTableEmpty($table)
    {
        $result = $this->getDate("SELECT * FROM `" . $table . "` LIMIT 1");
        if(!$result){
            return true;
        }
        return false;
    }


    public function getPDO()
    {
        return $this->PDO;
    }


    
}