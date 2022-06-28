-Para la instalación de ddev y laravel necesitaremos algunas herramientas, estás serán:

DDEV (https://ddev.readthedocs.io/en/stable/)
Docker Desktop (https://docs.docker.com/desktop/)
Composer (https://getcomposer.org/download/)

-Como primer paso lo que haremos será iniciar Docker, luego abrir la consola y ejecutar el comando :
ddev config

Esto nos permitirá modificar un contenedor de docker, será importante darle un nombre al proyecto y es estrictamente necesario elegir que el tipo de proyecto sea laravel.

-Luego daremos uso de composer, con el comando:
ddev ssh (antes usaremos este para conectarnos con el servidor local)
composer update
Este comando nos asegurará contar con todas las dependencias de PHP en nuestra PC.

-Como tercer paso crearemos el archivo del ambiente, esto en una carpeta que hayamos destinado para esto, para lograr esto daremos uso de 2 comandos. Uno para crearlo y uno para darle una clave de aplicación:
cp .env.example .env
php artisan key:generate
Deberemos colocarlos en este orden.

-Por último lo que haremos será poner a funcionar el proyecto usando un comando:
ddev start
Este nos traera a nuestra consola una dirección URL la cual copiaremos en nuestro navegador y así podremos ingresar al sitio de Laravel, dando por finalizada la instalación. :D