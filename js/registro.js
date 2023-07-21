const form = document.querySelector('.main__register__form');
const name = document.getElementById('name');
const lastname = document.getElementById('lastname');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');

form.addEventListener('submit', e => {
  e.preventDefault();
  validateInputs();
});

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

const isValidEmail = email => {
  const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
};

const validateInputs = () => {
  const nameValue = name.value.trim();
  const lastnameValue = lastname.value.trim();
  const emailValue = email.value.trim();
  const passwordValue = password.value.trim();
  const password2Value = password2.value.trim();

  if (nameValue === '') {
    setError(name, 'Ingrese sus nombres');
  } else {
    setSuccess(name);
  }

  if (lastnameValue === '') {
    setError(lastname, 'Ingrese sus apellidos');
  } else {
    setSuccess(lastname);
  }

  if (emailValue === '') {
    setError(email, 'Ingrese su email');
  } else if (!isValidEmail(emailValue)) {
    setError(email, 'Email incorrecto');
  } else {
    setSuccess(email);
  }

  if (passwordValue === '') {
    setError(password, 'Ingrese una contraseña');
  } else if (passwordValue.length < 8 || passwordValue.length > 20) {
    setError(password, 'Ingrese una contraseña entre 8 y 20 caracteres');
  } else {
    setSuccess(password);
  }

  if (password2Value === '') {
    setError(password2, 'Confirme la contraseña');
  } else if (password2Value !== passwordValue) {
    setError(password2, 'Contraseña diferente');
  } else {
    setSuccess(password2);
  }
};
