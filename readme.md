-- # Laranuncios

_Proyecto realizado en laravel 6.1.0  realizado en la práctica final del curso de Laravel, se trata de una web de anuncios de segunda mano donde se puede gestionar los anuncios y darse de alta como usuario_

### Pre-requisitos 📋
_Windows_
- Download wamp: http://www.wampserver.com/en/
- Actualice la ruta de la variable de entorno de Windows para que apunte a su carpeta de instalación de php (dentro del directorio de instalación de wamp) (así es como puede hacer [esto](http://stackoverflow.com/questions/17727436/how-to-properly-set-php-environment-variable-para-ejecutar-comandos-en-git-bash)   )
- Cree una base de datos localmente llamada **laranuncios**
- Descargar [composer](https://https://getcomposer.org/download/) 

### Instalación 🔧

Abra la consola y directorio raiz del proyecto y ejecute:
- ```composer install```
- ```php artisan key:generate```
- ```php artisan migrate```
- ``` php artisan db:seed```

## Configuración ⚙️

_Configurar Mercury_ 
- Arrancar desde XAMPP el servidor SMTP  **Mercury**  y seleccionar "admin"
- Dejar a la vista la ventana **SMTP Server** , el esto se pueden cerrar
- A continuación id a la opción “configuration -> manage local users” y vamos a crear el usuario laranuncios (para probar la aplicación).
- En la opción “configuration -> MercuryS SMTP Server -> "connection control” deshabilita la opción “Don not permit SMTP relaying on non-local mail”.

_Configurar la aplicación_ 
* en el arhivo de entorno .env incluir MAIL_FROM_ADDRESS y MAIL_FROM_NAME , quedará de la siguiente manera
```
MAIL_DRIVER=smtp
MAIL_HOST=localhost
MAIL_PORT=25
MAIL_USERNAME=laranuncios
MAIL_PASSWORD=tuPassword
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=tu@email.com
MAIL_FROM_NAME="Laranuncios admin"
```

## Ejecutando las pruebas ⚙️
-  Arranca el servidor
``` run  php artisan serve``` 
- Registrate y comprueba que en la ventana  **SMTP Server**  muestra el envío
- El mismo proceso para el recordatorio del password

- NOTA: Al ser una prueba en local es posible que el mensaje llegue como SPAM, que tarde en llegar o no llegue.
## Construido con 🛠️

* [Laravel](http://www.https://laravel.com/) - El framework web usado
* [Composer](https://https://getcomposer.org/) - Manejador de dependencias y paquetes de PHP

## Autor ✒️

* **David** - - [davidtrigo](https://github.com/davidtrigo)

