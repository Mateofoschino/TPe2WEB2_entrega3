# TPe2WEB2_entrega3
Alumnos: Mateo Hernán Foschino y Segundo Salsamendi

GET

para solicitar todos los goleadores se requiere de la siguiente URL:

http://localhost/TPE_WEB2_3ra_entrega/api/goleadores

el router: GET -> goleadores -> getAll

si desea obtener un unico goleador, debe agregar un ID:

http://localhost/TPE_WEB2_3ra_entrega/api/goleadores/ (ID numerico)

el router: GET -> goleadores/:ID -> getAll

ejemplo:

http://localhost/TPE_WEB2_3ra_entrega/api/goleadores/23

en este caso, como esta la DB en el momento del commit, nos devolveria:

{
      "Jugador_ID": 23,
      "Nombre": "El diablito echeverri",
      "Club": 4,
      "Goles": 5,
      "PJ": 8
    }

para obtener los goleadores ordenados por un campo y de manera ascendente o desdecente:

opciones de campos: Nombre, Goles, Club, PJ(partidos jugados) y opciones de orden: asc/desc(ascendente/descendente)

ejemplos:

obtener todos los goleadores ordenados por goles de manera ascendente:

http://localhost/TPE_WEB2_3ra_entrega/api/goleadores?sort=Goles&order=asc

obtener todos los goleadores ordenados por goles de manera descendente:

http://localhost/TPE_WEB2_3ra_entrega/api/goleadores?sort=Goles&order=desc

Si se llama a la función GET con o sin ID, se dirige a la misma función getAll y ahí dentro verificamos si traemos a todos los jugadores, o a uno solo (correspondiente al ID ingresado).

POST

para crear un nuevo goleador la URL sera la siguiente:

http://localhost/TPE_WEB2_3ra_entrega/api/goleadores

router: POST -> goleadores -> add

PUT

para editar un goleador la URL sera la siguiente:

http://localhost/TPE_WEB2_3ra_entrega/api/goleadores/ (ID numerico)

router: PUT -> goleadores/:ID -> modify

El método put tiene en el router, una opción para contemplar los casos donde no se le agregue id, y es exclusivamente para dar error, e incitar a que pongan id.

esto se daria en el caso de que la url no contenga ID


