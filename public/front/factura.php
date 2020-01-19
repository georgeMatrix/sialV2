<?php
$xmlOriginal = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<cfdi:Comprobante xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:cfdi="http://www.sat.gob.mx/cfd/3" xsi:schemaLocation="http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv33.xsd " Version="3.3" CondicionesDePago="CONDICIONES" Fecha="2020-01-17T19:06:12" Folio="1018" FormaPago="01" LugarExpedicion="54880" MetodoPago="PPD" Moneda="MXN" Serie="A" SubTotal="690" TipoCambio="1" TipoDeComprobante="I" Total="800.4" Certificado="MIIFxTCCA62gAwIBAgIUMjAwMDEwMDAwMDAzMDAwMjI4MTUwDQYJKoZIhvcNAQELBQAwggFmMSAwHgYDVQQDDBdBLkMuIDIgZGUgcHJ1ZWJhcyg0MDk2KTEvMC0GA1UECgwmU2VydmljaW8gZGUgQWRtaW5pc3RyYWNpw7NuIFRyaWJ1dGFyaWExODA2BgNVBAsML0FkbWluaXN0cmFjacOzbiBkZSBTZWd1cmlkYWQgZGUgbGEgSW5mb3JtYWNpw7NuMSkwJwYJKoZIhvcNAQkBFhphc2lzbmV0QHBydWViYXMuc2F0LmdvYi5teDEmMCQGA1UECQwdQXYuIEhpZGFsZ28gNzcsIENvbC4gR3VlcnJlcm8xDjAMBgNVBBEMBTA2MzAwMQswCQYDVQQGEwJNWDEZMBcGA1UECAwQRGlzdHJpdG8gRmVkZXJhbDESMBAGA1UEBwwJQ295b2Fjw6FuMRUwEwYDVQQtEwxTQVQ5NzA3MDFOTjMxITAfBgkqhkiG9w0BCQIMElJlc3BvbnNhYmxlOiBBQ0RNQTAeFw0xNjEwMjUyMTUyMTFaFw0yMDEwMjUyMTUyMTFaMIGxMRowGAYDVQQDExFDSU5ERU1FWCBTQSBERSBDVjEaMBgGA1UEKRMRQ0lOREVNRVggU0EgREUgQ1YxGjAYBgNVBAoTEUNJTkRFTUVYIFNBIERFIENWMSUwIwYDVQQtExxMQU43MDA4MTczUjUgLyBGVUFCNzcwMTE3QlhBMR4wHAYDVQQFExUgLyBGVUFCNzcwMTE3TURGUk5OMDkxFDASBgNVBAsUC1BydWViYV9DRkRJMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAgvvCiCFDFVaYX7xdVRhp/38ULWto/LKDSZy1yrXKpaqFXqERJWF78YHKf3N5GBoXgzwFPuDX+5kvY5wtYNxx/Owu2shNZqFFh6EKsysQMeP5rz6kE1gFYenaPEUP9zj+h0bL3xR5aqoTsqGF24mKBLoiaK44pXBzGzgsxZishVJVM6XbzNJVonEUNbI25DhgWAd86f2aU3BmOH2K1RZx41dtTT56UsszJls4tPFODr/caWuZEuUvLp1M3nj7Dyu88mhD2f+1fA/g7kzcU/1tcpFXF/rIy93APvkU72jwvkrnprzs+SnG81+/F16ahuGsb2EZ88dKHwqxEkwzhMyTbQIDAQABox0wGzAMBgNVHRMBAf8EAjAAMAsGA1UdDwQEAwIGwDANBgkqhkiG9w0BAQsFAAOCAgEAJ/xkL8I+fpilZP+9aO8n93+20XxVomLJjeSL+Ng2ErL2GgatpLuN5JknFBkZAhxVIgMaTS23zzk1RLtRaYvH83lBH5E+M+kEjFGp14Fne1iV2Pm3vL4jeLmzHgY1Kf5HmeVrrp4PU7WQg16VpyHaJ/eonPNiEBUjcyQ1iFfkzJmnSJvDGtfQK2TiEolDJApYv0OWdm4is9Bsfi9j6lI9/T6MNZ+/LM2L/t72Vau4r7m94JDEzaO3A0wHAtQ97fjBfBiO5M8AEISAV7eZidIl3iaJJHkQbBYiiW2gikreUZKPUX0HmlnIqqQcBJhWKRu6Nqk6aZBTETLLpGrvF9OArV1JSsbdw/ZH+P88RAt5em5/gjwwtFlNHyiKG5w+UFpaZOK3gZP0su0sa6dlPeQ9EL4JlFkGqQCgSQ+NOsXqaOavgoP5VLykLwuGnwIUnuhBTVeDbzpgrg9LuF5dYp/zs+Y9ScJqe5VMAagLSYTShNtN8luV7LvxF9pgWwZdcM7lUwqJmUddCiZqdngg3vzTactMToG16gZA4CWnMgbU4E+r541+FNMpgAZNvs2CiW/eApfaaQojsZEAHDsDv4L5n3M1CC7fYjE/d61aSng1LaO6T1mh+dEfPvLzp7zyzz+UgWMhi5Cs4pcXx1eic5r7uxPoBwcCTt3YI1jKVVnV7/w=" NoCertificado="20001000000300022815" Sello="HlR/Z0O3OXG21pI7m8i9/+Jhr4lvb1buwSF08Dbmw8Do/NjVLXqXfKTOc5dnDXGtpsSmfmd2+A6Pv6GBPP0nGlYzv2ZAXAMhGYiiqoMJhko2+XU7NipjLPOOc0L5obzT68G9k63hmDRCJSUVa8rFn1J00DAmRJMNeU8s1Qbtg/QbUIWC9snV0DnkefYgGEwbJOoXeHwC5qb4zenORRPNricVl9rvxXrcNM/01r1Vu5xDnPof54C57wlM2/6DpMMVnmcbfUmtTLC3WO+PqfR6ex87LEyM5y22Q9OzXRX9Q/L4OgduAON8+NWaIr0qJ/T1xlfyGe2CZ6hFat91n+172g==">
  <cfdi:Emisor Rfc="LAN7008173R5" Nombre="ACCEM SERVICIOS EMPRESARIALES SC" RegimenFiscal="601"/>
  <cfdi:Receptor Rfc="XAXX010101000" Nombre="Publico en General" UsoCFDI="G01"/>
  <cfdi:Conceptos>
    <cfdi:Concepto Descripcion="BOB MORTON" Cantidad="1" Unidad="82" ValorUnitario="100" Importe="100" ClaveProdServ="78141501" ClaveUnidad="ACT">
      <cfdi:Impuestos>
        <cfdi:Traslados>
          <cfdi:Traslado Base="100" TipoFactor="Tasa" TasaOCuota="0.160000" Importe="16" Impuesto="002"/>
        </cfdi:Traslados>
      </cfdi:Impuestos>
    </cfdi:Concepto>
    <cfdi:Concepto Descripcion="ROBOCOP" Cantidad="1" Unidad="126" ValorUnitario="200" Importe="200" ClaveProdServ="01010101" ClaveUnidad="E48">
      <cfdi:Impuestos>
        <cfdi:Traslados>
          <cfdi:Traslado Base="200" TipoFactor="Tasa" TasaOCuota="0.160000" Importe="32" Impuesto="002"/>
        </cfdi:Traslados>
      </cfdi:Impuestos>
    </cfdi:Concepto>
    <cfdi:Concepto Descripcion="ED 209" Cantidad="1" Unidad="346" ValorUnitario="300" Importe="300" ClaveProdServ="01010101" ClaveUnidad="E49">
      <cfdi:Impuestos>
        <cfdi:Traslados>
          <cfdi:Traslado Base="300" TipoFactor="Tasa" TasaOCuota="0.160000" Importe="48" Impuesto="002"/>
        </cfdi:Traslados>
      </cfdi:Impuestos>
    </cfdi:Concepto>
    <cfdi:Concepto Descripcion="CLARENCE" Cantidad="1" Unidad="132" ValorUnitario="90" Importe="90" ClaveProdServ="01010101" ClaveUnidad="E50">
      <cfdi:Impuestos>
        <cfdi:Traslados>
          <cfdi:Traslado Base="90" TipoFactor="Tasa" TasaOCuota="0.160000" Importe="14.4" Impuesto="002"/>
        </cfdi:Traslados>
      </cfdi:Impuestos>
    </cfdi:Concepto>
  </cfdi:Conceptos>
  <cfdi:Impuestos TotalImpuestosTrasladados="110.4">
    <cfdi:Traslados>
      <cfdi:Traslado Impuesto="002" TasaOCuota="0.160000" Importe="110.4" TipoFactor="Tasa"/>
    </cfdi:Traslados>
  </cfdi:Impuestos>
  <cfdi:Complemento>
    <tfd:TimbreFiscalDigital xmlns:tfd="http://www.sat.gob.mx/TimbreFiscalDigital" xsi:schemaLocation="http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/cfd/TimbreFiscalDigital/TimbreFiscalDigitalv11.xsd" Version="1.1" UUID="23281e57-6f6a-4188-9515-e2f072f7a45c" FechaTimbrado="2020-01-17T19:08:12" RfcProvCertif="AAA010101AAA" SelloCFD="HlR/Z0O3OXG21pI7m8i9/+Jhr4lvb1buwSF08Dbmw8Do/NjVLXqXfKTOc5dnDXGtpsSmfmd2+A6Pv6GBPP0nGlYzv2ZAXAMhGYiiqoMJhko2+XU7NipjLPOOc0L5obzT68G9k63hmDRCJSUVa8rFn1J00DAmRJMNeU8s1Qbtg/QbUIWC9snV0DnkefYgGEwbJOoXeHwC5qb4zenORRPNricVl9rvxXrcNM/01r1Vu5xDnPof54C57wlM2/6DpMMVnmcbfUmtTLC3WO+PqfR6ex87LEyM5y22Q9OzXRX9Q/L4OgduAON8+NWaIr0qJ/T1xlfyGe2CZ6hFat91n+172g==" NoCertificadoSAT="20001000000300022323" SelloSAT="TeNBgjSRi+PujU+zCcEVIQCPJf60LjBn60utkHVcqCyuOD0zKmXtkiVw5v140r28xvjWTaRc8bzwPqwFdLwCZvwo4lGozZHR7z6pFE68cxo6EDF3Z2/XpALRMCtWCN8rIpvkjKIXvrFm6c4k3GVYUHFnx991Gjhgc7KB3JKS9y2R++VCg0NWf3orGpWVRge5ICC4DJDJrD/EqNC7Yvjgb0VapbDB7v2lPgrd1cK/JlTo0rIUM6oduP8AKov1wtRb29DWL4ROaO5JdLiKjElw8Aq6VpMkeESqBZN1wR87itq7YH3fGw9IFKg9VfjVmDVZunqrsgycrYzTuQ1lEZhNaw=="/>
  </cfdi:Complemento>
</cfdi:Comprobante>
XML;
?>