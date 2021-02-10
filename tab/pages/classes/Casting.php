<?php


namespace CastingFunctionality;

use DataBaseFunctionality\Database;



class Casting
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function GetData()
    {
        return $this->db->QuerySelect('SELECT * FROM `casting`',array());
    }
    public function CreateCasting($title){
        $this->db->Query('INSERT INTO `casting` (`id`,`title`) VALUES (NULL, ?)',array($title));
    }
}