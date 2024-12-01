<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="../styles/styles.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>paginaprincipal</title>

</head>
<body>

    <div style="position: relative;">
        <button class="toggle-menu" onclick="toggleMenu()">☰ Menú</button>
        <button class="logout-button" onclick="logout()">Cerrar Sesión</button>
        <button class="inicio-button" onclick="inicio()">Inicio</button>
        <div class="menu" id="menu">
            <h2>Menú</h2>
            <a href="perfil_organizacion.php" onclick="showContent('Organizacion')">Perfil</a>
            <a href="#" onclick="showContent('voluntarios')">Voluntarios</a>
            <a href="dashboard_mis_trabajos.php" onclick="showContent('trabajos')">Mis Empleos</a>
            <a href="#" onclick="showContent('encuesta')">Encuesta</a>
            <a href="#" onclick="showContent('indicadores')">Indicadores de Trabajo</a>
        </div>
    </div>

    <div class="content">
        
        
        <h1>Bienvenido a VoluntaMe, <?php 
            session_start();
            // Aquí asumimos que tienes una sesión iniciada y que $user['nombre'] contiene el nombre del usuario
            $query = "SELECT nombreFantasia FROM organizaciones WHERE id = ?";
            if (isset($_SESSION['id'])) {
              echo " ", $_SESSION['nombreFantasia'];
            } else {
              echo "Invitado"; // Mensaje por defecto si no hay usuario logeado
            }
           ?></h1>
        
    </div>

    <script>
        function toggleMenu() {
            var menu = document.getElementById("menu");
            menu.style.display = (menu.style.display === "none" || menu.style.display === "") ? "block" : "none";
        }

        
        function logout() {
          // Redirigir a la página "pagina1.html"
          window.location.href = "pag1.html";
          // Aquí podrías agregar lógica adicional para manejar la sesión si es necesario.
      }

      function inicio() {
        // Redirigir a la página "pagina1.html"
        window.location.href = "dashboard_organizacion.php";
        // Aquí podrías agregar lógica adicional para manejar la sesión si es necesario.
    }
    </script>

</body>
</html>