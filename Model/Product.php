<?php

namespace app\Model;

use app\inc\Database;

class Product
{

    public $id;
    public $title;
    public $description;
    public $price;
    public $db;

    public function __construct($id = null, $title = null, $description = null, $price = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->db = new Database;
    }

    public function create()
    {
        $sql = "INSERT INTO product (title, description, price) VALUES ('$this->title','$this->description',$this->price)";
        $result = $this->db->conn->query($sql);
        return $result;
    }


    public function read($query = '')
    {
        $sql = "SELECT * FROM product $query";
        $result = $this->db->conn->query($sql);
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $products;
    }

    public function update()
    {
        $sql = "UPDATE product set title='$this->title', description='$this->description', price=$this->price WHERE id='$this->id'";
        $result = $this->db->conn->query($sql);
        return $result;
    }


    public function delete()
    {
        $prepareSql = "SELECT * from product where id='$this->id'";
        if ($this->db->conn->query($prepareSql)->num_rows > 0) {
            $sql = "DELETE FROM product where id='$this->id'";
            $result = $this->db->conn->query($sql);
            return $result;
        } else {
            return false;
        }
    }
}
