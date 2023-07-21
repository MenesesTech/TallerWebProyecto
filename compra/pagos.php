<?php
session_start();
include("../php/conexion.php");
$cart_id = $_GET['cart_id'];
if (isset($_POST["pagar"])) {
	$cart_id = $_GET['cart_id'];
	$queryUsuario = "SELECT user_id FROM Carrito_de_compras WHERE cart_id = ?";
	$stmtUsuario = $conn->prepare($queryUsuario);
	$stmtUsuario->bind_param("i", $cart_id);
	$stmtUsuario->execute();
	$resultUsuario = $stmtUsuario->get_result();
	$Usuario = $resultUsuario->fetch_assoc();
	$user_id = $Usuario['user_id'];

	// Recuperar elementos del carrito
	$querycartelements = "SELECT e.quantity, p.product_id, p.precio, t.talla_id
	FROM elementos_del_carrito e
	INNER JOIN productos p ON e.product_id = p.product_id
	LEFT JOIN tallas t ON e.producto_talla_id = t.talla_id
	WHERE e.cart_id = ?";
	$stmt = $conn->prepare($querycartelements);
	$stmt->bind_param("i", $cart_id);
	$stmt->execute();
	$result = $stmt->get_result();
	$status = 'pendiente';
	$created_at = date('Y-m-d H:i:s');

	$queryPedido = "INSERT INTO PEDIDO (user_id, created_at, status, total) VALUES (?, ?, ?, ?)";
	$stmtPedido = $conn->prepare($queryPedido);
	$stmtPedido->bind_param("issd", $user_id, $created_at, $status, $total);
	$stmtPedido->execute();

	// Obtener el ID del pedido recién insertado
	$pedido_id = $stmtPedido->insert_id;

	$queryDetalle = "INSERT INTO DETALLE_PEDIDO (pedido_id, product_id, producto_talla_id, quantity) VALUES (?, ?, ?, ?)";
	$stmtDetalle = $conn->prepare($queryDetalle);
	$stmtDetalle->bind_param("iiii", $pedido_id, $product_id, $producto_talla_id, $quantity);

	$total = 0; // Inicializar la variable $total

	while ($row = $result->fetch_assoc()) {
		$product_id = $row['product_id'];
		$producto_talla_id = $row['talla_id'];
		$quantity = $row['quantity'];
		$precio = $row['precio'];
		$subTotal = $precio * $quantity;
		$total += $subTotal;

		$stmtDetalle->execute();
	}

	// Actualizar el total en la tabla de pedidos
	$queryPedidoUpdate = "UPDATE PEDIDO SET total = ? WHERE pedido_id = ?";
	$stmtPedidoUpdate = $conn->prepare($queryPedidoUpdate);
	$stmtPedidoUpdate->bind_param("di", $total, $pedido_id);
	$stmtPedidoUpdate->execute();

	$queryEliminar = "DELETE FROM elementos_del_carrito WHERE cart_id = ?";
	$stmtEliminar = $conn->prepare($queryEliminar);
	$stmtEliminar->bind_param("i", $cart_id);
	$stmtEliminar->execute();

	$queryEliminarCarrito = "DELETE FROM carrito_de_compras WHERE cart_id = ?";
	$stmtEliminarCart = $conn->prepare($queryEliminarCarrito);
	$stmtEliminarCart->bind_param("i", $cart_id);
	$stmtEliminarCart->execute();

	// Mostrar una alerta de compra exitosa con JavaScript
	echo '
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .modal-container {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 9999;
        }

        .modal {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .modal h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .modal p {
            margin: 10px 0;
            font-size: 16px;
            color: #666;
        }

        .modal button {
            background-color: #47a386;
            border: 0;
            border-radius: 5px;
            color: #fff;
            font-size: 14px;
            padding: 10px 25px;
            cursor: pointer;
        }
    </style>
    
    <div class="modal-container">
        <div class="modal">
            <h1>Compra exitosa</h1>
            <p>Tu compra ha sido procesada correctamente.</p>
		    <a href="../index.php"><button id="close">Cerrar</button></a>
        </div>
    </div>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Formulario de Tarjeta de Crédito Dinámico</title>
	<link href="https://fonts.googleapis.com/css?family=Lato|Liu+Jian+Mao+Cao&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/pagos.css">
</head>

<body>
	<div class="pay-contenedor">
		<a href="cart.php?cart_id=<?php echo $cart_id; ?>" class="pay-card">Volver a la tienda</a>
	</div>
	<div class="contenedor">

		<!-- Tarjeta -->
		<section class="tarjeta" id="tarjeta">
			<div class="delantera">
				<div class="logo-marca" id="logo-marca">
					<!-- <img src="img/logos/visa.png" alt=""> -->
				</div>
				<img src="../assets/images/chip-tarjeta.png" class="chip" alt="">
				<div class="datos">
					<div class="grupo" id="numero">
						<p class="label">Número Tarjeta</p>
						<p class="numero">#### #### #### ####</p>
					</div>
					<div class="flexbox">
						<div class="grupo" id="nombre">
							<p class="label">Nombre Tarjeta</p>
							<p class="nombre"></p>
						</div>

						<div class="grupo" id="expiracion">
							<p class="label">Expiracion</p>
							<p class="expiracion"><span class="mes">MM</span> / <span class="year">AA</span></p>
						</div>
					</div>
				</div>
			</div>

			<div class="trasera">
				<div class="barra-magnetica"></div>
				<div class="datos">
					<div class="grupo" id="firma">
						<p class="label">Firma</p>
						<div class="firma">
							<p></p>
						</div>
					</div>
					<div class="grupo" id="ccv">
						<p class="label">CCV</p>
						<p class="ccv"></p>
					</div>
				</div>
				<p class="leyenda">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus exercitationem, voluptates illo.</p>
				<a href="#" class="link-banco">www.tubanco.com</a>
			</div>
		</section>

		<!-- Contenedor Boton Abrir Formulario -->
		<div class="contenedor-btn">
			<button class="btn-abrir-formulario" id="btn-abrir-formulario">
				<i class="fas fa-plus"></i>
			</button>
		</div>

		<!-- Formulario -->
		<form action="" id="formulario-tarjeta" class="formulario-tarjeta" method="POST">
			<div class="grupo">
				<label for="inputNumero">Número Tarjeta</label>
				<input type="text" id="inputNumero" maxlength="19" autocomplete="off" required="">
			</div>
			<div class="grupo">
				<label for="inputNombre">Nombre</label>
				<input type="text" id="inputNombre" maxlength="19" autocomplete="off" required="">
			</div>
			<div class="flexbox">
				<div class="grupo expira">
					<label for="selectMes">Expiracion</label>
					<div class="flexbox">
						<div class="grupo-select">
							<select name="mes" id="selectMes">
								<option disabled selected>Mes</option>
							</select>
							<i class="fas fa-angle-down"></i>
						</div>
						<div class="grupo-select">
							<select name="year" id="selectYear">
								<option disabled selected>Año</option>
							</select>
							<i class="fas fa-angle-down"></i>
						</div>
					</div>
				</div>

				<div class="grupo ccv">
					<label for="inputCCV">CCV</label>
					<input type="text" id="inputCCV" maxlength="3">
				</div>
			</div>
			<button type="submit" class="btn-enviar" name="pagar">Enviar</button>
		</form>
	</div>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
	<script src="../js/main.js"></script>
</body>

</html>