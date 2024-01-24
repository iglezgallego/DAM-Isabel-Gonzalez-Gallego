//declaro una nueva coleccion o array
var agenda = [];
agenda [0] = "Isabel";
console.table(agenda);
//Puedo ir añadiendo más datos dentro de ese array sin borrar los antiguos
agenda [1] = "María";
console.table(agenda);
//Añado los elementos de la colección en una tabla con table
agenda [2] = "Manolo";
console.table(agenda);
//Con push añadimos un elemento a la coleccion calculando automaticamente el indice que viene a continuacion
agenda.push("Marta");
console.table(agenda);
//pop elimina el último elemento de la coleccion
agenda.pop();
console.table(agenda);
//Puedo quitar varios elementos sean donde sean que esten colocados, primero ponemos la posicion del elemento y despues cuantos elementos
//Las posiciones no se eliminan, corren posiciones arriba o abajo 
agenda.splice(0,1);
console.table(agenda);