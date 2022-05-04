## Acerca de este repositorio

Pequeña aplicación que al hacer login, permite acceder a la vista de una conulta de registros a una BD.
Esta vista posee una sección para hacer un filtrado de estos datos.
Y tambien la posibilidad de exportarlos a un archivo Excel.

Para el desarrollo se utlizó:

- [Laravel v9](https://laravel.com).
- [PHP v8.0.13](https://www.php.net/) requerido por la versión del framework.
- MySQL v8.0.27 para recrear el script de la BD a utilizar.
- Package [maatwebsite/excel](https://packagist.org/packages/maatwebsite/excel) para generar la exportacion a Excel.
- [Bootstrap v5.1](https://getbootstrap.com/docs/5.1/getting-started/introduction/) para darle estilos.
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Pasos para desplegar el proyecto

> Desde la carpeta donde voy a crear el proyecto, debe clonar el repositorio:

git clone https://github.com/2021Christian/gf_challenge.git

> Una vez descargado, se deben obtener los componetes necesarios para que funcione el framework.  
> No olvidemos primero posicionarnos dentro del directorio del proyecto.

    cd gf_challenge  
    composer update  


> Cuando haya terminado de descargar y antes de iniciar el proyecto, hay que crear el archivo de configuración ".env" .   
> Para hacerlo se puede renombrar o copiar el archivo ".env.example". Y dentro del ".env" configurar los parametros necesarios para conectar con la BD.

> El último paso es generar la key del proyecto.  
> Esto se logra con el comando

    php artisan key:generate

> Ahora ya se encuentra listo el proyecto para poder trabajar sobre el
> enjoy coding!
