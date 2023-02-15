string[] ciudades = new string[10];
ciudades[0] = "valencia";
ciudades[1] = "madrid";
ciudades[2] = "barcelona";
ciudades[3] = "malaga";
ciudades[4] = "sevilla";
ciudades[5] = "caceres";
ciudades[6] = "alicante";
ciudades[7] = "ciudad real";
ciudades[8] = "bilvao";
ciudades[9] = "cordoba";

foreach(string ciudad in ciudades)
{
    Console.WriteLine(ciudad);
}
Array.Sort(ciudades);
Console.WriteLine("---------------");

foreach(string ciudad in ciudades)
{
    Console.WriteLine(ciudad);
}
