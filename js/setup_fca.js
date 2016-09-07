// JavaScript Document
/*
* Interhistorias - Funciones Javascript formulario historia clínica cadera del adulto
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
	
	/* ---------------------------- Ventanas emergentes ------------------------------- */
	$('.man_opcemergentes input').click(function() {
		var nombre = $(this).attr('data-nombre');
		var id_opc = $(this).attr('name');
		var elem = "<div id='osm_" + id_opc + "' class='item_opcme'>"+nombre+"</div>";
		if( !$(this).is(':checked') ) {
			$("#osm_" + id_opc ).remove();
		}else{
			$("#lmanfca").append( elem + "&nbsp" );
		}
	});
	/* ---------------------------------------------------------------------------------------- */
	$('.idx_opcemergentes input').click(function() {
		var nombre = $(this).attr('data-nombre');
		if( nombre != null ){
			var id_opc = $(this).attr('name');
			var elem = "<div id='osm_" + id_opc + "' class='item_opcme'>"+nombre+"</div>";
			if( !$(this).is(':checked') ) {
				$("#osm_" + id_opc ).remove();
			}else{
				$("#lidxfca").append( elem + "&nbsp" );
			}
		}
	});
	/* ---------------------------------------------------------------------------------------- */
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
				$("#lmanfca").append( elem + "&nbsp" );}
			else{
				$("#lmanfca").append( elem + "&nbsp" );
			}
		}		
	});
	/* ---------------------------------------------------------------------------------------- */
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
				$("#lidxfca").append( elem + "&nbsp" );}
			else{
				$("#lidxfca").append( elem + "&nbsp" );
			}
		}		
	});
});
/* ---------------------------------------------------------------------------------------- */
// Examen físico|Inspección
$(document).ready(function(){	//Campo hipomovilidad
	$("#txhm").hide();
	$("#chhm").click(function(){ $("#txhm").toggle("slow"); });
});
/* -------------------------------------------------------------------------------------- */
//Chequeo registro de historia
function regHistoria(){
	var url;
	var nform = "frm_cadera_adulto";
	var form = $( '#' + nform );
	var idp = $("#idp").val();
	if( idp != "" ){
		$.ajax({
			type:"POST",
			url:"../bd/data-fca.php",
			data:{ form: form.serialize() },
			beforeSend: function () {
				$("#waitconfirm").html("Espere...");
			},
			success: function( response ){
				//$( "#nresp" ).html( response );
				url = "ninforme.php?nf=" + nform + "&f=" + response;
				window.location = url;
			}
		});
	}else{
		$("#waitconfirm").html("Debe seleccionar paciente en la historia");
	}
}
/* -------------------------------------------------------------------------------------- */
/* ------------------------------------ Round sliders ----------------------------------- */
/* -------------------------------------------------------------------------------------- */
	
	var mxv = 180; midmx = mxv/2;
	var imin = midmx - 20; imax = midmx + 20; 
	
	var mxv_fe = 120; var midv_fe = mxv_fe/2; var imin_fe = midv_fe - 20; imax_fe = midv_fe + 20;
	var mxv_abd = 60; var midv_abd = mxv_abd/2; var imin_abd = midv_abd - 10; imax_abd = midv_abd + 10;
	var mxv_rot = 50; var midv_rot = mxv_rot/2; var imin_rot = midv_rot - 5; imax_rot = midv_rot + 5;
	
	function adjV( val, mval ){ return ( mval * 2 ) - ( val * 2 ); }
	function adjVmx( val, mval ){ return ( val - mval ) * 2; }
	$(document).ready(function () {
		/* Rangos Activos */
		var rrad = 50;
		$("#rs_flex_ext").roundSlider({	//flexión - extensión
			radius: rrad, max:mxv_fe,
			value: imin_fe + "," + imax_fe,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midv_fe ); var vmax = adjVmx( c1[1], midv_fe );
				$("#rsfev").html(vmin + " - " + vmax);
				$("#rsra_flexion").val(vmin); $("#rsra_extension").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsfev").html(adjV( c1[0], midv_fe ) + " - " + adjVmx( c1[1], midv_fe ));
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#rs_abdad").roundSlider({	//abducción - aducción
			radius: rrad, max:mxv_abd,
			value: imin_abd + "," + imax_abd,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midv_abd ); var vmax = adjVmx( c1[1], midv_abd );
				$("#rsabdv").html( vmin + " - " + vmax );
				$("#rsra_abduc").val(vmin); $("#rsra_aduc").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midv_abd ); var vmax = adjVmx( c1[1], midv_abd );
				$("#rsabdv").html( vmin + " - " + vmax );
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#rs_rotinex").roundSlider({	//Rotación interna - externa
			radius: rrad,
			value: imin_rot + "," + imax_rot,
			max:mxv_rot,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midv_rot ); var vmax = adjVmx( c1[1], midv_rot );
				$("#rsriev").html( vmin + " - " + vmax );
				$("#rsra_rotin").val(vmin); $("#rsra_rotex").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midv_rot ); var vmax = adjVmx( c1[1], midv_rot );
				$("#rsriev").html( vmin + " - " + vmax );
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		/* ---------------------------------------------------------------------------- */
		/* Rangos Pasivos */
		$("#rs_flex_ext_p").roundSlider({
			radius: rrad, max:mxv_fe,
			value: imin_fe + "," + imax_fe,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midv_fe ); var vmax = adjVmx( c1[1], midv_fe );
				$("#rsfev_p").html( vmin + " - " + vmax );
				$("#rsrp_flexion").val( vmin ); $("#rsrp_extension").val( vmax );
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsfev_p").html( adjV( c1[0], midv_fe ) + " - " + adjVmx( c1[1], midv_fe ) );
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#rs_rotinex_p").roundSlider({	//Rotación interna - externa
			radius: rrad,
			value: imin_rot + "," + imax_rot,
			max:mxv_rot,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midv_rot ); var vmax = adjVmx( c1[1], midv_rot );
				$("#rsriev_p").html( vmin + " - " + vmax );
				$("#rsrp_rotin").val(vmin); $("#rsrp_rotex").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsriev_p").html(adjV( c1[0], midv_rot ) + " - " + adjVmx( c1[1], midv_rot ));
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
	});
/* -------------------------------------------------------------------------------------- */
/* ------------------------------------ Round sliders ----------------------------------- */
/* -------------------------------------------------------------------------------------- */	