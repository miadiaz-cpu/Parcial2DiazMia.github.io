<?php
// CONFIGURACIÓN
$destinatario = "mia.diaz@davinicedu.ar";
$asunto = "Nuevo mensaje desde el formulario de contacto";

// DATOS DEL FORMULARIO
$nombre   = $_POST['nombre']   ?? '';
$apellido = $_POST['apellido'] ?? '';
$correo   = $_POST['correo']   ?? '';
$especie  = $_POST['especie']  ?? '';
$mensaje  = $_POST['mensaje']  ?? '';

// VALIDACIÓN SIMPLE
if (empty($nombre) || empty($apellido) || empty($correo) || empty($mensaje)) {
  echo '<div class="container text-center mt-5">
          <div class="alert alert-danger" role="alert">
            ❌ Faltan campos obligatorios. Por favor, completa todos los datos.
          </div>
          <a href="formulario.html" class="btn btn-secondary">Volver</a>
        </div>';
  exit;
}

// CUERPO DEL MENSAJE
$cuerpo = "
  <h2>Nuevo mensaje de contacto</h2>
  <p><strong>Nombre:</strong> $nombre $apellido</p>
  <p><strong>Correo electrónico:</strong> $correo</p>
  <p><strong>Especie favorita:</strong> $especie</p>
  <p><strong>Mensaje:</strong><br>$mensaje</p>
";

// CABECERAS
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: $nombre <$correo>" . "\r\n";

// ENVÍO
if (mail($destinatario, $asunto, $cuerpo, $headers)) {
  echo '<div class="container text-center mt-5">
          <div class="alert alert-success" role="alert">
            ✅ Tu mensaje fue enviado con éxito. ¡Gracias por contactarte!
          </div>
          <a href="index.html#contacto" class="btn btn-primary">Volver al sitio</a>
        </div>';
} else {
  echo '<div class="container text-center mt-5">
          <div class="alert alert-danger" role="alert">
            ❌ Ocurrió un error al enviar el mensaje. Intenta nuevamente más tarde.
          </div>
          <a href="index.html#contacto" class="btn btn-secondary">Volver</a>
        </div>';
}
?>