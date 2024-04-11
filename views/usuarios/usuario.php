<div class="contenedor_app">

  <!-- Seccion 1 -->
  <div id="seccion-1" class="contenedor_main">
    <header class="contenedor_header">
      <div class="contenedor_header_head">
        <h1 class="app_title">usuarios</h1>
        <button class="boton pad1-4">Agregar Usuario</button>
      </div>
      <div class="contenedor_header_search campo campo_search">
        <form action="">
          <input type="text" id="search" name="search" placeholder="Buscar Usuario">
        </form>
        <button class="send">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </div>
    </header>
    <div class="tabla_contenedor">
      <table class="table">
        <thead class="table_head">
          <th class="table_head_item">Nombre</th>
          <th class="table_head_item">Rol</th>
          <th class="table_head_item">Correo</th>
          <th class="table_head_item">Action</th>
        </thead>
        <tbody class="table_body" id="usuarios">
        </tbody>
      </table>
    </div>
  </div>
  <!-- Seccion 2 -->
  <div style="display: none;" id="seccion-2" class="contenedor_main">

    <div class="form_contenedor">
      <?php
      include_once __DIR__ . '/../templates/alertas.php';
      ?>
      <form class="form" method="POST" action="/usuarios/crear">
        <div class="campo_doble">
          <div class="campo_simple">
            <label class="campo_label" for="user_nombre">nombre</label>
            <input type="text" name="user_nombre" id="user_nombre" placeholder="Ejm. Jhon" value="<?php echo s($usuario->user_nombre) ?>">
          </div>
          <div class="campo_simple">
            <label class="campo_label" for="apellido">apellido</label>
            <input type="text" name="apellido" id="apellido" placeholder="Ejm. Cena" value="<?php echo s($usuario->user_apellido) ?>">
          </div>
        </div>
        <div class="campo_simple">
          <label class="campo_label" for="correo">correo</label>
          <input type="email" name="correo" id="correo" placeholder="ingrese un correo" value="<?php echo s($usuario->user_correo) ?>">
        </div>
        <div class="campo_simple">
          <label class="campo_label" for="rol">Rol</label>
          <select name="rol" id="rol">
            <option value="">Seleccione un Rol</option>
            <option value="1">Admin</option>
            <option value="2">Usuario Base</option>
          </select>
        </div>
        <div class="campo_simple">
          <label class="campo_label" for="contrasenia">Contraseña</label>
          <input type="password" name="contrasenia" id="contrasenia" placeholder="ingrese una contraseña">
        </div>
        <input class="boton" type="submit" value="Crear Usuario">
      </form>
    </div>
  </div>

</div>