<?php
function construir_array_de_inserts($adata=null,$tabla=null,$insert="INSERT INTO ")
{
    if($adata!=null&&$tabla!=null):
        
    $contar=0;
    $datos_array=array();
    $data="";
    foreach ($adata as $key => $value) {
        $data.="(";
        foreach ($value as $key_ => $value_) 
            {
               $value_=  str_replace("'", '´', $value_)         ;
               $value_=trim($value_);
               $data.="'".f_remove_odd_characters($value_)."'," ;
              }
            $data=trim($data,",")               ;
            $data=$data."),"                    ;
             $contar++                          ;
             if($contar==100):
             $contar=0                          ;
             $data=htmlspecialchars($data)      ;
             $datos_array[]=$data=trim($insert.$tabla." VALUES ".$data,",")                    ;
             $data=""                           ;
                 else:
             endif;
          
         
    }
    $data=htmlspecialchars($data)   ;
    $datos_array[]=$data=trim($insert.$tabla." VALUES ".$data,",")             ;
        return $datos_array         ;
    else:
        return false                ;
    endif;
}