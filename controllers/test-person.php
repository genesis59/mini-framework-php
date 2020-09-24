<?php 
require "../classes/Person.php";
require "../classes/Student.php";
require "../classes/Adresse.php";

//$joe = new Person("John Doe","m");
//$joe->setName("Joe le taxi");
//$joe->setGender("m");
//echo "<p>Joe est un " . $joe->getGender() . " et il s'appelle : " . $joe->getName() . "</p>" ;
//echo $joe->greet();

//$jane = new Person("Jane","f");
//$jane->setName("Jane le taxi");
//$jane->setGender("f");
//echo "<p>Jane est un " . $jane->getGender() . " et elle s'appelle : " . $jane->getName() . "</p>" ;
//echo $jane->greet();
$adresse = new Adresse(["street" => "5 rue de la Paix","zipCode" => 75000,"city" => "Paris"]);
$joey = new Person(["name" => "Joey","gender" => "m"],$adresse);
$joey->setEyeColor(Person::COLOR_BLUE);

var_dump($joey);
//echo "<p>" . Person::$numberOfIntances . "</p>";

$jean = new Person();
echo "<p>" . Person::$numberOfIntances . "</p>";

$vincent = new Student();
$vincent->setSchool("Beaux arts");
$vincent ->setName("Vincent");
$vincent->setGender("m");
$vincent->setEyeColor(Student::COLOR_GREEN);

var_dump($vincent);
echo "<br>";
$alice = new Student(["name" => "Alice","gender" => "f","school" => "La Sorbonne"]);
var_dump($alice);

echo $vincent->greet();
echo $alice->greet();
echo $joey->greet();


