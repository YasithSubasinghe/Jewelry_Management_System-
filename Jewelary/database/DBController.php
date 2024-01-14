<?php
class DBController
{
    //Database Connection Properties
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = 'jewellary';

    //connection property
    public $con = null;


    //call constructor
    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if ($this->con->connect_error) {
            echo "Fail " . $this->con->connect_error;
        }
        //echo 'Connection Successfully';
    }
    public function __destruct() //destruct function auto call when the object is not use
    {
        $this->closeConnection();
    }

    // for mysqli closing connection
    protected function closeConnection(){
        if ($this->con != null ){
            $this->con->close();
            $this->con = null;
        }
    }
}
