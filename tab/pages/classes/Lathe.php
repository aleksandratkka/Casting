<?php
namespace CastingFunctionality;

use DataBaseFunctionality\Database;
class Lathe
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function FirstGetData()
    {
        return $this->db->QuerySelect('SELECT * FROM `lathe_1`',array());
    }
    public function FirstGoToNext($id,$quantity){
        $data = $this->db->QuerySelect('SELECT * FROM `lathe_1` WHERE `id` = ? ',array($id));
        $data = $data[0];
        $end_date = date("Y-m-d H:i:s", strtotime("+7 day"));
        $this->db->Query('INSERT INTO `lathe_2` (`id`,`id_casting`,`quantity`,`start_time`,`end_time`) VALUES (NULL,?,?,?,?)',array($data['id_casting'],$quantity,$data['end_time'],$end_date));
        if ($data['quantity'] - $quantity > 0){
            $new_qua = $data['quantity'] - $quantity;
            $this->db->Query('UPDATE `lathe_1` SET `quantity` = ? WHERE `id` = ?',array($new_qua,$id));
        }else{
            $this->db->Query('DELETE FROM `lathe_1` WHERE `id` = ?',array($id));
        }
    }
    public function SecondGetData()
    {
        return $this->db->QuerySelect('SELECT * FROM `lathe_2`',array());
    }
    public function SecondGoToNext($id,$quantity){
        $data = $this->db->QuerySelect('SELECT * FROM `lathe_2` WHERE `id` = ? ',array($id));
        $data = $data[0];
        $end_date = date("Y-m-d H:i:s", strtotime("+7 day"));

        $this->db->Query('INSERT INTO `hardening` (`id`,`id_casting`,`quantity`,`start_time`,`end_time`) VALUES (NULL,?,?,?,?)',array($data['id_casting'],$quantity,$data['end_time'],$end_date));
        if ($data['quantity'] - $quantity > 0){
            $new_qua = $data['quantity'] - $quantity;
            $this->db->Query('UPDATE `lathe_2` SET `quantity` = ? WHERE `id` = ?',array($new_qua,$id));
        }else{
            $this->db->Query('DELETE FROM `lathe_2` WHERE `id` = ?',array($id));
        }
    }
    public function SecondGoToBack($id,$quantity){
        $data = $this->db->QuerySelect('SELECT * FROM `lathe_2` WHERE `id` = ? ',array($id));
        $data = $data[0];
        $end_date = date("Y-m-d H:i:s", strtotime("+7 day"));

        $this->db->Query('INSERT INTO `hardening` (`id`,`id_casting`,`quantity`,`start_time`,`end_time`)  VALUES (NULL,?,?,?,?)',array($data['id_casting'],$quantity,$data['end_time'],$end_date));
        if ($data['quantity'] - $quantity > 0){
            $new_qua = $data['quantity'] - $quantity;
            $this->db->Query('UPDATE `lathe_2` SET `quantity` = ? WHERE `id` = ?',array($new_qua,$id));
        }else{
            $this->db->Query('DELETE FROM `lathe_2` WHERE `id` = ?',array($id));
        }
    }
    public function ThirdGetData()
    {
        return $this->db->QuerySelect('SELECT * FROM `lathe_3`',array());
    }
    public function ThirdGoToNext($id,$quantity){
        $data = $this->db->QuerySelect('SELECT * FROM `lathe_3` WHERE `id` = ? ',array($id));
        $data = $data[0];
        $end_date = date("Y-m-d H:i:s", strtotime("+7 day"));
        $this->db->Query('INSERT INTO `locksmith` (`id`,`id_casting`,`quantity`,`start_time`,`end_time`) VALUES (NULL,?,?,?,?)',array($data['id_casting'],$quantity,$data['end_time'],$end_date));
        if ($data['quantity'] - $quantity > 0){
            $new_qua = $data['quantity'] - $quantity;
            $this->db->Query('UPDATE `lathe_3` SET `quantity` = ? WHERE `id` = ?',array($new_qua,$id));
        }else{
            $this->db->Query('DELETE FROM `lathe_3` WHERE `id` = ?',array($id));
        }
    }
    public function ThirdGoToBack($id,$quantity){
        $data = $this->db->QuerySelect('SELECT * FROM `lathe_3` WHERE `id` = ? ',array($id));
        $data = $data[0];
        $end_date = date("Y-m-d H:i:s", strtotime("+7 day"));
        $this->db->Query('INSERT INTO `hardening` (`id`,`id_casting`,`quantity`,`start_time`,`end_time`) VALUES (NULL,?,?,?,?)',array($data['id_casting'],$quantity,$data['end_time'],$end_date));
        if ($data['quantity'] - $quantity > 0){
            $new_qua = $data['quantity'] - $quantity;
            $this->db->Query('UPDATE `lathe_3` SET `quantity` = ? WHERE `id` = ?',array($new_qua,$id));
        }else{
            $this->db->Query('DELETE FROM `lathe_3` WHERE `id` = ?',array($id));
        }
    }
    public function GetCastingTitle($id)
    {
        return $this->db->QuerySelect('SELECT `title` FROM `casting` WHERE `id` = ?',array($id));
    }
    public function NewLatheProcess($lathe_id,$id_casting,$quantity,$start_time,$end_time)
    {
        $table = "lathe_" .$lathe_id;
        $this->db->Query("INSERT INTO `$table` (`id`,`id_casting`,`quantity`,`start_time`,`end_time`) VALUES (NULL,?,?,?,?)",array($id_casting,$quantity,$start_time,$end_time));
    }

}