<?php

class Cart {
    public $db = null;

    public function __construct(DatabaseController $db) {
        if (!isset($db->connection)) {
            return null;
        }
        $this->db = $db;

    }

    //cart entries

    public function insertCart($parameters = null, $table = "cart"){
        if($this->db->connection != null) {
            if ($parameters != null) { //If parameters are given
                //Insert item into the cart
                //Insert into cart(user_id) values (0)
                // get the columns of the table
                $col = implode(',',array_keys($parameters));
                $values = implode(',',array_values($parameters));


                //SQL Query to insert
                $query=sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $col, $values);
                $result = $this->db->connection->query($query);
                return $result;
            }
        }
    }

    //retrieve user_id and item_id
    public function addtoCart($userid,$itemid){
        $page = $_SERVER['PHP_SELF'];
        if (isset($userid) && isset($itemid)) {
            $parameters = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );
            $result = $this->insertCart($parameters);

            if ($result) {
                //Reloads the page
                    
                if ($page == "/Project/PHP/product.php") {
                    header('%s?item_id=%s','Location:/Project/PHP/product.php',$itemid);
                }
                else {
                    $page == null;
                    header("Location:" .$page);
                }
                
            }
        }
    }

    //Calculating the total 
    public function getSubtotal($array) {
        if (isset($array)) {
            $Subtotal = 0;
            foreach($array as $item) {
                $Subtotal  += floatval($item[0]);
            }
        }
        return sprintf("%.2f",$Subtotal);
    }

    //deletion of cart items

    public function deleteCart($user_id = null,$item_id = null, $table = 'cart') { 
        if ($item_id != null) {
        $result = $this->db->connection->query("DELETE FROM {$table} WHERE item_id={$item_id} AND user_id={$user_id} LIMIT 1");
            if ($result) {
                //Reloads the page
                header("Location:" .$_SERVER['PHP_SELF']);
            }

            return $result;
        }
    }
}