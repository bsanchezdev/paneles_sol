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
   var $ruta_cbdd_bn1       =   "//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\SANT_TERR_CARSIT\BN1\CARBDD.CSV";
   var $ruta_direccion_bn1  =   "//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\SANT_TERR_CARSIT\BN1\CARDIR.CSV";
   var $ruta_telefonos_bn1  =   "//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\SANT_TERR_CARSIT\BN1\TMOVIL.CSV";
   
   
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
     //  echo "Controlador respondiendo";
       $this->Santander->proc_1();
       $data["data_html"]=$this->Santander->data_html               ;
       $this->load->view("panel_procesos\santander\proc_1",$data)   ;
   }
   
   public function paso_2()
   {
       $this->Santander->proc_bn1();
       $this->exportar_bn1();
       
       $data["data_html"]=$this->data_html               ;
       $this->load->view("panel_procesos\santander\proc_1",$data)   ;


   }
   
   public function paso_3()
   {
        $this->Santander->proc_bnf();
   }
   
   protected function exportar_bn1()
   {
     /*exportar carbbd BN1*/
       $this->data_html="";
       if ( ! write_file($this->ruta_cbdd_bn1, $this->Santander->csv_carbdd_bn1))
{
     $this->data_html.='<li class="list-group-item">CARBDD BN1 <span class="badge">ERROR</span></li>'      ;
     
}
else
{
    $this->data_html.='<li class="list-group-item">CARBDD BN1 <span class="badge">OK</span></li>'      ;
   
}

if ( ! write_file($this->ruta_direccion_bn1, $this->Santander->csv_direccion_bn1))
{
     $this->data_html.= '<li class="list-group-item">CARBDD DIRECCIÓN BN1 <span class="badge">ERROR</span></li>' ;
}
else
{
    $this->data_html.= '<li class="list-group-item">CARBDD DIRECCIÓN BN1 <span class="badge">OK</span></li>' ;
}

if ( ! write_file($this->ruta_telefonos_bn1, $this->Santander->csv_telefonos_bn1))
{
    $this->data_html.= '<li class="list-group-item">CARBDD TELËFONOS BN1 <span class="badge">ERROR</span></li>' ;
}
else
{
   $this->data_html.= '<li class="list-group-item">CARBDD TELÉFONOS BN1 <span class="badge">OK</span></li>' ;
}  
/* fin carbdd bn1 */  
   }
   
}
