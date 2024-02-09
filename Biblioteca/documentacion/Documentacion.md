![Logo de la empresa](logoBiblioteca-removebg-preview.png)

# Biblioteca AQUI NO SE LEE NUNCA

## Breve descripción del proyecto

Mi proyecto comenzó con la creación de una plataforma que pudiera gestionar eficientemente la información sobre una biblioteca, permitiendo a los usuarios que sean 'Admin' realizar consultas, insertar y eliminar libros según sus necesidades. A lo largo de este trimestre, he trabajado en varios aspectos clave utilizando el lenguaje de programación PHP, HTML, CSS, Javascript, Bootstrap y haciendo uso del popular sistema de gestión de bases de datos MySQL.

El proceso comenzó con el establecimiento de una conexión a la base de datos. El archivo conectarBBDD.php se encargó de este cometido, asegurando que la aplicación pudiera acceder y manipular los datos de manera segura. Esta conexión proporcionó la base sólida sobre la cual construir el resto de la aplicación.

La interfaz principal de la biblioteca se diseñó de manera intuitiva utilizando HTML y el framework Bootstrap. Desde la página de inicio, los usuarios 'Admin' pueden navegar hacia diferentes secciones, como la consulta de libros, la inserción y la eliminación de libros, consulta de los usuarios, implementación de carrito y sistema de login y registro completo. Cada uno de estos procesos fue implementado utilizando formularios PHP, permitiendo a los usuarios 'Admin' interactuar fácilmente con la base de datos. A continuación, voy a describir cada uno de ellos:

## Carga inicial JSON de libros

- **cargaLibrosInicial.json**, Es un archivo donde se hace la primera carga de libros desde la biblioteca nacional hacia nuestra base de datos.

## Funcionalidades implementadas para el usuario Admin

- **La funcionalidad de conectar a la BBDD (conectarBBDD.php)**, Es un archivo donde se conecta automáticamente con la base de datos.

- **La funcionalidad de consulta (Libros.php)**, proporciona a los Admin la capacidad de filtrar libros según varios criterios. Esto se logró mediante la integración de consultas SQL dinámicas en el código PHP, lo que permite adaptar las búsquedas a las preferencias del Admin.

- **Para la inserción de nuevos libros (insertarLibro.php)**, se diseñó un formulario detallado que recopila información vital sobre cada libro, como el autor, la descripcion, la genero y otras características específicas. Además, se incorporó la capacidad de cargar imágenes para enriquecer la presentación visual de los libros.

- **La funcionalidad de eliminación (eliminarLibro.php)**, proporciona una forma eficiente de gestionar la base de datos. Al seleccionar propiedades específicas, los Admin pueden eliminar registros de manera sencilla. Este proceso se implementó con precaución, permitiendo a los usuarios confirmar antes de eliminar registros y almacenando detalles de los libros eliminados para referencia futura.

- **La funcionalidad de la barra de búsqueda**, proporciona una forma eficiente de filtrar el catálogo disponible de libros introduciendo palabras clave.

- **La funcionalidad de consultar el catálogo de libros (indexSesionIniciadaAdmin.php)**, proporciona una forma eficiente de consultar el catálogo disponible de libros para los usuarios Admin, de forma que se ve de forma limitada de 10 en 10 para que no se vea demasiada información y dividiendo la información en diferentes página para que no tenga un aspecto cargante.

- **La funcionalidad de validar el catálogo de libros (validacion.php)**, proporciona una forma eficiente de validar los datos introducidos al insertar el libro.

- **La funcionalidad de consultar el catálogo de usuarios (usuario.php)**, proporciona una forma eficiente de consultar el catálogo disponible de usuarios para los usuarios Admin, de forma que se ve de forma limitada de 10 en 10 para que no se vea demasiada información y dividiendo la información en diferentes página para que no tenga un aspecto cargante.

- **La funcionalidad del carrito (carrito.php)**, proporciona una forma eficiente de comprar libros en la biblioteca con las funcionalidades de añadir libros, actualizar cantidad, eliminar pedido, eliminar todos los libros...

- **La funcionalidad de tramitar el pedido (tramitarPedido.php)**, una vez que el pedido se ha concluido, se muestra una página del pedido que se ha realizado con su número de pedido, nombre de usuario, correo, dirección...

## Funcionalidades implementadas para el usuario anónimo

- **La funcionalidad de consultar el catálogo de libros (index.php)**, proporciona una forma eficiente de consultar el catálogo disponible de libros para los usuarios anónimos, de forma que se ve de forma limitada de 10 en 10 para que no se vea demasiada información y dividiendo la información en diferentes página para que no tenga un aspecto cargante.

- **La funcionalidad de la barra de búsqueda**, proporciona una forma eficiente de filtrar el catálogo disponible de libros introduciendo palabras clave.

- **La funcionalidad del registro (registro.php)**, proporciona un formulario donde se piden los datos a los usuarios que se requieren para poder obtener una cuenta. También se validan los datos introducidos para comprobar que son correctos.

## Funcionalidades implementadas para el usuario con cuenta en la Biblioteca

- **La funcionalidad del inicio de Sesión (inicioSesion.php)**, proporciona un formulario de inicio de sesión con validadores para comprobar que el usuario existe y que no ha habido errores introduciendo los datos.

- **La funcionalidad de la barra de búsqueda**, proporciona una forma eficiente de filtrar el catálogo disponible de libros introduciendo palabras clave.

- **La funcionalidad de consultar el catálogo de libros (indexSesionIniciadaUsuario.php)**, proporciona una forma eficiente de consultar el catálogo disponible de libros para los usuarios con cuenta, de forma que se ve de forma limitada de 10 en 10 para que no se vea demasiada información y dividiendo la información en diferentes página para que no tenga un aspecto cargante.

- **La funcionalidad de la barra de búsqueda**, proporciona una forma eficiente de filtrar el catálogo disponible de libros introduciendo palabras clave.

- **La funcionalidad del inicio de Sesión (inicioSesion.php)**, proporciona una forma eficiente de filtrar el catálogo disponible de libros introduciendo palabras clave.

- **La funcionalidad del carrito (carrito.php)**, proporciona una forma eficiente de comprar libros en la biblioteca con las funcionalidades de añadir libros, actualizar cantidad, eliminar pedido, eliminar todos los libros...

## Conclusiones

La aplicación se diseñó con una atención especial a la experiencia del usuario, utilizando estilos personalizados (insertarLibro.css, registro.css y estilos.css) para mejorar la presentación visual y garantizar una navegación fácil y agradable.

En conclusión, crear una Biblioteca a partir de estos códigos ha sido un ejercicio valioso en la aplicación de habilidades de desarrollo web. Desde la creación de una base de datos hasta la implementación de funciones clave, este proyecto ha sido una oportunidad para fusionar la tecnología y el mundo empresarial en la creación de una herramienta funcional y atractiva para la gestión de Bibliotecas.
