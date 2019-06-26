<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach($cartaPorte as $cP)
                <h5 class="text-danger">lugar_exp: </h5>{{$cP->rutaCartaP->lugar_exp}}
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
                <h5 class="text-danger">carta porte:remolque placas</h5>{{$cP->remolquesF->placas}}
            @endforeach
        </div>
    </div>
</div>
</body>
</html>