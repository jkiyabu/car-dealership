<?php

    class Car
    {
        private $model;
        private $price;
        private $milage;
        private $year;
        private $img;

        function __construct($model, $price, $milage, $year, $image_path)
        {
            $this->model = $model;
            $this->price = $price;
            $this->milage = $milage;
            $this->year = $year;
            $this->img = $image_path;
        }

        function setPrice($new_price) {
            $float_price = (float) $new_price;
            if ($float_price != 0) {
                  $formatted_price = number_format($float_price, 2);
                  $this->price = $formatted_price;
            }
        }

        function setMilage($new_milage) {
            $float_milage = (float) $new_milage;
            if ($float_milage != 0) {
                  $formatted_milage = number_format($float_milage, 0);
                  $this->milage = $formatted_milage;
            }
        }

        function getPrice() {
            return $this->price;
        }

        function getModel() {
            return $this->model;
        }

        function getMilage() {
            return $this->milage;
        }

        function getYear() {
            return $this->year;
        }

        function getImg() {
            return $this->img;
        }

      }


    $first_car = new Car("Mazda6", 15000, 25000, 2013, "img/mazda.jpg");
    $second_car = new Car("Audi A3", 18000, 10000, 2014, "img/audi.jpg");
    $third_car = new Car("vw Golf", 14000, 7000, 2016, "img/vw.jpg");
    $first_car->setPrice("15000");
    $second_car->setPrice("18000");
    $third_car->setPrice("14000");
    $first_car->setMilage("25000");
    $second_car->setMilage("10000");
    $third_car->setMilage("12000");

    $cars = array($first_car, $second_car, $third_car);

    $cars_matching_search = array();
    foreach ($cars as $car) {
        if (($car->getPrice() < $_GET["price"]) && ($car->getMilage() < $_GET["milage"])) {
            array_push($cars_matching_search, $car);
        }
    }
?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
     <link href="css/styles.css" rel="stylesheet" type="text/css">
     <title>Your Car Dealership's Homepage</title>
   </head>
   <body>
       <div class="container">
          <h1>Your Car Dealership</h1>

          <ul>
              <?php

                //var_dump($cars);
                  foreach ($cars_matching_search as $car) {
                      $price = $car->getPrice();
                      $model = $car->getModel();
                      $year = $car->getYear();
                      $milage = $car->getMilage();
                      $img = $car->getImg();
                      echo "<li> $model </li>";
                      echo "<ul>";
                          echo "<li> $year </li>";
                          echo "<li> $$price</li>";
                          echo "<li> Miles: $milage </li>";
                      echo "</ul>";
                      echo "<img src='$img'/>";
                  }
               ?>
          </ul>
        </div>
    </body>
 </html>
