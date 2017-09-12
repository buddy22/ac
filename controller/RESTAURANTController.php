<?php
 class RESTAURANTController extends ControladorBase
 {
     public function __construct() {
         parent::__construct();
     } 
     
     public function index()
     {
        //Cargamos la vista index y le pasamos valores
        $this->view("menu");
     }
 }
?>