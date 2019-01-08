<?php 
class User  {
var $name;
var $email;
var $password;
var $phone;
var $address;
    function __construct(){}
    private function addUser() {
        echo 'Hoang <br>' ;
    }
    function editUser(){
        echo 'Minh <br>';
    }
    function register(){
        echo 'asc <br>';
    }
    function login(){
        echo 'acc <br>';
    }
    function view(){
        echo 'sfdf <br>';
    }
    private function lists(){
        echo '123 <br>';
    }
} 
$user = new User();

class Customer extends User {
    function __construct(){}
    function addressCustomer(){
        echo 'acc <br>';
    }
    function idCustomer(){
        echo 'sfdf <br>';
    }
}
$customer = new Customer();
?>
