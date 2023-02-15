<?php
    include "cabecera.php";
?>
            <!-- Aquí voy a poner el contenido principal de mi web -->
            <section id="contacto">
            Contenido de mi contacto
                <form>
                    <input type="text" name="nombre" placeholder="Introduce tu nombre">
                    <br>
                    <input type="email" name="email" placeholder="Introduce tu email">
                    <br>
                    <select name="Poblacion">
                        <option value ="Valencia">Introduce tu población</option>
                        <option value ="Valencia">Valencia</option>
                        <option value ="Alicante">Alicante</option>
                        <option value ="Madrid">Madrid</option>
                    </select>
                    <br><br><br>
                    <p>Indica el color de tus ojos</p>
                    <input type="radio" name="tipo">Marrón<br>
                    <input type="radio" name="tipo">Verde<br>
                    <input type="radio" name="tipo">Azul<br>
                    <br>
                    <p>Indica tu rango de edad</p>
                    <input type="radio" name="edad">10-20<br>
                    <input type="radio" name="edad">20-30<br>
                    <input type="radio" name="edad">+ de 30<br>
                    <br>
                    <p>¿Cómo nos has conocido?</p>
                    <input type="checkbox" name="conocer">Facebook<br>
                    <input type="checkbox" name="conocer">Instagram<br>
                    <input type="checkbox" name="conocer">Recomendación<br>
                    <br>
                    <input type="submit" value="¡Envía tu correo!">
                </form>
            </section>
            
<?php
    include "piedepagina.php";
?>