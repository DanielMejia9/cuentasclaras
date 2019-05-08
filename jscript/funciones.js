function validaImagen()
{
 var fichero =  document.forms.form_image.imagen.value;
 if(fichero == "")
 {
	 alert("Debe seleccionar la imagen");
 }
}


function enviarPago(codi){ 

	//Pasamos el valor SI por la funcion y lo asignamos al hidden anadir
	document.getElementById("anadir").value = codi;
	//Obtenemos el valor de la imagen y los asignamos al hidden
	valorImagen = document.getElementById("valorImagen").value;	
	 document.getElementById("recibiImagen").value = valorImagen;
		
}




function sorteo(v1,v2){
	var confirmar = confirm("¿Desea solicitar la oferta?");
	if(confirmar){
		
		document.getElementById("usuario").value = v1;
		document.getElementById("oferta").value = v2;
		document.form_ofer_actu.action ="../controle/controle_solicitud.php"
		document.form_ofer_actu.submit();
		}			
	}
function sumarCantidad()
{
	//Suma en Moneda Venezolana
	var cant = document.getElementById("cant").value;
	var monto = document.getElementById("mont_vef").value;
	
	//Multiplica los valores
	var total = cant *  monto;
	//Coloca dos decimales
	total = total.toFixed(2);
	
	//Convertimos los puntos por comas
	//total =  total.toString().replace(/\./g,',');
	//total = total.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
	//total = total.split('').reverse().join('').replace(/^[\.]/,'');
	
	document.getElementById("tota_vef").value = total;
	
	//Suma en Moneda US
	//var cant1 = document.getElementById("cant").value;
	//var monto1 = document.getElementById("mont_us").value;
	
	//Multiplica los valores
	//var total1 = cant1 *  monto1;
	
	//Coloca dos decimales
	//total1 = total1.toFixed(2);
	
	//Convertimos los puntos por comas
	//total1 =  total1.toString().replace(/\./g,',');
	//total1 = total1.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
	//total1 = total1.split('').reverse().join('').replace(/^[\.]/,'');
	
	//document.getElementById("tota_us").value = total1;
	
	//Deshabilitamos los campos
	//document.getElementById("tota_vef").disabled = true;
	//document.getElementById("tota_us").disabled = true;
	}
	
	
function validarUser(){
	if (document.getElementById("usuario").value =="")
	{
		alert("Debe el nombre de usuario registrado");
	}
	else if(document.getElementById("password").value =="")
	{
		alert("Debe la contraseña del usuario registrado ");
		
		}
	else{
			document.login.submit();
		}
	}
	
	
	function validaReg(){
		
		/*if(document.getElementById("prio").value==""){
			alert("Debe seleccionar la prioridad");
			form_trab.prio.focus()
			}
				else if(document.getElementById("req1").value==""){
					alert("Debe indicar el requerimiento");
					form_trab.req1.focus()
					}
					else if(document.getElementById("proye").value==""){
						alert("Debe describir el proyecto");
						form_trab.proye.focus()
						}
						
						else if(document.getElementById("trab").value==""){
							alert("Debe describir el trabajo");
							form_trab.trab.focus()
						}
							else if(document.getElementById("form").value==""){
								alert("Debe indicar el pais");
								form_trab.form.focus()
							}
								else if(document.getElementById("moda").value==""){
									alert("Debe describir la modalidad");
									form_trab.moda.focus()
								}
									else if(document.getElementById("cant").value==""){
										alert("Debe indicar la cantidad");
										form_trab.cant.focus()
									}
										else if(document.getElementById("tiem").value==""){
											alert("Debe indicar el tiempo estimado");
											form_trab.tiem.focus()
										}									
											else{*/
													//document.form_clie.action ="controle/modelo.php"
													document.form_trab.submit();
													
												//}                       
		
	}
	
function validaRegMod()
{

		document.form_mod_trab.action ="../controle/controle_modificarTrab.php"
		document.form_mod_trab.submit();										                      
		
}

function modificarPago()
{

		document.form_mod_pag.action ="../controle/controle_modificarPagos.php"
		document.form_mod_pag.submit();										                      
		
}



/***************************************************************/
function validaOferta(){
		
		/*if(document.getElementById("prio").value==""){
			alert("Debe seleccionar la prioridad");
			form_trab.prio.focus()
			}
				else if(document.getElementById("req1").value==""){
					alert("Debe indicar el requerimiento");
					form_trab.req1.focus()
					}
					else if(document.getElementById("proye").value==""){
						alert("Debe describir el proyecto");
						form_trab.proye.focus()
						}
						
						else if(document.getElementById("trab").value==""){
							alert("Debe describir el trabajo");
							form_trab.trab.focus()
						}
							else if(document.getElementById("form").value==""){
								alert("Debe indicar el pais");
								form_trab.form.focus()
							}
								else if(document.getElementById("moda").value==""){
									alert("Debe describir la modalidad");
									form_trab.moda.focus()
								}
									else if(document.getElementById("cant").value==""){
										alert("Debe indicar la cantidad");
										form_trab.cant.focus()
									}
										else if(document.getElementById("tiem").value==""){
											alert("Debe indicar el tiempo estimado");
											form_trab.tiem.focus()
										}									
											else{*/
													//document.form_clie.action ="controle/modelo.php"
													document.form_ofer.submit();
													
												//}                       
		
	}
	
function validaModOferta(){
		
		//document.getElementById("cod_unitrab").value = id_trab; 
		/*if(document.getElementById("prio").value==""){
			alert("Debe seleccionar la prioridad");
			form_trab.prio.focus()
			}
				else if(document.getElementById("req1").value==""){
					alert("Debe indicar el requerimiento");
					form_trab.req1.focus()
					}
					else if(document.getElementById("proye").value==""){
						alert("Debe describir el proyecto");
						form_trab.proye.focus()
						}
						
						else if(document.getElementById("trab").value==""){
							alert("Debe describir el trabajo");
							form_trab.trab.focus()
						}
							else if(document.getElementById("form").value==""){
								alert("Debe indicar el pais");
								form_trab.form.focus()
							}
								else if(document.getElementById("moda").value==""){
									alert("Debe describir la modalidad");
									form_trab.moda.focus()
								}
									else if(document.getElementById("cant").value==""){
										alert("Debe indicar la cantidad");
										form_trab.cant.focus()
									}
										else if(document.getElementById("tiem").value==""){
											alert("Debe indicar el tiempo estimado");
											form_trab.tiem.focus()
										}									
											else{*/
													document.form_mod_ofer.action ="../controle/controle_modificarOfer.php"
													document.form_mod_ofer.submit();
													
												//}                       
		
	}


//
function validaModUsuario(){
		
		//document.getElementById("cod_unitrab").value = id_trab; 
		/*if(document.getElementById("prio").value==""){
			alert("Debe seleccionar la prioridad");
			form_trab.prio.focus()
			}
				else if(document.getElementById("req1").value==""){
					alert("Debe indicar el requerimiento");
					form_trab.req1.focus()
					}
					else if(document.getElementById("proye").value==""){
						alert("Debe describir el proyecto");
						form_trab.proye.focus()
						}
						
						else if(document.getElementById("trab").value==""){
							alert("Debe describir el trabajo");
							form_trab.trab.focus()
						}
							else if(document.getElementById("form").value==""){
								alert("Debe indicar el pais");
								form_trab.form.focus()
							}
								else if(document.getElementById("moda").value==""){
									alert("Debe describir la modalidad");
									form_trab.moda.focus()
								}
									else if(document.getElementById("cant").value==""){
										alert("Debe indicar la cantidad");
										form_trab.cant.focus()
									}
										else if(document.getElementById("tiem").value==""){
											alert("Debe indicar el tiempo estimado");
											form_trab.tiem.focus()
										}									
											else{*/
													document.form_mod_usua.action ="../controle/controle_modificarUsua.php"
													document.form_mod_usua.submit();
													
												//}                       
		
	}

//Eliminar Registro de Usuario
function eliminarReg(cod_uni){
	var confirmar = confirm("¿Desea eliminar este registro?");
	if(confirmar){
		document.getElementById("cod_uni").value = cod_uni
		document.form_user.action ="controle/modelo_eliminar.php"
		document.form_user.submit();
		}			
	}
//Modificar Registro de Usuario	
function modificarReg(cod_uni){
	var confirmar = confirm("¿Desea modificar este registro?");
	if(confirmar){
		var codi_uni = cod_uni
		document.getElementById("cod_uni").value = cod_uni
		
		document.form_user.submit();

		}
}


//Eliminar registro del trabajo
function eliminarTrab(codi_trab){
	var confirmar = confirm("¿Desea eliminar este registro?");
	if(confirmar){
		document.getElementById("cod_unitrab").value = codi_trab
		document.frm_filtro.action ="../controle/eliminar_cliente.php"
		document.frm_filtro.submit();
		}			
	}
	
	
//Eliminar registro del Pago
function eliminarPagos(codi_trab){
	var confirmar = confirm("¿Desea eliminar este registro?");
	if(confirmar){
		document.getElementById("cod_unitrab").value = codi_trab
		document.frm_filtro.action ="../controle/eliminar_pagos.php"
		document.frm_filtro.submit();
		}			
	}	
	
//Eliminar registro de  la oferta
function eliminarOfer(cod_uniofer){
	var confirmar = confirm("¿Desea eliminar este registro?");
	if(confirmar){
		document.getElementById("cod_uniofer").value = cod_uniofer
		document.frm_filtro.action ="../controle/eliminar_oferta.php"
		document.frm_filtro.submit();
		}			
	}
	
	//Eliminar registro de  la Usuario
function eliminarUsua(cod_uniusua){
	var confirmar = confirm("¿Desea eliminar este registro?");
	if(confirmar){
		document.getElementById("cod_uniusua").value = cod_uniusua
		document.form_usua_actu.action ="../controle/eliminar_usuario.php"
		document.form_usua_actu.submit();
		}			
	}
	
//Modificar registro Cliente	
function modificarClie(cod_uniClie){
	var confirmar = confirm("¿Desea modificar este registro?");
	if(confirmar){
		var codi_uni = cod_uniClie
		document.getElementById("cod_uniClie").value = cod_uniClie
		document.form_clie.action ="controle/modificar_cliente.php"
		document.form_clie.submit();

		}
}












function validaReguser(){
	if(document.getElementById("nom_usu").value==""){
			alert("Debe indicar el nombre del usuario");
			form.nom_usu.focus()
			}
				else if(document.getElementById("ape_usu").value==""){
					alert("Debe indicar el apellido");
					form.ape_usu.focus()
					}
					else if(document.getElementById("ced_usu").value==""){
						alert("Debe indicar el Nº de cédula");
						form.ced_usu.focus()
						}
						
						else if(document.getElementById("car_usu").value==""){
							alert("Debe indicar el cargo");
							form.car_usu.focus()
						}
							else if(document.getElementById("per_usu").value==""){
								alert("Debe indicar el tipo de usuario");
								form.per_usu.focus()
							}
							
							else if(document.getElementById("pass_usu").value==""  ) {
								alert("Debe escribir una contraseña");
								form.conf_pass_usu.focus()
							}
							
							else if(document.getElementById("conf_pass_usu").value==""  ) {
								alert("Debe confirma la contraseña");
								form.conf_pass_usu.focus()
							}		

							else if(!(document.getElementById("pass_usu").value == document.getElementById("conf_pass_usu").value )) {
								alert("Debe escribir la misma contraseña");
								form.conf_pass_usu.focus()
							}
						
								else{
									document.form_user.action ="controle/modelo_usuario.php"
									document.form_user.submit();								
									} 			   							                  
	}
	
	
	function validaRegcont(){
	if(document.getElementById("nom_cont").value==""){
			alert("Debe indicar el nombre del usuario");
			form.nom_usu.focus()
			}
				else if(document.getElementById("ape_cont").value==""){
					alert("Debe indicar el apellido");
					form.ape_usu.focus()
					}
					else if(document.getElementById("tel_cont_local").value==""){
						alert("Debe indicar el Nº de telefono");
						form.ced_usu.focus()
						}
						
						/*else if(document.getElementById("car_usu").value==""){
							alert("Debe indicar el cargo");
							form.car_usu.focus()
						}
							else if(document.getElementById("per_usu").value==""){
								alert("Debe indicar el tipo de usuario");
								form.per_usu.focus()
							}
							
							else if(document.getElementById("pass_usu").value==""  ) {
								alert("Debe escribir una contraseña");
								form.conf_pass_usu.focus()
							}
							
							else if(document.getElementById("conf_pass_usu").value==""  ) {
								alert("Debe confirma la contraseña");
								form.conf_pass_usu.focus()
							}		

							else if(!(document.getElementById("pass_usu").value == document.getElementById("conf_pass_usu").value )) {
								alert("Debe escribir la misma contraseña");
								form.conf_pass_usu.focus()
							}*/
						
								else{
									document.form_user.action ="controle/modelo_contacto.php"
									document.form_user.submit();								
									} 			   							                  
	}
	
	
	function validaModuser(){
	if(document.getElementById("nom_usum").value==""){
			alert("Debe indicar el nombre del usuario");
			form_moduse.nom_usu.focus()
			}
				else if(document.getElementById("ape_usum").value==""){
					alert("Debe indicar el apellido");
					form_moduse.ape_usu.focus()
					}
					else if(document.getElementById("ced_usum").value==""){
						alert("Debe indicar el Nº de cédula");
						form_moduse.ced_usu.focus()
						}
						
						else if(document.getElementById("car_usum").value==""){
							alert("Debe indicar el cargo");
							form_moduse.car_usu.focus()
						}
							else if(document.getElementById("per_usum").value==""){
								alert("Debe indicar el tipo de usuario");
								form_moduse.per_usu.focus()
							}
							
							else if(document.getElementById("pass_usum").value==""  ) {
								alert("Debe escribir una contraseña");
								form_moduse.conf_pass_usu.focus()
							}
							
							else if(document.getElementById("conf_pass_usum").value==""  ) {
								alert("Debe confirma la contraseña");
								form_moduse.conf_pass_usu.focus()
							}		

							else if(!(document.getElementById("pass_usum").value == document.getElementById("conf_pass_usum").value )) {
								alert("Debe escribir la misma contraseña");
								form_moduse.conf_pass_usu.focus()
							}
						
								else{
									document.form_moduse.action ="controle/modelo_modif_user.php"
									document.form_moduse.submit();								
									} 			   							                  
	}



function verUsuer(){	
	
		var tabla1 = document.getElementById("Tabla1");
		var tabla2 = document.getElementById("Tabla2");
		var titulo1 = document.getElementById("titulo1");
		var pie =   document.getElementById("pie");
		if (tabla1.style.display == "none") {
		tabla1.style.display = "";
		tabla2.style.display = "";
		pie.style.display = "none";
		} else {
		tabla1.style.display = "none";
		tabla2.style.display = "none";
		pie.style.display = "";
		
} 

		
		if (titulo1.style.display == "none") {
		titulo1.style.display = "";
		
		} else {
		titulo1.style.display = "none";
		} 
	}
	
	
	
//Calcula de la suma de la facturacion
function suma(v1,v2){
	
	//Toma el valor incremen de los seleccionado en la tabla
	var v1 = v1 ;
	var v2 = v2;

	//alert(v1);
	//obtenemos el valor de los input y le asignamos el valor del incremento
	document.getElementById("txtCant"+v1).value;
	document.getElementById("txtPrec"+v1).value;
	
	var cantidad;
	var precio;
	var suma;
	
	cantidad = parseFloat(document.getElementById("txtCant"+v1).value);
	precio   = parseFloat(document.getElementById("txtPrec"+v1).value);
	
	cantidad1 = parseFloat(cantidad);
	
	
	
	precio1 = parseFloat(precio);
	
	
		
	suma =  cantidad1 * precio1;
	//Coloca dos decimales
	suma2 = suma.toFixed(2);
	//Asignamos suma2 a suma3 para modificar
	suma3 = suma2;
	//Convertimos los puntos por comas
	suma3 =  suma3.toString().replace(/\./g,',');
	suma3 = suma3.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
	suma3 = suma3.split('').reverse().join('').replace(/^[\.]/,'');
	
	
	if(document.getElementById("txtCant"+v1).value == "" || document.getElementById("txtPrec"+v1).value  == "")
	{
		document.getElementById("txtTota").value == "";

		}
		else
		{
			txtTota = document.getElementById("txtTota"+v1).value = suma3;
			
			valor=document.getElementById("valorsuma"+v1).value = suma2;
			
			}
			//document.getElementById("txtTota"+v1).disabled = true;
			
			
	
	
	
	//cambio del punto por la coma
	suma2 =  suma2.toString().replace(/\./g,',');
	cantidad1 =  cantidad1.toString().replace(/\./g,',');
	precio1 =  precio1.toString().replace(/\./g,',');
	
	
	}
	
	
		
	function sumaTotales(total)
	{
	
		valor1 = document.getElementById("valorsuma1").value;
		valor1 = parseFloat(valor1);
		valor2 = document.getElementById("valorsuma2").value;
		valor2 = parseFloat(valor2);
		valor3 = document.getElementById("valorsuma3").value;
		valor3 = parseFloat(valor3);
		valor4 = document.getElementById("valorsuma4").value;
		valor4 = parseFloat(valor4);
		valor5 = document.getElementById("valorsuma5").value;
		valor5 = parseFloat(valor5);
		valor6 = document.getElementById("valorsuma6").value;
		valor6 = parseFloat(valor6);
		valor7 = document.getElementById("valorsuma7").value;
		valor7 = parseFloat(valor7);
		valor8 = document.getElementById("valorsuma8").value;
		valor8 = parseFloat(valor8);
		valor9 = document.getElementById("valorsuma9").value;
		valor9 = parseFloat(valor9);
		valor10 = document.getElementById("valorsuma10").value;
		valor10 = parseFloat(valor10);
		
		
		if(valor1 =="")
		{
			valor1=0;
			}
			if(valor2 =="")
			{
			valor2=0;
			}
			if(valor3 =="")
			{
			valor3=0;
			}
			if(valor4 =="")
			{
			valor4=0;
			}
			if(valor5 =="")
			{
			valor5=0;
			}
			if(valor6 =="")
			{
			valor6=0;
			}
			if(valor7 =="")
			{
			valor7=0;
			}
			if(valor8 =="")
			{
			valor8=0;
			}
			if(valor9 =="")
			{
			valor9=0;
			}
			if(valor10 =="")
			{
			valor10=0;
			}
			
		valorTotal = valor1 + valor2 + valor3 + valor4 + valor5 + valor6 + valor7 + valor8 + valor9 + valor10;
		valorTotal = parseFloat(valorTotal);
		
		
		iva = valorTotal * 0.12;
		
		
		totalGeneral = valorTotal + iva;
		
		//Permitir solo dos decimales
		valorTotal = valorTotal.toFixed(2);
		iva = iva.toFixed(2);
		totalGeneral = totalGeneral.toFixed(2);
		
		//Convertir los puntos en comas
		valorTotal =  valorTotal.toString().replace(/\./g,',');
		iva =  iva.toString().replace(/\./g,',');
		totalGeneral =  totalGeneral.toString().replace(/\./g,',');
		
		
		//Colocar separadores de millares
		valorTotal = valorTotal.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
		valorTotal = valorTotal.split('').reverse().join('').replace(/^[\.]/,'');
		
		iva = iva.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
		iva = iva.split('').reverse().join('').replace(/^[\.]/,'');
		
		totalGeneral = totalGeneral.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
		totalGeneral = totalGeneral.split('').reverse().join('').replace(/^[\.]/,'');
		
		
		document.getElementById("subTotal").value = valorTotal;
		document.getElementById("ivaRes").value = iva;
		document.getElementById("genTotal").value = totalGeneral;
		
		
		
		}
		
		
		function validarn(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
	 if (tecla==9) return true; // 3
	 if (tecla==11) return true; // 3
    patron = /[0-9/.]/; // 4
 
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}
		


function onSelect(valor){	
	
	valor = valor
	document.getElementById('valSelect').value = valor
	document.form_fact.action ="controle/modelo_factura.php?valor="+valor;
	document.form_fact.submit();
	//document.form_fact.action ="facturacion.php"
	//window.location.href = "facturacion.php?valor="+valor;
	}
	
	function imprimirFactura()
	{
		//window.location.href = "reporte/imprimir_factura.php";
		document.form_fact.action ="reporte/imprimir_factura.php";
		document.form_fact.submit();
		//alert("Entre a la funcion");
		}
		
		function guardarFactura()
	{
		//window.location.href = "reporte/imprimir_factura.php";
		document.form_fact.action ="reporte/guardar_factura.php";
		document.form_fact.submit();
		//alert("Entre a la funcion");
		}
		
		
		
//Valida si se selecciono algun cliente para la factura
function validarFactura()
{

	if($("#sele_clie option:selected").val() == 0) 
	{
    alert("Debe seleccionar el cliente");
    return false;
	}
	else if(document.getElementById("numero_control").value =="")
	{
		alert("Escriba el numero de control de la factura");
		}
		else if(document.getElementById("numero_factura").value =="" )
		{
			alert("Escriba el numero de la factura");
			}
			else if(document.getElementById("datepicker").value =="" )
			{
				alert("Seleccione la fecha");
				}
				else
				{
					document.form_fact.action ="registrar_factura.php";
					document.form_fact.submit();
					}
			
	
	}
	





