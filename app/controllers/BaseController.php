<?php

use \Controller;

class BaseController extends Controller {

    const PER_PAGE = 30;
    protected $perPage;
    protected $data;

    public function __construct()
    {
        $this->perPage = self::PER_PAGE;
        $this->data = array();
    }
}
