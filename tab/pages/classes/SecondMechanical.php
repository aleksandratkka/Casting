<?php
namespace CastingFunctionality;

use DataBaseFunctionality\Database;
class SecondMechanical
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function GetData()
    {
        return $this->db->QuerySelect('SELECT * FROM `mechanical_restoration_2`',array());
    }
    public function GetCastingTitle($id)
    {
        return $this->db->QuerySelect('SELECT `title` FROM `casting` WHERE `id` = ?',array($id));
    }
    public function GetCounterpartyTitle($id)
    {
        return $this->db->QuerySelect('SELECT `title` FROM `counterparty` WHERE `id` = ?',array($id));
    }
    public function NewMechanicalProcess($id,$quantity,$start_performing,$end_performing,$id_counterparty)
    {
        $this->db->Query('INSERT INTO `mechanical_restoration_2` (`id`,`id_casting`,`start_performing`,`end_performing`,`quantity`,`id_counterparty`) 
                              VALUES (NULL,?,?,?,?,?)',array($id,$start_performing,$end_performing,$quantity,$id_counterparty));
    }
}