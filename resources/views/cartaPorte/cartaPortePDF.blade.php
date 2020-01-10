<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <!--<link rel="stylesheet" href="F:\LARAVEL\SIAL V2\sail\public\css\bootstrap\dist\css\bootstrap.min.css">-->
</head>
<body>
    @foreach($cartaPorte as $cP)

            <div style="float: left; ">
                <p style="font-size: 9px">RUMANIA #1113 INT 2 <br>COL. PORTALES <br>DEL. BENITO JUAREZ <br> CIUDAD DE MEXICO C.P. 03300
                    <br> Tel. (55) 6390-2828 Y 6390-2888 <br> R.F.C. TLO-0905053P2</p>
            </div>
            <div style="float: left; padding-left: 150px; ">
                <!--<img style="width: 120px" src="{{asset('img/logo.png')}}" alt="">-->
                <img style="width: 120px" src="F:\LARAVEL/SIAL V2/sail/resources/views/cartaPorte/logo.png" alt="">
            </div>
            <div style="float: left; padding-left: 200px;">
                <p style="font-size: 9px">Carta Porte</p>
                <p style="font-size: 9px">No.{{$letra}} {{$tipo->id}}</p>
            </div>

        <div style="position: absolute; width: 720px; height: 32px; top: 90px; border: 1px solid #000000; padding-bottom: 5px; padding-right: 5px">
            <table>
                <tr>
                    <td style="border: 1px solid #000000; width: 298px;"><p style="font-size: 9px; width: 400px; text-align: center;">LUGAR Y FECHA DE EXPEDICION: {{$cP->rutaCartaP->lugar_exp}} a {{$fecha}}</p></td>
                    <td style="border: 1px solid #000000; width: 298px;"><p style="font-size: 9px; width: 310px; text-align: center;">ESTA REMISION AMPARA LAS FACTURAS: {{$cP->referencia}}</p></td>
                </tr>
            </table>
        </div>

        <div style="position: absolute; width: 720px; height: 50px; top: 130px; border: 1px solid #000000; padding-bottom: 5px; padding-right: 5px">
            <p style="position: absolute; font-size: 9px; left: 20px;">REMITENTE: {{$cP->rutaCartaP->remitente}}</p>
            <p style="position: absolute; font-size: 9px; left: 387px;">DESTINATARIO: {{$cP->rutaCartaP->destinatario}}</p>
            <p style="position: absolute; top: 15px; font-size: 9px; padding-left: 20px; text-align: right;">ORIGEN: ________</p>
            <p style="position: absolute; font-size: 9px; text-align: right; top: 15px; left: 387px;">DESTINO: {{$cP->rutaCartaP->dom_destinatario}}</p>
            <p style="position: absolute; font-size: 9px; top: 40px; top: 30px; left:20px">FECHA/HORA DE EMBARQUE:_________________</p>
            <p style="position: absolute; font-size: 9px; top: 40px; top: 30px; right: 170px">FECHA DE ENTREGA: {{$cP->fechaDeEntrega}}</p>
        </div>

            <div style="position: absolute; width: 720px; height: 135px; top: 190px; border: 1px solid #000000; padding-bottom: 5px; padding-right: 5px">
                <table>
                    <tr style="border: 1px solid #000000;">
                        <td height="10px" style="width: 298px; border: 1px solid #000000;"><p style="font-size: 9px">VALOR UNITARIO CUAOTA CONVENIDA</p></td>
                        <td style="width: 230px; border: 1px solid #000000;"><p style="font-size: 9px">VALOR DECLARADO</p></td>
                        <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">CONCEPTO</p></td>
                        <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">IMPORTE</p></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000000;"><p style="font-size: 9px"></p>.</td>
                        <td style="border: 1px solid #000000;"><p style="font-size: 9px"></p>.</td>
                        <td style="border: 1px solid #000000;"><p style="font-size: 9px">FLETE</p></td>
                        <td style="border: 1px solid #000000;"><p style="font-size: 9px">{{$cP->rutaCartaP->importe}}</p></td>
                    </tr>
                    <tr style="border: 1px solid #000000;">
                        <td style="border: 1px solid #000000;"><p style="font-size: 9px">POR TONELADA O CARGA FRACCIONADA</p></td>
                        <td style="border: 1px solid #000000;"><p style="font-size: 9px">.</p></td>
                        <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">REPARTO</p></td>
                        <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px"></p></td>
                    </tr>
                    <tr style="border: 1px solid #000000;">
                        <td style="border: 1px solid #000000;"><p style="font-size: 9px">.</p></td>
                        <td style="border: 1px solid #000000;"><p style="font-size: 9px">.</p></td>
                        <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">MANIOBRAS</p></td>
                        <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px"></p></td>
                    </tr>
                </table>
            </div>


            <div style="position: absolute; width: 720px; height: 345px; top: 335px; border: 1px solid #000000; padding-bottom: 5px; padding-right: 5px">
            <table border>
                <tr>
                    <td colspan="3" style="border: 1px solid #000000; width: 298px;"><p style="font-size: 9px; text-align: center">BULTOS</p></td>
                    <td rowspan="2" style="width: 230px; border: 1px solid #000000;"><p style="font-size: 9px">QUE EL REMITENTE DICE QUE CONTIENEN</p></td>
                    <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">AUTOPISTA</p></td>
                    <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px"></p></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000000;"><p style="font-size: 9px; text-align: center">CANTIDAD</p></td>
                    <td style="border: 1px solid #000000;"><p style="font-size: 9px; text-align: center">EMBALAJE</p></td>
                    <td style="border: 1px solid #000000;"><p style="font-size: 9px; text-align: center">PESO</p></td>
                    <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">DOBLE OPER</p></td>
                    <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px"></p></td>
                </tr>
                <tr>
                    <td rowspan="8" style="border: 1px solid #000000;"><p style="font-size: 9px; text-align: center">{{$cP->rutaCartaP->cantidad}}</p></td>
                    <td rowspan="8" style="border: 1px solid #000000;"><p style="font-size: 9px; text-align: center">{{$cP->rutaCartaP->embalaje}}</p></td>
                    <td rowspan="8" style="border: 1px solid #000000;"><p style="font-size: 9px; text-align: center"></p></td>
                    <td rowspan="8" style="border: 1px solid #000000;"><p style="font-size: 9px; text-align: center">{{$cP->rutaCartaP->concepto}}</p></td>
                    <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">CRUCE</p></td>
                    <td style="width: 85px; border: 1px solid #000000;"></td>
                </tr>
                <tr>
                    <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">DEMORAS</p></td>
                    <td style="width: 85px; border: 1px solid #000000;"></td>
                </tr>
                <tr>
                    <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">OTROS</p></td>
                    <td style="width: 85px; border: 1px solid #000000;"></td>
                </tr>
                <tr>
                    <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">SUB-TOTAL</p></td>
                    <td style="width: 85px; border: 1px solid #000000;"></td>
                </tr>
                <tr>
                    <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">IVA</p></td>
                    <td style="width: 85px; border: 1px solid #000000;"></td>
                </tr>
                <tr>
                    <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">SUB-TOTAL</p></td>
                    <td style="width: 85px; border: 1px solid #000000;"></td>
                </tr>
                <tr>
                    <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">RET. IVA</p></td>
                    <td style="width: 85px; border: 1px solid #000000;"></td>
                </tr>
                <tr>
                    <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">TOTAL</p></td>
                    <td style="width: 85px; border: 1px solid #000000;"></td>
                </tr>
            </table>
            </div>

            <div style="position: absolute; width: 720px; height: 100px; top: 690px; border: 1px solid #000000; padding-bottom: 5px; padding-right: 5px">
                <table border >
                    <tr>
                        <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">EMBARCO:</p></td>
                        <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">{{$cP->unidadesF->provedores->nombre}}</p></td>
                        <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">NOMBRE OPERADOR</p></td>
                        <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">{{$cP->operadorF->nombre_corto}}</p></td>
                        <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">SELLOS</p></td>
                        <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px"></p></td>
                        <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px"></p></td>
                    </tr>
                    <tr>
                        <td rowspan="2" style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">TRACTO:</p></td>
                        <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">ECO</p></td>
                        <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">PLACAS</p></td>
                        <td rowspan="2" style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">CAJA</p></td>
                        <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">ECO</p></td>
                        <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">PLACAS</p></td>
                    </tr>
                    <tr>
                        <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">{{$cP->unidadesF->economico}}</p></td>
                        <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">{{$cP->unidadesF->placas}}</p></td>
                        <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">{{$cP->remolquesF->economico}}</p></td>
                        <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">{{$cP->remolquesF->placas}}</p></td>
                    </tr>
                </table>
            </div>

            <div style="position: absolute; width: 100px; height: 80px; top: 820px; padding-bottom: 5px; padding-right: 10px">
            <!--<img style="width: 100px" src="{{asset('img/rfc.png')}}" alt="">--> <!-- PARA SERVIDOR -->
                <img style="width: 100px" src="F:\LARAVEL/SIAL V2/sail/resources/views/cartaPorte/rfc.png" alt="">
            </div>

            <!--  <div style="position: absolute; width: 100px; height: 80px; top: 910px; border: 1px solid #000000; padding-left: 500px;">-->
                <div style="width: 100px; height: 90px; position: absolute; left: 115px; top: 820px;">
                    <table>
                        <tr>
                            <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 9px">OBSERVACIONES</p></td>
                            <td style="width: 85px; border: 1px solid #000000;"><p style="font-size: 7px">RECIBI DE CONFORMIDAD FIRMA DEL DESTINATARIO</p></td>
                        </tr>
                        <tr>
                            <td style="width: 85px; border: 1px solid #000000; height: 100px; width: 300px"><p style="font-size: 9px">.</p></td>
                            <td style="width: 85px; border: 1px solid #000000; height: 100px; width: 300px"><p style="font-size: 9px">.</p></td>
                        </tr>
                    </table>
            </div>

       <!-- <h5 class="text-danger">lugar_exp: </h5>{{$cP->rutaCartaP->lugar_exp}}
        <h5 class="text-danger">referencia: </h5>{{$cP->referencia}}
        <h5 class="text-danger">remitente: </h5>{{$cP->rutaCartaP->remitente}}
        <h5 class="text-danger">destinatario: </h5>{{$cP->rutaCartaP->destinatario}}
        <h5 class="text-danger">dom_destinatario: </h5>{{$cP->rutaCartaP->dom_destinatario}}
        <h5 class="text-danger">fecha de entrega: </h5>{{$cP->fechaDeEntrega}}
        <h5 class="text-danger">fecha de entrega: </h5>{{$cP->fechaDeEntrega}}
        <h5 class="text-danger">importe: </h5>{{$cP->rutaCartaP->importe}}
        <h5 class="text-danger">cantidad: </h5>{{$cP->rutaCartaP->cantidad}}
        <h5 class="text-danger">embalaje: </h5>{{$cP->rutaCartaP->embalaje}}
        <h5 class="text-danger">concepto: </h5>{{$cP->rutaCartaP->concepto}}
        <h5 class="text-danger">unidades: provedor: nombre </h5>{{$cP->unidadesF->provedores->nombre}}
        <h5 class="text-danger">carta porte:operador </h5>{{$cP->operadorF->nombre_corto}}
        <h5 class="text-danger">carta porte:unidad consulta</h5>{{$cP->unidadesF->economico}}
        <h5 class="text-danger">carta porte:unidad unidades placas</h5>{{$cP->unidadesF->placas}}

        <h5 class="text-danger">carta porte:unidad economico</h5>{{$cP->remolquesF->economico}}
        <h5 class="text-danger">carta porte:remolque placas</h5>{{$cP->remolquesF->placas}}-->
    @endforeach
</body>
</html>