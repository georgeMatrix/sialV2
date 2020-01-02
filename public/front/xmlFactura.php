<?php
function xmlToArray(SimpleXMLElement $xml): array
{
    $parser = function (SimpleXMLElement $xml, array $collection = []) use (&$parser) {
        $nodes = $xml->children();
        $attributes = $xml->attributes();

        if (0 !== count($attributes)) {
            foreach ($attributes as $attrName => $attrValue) {
                $collection['attributes'][$attrName] = strval($attrValue);
            }
        }

        if (0 === $nodes->count()) {
            $collection['value'] = strval($xml);
            return $collection;
        }

        foreach ($nodes as $nodeName => $nodeValue) {
            if (count($nodeValue->xpath('../' . $nodeName)) < 2) {
                $collection[$nodeName] = $parser($nodeValue);
                continue;
            }

            $collection[$nodeName][] = $parser($nodeValue);
        }

        return $collection;
    };

    return [
        $xml->getName() => $parser($xml)
    ];
}
include ("xmlFactura.php");
$sXml = new SimpleXMLElement($xmlOriginal);
$ns = $sXml->getNamespaces(true);
$child = $sXml->children($ns['cfdi']);

$factura = array();
$factura[0] = padre($sXml);
//echo "<hr>";
$factura[1] = emisor($child);
//echo "<hr>";
$factura[2] = receptor($child);
//echo "<hr>";
$factura[3] = conceptos($child, $ns);
//echo "<hr>";
$factura[4] = impuestos($child, $ns);
//echo "<hr>";
$factura[5] = complemento($child, $ns);

function padre($stringXML){
    $padre = xmlToArray($stringXML); //Mediante este metodo podemos acceder al padre
    foreach ($padre as $nombre=>$valor)
    {
        //var_dump($valor["attributes"]["Version"]); //Asi podemos meternos a cada uno de los atributos del nodo
        //var_dump($valor["attributes"]);
        return $valor["attributes"];
    }
}

function emisor($nodoHijo){
    $emisor = $nodoHijo[0];
    $emisorRes = xmlToArray($emisor); //Mediante este metodo podemos acceder al los hijos
    foreach ($emisorRes as $nombre=>$valor)
    {
        //var_dump($valor["attributes"]);
        return $valor["attributes"];
    }
}

function receptor($nodoHijo){
    $receptor = $nodoHijo[1];
    $receptorRes = xmlToArray($receptor);
    foreach ($receptorRes as $nombre=>$valor)
    {
        //var_dump($valor["attributes"]);
        return $valor["attributes"];
    }
}

function conceptos($nodoHijo, $nameSpace){
    $trasladoRes = array();
    $conceptosRes = array();

    $resultadoConceptos = array();
    $resultadoTraslados = array();
    $resultado = array();
    $conceptos = $nodoHijo[2]->children($nameSpace['cfdi']);
    $noConceptos = count($conceptos);
    //Verifica cuantos conceptos existen
    for ($i=0; $i<$noConceptos; $i++){
        $impuestos[$i] = $conceptos[$i]->children($nameSpace['cfdi']);
        $traslados[$i] = $impuestos[$i]->children($nameSpace['cfdi']);
        $traslado[$i] = $traslados[$i]->children($nameSpace['cfdi']);

        $conceptosRes[$i] = xmlToArray($conceptos[$i]);
        $trasladoRes[$i] = xmlToArray($traslado[$i]);
    }

    for ($j=0; $j<$noConceptos; $j++){
        foreach ($conceptosRes[$j] as $key=>$valor)
        {
            //var_dump($valor["attributes"]);
            $resultadoConceptos[$key] = $valor["attributes"];
        }

        //echo "<hr>";
        foreach ($trasladoRes[$j] as $key=>$valor)
        {
            //var_dump($valor["attributes"]);
            $resultadoTraslados[$key] = $valor["attributes"];
        }
        //echo "<hr>";
        $resultado[$j] =  $resultadoConceptos;
        $resultado[$j+$noConceptos] = $resultadoTraslados;
    }

    return $resultado;
}

function impuestos($nodoHijo, $nameSpace){
    $trasladoRes = array();

    $impuestos = $nodoHijo[3]->children($nameSpace['cfdi']);
    $noConceptos = count($impuestos);
    //Verifica cuantos conceptos existen
    for ($i=0; $i<$noConceptos; $i++){
        $traslados[$i] = $impuestos[$i]->children($nameSpace['cfdi']);
        $trasladoRes[$i] = xmlToArray($traslados[$i]);
    }
    for ($j=0; $j<$noConceptos; $j++){
        foreach ($trasladoRes[$j] as $key=>$valor)
        {
            //var_dump($valor["attributes"]);
            return $valor["attributes"];
        }
    }
}

function complemento($nodoHijo, $nameSpace){
    $timbreFiscal = $nodoHijo[4]->children($nameSpace['tfd']);
    $conceptosRes = xmlToArray($timbreFiscal);
    foreach ($conceptosRes as $k=>$v){
        //var_dump($v["attributes"]);
        return $v["attributes"];
    }
}

echo json_encode($factura);
?>