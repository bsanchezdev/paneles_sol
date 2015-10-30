<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Santander
 *
 * @author Desarrollo
 */
class Santander extends CI_Model{
    
    public function __construct() {
        parent::__construct();
         $this->db_santander = $this->load->database('santander', TRUE);
    }
    
    protected function querys_proc_1($dias_para_vencimiento=180)
    {
        $CI=get_instance();
        $model_path=$CI->load;
        $model_path=APPPATH."models";
              
        
        
        $variables=array
            (
            "%dias_para_vencimiento%"   =>  $dias_para_vencimiento,
            "%VARX%"                    =>  "I30",
            "%VARY%"                    =>  "I32",
            "%VARZ%"                    =>  "I35",
            "%COBRADOR%"                =>  "SOL1"
            );
        $this->genera_asi_deudas=  load_query_file
                (
                $model_path.'/santander/querys/asi_deudas.sql',
                $variables
                );
        
        
        $this->genera_asi_clientes =  load_query_file
                (
                $model_path.'/santander/querys/asi_clientes.sql'
                );
        
        $this->genera_asi_cuotas =  load_query_file
                (
                $model_path.'/santander/querys/asi_cuotas.sql'
                );
        
        $this->genera_asi_direcciones =  load_query_file
                (
                $model_path.'/santander/querys/asi_direcciones.sql'
                );
    }

    public function proc_1()
    {
        $this->querys_proc_1();
        $this->db_santander->truncate("asi_deudas")                     ;
        $this->db_santander->truncate("carga")                          ;
        
        
        echo '<ul class="list-group">'                                  ;
        
        $this->db_santander->query($this->genera_asi_deudas)            ;
        echo '<li class="list-group-item">genera_asi_deudas <span class="badge">OK</span></li>'    ;
        
        $this->db_santander->truncate("asi_clientes")                   ;
        $this->db_santander->query($this->genera_asi_clientes)          ;
        echo '<li class="list-group-item">genera_asi_clientes <span class="badge">OK</span></li>'  ;
        
        $this->db_santander->truncate("asi_cuotas")                   ;
        $this->db_santander->query($this->genera_asi_cuotas);
        echo '<li class="list-group-item">genera_asi_cuotas <span class="badge">OK</span></li>'  ;
        
        $this->db_santander->truncate("asi_direcciones")                   ;
        $this->db_santander->query($this->genera_asi_direcciones);
        echo '<li class="list-group-item">genera_asi_direcciones <span class="badge">OK</span></li>'  ;
        
        echo "</ul>"                                                    ;
    }
    
}
