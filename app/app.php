<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/cars.php";


    $app = new Silex\Application();

    $app->get("/", function() {
        return "Home";
    });

    $app->get("/new_car", function() {
        return "
        <!DOCTYPE html>
        <html>
          <head>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
            <link href='css/styles.css' rel='stylesheet' type='text/css'>
            <meta charset='utf-8'>
            <title>Find a Car</title>
          </head>
          <body>
            <div class='container'>
                <h1>Find a Car!</h1>
                <form action='/view_car'>
                  <div class='form-group'>
                    <label for='price'>Enter Maximum Price:</label>
                    <input id='price' name='price' class='form-control' type='number'>
                    <label for='mileage'>Enter Maximum Mileage:</label>
                    <input id='mileage' name='mileage' class='form-control' type='number'>
                  </div>
                  <button type='submit' class='btn-success'>Submit</button>
          </body>
        </html>
        ";
    });
    $app->get("/view_car", function() {
      $first_car = new Car("Mazda6", 15000, 25000, 2013, "img/mazda.jpg");
      $second_car = new Car("Audi A3", 18000, 10000, 2014, "img/audi.jpg");
      $third_car = new Car("vw Golf", 14000, 7000, 2016, "img/vw.jpg");

      $cars = array($first_car, $second_car, $third_car);
      $cars_matching_search = array();

      foreach ($cars as $car) {
          if ($car->getPrice() < $_GET['price'] && ($car->getMileage() < $_GET['mileage'])){
              array_push($cars_matching_search, $car);
          }
      }

      $output = "";
        foreach ($cars_matching_search as $car) {
            $output = $output . "<div class='row'>
                <div class='col-md-6'>
                    <img src=" . $car->getImg() . ">
                </div>
                <div class='col-md-6'>
                    <p>Model: " . $car->getModel() . "</p>
                    <p>Price: $" . $car->getPrice() . "</p>
                    <p>Mileage: " . $car->getMileage() . "</p>
                    <p>Year: " . $car->getYear() . "</p>
                </div>
            </div>
            ";
        }
        return $output;


    });

    return $app;
?>
