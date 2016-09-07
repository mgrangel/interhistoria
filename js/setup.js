// JavaScript Document
/*
* Interhistorias
*
*/
/* --------------------------------------------------------- */	
$(document).ready(function(){
	$("#form_npaciente").submit(function(e){ return false; });
});
/* --------------------------------------------------------- */
$(function(){	
	$('#datetimepicker').datepicker({
		format: "dd/mm/yyyy",
		language: "es",
		autoclose: true,
		orientation: "bottom left"
	});
});
/* --------------------------------------------------------- */
function regPaciente(){
	//Llamada asíncrona al servidor para registrar pacientes
	var form_paciente = $('#form_npaciente');
	$.ajax({
		type:"POST",
		url:"../bd/data-paciente.php",
		data:{ form_p: form_paciente.serialize() },
		success: function( response ){
			$("#nresp").html(response);
			window.location = "paciente.php?p="+response;
		}
	});
}
/* --------------------------------------------------------- */
function actPaciente(){
	//Llamada asíncrona al servidor para modificar datos de pacientes
	var form_paciente = $('#form_mpaciente');
	$.ajax({
		type:"POST",
		url:"../bd/data-paciente.php",
		data:{ frm_ap: form_paciente.serialize() },
		success: function( response ){
			window.location = "paciente.php?p=" + response;
		}
	});	
}
/* --------------------------------------------------------- */
function chckForm(){
	// Chequeo de formulario de paciente para registro
	var nom = $("#pnombres").val();
	var ape = $("#papellidos").val();
	var ci 	= $("#pcedula").val();
	var fn 	= $("#datetimepicker").val();
	var em 	= $("#email").val();
	if(( nom != "" )&&( ape != "" )&&( ci != "" )&&( fn != "" )&&( em != "" )){
		regPaciente();	
	}	
}
/* --------------------------------------------------------- */
function mostrarIMC(){
	//Cálculo de IMC al registrar y modificación de pacientes 
	$("#imcval").html("");
	$("#himc").val("");
	var imc = ( $("#ppeso").val() / Math.pow( $("#pestatura").val(), 2) );
	if( imc != "Infinity" && imc != "NaN" ){
		$("#imcval").html(imc.toFixed(2));
		$("#himc").val(imc.toFixed(2));
	}
}
/* --------------------------------------------------------- */
$(document).ready(function(){
	$("#hidpseguro").hide();	
	$(".cont_sh").hide();
	
	$(".reg_antecedentes").click( function(){
		$(".regficha_antecedente").hide(); 
		$("#f_" + $(this).attr("id") ).show(); 
	});
	$(".showhide").click(function(){ $("#l_"+ this.id ).toggle("slow"); });
	
	$(".fw").hide();
	$(".sw").click(function(){	$("#"+ this.name ).toggle("slow"); });
	
	$(".lnk_gris").click(function(){	
		var url = "paciente.php?p=" + $(this).attr("data-idp") + "&rap=" + $(this).attr("data-idap"); 
		$("#clickidap").attr("href",url);
	});
	
	$("#frmrecuperacionp").click(function(){	
		var email = $("#uemail_recuperarpassw").val();
		if( email != "" )
			enviarEmailPassword( email );	
	});
});
/* --------------------------------------------------------- */
function chopt( lista ){
	var opc  = $(lista).val();
	if( opc == "Otra" ) {
		$("#hidpseguro").show( 200 );
		$("#pseguro").attr("name","seleccion");		//Lista
		$("#opseguro").attr("name","seguro");		//Campo de texto *(valor tomado para enviar al form)
	}
	else {
		$("#hidpseguro").hide( 200 );
		$("#pseguro").attr("name","seguro");		//Lista *(valor tomado para enviar al form)
		$("#opseguro").attr("name","seleccion");	//Campo de texto
	}	
}
/* --------------------------------------------------------- */
function regSUser(){
	//alert("regU");
	var form_suser = $('#form_nregistro');
	$.ajax({
		type:"POST",
		url:"bd/data-usuario.php",
		data:{ form_p: form_suser.serialize() },
		success: function( response ){
			$("#nresp").html(response);
			//window.location = "registrado.html";
		}
	});
}

function enviarEmailPassword( usuario_email ){
	$.ajax({
		type:"POST",
		url:"bd/data-usuario.php",
		data:{ uemail: usuario_email, recuperar_passw : 1 },
		beforeSend: function () { $("#passw_msg").html( "<div align='center'><img src='img/ajax-loader.gif'/></div>" ); },
		success: function( response ){
			$("#passw_msg").html(response);
		}
	});	
}

function chckFormR(){
	var nom = $("#rnombre").val();
	var em 	= $("#remail").val();
	if((nom != "") && (em != "")){
		regSUser();	
	}
		
}
/* --------------------------------------------------------- */
/* Antecedentes personales y examen funcional */

function registrarAPEFN(){
	//Llamada asíncrona al servidor para registrar antecedentes personales y examen funcional de pacientes
	var form_ap = $('#formulario_antecedentes');
	var idp = $('#id_paciente').val();
	$.ajax({
		type:"POST",
		url:"../bd/data-paciente.php",
		data:{ form_apefn: form_ap.serialize() },
		beforeSend: function () { $("#paciente_r").html( "<div align='center'><img src='../img/ajax-loader.gif'/></div>" ); },
		success: function( response ){
			//$("#paciente_r").html( response );
			window.location = "paciente.php?p=" + idp;
		}
	});
}

function modificarAPEFN(){
	//Llamada asíncrona al servidor para modificar antecedentes personales y examen funcional de pacientes
	var form = $('#frm_mod_antecedentes');
	var idp = $('#id_paciente').val();
	var idap = $('#id_ap').val();
	$.ajax({
		type:"POST",
		url:"../bd/data-paciente.php",
		data:{ form_map: form.serialize(), id_ap: idap },
		beforeSend: function () { $("#paciente_rap").html( "<div align='center'><img src='../img/ajax-loader.gif'/></div>" ); },
		success: function( response ){
			window.location = "paciente.php?p=" + idp;
			//$("#paciente_rap").html( response );
		}
	});
}
/* --------------------------------------------------------- */