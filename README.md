# [Server-IPN-Php]

## Índice

- [1. Introducción](#1-introducción)
- [2. Requisitos previos](#2-requisitos-previos)
- [3. Despliegue](#3-despliegue)
- [4. Subirlo al servidor web](#4-subirlo-al-servidor-web)
- [5. Configurar la URL de notificacion al final del pago](#5--configurar-la-url-de-notificaci%C3%B3n-al-final-del-pago)

## 1. Introducción

En este manual podrás encontrar una guía paso a paso para configurar un proyecto de **[PHP]** con la respuesta de la IPN. Te proporcionaremos instrucciones detalladas y credenciales de prueba para la instalación y configuración del proyecto, permitiéndote trabajar y experimentar de manera segura en tu propio entorno local.
Este manual está diseñado para ayudarte a comprender el flujo de la integración de la pasarela para ayudarte a aprovechar al máximo tu proyecto y facilitar tu experiencia de desarrollo.

<p align="center">
  <img src="https://i.postimg.cc/ZK0X6Qys/repuestaipn.png" alt="Popin" width="850"/>
</p>

<a name="Requisitos_Previos"></a>

## 2. Requisitos previos

- Comprender el flujo de comunicación de la pasarela. [Información Aquí](https://secure.micuentaweb.pe/doc/es-PE/rest/V4.0/javascript/guide/start.html)
- Instalar [Visual Studio Code](https://code.visualstudio.com/)
- Tener una cuenta creada en [Git Hub](https://github.com/)

> [!NOTE]
> Tener en cuenta que, para que el desarrollo de tu proyecto, eres libre de emplear tus herramientas preferidas.

## 3. Despliegue

### Clonar el proyecto:

```sh
git clone [https://github.com/izipay-pe/Server-IPN-Php.git]
```

### Ejecutar proyecto

- Ingrese a la carpeta raíz del proyecto desde el terminal.

-

## 4. Subirlo al servidor web

Para este ejemplo se utilizó reenvío de puertos en Visual Studio Code, siga los siguientes pasos.

- paso 1: Dirigirse a la pestaña de PORTS.
- paso 2: Iniciar sesión en GitHub en caso no ha iniciado sesión anteriormente.
- paso 3: Añadir el puerto de conexión que se desea sea accesible, en este caso el 5000.
- paso 4: Cambiar la visibilidad a Públic, para permitir conexiones sin inicio de sesión.
- paso 5: Añadir en el BackOffice Vendor el endpoint o ruta del ipn en la sección API REST.

      <p align="center">

    <img src="https://i.postimg.cc/Kz8YJ4JP/PORTS.png" />
  </p>

## 5.- Configurar la URL de notificación al final del pago

- Ingresar a su back office vendedor [aquí](https://secure.micuentaweb.pe/vads-merchant/) e ingresar a la siguiente ruta: `Configuración -> Reglas de notificaciones -> Url de notificación al final del pago`, una ves ingrese su endpoint, Guarda y acepta el mensaje de confirmación.

      <p align="center">

    <img src="https://i.postimg.cc/NFRBtP7x/finaldelpago.png" alt="Popin" width="850"/>
  </p>
