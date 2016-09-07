// JavaScript Document
/*
* Interhistorias - Funciones Javascript formulario historia clínica de hombro
*
*/

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
		
		/* ---------------------------- Ventanas emergentes ------------------------------- */
		$('.man_opcemergentes input:checkbox').click(function() {
			var nombre = $(this).attr('data-nombre');
			if( nombre != null ){
				var id_opc = $(this).attr('name');
				var elem = "<div id='osm_" + id_opc + "' class='item_opcme'>"+nombre+"</div>";
				if( !$(this).is(':checked') ) {
					$("#osm_" + id_opc ).remove();
				}else{
					$("#lmanho").append( elem + "&nbsp" );
				}
			}
		});
		/* ---------------------------------------------------------------------------------------- */
		$('.idx_opcemergentes input:checkbox').click(function() {
			var nombre = $(this).attr('data-nombre');
			var id_opc = $(this).attr('name');
			var elem = "<div id='osm_" + id_opc + "' class='item_opcme'>"+nombre+"</div>";
			if( !$(this).is(':checked') ) {
				$("#osm_" + id_opc ).remove();
			}else{
				$("#lidxho").append( elem + "&nbsp" );
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
					$("#lmanho").append( elem + "&nbsp" );}
				else{
					$("#lmanho").append( elem + "&nbsp" );
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
					$("#lidxho").append( elem + "&nbsp" );}
				else{
					$("#lidxho").append( elem + "&nbsp" );
				}
			}		
		});
	});
	/* -------------------------------------------------------------------------------------- */
	//Chequeo registro de historia
	function regHistoria(){
		var nform = "frm_hombro";
		var form = $( '#' + nform );
		var idp = $("#idp").val();
		if( idp != "" ){
			$.ajax({
				type:"POST",
				url:"../bd/data-fho.php",
				data:{ form: form.serialize() },
				beforeSend: function () {
					$("#waitconfirm").html("Espere...");
				},
				success: function( response ){
					//$("#nresp").html(response);
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
	function adjV( val, mval ){ return ( mval * 2 ) - ( val * 2 ); }
	function adjVmx( val, mval ){ return ( val - mval ) * 2; }
	$(document).ready(function () {
		/* Rangos Activos */
		var rrad = 50;
		$("#rs_flex_ext").roundSlider({	//flexión - extensión
			radius: rrad, max:mxv,
			value: imin + "," + imax,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsfev").html(vmin + " - " + vmax);
				$("#rsra_flexion").val(vmin); $("#rsra_extension").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsfev").html(adjV( c1[0], midmx ) + " - " + adjVmx( c1[1], midmx ));
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#rs_abdad").roundSlider({	//abducción - aducción
			radius: rrad, max:mxv,
			value: imin + "," + imax,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsabdv").html( vmin + " - " + vmax );
				$("#rsra_abduc").val(vmin); $("#rsra_aduc").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsabdv").html( vmin + " - " + vmax );
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#rs_rotinex").roundSlider({	//Rotación interna - externa
			radius: rrad,
			value: imin + "," + imax,
			max:mxv,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsriev").html( vmin + " - " + vmax );
				$("#rsra_rotin").val(vmin); $("#rsra_rotex").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsriev").html( vmin + " - " + vmax );
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		/* ---------------------------------------------------------------------------- */
		/* Rangos Pasivos */
		$("#rs_flex_ext_p").roundSlider({
			radius: rrad, max:mxv,
			value: imin + "," + imax,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsfev_p").html( vmin + " - " + vmax );
				$("#rsrp_flexion").val( vmin ); $("#rsrp_extension").val( vmax );
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsfev_p").html( adjV( c1[0], midmx ) + " - " + adjVmx( c1[1], midmx ) );
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#rs_abdad_p").roundSlider({	//abducción - aducción
			radius: rrad, max:mxv,
			value: imin + "," + imax,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsabdv_p").html( vmin + " - " + vmax );
				$("#rsrp_abduc").val(vmin); $("#rsrp_aduc").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsabdv_p").html( vmin + " - " + vmax );
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#rs_rotinex_p").roundSlider({	//Rotación interna - externa
			radius: rrad,
			value: imin + "," + imax,
			max:mxv,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsriev_p").html( vmin + " - " + vmax );
				$("#rsrp_rotin").val(vmin); $("#rsrp_rotex").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				$("#rsriev_p").html(adjV( c1[0], midmx ) + " - " + adjVmx( c1[1], midmx ));
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
	});
/* -------------------------------------------------------------------------------------- */
/* ------------------------------------ Round sliders ----------------------------------- */
/* -------------------------------------------------------------------------------------- */