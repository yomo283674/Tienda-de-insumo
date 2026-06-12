CREATE TABLE `roles` (
  `id_rol` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100),
  `descripcion` varchar(255),
  `estado` boolean
);

CREATE TABLE `permisos` (
  `id_permiso` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100),
  `descripcion` varchar(255)
);

CREATE TABLE `rol_permiso` (
  `id_rol` int,
  `id_permiso` int
);

CREATE TABLE `usuarios` (
  `id_usuario` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(150),
  `email` varchar(150) UNIQUE,
  `password` varchar(255),
  `estado` boolean,
  `id_rol` int NOT NULL
);

CREATE TABLE `sesiones` (
  `id_sesion` int PRIMARY KEY AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `fecha_inicio` datetime,
  `fecha_fin` datetime,
  `ip` varchar(50),
  `dispositivo` varchar(255),
  `estado` varchar(20)
);

CREATE TABLE `vendedores` (
  `id_vendedor` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(150),
  `telefono` varchar(30),
  `email` varchar(150),
  `estado` boolean
);

CREATE TABLE `clientes` (
  `id_cliente` int PRIMARY KEY AUTO_INCREMENT,
  `documento` varchar(30) UNIQUE,
  `nombre` varchar(150),
  `direccion` varchar(255),
  `telefono` varchar(30),
  `email` varchar(150),
  `estado` boolean
);

CREATE TABLE `proveedores` (
  `id_proveedor` int PRIMARY KEY AUTO_INCREMENT,
  `nit` varchar(30) UNIQUE,
  `razon_social` varchar(150),
  `direccion` varchar(255),
  `telefono` varchar(30),
  `email` varchar(150),
  `estado` boolean
);

CREATE TABLE `categorias` (
  `id_categoria` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100),
  `descripcion` text,
  `estado` boolean
);

CREATE TABLE `productos` (
  `id_producto` int PRIMARY KEY AUTO_INCREMENT,
  `codigo` varchar(50) UNIQUE,
  `nombre` varchar(150),
  `descripcion` text,
  `id_categoria` int NOT NULL,
  `precio_compra` decimal(12,2),
  `precio_venta` decimal(12,2),
  `stock_minimo` int,
  `unidad` varchar(30),
  `estado` boolean
);

CREATE TABLE `inventarios` (
  `id_inventario` int PRIMARY KEY AUTO_INCREMENT,
  `id_producto` int UNIQUE,
  `stock_actual` int,
  `stock_minimo` int,
  `fecha_ultima_actualizacion` datetime
);

CREATE TABLE `entradas_inventario` (
  `id_entrada` int PRIMARY KEY AUTO_INCREMENT,
  `fecha` datetime,
  `id_proveedor` int NOT NULL,
  `id_usuario` int NOT NULL,
  `total` decimal(12,2),
  `observaciones` text
);

CREATE TABLE `detalle_entrada` (
  `id_detalle_entrada` int PRIMARY KEY AUTO_INCREMENT,
  `id_entrada` int NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad` int,
  `precio_compra` decimal(12,2),
  `subtotal` decimal(12,2)
);

CREATE TABLE `ventas` (
  `id_venta` int PRIMARY KEY AUTO_INCREMENT,
  `fecha` datetime,
  `id_cliente` int NOT NULL,
  `id_vendedor` int NOT NULL,
  `subtotal` decimal(12,2),
  `descuento` decimal(12,2),
  `impuesto` decimal(12,2),
  `total` decimal(12,2),
  `estado` varchar(50)
);

CREATE TABLE `detalle_venta` (
  `id_detalle_venta` int PRIMARY KEY AUTO_INCREMENT,
  `id_venta` int NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad` int,
  `precio_venta` decimal(12,2),
  `descuento` decimal(12,2),
  `subtotal` decimal(12,2)
);

CREATE TABLE `facturas` (
  `id_factura` int PRIMARY KEY AUTO_INCREMENT,
  `numero` varchar(50) UNIQUE,
  `id_venta` int UNIQUE NOT NULL,
  `fecha` datetime,
  `subtotal` decimal(12,2),
  `impuesto` decimal(12,2),
  `total` decimal(12,2),
  `estado` varchar(50)
);

CREATE TABLE `pagos` (
  `id_pago` int PRIMARY KEY AUTO_INCREMENT,
  `id_venta` int NOT NULL,
  `fecha` datetime,
  `metodo_pago` varchar(50),
  `monto` decimal(12,2),
  `referencia` varchar(100)
);

CREATE TABLE `gastos` (
  `id_gasto` int PRIMARY KEY AUTO_INCREMENT,
  `fecha` datetime,
  `concepto` varchar(255),
  `monto` decimal(12,2),
  `tipo` varchar(50),
  `id_proveedor` int,
  `id_usuario` int NOT NULL,
  `observaciones` text
);

CREATE TABLE `movimientos_inventario` (
  `id_movimiento` int PRIMARY KEY AUTO_INCREMENT,
  `fecha` datetime,
  `tipo` varchar(30),
  `id_producto` int NOT NULL,
  `cantidad` int,
  `stock_anterior` int,
  `stock_nuevo` int,
  `observaciones` text,
  `id_usuario` int NOT NULL
);

CREATE TABLE `auditorias` (
  `id_auditoria` int PRIMARY KEY AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `tabla` varchar(100),
  `accion` varchar(50),
  `descripcion` text,
  `fecha` datetime
);

CREATE TABLE `notificaciones` (
  `id_notificacion` int PRIMARY KEY AUTO_INCREMENT,
  `titulo` varchar(150),
  `mensaje` text,
  `tipo` varchar(50),
  `leida` boolean,
  `fecha` datetime,
  `id_usuario` int
);

CREATE TABLE `respaldos` (
  `id_respaldo` int PRIMARY KEY AUTO_INCREMENT,
  `fecha` datetime,
  `nombre_archivo` varchar(255),
  `ruta_archivo` varchar(255),
  `observacion` text,
  `id_usuario` int
);

CREATE TABLE `configuraciones` (
  `id_configuracion` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_empresa` varchar(150),
  `nit` varchar(30),
  `direccion` varchar(255),
  `telefono` varchar(30),
  `email` varchar(150),
  `impuesto` decimal(5,2),
  `moneda` varchar(10),
  `fecha_actualizacion` datetime
);

CREATE TABLE `reportes` (
  `id_reporte` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(150),
  `descripcion` text,
  `tipo` varchar(50),
  `fecha_generacion` datetime,
  `formato` varchar(20),
  `id_usuario` int
);

ALTER TABLE `usuarios` ADD FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);

ALTER TABLE `rol_permiso` ADD FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);

ALTER TABLE `rol_permiso` ADD FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id_permiso`);

ALTER TABLE `sesiones` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

ALTER TABLE `productos` ADD FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

ALTER TABLE `inventarios` ADD FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

ALTER TABLE `entradas_inventario` ADD FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`);

ALTER TABLE `entradas_inventario` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

ALTER TABLE `detalle_entrada` ADD FOREIGN KEY (`id_entrada`) REFERENCES `entradas_inventario` (`id_entrada`);

ALTER TABLE `detalle_entrada` ADD FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

ALTER TABLE `ventas` ADD FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

ALTER TABLE `ventas` ADD FOREIGN KEY (`id_vendedor`) REFERENCES `vendedores` (`id_vendedor`);

ALTER TABLE `detalle_venta` ADD FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`);

ALTER TABLE `detalle_venta` ADD FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

ALTER TABLE `facturas` ADD FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`);

ALTER TABLE `pagos` ADD FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`);

ALTER TABLE `gastos` ADD FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`);

ALTER TABLE `gastos` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

ALTER TABLE `movimientos_inventario` ADD FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

ALTER TABLE `movimientos_inventario` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

ALTER TABLE `auditorias` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

ALTER TABLE `notificaciones` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

ALTER TABLE `respaldos` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

ALTER TABLE `reportes` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
