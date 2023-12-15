# Sistema de hospedaje

## Requisitos
- Tener activado algun servicio de `MySQL` puede ser en  `XAMPP` o cualquir otro

## Instalación
1. Clona el repositorio: `git clone https://github.com/paulnavarroc/hotel.com`
2. Abrir el repositorio clonado y instalar las dependencias
3. Istalar las dependencias **composer**: `composer install`
4. Instala las dependencias **npm**: `npm install`
5. Copiar el archivo **.env.example** y pegar cambiando el nombre a **.env** 
6. Ejecutar la migraciones: `php artisan migrate`  le pregutara si quiere crear la base de datos y pone que si
7. Ejecutar los seeders: `php artisan db:seed`
8. Ejecutar `npm run build`
9. Crear un servidor local: `php artisan serve` 

Una ves creado el servidor, ingresar a la url proporcionada por el servidor que por defecto es `http://127.0.0.1:8000`

## Crear Api Token
Para poder utilizar la api primero tiene que crear un Api Token, para ello tiene que crearce un nuevo usuario o iniciar sesion con las sigientes credenciales 
- Usuario: `demo@demo.com`
- Clave: `12345678`

luego ir a la opcion de `Api tokens` o `http://127.0.0.1:8000/user/api-tokens`

crear el token con los permisos necesarios

## Utilizacion del api

- Abrir `Postman` y ecribir la url `http://127.0.0.1:8000/api/v1/clients`

- Para autentificarse atraves de la api en la `Auth` selecionar el tipo `Bearer token` e ingresar el token creado anteriormente
- En el `Header` agrear en **key** el valor *Accept* y el **value** de *application/json*, eso es para indicar que se espera datos en formato json

- Para poder crear un nuevo cliente se requeren los siguientes campos
1. **typeDoc** que es un numero entero y acepta los siguentes valores [ 1 = DNI, 2 = RUC, 3 = Pasaporte, 4 = Carnet de Extranjería]
2. **numDoc** que es el numero de documento
3. **name**
4. **age** que tiene que ser de tipo entero
5. **address** un minimo de 4 caracteres
6. **Phone** un minimo de ocho caracteres
7. **ocupacion**
8. **state** que es de tipo boolean 

Ejemplo :

```json
{
    "typeDoc": 3,
    "numDoc": "53846536",
    "name": "Prof. Asia Kuhic Jr.",
    "age": 78,
    "address": "7130 Jacobi Parkway Apt. 310\nLake Theresa, ND 10362",
    "phone": "+1-463-725-5350",
    "ocupacion": "Orthotist OR Prosthetist",
    "state": 0
}
```

## Filtrado de informacion

- Tambien puede filtar informacion de la sigiente manera
- Agregando el campo como parametro ejemplo: `http://127.0.0.1:8000/api/v1/clients?age[lt]=20`
- Donde el parametro es **age[lt]** donde con *lt* le estamo diciendo que nos liste los clientes menor a 20
- Puede cambiar el valor de **[lt]**  por cuaquera de los sigientes parametros
```json
{
    "eq" : "=",
    "lt" : "<",
    "lte" : "<=",
    "gt" : ">",
    "gte" : ">=",
    "ne" : "!=",
}
```
- Los campos que puede fitrar son los siguientes con su respectivo permiso de filtrados:
```json
{
    "name" : "eq",
    "typeDoc" : "eq",
    "numDoc" : "eq",
    "age" : {"eq","lt","lte","gt","gte"},
    "address" : "eq",
    "state" : "eq",
}
```
