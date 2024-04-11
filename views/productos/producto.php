<div class="contenedor_app">
  <div id="seccion-1" class="contenedor_main">
    <header class="contenedor_header">
      <div class="contenedor_header_head">
        <h1 class="app_title">Productos</h1>
        <button data-seccion="2" class="boton pad1-4">Agregar Producto</button>
      </div>
      <div class="contenedor_header_search campo campo_search">
        <input type="text" id="search" name="search" placeholder="Buscar Producto">
        <i class="fa-solid fa-magnifying-glass"></i>
      </div>
    </header>
    <div class="tabla_contenedor">
      <table class="table">
        <thead class="table_head">
          <th class="table_head_item">Nombre</th>
          <th class="table_head_item">Precio</th>
          <th class="table_head_item">Existencias</th>
          <th class="table_head_item">Categoria</th>
          <th class="table_head_item">Descripción</th>
          <th class="table_head_item">Action</th>
        </thead>
        <tbody class="table_body" id="productos">
          <?php foreach ($datos_base as $dato) : ?>
            <tr class="table_row">
              <td><?php echo $dato->prod_nombre ?></td>
              <td>$<?php echo $dato->prod_precio_unitario ?></td>
              <td><?php echo $dato->prod_existencias ?></td>
              <td><?php echo $dato->cat_nombre ?></td>
              <td><?php echo $dato->prod_descripcion ?></td>
              <td>
                <button class="table_actions edit">
                  <i class="fa-solid fa-pen-to-square"></i>
                </button>
                <button class="table_actions delete">
                  <i class="fa-solid fa-trash"></i>
                </button>

              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
  <div id="seccion-2" class="contenedor_main"></div>
</div>