<div class="form_contenedor">
  <?php
  include_once __DIR__ . '/../templates/alertas.php';
  ?>
  <form class="form" method="POST" action="/productos/crear">
    <div class="campo_simple">
      <label class="campo_label" for="prod_nombre">nombre</label>
      <input type="text" name="prod_nombre" id="prod_nombre" placeholder="Ejm. Jhon" value="<?php echo s($usuario->user_nombre) ?>">
    </div>
    <div class="campo_doble">
      <div class="campo_simple">
        <label class="campo_label" for="prod_precio_unitario">Precio Unitario</label>
        <input type="text" name="prod_precio_unitario" id="prod_precio_unitario" placeholder="Ejm. Jhon" value="<?php echo s($usuario->user_nombre) ?>">
      </div>
      <div class="campo_textarea">
      </div>
      <div class="campo_simple">
        <label class="campo_label" for="prod_existencias">existencias</label>
        <input type="text" name="prod_existencias" id="prod_existencias" placeholder="Ejm. Cena" value="<?php echo s($usuario->user_apellido) ?>">
      </div>
    </div>
    <input class="boton" type="submit" value="Crear Producto  ">
  </form>
</div>