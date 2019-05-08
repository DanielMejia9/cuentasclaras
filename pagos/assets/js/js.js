// JavaScript Document
var ordenar = '';
$(document).ready(function(){
	

	// Llamando a la funcion de busqueda al
	// cargar la pagina
	
	var dates = $( "#del, #al" ).datepicker({
			yearRange: "-50",
			defaultDate: "+1w",
			changeMonth: true,
			changeYear: true,
			onSelect: function( selectedDate ) {
				var option = this.id == "del" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
	});
	
	// filtrar al darle click al boton
	$("#btnfiltrar").click(function(){ filtrar() });
	
	// boton cancelar
	$("#btncancel").click(function(){ 
		$(".filtro input").val('')
		$(".filtro select").find("option[value='0']").attr("selected",true)
		filtrar()
	});
	
	// ordenar por
	$("#data th span").click(function(){
		var orden = '';
		if($(this).hasClass("desc"))
		{
			$("#data th span").removeClass("desc").removeClass("asc")
			$(this).addClass("asc");
			ordenar = "&orderby="+$(this).attr("title")+" asc"		
		}else
		{
			$("#data th span").removeClass("desc").removeClass("asc")
			$(this).addClass("desc");
			ordenar = "&orderby="+$(this).attr("title")+" desc"
		}
		filtrar()
	});
});

function filtrar()
{	
	$.ajax({
		data: $("#frm_filtro").serialize()+ordenar,
		type: "POST",
		dataType: "json",
		url: "ajax.php?action=listar",
			success: function(data){
				var html = '';
				var caracteres= 200;
				if(data.length != 0){
					$.each(data, function(i,item){
						html += '<div class="fila tabla filaContenido">'
							html += '<div class="columna tabla corto contenido">'+item.id_trab+'</div>'
							html += '<div class="columna tabla largo contenido">'+item.fecha_desde+'</div>'
							html += '<div class="columna tabla largo contenido">'+item.fecha_hasta+'</div>'
							html += '<div class="columna tabla largo contenido">'+item.trab_trab.substr(0, caracteres)+'</div>'
							html += '<div class="columna tabla medio contenido">'+item.nume_depo+'</div>'
							html += '<div class="columna tabla medio contenido">'+item.monto_depo+'</div>'
							html += '<div class="columna tabla medio contenido usuario">'+item.nomb_usuario+'</div>'
							
							html += '<div class="columna tabla corto contenido"><a href="modificar_pagos.php?codi_trab='+item.nume_depo+'"><img src="../images/modificar.png" style="cursor:pointer;" width="32" title="Modificar" align="center"/></a></div>'
							html += '<div class="columna tabla corto contenido"><img src="../images/eliminar.png"   style="cursor:pointer;" title="Eliminar" width="32" align="center" onclick="eliminarPagos('+item.nume_depo+')"></div>'

						html += '</div>';
															
					});					
				}
				if(html == '') html = '<div class="fila tabla filaContenido">No se encontraron registros..</div>'
				$("#resultado").html(html);
			}
	  });
}
