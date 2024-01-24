//Para actualizar, primero se pone el criterio de búsqueda y luego el dato que queremos cambiar
db.formularios.updateOne({asunto:"Este es el primer correo"},{$set:{fecha:"2024-01-30"}});