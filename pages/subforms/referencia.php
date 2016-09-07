<!--  -->
<div data-cke-display-name="pagebreak" data-cke-pagebreak="1" title="Salto de página" style="page-break-after: always" aria-label="Salto de página" contenteditable="false"></div>
<div>
	<?php echo "Caracas, ".$fecha; ?><br>Identificación<br>
	<?php echo $dp["nombre"]." ".$dp["apellido"]; ?><br>
    <?php echo $dp["cedula"]; ?><br><br>
    <span style="text-decoration: underline;">Referencia para <?php echo $eref; ?></span><br><br>
    <div>
    	Paciente <?php echo $dp["sexo"]." de ".$dp["edad"]." años"; ?> quien es evaluado clínica y paraclínicamente hallándose signos compatibles con:
    </div>
    <div><?php echo $ridx;?></div>
    <div>
    	Se agradece su evaluación y conducta, y me despido a la espera de su orientación o informe, atentamente.
    </div>
    <div id="firma_referencia" style="margin:40px 0 0 0;">
        <div><?php echo $druser["nombre"]." ".$druser["apellido"];?></div>
        <div><?php echo $druser["descripcion"];?></div>
        <div> C.I.:<?php echo $druser["ci"];?></div>
        <div> M.S.D.S.:<?php echo $druser["msds"];?></div>
        <div> C.M.D.F.:<?php echo $druser["cmdf"];?></div>
    </div>
</div>    
            