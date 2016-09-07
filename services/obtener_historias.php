<?php

//API Url
//Servicio: Obtener registros de pacientes
$url = 'http://api.interhistoria.net/historias/registros?token_api=8539a8f60ade36dfef8fb42bfd987058&cedula=17453265';
 
//Initiate cURL.
$ch = curl_init( $url );

/*$jsonData = array(
    'nombre_serv' => 'registro_paciente',
	'data' => array(
		'titulo' => 'Sr',
		'nombre' => 'Berto',
		'apellido' => 'Gutierrez',
		'cedula' => '12966544',
		'fecha_nacimiento' => '1974-05-21',
		'direccion' => 'Av principal Las Palmas, calle Molinos Sector Granadinas',
		'sexo' => 'masculino',
		'ocupacion' => 'Comerciante',
		'lugar_trabajo' => 'Caracas',
		'telefono' => '04129901517',
		'email' => 'bgutierrez@gmail.com',
		'edo_civil' => 'soltero',
		'religion' => 'católica',
		'representante' => 'Mercedez Iturbe',
		'idioma' => 'Español',
		'actividad_fisica' => 'Natación',
		'peso' => '83.5',
		'estatura' => '1.72',
		'imc' => '25.4',
		'dominancia' => 'diestro',
		'seguro' => 'Seguros La Seguridad',
		'dr_remitido' => 'Emilio Alvarado',
		'idUsuario' => '1'
	)
);

$jsonData = array(
    'nombre_serv' => 'modificar_paciente',
	'data' => array(
		'idPaciente' => '3',
		'titulo' => 'Sr',
		'nombre' => 'Berto',
		'apellido' => 'Gutierrez',
		'cedula' => '12966544',
		'fecha_nacimiento' => '1974-05-21',
		'direccion' => 'Av principal Las Palmas, calle Molinos Sector Granadinas',
		'sexo' => 'masculino',
		'ocupacion' => 'Comerciante',
		'lugar_trabajo' => 'Caracas',
		'telefono' => '04129901517',
		'email' => 'bgutierrez@gmail.com',
		'edo_civil' => 'soltero',
		'religion' => 'católica',
		'representante' => 'Mercedez Iturbe',
		'idioma' => 'Español',
		'actividad_fisica' => 'Natación',
		'peso' => '83.5',
		'estatura' => '1.72',
		'imc' => '25.4',
		'dominancia' => 'diestro',
		'seguro' => 'Seguros La Seguridad',
		'dr_remitido' => 'Emilio Alvarado',
		'idUsuario' => '1'
	)
);

$jsonData = array(
    'nombre_serv' => 'obtener_lista_pacientes',
	'data' => array(
		'idUsuario' => '3',
	)
);*/

curl_setopt( $ch, CURLOPT_URL, $url );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
//  curl_setopt($ch,CURLOPT_HEADER, false); 

$output = curl_exec( $ch);
echo $output;
curl_close( $ch );
?>
