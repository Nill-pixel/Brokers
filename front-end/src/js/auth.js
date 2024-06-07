const apiBaseUrl = 'http://localhost/broker/back-end/index.php';

document.getElementById('sign-in').addEventListener('submit', function (event) {
  event.preventDefault();

  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  axios.post(`${apiBaseUrl}/client/login`, { email, password })
    .then(response => {
      if (response.data.error) {
        alert(response.data.error);
      } else {
        window.location.href = "../home.html";
      }
    })
    .catch(error => {
      if (error.response && error.response.data && error.response.data.error) {
        alert(`Login failed: ${error.response.data.error}`);
      } else {
        alert('Server error');
      }
      console.error(error);
    });
});
