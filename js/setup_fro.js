// JavaScript Document
/*
* Interhistorias - Funciones Javascript formulario historia clínica de rodilla
*
*/
/* -------------------------------------------------------------------------------------- */
$(document).ready(function(){
	//Bloque Dolor
	$("#blockdolor").hide();
	$("#chdolor").click(function(){ $("#blockdolor").toggle("slow"); });
	//Bloque Rayos X
	$("#blockrx").hide();
	$("#chrx").click(function(){ $("#blockrx").toggle("slow"); });
	
	//Bloque Laboratorios
	$("#blocklabs").hide();
	$("#chlabs").click(function(){ $("#blocklabs").toggle("slow"); });
	
	//Bloque Artrocentesis
	$("#tx_artrocentesis").hide();
	$("#ch_artrocentesis").click(function(){ $("#tx_artrocentesis").toggle("slow"); });
});
/* -------------------------------------------------------------------------------------- */
//Chequeo registro de historia
function regHistoria(){
	var url; var nform = "frm_rodilla"; 
	var form = $('#' + nform);
	var idp = $("#idp").val();
	if( idp != "" ){
		$.ajax({
			type:"POST",
			url:"../bd/data-fro.php",
			data:{ form: form.serialize() },
			beforeSend: function () {
				$("#waitconfirm").html("Espere...");
			},
			success: function( response ){
				//url = "ninforme.php?nf="+nform+"&f=" + response;
				url = "historia.php?nf="+nform+"&f=" + response;
				//$("#nresp").html(response);
				window.location = url;
			}
		});
	}else{
		$("#waitconfirm").html("Debe seleccionar paciente en la historia");
	}
}	
/* -------------------------------------------------------------------------------------- */
// Campos para el informe autogenerado
$(document).ready(function(){
	$('input').click(function() {
		var field = $('label[for="' + this.name + '"]').html();
		//alert(field);
	});
	/* ---------------------------- Ventanas emergentes ------------------------------- */
	$('.man_opcemergentes input:checkbox').click(function() {
		var nombre = $(this).attr('data-nombre');
		var id_opc = $(this).attr('name');
		var elem = "<div id='osm_" + id_opc + "' class='item_opcme'>"+nombre+"</div>";
		if( !$(this).is(':checked') ) {
			$("#osm_" + id_opc ).remove();
		}else{
			$("#lmanfro").append( elem + "&nbsp" );
		}
	});
	/* -------------------------------------------------------------------------------------- */
	$('.man_opcemergentes input:text').keyup(function() {
		var nombre = $(this).attr('data-nombre');
		var texto = $(this).val();
		var id_opc = $(this).attr('name');
		var elem = "<div id='osm_" + id_opc + "' class='item_opcme'>"+nombre+": "+texto+"</div>";
		if( texto == "" ) {
			$("#osm_" + id_opc ).remove();
		}else{
			if( texto.length > 0 ){
				$("#osm_" + id_opc ).remove();
				$("#lmanfro").append( elem + "&nbsp" );}
			else{
				$("#lmanfro").append( elem + "&nbsp" );
			}
		}		
	});
	/* -------------------------------------------------------------------------------------- */
	$('.idx_opcemergentes input:checkbox').click(function() {
		var nombre = $(this).attr('data-nombre');
		if( nombre != null ){
			var id_opc = $(this).attr('name');
			var elem = "<div id='osm_" + id_opc + "' class='item_opcme'>"+nombre+"</div>";
			if( !$(this).is(':checked') ) {
				$("#osm_" + id_opc ).remove();
			}else{
				$("#lidxro").append( elem + "&nbsp" );
			}
		}
	});
	/* -------------------------------------------------------------------------------------- */
	$('.idx_opcemergentes input:text').keyup(function() {
		var nombre = $(this).attr('data-nombre');
		var texto = $(this).val();
		var id_opc = $(this).attr('name');
		var elem = "<div id='osm_" + id_opc + "' class='item_opcme'>"+nombre+": "+texto+"</div>";
		if( texto == "" ) {
			$("#osm_" + id_opc ).remove();
		}else{
			if( texto.length > 0 ){
				$("#osm_" + id_opc ).remove();
				$("#lidxro").append( elem + "&nbsp" );}
			else{
				$("#lidxro").append( elem + "&nbsp" );
			}
		}		
	});
});
/* -------------------------------------------------------------------------------------- */
/* ------------------------------------ Round sliders ----------------------------------- */
/* -------------------------------------------------------------------------------------- */
	var mxv_fx = 160;	 var min_fx = -10;
	function adjV( val, mval ){ return ( mval * 2 ) - ( val * 2 ); }
	function adjVmx( val, mval ){ return ( val - mval ) * 2; }
	$(document).ready(function () {
		var rrad = 50;
		/* Rangos Activos */
		$("#rs_flex_ext").roundSlider({
			radius: rrad,
			circleShape: "half-top", sliderType: "min-range",
			showTooltip: false,
			value: 45, max:mxv_fx, min:min_fx,
			change: function (e) {
				var valor = e.value;
				$("#rsfev").html( valor );
				$("#rsra_flexion").val( valor );
			},
			drag: function (e) {
				var val = e.value;
				$("#rsfev").html( val );
			},
		});
		/* ------------------------------------------------------------------------------- */
		/* Rangos Pasivos */
		$("#rs_flex_ext_p").roundSlider({
			radius: rrad,
			circleShape: "half-top", sliderType: "min-range",
			showTooltip: false,
			value: 45, max:mxv_fx, min:min_fx,
			change: function (e) {
				var valor = e.value;
				$("#rsfev_p").html( valor );
				$("#rsrp_flexion").val( valor );
			},
			drag: function (e) {
				var val = e.value;
				$("#rsfev_p").html( val );
			},
		});
		/* ------------------------------------------------------------------------------- */
		$("#rs_lcuad").roundSlider({
			radius: rrad,
			circleShape: "half-top",
			sliderType: "min-range",
			showTooltip: false,
			value: 15, max:30,
			change: function (e) {
				var valor = e.value;
				$("#rslcv").html( valor );
				$("#rsra_lagcuad").val( valor );
			},
			drag: function (e) {
				var val = e.value;
				$("#rslcv").html( val );
			},
		});
	});
/* -------------------------------------------------------------------------------------- */
/* ------------------------------------ Round sliders ----------------------------------- */
/* -------------------------------------------------------------------------------------- */