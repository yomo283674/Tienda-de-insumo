El formulario de registro debe tener el metodo "POST" y los input deben tener los name y los id (identificadores) Tambien el formulario debe de estar conectado a RegisterControllers.php en el action de formulario. form action"


El registerControllers.php se encarga de recibir los datos del formulario de registro y enviarlos al modelo de usuario.php para que se guarden en la base de datos.

En registerControllers.php esta conectado al modelo usuario.php con require_once__DIR__