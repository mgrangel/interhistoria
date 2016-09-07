<?php 
//Script en PHP para encriptar contraseñas y poder usarlas en el archivo .htpasswd: 
//Comentario añadido por amen: 
// Tener el cuenta que el formato en un fichero de 
// password es: 
// login:pwdencriptado 

if (!isset($submit)) { 
?> 
<BR>ENCRIPTAR PASSWORD 
<br><br><FORM METHOD="POST" ACTION="encry.php"> 
<p>Password: <INPUT TYPE="TEXT" NAME="password"></p> 
<p><input type="submit" value="Encriptar" name="submit"></p> 
</FORM> 
<? 
} 
if (isset($_POST["password"])) { 
$password_encr=crypt($_POST["password"],CRYPT_STD_DES); 
echo "<br>ENCRIPTAR PASSWORD"; 
echo "<br><br>Encriptación de <b>$password</b> :"; 
echo "<br>$password_encr"; 
?> 
<BR><br>Nueva Encriptación: 
<br><br><FORM METHOD="POST" ACTION="encry.php"> 
<p>Password: <INPUT TYPE="TEXT" NAME="password"></p> 
<p><input type="submit" value="Encriptar" name="submit"></p> 
</FORM> 
<? 
} 
?>