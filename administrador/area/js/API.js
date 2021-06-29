class API {
     async obtenerDatos() {

          // Obtener desde la API
          const datos = await fetch('php');

          // Retornar como JSON
          const respuestaJSON = await datos.json();

          // Retornar el objeto
          return {
               respuestaJSON
          }
     }
}

