# TPe2WEB2_entrega3
Alumnos: Mateo Hernán Foschino y Segundo Salsamendi

Obtener todos los goleadores -> GET -> goleadores -> getAll

Obtener goleador por ID -> GET -> goleadores/:ID -> getAll

Crear un goleador -> POST -> goleadores -> add

Eliminar un goleador por ID -> DELETE -> goleadores/:ID -> delete

El método delete y put tienen en el router, una opción para contemplar los casos donde no se le agregue id, y es exclusivamente para dar error, e incitar a que pongan id.

Si se llama o no con ID, se dirige a la misma función y ahí dentro verificamos si traemos a todos los jugadores, o a uno solo (correspondiente al ID ingresado).
