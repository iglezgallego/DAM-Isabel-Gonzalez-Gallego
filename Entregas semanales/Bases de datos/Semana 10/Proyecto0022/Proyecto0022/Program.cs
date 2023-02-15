string[] agenda = new string[100];

agenda[0] = "Juan";
agenda[1] = "Javier";

int longitud = agenda.Length;

Console.WriteLine("La longitud de la agenda es " + longitud);

for(int i = 0; i < longitud; i++)
{
    if (agenda[i] != null)
    {
        Console.WriteLine(agenda[i]);
    }
}