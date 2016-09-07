// JavaScript Document
/*
* Interhistorias - Funciones Javascript formulario historia clínica columna cervical
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
	$('.man_opcemergentes input:checkbox').click(function() {
		var nombre = $(this).attr('data-nombre');
		var id_opc = $(this).attr('name');
		var elem = "<div id='osm_" + id_opc + "' class='item_opcme'>"+nombre+"</div>";
		if( !$(this).is(':checked') ) {
			$("#osm_" + id_opc ).remove();
		}else{
			$("#lmancc").append( elem + "&nbsp" );
		}
	});
	/* ---------------------------------------------------------------------------------------- */
	$('.idx_opcemergentes input:checkbox').click(function() {
		var nombre = $(this).attr('data-nombre');
		if( nombre != null ){
			var id_opc = $(this).attr('name');
			var elem = "<div id='osm_" + id_opc + "' class='item_opcme'>"+nombre+"</div>";
			if( !$(this).is(':checked') ) {
				$("#osm_" + id_opc ).remove();
			}else{
				$("#lidxcc").append( elem + "&nbsp" );
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
				$("#lmancc").append( elem + "&nbsp" );}
			else{
				$("#lmancc").append( elem + "&nbsp" );
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
				$("#lidxcc").append( elem + "&nbsp" );}
			else{
				$("#lidxcc").append( elem + "&nbsp" );
			}
		}		
	});
});
/* -------------------------------------------------------------------------------------- */
//Chequeo registro de historia
function regHistoria(){
	var nform = "frm_columna_cervical";
	var form = $('#' + nform);
	$.ajax({
		type:"POST",
		url:"../bd/data-fcc.php",
		data:{ form: form.serialize() },
		beforeSend: function () {
			$("#waitconfirm").html("Espere...");
		},
		success: function( response ){
			url = "ninforme.php?nf="+nform+"&f=" + response;
			//$("#nresp").html(response);
			window.location = url;
		}
	});
}
/* -------------------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------------------- */
/* ------------------------------------ Round sliders ----------------------------------- */
/* -------------------------------------------------------------------------------------- */
	
	var mxv_fe = 46; var midv_fe = mxv_fe/2; var imin_fe = midv_fe - 10; imax_fe = midv_fe + 10;
	var mxv_lat = 46; var midv_lat = mxv_lat/2; var imin_lat = midv_lat - 12; imax_lat = midv_lat + 12;
	var mxv_rot = 80; var midv_rot = mxv_rot/2; var imin_rot = midv_rot - 20; imax_rot = midv_rot + 20;
	 
	function adjV( val, mval ){ return ( mval * 2 ) - ( val * 2 ); }
	function adjVmx( val, mval ){ return ( val - mval ) * 2; }
	$(document).ready(function () {
		/* Rangos Activos */
		var rrad = 50;
		$("#rs_flex_ext").roundSlider({
			radius: rrad, max:mxv_fe,
			value: imin_fe + "," + imax_fe,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midv_fe ); var vmax = adjVmx( c1[1], midv_fe );
				$("#rsfev").html(vmin + " - " + vmax);
				$("#rsra_flexion").val(vmin); $("#rsra_extension").val(vmax);
				//alert(c1);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				
				$("#rsfev").html(adjV( c1[0], midv_fe ) + " - " + adjVmx( c1[1], midv_fe ));
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#rs_lat").roundSlider({
			radius: rrad, max:mxv_lat,
			value: imin_lat + "," + imax_lat,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midv_lat ); var vmax = adjVmx( c1[1], midv_lat );
				$("#rslv").html( vmin + " - " + vmax );
				$("#rsra_latizq").val(vmin); $("#rsra_latder").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midv_lat ); var vmax = adjVmx( c1[1], midv_lat );
				$("#rslv").html( vmin + " - " + vmax );
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#rs_rot").roundSlider({
			radius: rrad,
			value: imin_rot + "," + imax_rot,
			max:mxv_rot,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midv_rot ); var vmax = adjVmx( c1[1], midv_rot );
				$("#rsrv").html( vmin + " - " + vmax );
				$("#rsra_rotizq").val(vmin); $("#rsra_rotder").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsrv").html( adjV( c1[0], midv_rot ) + " - " + adjVmx( c1[1], midv_rot ) );
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
		$("#rs_lat_p").roundSlider({
			radius: rrad, max:mxv_lat,
			value: imin_lat + "," + imax_lat,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midv_lat ); var vmax = adjVmx( c1[1], midv_lat );
				$("#rslv_p").html( vmin + " - " + vmax );
				$("#rsrp_latizq").val(vmin); $("#rsrp_latder").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rslv_p").html( adjV( c1[0], midv_lat ) + " - " + adjVmx( c1[1], midv_lat ) );
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#rs_rot_p").roundSlider({
			radius: rrad, max:mxv_rot,
			value: imin_rot + "," + imax_rot,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midv_rot ); var vmax = adjVmx( c1[1], midv_rot );
				$("#rsrv_p").html( vmin + " - " + vmax );
				$("#rsrp_rotizq").val(vmin); $("#rsrp_rotder").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsrv_p").html( adjV( c1[0], midv_rot ) + " - " + adjVmx( c1[1], midv_rot ) );
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
	});
/* -------------------------------------------------------------------------------------- */
/* ------------------------------------ Round sliders ----------------------------------- */
/* -------------------------------------------------------------------------------------- */
/* Territorios nerviosos */

$(document).ready(function () {
	$('.ztns').click(function() {
		var nombre = $(this).attr('id');
		var label = $(this).attr('alt');
		var idcampo = "n" + nombre;
		var valor = $( "#" + idcampo ).val();
		
		var elem = "<div id='etqt_" + idcampo + "' class='item_opcme'>"+label+"</div>";
		var elem_ext = "<div id='etqt_ex_" + idcampo + "' class='item_opcmext'>"+label+"</div>";
		
		if( valor == 1 ) {
			$("#etqt_" + idcampo ).remove(); 
			$("#etqt_ex_" + idcampo ).remove();
			$( "#" + idcampo ).val(0);
			$( "#" + idcampo ).attr('checked', false);
		}else{
			$( "#" + idcampo ).val(1);
			$( "#" + idcampo ).attr('checked', true);
			$("#diagtnsi").append( elem + "&nbsp" );
			$("#sensetnsi").append( elem_ext );
		}
	});
	
	$('.ztnsd').click(function() {
		var nombre = $(this).attr('id');
		var label = $(this).attr('alt');
		var idcampo = "n" + nombre;
		var valor = $( "#" + idcampo ).val();
		var elem = "<div id='etqt_" + idcampo + "' class='item_opcme'>"+label+"</div>";
		var elem_ext = "<div id='etqt_extd_" + idcampo + "' class='item_opcmext'>"+label+"</div>";
		
		if( valor == 1 ) {
			$("#etqt_" + idcampo ).remove();
			$("#etqt_extd_" + idcampo ).remove();
			$( "#" + idcampo ).val(0);
			$( "#" + idcampo ).attr('checked', false);
		}else{
			$( "#" + idcampo ).val(1);
			$( "#" + idcampo ).attr('checked', true);
			$("#diagtnsd").append( elem + "&nbsp" );
			$("#sensetnsd").append( elem_ext );
		}
	});
	/* Dermatomas */
	$('.dticv').click(function(){
		var nombre = $(this).attr('id');
		var label = $(this).attr('alt');
		var idcampo = "n" + nombre;
		var valor = $( "#" + idcampo ).attr("data-val");
		var elem = "<div id='etqt_" + idcampo + "' class='item_opcme'>"+label+"</div>";
		var elem_ext = "<div id='etqt_extd_" + idcampo + "' class='item_opcmext'>"+label+"</div>";
		
		if( valor == 1 ) {
			$("#etqt_" + idcampo ).remove();
			$("#etqt_extd_" + idcampo ).remove();
			$( "#" + idcampo ).attr("data-val",0);
			$( "#" + idcampo ).attr('checked', false);
		}else{
			$( "#" + idcampo ).attr("data-val",1);
			$( "#" + idcampo ).attr('checked', true);
			$("#diagdticerv").append( elem + "&nbsp" );
			$("#dermtc_izq").append( elem_ext );
		}
	});
	
	$('.dtdcv').click(function(){
		var nombre = $(this).attr('id');
		var label = $(this).attr('alt');
		var idcampo = "n" + nombre;
		var valor = $( "#" + idcampo ).attr("data-val");
		var elem = "<div id='etqt_" + idcampo + "' class='item_opcme'>"+label+"</div>";
		var elem_ext = "<div id='etqt_extd_" + idcampo + "' class='item_opcmext'>"+label+"</div>";
		
		if( valor == 1 ) {
			$("#etqt_" + idcampo ).remove();
			$("#etqt_extd_" + idcampo ).remove();
			$( "#" + idcampo ).attr("data-val",0);
			$( "#" + idcampo ).attr('checked', false);
		}else{
			$( "#" + idcampo ).attr("data-val",1);
			$( "#" + idcampo ).attr('checked', true);
			$("#diagdtdcerv").append( elem + "&nbsp" );
			$("#dermtc_der").append( elem_ext );
		}
	});
});
