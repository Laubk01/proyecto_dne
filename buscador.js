function buscarClima() {
    // Obtener el valor ingresado por el usuario
    const ciudad = document.getElementById('cityInput').value;

    // Realizar la solicitud a la API de OpenWeatherMap
    fetch(`https://api.openweathermap.org/data/2.5/weather?q=${ciudad},mx&APPID=54e25068283e2668061c4df5a11a24df&lang=sp`)
        .then(response => response.json())
        .then(data => {
            // Procesar y mostrar la información del clima
            mostrarInformacionClima(data);
        })
        .catch(error => {
            console.error("Error al obtener los datos del clima: " + error);
        });
}

function mostrarInformacionClima(data) {
    // Actualizar la interfaz con la información del clima
    var miDiv = document.getElementById('clima-info');
    miDiv.style.display = 'block';  
    miDiv.style.opacity = '2';

    const velocidadViento = data.wind.speed;

    const nivelDeHumedad = data.main.humidity;

    var probabilidadLluvia = data.rain && data.rain['1h'] ? data.rain['1h'] : 0;

    const amanecerTimestamp = data.sys.sunrise;
    const anochecerTimestamp = data.sys.sunset;

    const amanecerFecha = new Date(amanecerTimestamp * 1000); // Se multiplica por 1000 para convertir segundos a milisegundos
    const anochecerFecha = new Date(anochecerTimestamp * 1000);

    const amanecerHora = amanecerFecha.getHours();
    const amanecerMinuto = amanecerFecha.getMinutes();
    const anochecerHora = anochecerFecha.getHours();
    const anochecerMinuto = anochecerFecha.getMinutes();


    const descripcionClima = data.weather[0].description;
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

    const climaInfoDiv = document.getElementById('contenido');
    climaInfoDiv.innerHTML = `
   
        <h2>${data.name}  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="${foto}" width="40" height="40"> </h2>
        <h4> Clima actual: &nbsp;${data.weather[0].description}  &nbsp;&nbsp;  Amanecer : ${amanecerHora}:${amanecerMinuto} AM  <img src="climas/amanecer.png" width="20" height="20">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Anochecer : ${anochecerHora}:${anochecerMinuto} PM <img src="climas/anochecer.png" width="20" height="20"></h4>
        <p>Temperatura actual: ${(data.main.temp - 273.15).toFixed(2)}  °C</p>
        <p>Temperatura Mínima: ${(data.main.temp_min -273.15).toFixed(2)} °C &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Temperatura Máxima: ${(data.main.temp_max -273.15).toFixed(2)} °C</p>
        <p>Probabilidad de lluvia: ${probabilidadLluvia}%  <img src="climas/prolluvia.png" width="20" height="20">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nivel de Humedad: ${nivelDeHumedad}% <img src="climas/humedad.png" width="20" height="20"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Velocidad del Viento: ${velocidadViento} m/s <img src="climas/viento.png" width="20" height="20"> </p><!-- Puedes agregar más información según tus necesidades -->
    `;

    console.log(data)
}


