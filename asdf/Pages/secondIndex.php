<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="Style.css">

    <title>Eriker TJ</title>
</head>
<body>
    <!--Nabvar-->
    <Section class="section-Nabvar">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Eriker Tejidos</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Perfil</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Contacto</a>
                  </li>

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active"  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Secciones
                    </a>
                    <!--Menu de secciones-->
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="Gorros.html">Gorros</a></li>
                      <li><a class="dropdown-item" href="Bufandas.html">Bufandas</a></li>
                      <li><a class="dropdown-item" href="Guantes.html">Guantes</a></li>
                      <li><a class="dropdown-item" href="Medias.html">Medias</a></li>
                    </ul>
                  </li>

                  <li>
                    <div class="cart-icon">
<!--Faltaria que ese icono se vuelva un boton pa mandarlo a la otra pagina-->
                      <span>🛒</span>
                      <span class="cart-count" id="cart-count">0</span>
                    </div>
                  </li>

                </ul>

              </div>
            </div>
          </nav>
    </Section>


    <!--Seccion inicial-->
    <main class="main-content">
      <div class="products-grid" id="products-grid">
        <!-- Productos se insertarán aquí dinámicamente -->
      </div>
    </main>
  
    <footer class="footer">
      <div class="footer-container">
        <div class="footer-grid">
          <div class="footer-section">
            <h3>Contacto</h3>
            <p>📞 +57 3228993244</p>
            <p>📧 erikertj@gmail.com</p>
          </div>
          <div class="footer-section">
            <h3>Ubicación</h3>
            <p>📍 La casa de alguien</p>
          </div>
          <div class="footer-section">
            <h3>Síguenos</h3>
            <div class="social-links">
              <a href="#" class="social-link">Facebook</a>
              <a href="#" class="social-link">Instagram</a>
              <a href="#" class="social-link">Twitter</a>
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          <p>&copy; 2024 Eriker Tejidos. Todos los derechos reservados.</p>
        </div>
      </div>
    </footer>



    <script src="Script.js"></script>
    <script src="Scripts/productos.js"></script>


</body>
</html>