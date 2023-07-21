<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Retro Groove</title>
	<link rel="stylesheet" href="assets/css/index.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel="stylesheet" href="assets/css/chat.css">
	<link rel="stylesheet" href="assets/css/home.css">

</head>

<body>
	<?php include('includes/headerIndex.php'); ?>
	<main>
		<section class="home">
			<div class="video-wrapper">
				<video class="video" src="assets/video/banner__video.mp4" autoplay muted loop></video>
			</div>
			<div class="contenido">
				<div class="logo-container">
					<img src="assets/images/logo_retro_groove.png" alt="Logo Retro Groove" class="logo">
				</div>
				<a href="catalogo/pag-1.php" class="btn__shop__now">COMPRAR AHORA</a>
			</div>
		</section>
		<section>
			<div class="banner-badget">
				<div class="banner-message">
					<h3>Tienda Online de ropa vintage</h3>
				</div>
				<!-- Pie de pagina primaria -->
				<div class="badget__primario" id="batgets">
					<!-- Insignias de pie de pagina -->
					<div class="badget">
						<div class="badget__image">
							<img src="https://img.icons8.com/dotty/80/null/security-checked.png" />
						</div>
						<h3>PAGOS EN LINEA</h3>
						<p>Realiza tu compra de manera segura desde la comodidad el lugar en que te encuentres</p>
					</div>
					<div class="badget">
						<div class="badget__image">
							<div class="badget__image">
								<img src="https://img.icons8.com/wired/64/null/delivery.png" />
							</div>
						</div>
						<h3>ENVIOS SEGUROS</h3>
						<p>Enviamos tus productos con todas las medidas de seguridad y de manera confiable</p>
					</div>
					<div class="badget">
						<div class="badget__image">
							<img src="https://img.icons8.com/ios/50/null/card-security.png" />
						</div>
						<h3>PAGA FACIL</h3>
						<p>Realiza el pago de tu compra de manera segura con cualquier tipo de tarjeta de crédito o
							débito.
						</p>
					</div>
				</div>
			</div>

		</section>
		<div class="home-container">
			<div class="banner-home">
				<div class="banner-croptop">
					<a href="colecciones/basics-crop-tops.php">
						<h3>CROP TOPS & CAMISETAS</h3>
					</a>
				</div>
			</div>
			<div class="banner-home">
				<div class="banner-collage">
					<div class="banner-casaca"><a href="colecciones/casacas-vintage.php">
							<h3>CASACAS VINTAGE</h3>
						</a></div>
				</div>
				<div class="banner-collage">
					<div class="banner-blusa"><a href="colecciones/blusas-vintage.php">
							<h3>BLUSAS VINTAGE</h3>
						</a></div>
				</div>
			</div>
		</div>
		<div class="newsletter-container">
			<div class="newsletter">
				<h3>SE EL PRIMERO EN SABER</h3>
				<p>Obtenga información exclusiva sobre nuevos productos, tutoriales, consejos y más. </p>
				<form action="https://formspree.io/f/xleydgqn" method="POST">
					<input type="email" id="email" placeholder="Ingresa tu email" required name="Nuevo suscriptor:">
					<button type="submit">Enviar</button>
				</form>
			</div>
		</div>
		<!-- CHAT BAR BLOCK -->
		<div class="chat-bar-collapsible">
			<button id="chat-button" type="button" class="collapsible">RETRO GROOVE
			</button>

			<div class="content">
				<div class="full-chat-block">
					<!-- Message Container -->
					<div class="outer-container">
						<div class="chat-container">
							<!-- Messages -->
							<div id="chatbox">
								<h5 id="chat-timestamp"></h5>
								<p id="botStarterMessage" class="botText"><span>Loading...</span></p>
							</div>

							<!-- User input box -->
							<div class="chat-bar-input-block">
								<div id="userInput">
									<input id="textInput" class="input-box" type="text" name="msg" placeholder="Escribe tu duda aqui">
									<p></p>
								</div>

								<div class="chat-bar-icons">
									<i id="chat-icon" style="color: crimson;" class="fa fa-fw fa-heart" onclick="heartButton()"></i>
									<i id="chat-icon" style="color: #333;" class="fa fa-fw fa-send" onclick="sendButton()"></i>
								</div>
							</div>
							<div id="chat-bar-bottom">
								<p></p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</main>
	<footer>
		<div class="footer_container" id="footerContainer">
			<!-- Pie de pagina secundaria-->
			<div class="footer__secundario">
				<div class="footer__container">

					<div class="footer__container__box">
						<h2>ATENCIÓN AL CLIENTE</h2>
						<a href="" target="_blank">Cambios y devoluciones</a>
						<a href="nosotros-colecciones/politicaPrivacidad.php" target="_blank">Política de Privacidad</a>
						<a href="">Términos y condiciones</a>
					</div>
					<div class="footer__container__box">
						<h2>ACERCA DE NOSOTROS</h2>
						<a href="nosotros-colecciones/nosotros.php">¿Quienes somos?</a>
					</div>
					<div class="footer__container__box">
						<h2>REDES SOCIALES</h2>
						<div class="redes-sociales">
							<a class="fb-link" href="https://www.facebook.com/RetroGroove.store/" target="_blank"><img src="assets/images/s1.svg" class="icono-red-social"></a>
							<a class="tw-link" href="https://twitter.com/RetroG_store" target="_blank"><img src="assets/images/s2.svg" class="icono-red-social">
							</a>
							<a class="ins-link" href="https://www.instagram.com/retrogroove.store/" target="_blank"><img src="assets/images/s3.svg" alt="Instagram" class="icono-red-social">
							</a>
						</div>
					</div>
					<div class="footer__container__box">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3291.098982980104!2d150.89169797532367!3d-34.42424077301909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b1319f490a5c59f%3A0x78d3e669d60d76b!2sRetro%20Groove!5e0!3m2!1ses-419!2spe!4v1687499830958!5m2!1ses-419!2spe" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
			</div>
		</div>
		<div class="footer__copyright">
			<p>&copy; 2023 <span class="color__activo">Retro Groove</span>. Todos los derechos reservados.</p>
		</div>
		</div>
	</footer>
	<script>
		const $form = document.querySlector('#form')
		$form.addEventListener('submit',handlesubmit)
		
		async function handleSubmit(event){
			event.preventDefault()
			const form = new FormData(this) 
			const responde = await fetch(this.action,{
				method: this.method,
				body: form,
				headers: {
					'Accept' : 'application/json'
				}
			})
			if(response.ok){
				$this.reset()
				alert('Gracias por suscribirte')
			}
		}


	</script>
</body>
<script src="js/answers.js"></script>
<script src="js/chat.js"></script>

</html>