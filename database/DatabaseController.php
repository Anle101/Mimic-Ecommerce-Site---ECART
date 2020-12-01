<?php


class DatabaseController
{
    //DB Connection properties
    protected $host= 'localhost';
    protected $user= 'le11x_db1';
    protected $password = "cvbbn2";
    protected $database = "le11x_db1";

    //Connection
    public $connection = null;

    //Constructor
    public function __construct() {
        $this->connection = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        if ($this->connection->connect_error) {
            echo "fail" .$this->connection->connect_error;
        }

    }

    public function __destruct() {
        $this->closeConnection();
    }

    //closing the connection established 
    protected function closeConnection() {
        if ($this->connection != null) {
            $this->connection->close();
            $this->connection = null;

        }
    }
}

?>