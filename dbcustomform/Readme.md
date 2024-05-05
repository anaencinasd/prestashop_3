# CustomForm Module

Este módulo de PrestaShop permite ampliar el límite de caracteres en los campos de nombre y apellido en el formulario de registro y actualización de la cuenta del cliente.

## Planteamiento

El objetivo es añadir la funcionalidad sin tener que editar el código de prestashop y, además, crear un módulo que sea escalable. Es decir,que en el futuro pueda albergar más funcionalidades y que se pueda usar en más lugares. 

Desde esa intención, he optado por programarlo con un hook que sobreescribirá los parámetros que establece prestashop, pero sin modificar el código base. 
