// JavaScript Document
/*
* Interhistorias - Funciones Javascript formulario historia clínica de codo
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
			var id_opc = $(this).attr('name');
			var elem = "<div id='osm_" + id_opc + "' class='item_opcme'>"+nombre+"</div>";
			if( !$(this).is(':checked') ) {
				$("#osm_" + id_opc ).remove();
			}else{
				$("#lmanho").append( elem + "&nbsp" );
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
					$("#lidxho").append( elem + "&nbsp" );
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
		var nform = "frm_codo";
		var form = $( '#' + nform );
		var idp = $("#idp").val();
		if( idp != "" ){
			$.ajax({
				type:"POST",
				url:"../bd/data-fco.php",
				data:{ form: form.serialize() },
				beforeSend: function () {
					$("#waitconfirm").html("Espere...");
				},
				success: function( response ){
					url = "ninforme.php?nf=" + nform + "&f=" + response;
					//$("#nresp").html(response);
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
		
		var rrad = 50;
		$("#rs_ef_valgo").roundSlider({
			radius: rrad,
			circleShape: "half-top",
			sliderType: "min-range",
			showTooltip: false,
			value: 45, max:180,
			change: function (e) {
				var valor = e.value;
				$("#rsvlg").html( valor );
				$("#rsef_valgo").val( valor );
			},
			drag: function (e) {
				var val = e.value;
				$("#rsvlg").html( val );
			}
		});
		
		$("#rs_ef_varo").roundSlider({
			radius: rrad,
			circleShape: "half-top",
			sliderType: "min-range",
			showTooltip: false,
			value: 45, max:180,
			change: function (e) {
				var valor = e.value;
				$("#rsva").html( valor );
				$("#rsef_varo").val( valor );
			},
			drag: function (e) {
				var val = e.value;
				$("#rsva").html( val );
			}
		});
		/* ---------------------------------------------------------------------------- */
		/* Rangos Activos */
		$("#rs_flex_ext").roundSlider({	//Flexión - Extensión
			radius: rrad, max:mxv,
			value: imin + "," + imax,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsfev").html( vmin + " - " + vmax );
				$("#rsra_flexion").val(vmin); $("#rsra_extension").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsfev").html( vmin + " - " + vmax );
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#rs_supron").roundSlider({	//Supinación - Pronación
			radius: rrad, max:mxv,
			value: imin + "," + imax,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsspv").html( vmin + " - " + vmax );
				$("#rsra_supina").val(vmin); $("#rsra_pronac").val(vmax);
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
		/* ---------------------------------------------------------------------------- */
		/* Rangos Pasivos */
		$("#rs_flex_ext_p").roundSlider({	//Flexión - Extensión
			radius: rrad, max:mxv,
			value: imin + "," + imax,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsfev_p").html( vmin + " - " + vmax );
				$("#rsrp_flexion").val(vmin); $("#rsrp_extension").val(vmax);
			},
			drag: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsfev_p").html( vmin + " - " + vmax );
			},
			sliderType: "range",
			circleShape: 'half-top'
		});
		/* ---------------------------------------------------------------------------- */
		$("#rs_supron_p").roundSlider({	//Supinación - Pronación
			radius: rrad, max:mxv,
			value: imin + "," + imax,
			showTooltip:false,
			change: function (e) {
				var c1 = e.value.split(',');
				var vmin = adjV( c1[0], midmx ); var vmax = adjVmx( c1[1], midmx );
				$("#rsspv_p").html( vmin + " - " + vmax );
				$("#rsrp_supina").val(vmin); $("#rsrp_pronac").val(vmax);
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