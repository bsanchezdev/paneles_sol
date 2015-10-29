<button id="periodo" class = "btn btn-primary btn-lg hidden" data-toggle = "modal" data-target = "#myModal">
   Solicitar Periodo
</button>
<!-- Modal -->
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               This Modal title
            </h4>
         </div>
         
         <div class = "modal-body">
             <label>Ingrese el periodo</label>
             <input type="text" class="form-control periodo" value="" placeholder="201510" required/>
         </div>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Cancelar
            </button>
            
            <button id="continuar" type = "button" class = "btn btn-primary">
               Continuar
            </button>
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->
<script> 
    $("#periodo").trigger("click");
    
    $("#continuar").on("click",function()
    {
        
       if($(".periodo").val().trim()!=="")
       {
           $.ajax({
  type: "POST",
  url: "<?= base_url("c_p/ripley_c/periodo/");?>/"+$(".periodo").val(),
  data: "",
  success: function(data){
      $("#carbdd").toggleClass("hidden");
      
      $( ".contenedor-datos-ajax" ).append( data );
  },
  error: function(XMLHttpRequest, textStatus, errorThrown) {
    $( ".contenedor-datos-ajax" ).append( data );
  }
});
       }else{alert("Ingrese el Periodo");}
       
    });
    
</script>