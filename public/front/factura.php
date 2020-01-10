<?php
$xmlOriginal = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<cfdi:Comprobante xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:cfdi="http://www.sat.gob.mx/cfd/3" xsi:schemaLocation="http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv33.xsd " Version="3.3" CondicionesDePago="CONDICIONES" Fecha="2020-01-10T17:15:14" Folio="935" FormaPago="01" LugarExpedicion="54880" MetodoPago="PPD" Moneda="MXN" Serie="A" SubTotal="100" TipoCambio="1" TipoDeComprobante="I" Total="116" Certificado="MIIFxTCCA62gAwIBAgIUMjAwMDEwMDAwMDAzMDAwMjI4MTUwDQYJKoZIhvcNAQELBQAwggFmMSAwHgYDVQQDDBdBLkMuIDIgZGUgcHJ1ZWJhcyg0MDk2KTEvMC0GA1UECgwmU2VydmljaW8gZGUgQWRtaW5pc3RyYWNpw7NuIFRyaWJ1dGFyaWExODA2BgNVBAsML0FkbWluaXN0cmFjacOzbiBkZSBTZWd1cmlkYWQgZGUgbGEgSW5mb3JtYWNpw7NuMSkwJwYJKoZIhvcNAQkBFhphc2lzbmV0QHBydWViYXMuc2F0LmdvYi5teDEmMCQGA1UECQwdQXYuIEhpZGFsZ28gNzcsIENvbC4gR3VlcnJlcm8xDjAMBgNVBBEMBTA2MzAwMQswCQYDVQQGEwJNWDEZMBcGA1UECAwQRGlzdHJpdG8gRmVkZXJhbDESMBAGA1UEBwwJQ295b2Fjw6FuMRUwEwYDVQQtEwxTQVQ5NzA3MDFOTjMxITAfBgkqhkiG9w0BCQIMElJlc3BvbnNhYmxlOiBBQ0RNQTAeFw0xNjEwMjUyMTUyMTFaFw0yMDEwMjUyMTUyMTFaMIGxMRowGAYDVQQDExFDSU5ERU1FWCBTQSBERSBDVjEaMBgGA1UEKRMRQ0lOREVNRVggU0EgREUgQ1YxGjAYBgNVBAoTEUNJTkRFTUVYIFNBIERFIENWMSUwIwYDVQQtExxMQU43MDA4MTczUjUgLyBGVUFCNzcwMTE3QlhBMR4wHAYDVQQFExUgLyBGVUFCNzcwMTE3TURGUk5OMDkxFDASBgNVBAsUC1BydWViYV9DRkRJMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAgvvCiCFDFVaYX7xdVRhp/38ULWto/LKDSZy1yrXKpaqFXqERJWF78YHKf3N5GBoXgzwFPuDX+5kvY5wtYNxx/Owu2shNZqFFh6EKsysQMeP5rz6kE1gFYenaPEUP9zj+h0bL3xR5aqoTsqGF24mKBLoiaK44pXBzGzgsxZishVJVM6XbzNJVonEUNbI25DhgWAd86f2aU3BmOH2K1RZx41dtTT56UsszJls4tPFODr/caWuZEuUvLp1M3nj7Dyu88mhD2f+1fA/g7kzcU/1tcpFXF/rIy93APvkU72jwvkrnprzs+SnG81+/F16ahuGsb2EZ88dKHwqxEkwzhMyTbQIDAQABox0wGzAMBgNVHRMBAf8EAjAAMAsGA1UdDwQEAwIGwDANBgkqhkiG9w0BAQsFAAOCAgEAJ/xkL8I+fpilZP+9aO8n93+20XxVomLJjeSL+Ng2ErL2GgatpLuN5JknFBkZAhxVIgMaTS23zzk1RLtRaYvH83lBH5E+M+kEjFGp14Fne1iV2Pm3vL4jeLmzHgY1Kf5HmeVrrp4PU7WQg16VpyHaJ/eonPNiEBUjcyQ1iFfkzJmnSJvDGtfQK2TiEolDJApYv0OWdm4is9Bsfi9j6lI9/T6MNZ+/LM2L/t72Vau4r7m94JDEzaO3A0wHAtQ97fjBfBiO5M8AEISAV7eZidIl3iaJJHkQbBYiiW2gikreUZKPUX0HmlnIqqQcBJhWKRu6Nqk6aZBTETLLpGrvF9OArV1JSsbdw/ZH+P88RAt5em5/gjwwtFlNHyiKG5w+UFpaZOK3gZP0su0sa6dlPeQ9EL4JlFkGqQCgSQ+NOsXqaOavgoP5VLykLwuGnwIUnuhBTVeDbzpgrg9LuF5dYp/zs+Y9ScJqe5VMAagLSYTShNtN8luV7LvxF9pgWwZdcM7lUwqJmUddCiZqdngg3vzTactMToG16gZA4CWnMgbU4E+r541+FNMpgAZNvs2CiW/eApfaaQojsZEAHDsDv4L5n3M1CC7fYjE/d61aSng1LaO6T1mh+dEfPvLzp7zyzz+UgWMhi5Cs4pcXx1eic5r7uxPoBwcCTt3YI1jKVVnV7/w=" NoCertificado="20001000000300022815" Sello="Pt4I3OnMyRlkPiWYa6BZtun7dobbwh/BWNKQZL32Z3fMi3I74XDjOktaVgBU4La34ChqYaVOEqayHEoKO06b5bPIyAPeOdrdbHxzAQCRvyr2Zr1dupx2juPqNsKJx8xaNrzzFHhF5LIc+fPAFcF/5Jp7ZXuQsZlXTByB1AAud/4u4mAI1Dg/KPeygZvVVaPhb7BjbgGemGFPrdHCdvOopEWsEpVWe/fqgjXJjpAaJmQ2hYzTYHTA8475nFQ6ebL/dY4ck7K2gvzer+4fsKI/LNDMuHxVwREysHJtUjKFfs/VAD63z1QH3WsFVFvBlP9qlKyS0OxaP1QKyJ7ZVHSFmQ==">
  <cfdi:Emisor Rfc="LAN7008173R5" Nombre="ACCEM SERVICIOS EMPRESARIALES SC" RegimenFiscal="601"/>
  <cfdi:Receptor Rfc="XAXX010101000" Nombre="Publico en General" UsoCFDI="G01"/>
  <cfdi:Conceptos>
    <cfdi:Concepto Descripcion="BOB MORTON" Cantidad="1" Unidad="82" ValorUnitario="100" Importe="100" ClaveProdServ="78141501" ClaveUnidad="ACT">
      <cfdi:Impuestos>
        <cfdi:Traslados>
          <cfdi:Traslado Base="100" Importe="16" Impuesto="002" TipoFactor="Tasa" TasaOCuota="0.160000"/>
        </cfdi:Traslados>
      </cfdi:Impuestos>
    </cfdi:Concepto>
  </cfdi:Conceptos>
  <cfdi:Impuestos TotalImpuestosTrasladados="16">
    <cfdi:Traslados>
      <cfdi:Traslado Impuesto="002" TasaOCuota="0.160000" Importe="16" TipoFactor="Tasa"/>
    </cfdi:Traslados>
  </cfdi:Impuestos>
  <cfdi:Complemento>
    <tfd:TimbreFiscalDigital xmlns:tfd="http://www.sat.gob.mx/TimbreFiscalDigital" xsi:schemaLocation="http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/cfd/TimbreFiscalDigital/TimbreFiscalDigitalv11.xsd" Version="1.1" UUID="4c8f051e-c1af-41c7-9be4-28ed0ca1c892" FechaTimbrado="2020-01-10T17:17:11" RfcProvCertif="AAA010101AAA" SelloCFD="Pt4I3OnMyRlkPiWYa6BZtun7dobbwh/BWNKQZL32Z3fMi3I74XDjOktaVgBU4La34ChqYaVOEqayHEoKO06b5bPIyAPeOdrdbHxzAQCRvyr2Zr1dupx2juPqNsKJx8xaNrzzFHhF5LIc+fPAFcF/5Jp7ZXuQsZlXTByB1AAud/4u4mAI1Dg/KPeygZvVVaPhb7BjbgGemGFPrdHCdvOopEWsEpVWe/fqgjXJjpAaJmQ2hYzTYHTA8475nFQ6ebL/dY4ck7K2gvzer+4fsKI/LNDMuHxVwREysHJtUjKFfs/VAD63z1QH3WsFVFvBlP9qlKyS0OxaP1QKyJ7ZVHSFmQ==" NoCertificadoSAT="20001000000300022323" SelloSAT="iej5IA2ulJCoWc/dvJMH4n31TfdIHA5k5t7ybrS/JSe7spr3rE0hscn9y0x1BN6zvFin2dRL0uZY4KTFVBKjLX4Sn+ZUPDFFfvtRYFZ6FtkiAheZre/G1yamfOU1+nud4/hlZ4lWFweLLlX+X6GI/R6fNgv766PGzUP7vCRGb5zyFritndPshArimNQ/FqlhbCbAZ1+YuwIMNzwCaIJm11kRLNlXe0iW92SDek1xNgd/huhm6G9eDBlVaJYCtEa0ZhQO8OGAeN8Tp3MaSmyWjWbg4ZiB1KUyv6vya5DgPvatNG5MeUqZZPgtpPfaJPpYAE+QvYFncTTrQhEYwyMArw=="/>
  </cfdi:Complemento>
</cfdi:Comprobante>
XML;
?>