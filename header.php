<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="#">
	<h1 class="title" style="color:white;">
        Webgis-Leaflet
    </h1>
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item">
        Dokumentasi
      </a>
	  </div>
	  <!-- <span class="navbar-item">
            <a class="button is-primary is-inverted" href="https://github.com/bijancot/webgis-leaflet">
                <span class="icon">
                    <i class="fab fa-github"></i>
                </span>
                <span>Github</span>
            </a>
       </span> -->
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-dark is-inverted">
            <strong>Hello <?= $_SESSION['username']?></strong>
          </a>
          <a class="button is-light" href="logout.php">
            Log Out
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>