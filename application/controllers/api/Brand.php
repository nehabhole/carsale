<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';


class Brand extends REST_Controller
{

    function __construct()
    {

        // Construct the parent class
        parent::__construct();
    }

    function index_get($page = 1)
    {
        $this->load->model('brand_model');
        $per_page = 5;

        $total_brand = $this->brand_model->count_rows();
        $brands = $this->brand_model->fields('id,brand,logo')->paginate($per_page,$total_brand,$page);

        $response = [
           // 'status' => 'success',
            'msg' => 'Brand Listing',
            'data' => [
                'total' => $total_brand,
                'current_page' => $page,
                'brands' =>  $brands,
            ]
            //'per_page' => $per_page,
        ];

        if($brands)
        {
            $this->response($response, 200);
        } else
        {
            $this->response(NULL, 404);
        }
    }
}