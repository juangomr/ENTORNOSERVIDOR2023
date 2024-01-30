<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca AQUI NO SE LEE NUNCA</title>
    <link href="css/estilos.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>

<body>

    <header>
        <nav>
            <ul class="UlMenuTop ">
                <img class="logo" src="imagenes/logoBiblioteca-removebg-preview.png">
                <li class="listasMenuTop"><a class="sinBarraVertical" href="#">Biblioteca</a></li>
                <li class="listasMenuTop"><a class="enlacesMenuTop" href="insertarLibro.php">Libros</a></li>
                <li class="push-right"><a class="sinBarraVertical" href="inicioSesion.php">INICIAR SESION</a></li>
                <li class="listasMenuTop"><a class="conBarraVerticalDerecha" href="registro.php">REGISTRARSE</a></li>
                <div class="carro">
                    <img class="carrito" src="imagenes/carrito-removebg-preview.png">
                    <li class="listasMenuTop"><a class="sinBarraVertical" data-bs-toggle="modal"
                            data-bs-target="#modal_cart">CARRITO
                        </a></li>
                </div>
                <div class="buscador">
                    <form>
                        <input type="text" placeholder="Buscar productos..." />
                    </form>
                    <img class="lupa" src="imagenes/lupa-removebg-preview.png">
                </div>
            </ul>
        </nav>

    </header>
    <div class="container">
        <div class="products">

            <h1 class="heading">Últimos libros</h1>

            <div class="box-container">

                <?php
                include "conectarBBDD.php";
                $consulta = mysqli_query($conn, "SELECT * FROM libros");
                if (mysqli_num_rows($consulta) > 0) {
                    while ($resultado = mysqli_fetch_assoc($consulta)) {
                        ?>
                        <div class="box">
                            <p class="name">
                                <?php echo $resultado['descripcion']; ?>
                            </p>
                            <img src="imagenes/<?php echo $resultado['imagen']; ?>" alt="" />
                            <p class="autor">
                                <strong>Autor:</strong>
                                <?php echo $resultado['autor']; ?>
                            </p>
                            <p class="descripcion">
                                <strong>Editorial:</strong>
                                <?php echo $resultado['editorial']; ?>
                            </p>
                            <p class="descripcion">
                                <strong> Género literario:</strong>
                                <?php echo $resultado['genero']; ?>
                            </p>
                            <p class="descripcion">
                                <strong>Fecha Publicación:</strong>
                                <?php echo $resultado['fecha_publicacion']; ?>
                            </p>
                            <p class="price">

                                <?php echo $resultado['precio']; ?>€
                            </p>

                            <div class="botones">
                                <button type="button" class="btn btn-primary" name="agregarCarrito">Agregar al carrito</button>
                                <button type="button" class="btn btn-danger" name="eliminarCarrito">Eliminar del
                                    carrito</button>

                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

        </div>

    </div>

    <div class="modal fade" id="modal_cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</body>