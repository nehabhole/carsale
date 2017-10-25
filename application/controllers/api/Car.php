<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';


class Car extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    function car_get()
    {
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }

        $car = $this->car_model->get( $this->get('id') );

        if($car)
        {
            $this->response($car, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(NULL, 404);
        }
    }


    function cars_get()
    {
        $cars = $this->car_model->get_all();

        if($cars)
        {
            $this->response($cars, 200);
        }

        else
        {
            $this->response(NULL, 404);
        }
    }

    function car_search()
    {
        if(!($this->get('location') || $this->get('price')))
        {
            $this->response(NULL, 400);
        }

        $car = $this->car_model->get( $this->get('id') );

        if($car)
        {
            $this->response($car, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(NULL, 404);
        }
    }



    }