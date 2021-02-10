<?php
namespace CastingFunctionality;

use DataBaseFunctionality\Database;


class CounterParty
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function GetData()
    {
        return $this->db->QuerySelect('SELECT * FROM `counterparty`',array());
    }
    public function CreateCounterparty($title){
        $this->db->Query('INSERT INTO `counterparty` (`id`,`title`) VALUES (NULL, ?)',array($title));
    }

}