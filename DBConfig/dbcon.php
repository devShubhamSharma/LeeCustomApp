<?php
  class DbConnect{
      private $hostname;
      private $dbname;
      private $username;
      private $password;
      public $conn;

      function  __construct(){
        $this->hostname="shopify-clients.cluster-c07abb6qygwc.us-east-2.rds.amazonaws.com";
        $this->username="admin";
        $this->password="hKx2;aX-e;dFKq]t";
        $this->dbname="leecustomapp";
      }

      function mkconnection(){
          $this->conn=new mysqli($this->hostname,$this->username,$this->password,$this->dbname);
          if($this->conn->error){
              echo "error in connection";
          }else{
              print_r("connected");
          }
      }
      
  }