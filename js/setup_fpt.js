// JavaScript Document
/*
* Interhistorias - Funciones Javascript formulario historia clínica de pie-tobillo
*
*/
/* -------------------------------------------------------------------------------------- */
$(document).ready(function(){
	//Bloque Duración síntomas
	$("#dur_sin_d").hide();
	$(".rbdur_d").click(function(){ $("#dur_sin_d").show("slow"); });
	
	$( "#selcambio" ).hide();
	$( "#panel-bder" ).hide();
	//Bloque Dolor
	$("#blockdolor").hide();
	$("#chdolor").click(function(){ $("#blockdolor").toggle("slow"); });
	$("#dblockdolor").hide();
	$("#dchdolor").click(function(){ $("#dblockdolor").toggle("slow"); });
	//Bloque Rayos X
	$("#blockrx").hide();
	$("#chrx").click(function(){ $("#blockrx").toggle("slow"); });
	$("#dblockrx").hide();
	$("#dchrx").click(function(){ $("#dblockrx").toggle("slow"); });
	//Bloque Laboratorios
	$("#blocklabs").hide();
	$("#chlabs").click(function(){ $("#blocklabs").toggle("slow"); });
	$("#dblocklabs").hide();
	$("#dchlabs").click(function(){ $("#dblocklabs").toggle("slow"); });
});

$(document).ready(function(){
	$(".deactf").click(function(){
		var idftd = $(this).attr("data-tfd");
		if( idftd == "frm_pie_tobillo_d" ){
			$("#frm_pie_tobillo_d").find('input, textarea, checkbox').attr('disabled','disabled');
			$("#frm_pie_tobillo").find('input, textarea, checkbox').attr('disabled',false);
		}
		if( idftd == "frm_pie_tobillo" ){
			$("#frm_pie_tobillo").find('input, textarea, select, checkbox').attr('disabled','disabled');
			$("#frm_pie_tobillo_d").find('input, textarea, select, checkbox').attr('disabled',false);
		}
		$(".deactf").attr('disabled',false);
	});	
});
/* -------------------------------------------------------------------------------------- */
//Chequeo registro de historia
function regHistoria(){
	var form = $('#frm_pie_tobillo');
	$.ajax({
		type:"POST",
		url:"../bd/data-fpt.php",
		data:{ form: form.serialize() },
		success: function( response ){
			//Redirección
		}
	});
}
/* -------------------------------------------------------------------------------------- */
function regHistoriaI_D( form, resp ){
	
	var form = $('#'+form);
	$.ajax({
		type:"POST",
		url:"../bd/data-fpt.php",
		data:{ form: form.serialize() },
		success: function( response ){
			$("#"+resp).html(response);
			//Redirección
		}
	});
}
/* -------------------------------------------------------------------------------------- */
function regHistoriaIDos(){
	var nformi = "frm_pie_tobillo";
	var nformd = "frm_pie_tobillo_d";
	var form_i = $('#frm_pie_tobillo');
	var form_d = $('#frm_pie_tobillo_d');
	var idpac = $('#idp').val();
	var rurl = "paciente.php?p=" + idpac;
	var idp = $("#idp").val();
	var frm_i_enviado = false;
	var frm_d_enviado = false; 
	
	if( idp != "" ){
		if( !$( "#chipder" ).is(':checked') ){
			//Formulario enviado: izquierdo
			frm_i_enviado = true;
			$.ajax({
				type:"POST", url:"../bd/data-fpt.php",
				data:{ form: form_i.serialize() },
				beforeSend: function () {
					$("#waitconfirm").html("Espere...");
				},
				success: function( response ){
					//$( "#drespi" ).html( response );
					//var rurl = "ninforme.php?nf=" + nformi + "&f=" + response;
				}
			});
		}
		if( !$( "#chipizq" ).is(':checked') ){
			//Formulario enviado: derecho
			frm_d_enviado = true;
			$.ajax({
				type:"POST", url:"../bd/data-fpt.php",
				data:{ form: form_d.serialize() },
				beforeSend: function () {
					$("#waitconfirm").html("Espere...");
				},
				success: function( response ){
					//$( "#dnresp" ).html( response );
					//$("#informe_autogenerado").html(response);
					//var rurl = "ninforme.php?nf=" + nformd + "&f=" + response;
				}
			});
		}
		window.location = rurl;	
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
			$("#lmanfpt").append( elem + "&nbsp" );
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
				$("#lidxfpt").append( elem + "&nbsp" );
			}
		}
	});
	/* ---------------------------------------------------------------------------------------- */
	$('.mand_opcemergentes input:checkbox').click(function() {
		var nombre = $(this).attr('data-nombre');
		var id_opc = $(this).attr('name');
		var elem = "<div id='osm_" + id_opc + "' class='item_opcme'>"+nombre+"</div>";
		if( !$(this).is(':checked') ) {
			$("#osm_" + id_opc ).remove();
		}else{
			$("#lmanfptd").append( elem + "&nbsp" );
		}
	});
	/* ---------------------------------------------------------------------------------------- */
	$('.idxd_opcemergentes input:checkbox').click(function() {
		var nombre = $(this).attr('data-nombre');
		var id_opc = $(this).attr('name');
		var elem = "<div id='osm_" + id_opc + "' class='item_opcme'>"+nombre+"</div>";
		if( !$(this).is(':checked') ) {
			$("#osm_" + id_opc ).remove();
		}else{
			$("#lidxfptd").append( elem + "&nbsp" );
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
				$("#lidxfpt").append( elem + "&nbsp" );}
			else{
				$("#lidxfpt").append( elem + "&nbsp" );
			}
		}		
	});
	/* ---------------------------------------------------------------------------------------- */
	$('.idxd_opcemergentes input:text').keyup(function() {
		var nombre = $(this).attr('data-nombre');
		var texto = $(this).val();
		var id_opc = $(this).attr('name');
		var elem = "<div id='osmd_" + id_opc + "' class='item_opcme'>" + nombre + ": " + texto + "</div>";
		if( texto == "" ) {
			$("#osmd_" + id_opc ).remove();
		}else{
			if( texto.length > 0 ){
				$("#osmd_" + id_opc ).remove();
				$("#lidxfptd").append( elem + "&nbsp" );}
			else{
				$("#lidxfptd").append( elem + "&nbsp" );
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
				$("#lmanfpt").append( elem + "&nbsp" );}
			else{
				$("#lmanfpt").append( elem + "&nbsp" );
			}
		}		
	});
	/* ---------------------------------------------------------------------------------------- */
	$('.mand_opcemergentes input:text').keyup(function() {
		var nombre = $(this).attr('data-nombre');
		var texto = $(this).val();
		var id_opc = $(this).attr('name');
		var elem = "<div id='osm_" + id_opc + "' class='item_opcme'>"+nombre+": "+texto+"</div>";
		if( texto == "" ) {
			$("#osm_" + id_opc ).remove();
		}else{
			if( texto.length > 0 ){
				$("#osm_" + id_opc ).remove();
				$("#lmanfptd").append( elem + "&nbsp" );}
			else{
				$("#lmanfptd").append( elem + "&nbsp" );
			}
		}		
	});
	/* ---------------------------------------------------------------------------------------- */
});
/* -------------------------------------------------------------------------------------- */
function frmcambiar(){
	$( "#selizq" ).show();$( "#selder" ).show();$( "#selambos" ).show();
	$( "#izqder" ).val( "" ); $( "#selcambio" ).hide();
}
/* -------------------------------------------------------------------------------------- */
function selform( form ){
	$( "#izqder" ).val( form );
	$( "#selizq" ).hide();$( "#selder" ).hide();$( "#selambos" ).hide();
	$( "#sel" + form ).show();
	$( "#selcambio" ).show();
}

function slideForm( form ){
	$( "#selizq" ).removeClass("asel"); $( "#selder" ).removeClass("asel");
	$( "#sel" + form ).addClass("asel");
	$( "#panel-bizq" ).hide( 50 ); $( "#panel-bder" ).hide( 50 );
	$( "#panel-b" + form ).slideToggle( 1200 );
}
/* -------------------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------------------- */
/* ------------------------------------ Round sliders ----------------------------------- */
/* -------------------------------------------------------------------------------------- */
	var mxv = 180; midmx = mxv/2;
	var imin = midmx - 20; imax = midmx + 20;
	var rrad = 50; 
	function adjV( val, mval ){ return ( mval * 2 ) - ( val * 2 ); }
	function adjVmx( val, mval ){ return ( val - mval ) * 2; }
	$(document).ready(function () {
		/* Rangos Activos */
		$("#rs_dorfp").roundSlider({
			radius: rrad, max:mxv,
			value: imin + "," + imax,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsdfpv").html(vmin + " - " + vmax);
				$("#rsra_dflexion").val(vmin); $("#rsra_flexplan").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsdfpv").html(adjV( c1[0], midmx ) + " - " + adjVmx( c1[1], midmx ));
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#rs_supr").roundSlider({
			radius: rrad, max:mxv,
			value: imin + "," + imax,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsspv").html( vmin + " - " + vmax );
				$("#ra_supina").val(vmin); $("#ra_prona").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsspv").html( vmin + " - " + vmax );
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#rs_flexd").roundSlider({
			radius: rrad,
			value: imin + "," + imax,
			max:mxv,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsfedv").html( vmin + " - " + vmax );
				$("#rsra_flexded").val(vmin); $("#rsra_extded").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsfedv").html(adjV( c1[0], midmx ) + " - " + adjVmx( c1[1], midmx ));
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#rs_abadp").roundSlider({
			radius: rrad,
			value: imin + "," + imax,
			max:mxv,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsaapv").html( vmin + " - " + vmax );
				$("#rsra_abdpie").val(vmin); $("#rsra_adpie").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsaapv").html(adjV( c1[0], midmx ) + " - " + adjVmx( c1[1], midmx ));
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#rs_abadd").roundSlider({
			radius: rrad,
			value: imin + "," + imax,
			max:mxv,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsaadv").html( vmin + " - " + vmax );
				$("#rsra_abdded").val(vmin); $("#rsra_aded").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsaadv").html(adjV( c1[0], midmx ) + " - " + adjVmx( c1[1], midmx ));
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		/* ---------------------------------------------------------------------------- */
		/* Rangos Pasivos */
		$("#rs_dorfp_p").roundSlider({
			radius: rrad, max:mxv,
			value: imin + "," + imax,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsdfpv_p").html(vmin + " - " + vmax);
				$("#rsrp_dflexion").val(vmin); $("#rsrp_flexplan").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsdfpv_p").html(adjV( c1[0], midmx ) + " - " + adjVmx( c1[1], midmx ));
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#rs_supr_p").roundSlider({
			radius: rrad, max:mxv,
			value: imin + "," + imax,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsspv_p").html( vmin + " - " + vmax );
				$("#rp_supina").val(vmin); $("#rp_prona").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsspv_p").html( vmin + " - " + vmax );
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#rs_flexd_p").roundSlider({
			radius: rrad,
			value: imin + "," + imax,
			max:mxv,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsfedv_p").html( vmin + " - " + vmax );
				$("#rsrp_flexded").val(vmin); $("#rsrp_extded").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsfedv_p").html(adjV( c1[0], midmx ) + " - " + adjVmx( c1[1], midmx ));
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#rs_abadp_p").roundSlider({
			radius: rrad,
			value: imin + "," + imax,
			max:mxv,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsaapv_p").html( vmin + " - " + vmax );
				$("#rsrp_abdpie").val(vmin); $("#rsrp_adpie").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsaapv_p").html(adjV( c1[0], midmx ) + " - " + adjVmx( c1[1], midmx ));
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#rs_abadd_p").roundSlider({
			radius: rrad,
			value: imin + "," + imax,
			max:mxv,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsaadv_p").html( vmin + " - " + vmax );
				$("#rsrp_abdded").val(vmin); $("#rsrp_aded").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsaadv_p").html(adjV( c1[0], midmx ) + " - " + adjVmx( c1[1], midmx ));
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* -------------------------------------------------------------------------------*/
											/* --------------------------------- Pie Derecho ---------------------------------*/
		/* -------------------------------------------------------------------------------*/
		$("#drs_dorfp").roundSlider({
			radius: rrad, max:mxv,
			value: imin + "," + imax,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsdfpv_d").html(vmin + " - " + vmax);
				$("#rsra_dflexion").val(vmin); $("#rsra_flexplan").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsdfpv_d").html(adjV( c1[0], midmx ) + " - " + adjVmx( c1[1], midmx ));
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#drs_supr").roundSlider({
			radius: rrad, max:mxv,
			value: imin + "," + imax,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsspv_d").html( vmin + " - " + vmax );
				$("#ra_supina").val(vmin); $("#ra_prona").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsspv_d").html( vmin + " - " + vmax );
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#drs_flexd").roundSlider({
			radius: rrad,
			value: imin + "," + imax,
			max:mxv,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsfedv_d").html( vmin + " - " + vmax );
				$("#rsra_flexded").val(vmin); $("#rsra_extded").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsfedv_d").html(adjV( c1[0], midmx ) + " - " + adjVmx( c1[1], midmx ));
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#drs_abadp").roundSlider({
			radius: rrad,
			value: imin + "," + imax,
			max:mxv,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsaapv_d").html( vmin + " - " + vmax );
				$("#rsra_abdpie").val(vmin); $("#rsra_adpie").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsaapv_d").html(adjV( c1[0], midmx ) + " - " + adjVmx( c1[1], midmx ));
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#drs_abadd").roundSlider({
			radius: rrad,
			value: imin + "," + imax,
			max:mxv,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsaadv_d").html( vmin + " - " + vmax );
				$("#rsra_abdded").val(vmin); $("#rsra_aded").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsaadv_d").html(adjV( c1[0], midmx ) + " - " + adjVmx( c1[1], midmx ));
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		/* ---------------------------------------------------------------------------- */
		/* Rangos Pasivos */
		$("#drs_dorfp_p").roundSlider({
			radius: rrad, max:mxv,
			value: imin + "," + imax,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsdfpv_p_d").html(vmin + " - " + vmax);
				$("#rsrp_dflexion").val(vmin); $("#rsrp_flexplan").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsdfpv_p_d").html(adjV( c1[0], midmx ) + " - " + adjVmx( c1[1], midmx ));
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#drs_supr_p").roundSlider({
			radius: rrad, max:mxv,
			value: imin + "," + imax,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsspv_p_d").html( vmin + " - " + vmax );
				$("#rp_supina").val(vmin); $("#rp_prona").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsspv_p_d").html( vmin + " - " + vmax );
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#drs_flexd_p").roundSlider({
			radius: rrad,
			value: imin + "," + imax,
			max:mxv,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsfedv_p_d").html( vmin + " - " + vmax );
				$("#rsrp_flexded").val(vmin); $("#rsrp_extded").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsfedv_p_d").html(adjV( c1[0], midmx ) + " - " + adjVmx( c1[1], midmx ));
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#drs_abadp_p").roundSlider({
			radius: rrad,
			value: imin + "," + imax,
			max:mxv,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsaapv_p_d").html( vmin + " - " + vmax );
				$("#rsrp_abdpie").val(vmin); $("#rsrp_adpie").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsaapv_p_d").html(adjV( c1[0], midmx ) + " - " + adjVmx( c1[1], midmx ));
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#drs_abadd_p").roundSlider({
			radius: rrad,
			value: imin + "," + imax,
			max:mxv,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsaadv_p_d").html( vmin + " - " + vmax );
				$("#rsrp_abdded").val(vmin); $("#rsrp_aded").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsaadv_p_d").html(adjV( c1[0], midmx ) + " - " + adjVmx( c1[1], midmx ));
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
	});
/* -------------------------------------------------------------------------------------- */
/* ------------------------------------ Round sliders ----------------------------------- */
/* -------------------------------------------------------------------------------------- */