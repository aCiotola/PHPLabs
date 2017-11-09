<?php
class Customer 
{
      private $id;
      private $firstname;
      private $lastname;
      private $email;
      private $salary;
      private $civicnumber;
      private $street;
      private $city;
      private $state;
      private $postcode; 

      function __construct($id = 0, $firstname = "", $lastname = "", $email = "", $salary = "",
                            $civicnumber = "", $street = "", $city = "", $state = "", $postcode = "") 
      {
         $this->id = $id;
         $this->firstname = $firstname;
         $this->lastname = $lastname;
         $this->email = $email;
         $this->salary = $salary;
         $this->civicnumber = $civicnumber;
         $this->street = $street;
         $this->city = $city;
         $this->state = $state;
         $this->postcode = $postcode;
      }
      
      function getId(){
         return $this->id;
      }
      
      function setId($id){
         $this->id = $id;
      }

      function getFirstname(){
         return $this->firstname;
      }
      
      function setFirstname($firstname){
         $this->firstname = $firstname;
      }
      
      function getLastname(){
         return $this->lastname;
      }
      
      function setLastname($lastname){
         $this->lastname = $lastname;
      }
      
      function getEmail(){
         return $this->email;
      }
      
      function setEmail($email){
         $this->email = $email;
      }
      
      function getSalary(){
         return $this->salary;
      }
      
      function setSalary($salary){
         $this->salary = $salary;
      }
      
      function getCivicNumber(){
         return $this->civicnumber;
      }
      
      function setCivicNumber($civicnumber){
         $this->civicnumber = $civicnumber;
      }
      
      function getStreet(){
         return $this->street;
      }
      
      function setStreet($street){
         $this->street = $street;
      }
      
      function getCity(){
         return $this->city;
      }
      
      function setCity($city){
         $this->city = $city;
      }
      
      function getState(){
         return $this->firstname;
      }
      
      function setState($state){
         $this->state = $state;
      }
      
      function getPostCode(){
         return $this->postcode;
      }
      
      function setPostCode($postcode){
         $this->postcode = $postcode;
      }    
}