class UI {
     constructor() {
          // Instanciar la API
          this.api = new API();
          
          // Crear los mapas en un grupo
          this.markers = new L.LayerGroup(); 
          
          // Iniciar el mapa
          this.mapa = this.inicializarMapa();
     }

     inicializarMapa() {     
       
          // Inicializar y obtener la propiedad del mapa
      
          const map = L.map('mapa').setView([23.6345005, -102.5527878], 5);

          const enlaceMapa = '<a href="http://openstreetmap.org">OpenStreetMap</a>';

          L.tileLayer(
              'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//              attribution: '&copy; ' + enlaceMapa + ' Contributors',
              maxZoom: 18,
              }).addTo(map);

          return map;
     }

     // Mostrar Establecimientos de la api
     mostrarEstablecimientos() {
          this.api.obtenerDatos()
                    .then(datos =>  {
                         const resultado = datos.respuestaJSON.data;
                         // Muestra los pines en el Mapa
                         this.mostrarPines(resultado);
                    } )
     }

     // Muestra los pines
     mostrarPines(datos) {

          this.markers.clearLayers();
         
          // Recorrer establecimientos
          datos.forEach(dato => {
               // Destucturing 
               const {id,latitude, longitude, nombre} = dato;

               const opcionesPopUp = L.popup()
               .setContent(`<p><b>Origen</b>: ${nombre}</p> 
                            <p></p><b>Longitude:</b> ${longitude}</p>
                            <p> <b>Latitude:</b> ${latitude}</p>
                            <p> <b>Enlace:</b> <a href="NuevaPlantilla.php?id=${id}" target="_Blanck">Enlace</a></p>`);                

               // Agregar el Pin
               const marker = new L.marker([
                    parseFloat(latitude),
                    parseFloat(longitude)
               ] )
               .bindPopup(opcionesPopUp)

               this.markers.addLayer(marker); 
          });
          this.markers.addTo(this.mapa)
     }

      // Obtiene las sugerencias de la REST API
      obtenerSugerencias(busqueda) {
          this.api.obtenerDatos()
               .then(datos => {
                    // Obtener los resultados
                    const resultados = datos.respuestaJSON.data;

                    // Enviar el JSON y la busqueda al Filtro
                    this.filtrarSugerencias(resultados, busqueda);
               })
     }

     // Filtrar las sugerencias de busqueda
      filtrarSugerencias(resultados, busqueda) {
          const filtro = resultados.filter( filtro => filtro.nombre.indexOf(busqueda) !== -1 );

          // Mostrar pines del Filtro
          this.mostrarPines(filtro);

     }
}