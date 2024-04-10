
const body = document.querySelector("body");

document.addEventListener('DOMContentLoaded', function () {
  iniciarApp();
});


function iniciarApp() {
  darkMode();
  tabs();
  goBack();
  consultarAPI(); // consulta la API del backend en PHP
}

function darkMode() {
  const preferDarkMode = window.matchMedia("(prefers-color-scheme: dark)");
  const app = document.querySelector('.app')
  const buttons = document.querySelectorAll(".boton")

  if (preferDarkMode.matches) {
    body.classList.add("dark-mode")
    app.classList.add("dark-mode")
    buttons.forEach((button) => {
      button.classList.add("dark-mode")
    })
  } else {
    body.classList.remove("dark-mode")
    app.classList.remove("dark-mode")
    butons.forEach((button) => {
      button.classList.remove("dark-mode")
    })
  }
}

function tabs() {
  const menuItems = body.querySelectorAll(".menu_item");
  const windowsPathname = window.location.pathname;

  menuItems.forEach(menuItem => {
    const link = menuItem.children[0];
    const menuItemPathname = new URL(link.href).pathname;

    if (windowsPathname === menuItemPathname || (windowsPathname === '/index.php' && menuItemPathname === '/')) {
      menuItem.classList.add("active")
    }
  });
}


function goBack() {
  const buttonGoBack = body.querySelector(".boton_back");
  if (buttonGoBack) {
    buttonGoBack.addEventListener("click", (e) => {
      window.history.back();
    })
  }
}

function editarProducto(producto) {
  console.log(producto);
}

function eliminarProducto(producto) {
  console.log(producto);
}

async function consultarAPI() {

  mostrarUsuarios();
  mostrarProductos();
}

async function mostrarUsuarios() {
  try {
    let usuarios = await consultarUsuarios();
    let roles = await consultarRoles();

    usuarios.forEach(usuario => {
      let user_rol_name = '';
      const {
        user_id,
        user_nombre,
        user_rol,
        user_correo
      } = usuario

      roles.forEach(rol => {
        if (rol.rol_id === user_rol) {
          user_rol_name = rol.rol_nombre
        }
      });

      // ? Creando una fila
      const tableRow = document.createElement('TR');
      tableRow.classList.add("table_row")

      // ? Crear campos
      const nombreUsuario = document.createElement('TD');
      nombreUsuario.textContent = user_nombre

      const rolUsuario = document.createElement('TD');
      rolUsuario.textContent = user_rol_name

      const correoUsuario = document.createElement('TD');
      correoUsuario.textContent = user_correo

      const actionButtons = document.createElement('TD');

      const actionButtonEdit = document.createElement('button');
      actionButtonEdit.classList.add("table_actions")
      actionButtonEdit.classList.add("edit")

      const iconEdit = document.createElement('I');
      iconEdit.classList.add("fa-solid");
      iconEdit.classList.add("fa-pen-to-square");
      actionButtonEdit.appendChild(iconEdit);

      const actionButtonDelete = document.createElement('button');
      actionButtonDelete.classList.add("table_actions")
      actionButtonDelete.classList.add("delete")

      const iconDelete = document.createElement('I');
      iconDelete.classList.add("fa-solid");
      iconDelete.classList.add("fa-trash");
      actionButtonDelete.appendChild(iconDelete);

      actionButtons.appendChild(actionButtonEdit)
      actionButtons.appendChild(actionButtonDelete)

      // ? Agregando columnas a cada fila
      const columns = [nombreUsuario, rolUsuario, correoUsuario, actionButtons]
      columns.forEach(column => {
        tableRow.appendChild(column);
      });

      body.querySelector("#usuarios").appendChild(tableRow)
    });
  } catch (error) {
    console.log(error + " Error");
  }
}

async function mostrarProductos() {
  try {
    let url = 'http://localhost:3000/api/productos';
    let resultado = await fetch(url)
    const productos = await resultado.json()

    url = 'http://localhost:3000/api/categorias'
    resultado = await fetch(url)
    const categorias = await resultado.json()

  } catch (error) {
    console.log(error);
  }
}

async function consultarUsuarios() {
  try {
    let url = 'http://localhost:3000/api/usuarios';
    let resultado = await fetch(url)
    let usuarios = await resultado.json()
    return usuarios
  } catch (error) {
    console.log(error);
  }
}

async function consultarRoles() {
  try {
    let url = 'http://localhost:3000/api/roles';
    let resultado = await fetch(url)
    let roles = await resultado.json()
    return roles;
  } catch (error) {
    console.log(error);
  }
}

