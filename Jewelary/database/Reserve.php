<?php

class Reserve
{
    public $db = null;  //acess database

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into reserve table
    public  function insertIntoReserve($param = null, $table = "reserve"){
        if ($this->db->con != null){
            if ($param != null){
                // "Insert into Reserve(user_id) values (0)"
                // get table columns
                $col = implode(',',array_keys($param));
               // print_r($col);
                $val = implode(',' , array_values($param));
              //  print_r($val);

                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $col, $val);
                //echo $query_string;
                // execute query
                $resu = $this->db->con->query($query_string);
                return $resu;
            }
        }
    }

    // to get user_id and item_id and insert into reserve table
    public  function addToReserve($userid, $itemid){   //button click add to cart call here
        if (isset($userid) && isset($itemid)){
            $param = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );

            // insert data into reserve
            $resu = $this->insertIntoReserve($param);
            if ($resu){

                header("Location: " . $_SERVER['PHP_SELF']);  // Reload Page
            }
        }
    }

    // get item_id of reserve list //test reserve my experiment
  /*  public function getRId($reserveArray = null, $key = "item_id"){
        if ($reserveArray != null){
            $R_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $reserveArray);
            return $R_id;
        }
    }*/
}