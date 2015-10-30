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
        
    }

    public function proc_1()
    {
        $this->querys_proc_1();
        $this->db_santander->truncate("asi_deudas");
        $this->db_santander->truncate("carga");
        
        $this->db_santander->query($this->genera_asi_deudas);
        echo "<br><li>genera_asi_deudas OK</li>";
    }
    
}
