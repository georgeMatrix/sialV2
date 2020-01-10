<?php

header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
//$idFacturables = '';
/*$datos['conceptos'][0]['descripcion']='';
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
$datos['conceptos'][0]['Impuestos']['Traslados'][0]['Importe'] = '';*/

/*$datos['conceptos'][0]['Impuestos']['Retenciones'][0]['Impuesto'] = '';
$datos['conceptos'][0]['Impuestos']['Retenciones'][0]['Importe'] = '';
$datos['conceptos'][0]['Impuestos']['Retenciones'][0]['Base'] = '';
$datos['conceptos'][0]['Impuestos']['Retenciones'][0]['TasaOCuota'] = '';
$datos['conceptos'][0]['Impuestos']['Retenciones'][0]['TipoFactor'] = '';*/

$sumatoriaCfdiTIvaImporte = 0;
$sumatoriaImporte = 0;
$sumatoriaCfdiRIvaImporte = 0;

$valores = $_POST["valoresParaServidor"];
$noConceptos = $_POST["noConceptos"];
$idFactura = $_POST["idFactura"];
//var_dump($facturables);
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
    if ($v != null){
        $datos['conceptos'][$k]['Impuestos']['Traslados'][0]['Base'] = $v;
    }

}

foreach ($valores[11] as $k=>$v) {
    if ($v != null) {
        $datos['conceptos'][$k]['Impuestos']['Traslados'][0]['Importe'] = $v;
        $sumatoriaCfdiTIvaImporte = $sumatoriaCfdiTIvaImporte + $v;
    }
}

foreach ($valores[8] as $k=>$v) {
    if ($v != null) {
        $datos['conceptos'][$k]['Impuestos']['Traslados'][0]['Impuesto'] = $v;

        if ($v == '002') {
            // Se agregan los Impuestos
            $datos['impuestos']['translados'][0]['impuesto'] = '002';
            $datos['impuestos']['translados'][0]['tasa'] = $valores[10][0];
            $datos['impuestos']['translados'][0]['importe'] = $sumatoriaCfdiTIvaImporte;
            $datos['impuestos']['translados'][0]['TipoFactor'] = $valores[9][0];
        }
    }
}
foreach ($valores[9] as $k=>$v) {
    if ($v != null) {
        $datos['conceptos'][$k]['Impuestos']['Traslados'][0]['TipoFactor'] = $v;
    }
}
foreach ($valores[10] as $k=>$v) {
    if ($v != null) {
        $datos['conceptos'][$k]['Impuestos']['Traslados'][0]['TasaOCuota'] = $v;
    }
}

/*foreach ($valores[18] as $k=>$v) {
        $datos['conceptos'][$k]['Impuestos']['Retenciones'][0]['Importe'] = $v;
        $sumatoriaCfdiRIvaImporte = $sumatoriaCfdiRIvaImporte + doubleval($v);
}*/

/*foreach ($valores[17] as $k=>$v) {
    $datos['conceptos'][$k]['Impuestos']['Retenciones'][0]['Impuesto'] = $v;
    if ($datos['conceptos'][$k]['Impuestos']['Retenciones'][0]['Impuesto'] != ''){
        echo "esta entrando en el cerebro ";
        if ($datos['conceptos'][$k]['Impuestos']['Retenciones'][0]['Impuesto'] == '002'){
            // Se agregan los Impuestos
            $datos['conceptos'][0]['Impuestos']['Retenciones'][0]['Impuesto'] = '002';
            $datos['conceptos'][0]['Impuestos']['Retenciones'][0]['Importe'] = $valores[18][0];
            $datos['conceptos'][0]['Impuestos']['Retenciones'][0]['Base'] = $valores[19][0];
            $datos['conceptos'][0]['Impuestos']['Retenciones'][0]['TasaOCuota'] = $valores[20][0];
            $datos['conceptos'][0]['Impuestos']['Retenciones'][0]['TipoFactor'] = $valores[21][0];

            $datos['impuestos']['retenciones'][0]['impuesto'] = '002';
            $datos['impuestos']['retenciones'][0]['importe'] = $valores[18][0];
        }
    }
}*/

/*foreach ($valores[22] as $k=>$v) {
    $idFacturables = $v;
}*/

include 'ejemploFacturaAPI/api.php';

// Datos de la Factura
$datos['factura']['condicionesDePago'] = 'CONDICIONES';     //DEL MODAL ppd
$datos['factura']['fecha_expedicion'] = date('Y-m-d\TH:i:s', time() - 120); //new date
//$datos['factura']['folio'] = '100';     //preguntar a Peter folio de factura MODAL
$datos['factura']['folio'] = $idFactura;
$datos['factura']['forma_pago'] = $valores[14];     //forma de pago MODAL
$datos['factura']['LugarExpedicion'] = $valores[12];    //forma de pago MODAL
$datos['factura']['metodo_pago'] = $valores[13];    //forma de pago MODAL
$datos['factura']['moneda'] = $valores[16];        //forma de pago MODAL
$datos['factura']['serie'] = 'A';           //'A' en duro para todos
$datos['factura']['subtotal'] = $sumatoriaImporte;         //SUMATORIA $datos['conceptos'][0]['importe']

$datos['factura']['tipocambio'] = 1;            //1 en duro para todos
$datos['factura']['tipocomprobante'] = 'I';     //'I' en duro para todos
$datos['factura']['total'] = $sumatoriaImporte + $sumatoriaCfdiTIvaImporte;     //SUMATORIA SUBTOTALES DE TODOS LOS CONCEPTOS $datos['conceptos'][0]['importe'] + $datos['conceptos'][0]['Impuestos']['Traslados'][0]['Importe']
//$datos['factura']['total'] = $sumatoriaImporte + ($sumatoriaCfdiTIvaImporte - $sumatoriaCfdiRIvaImporte);     //SUMATORIA SUBTOTALES DE TODOS LOS CONCEPTOS
$datos['factura']['RegimenFiscal'] = '601';     //601 en duro

// Datos del Emisor
if ($valores[23] == 1){
    $datos['emisor']['rfc'] = 'LAN7008173R5'; //si es 2 es ruben velazquez y si es 1 es logiexpress
}
if ($valores[24] == 1){
    $datos['emisor']['nombre'] = 'ACCEM SERVICIOS EMPRESARIALES SC';  // si es 2 es ruben velazquez y si es 1 es logiexpress se copia del de arriba
}
if ($valores[23] == 2){
    $datos['emisor']['rfc'] = 'LAN7008173R5'; //si es 2 es ruben velazquez y si es 1 es logiexpress
}
if ($valores[24] == 2){
    $datos['emisor']['nombre'] = 'ACCEM SERVICIOS EMPRESARIALES SC';  // si es 2 es ruben velazquez y si es 1 es logiexpress se copia del de arriba
}


// Datos del Receptor
//$datos['receptor']['rfc'] = $valores[25];        //receptor_rfc (Front)
$datos['receptor']['rfc'] = 'XAXX010101000';        //receptor_rfc (Front)
//$datos['receptor']['nombre'] = $valores[26];        //receptor_razon_social
$datos['receptor']['nombre'] = 'Publico en General';        //receptor_razon_social
$datos['receptor']['UsoCFDI'] = $valores[27];;      //G03 en duro

// Se agregan los conceptos
if($sumatoriaCfdiTIvaImporte > 0){
    $datos['impuestos']['TotalImpuestosTrasladados'] = $sumatoriaCfdiTIvaImporte;       //sumatoria de todos los conceptos en el apartado cfdi_t_iva_importe
}
else{
    $datos['impuestos']['TotalImpuestosTrasladados'] = '0.00';
    $datos['impuestos']['translados'][0]['impuesto'] = '003';
    $datos['impuestos']['translados'][0]['tasa'] = '0.160000';
    $datos['impuestos']['translados'][0]['importe'] = '0.00';
    $datos['impuestos']['translados'][0]['TipoFactor'] = 'Tasa';
}

//$datos['impuestos']['TotalImpuestosRetenidos'] = $sumatoriaCfdiRIvaImporte;

// Se ejecuta el SDK
$res = mf_genera_cfdi($datos);
//header('Content-Type: application/json; charset=utf-8');
/*foreach ($res AS $variable => $valor) {
    $valor = htmlentities($valor);
    $valor = str_replace('&lt;br/&gt;', '<br/>', $valor);
    echo json_encode($valor);
    exit;
}*/

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
    include ("../../../front/xmlFacturaUno.php");
    exit;
}

