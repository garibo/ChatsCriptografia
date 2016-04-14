(function(){
	$(document).ready(function(){ 

      descargar();

      $( "#texto" ).keydown(function() {
        if(event.keyCode == 13) 
        {
          insertar();
          $("#texto").val("");
          return false;
        }
      });

      $("#enviar").click(function(){
        insertar();
        $("#texto").val("");
      });

      function insertar ()
      {
        $.ajax({
          url : "php/insert.php",
          method : "post",
          data : {
            "usuario" : "kevin",
            "mensaje" : $("#texto").val()
          }
        })
        .done(function(){
        })
        .fail(function(){
        });
      }

      function descargar()
      {
        var clase = "";
        $.ajax({
          url : "php/get.php",
          method : "get"
        })
        .done(function(e){
          $("#lugar").empty();
          var datos = $.parseJSON(e);
          datos = datos.reverse();
          for(var i = 0; i < datos.length; i++)
          {
            if(datos[i].autor == "kevin")
            {
              $("#lugar").append("<div class='kevin'><span>"+datos[i].mensaje+"</span></div>");
            }
            else
            {
               $("#lugar").append("<div class='alan'><span>"+datos[i].mensaje+"</span></div>");
             }
          }
          setInterval(descargar(),1000);
        })
        .fail(function(){

        });
      }

    });
})();