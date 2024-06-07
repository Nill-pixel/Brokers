const apiBaseUrl = 'http://localhost/broker/back-end/index.php/'

window.onload = function () {
  const params = new URLSearchParams(window.location.search)
  const clientId = params.get('clientId')

  axios.get(`${apiBaseUrl}/client/${clientId}`)
    .then(response => {
      const clientData = response.data
      const client = clientData[0]

      document.getElementById('clientId').value = client.id
      document.getElementById('name').value = client.name
      document.getElementById('email').value = client.email
    })
    .catch(error => {
      console.log('Error on fetching client details:', error)
    })
  document.getElementById('editForm').onsubmit = (event => {
    event.preventDefault()
    const updatedClient = {
      name: document.getElementById('name').value,
      email: document.getElementById('email').value,
    }
    const passwordField = document.getElementById('password')
    if (passwordField && passwordField.value) {
      updatedClient.password = passwordField
    }

    axios.put(`${apiBaseUrl}/client/${clientId}`, updatedClient)
      .then(response => {
        alert('Cliente actualizado com sucesso!')
        window.location.href = 'api.html'
      })
      .catch(error => {
        console.log('Error on updating cliente: ', error)
        alert('Falha ao actualizar o cliente. ')
      })
  })
}