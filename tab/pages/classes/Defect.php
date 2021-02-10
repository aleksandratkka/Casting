<?php
namespace CastingFunctionality;

use DataBaseFunctionality\Database;
class Defect
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function GetData()
    {
        return $this->db->QuerySelect('SELECT * FROM `defect`',array());
    }
    public function GetCastingTitle($id)
    {
        return $this->db->QuerySelect('SELECT `title` FROM `casting` WHERE `id` = ?',array($id));
    }
    public function NewDefectItems($id,$quantity,$time){
        $this->db->Query('INSERT INTO `defect` (`id`,`id_casting`,`quantity`,`discard_time`) 
        VALUES (NULL,?,?,?)',array($id,$quantity,$time));
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