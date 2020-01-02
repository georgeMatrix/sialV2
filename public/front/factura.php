<?php
$xmlOriginal = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<cfdi:Comprobante xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:cfdi="http://www.sat.gob.mx/cfd/3" xsi:schemaLocation="http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv33.xsd " Version="3.3" CondicionesDePago="CONDICIONES" Fecha="2020-01-02T15:19:55" Folio="100" FormaPago="01" LugarExpedicion="54880" MetodoPago="PPD" Moneda="MXN" Serie="A" SubTotal="300" TipoCambio="1" TipoDeComprobante="I" Total="348" Certificado="MIIFxTCCA62gAwIBAgIUMjAwMDEwMDAwMDAzMDAwMjI4MTUwDQYJKoZIhvcNAQELBQAwggFmMSAwHgYDVQQDDBdBLkMuIDIgZGUgcHJ1ZWJhcyg0MDk2KTEvMC0GA1UECgwmU2VydmljaW8gZGUgQWRtaW5pc3RyYWNpw7NuIFRyaWJ1dGFyaWExODA2BgNVBAsML0FkbWluaXN0cmFjacOzbiBkZSBTZWd1cmlkYWQgZGUgbGEgSW5mb3JtYWNpw7NuMSkwJwYJKoZIhvcNAQkBFhphc2lzbmV0QHBydWViYXMuc2F0LmdvYi5teDEmMCQGA1UECQwdQXYuIEhpZGFsZ28gNzcsIENvbC4gR3VlcnJlcm8xDjAMBgNVBBEMBTA2MzAwMQswCQYDVQQGEwJNWDEZMBcGA1UECAwQRGlzdHJpdG8gRmVkZXJhbDESMBAGA1UEBwwJQ295b2Fjw6FuMRUwEwYDVQQtEwxTQVQ5NzA3MDFOTjMxITAfBgkqhkiG9w0BCQIMElJlc3BvbnNhYmxlOiBBQ0RNQTAeFw0xNjEwMjUyMTUyMTFaFw0yMDEwMjUyMTUyMTFaMIGxMRowGAYDVQQDExFDSU5ERU1FWCBTQSBERSBDVjEaMBgGA1UEKRMRQ0lOREVNRVggU0EgREUgQ1YxGjAYBgNVBAoTEUNJTkRFTUVYIFNBIERFIENWMSUwIwYDVQQtExxMQU43MDA4MTczUjUgLyBGVUFCNzcwMTE3QlhBMR4wHAYDVQQFExUgLyBGVUFCNzcwMTE3TURGUk5OMDkxFDASBgNVBAsUC1BydWViYV9DRkRJMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAgvvCiCFDFVaYX7xdVRhp/38ULWto/LKDSZy1yrXKpaqFXqERJWF78YHKf3N5GBoXgzwFPuDX+5kvY5wtYNxx/Owu2shNZqFFh6EKsysQMeP5rz6kE1gFYenaPEUP9zj+h0bL3xR5aqoTsqGF24mKBLoiaK44pXBzGzgsxZishVJVM6XbzNJVonEUNbI25DhgWAd86f2aU3BmOH2K1RZx41dtTT56UsszJls4tPFODr/caWuZEuUvLp1M3nj7Dyu88mhD2f+1fA/g7kzcU/1tcpFXF/rIy93APvkU72jwvkrnprzs+SnG81+/F16ahuGsb2EZ88dKHwqxEkwzhMyTbQIDAQABox0wGzAMBgNVHRMBAf8EAjAAMAsGA1UdDwQEAwIGwDANBgkqhkiG9w0BAQsFAAOCAgEAJ/xkL8I+fpilZP+9aO8n93+20XxVomLJjeSL+Ng2ErL2GgatpLuN5JknFBkZAhxVIgMaTS23zzk1RLtRaYvH83lBH5E+M+kEjFGp14Fne1iV2Pm3vL4jeLmzHgY1Kf5HmeVrrp4PU7WQg16VpyHaJ/eonPNiEBUjcyQ1iFfkzJmnSJvDGtfQK2TiEolDJApYv0OWdm4is9Bsfi9j6lI9/T6MNZ+/LM2L/t72Vau4r7m94JDEzaO3A0wHAtQ97fjBfBiO5M8AEISAV7eZidIl3iaJJHkQbBYiiW2gikreUZKPUX0HmlnIqqQcBJhWKRu6Nqk6aZBTETLLpGrvF9OArV1JSsbdw/ZH+P88RAt5em5/gjwwtFlNHyiKG5w+UFpaZOK3gZP0su0sa6dlPeQ9EL4JlFkGqQCgSQ+NOsXqaOavgoP5VLykLwuGnwIUnuhBTVeDbzpgrg9LuF5dYp/zs+Y9ScJqe5VMAagLSYTShNtN8luV7LvxF9pgWwZdcM7lUwqJmUddCiZqdngg3vzTactMToG16gZA4CWnMgbU4E+r541+FNMpgAZNvs2CiW/eApfaaQojsZEAHDsDv4L5n3M1CC7fYjE/d61aSng1LaO6T1mh+dEfPvLzp7zyzz+UgWMhi5Cs4pcXx1eic5r7uxPoBwcCTt3YI1jKVVnV7/w=" NoCertificado="20001000000300022815" Sello="dyQZMKPeZewyI1xZJa5oeY+1SUrGnwbrAlvhNMs2kizIHIxCgXtMpvnnVWZkED19kWTOia5GHSwTiV83CSGaCOj17s9y5HlBzA3R8etXupU8YhzDijgeAxgn+A3cOSCiZygEt8DaealwqGCEq4uAkC4+2cwpPFw6ibVB0iclBZipTFiihFVvcloQlmJCNEw64g3VX2mibK9O707I/sFejN+GUsbgCzZufaxNRDIRr15X+1tVKfhh0h/uZZu0zYbftucFXoZ6ZFNWri0/LU76rAvd7OPwNsN4IzkZXQMTRUUh+oEzthOL82M2IB8itNasewDRztVOBDvJnLZhq97VEA==">
  <cfdi:Emisor Rfc="LAN7008173R5" Nombre="ACCEM SERVICIOS EMPRESARIALES SC" RegimenFiscal="601"/>
  <cfdi:Receptor Rfc="XAXX010101000" Nombre="Publico en General" UsoCFDI="G02"/>
  <cfdi:Conceptos>
    <cfdi:Concepto Descripcion="BOB MORTON" Cantidad="1" Unidad="82" ValorUnitario="100" Importe="100" ClaveProdServ="78141501" ClaveUnidad="ACT">
      <cfdi:Impuestos>
        <cfdi:Traslados>
          <cfdi:Traslado Base="100" Impuesto="002" TipoFactor="Tasa" TasaOCuota="0.160000" Importe="16"/>
        </cfdi:Traslados>
      </cfdi:Impuestos>
    </cfdi:Concepto>
    <cfdi:Concepto Descripcion="ROBOCOP" Cantidad="1" Unidad="126" ValorUnitario="200" Importe="200" ClaveProdServ="01010101" ClaveUnidad="E48">
      <cfdi:Impuestos>
        <cfdi:Traslados>
          <cfdi:Traslado Base="200" Importe="32" Impuesto="002" TipoFactor="Tasa" TasaOCuota="0.160000"/>
        </cfdi:Traslados>
      </cfdi:Impuestos>
    </cfdi:Concepto>
  </cfdi:Conceptos>
  <cfdi:Impuestos TotalImpuestosTrasladados="48">
    <cfdi:Traslados>
      <cfdi:Traslado Impuesto="002" TasaOCuota="0.160000" Importe="48" TipoFactor="Tasa"/>
    </cfdi:Traslados>
  </cfdi:Impuestos>
  <cfdi:Complemento>
    <tfd:TimbreFiscalDigital xmlns:tfd="http://www.sat.gob.mx/TimbreFiscalDigital" xsi:schemaLocation="http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/cfd/TimbreFiscalDigital/TimbreFiscalDigitalv11.xsd" Version="1.1" UUID="ac6b4882-f772-409d-9d98-72da4d62269a" FechaTimbrado="2020-01-02T15:21:56" RfcProvCertif="AAA010101AAA" SelloCFD="dyQZMKPeZewyI1xZJa5oeY+1SUrGnwbrAlvhNMs2kizIHIxCgXtMpvnnVWZkED19kWTOia5GHSwTiV83CSGaCOj17s9y5HlBzA3R8etXupU8YhzDijgeAxgn+A3cOSCiZygEt8DaealwqGCEq4uAkC4+2cwpPFw6ibVB0iclBZipTFiihFVvcloQlmJCNEw64g3VX2mibK9O707I/sFejN+GUsbgCzZufaxNRDIRr15X+1tVKfhh0h/uZZu0zYbftucFXoZ6ZFNWri0/LU76rAvd7OPwNsN4IzkZXQMTRUUh+oEzthOL82M2IB8itNasewDRztVOBDvJnLZhq97VEA==" NoCertificadoSAT="20001000000300022323" SelloSAT="qqipSAmJORsDWWvfytl40NbeQL8KQn/jgxFlrZ614Ok46FxIv91r0vEx/5OywaqGD8Yf5X25E/etMb4o/U9MYx0sR72TfryAHeOW6nAdlBCmSB7zZzg7Ste1Q4gAcKW9ZWYyGQnw9KWk9JNRMLprLDu9CPg1OASd+4IjrQ8Q7nSCGvU1aiO3DbUqzIpy91bursXAdHoEbuVuJ/wM4BVf9GGWdgQDeWq91iXRO0l+UrUZSe4BIWjorzXL8jZ5NOxF9EVXmg14H6nYJwjUbEQvJ4TyJOi/6h4eLMutBXgOEP3ND5gxb0bPzT09Fy91enIPwWCTRYRIL1YWlRS105GG1A=="/>
  </cfdi:Complemento>
</cfdi:Comprobante>
XML;
?>