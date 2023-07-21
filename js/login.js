const loginForm = document.querySelector('.main__login__form');
const usuario = document.getElementById('usuario');
const contraseña = document.getElementById('contraseña');

loginForm.addEventListener('submit', e => {
  e.preventDefault();
  validateLogin();
});

const validateLogin = () => {
  const usuarioValue = usuario.value.trim();
  const contraseñaValue = contraseña.value.trim();

  if (usuarioValue === '') {
    setError(usuario, 'Ingrese su correo electrónico');
  } else {
    setSuccess(usuario);
  }

  if (contraseñaValue === '') {
    setError(contraseña, 'Ingrese su contraseña');
  } else {
    setSuccess(contraseña);
  }
};

const setError = (element, message) => {
  const inputControl = element.parentElement;
  const errorDisplay = inputControl.querySelector('.error');
  errorDisplay.innerText = message;
  inputControl.classList.add('error');
  inputControl.classList.remove('success');
};

const setSuccess = element => {
  const inputControl = element.parentElement;
  const errorDisplay = inputControl.querySelector('.error');
  errorDisplay.innerText = '';
  inputControl.classList.add('success');
  inputControl.classList.remove('error');
};
