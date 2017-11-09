<?php
require "vendor/autoload.php";
require "Customer.php";
require "CustomerDAO.php";
$faker = Faker\Factory::create();
$customerDAO = new CustomerDAO();

for($i = 0; $i < 10000; $i++)
{
    $customer = new Customer();
    $customer->setId($i);
    $customer->setFirstname($faker->firstName);
    $customer->setLastname($faker->lastName); 
    $customer->setEmail($faker->email);
    $customer->setSalary(purebell(5, 15, 3.5));
    $customer->setCivicNumber($faker->buildingNumber);
    $customer->setStreet($faker->streetName);
    $customer->setCity($faker->city);
    $customer->setState($faker->stateAbbr);
    $customer->setPostCode($faker->postcode);
    $customerDAO->addCustomer($customer);    
}

//Code provided by pitchinnate 
function purebell($min,$max,$std_deviation,$step=1)
{
  $rand1 = (float)mt_rand()/(float)mt_getrandmax();
  $rand2 = (float)mt_rand()/(float)mt_getrandmax();
  $gaussian_number = sqrt(-2 * log($rand1)) * cos(2 * M_PI * $rand2);
  $mean = ($max + $min) / 2;
  $random_number = ($gaussian_number * $std_deviation) + $mean;
  $random_number = round($random_number / $step) * $step;
  if($random_number < $min || $random_number > $max) {
    $random_number = purebell($min, $max,$std_deviation);
  }
  return $random_number;
}
?>