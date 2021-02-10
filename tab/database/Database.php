<?php
namespace DataBaseFunctionality;

class Database{

    private $pdo;
    private $dbHost = "localhost";
    private $dbName ="id15958020_castingdb2020";
    private $dbUser ="id15958020_superusercasting";
    private $dbPass ="9_a|Gi|Q>PM[D44x";

    /**
     * Database constructor.
     */
    public function __construct(){

        try{
            $link = new \PDO('mysql:dbhost='.$this->dbHost.';dbname='.$this->dbName,$this->dbUser,$this->dbPass);
            $link->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
            $this->pdo = $link;
        }catch(\PDOException $e){
            die('Failed to connect Database...'.$e->getMessage());
        }

    }

    /**Database multipurpose query function
     * @param $sql
     * @param $params
     * @return string
     */

    public function Query($sql,$params){

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $this->pdo->lastInsertId();

    }


    /**Database query only select function
     * @param $sql
     * @param $params
     * @return mixed
     */
    public function QuerySelect($sql,$params){

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();

    }

}