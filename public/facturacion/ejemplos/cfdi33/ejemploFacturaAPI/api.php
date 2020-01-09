<?php
// Se desactivan los mensajes de debug
ini_set('error_reporting', E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE); // Show all errors minus STRICT, DEPRECATED and NOTICES
ini_set('display_errors', 0); // disable error display
ini_set('log_errors', 0); // disable error logging
//error_reporting(E_ALL);

// Se especifica la zona horaria
date_default_timezone_set('America/Mexico_City');

// Se incluye el SDK
require_once '../../sdk2.php';


// Se especifica la version de CFDi 3.3
$datos['version_cfdi'] = '3.3';

// Ruta del XML Timbrado $idFactura
$datos['cfdi']='../../timbrados/cfdi_factura'.$idFactura.'.xml';      //PONER EL NOMBRE DEL FOLIO (QUE AUN NO SE TIENE)

// Ruta del XML de Debug
$datos['xml_debug']='../../timbrados/sin_timbrar_factura'.$idFactura.'.xml';

// Credenciales de Timbrado
$datos['PAC']['usuario'] = 'DEMO700101XXX';
$datos['PAC']['pass'] = 'DEMO700101XXX';
$datos['PAC']['produccion'] = 'NO';

// Rutas y clave de los CSD
$datos['conf']['cer'] = '../../certificados/lan7008173r5.cer.pem';
$datos['conf']['key'] = '../../certificados/lan7008173r5.key.pem';
$datos['conf']['pass'] = '12345678a';