<?php
$xmlOriginal = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<cfdi:Comprobante xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:cfdi="http://www.sat.gob.mx/cfd/3" xsi:schemaLocation="http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv33.xsd " Version="3.3" CondicionesDePago="CONDICIONES" Fecha="2019-12-17T23:32:23" Folio="100" FormaPago="01" LugarExpedicion="45079" MetodoPago="PUE" Moneda="MXN" Serie="A" SubTotal="298" TipoCambio="1" TipoDeComprobante="E" Total="345.68" Certificado="MIIFxTCCA62gAwIBAgIUMjAwMDEwMDAwMDAzMDAwMjI4MTUwDQYJKoZIhvcNAQELBQAwggFmMSAwHgYDVQQDDBdBLkMuIDIgZGUgcHJ1ZWJhcyg0MDk2KTEvMC0GA1UECgwmU2VydmljaW8gZGUgQWRtaW5pc3RyYWNpw7NuIFRyaWJ1dGFyaWExODA2BgNVBAsML0FkbWluaXN0cmFjacOzbiBkZSBTZWd1cmlkYWQgZGUgbGEgSW5mb3JtYWNpw7NuMSkwJwYJKoZIhvcNAQkBFhphc2lzbmV0QHBydWViYXMuc2F0LmdvYi5teDEmMCQGA1UECQwdQXYuIEhpZGFsZ28gNzcsIENvbC4gR3VlcnJlcm8xDjAMBgNVBBEMBTA2MzAwMQswCQYDVQQGEwJNWDEZMBcGA1UECAwQRGlzdHJpdG8gRmVkZXJhbDESMBAGA1UEBwwJQ295b2Fjw6FuMRUwEwYDVQQtEwxTQVQ5NzA3MDFOTjMxITAfBgkqhkiG9w0BCQIMElJlc3BvbnNhYmxlOiBBQ0RNQTAeFw0xNjEwMjUyMTUyMTFaFw0yMDEwMjUyMTUyMTFaMIGxMRowGAYDVQQDExFDSU5ERU1FWCBTQSBERSBDVjEaMBgGA1UEKRMRQ0lOREVNRVggU0EgREUgQ1YxGjAYBgNVBAoTEUNJTkRFTUVYIFNBIERFIENWMSUwIwYDVQQtExxMQU43MDA4MTczUjUgLyBGVUFCNzcwMTE3QlhBMR4wHAYDVQQFExUgLyBGVUFCNzcwMTE3TURGUk5OMDkxFDASBgNVBAsUC1BydWViYV9DRkRJMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAgvvCiCFDFVaYX7xdVRhp/38ULWto/LKDSZy1yrXKpaqFXqERJWF78YHKf3N5GBoXgzwFPuDX+5kvY5wtYNxx/Owu2shNZqFFh6EKsysQMeP5rz6kE1gFYenaPEUP9zj+h0bL3xR5aqoTsqGF24mKBLoiaK44pXBzGzgsxZishVJVM6XbzNJVonEUNbI25DhgWAd86f2aU3BmOH2K1RZx41dtTT56UsszJls4tPFODr/caWuZEuUvLp1M3nj7Dyu88mhD2f+1fA/g7kzcU/1tcpFXF/rIy93APvkU72jwvkrnprzs+SnG81+/F16ahuGsb2EZ88dKHwqxEkwzhMyTbQIDAQABox0wGzAMBgNVHRMBAf8EAjAAMAsGA1UdDwQEAwIGwDANBgkqhkiG9w0BAQsFAAOCAgEAJ/xkL8I+fpilZP+9aO8n93+20XxVomLJjeSL+Ng2ErL2GgatpLuN5JknFBkZAhxVIgMaTS23zzk1RLtRaYvH83lBH5E+M+kEjFGp14Fne1iV2Pm3vL4jeLmzHgY1Kf5HmeVrrp4PU7WQg16VpyHaJ/eonPNiEBUjcyQ1iFfkzJmnSJvDGtfQK2TiEolDJApYv0OWdm4is9Bsfi9j6lI9/T6MNZ+/LM2L/t72Vau4r7m94JDEzaO3A0wHAtQ97fjBfBiO5M8AEISAV7eZidIl3iaJJHkQbBYiiW2gikreUZKPUX0HmlnIqqQcBJhWKRu6Nqk6aZBTETLLpGrvF9OArV1JSsbdw/ZH+P88RAt5em5/gjwwtFlNHyiKG5w+UFpaZOK3gZP0su0sa6dlPeQ9EL4JlFkGqQCgSQ+NOsXqaOavgoP5VLykLwuGnwIUnuhBTVeDbzpgrg9LuF5dYp/zs+Y9ScJqe5VMAagLSYTShNtN8luV7LvxF9pgWwZdcM7lUwqJmUddCiZqdngg3vzTactMToG16gZA4CWnMgbU4E+r541+FNMpgAZNvs2CiW/eApfaaQojsZEAHDsDv4L5n3M1CC7fYjE/d61aSng1LaO6T1mh+dEfPvLzp7zyzz+UgWMhi5Cs4pcXx1eic5r7uxPoBwcCTt3YI1jKVVnV7/w=" NoCertificado="20001000000300022815" Sello="GwBmBmWkp9NeuMjAam5B/tBxLEYfMwAqCp3IX+DPNn6lCUSrT5bQTvqLEfpMmjCWS8JTFeJKET39QwxHeNeSJHmfBWObvJk5PjhrAHXtbicR1Vkgu4X/8zdsmOmRGV0XgUKKokge9dBCsfXKzPhJOxLGUELEBxmeMIiFH8r5YyTVlZ0ZuLElEJJBQCxQjUOF9wMSoPNAgBUTbOMtFYHJlL4rluoykbl9KS1i3vljRe2TOq+lwAN1vmsAOS5fyyp6sIFBltUak+KrApduPCGz1fZq14TUIufPfblw3s5r5f+hyrfiCmOzxnJdpm22YhCx+vsG16PGYBnX1xmG4ok+uA==">
  <cfdi:Emisor Rfc="LAN7008173R5" Nombre="ACCEM SERVICIOS EMPRESARIALES SC" RegimenFiscal="601"/>
  <cfdi:Receptor Rfc="XAXX010101000" Nombre="Publico en General" UsoCFDI="G02"/>
  <cfdi:Conceptos>
    <cfdi:Concepto Descripcion="GALLETAS" Cantidad="1" Unidad="NA" NoIdentificacion="1726" ValorUnitario="99" Importe="99" ClaveProdServ="01010101" ClaveUnidad="ACT">
      <cfdi:Impuestos>
        <cfdi:Traslados>
          <cfdi:Traslado Base="99" Impuesto="002" TipoFactor="Tasa" TasaOCuota="0.160000" Importe="15.84"/>
        </cfdi:Traslados>
      </cfdi:Impuestos>
    </cfdi:Concepto>
    <cfdi:Concepto Descripcion="LECHE" Cantidad="1" Unidad="NA" NoIdentificacion="1586" ValorUnitario="199" Importe="199" ClaveProdServ="01010101" ClaveUnidad="ACT">
      <cfdi:Impuestos>
        <cfdi:Traslados>
          <cfdi:Traslado Base="199" Impuesto="002" TipoFactor="Tasa" TasaOCuota="0.160000" Importe="31.84"/>
        </cfdi:Traslados>
      </cfdi:Impuestos>
    </cfdi:Concepto>
  </cfdi:Conceptos>
  <cfdi:Impuestos TotalImpuestosTrasladados="47.68">
    <cfdi:Traslados>
      <cfdi:Traslado Impuesto="002" TasaOCuota="0.160000" Importe="47.68" TipoFactor="Tasa"/>
    </cfdi:Traslados>
  </cfdi:Impuestos>
  <cfdi:Complemento>
    <tfd:TimbreFiscalDigital xmlns:tfd="http://www.sat.gob.mx/TimbreFiscalDigital" xsi:schemaLocation="http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/cfd/TimbreFiscalDigital/TimbreFiscalDigitalv11.xsd" Version="1.1" UUID="37f542e9-c5a9-4a9e-be71-e68f27090372" FechaTimbrado="2019-12-17T23:34:08" RfcProvCertif="AAA010101AAA" SelloCFD="GwBmBmWkp9NeuMjAam5B/tBxLEYfMwAqCp3IX+DPNn6lCUSrT5bQTvqLEfpMmjCWS8JTFeJKET39QwxHeNeSJHmfBWObvJk5PjhrAHXtbicR1Vkgu4X/8zdsmOmRGV0XgUKKokge9dBCsfXKzPhJOxLGUELEBxmeMIiFH8r5YyTVlZ0ZuLElEJJBQCxQjUOF9wMSoPNAgBUTbOMtFYHJlL4rluoykbl9KS1i3vljRe2TOq+lwAN1vmsAOS5fyyp6sIFBltUak+KrApduPCGz1fZq14TUIufPfblw3s5r5f+hyrfiCmOzxnJdpm22YhCx+vsG16PGYBnX1xmG4ok+uA==" NoCertificadoSAT="20001000000300022323" SelloSAT="MWVO7iqR7uDnTqV1fJtMUue4U5P1pcx6WIFg7YBgBd20JgP8tRWM/6id8S59DU551HcCF6COByC8tsqmM9jvwUZx76wj9UQ5penU4uw08juPVeBpHuzpuNJgY1VEv6cclZ0UaGXr0dbcBtSv7TIB+gQEHznUItFeICGOOlLdTYt35pdRdVqxZ7L9wK+Y6dqMpaIQlsth8b/jBy2rf+9dHJu7KxNMxQ8r0OvmD8rr674iuQRTKiSPCJuvljei0vEp+eBVT0lyPV5UYPmpZudFc1o7aGTAoJ6K6T3lfIx1E/eAa3ufuX5owlWR/qrUrh7kY9bz44H/ebi+00wZM7Rs/w=="/>
  </cfdi:Complemento>
</cfdi:Comprobante>
XML;
?>