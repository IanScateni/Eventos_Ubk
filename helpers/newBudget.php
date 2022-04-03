<?php
session_start();
require 'crud.php';
$obj = new crud();
if (isset($_POST['menu'])) {
	$menu = json_encode($_POST['menu']);
} else {
	$menu = "";
}
$nombre = $_POST['nombre'];
$servicios = str_replace("'", "\"", $_POST['servicios']);
if (isset($_SESSION['identity'])) {
    $emailUser = $_SESSION['identity']->email;
} else {
	$emailUser = $_POST['email'];
}
$data = array(
	$_POST['evento'],
	$nombre,
	$emailUser,
	$_POST['telefono'],
	$_POST['fecha'],
	$_POST['personas'],
	$servicios,
	$menu,
	$_POST['firstname'],
	$_POST['lastname'],
	$_POST['hora']
);
$flag = $obj->newBudget($data);
$nameEvent = $_POST['evento'];
$password = $_POST['telefono'];
$route = PATH;
if ($flag == 1) {
	$subject= "UBK Eventos nueva reserva para evento " . $nameEvent;
	$email = $_POST['email'];
	$body = "<!DOCTYPE html>
		<html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office'>
		<head>
		  <meta charset='UTF-8'>
		  <meta name='viewport' content='width=device-width,initial-scale=1'>
		  <meta name='x-apple-disable-message-reformatting'>
		  <title></title>
		  <style>
		    table, td, div, h1, p {font-family: Arial, sans-serif;}
		  </style>
		</head>
		<body style='margin:0;padding:0;'>
		  <table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;'>
		    <tr>
		      <td align='center' style='padding:0;'>
		        <table role='presentation' style='width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;'>
		          <tr>
		            <td style='padding:36px 30px 42px 30px;'>
		              <table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;'>
		                <tr>
		                  <td style='padding:0 0 36px 0;color:#153643;'>
		                    <h1 style='font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;'>UBK Eventos</h1>
		                    <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'>". $nombre." su solicitud para el evento " . $nameEvent . " fue registrada con éxito, puede revisar su reserva en el siguiente link.</p>
		                    <p style='margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'><a href='".$route."usuario/login' style='color:#ee4c50;text-decoration:underline;'>Reservas</a></p>
		                  </td>
		                </tr>
		                <tr>
		                  <td style='padding:0;'>
		                    <table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;'>
		                      <tr>
		                        <td style='width:260px;padding:0;vertical-align:top;color:#153643;'>
		                          <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'>A continuación los datos para iniciar sesión:</p>
		                          <p style='margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'>
		                            <strong>Usuario: </strong>" . $email ."<br>
		                            <strong>Contraseña: </strong>" . $email ."
		                          </p>
		                        </td>
		                      </tr>
		                    </table>
		                  </td>
		                </tr>
		              </table>
		            </td>
		          </tr>
		          <tr>
		            <td style='padding:30px;background:#ee4c50;'>
		              <table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;'>
		                <tr>
		                  <td style='padding:0;width:50%;' align='left'>
		                    <p style='margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;'>
		                      &reg; UBK Eventos - " . date('Y-m-d') ."<br/>
		                    </p>
		                  </td>
		                  <td style='padding:0;width:50%;' align='right'>
		                    <table role='presentation' style='border-collapse:collapse;border:0;border-spacing:0;'>
		                      <tr>
		                        <td style='padding:0 0 0 10px;width:38px;'>
		                          <a href='http://www.twitter.com/' style='color:#ffffff;'><img src='https://assets.codepen.io/210284/tw_1.png' alt='Twitter' width='38' style='height:auto;display:block;border:0;' /></a>
		                        </td>
		                        <td style='padding:0 0 0 10px;width:38px;'>
		                          <a href='http://www.facebook.com/' style='color:#ffffff;'><img src='https://assets.codepen.io/210284/fb_1.png' alt='Facebook' width='38' style='height:auto;display:block;border:0;' /></a>
		                        </td>
		                      </tr>
		                    </table>
		                  </td>
		                </tr>
		              </table>
		            </td>
		          </tr>
		        </table>
		      </td>
		    </tr>
		  </table>
		</body>
		</html>";
	echo $obj->sendMail($subject, $body, $email);		
} else if ($flag == 2) {
	$subject= "UBK Eventos nueva reserva para evento " . $nameEvent;
	$email = $_POST['email'];
	$body = "<!DOCTYPE html>
		<html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office'>
		<head>
		  <meta charset='UTF-8'>
		  <meta name='viewport' content='width=device-width,initial-scale=1'>
		  <meta name='x-apple-disable-message-reformatting'>
		  <title></title>
		  <style>
		    table, td, div, h1, p {font-family: Arial, sans-serif;}
		  </style>
		</head>
		<body style='margin:0;padding:0;'>
		  <table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;'>
		    <tr>
		      <td align='center' style='padding:0;'>
		        <table role='presentation' style='width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;'>
		          <tr>
		            <td style='padding:36px 30px 42px 30px;'>
		              <table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;'>
		                <tr>
		                  <td style='padding:0 0 36px 0;color:#153643;'>
		                    <h1 style='font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;'>UBK Eventos</h1>
		                    <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'>". $nombre." su solicitud para el evento " . $nameEvent . " fue registrada con éxito, puede revisar su reserva en el siguiente link.</p>
		                    <p style='margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'><a href='".$route."usuario/login' style='color:#ee4c50;text-decoration:underline;'>Reservas</a></p>
		                  </td>
		                </tr>
		              </table>
		            </td>
		          </tr>
		          <tr>
		            <td style='padding:30px;background:#ee4c50;'>
		              <table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;'>
		                <tr>
		                  <td style='padding:0;width:50%;' align='left'>
		                    <p style='margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;'>
		                      &reg; UBK Eventos - " . date('Y-m-d') ."<br/>
		                    </p>
		                  </td>
		                  <td style='padding:0;width:50%;' align='right'>
		                    <table role='presentation' style='border-collapse:collapse;border:0;border-spacing:0;'>
		                      <tr>
		                        <td style='padding:0 0 0 10px;width:38px;'>
		                          <a href='http://www.twitter.com/' style='color:#ffffff;'><img src='https://assets.codepen.io/210284/tw_1.png' alt='Twitter' width='38' style='height:auto;display:block;border:0;' /></a>
		                        </td>
		                        <td style='padding:0 0 0 10px;width:38px;'>
		                          <a href='http://www.facebook.com/' style='color:#ffffff;'><img src='https://assets.codepen.io/210284/fb_1.png' alt='Facebook' width='38' style='height:auto;display:block;border:0;' /></a>
		                        </td>
		                      </tr>
		                    </table>
		                  </td>
		                </tr>
		              </table>
		            </td>
		          </tr>
		        </table>
		      </td>
		    </tr>
		  </table>
		</body>
		</html>";
	echo $obj->sendMail($subject, $body, $email);
} elseif ($flag == 3) {
	echo 3;
} else {
	echo 0;
}
