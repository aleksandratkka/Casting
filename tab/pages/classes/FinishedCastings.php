<?php
namespace CastingFunctionality;

use DataBaseFunctionality\Database;
class FinishedCastings
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function GetData()
    {
        return $this->db->QuerySelect('SELECT * FROM `finished_castings`',array());
    }
    public function GetCastingTitle($id)
    {
        return $this->db->QuerySelect('SELECT `title` FROM `casting` WHERE `id` = ?',array($id));
    }
    public function GoToNext($id,$quantity){
        $data = $this->db->QuerySelect('SELECT * FROM `finished_castings` WHERE `id` = ? ',array($id));
        $data = $data[0];
        $date = date("Y-m-d H:i:s");
        $status = "in transit";
        $this->db->Query('INSERT INTO `sent_materials` (`id`,`id_castings`,`quantity`,`send_date`,`delivery_status`) VALUES (NULL,?,?,?,?)',array($data['id_casting'],$quantity,$date,$status));
        if ($data['quantity'] - $quantity > 0){
            $new_qua = $data['quantity'] - $quantity;
            $this->db->Query('UPDATE `finished_castings` SET `quantity` = ? WHERE `id` = ?',array($new_qua,$id));
        }else{
            $this->db->Query('DELETE FROM `finished_castings` WHERE `id` = ?',array($id));
        }
    }
    public function GoToBack($id,$quantity){
        $data = $this->db->QuerySelect('SELECT * FROM `finished_castings` WHERE `id` = ? ',array($id));
        $data = $data[0];
        $date = date("Y-m-d H:i:s");
        $end_date = date("Y-m-d H:i:s", strtotime("+7 day"));

        $this->db->Query('INSERT INTO `locksmith` (`id`,`id_casting`,`quantity`,`start_time`,`end_time`) VALUES (NULL,?,?,?,?)',array($data['id_casting'],$quantity,$date,$end_date));
        if ($data['quantity'] - $quantity > 0){
            $new_qua = $data['quantity'] - $quantity;
            $this->db->Query('UPDATE `finished_castings` SET `quantity` = ? WHERE `id` = ?',array($new_qua,$id));
        }else{
            $this->db->Query('DELETE FROM `finished_castings` WHERE `id` = ?',array($id));
        }
    }
}