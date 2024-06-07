const apiBaseUrl = 'http://localhost/broker/back-end/index.php/'

function SessionManager() {
  axios.get(`${apiBaseUrl}/session`)
    .then(response => {
      if (response.data.logged === false) {
        window.location.href = 'auth/signin.html'
      }
    })
    .catch(error => {
      console.error('Erro ao verificar sessão', error)
      window.location.href = 'signin.html'
    })
}


document.addEventListener('DOMContentLoaded', SessionManager)