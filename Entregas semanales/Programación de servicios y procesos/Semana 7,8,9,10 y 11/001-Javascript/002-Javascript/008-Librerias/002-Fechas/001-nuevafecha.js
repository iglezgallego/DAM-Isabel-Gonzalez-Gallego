var fecha = new Date()
//metodo para que te dé el año
console.log("El año es: "+fecha.getFullYear())
//el mes - En jS los meses empiezan en 0, por lo que hay que sumarle uno
console.log("El mes es: "+(fecha.getMonth()+1))
//el día
console.log("El día es: "+fecha.getDate())
//la hora
console.log("La hora es: "+fecha.getHours())
//los minutos
console.log("El minuto es: "+fecha.getMinutes())
//los segundos
console.log("El segundo es: "+fecha.getSeconds())