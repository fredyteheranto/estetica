# estetica
Reserva de cupos en una estetica

# Configuracion
Los archivos de configuracion son config.php (se encuentra en la raíz del proyecto) en este archivo están los parámetros de conexión de la base de datos y en el archivo config.js (se encuentra en /lib/js/) se encuentra la configuración  de la conexion con la API.

# NOTA:
Cada producto o servicio debe ser asignado a cada sucursal de la estética y los trabajadores de la estética deben ser asignado a cada sucursal

# Estructura del proyecto 
├── config.php
├── controladores
│   ├── Horario.php
│   ├── Persona.php
│   ├── Producto.php
│   ├── Reserva.php
│   ├── Sucursal.php
│   ├── SucursalProducto.php
│   └── SucursalTrabajador.php
├── lib
│   ├── adodb5
│   ├── css
│   ├── db.php
│   ├── fonts
│   ├── images
│   ├── js
│   └── less
├── modelos
│   ├── horario.php
│   ├── persona.php
│   ├── producto.php
│   ├── reserva.php
│   ├── sucursal.php
│   ├── sucursal_producto.php
│   └── sucursal_trabajador.php
├── nbproject
│   ├── private
│   ├── project.properties
│   └── project.xml
├── services.php
└── vistas
    ├── asignaproductos.php
    ├── asignatrabajador.php
    ├── personas.php
    ├── productos.php
    ├── reservas.php
    └── sucursales.php

