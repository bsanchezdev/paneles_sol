<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ripley
 *
 * @author Desarrollo
 */
class Ripley_c extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("ripley/ripley");
                 $this->load->helper("caracteres");
                 $this->load->helper("file");
                 $this->load->helper("sql_construct");
    }
    
    public function index() {
        $data="";
        $this->load->view("panel_procesos/ripley/index",$data);}
    
    public function proces_1($periodo="",$fechacarga="") {
         
     if( $this->ripley->proces_1() && $periodo !="" ):
         $this->periodo($periodo);
        $this->ripley->cuadratura($fechacarga);
     endif;
        
    }
    
    public function modal_periodo()
    {
        $this->load->view("panel_procesos/ripley/modal_periodo");
    }
    
    public function periodo($periodo)
    {
      $data=  $this->ripley->periodo_proc($periodo);
    }
}
