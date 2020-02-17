<?php
$xmlOriginal = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<cfdi:Comprobante xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:cfdi="http://www.sat.gob.mx/cfd/3" xsi:schemaLocation="http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv33.xsd " Version="3.3" CondicionesDePago="654654" Fecha="2020-02-06T15:35:40" Folio="23" FormaPago="99" LugarExpedicion="54880" MetodoPago="PPD" Moneda="MXN" Serie="A" SubTotal="10000" TipoCambio="01" TipoDeComprobante="I" Total="11200" Certificado="MIIFxTCCA62gAwIBAgIUMjAwMDEwMDAwMDAzMDAwMjI4MTUwDQYJKoZIhvcNAQELBQAwggFmMSAwHgYDVQQDDBdBLkMuIDIgZGUgcHJ1ZWJhcyg0MDk2KTEvMC0GA1UECgwmU2VydmljaW8gZGUgQWRtaW5pc3RyYWNpw7NuIFRyaWJ1dGFyaWExODA2BgNVBAsML0FkbWluaXN0cmFjacOzbiBkZSBTZWd1cmlkYWQgZGUgbGEgSW5mb3JtYWNpw7NuMSkwJwYJKoZIhvcNAQkBFhphc2lzbmV0QHBydWViYXMuc2F0LmdvYi5teDEmMCQGA1UECQwdQXYuIEhpZGFsZ28gNzcsIENvbC4gR3VlcnJlcm8xDjAMBgNVBBEMBTA2MzAwMQswCQYDVQQGEwJNWDEZMBcGA1UECAwQRGlzdHJpdG8gRmVkZXJhbDESMBAGA1UEBwwJQ295b2Fjw6FuMRUwEwYDVQQtEwxTQVQ5NzA3MDFOTjMxITAfBgkqhkiG9w0BCQIMElJlc3BvbnNhYmxlOiBBQ0RNQTAeFw0xNjEwMjUyMTUyMTFaFw0yMDEwMjUyMTUyMTFaMIGxMRowGAYDVQQDExFDSU5ERU1FWCBTQSBERSBDVjEaMBgGA1UEKRMRQ0lOREVNRVggU0EgREUgQ1YxGjAYBgNVBAoTEUNJTkRFTUVYIFNBIERFIENWMSUwIwYDVQQtExxMQU43MDA4MTczUjUgLyBGVUFCNzcwMTE3QlhBMR4wHAYDVQQFExUgLyBGVUFCNzcwMTE3TURGUk5OMDkxFDASBgNVBAsUC1BydWViYV9DRkRJMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAgvvCiCFDFVaYX7xdVRhp/38ULWto/LKDSZy1yrXKpaqFXqERJWF78YHKf3N5GBoXgzwFPuDX+5kvY5wtYNxx/Owu2shNZqFFh6EKsysQMeP5rz6kE1gFYenaPEUP9zj+h0bL3xR5aqoTsqGF24mKBLoiaK44pXBzGzgsxZishVJVM6XbzNJVonEUNbI25DhgWAd86f2aU3BmOH2K1RZx41dtTT56UsszJls4tPFODr/caWuZEuUvLp1M3nj7Dyu88mhD2f+1fA/g7kzcU/1tcpFXF/rIy93APvkU72jwvkrnprzs+SnG81+/F16ahuGsb2EZ88dKHwqxEkwzhMyTbQIDAQABox0wGzAMBgNVHRMBAf8EAjAAMAsGA1UdDwQEAwIGwDANBgkqhkiG9w0BAQsFAAOCAgEAJ/xkL8I+fpilZP+9aO8n93+20XxVomLJjeSL+Ng2ErL2GgatpLuN5JknFBkZAhxVIgMaTS23zzk1RLtRaYvH83lBH5E+M+kEjFGp14Fne1iV2Pm3vL4jeLmzHgY1Kf5HmeVrrp4PU7WQg16VpyHaJ/eonPNiEBUjcyQ1iFfkzJmnSJvDGtfQK2TiEolDJApYv0OWdm4is9Bsfi9j6lI9/T6MNZ+/LM2L/t72Vau4r7m94JDEzaO3A0wHAtQ97fjBfBiO5M8AEISAV7eZidIl3iaJJHkQbBYiiW2gikreUZKPUX0HmlnIqqQcBJhWKRu6Nqk6aZBTETLLpGrvF9OArV1JSsbdw/ZH+P88RAt5em5/gjwwtFlNHyiKG5w+UFpaZOK3gZP0su0sa6dlPeQ9EL4JlFkGqQCgSQ+NOsXqaOavgoP5VLykLwuGnwIUnuhBTVeDbzpgrg9LuF5dYp/zs+Y9ScJqe5VMAagLSYTShNtN8luV7LvxF9pgWwZdcM7lUwqJmUddCiZqdngg3vzTactMToG16gZA4CWnMgbU4E+r541+FNMpgAZNvs2CiW/eApfaaQojsZEAHDsDv4L5n3M1CC7fYjE/d61aSng1LaO6T1mh+dEfPvLzp7zyzz+UgWMhi5Cs4pcXx1eic5r7uxPoBwcCTt3YI1jKVVnV7/w=" NoCertificado="20001000000300022815" Sello="O0oU+2qx3UricCG+32enXMjAvMkAXdzKEAF/MwJklWuznZb8RdVwvRNa1CrWLd5Dfo1x4JqBGOQNZSz7KnNPK11CC6pdzF+9c33z3qf2gKSV0vHrQbiQpgW+P3q2dtGoQVaJgL4aWkoBYCobMED9ovBKtfcjELSBDF2haCDGc/DW+U0O4ZDKi7LkUfwXSjVN/7aDtS5ZxMEQo24X9/IxSClV5nKQxdRJm7QTHsLKze7s0xHs3crh4IVEQwtCxgXduFRV1B6FjZzbT4ev8QGDYIGfvAL1XJS3i+3tJsUbX9hlqQ0uKcWHlEJvW3a6KhDcFgaovrB72O/0oOXMepX7Vw==">
  <cfdi:Emisor Rfc="LAN7008173R5" Nombre="ACCEM SERVICIOS EMPRESARIALES SC" RegimenFiscal="601"/>
  <cfdi:Receptor Rfc="XAXX010101000" Nombre="Publico en General" UsoCFDI="G03"/>
  <cfdi:Conceptos>
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
  </cfdi:Conceptos>
  <cfdi:Impuestos TotalImpuestosTrasladados="1600" TotalImpuestosRetenidos="400">
    <cfdi:Retenciones>
      <cfdi:Retencion Impuesto="002" Importe="400"/>
    </cfdi:Retenciones>
    <cfdi:Traslados>
      <cfdi:Traslado Impuesto="002" TasaOCuota="0.160000" Importe="1600" TipoFactor="Tasa"/>
    </cfdi:Traslados>
  </cfdi:Impuestos>
  <cfdi:Complemento>
    <tfd:TimbreFiscalDigital xmlns:tfd="http://www.sat.gob.mx/TimbreFiscalDigital" xsi:schemaLocation="http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/cfd/TimbreFiscalDigital/TimbreFiscalDigitalv11.xsd" Version="1.1" UUID="760af495-2b05-45eb-bc56-ac368a19ed90" FechaTimbrado="2020-02-06T15:37:34" RfcProvCertif="AAA010101AAA" SelloCFD="O0oU+2qx3UricCG+32enXMjAvMkAXdzKEAF/MwJklWuznZb8RdVwvRNa1CrWLd5Dfo1x4JqBGOQNZSz7KnNPK11CC6pdzF+9c33z3qf2gKSV0vHrQbiQpgW+P3q2dtGoQVaJgL4aWkoBYCobMED9ovBKtfcjELSBDF2haCDGc/DW+U0O4ZDKi7LkUfwXSjVN/7aDtS5ZxMEQo24X9/IxSClV5nKQxdRJm7QTHsLKze7s0xHs3crh4IVEQwtCxgXduFRV1B6FjZzbT4ev8QGDYIGfvAL1XJS3i+3tJsUbX9hlqQ0uKcWHlEJvW3a6KhDcFgaovrB72O/0oOXMepX7Vw==" NoCertificadoSAT="20001000000300022323" SelloSAT="X9FwYh29AeGEvKtkcNVSffAEFI0X3B4NTMNyJotz/feWmRp3xrvObZzi3x5sUhbB/q9TQaKWMz8PKRg8VZexIR6c6a5ene4qYu02JuCEvkxSGmWTcuHveEq9uY+zQIK512SAjSj+Dph+/k2OgQJLJVjmlpesGlOrQw1B9ElldXrPwUzoWeSA+wk8UzlXf+bSXY/utiUQDyd1yPHbMFrnuA0tJmx+MPS8hAIjTTf2QISJviISggox5GwoKtNJE7YbbX3ruhyM3Sncbx8KP1JhNxkF+Jpc7NOM6kE5BeKCjZgSDUsDcFeOa5yBdNI0Um9ak9DVgWa5L0gR1/HqfBqn2w=="/>
  </cfdi:Complemento>
</cfdi:Comprobante>
XML;
?>