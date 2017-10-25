<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Brand_model extends MY_Model
{
    public function __construct()
    {
        $this->table = 'brandlogo';
        $this->primary_key = 'id';
        $this->return_as = 'array';

        $this->timestamps = FALSE;
        $this->soft_deletes = FALSE;


        parent::__construct();
    }

}