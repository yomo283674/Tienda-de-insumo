# Documentación del Proyecto: AgroStock

## 1. Arquitectura del Proyecto

El sistema sigue el patrón de diseño **MVC (Modelo-Vista-Controlador)**, estructurando el código de la siguiente manera:

*   **`models/`**: Contiene las clases que interactúan directamente con la base de datos MySQL (por ejemplo, `usuario.php` maneja la conexión, registro y validación de usuarios).
*   **`views/`**: Contiene las interfaces gráficas (HTML/PHP con Bootstrap 5 y CSS personalizado). Aquí se encuentran las pantallas como el inicio público (`index.php`), el login y el registro (`views/auth/`).
*   **`controllers/`**: Actúan como intermediarios entre las Vistas y los Modelos. Reciben las peticiones del usuario (por ejemplo, enviar un formulario), validan los datos y llaman al modelo para interactuar con la base de datos (por ejemplo, `registerController.php`).
*   **`public/`**: Es el punto de entrada público, donde se aloja el archivo `index.php` (Landing Page) y recursos accesibles directamente.
*   **`configuracion/`**: Almacena archivos clave como `database.php` para centralizar la conexión a la base de datos.

## 2. Lógica Principal y Flujos

### 2.1 Página de Inicio (Landing Page)
*   **Ruta:** `public/index.php`
*   **Lógica:** Presenta el producto con un diseño moderno (Glassmorphism, animaciones, Bootstrap 5). Ofrece una visión general de los módulos (Inventario, Punto de Venta, Analítica) y enlaza hacia el inicio de sesión.

### 2.2 Autenticación y Registro de Usuarios
*   **Registro (`views/auth/register.php` & `controllers/auth/registerController.php`):**
    *   El usuario ingresa nombre, email y contraseña.
    *   El controlador verifica que no existan campos vacíos, que las contraseñas coincidan y que los términos sean aceptados.
    *   Llama al modelo `Usuario` para comprobar si el email ya existe (`emailExiste`).
    *   Si es válido, registra al usuario con un rol predeterminado (ID = 3, correspondiente a "Cliente"). La contraseña se encripta de forma segura usando `PASSWORD_BCRYPT`.
*   **Inicio de Sesión (`views/auth/login.php`):**
    *   Permite al usuario autenticarse para acceder al panel de control y sus herramientas.

### 2.3 Módulos Funcionales (Proyectados)
Según la presentación del sistema, la lógica central se divide en tres pilares:
1.  **Inventario Inteligente:** Control de stock, alertas de mínimos y gestión de lotes (semillas, fertilizantes).
2.  **Punto de Venta Ágil:** Procesamiento rápido de transacciones y facturación detallada.
3.  **Analítica Avanzada:** Gráficos de rendimiento en tiempo real y reportes financieros.

## 3. Tecnologías Utilizadas

*   **Backend:** PHP (Manejo de sesiones, lógica de servidor, encriptación).
*   **Base de Datos:** MySQL (Consultas parametrizadas para evitar Inyección SQL).
*   **Frontend:** HTML5, CSS3 (Variables nativas, Glassmorphism, animaciones), Bootstrap 5 y Bootstrap Icons.
*   **Seguridad Implementada:**
    *   Contraseñas encriptadas con `password_hash`.
    *   Prevención de inyecciones SQL mediante `bind_param` de MySQLi.
    *   Validación de datos en el servidor antes de insertar.

## Resumen de la Lógica de Acción
El flujo siempre empieza en la **Vista** donde el usuario interactúa. La vista envía la información al **Controlador** (usando los métodos `POST` o `GET`), el cual verifica reglas de negocio, y si todo es correcto, instruye al **Modelo** para guardar o extraer datos de la base. Finalmente, el controlador redirige o notifica a la vista sobre el éxito o fallo de la acción, utilizando sesiones de PHP (`$_SESSION`) para enviar mensajes al usuario.
