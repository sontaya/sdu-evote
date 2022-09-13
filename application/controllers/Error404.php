<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error404 extends MY_Controller {

    public function __construct() {
        parent::__construct();
      
    }

	public function index()
	{
        $data['title'] = 'มหาวิทยาลัยสวนดุสิต';        

        $this->data = $data;
        $this->middle = 'errors/error404';
        $this->layout();		
    }
  
}
