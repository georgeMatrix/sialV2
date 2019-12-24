<?php

header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
$datos['conceptos'][0]['descripcion']='';
$datos['conceptos'][0]['cantidad']='';
$datos['conceptos'][0]['unidad']='';
$datos['conceptos'][0]['ID'] = '';
$datos['conceptos'][0]['valorunitario'] = '';
$datos['conceptos'][0]['importe'] = '';
$datos['conceptos'][0]['ClaveProdServ'] = '';
$datos['conceptos'][0]['ClaveUnidad'] = '';

$datos['conceptos'][0]['Impuestos']['Traslados'][0]['Base'] = '';
$datos['conceptos'][0]['Impuestos']['Traslados'][0]['Impuesto'] = '';
$datos['conceptos'][0]['Impuestos']['Traslados'][0]['TipoFactor'] = '';
$datos['conceptos'][0]['Impuestos']['Traslados'][0]['TasaOCuota'] = '';
$datos['conceptos'][0]['Impuestos']['Traslados'][0]['Importe'] = '';
$sumatoriaCfdiTIvaImporte = 0;
$sumatoriaImporte = 0;

$valores = $_POST["valoresParaServidor"];
$noConceptos = $_POST["noConceptos"];
$facturables = $_POST["facturables"];

//for($i=0; $i<7; $i++){        HABILITAR CUANDO YA ESTE TERMINADO
foreach ($valores[2] as $k=>$v){
    $datos['conceptos'][$k]['descripcion'] = $v;
}
foreach ($valores[0] as $k=>$v){
    $datos['conceptos'][$k]['cantidad'] = $v;
}
foreach ($valores[1] as $k=>$v){
    $datos['conceptos'][$k]['unidad'] = $v;
}
foreach ($valores[3] as $k=>$v){
    $datos['conceptos'][$k]['valorunitario'] = $v;
}
foreach ($valores[4] as $k=>$v) {
    $datos['conceptos'][$k]['importe'] = $v;
    $sumatoriaImporte = $sumatoriaImporte + $v;
}
foreach ($valores[5] as $k=>$v) {
    $datos['conceptos'][$k]['ClaveProdServ'] = $v;
}
foreach ($valores[6] as $k=>$v) {
    $datos['conceptos'][$k]['ClaveUnidad'] = $v;
}
foreach ($valores[7] as $k=>$v) {
    $datos['conceptos'][$k]['Impuestos']['Traslados'][0]['Base'] = $v;
}

foreach ($valores[11] as $k=>$v) {
    $datos['conceptos'][$k]['Impuestos']['Traslados'][0]['Importe'] = $v;
    $sumatoriaCfdiTIvaImporte = $sumatoriaCfdiTIvaImporte + $v;
}

foreach ($valores[8] as $k=>$v) {
    $datos['conceptos'][$k]['Impuestos']['Traslados'][0]['Impuesto'] = $v;
    if ($datos['conceptos'][$k]['Impuestos']['Traslados'][0]['Impuesto'] != null){
        if ($datos['conceptos'][$k]['Impuestos']['Traslados'][0]['Impuesto'] == '002'){
            // Se agregan los Impuestos
            $datos['impuestos']['translados'][0]['impuesto'] = '002';
            $datos['impuestos']['translados'][0]['tasa'] = $valores[10][0];
            /*foreach ($valores[11] as $k=>$v) {
                $sumatoriaCfdiTIvaImporte = $sumatoriaCfdiTIvaImporte + $v;
            }*/
            $datos['impuestos']['translados'][0]['importe'] = $sumatoriaCfdiTIvaImporte;
            $datos['impuestos']['translados'][0]['TipoFactor'] = $valores[9][0];
        }
    }
}
foreach ($valores[9] as $k=>$v) {
    $datos['conceptos'][$k]['Impuestos']['Traslados'][0]['TipoFactor'] = $v;
}
foreach ($valores[10] as $k=>$v) {
    $datos['conceptos'][$k]['Impuestos']['Traslados'][0]['TasaOCuota'] = $v;
}



//}

/*for ($j=0; $j<$noConceptos; $j++){
    $datos['conceptos'][$j]['ID'] = $facturables[0][0][$j]["no_identificacion"];
}*/


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

// Ruta del XML Timbrado
$datos['cfdi']='../../timbrados/cfdi_ejemplo_factura.xml';      //PONER EL NOMBRE DEL FOLIO (QUE AUN NO SE TIENE)

// Ruta del XML de Debug
$datos['xml_debug']='../../timbrados/sin_timbrar_ejemplo_factura.xml';

// Credenciales de Timbrado
$datos['PAC']['usuario'] = 'DEMO700101XXX';
$datos['PAC']['pass'] = 'DEMO700101XXX';
$datos['PAC']['produccion'] = 'NO';

// Rutas y clave de los CSD
$datos['conf']['cer'] = '../../certificados/lan7008173r5.cer.pem';
$datos['conf']['key'] = '../../certificados/lan7008173r5.key.pem';
$datos['conf']['pass'] = '12345678a';

// Datos de la Factura
$datos['factura']['condicionesDePago'] = 'CONDICIONES';     //DEL MODAL ppd
$datos['factura']['fecha_expedicion'] = date('Y-m-d\TH:i:s', time() - 120); //new date
$datos['factura']['folio'] = '100';     //preguntar a Peter folio de factura MODAL
$datos['factura']['forma_pago'] = $valores[14];     //forma de pago MODAL
$datos['factura']['LugarExpedicion'] = $valores[12];    //forma de pago MODAL
$datos['factura']['metodo_pago'] = $valores[13];    //forma de pago MODAL
$datos['factura']['moneda'] = $valores[16];        //forma de pago MODAL
$datos['factura']['serie'] = 'A';           //'A' en duro para todos
$datos['factura']['subtotal'] = $sumatoriaImporte;         //SUMATORIA $datos['conceptos'][0]['importe']

$datos['factura']['tipocambio'] = 1;            //1 en duro para todos
$datos['factura']['tipocomprobante'] = 'I';     //'I' en duro para todos
$datos['factura']['total'] = $sumatoriaImporte + $sumatoriaCfdiTIvaImporte;     //SUMATORIA SUBTOTALES DE TODOS LOS CONCEPTOS $datos['conceptos'][0]['importe'] + $datos['conceptos'][0]['Impuestos']['Traslados'][0]['Importe']
$datos['factura']['RegimenFiscal'] = '601';     //601 en duro

// Datos del Emisor
$datos['emisor']['rfc'] = 'LAN7008173R5'; //si es 2 es ruben velazquez y si es 1 es logiexpress
$datos['emisor']['nombre'] = 'ACCEM SERVICIOS EMPRESARIALES SC';  // si es 2 es ruben velazquez y si es 1 es logiexpress se copia del de arriba

// Datos del Receptor
$datos['receptor']['rfc'] = 'XAXX010101000';        //receptor_rfc (Front)
$datos['receptor']['nombre'] = 'Publico en General';        //receptor_razon_social
$datos['receptor']['UsoCFDI'] = 'G02';      //G03 en duro

// Se agregan los conceptos

$datos['impuestos']['TotalImpuestosTrasladados'] = $sumatoriaCfdiTIvaImporte;       //sumatoria de todos los conceptos en el apartado cfdi_t_iva_importe


// Se ejecuta el SDK
$res = mf_genera_cfdi($datos);

///////////    MOSTRAR RESULTADOS DEL ARRAY $res   ///////////
/*echo "<pre>";
print_r($datos);
echo "</pre>";*/
//echo "<h1>Respuesta Generar XML y Timbrado</h1>";
foreach ($res AS $variable => $valor) {
    $valor = htmlentities($valor);
    $valor = str_replace('&lt;br/&gt;', '<br/>', $valor);
    echo json_encode($valor);
}

//header('Content-Type: application/xml; charset=utf-8');
$file = fopen("../../../front/factura.php", "w+b");
fwrite($file, "<?php" . PHP_EOL);
fwrite($file, "\$xmlOriginal = <<<XML" . PHP_EOL);
foreach ($res AS $variable => $valor) {
    $valor = htmlentities($valor);
    //$valor = str_replace('&lt;br/&gt;', '<br/>', $valor);
    $valor = str_replace('<br>', '', $valor);
    $valor = str_replace('<br>', '', $valor);
    $valor = str_replace('&lt;', '<', $valor);
    $valor = str_replace('&gt;', '>', $valor);
    $valor = str_replace('&quot;', '"', $valor);
    $resultante = $resultante.$valor;
    fwrite($file, $valor);
    fwrite($file, "XML;" . PHP_EOL);
    fwrite($file, "?>");
    fclose($file);
    //ACTIVAR ESTE json_encode EN CASO DE QUE SE QUIERA VER LOS ERRORES
    //echo json_encode($valor);
    //echo "archivo guardado en php";
    //echo "<hr>";
    //echo $resultante;
    exit;
}