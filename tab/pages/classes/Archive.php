<?php
namespace CastingFunctionality;

use DataBaseFunctionality\Database;
class Archive
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function GetData()
    {
        return $this->db->QuerySelect('SELECT * FROM `archive`',array());
    }
    public function GetCastingTitle($id)
    {
        return $this->db->QuerySelect('SELECT `title` FROM `casting` WHERE `id` = ?',array($id));
    }
    public function NewArchiveItems($id,$quantity,$time){
        $this->db->Query('INSERT INTO `archive` (`id`,`id_casting`,`archived_time`,`quantity`) 
        VALUES (NULL,?,?,?)',array($id,$time,$quantity));
    }
    public function UpdateQuantity($table, $new_quantity, $id)
    {
        $sql = 'SELECT * FROM ' .$table. ' WHERE `id` = ?';

        $data = $this->db->QuerySelect($sql,array($id));
        $new_quantity = $data[0]['quantity'] - $new_quantity;
        if ($new_quantity > 0){
            $this->db->Query('UPDATE ' . $table . ' SET `quantity` = ? WHERE `id` = ?',array($new_quantity,$id));
        }else{
            $this->db->Query('DELETE FROM ' . $table . ' WHERE `id` = ?',array($id));
        }
    }
}