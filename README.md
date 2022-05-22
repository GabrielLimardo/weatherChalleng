Weather Challenge


INSTALACÍON:

git clone <br>
`cd weatherChalleng` <br>
asegurarse de tener el archivo `.env` con la siguiente informacion: <br>
ejecutar los comandos composer update y composer install <br>
crear una base de datos en el localhost con el nombre `WeatherChallenge` <br>
ejecutar comandos `php artisan migrate` y `php artisan db:seed` <br>
ejecutar `php artisan serve` <br>

TEST:

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
