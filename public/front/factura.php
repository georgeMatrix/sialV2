<?php
$xmlOriginal = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<cfdi:Comprobante xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:cfdi="http://www.sat.gob.mx/cfd/3" xsi:schemaLocation="http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv33.xsd " Version="3.3" CondicionesDePago="CONDICIONES" Fecha="2020-01-23T21:16:28" Folio="127" FormaPago="01" LugarExpedicion="54880" MetodoPago="PPD" Moneda="MXN" Serie="A" SubTotal="25000" TipoCambio="1" TipoDeComprobante="I" Total="27800" Certificado="MIIFxTCCA62gAwIBAgIUMjAwMDEwMDAwMDAzMDAwMjI4MTUwDQYJKoZIhvcNAQELBQAwggFmMSAwHgYDVQQDDBdBLkMuIDIgZGUgcHJ1ZWJhcyg0MDk2KTEvMC0GA1UECgwmU2VydmljaW8gZGUgQWRtaW5pc3RyYWNpw7NuIFRyaWJ1dGFyaWExODA2BgNVBAsML0FkbWluaXN0cmFjacOzbiBkZSBTZWd1cmlkYWQgZGUgbGEgSW5mb3JtYWNpw7NuMSkwJwYJKoZIhvcNAQkBFhphc2lzbmV0QHBydWViYXMuc2F0LmdvYi5teDEmMCQGA1UECQwdQXYuIEhpZGFsZ28gNzcsIENvbC4gR3VlcnJlcm8xDjAMBgNVBBEMBTA2MzAwMQswCQYDVQQGEwJNWDEZMBcGA1UECAwQRGlzdHJpdG8gRmVkZXJhbDESMBAGA1UEBwwJQ295b2Fjw6FuMRUwEwYDVQQtEwxTQVQ5NzA3MDFOTjMxITAfBgkqhkiG9w0BCQIMElJlc3BvbnNhYmxlOiBBQ0RNQTAeFw0xNjEwMjUyMTUyMTFaFw0yMDEwMjUyMTUyMTFaMIGxMRowGAYDVQQDExFDSU5ERU1FWCBTQSBERSBDVjEaMBgGA1UEKRMRQ0lOREVNRVggU0EgREUgQ1YxGjAYBgNVBAoTEUNJTkRFTUVYIFNBIERFIENWMSUwIwYDVQQtExxMQU43MDA4MTczUjUgLyBGVUFCNzcwMTE3QlhBMR4wHAYDVQQFExUgLyBGVUFCNzcwMTE3TURGUk5OMDkxFDASBgNVBAsUC1BydWViYV9DRkRJMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAgvvCiCFDFVaYX7xdVRhp/38ULWto/LKDSZy1yrXKpaqFXqERJWF78YHKf3N5GBoXgzwFPuDX+5kvY5wtYNxx/Owu2shNZqFFh6EKsysQMeP5rz6kE1gFYenaPEUP9zj+h0bL3xR5aqoTsqGF24mKBLoiaK44pXBzGzgsxZishVJVM6XbzNJVonEUNbI25DhgWAd86f2aU3BmOH2K1RZx41dtTT56UsszJls4tPFODr/caWuZEuUvLp1M3nj7Dyu88mhD2f+1fA/g7kzcU/1tcpFXF/rIy93APvkU72jwvkrnprzs+SnG81+/F16ahuGsb2EZ88dKHwqxEkwzhMyTbQIDAQABox0wGzAMBgNVHRMBAf8EAjAAMAsGA1UdDwQEAwIGwDANBgkqhkiG9w0BAQsFAAOCAgEAJ/xkL8I+fpilZP+9aO8n93+20XxVomLJjeSL+Ng2ErL2GgatpLuN5JknFBkZAhxVIgMaTS23zzk1RLtRaYvH83lBH5E+M+kEjFGp14Fne1iV2Pm3vL4jeLmzHgY1Kf5HmeVrrp4PU7WQg16VpyHaJ/eonPNiEBUjcyQ1iFfkzJmnSJvDGtfQK2TiEolDJApYv0OWdm4is9Bsfi9j6lI9/T6MNZ+/LM2L/t72Vau4r7m94JDEzaO3A0wHAtQ97fjBfBiO5M8AEISAV7eZidIl3iaJJHkQbBYiiW2gikreUZKPUX0HmlnIqqQcBJhWKRu6Nqk6aZBTETLLpGrvF9OArV1JSsbdw/ZH+P88RAt5em5/gjwwtFlNHyiKG5w+UFpaZOK3gZP0su0sa6dlPeQ9EL4JlFkGqQCgSQ+NOsXqaOavgoP5VLykLwuGnwIUnuhBTVeDbzpgrg9LuF5dYp/zs+Y9ScJqe5VMAagLSYTShNtN8luV7LvxF9pgWwZdcM7lUwqJmUddCiZqdngg3vzTactMToG16gZA4CWnMgbU4E+r541+FNMpgAZNvs2CiW/eApfaaQojsZEAHDsDv4L5n3M1CC7fYjE/d61aSng1LaO6T1mh+dEfPvLzp7zyzz+UgWMhi5Cs4pcXx1eic5r7uxPoBwcCTt3YI1jKVVnV7/w=" NoCertificado="20001000000300022815" Sello="NvAkr1zzX5lN0EbmAC9a/dTDKVf3pBmQGm5BnNFcXJ1JJ7N+LXFrCbkxoBlHD1nJ0q+RjZaZx+kgU7yFrbXKQU+wpNEedgCEXNv9fTRSYXEUchnxe2NM/UyzC354k5Ljtw61l+0XjUMFlXlpQjZH28zodO0EKaGGTngW0VHS/DRIay0eZA8S1+h1BsDptUTQherOos/s9PnSFGHT6sZQECX0/1WMfAhtXQKdbRQoZWv85rLsbzHzzZopaMdq5dQ7w7o4we1srvxZnOEpNAHJuC7LRH1IarP7n3cg75xjf8WTkBRBcG5NkuVxWzRQDGhQcAFQhgPNrS+/8AiXXZ1V6Q==">
  <cfdi:Emisor Rfc="LAN7008173R5" Nombre="ACCEM SERVICIOS EMPRESARIALES SC" RegimenFiscal="601"/>
  <cfdi:Receptor Rfc="XAXX010101000" Nombre="Publico en General" UsoCFDI="G01"/>
  <cfdi:Conceptos>
    <cfdi:Concepto Descripcion="FLETE NACIONAL CON IVA" Cantidad="1" Unidad="1" ValorUnitario="10000" Importe="10000" ClaveProdServ="78141501" ClaveUnidad="E48">
      <cfdi:Impuestos>
        <cfdi:Traslados>
          <cfdi:Traslado Base="10000" TipoFactor="Tasa" TasaOCuota="0.160000" Importe="1600" Impuesto="002"/>
        </cfdi:Traslados>
      </cfdi:Impuestos>
    </cfdi:Concepto>
    <cfdi:Concepto Descripcion="FLETE CON IVA RETENCION" Cantidad="1" Unidad="1" ValorUnitario="10000" Importe="10000" ClaveProdServ="78141501" ClaveUnidad="E48">
      <cfdi:Impuestos>
        <cfdi:Traslados>
          <cfdi:Traslado Base="10000" TipoFactor="Tasa" TasaOCuota="0.160000" Importe="1600" Impuesto="002"/>
        </cfdi:Traslados>
        <cfdi:Retenciones>
          <cfdi:Retencion Importe="400" Base="10000" TasaOCuota="0.040000" TipoFactor="Tasa" Impuesto="002"/>
        </cfdi:Retenciones>
      </cfdi:Impuestos>
    </cfdi:Concepto>
    <cfdi:Concepto Descripcion="FLETE PRUEBA SIN IMPUESTOS" Cantidad="1" Unidad="4" ValorUnitario="5000" Importe="5000" ClaveProdServ="78141501" ClaveUnidad="E48"/>
  </cfdi:Conceptos>
  <cfdi:Impuestos TotalImpuestosTrasladados="3200" TotalImpuestosRetenidos="400">
    <cfdi:Retenciones>
      <cfdi:Retencion Impuesto="002" Importe="400"/>
    </cfdi:Retenciones>
    <cfdi:Traslados>
      <cfdi:Traslado Impuesto="002" TasaOCuota="0.160000" Importe="3200" TipoFactor="Tasa"/>
    </cfdi:Traslados>
  </cfdi:Impuestos>
  <cfdi:Complemento>
    <tfd:TimbreFiscalDigital xmlns:tfd="http://www.sat.gob.mx/TimbreFiscalDigital" xsi:schemaLocation="http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/cfd/TimbreFiscalDigital/TimbreFiscalDigitalv11.xsd" Version="1.1" UUID="f99291c6-f688-4453-b7f9-647d1f0d100f" FechaTimbrado="2020-01-23T21:18:31" RfcProvCertif="AAA010101AAA" SelloCFD="NvAkr1zzX5lN0EbmAC9a/dTDKVf3pBmQGm5BnNFcXJ1JJ7N+LXFrCbkxoBlHD1nJ0q+RjZaZx+kgU7yFrbXKQU+wpNEedgCEXNv9fTRSYXEUchnxe2NM/UyzC354k5Ljtw61l+0XjUMFlXlpQjZH28zodO0EKaGGTngW0VHS/DRIay0eZA8S1+h1BsDptUTQherOos/s9PnSFGHT6sZQECX0/1WMfAhtXQKdbRQoZWv85rLsbzHzzZopaMdq5dQ7w7o4we1srvxZnOEpNAHJuC7LRH1IarP7n3cg75xjf8WTkBRBcG5NkuVxWzRQDGhQcAFQhgPNrS+/8AiXXZ1V6Q==" NoCertificadoSAT="20001000000300022323" SelloSAT="qVXOyAEfMj1MuBw0BLMfGYCNJ9b7q+yPoPqEVD8quaVGBz3LiO7BgJYBsdChYJ3F51JzmRXCQ5AAL/kwzW0IQuiF8PM4s5kdOPafzdTcgryZnQ+CftvQjxnHoI0DkStjPiQPwZkF3v/CH71ZW6OPU0FH3FycgkYVEqZFiSMtYim7+h6L0n+ANniBk8H1i6scwv3AdVYq5yVRqe/iwRNI4rni6BZNcDB+GFe/AIas7u2JYcMaiNoAq1sAOZK6W1TOPwPXwb0fCL7WJwacj1UNu2+7qvCtIYeAlcfGISWTHhzTKt05oTKXVR22ASLdi3kiNbw4/SEWZL9TO/mW6HXLlA=="/>
  </cfdi:Complemento>
</cfdi:Comprobante>
XML;
?>