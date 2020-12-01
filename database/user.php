<?php

class User{

    public $database = null;

    public function __construct(DatabaseController $db) {
        if (!isset($db->connection)) {
            return null;
        }
        $this->db = $db;

    }

    public function insertRegister($parameters = null, $table = "profiles"){
        if($this->db->connection != null) {
            if ($parameters != null) { //If parameters are given
                //Insert item into the cart
                //Insert into cart(user_id) values (0)
                // get the columns of the table
                $col = implode(',',array_keys($parameters));
                $values = "'" .implode("','",array_values($parameters)) . "'";
                print_r($col);
                print_r($values);
                //SQL Query to insert
                $query=sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $col, $values);
                print_r($query);
                $result = $this->db->connection->query($query);
                return $result;
            }
        }
    }


    public function Register($fname,$lname,$username,$email,$pass1,$pass2) {
        $page = $_SERVER['PHP_SELF'];
        //Registration variables
        if (isset($fname) && isset($lname) && isset($username) && isset($email) && ($pass1 == $pass2)) {
            $password = password_hash($pass1, PASSWORD_DEFAULT);
            $parameters = array(
                "fname" => $fname,
                "lname" => $lname,
                "username" => $username,
                "email" => $email,
                "password" => $password
            );

            $user = $this->db->connection->query("SELECT * FROM profiles WHERE username='$username' OR email='$email' LIMIT 1");

            if (mysqli_num_rows($user) != 0) {
                print_r("Account already exists! Try Again");
            }
            else {
                $result = $this->insertRegister($parameters);

                if ($result) {

                    $link = new mysqli('localhost', 'le11x_db1', 'cvbbn2', 'le11x_db1');
                    $stmt = $link->prepare("SELECT id FROM profiles WHERE username=?");
                    $stmt->bind_param('s', $username);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($userid);
                    $stmt->fetch();

                    $_SESSION['username'] = $username;
                    $_SESSION['user_id'] = $userid;
                    $_SESSION['success'] = "You are now logged in";
                    header("Location: index.php");
                
                }
                
            }
        

       
        }
        else {
            if ($pass1 != $pass2) {
                print_r("Passwords do not match! Try Again");
            }
        }
    }

    public function login($username,$pass1) {

        if(isset($username) && isset($pass1)) {
            $password = password_hash($pass1, PASSWORD_DEFAULT);

            $link = new mysqli('localhost', 'le11x_db1', 'cvbbn2', 'le11x_db1');

            $hashed_password = $link->prepare("SELECT id,password FROM profiles WHERE username=?");
            $hashed_password->bind_param('s', $username);
            $hashed_password->execute();
            $hashed_password->store_result();
            $hashed_password->bind_result($userid,$ps);

            if ($hashed_password->num_rows == 1) {
                $hashed_password->fetch();

                if (password_verify($pass1,$ps)) {
                    echo "Password match";
                    echo "Login Successful";
                    $_SESSION['username'] = $username;
                    $_SESSION['user_id'] = $userid;
                    $_SESSION['success'] = "You are now logged in";
                    header("Location: index.php");
                }
                else {
                    print_r("password is incorrect!");
                }
            }
            else {
                print_r($ps);
                print_r("User account doesn't exist!");
            }
        }
    }

    public function getName($userid) {
        if (isset($userid)) {
            $link = new mysqli('localhost', 'le11x_db1', 'cvbbn2', 'le11x_db1');
            $stmt = $link->prepare("SELECT username FROM profiles WHERE id=?");
            $stmt->bind_param('s', $userid);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($username);
            $stmt->fetch();

            return $username;
        }
    } 

    public function insertListing($parameters = null, $table = "items"){
        if($this->db->connection != null) {
            if ($parameters != null) { //If parameters are given
                //Insert item into the cart
                //Insert into cart(user_id) values (0)
                // get the columns of the table
                $col = implode(',',array_keys($parameters));
                $values = "'" .implode("','",array_values($parameters)) . "'";
                print_r($col);
                print_r($values);
                //SQL Query to insert
                $query=sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $col, $values);
                print_r($query);
                $result = $this->db->connection->query($query);
                return $result;
            }
        }
    }

    public function createListing($userid,$itemdesc,$itempicture,$itemname,$itemprice,$itemcategory) {

        //File Upload Section

        $file = $itempicture;

        $fileName = $itempicture['name'];
        $fileTmpName =$itempicture['tmp_name'];
        $fileError = $itempicture['error'];
        $fileSize = $itempicture['size'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 6500000) {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;

                    $fileDestination = '../assets/images/'.$fileNameNew;

                    move_uploaded_file($fileTmpName, $fileDestination);
                } 
                else {
                    print_r ("The file size is too large");
                }
            } 
            else {
                print_r ("There was an error uploading your file");
            }
        } 
        else {
            print_r ("You cannot upload files of that type.");
        }


        //SQLSection

          $query="INSERT INTO `items`(`user_id`, `item_desc`, `item_picture`, `item_name`, `item_price`, `item_category`) VALUES ($userid,'$itemdesc','$fileDestination','$itemname',$itemprice,'$itemcategory')";
   
          $result = $this->db->connection->query($query);
        
          if($result) {
              print_r("Upload Successful");
            header("Location: index.php");
          }
          else {
              print_r($result);
              print_r("Something went wrong");
          }
        }
}