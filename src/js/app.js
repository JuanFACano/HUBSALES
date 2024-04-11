
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

function consultarAPI() {
  consultarUsuarios()
}

async function consultarUsuarios() {
  try {
    let url = 'http://localhost:3000/api/usuarios';
    let resultado = await fetch(url)
    let usuarios = await resultado.json()

    usuarios.forEach(usuario => {
      const { user_id, user_nombre, user_correo, rol_nombre } = usuario


      const userName = document.createElement('TD');
      userName.textContent = user_nombre

      const userRol = document.createElement('TD');
      userRol.textContent = rol_nombre

      const userEmail = document.createElement('TD');
      userEmail.textContent = user_correo

      const iconEdit = document.createElement('I');
      iconEdit.classList.add('fa-solid')
      iconEdit.classList.add('fa-pen-to-square')

      const buttonEdit = document.createElement('BUTTON');
      buttonEdit.classList.add('table_actions')
      buttonEdit.classList.add('edit')
      buttonEdit.appendChild(iconEdit)

      const iconDelete = document.createElement('I');
      iconDelete.classList.add('fa-solid')
      iconDelete.classList.add('fa-trash')

      const buttonDelete = document.createElement('BUTTON');
      buttonDelete.classList.add('table_actions')
      buttonDelete.classList.add('delete')
      buttonDelete.appendChild(iconDelete)

      const actionButtons = document.createElement('TD');
      actionButtons.appendChild(buttonEdit)
      actionButtons.appendChild(buttonDelete)

      const columns = [userName, userRol, userEmail, actionButtons];

      const tableRow = document.createElement('TR');
      tableRow.classList.add('table_row')

      columns.forEach(column => {
        tableRow.appendChild(column)
      });


      body.querySelector('#usuarios').appendChild(tableRow)
    });

  } catch (error) {
    console.log("Error" + error);
  }
}
