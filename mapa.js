document.addEventListener("DOMContentLoaded", function () {
    mapa();
  });
  
  function mapa() {
    const map = L.map("map", {
      center: [23.6345, -102.5528],
      zoom: 5.5,
      zoomControl: true,
      dragging: true,
      scrollWheelZoom: true,
      doubleClickZoom: false,
    });
  
    L.tileLayer("https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}.png", {
      attribution:
        'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles courtesy of <a href="https://carto.com/attributions">CARTO</a>',
    }).addTo(map);
      
      const estadosMexico = {
        "Aguascalientes": [21.8818, -102.2916],
        "Baja California": [30.8406, -115.2838],
        "Baja California Sur": [26.0444, -111.6661],
        "Campeche": [19.3291, -89.1432],
        "Chiapas": [16.7569, -93.1292],
        "Chihuahua": [28.6353, -106.0889],
        "Coahuila": [27.0587, -101.7068],
        "Colima": [19.1223, -104.0076],
        "Durango": [24.0277, -104.6532],
        "Guanajuato": [21.1619, -101.5165],
        "Guerrero": [17.6669, -99.6686],
        "Hidalgo": [20.6595, -99.1033],
        "Jalisco": [20.6595,-103.3494],
        "México": [19.3517, -99.9289],
        "Ciudad de Mexico":[19.4326 ,-99.1332],
        "Michoacán": [19.7008, -101.1844],
        "Morelos": [18.6813, -99.1013],
        "Nayarit": [21.7514, -104.8455],
        "Nuevo León": [25.5922, -99.9962],
        "Oaxaca": [17.0732, -96.7266],
        "Puebla": [19.0414, -98.2063],
        "Querétaro": [20.5881, -100.3899],
        "Quintana Roo": [19.1817, -88.4791],
        "San Luis Potosí": [22.1565, -100.9855],
        "Sinaloa": [25.1721, -107.4795],
        "Sonora": [29.0892, -110.9611],
        "Tabasco": [17.8409, -92.6189],
        "Tamaulipas": [24.2669, -98.8363],
        "Tlaxcala": [19.3139, -98.2404],
        "Veracruz": [19.1738, -96.1342],
        "Yucatán": [20.7099, -89.0943],
        "Zacatecas": [22.7709, -102.5832]
      };
    

      function obtenerClimaYActualizarMapa(coordenada, estado) {
        console.log("Coordenadas:", coordenada);
    
        fetch(
          `https://api.openweathermap.org/data/2.5/weather?lat=${coordenada[0]}&lon=${coordenada[1]}&APPID=54e25068283e2668061c4df5a11a24df&lang=sp`
        )
          .then((response) => {
            if (!response.ok) {
              throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
          })
          .then((data) => {
            mostrarClimaEnMapa(coordenada, data, estado);
          })
          .catch((error) => {
            console.error("Error al obtener los datos del clima:", error);
          });
      }
    
      // Función para mostrar el clima en el mapa
      function mostrarClimaEnMapa(coordenada, data, estado) {
        console.log("Mostrando clima en mapa...");
    
        const centroLatitud = coordenada[0];
        const centroLongitud = coordenada[1];
    
        console.log("Centro Latitud:", centroLatitud);
        console.log("Centro Longitud:", centroLongitud);
    
        const descripcionClima = data.weather[0].description;
        console.log("Descripción del clima:", descripcionClima);
    
        let foto;
    
        switch (true) {
            case descripcionClima.includes("cielo claro"):
              foto = "climas/sol.png";
              break;
            case descripcionClima.includes("nubes dispersas"):
              foto = "climas/nubesdispersas.png";
              break;
            case descripcionClima.includes("algo de nubes"):
              foto = "climas/algo de nubes.png";
              break;
            case descripcionClima.includes("lluvia ligera"):
            case descripcionClima.includes("llovizna ligera"):
              foto = "climas/lluvia ligera.png";
              break;
            case descripcionClima.includes("lluvia"):
              foto = "climas/lluvia.png";
              break;
            case descripcionClima.includes("niebla"):
              foto = "climas/neblina.png";
              break;
            case descripcionClima.includes("despejado"):
              foto = "climas/sol.png";
              break;
            case descripcionClima.includes("tormenta electrica"):
              foto = "climas/tormentaE.png";
              break;
            case descripcionClima.includes("tormenta"):
              foto = "climas/tormenta.png";
              break;
            case descripcionClima.includes("muy nuboso"):
              foto = "climas/nuboso.png";
              break;
            case descripcionClima.includes("nubes"):
              foto = "climas/nubes.png";
              break;
            default:
              foto = "climas/star.png"; // Imagen por defecto para otros tipos de clima
              break;
  }
    
        var imageUrl = foto;
        // Crea un marcador con un tooltip
        var marcadorConImagen = L.marker([centroLatitud, centroLongitud], {
          icon: L.divIcon({
            className: "marcador",
            html: `<div>${estado}<br><img src="${imageUrl}" width="40" height="40"></div>`,
            iconSize: [120, 80],
          }),
        }).addTo(map);
    
        marcadorConImagen.bindTooltip(
          `(${(data.main.temp - 273.15).toFixed(2)}) °C  ${data.weather[0].description}`,
          {
            permanent: false,
            direction: "center",
            className: "texto-tooltip",
          }
        ).openTooltip();
    
        console.log("Clima mostrado en mapa.");
      }
    
      // Llamada directa después de la creación del mapa
      for (var estado in estadosMexico) {
        if (estadosMexico.hasOwnProperty(estado)) {
          var coordenadas = estadosMexico[estado];
    
          // Llama a la función para obtener el clima y actualizar el mapa
          obtenerClimaYActualizarMapa(coordenadas, estado);
        }
      }
    }