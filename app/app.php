<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/cars.php";


    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app['debug'] = true;

    $app->get("/", function() use ($app) {
        return $app['twig']->render('carform.html.twig');
    });

    $app->post("/sellcar", function() use ($app) {
        return $app['twig']->render('cars_for_sale.html.twig');
    });

    $app->get("/view_car", function() use ($app) {
        $first_car = new Car("Mazda6", 15000, 25000, 2013, "img/mazda.jpg");
        $second_car = new Car("Audi A3", 18000, 10000, 2014, "img/audi.jpg");
        $third_car = new Car("vw Golf", 14000, 7000, 2016, "img/vw.jpg");

        $buy_price = $_GET['buyer_price'];
        $buy_mileage = $_GET['buyer_mileage'];

        $cars = array($first_car, $second_car, $third_car);
        $cars_matching_search = array();

        return $app['twig']->render('cars_to_buy.html.twig', array('cars_matching_search' => $cars_matching_search, 'cars' => $cars, 'buy_mileage' => $buy_mileage, 'buy_price' => $buy_price));

    });

    return $app;
?>

<!-- , array(cars_matching_search => $cars_matching_search, $cars => cars) -->
