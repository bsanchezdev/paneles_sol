<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of santander
 *
 * @author Desarrollo
 */
class Santander_c extends CI_Controller{
   public function __construct() {
       parent::__construct()                    ;
       $this->load->helper("caracteres")        ;
       $this->load->helper("file")              ;
       $this->load->helper("sql_construct")     ;
       $this->load->model("santander/Santander");
   }
   public function index() {
       $this->load->view("panel_procesos\santander\index");
   }
   public function paso_1($param="") {
       echo "Controlador respondiendo";
       $this->Santander->proc_1();
       
   }
}
