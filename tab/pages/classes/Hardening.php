<?php
namespace CastingFunctionality;

use DataBaseFunctionality\Database;
class Hardening
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function GetData()
    {
        return $this->db->QuerySelect('SELECT * FROM `hardening`',array());
    }
    public function GetCastingTitle($id)
    {
        return $this->db->QuerySelect('SELECT `title` FROM `casting` WHERE `id` = ?',array($id));
    }
    public function GoToNext($id,$quantity){
        $data = $this->db->QuerySelect('SELECT * FROM `hardening` WHERE `id` = ? ',array($id));
        $data = $data[0];
        $end_date = date("Y-m-d H:i:s", strtotime("+7 day"));

        $this->db->Query('INSERT INTO `lathe_3` (`id`,`id_casting`,`quantity`,`start_time`,`end_time`) VALUES (NULL,?,?,?,?)',array($data['id_casting'],$quantity,$data['end_time'],$end_date));
        if ($data['quantity'] - $quantity > 0){
            $new_qua = $data['quantity'] - $quantity;
            $this->db->Query('UPDATE `hardening` SET `quantity` = ? WHERE `id` = ?',array($new_qua,$id));
        }else{
            $this->db->Query('DELETE FROM `hardening` WHERE `id` = ?',array($id));
        }
    }
    public function GoToBack($id,$quantity){
        $data = $this->db->QuerySelect('SELECT * FROM `hardening` WHERE `id` = ? ',array($id));
        $data = $data[0];
        $end_date = date("Y-m-d H:i:s", strtotime("+7 day"));

        $this->db->Query('INSERT INTO `lathe_2` (`id`,`id_casting`,`quantity`,`start_time`,`end_time`) VALUES (NULL,?,?,?,?)',array($data['id_casting'],$quantity,$data['end_time'],$end_date));
        if ($data['quantity'] - $quantity > 0){
            $new_qua = $data['quantity'] - $quantity;
            $this->db->Query('UPDATE `hardening` SET `quantity` = ? WHERE `id` = ?',array($new_qua,$id));
        }else{
            $this->db->Query('DELETE FROM `hardening` WHERE `id` = ?',array($id));
        }
    }
}