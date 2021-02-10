<?php
namespace CastingFunctionality;

use DataBaseFunctionality\Database;
class FirstMechanical
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function GetData()
    {
        return $this->db->QuerySelect('SELECT * FROM `mechanical_restoration_1`',array());
    }
    public function GetCastingTitle($id)
    {
        return $this->db->QuerySelect('SELECT `title` FROM `casting` WHERE `id` = ?',array($id));
    }
    public function NewMechanicalProcess($id,$quantity,$start_performing,$end_performing)
    {
        $this->db->Query('INSERT INTO `mechanical_restoration_1` (`id`,`id_casting`,`start_performing`,`end_performing`,`quantity`) 
                              VALUES (NULL,?,?,?,?)',array($id,$start_performing,$end_performing,$quantity));
    }
}