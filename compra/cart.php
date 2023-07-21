<?php
session_start();
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="../assets/css/cart.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

</head>

<body>
    <?php include('../includes/header.php'); ?>
    <main>
        <h1 class="title__contenido">CARRITO</h1>
        <div id="cart__container">
            <?php
            include("../php/conexion.php");
            $user_id = $_SESSION['user_id'];

            // Verificar si se ha enviado un nuevo producto para agregar al carrito
            if (isset($_GET['product_id'])) {
                $product_id = $_GET['product_id'];

                // Verificar si existe un carrito de compras activo para el usuario actual
                $queryActiveCart = "SELECT * FROM Carrito_de_compras WHERE user_id = ? AND status = 'activo'";
                $stmtActiveCart = $conn->prepare($queryActiveCart);
                $stmtActiveCart->bind_param("i", $user_id);
                $stmtActiveCart->execute();
                $resultActiveCart = $stmtActiveCart->get_result();

                if ($resultActiveCart && mysqli_num_rows($resultActiveCart) > 0) {
                    // Si existe un carrito activo, agregar el producto al carrito existente
                    $cart = $resultActiveCart->fetch_assoc();
                    $cart_id = $cart['cart_id'];
                } else {
                    // Si no existe un carrito activo, crear uno nuevo
                    $queryCreateCart = "INSERT INTO Carrito_de_compras (user_id, created_at, status) VALUES (?, NOW(), 'activo')";
                    $stmtCreateCart = $conn->prepare($queryCreateCart);
                    $stmtCreateCart->bind_param("i", $user_id);
                    if ($stmtCreateCart->execute()) {
                        $cart_id = $stmtCreateCart->insert_id;
                    } else {
                        echo "Error al crear el carrito de compras: " . $conn->error;
                    }
                }
                if (isset($_GET['talla'])) {
                    $talla = $_GET['talla'];
                    // Obtener el ID de la talla
                    $queryGetTallaID = "SELECT talla_id FROM Tallas WHERE talla_nombre = ?";
                    $stmtGetTallaID = $conn->prepare($queryGetTallaID);
                    $stmtGetTallaID->bind_param("s", $talla);
                    $stmtGetTallaID->execute();
                    $resultGetTallaID = $stmtGetTallaID->get_result();
                    if ($resultGetTallaID && mysqli_num_rows($resultGetTallaID) > 0) {
                        $tallaRow = $resultGetTallaID->fetch_assoc();
                        $talla_id = $tallaRow['talla_id'];
                    }
                    // Verificar si el producto ya está en el carrito con la misma talla
                    $queryCheckProduct = "SELECT * FROM Elementos_del_carrito WHERE cart_id = ? AND product_id = ? AND producto_talla_id = ?";
                    $stmtCheckProduct = $conn->prepare($queryCheckProduct);
                    $stmtCheckProduct->bind_param("iii", $cart_id, $product_id, $talla_id);
                    $stmtCheckProduct->execute();
                    $resultCheckProduct = $stmtCheckProduct->get_result();
                    if ($resultGetTallaID && mysqli_num_rows($resultGetTallaID) > 0) {
                        if ($resultCheckProduct && mysqli_num_rows($resultCheckProduct) > 0) {
                            echo "El producto ya está en el carrito con la misma talla.";
                        } else {
                            // Insertar el producto en el carrito
                            $queryInsertProduct = "INSERT INTO Elementos_del_carrito (cart_id, product_id, producto_talla_id, quantity) VALUES (?, ?, ?, 1)";
                            $stmtInsertProduct = $conn->prepare($queryInsertProduct);
                            $stmtInsertProduct->bind_param("iii", $cart_id, $product_id, $talla_id);
                            if ($stmtInsertProduct->execute()) {
                                echo "Producto agregado al carrito correctamente.";
                            } else {
                                echo "Error al agregar el producto al carrito: " . $conn->error;
                            }
                        }
                    }
                } else {
                    // Verificar si el producto ya está en el carrito sin talla
                    $queryCheckProduct = "SELECT * FROM Elementos_del_carrito WHERE cart_id = ? AND product_id = ? AND producto_talla_id IS NULL";
                    $stmtCheckProduct = $conn->prepare($queryCheckProduct);
                    $stmtCheckProduct->bind_param("ii", $cart_id, $product_id);
                    $stmtCheckProduct->execute();
                    $resultCheckProduct = $stmtCheckProduct->get_result();

                    if ($resultCheckProduct && mysqli_num_rows($resultCheckProduct) > 0) {
                        echo "El producto ya está en el carrito.";
                    } else {
                        // Insertar el producto en el carrito sin talla
                        $queryInsertProduct = "INSERT INTO Elementos_del_carrito (cart_id, product_id, quantity, producto_talla_id) VALUES (?, ?, 1, NULL)";
                        $stmtInsertProduct = $conn->prepare($queryInsertProduct);
                        $stmtInsertProduct->bind_param("ii", $cart_id, $product_id);
                        if ($stmtInsertProduct->execute()) {
                            echo "Producto agregado al carrito correctamente.";
                        } else {
                            echo "Error al agregar el producto al carrito: " . $conn->error;
                        }
                    }
                }
            }

            // Verificar si se ha enviado un ID de elemento del carrito para eliminar
            if (isset($_GET['delete_item_id'])) {
                $delete_item_id = $_GET['delete_item_id'];

                // Eliminar el elemento del carrito
                $queryDeleteItem = "DELETE FROM Elementos_del_carrito WHERE item_id = ?";
                $stmtDeleteItem = $conn->prepare($queryDeleteItem);
                $stmtDeleteItem->bind_param("i", $delete_item_id);
                if ($stmtDeleteItem->execute()) {
                    echo "Producto eliminado del carrito correctamente.";
                } else {
                    echo "Error al eliminar el producto del carrito: " . $conn->error;
                }
            }

            // Obtener el carrito de compras activo del usuario actual
            $queryActiveCart = "SELECT * FROM Carrito_de_compras WHERE user_id = ? AND status = 'activo'";
            $stmtActiveCart = $conn->prepare($queryActiveCart);
            $stmtActiveCart->bind_param("i", $user_id);
            $stmtActiveCart->execute();
            $resultActiveCart = $stmtActiveCart->get_result();

            if ($resultActiveCart && $resultActiveCart->num_rows > 0) {
                $cart = $resultActiveCart->fetch_assoc();
                $cart_id = $cart['cart_id'];

                // Obtener los productos del carrito actual
                $queryProductos = "SELECT e.item_id, e.quantity, p.product_name, p.precio, p.image, p.stock, t.talla_nombre FROM Productos p INNER JOIN Elementos_del_carrito e ON p.product_id = e.product_id LEFT JOIN Tallas t ON e.producto_talla_id = t.talla_id WHERE e.cart_id = ?";
                $stmtProductos = $conn->prepare($queryProductos);
                $stmtProductos->bind_param("i", $cart_id);
                $stmtProductos->execute();
                $resultProductos = $stmtProductos->get_result();

                if ($resultProductos && $resultProductos->num_rows > 0) {
                    echo '<table class="cart-table">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Articulo</th>';
                    echo '<th>Precio</th>';
                    echo '<th>Cantidad</th>';
                    echo '<th>Subtotal</th>';
                    echo '<th>Eliminar</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    // Mostrar los productos del carrito actual
                    while ($row = $resultProductos->fetch_assoc()) {
            ?>
                        <tr>
                            <td class="articulo__cart">
                                <img src="../assets/images/products/<?= $row['image'] ?>" alt="<?= $row['product_name'] ?>">
                                <a href=""><?= $row['product_name'] ?></a>
                                <span class="talla"><?php echo $row['talla_nombre']; ?></span>
                            </td>
                            <td><span class="precio" data-precio="<?= $row['precio'] ?>">S/. <?= $row['precio'] ?></span></td>
                            <td>
                                <div class="quantity-input">
                                    <button class="quitar-btn" onclick="quitarCantidad(<?= $row['item_id'] ?>)" data-item-id="<?= $row['item_id'] ?>">-</button>
                                    <input type="text" class="quantity" value="<?= $row['quantity'] ?>" min="1" max="<?= $row['stock'] ?>" data-item-id="<?= $row['item_id'] ?>" data-stock="<?= $row['stock'] ?>" onchange="actualizarSubtotal(this)">
                                    <button class="agregar-btn" onclick="aumentarCantidad(<?= $row['item_id'] ?>)" data-stock="<?= $row['stock'] ?>">+</button>
                                </div>

                            </td>
                            <td class="subtotal" id="subtotal_<?= $row['item_id'] ?>">S/. <?= number_format($row['precio'] * $row['quantity'], 2) ?></td>
                            <td><a href="?delete_item_id=<?= $row['item_id'] ?>">Eliminar</a></td>
                        </tr>
            <?php
                    }
                    echo '<tr>';
                    echo '<td colspan="4"></td>';
                    echo '<td></td>';
                    echo '</tr>';
                    echo '</tbody>';
                    echo '</table>';
                    echo '<div class="btn-pays-container">';
                    echo '<div class="btn-pays">';
                    echo '<form action="informacion.php?cart_id=' . $cart_id . '" method="POST">';
                    echo '<input type="hidden" name="total" value="<?php echo $total; ?>">';
                    echo '<button type="submit" id="buy__button">IR A PAGAR : <span id="total">S/. 0.00</span></button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo '<p>No hay productos en el carrito.</p>';
                }
            } else {
                echo '<p>No hay carrito de compras activo.</p>';
            }
            ?>
        </div>
    </main>


    <?php include('../includes/footer.php'); ?>
    <script>
        function actualizarTotal() {
            let total = 0;
            const subtotales = document.querySelectorAll('.subtotal');

            subtotales.forEach(subtotal => {
                const subtotalValue = parseFloat(subtotal.textContent.replace('S/. ', ''));
                total += subtotalValue;
            });

            const totalElement = document.getElementById('total');
            totalElement.textContent = `S/. ${total.toFixed(2)}`;
        }

        function aumentarCantidad(itemID) {
            console.log('Aumentar cantidad:', itemID);
            const button = document.querySelector(`button[data-item-id="${itemID}"]`);
            if (button) {
                const quantityInput = button.closest('tr').querySelector('input.quantity');
                if (quantityInput) {
                    const cantidad = parseInt(quantityInput.value);
                    const stock = parseInt(quantityInput.getAttribute('data-stock'));
                    console.log('Botón:', button);
                    console.log('Campo de cantidad:', quantityInput);

                    if (cantidad < stock) {
                        quantityInput.value = cantidad + 1;
                        actualizarSubtotal(quantityInput);
                        actualizarCantidad(quantityInput);
                        actualizarTotal(); // Actualizar el total cuando se aumenta la cantidad
                    }
                }
            }
        }

        function quitarCantidad(itemID) {
            console.log('Quitar cantidad:', itemID);
            const button = document.querySelector(`button[data-item-id="${itemID}"]`);
            if (button) {
                const quantityInput = button.closest('tr').querySelector('input.quantity');
                if (quantityInput) {
                    const cantidad = parseInt(quantityInput.value);
                    console.log('Botón:', button);
                    console.log('Campo de cantidad:', quantityInput);

                    if (cantidad > 1) {
                        quantityInput.value = cantidad - 1;
                        actualizarSubtotal(quantityInput);
                        actualizarCantidad(quantityInput);
                        actualizarTotal(); // Actualizar el total cuando se disminuye la cantidad
                    }
                }
            }
        }

        function actualizarSubtotal(input) {
            const quantity = parseInt(input.value);
            const precio = parseFloat(input.closest('tr').querySelector('.precio').getAttribute('data-precio'));
            const subtotal = quantity * precio;
            const subtotalElement = input.closest('tr').querySelector('.subtotal');
            subtotalElement.textContent = `S/. ${subtotal.toFixed(2)}`;
        }
        actualizarTotal();
        console.log('Cargaaa');

        function actualizarCantidad(input) {
            var item_id = input.getAttribute('data-item-id');
            var cantidad = input.value;

            $.ajax({
                url: 'actualizar_cantidad.php',
                method: 'POST',
                data: {
                    item_id: item_id,
                    cantidad: cantidad
                },
                success: function(response) {
                    // Mostrar mensaje de éxito o realizar otras acciones necesarias
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Mostrar mensaje de error o manejar el error de otra forma
                    console.error(error);
                }
            });
        }
    </script>
</body>

</html>