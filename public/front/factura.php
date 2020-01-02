<?php
$xmlOriginal = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<cfdi:Comprobante xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:cfdi="http://www.sat.gob.mx/cfd/3" xsi:schemaLocation="http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv33.xsd " Version="3.3" CondicionesDePago="CONDICIONES" Fecha="2019-12-30T12:35:11" Folio="100" FormaPago="01" LugarExpedicion="54880" MetodoPago="PPD" Moneda="MXN" Serie="A" SubTotal="1000" TipoCambio="1" TipoDeComprobante="I" Total="1160" Certificado="MIIFxTCCA62gAwIBAgIUMjAwMDEwMDAwMDAzMDAwMjI4MTUwDQYJKoZIhvcNAQELBQAwggFmMSAwHgYDVQQDDBdBLkMuIDIgZGUgcHJ1ZWJhcyg0MDk2KTEvMC0GA1UECgwmU2VydmljaW8gZGUgQWRtaW5pc3RyYWNpw7NuIFRyaWJ1dGFyaWExODA2BgNVBAsML0FkbWluaXN0cmFjacOzbiBkZSBTZWd1cmlkYWQgZGUgbGEgSW5mb3JtYWNpw7NuMSkwJwYJKoZIhvcNAQkBFhphc2lzbmV0QHBydWViYXMuc2F0LmdvYi5teDEmMCQGA1UECQwdQXYuIEhpZGFsZ28gNzcsIENvbC4gR3VlcnJlcm8xDjAMBgNVBBEMBTA2MzAwMQswCQYDVQQGEwJNWDEZMBcGA1UECAwQRGlzdHJpdG8gRmVkZXJhbDESMBAGA1UEBwwJQ295b2Fjw6FuMRUwEwYDVQQtEwxTQVQ5NzA3MDFOTjMxITAfBgkqhkiG9w0BCQIMElJlc3BvbnNhYmxlOiBBQ0RNQTAeFw0xNjEwMjUyMTUyMTFaFw0yMDEwMjUyMTUyMTFaMIGxMRowGAYDVQQDExFDSU5ERU1FWCBTQSBERSBDVjEaMBgGA1UEKRMRQ0lOREVNRVggU0EgREUgQ1YxGjAYBgNVBAoTEUNJTkRFTUVYIFNBIERFIENWMSUwIwYDVQQtExxMQU43MDA4MTczUjUgLyBGVUFCNzcwMTE3QlhBMR4wHAYDVQQFExUgLyBGVUFCNzcwMTE3TURGUk5OMDkxFDASBgNVBAsUC1BydWViYV9DRkRJMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAgvvCiCFDFVaYX7xdVRhp/38ULWto/LKDSZy1yrXKpaqFXqERJWF78YHKf3N5GBoXgzwFPuDX+5kvY5wtYNxx/Owu2shNZqFFh6EKsysQMeP5rz6kE1gFYenaPEUP9zj+h0bL3xR5aqoTsqGF24mKBLoiaK44pXBzGzgsxZishVJVM6XbzNJVonEUNbI25DhgWAd86f2aU3BmOH2K1RZx41dtTT56UsszJls4tPFODr/caWuZEuUvLp1M3nj7Dyu88mhD2f+1fA/g7kzcU/1tcpFXF/rIy93APvkU72jwvkrnprzs+SnG81+/F16ahuGsb2EZ88dKHwqxEkwzhMyTbQIDAQABox0wGzAMBgNVHRMBAf8EAjAAMAsGA1UdDwQEAwIGwDANBgkqhkiG9w0BAQsFAAOCAgEAJ/xkL8I+fpilZP+9aO8n93+20XxVomLJjeSL+Ng2ErL2GgatpLuN5JknFBkZAhxVIgMaTS23zzk1RLtRaYvH83lBH5E+M+kEjFGp14Fne1iV2Pm3vL4jeLmzHgY1Kf5HmeVrrp4PU7WQg16VpyHaJ/eonPNiEBUjcyQ1iFfkzJmnSJvDGtfQK2TiEolDJApYv0OWdm4is9Bsfi9j6lI9/T6MNZ+/LM2L/t72Vau4r7m94JDEzaO3A0wHAtQ97fjBfBiO5M8AEISAV7eZidIl3iaJJHkQbBYiiW2gikreUZKPUX0HmlnIqqQcBJhWKRu6Nqk6aZBTETLLpGrvF9OArV1JSsbdw/ZH+P88RAt5em5/gjwwtFlNHyiKG5w+UFpaZOK3gZP0su0sa6dlPeQ9EL4JlFkGqQCgSQ+NOsXqaOavgoP5VLykLwuGnwIUnuhBTVeDbzpgrg9LuF5dYp/zs+Y9ScJqe5VMAagLSYTShNtN8luV7LvxF9pgWwZdcM7lUwqJmUddCiZqdngg3vzTactMToG16gZA4CWnMgbU4E+r541+FNMpgAZNvs2CiW/eApfaaQojsZEAHDsDv4L5n3M1CC7fYjE/d61aSng1LaO6T1mh+dEfPvLzp7zyzz+UgWMhi5Cs4pcXx1eic5r7uxPoBwcCTt3YI1jKVVnV7/w=" NoCertificado="20001000000300022815" Sello="RHzVsLfat/e6OuF15R31RR8aaisbtT/LUhaGM7ly1c2Q6kEl27yxT/JucdXWzZ9YB2gZSo/N+NzZhH9SndnwFqNTbdAXfHslAz/VzuxAmT/06HV5WCdZ0kTFSCm5kwGW6xXwq80pWbK03Pjt42PcWd/0nzE7mVcf1XYCnApl6ZylQl34Q3BA+RC2K4RC7Mg6om1rVOSpT1UecMvNpGUy3BXVoIE25kBE57w4+UbZE4hmvpnE7JbISlRoQHyRU1Vtu8VEu1wyy7el49n8W3Lu9idnc7EAkZVKNPUUHRei3HQZrjo2p0vUvqpwdo5rgx8nEzKwlxxXoKusGGOZsc5FhA==">
  <cfdi:Emisor Rfc="LAN7008173R5" Nombre="ACCEM SERVICIOS EMPRESARIALES SC" RegimenFiscal="601"/>
  <cfdi:Receptor Rfc="XAXX010101000" Nombre="Publico en General" UsoCFDI="G02"/>
  <cfdi:Conceptos>
    <cfdi:Concepto Descripcion="345345" Cantidad="10" Unidad="345345" ValorUnitario="100" Importe="1000" ClaveProdServ="78141501" ClaveUnidad="E48">
      <cfdi:Impuestos>
        <cfdi:Traslados>
          <cfdi:Traslado Base="1000" Impuesto="002" TipoFactor="Tasa" TasaOCuota="0.160000" Importe="160"/>
        </cfdi:Traslados>
      </cfdi:Impuestos>
    </cfdi:Concepto>
  </cfdi:Conceptos>
  <cfdi:Impuestos TotalImpuestosTrasladados="160">
    <cfdi:Traslados>
      <cfdi:Traslado Impuesto="002" TasaOCuota="0.160000" Importe="160" TipoFactor="Tasa"/>
    </cfdi:Traslados>
  </cfdi:Impuestos>
  <cfdi:Complemento>
    <tfd:TimbreFiscalDigital xmlns:tfd="http://www.sat.gob.mx/TimbreFiscalDigital" xsi:schemaLocation="http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/cfd/TimbreFiscalDigital/TimbreFiscalDigitalv11.xsd" Version="1.1" UUID="77b8f835-1bf8-41b9-99b7-ed139a176d47" FechaTimbrado="2019-12-30T12:37:11" RfcProvCertif="AAA010101AAA" SelloCFD="RHzVsLfat/e6OuF15R31RR8aaisbtT/LUhaGM7ly1c2Q6kEl27yxT/JucdXWzZ9YB2gZSo/N+NzZhH9SndnwFqNTbdAXfHslAz/VzuxAmT/06HV5WCdZ0kTFSCm5kwGW6xXwq80pWbK03Pjt42PcWd/0nzE7mVcf1XYCnApl6ZylQl34Q3BA+RC2K4RC7Mg6om1rVOSpT1UecMvNpGUy3BXVoIE25kBE57w4+UbZE4hmvpnE7JbISlRoQHyRU1Vtu8VEu1wyy7el49n8W3Lu9idnc7EAkZVKNPUUHRei3HQZrjo2p0vUvqpwdo5rgx8nEzKwlxxXoKusGGOZsc5FhA==" NoCertificadoSAT="20001000000300022323" SelloSAT="g9IgVGT1pVXbHF7EUSb36VoQcd+mPRLV+RbZ18st9NFGggFfcS+hwhtTdwmrCCqPhONbwe0QulH8uttfXt066j/cSzd7oJg3ZNchDxe3vNeLzE7Mo7cLA0IW6wxPvmSxfkUbLRj65nGdWsLYp+5M3JYXjaxxnuI9CPn4YpXc71rtO7mPWNgjqxYTUbZaMmNxjzCY42QzDdglozL8alQywcGyUfWCwlzZUsLI8MxRdT6XQZcuzai6QMHQq2PkC16SAT+t8Ths8+RjmlRoGtfa7v2Lku0lKYf+hrnIAdz9w5iO+IV0wFXHXsbM6cExR5NKv2S1Nutrx/yq22Y2FD7OuA=="/>
  </cfdi:Complemento>
</cfdi:Comprobante>
XML;
?>