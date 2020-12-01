<?php

class Item{
    public $database = null;
    //constructor
    public function __construct(DatabaseController $db) {
        if (!isset($db->connection)) {
            return null;
        }
        $this->db = $db;

    }

    //Get Item information using getData method
    public function getData($table = 'items'){
        $result = $this->db->connection->query("SELECT * FROM {$table}");

        $resultArray = array();

        //Retrieving the information of each product one by one
        while ($product = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $product;
        }

        return $resultArray;
    }

    // get a specific item via item id
    public function getItem($item_id = null, $table = 'items') {
        if (isset($item_id)) {
                $result = $this->db->connection->query("SELECT * FROM {$table} WHERE item_id={$item_id}");
        }

        $resultArray = array();

        //Retrieving the information of each product one by one
        while ($product = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $product;
        }

        return $resultArray;
    }

    //Get Item information using getData method
    public function getUserData($user_id = null, $table = 'items'){
        if (isset($user_id)) {
              $result = $this->db->connection->query("SELECT * FROM {$table} WHERE user_id={$user_id}");
        }
        $resultArray = array();

        //Retrieving the information of each product one by one
        while ($product = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $product;
        }

        return $resultArray;
    }

    // get a specific item via item id
    public function getUserItem($user_id= null,$item_id = null, $table = 'items') {
        if (isset($item_id) && isset($user_id)) {
         $result = $this->db->connection->query("SELECT * FROM {$table} WHERE item_id={$item_id} AND user_id={$user_id}");
        }

        $resultArray = array();

        //Retrieving the information of each product one by one
        while ($product = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $product;
        }

        return $resultArray;
    }
}