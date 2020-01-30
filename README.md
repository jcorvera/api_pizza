# api_pizza

Comandos importantes que se deben ejecutar para correr el proyecto

1 - composer update
2 - php artisan jwt:secret
3 - php artisan migrate --seed

Usuarios:

1 - admin
    user: admin@gmail.com
    psw : 12345678
1 - cliente
    user: cliente@gmail.com
    psw : 12345678

Notas:
    El precio de la pizza puede aumentar según el tipo de pan y tamaño de la pizza
    Los ingredientes preestablecidos no afectan el precio del la pizza
    Los ingredientes para armar la pizza si aumentan el precio de la pizza.

Endpoints publicos
    1. api/v1/login  <permite iniciar sesion y cerbir un jwt>
    2. api/v1/register <Permite que a los nuevos clientes registrarse>
    3. api/v1/branch-offices <permite consultar todas las sucursales de la pizzeria>
    4. api/v1/pizzas <permite consultar todas las pizzas disponibles>
    5. api/v1/pizzas/{id} <permite consultar una pizza en especifico>
    6. api/v1/pizzas/{id}/pre-established-ingredients <permite consultar los ingredientes pre-establecidos de la pizza>
    7. api/v1/pizzas/{id}/ingredients-available-to-make <permite consultar los ingredientes extras para armar la pizza>
    8. api/v1/pizzas/order-types <permite consultar los tipos de ordenes [domicilio , recoger en la sucursal ]>
    9. api/v1/pizzas/payment-types <permite consultar los tipos de pago [efectivo o tarjeta]>
    10. api/v1/pizzas/{id}/doughs <permite consultar los tipos de panes disponibles para la pizza>
    11 api/v1/doughs/{id}/sizes <permite consultar los tipos de tamaño para la pizza [4 porciones, 8 porciones, pizza 4]>

Endpoint privado para el cliente
    1 - api/v1/logout <permite cerrar sesión>
    2 - api/v1/profile/basic-information <permite consultar el perfil básico del cliente>
    3 - api/v1/order <permite confirmar la orden y de esta manera guardarla en la base de datos, retorna el encabezado y detalle de la orden>
    4 - api/v1/my-orders-history <permite consultar todas las ordenes realizadas por el usuario logueado>
    5 - api/v1/orders/{id}/details <permite consultar el detalle completo de una orden en especifico>

Endpoint privado para el admin
    1 - api/v1/most-frequent-customers <permite consultar los clientes mas frecuentes> 
    1 - api/v1/customers-that-spend-more-money <permite consultar los clientes que mas gastan>
    1 - api/v1/popular-ingredients <permite consultar los ingredientes más populares>


