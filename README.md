Weather Challenge

![Captura de pantalla 2022-05-22 052757](https://user-images.githubusercontent.com/60992367/169685814-a124fdf7-37d2-444d-8931-ecdfccce0619.png)
![Captura de pantalla 2022-05-22 052753](https://user-images.githubusercontent.com/60992367/169685816-b7ef6928-7301-4976-81b0-2f92bc61b70a.png)


<h3>INSTALACÍON: </h3>

`git clone https://github.com/GabrielLimardo/weatherChalleng.git`<br>
`cd weatherChalleng` <br>
`composer update` <br>
`composer install` <br>
crear una base de datos vacia en el localhost con el nombre `WeatherChallenge` <br>
`php artisan migrate` <br>
`php artisan db:seed` <br>
`php artisan serve` <br>


<h3>TEST: </h3>

Necesitamos que crees un endpoint para una API que guarde en una base de datos informacion del clima actual de una ciudad

Endpoint a desarollar:
/current?query=
Ejemplo con el clima actual en New York:
/current?query=New%20York

Si esa informacion no esta disponible en nuestra base de datos debemos ir a buscar a la siguiente API: https://weatherstack.com/

En el caso de New York, debes consultar en weatherstack.com el clima actual de New York de la siguiente form:
https://api.weatherstack.com/current?access_key=YOUR_ACCESS_KEY&query=New%20York

Esta API es gratuita, solo necesitas usar el plan free para obtener YOUR_ACCESS_KEY

El endpoint que vas a desarollar devuelve el clima actual en New York (como de cualquier otra ciudad de weatherstack.com) usando weatherstack y guarda esos valores en la base de datos , si nos vuelven a consultar la misma ciudad durante una misma hora debemos devolver el ultimo valor guardado en la base de datos y no ir nuevamente a buscarlo a weatherstack.




