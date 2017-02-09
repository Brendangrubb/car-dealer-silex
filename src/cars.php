<?php
class Car
{
    private $model;
    private $price;
    private $mileage;
    private $year;

    function __construct($model, $price, $mileage, $year)
    {
        $this->model = $model;
        $this->price = $price;
        $this->mileage = $mileage;
        $this->year = $year;
    }
    // function setPrice($new_price) {
    //     $float_price = (float) $new_price;
    //     if ($float_price != 0) {
    //           $formatted_price = number_format($float_price, 2);
    //           $this->price = $formatted_price;
    //     }
    // }
    function setModel() {
        $this->model = $new_model;
    }

    function getModel() {
      return $this->model;
    }

    function setPrice() {
        $this->price = $new_price;
    }

    function getPrice() {
        return $this->price;
    }

    function setMileage() {
        $this->mileage = $new_mileage;
    }

    function getMileage() {
        return $this->mileage;
    }

    function setYear() {
        $this->year = $new_year;
    }

    function getYear() {
        return $this->year;
    }

    // function setImg() {
    //     $this->img = $new_img;
    // }
    // function getImg() {
    //     return $this->img;
    // }

    static function getAll() {
        return $_SESSION['list_of_cars'];
    }

    function save() {
        array_push($_SESSION['list_of_cars'], $this);
    }

    static function deleteAll() {
        $_SESSION['list_of_cars'] = array();
    }
  }
?>
