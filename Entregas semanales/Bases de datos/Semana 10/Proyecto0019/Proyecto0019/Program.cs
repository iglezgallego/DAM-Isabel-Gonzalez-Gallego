string diadelasemana = "miércoles";

switch (diadelasemana) {
    case "lunes":
        Console.WriteLine("hoy es el peor día de la semana");
        break;

    case "martes":
        Console.WriteLine("hoy es el segundo peor dia de la semana");
        break;

    case "miércoles":
        Console.WriteLine("ya estamos a mitad de la semana");
        break;

    case "jueves":
        Console.WriteLine("hoy es juernes");
        break;

    case "viernes":
        Console.WriteLine("ya viene el fin de semana");
        break;

    case "sabado":
        Console.WriteLine("hoy es el mejor dia de la semana");
        break;

    case "domingo":
        Console.WriteLine("parece mentira que mañana ya es lunes");
        break;

    default:
        Console.WriteLine("lo que has escrito no es un día");
        break;
}

