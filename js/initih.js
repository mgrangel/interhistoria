// JavaScript Document
/*
* Interhistorias
*
*/
/* --------------------------------------------------------- */	
/* --------------------------------------------------------- */
function log_in(){
	var error_m = "<div class='alert alert-warning' role='alert'>Verifica usuario y contraseña</div>";
	var form = $('#loginform');
	$.ajax({
        type:"POST",
        url:"bd/data-usuario.php",
        data:form.serialize(),
        success: function( response ){
			if( response == 1 ){
				//$("#response").html( response );
				window.location = "pages/";
			}
			else 
				$("#response").html( error_m ); 
        }
    });
}
/* --------------------------------------------------------- */
function actualizarIdUsuarioFormAdicional( idp ){
	var nfrm = $("#lnkidp").attr("data-nfrm");
	var slnk = nfrm + "?id_p=" + idp;
	$("#lnkidp").attr("href",slnk);
}
/* --------------------------------------------------------- */
$(document).ready(function(){
	//Asignación paciente a formulario de historia médica
	$(".getidp").click(function(e){ 
		var idp = $(this).attr("title");
		var infop = $("#infop"+idp).val();
		actualizarIdUsuarioFormAdicional( idp );
		$("#idp_xx").val( idp );
		$("#idp").val( idp );
		$("#idp_d").val( idp );
		$("#nombre_paciente").html( infop );
		$("#closemodalx").click();
	});
	/*--------------------------*/
	$("#tx_ctipo").hide();
	$("#tx_ctipo_d").hide();
	/*--------------------------*/
	$("#dur_sin").hide();
	$(".rbdur").click(function(){ $("#dur_sin").show("slow"); });
	$(".rbdur_ld").click(function(){ $("#dur_sin").hide(120); });
	/*--------------------------------------------------------*/
	$(".fw").hide();	//Campos checkbox - cuadro de texto fw:campos de texto, sw:checkbox
	$(".sw").click(function(){	$("#" + this.name ).toggle("slow"); });
	$(".swn").click(function(){	$("#" + $(this).attr("data-fname") ).toggle("slow"); });
	/*--------------------------------------------------------*/
	$(".form_historia input:text").blur(function(){ 
		if( !$(this).hasClass("mayusc") ){		$(this).val($(this).val().toLowerCase());	}
	});
});
/* --------------------------------------------------------- */
function checkAll( idform ){
	var frm = document.getElementById( idform );
	for ( i = 1; i < frm.elements.length; i++ ){
		field = frm.elements[i];
		if( field.type == "checkbox" )
			field.checked = true;
		if( field.type == "text" )
			field.value = field.name;
	}
}
/* --------------------------------------------------------- */
function getElems( idform ){
	var frm = document.getElementById( idform );
	var script = "CREATE TABLE " + idform + " (idForm INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY, idPaciente int(6), ";
	var dtype = ""; var size = "";
	var sAux = ""; var count = 0;
	for ( i = 1; i < frm.elements.length; i++ ){
		if( (frm.elements[i].type != "button" )&&( frm.elements[i].getAttribute('alt') != "nobd" )
		 &&( frm.elements[i].className != "sw" )){
			if (frm.elements[i].title == 300 ) size = frm.elements[i].title; else size = 60;
			if( frm.elements[i].type == "text" ) dtype = "varchar(" + size + "),";
			if( frm.elements[i].type == "checkbox" ) dtype = "boolean,";
			script += frm.elements[i].name + " " + dtype;
			if( frm.elements[i].name != "" ) count++;
			else alert("I: "+frm.elements[i].id);
		}
	}
	alert(frm.elements.length+" : "+count);
	script = script.substring(0, script.length-1);
	script += ");";
	$("#formelems").html( script );	
}
/* --------------------------------------------------------- */
/*$(document).ready(function(){
	$("#tx_oal").hide();
	$("#ch_otral").click(function(){ $("#tx_oal").show("slow"); });
});*/

function chopt( lista ){
	var opc  = $(lista).val();
	if( opc == "Otro" ) {
		$("#tx_ctipo").show( 200 );
		$("#ldctipo").attr("name","x_ctipo");		//Lista
		$("#txcaract").attr("name","dol_cartipo");	//Campo de texto *(valor tomado para enviar al form)
	}
	else {
		$("#tx_ctipo").hide( 200 );
		$("#ldctipo").attr("name","dol_cartipo");	//Lista *(valor tomado para enviar al form)
		$("#txcaract").attr("name","x_ctipo");		//Campo de texto
	}	
}

function chopt_d( lista ){
	var opc  = $(lista).val();
	if( opc == "Otro" ) {
		$("#tx_ctipo_d").show( 200 );
		$("#ldctipo_d").attr("name","x_ctipo");		//Lista
		$("#txcaract_d").attr("name","dol_cartipo");	//Campo de texto *(valor tomado para enviar al form)
	}
	else {
		$("#tx_ctipo_d").hide( 200 );
		$("#ldctipo_d").attr("name","dol_cartipo");	//Lista *(valor tomado para enviar al form)
		$("#txcaract_d").attr("name","x_ctipo");		//Campo de texto
	}	
}

/* Inicializador de controles deslizantes horizontales rectos */
$(function() {
	$( ".sldbarval" ).slider({
		min: 0,
		max:150,
		slide: function( event, ui ) {
			var idval = $( this ).attr('id');
			var valor = $( this ).slider( "value" );
			$("#" + idval + "_val").html( valor );
			$("#frm_" + idval).val( valor );
		}
	});
});

$(function() {
	$( ".sldbarval_15" ).slider({
		min: 0,
		max:16,
		slide: function( event, ui ) {
			var idval = $( this ).attr('id');
			var valor = $( this ).slider( "value" );
			$("#" + idval + "_val").html( valor );
			$("#frm_" + idval).val( valor );
		}
	});
});
/* --------------------------------------------------------- */