<?php

namespace app\Controller;

use app\Model\Product;

class ProductController
{

    public static function index()
    {
        // $data = Model->Product->read();
        // resources->index.php => with $data
        $data = new Product;
        $data = $data->read();
        return $data;
    }

    public static function show($query)
    {
        // Model->Product->read(search);
        // resources->index.php => with $data
        $data = new Product;
        $data = $data->read($query);
        return $data;
    }


    // public function create()
    // {
    //     // View->product->index.php
    // }

    public static function store($product)
    {
        // Model->Product->create();
        $data = new Product('', $product['title'], $product['description'], $product['price']);
        $data = $data->create();
        if ($data) {
            header('Location: /2025/PHP/Product-Crud/resources/');
        } else {
            // echo "Error: " . $sql . "<br>" . $this->db->conn->error;;
        }
    }


    // public function edit()
    // {
    //     // Model->Product->read(search);
    //     // View->product->update.php
    // }

    public static function update($product)
    {
        // Model->Product->update();
        $data = new Product($product['id'], $product['title'], $product['description'], $product['price']);
        $data = $data->update();
        if ($data) {
            header('Location: /2025/PHP/Product-Crud/resources/');
        } else {
            // echo "Error: " . $sql . "<br>" . $this->db->conn->error;;
        }
    }


    public static function delete($id)
    {
        // Model->Product->delete();
        $data = new Product($id);
        $data = $data->delete();
        if ($data) {
            header('Location: /2025/PHP/Product-Crud/resources/');
        } else {
            header('Location: /2025/PHP/Product-Crud/resources/?code=404&msg=Product not found!');
            // echo "Error: " . $sql . "<br>" . $this->db->conn->error;;
        }
    }
}
