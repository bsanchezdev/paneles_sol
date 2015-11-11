<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of uvm
 *
 * @author Desarrollo
 */
class Uvm_c extends CI_Controller {
        var $ruta_cbdd      =   "//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\UVM_CARSIT\SALIDA\CARBDD.CSV";
   
    public function __construct() {
        parent::__construct();
                 $this->load->model("uvm/uvm");
                 $this->load->helper("caracteres");
                 $this->load->helper("file");
                 $this->load->helper("sql_construct");
    }
    
    protected function importar_data() {
    
       $ruta="//199.69.69.93\interfaces_cedentes\Cargas Procesos\APLICACIONES\UVM_CARSIT\ENTRADA";
       $listado=get_dir_file_info($ruta);
       foreach ($listado as $key => $value) {
           
           $r=$listado[$key];
         $this->data[$r["name"]]=  load_file($r["server_path"],null,"dia");
       } 
        
    }
    
    public function index() {
        
        $this->load->view("panel_procesos/uvm/index");
    }
    
    public function iniciar() {
        $this->importar_data()                  ;
        $this->uvm->proc_1($this->data)         ;
        $this->uvm->cuadratura()                ;
        $this->uvm->carga_sitrel()              ;       
        echo '<ul class="list-group">';
        foreach ($this->uvm->cuadratura as $key => $value) {
            echo '<li class="list-group-item">'.$value["CONCEPTO"].' <span class="badge">'.$value["CANTIDAD"].'</span></li>' ;
        }
        echo "</ul>";
    }
    
    public function normaliza() {
        $this->load->view("panel_procesos/uvm/modal_periodo");
            
       
    }
    public function norm($fi,$ft) {
        $this->uvm->normalizar($fi,$ft)                ;    
        echo "<script> paso_3(); </script>";
    }
    public function carga_base_sitrel() {
         $this->uvm->carga_bases_sitrel()        ;
         $this->uvm->exportar_deuda();
         $this->data_html="";
          if ( ! write_file($this->ruta_cbdd, $this->uvm->csv_carbdd))
{
     $this->data_html.='<li class="list-group-item">CARBDD <span class="badge">ERROR</span></li>'      ;
     
}
else
{
    $this->data_html.='<li class="list-group-item">CARBDD <span class="badge">OK</span></li>'      ;
   
}
 $data["data_html"]=$this->data_html               ;
$this->load->view("panel_procesos\uvm\proc_1",$data)   ;
 echo "<script> update_pagos(); </script>";
 
    }
    
    
    public function update_pagos() {
        $this->uvm->update_pagos();
    }
}