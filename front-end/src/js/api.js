const apiBaseUrl = 'http://localhost/broker/back-end/index.php/'
const output = document.getElementById('apiResponse')
document.addEventListener('DOMContentLoaded', function () {
  getAllClients()
})
function getAllClients() {
  axios.get(`${apiBaseUrl}/client`)
    .then(response => {
      const clients = response.data
      const tableBody = document.querySelector('#clientsTable tbody')
      tableBody.innerHTML = ''

      clients.forEach(client => {
        const row = `<tr>
          <td>${client.id}</td>
          <td>${client.name}</td>
          <td>${client.email}</td>
          <td>
          <button onclick="editClient(${client.id})">Editar</button>
          <button onclick="deleteClient(${client.id})">Deletar</button>
          </td>           
        </tr>`
        tableBody.innerHTML += row
      })
    })
    .catch(error => output.textContent = error)
}

function editClient(clientId) {
  window.location.href = `updateClient.html?clientId=${clientId}`
}

function deleteClient(clientId) {
  if (confirm('Tem certeza que deseja deletar este cliente?')) {
    axios.delete(`${apiBaseUrl}/client/${clientId}`)
      .then(response => {
        alert('Cliente deletado com sucesso!', response.data)
        getAllClients()
      })
      .catch(error => {
        alert('Falha ao deletar cliente')
        console.error('Erro ao deletar cliente: ', error)
      })
  }
}


document.getElementById('addClientForm').addEventListener('submit', function (event) {
  event.preventDefault()

  const name = document.getElementById('name').value
  const email = document.getElementById('email').value
  const password = document.getElementById('password').value

  axios.post(`${apiBaseUrl}/client`, { name, email, password })
    .then(response => {
      alert('Cliente adicionado com sucesso!')
      console.log(response.data)
    })
    .catch(error => {
      alert('Erro ao adicionar cliente')
      console.error(error)
    })
})

document.getElementById('fetchClientForm').addEventListener('submit', function (event) {
  event.preventDefault()

  const clientId = document.getElementById('clientId').value
  axios.get(`${apiBaseUrl}/client/${clientId}`)
    .then(response => {
      const clientData = response.data
      console.log(clientData)
      displayClientInfo(clientData)
    })
    .catch(error => {
      console.error("Erro ao buscar o cliente:", error)
      alert('Erro ao buscar o cliente. Verifique o console para mais informações/detalhes')
    })
})

function displayClientInfo(clientData) {
  const div = document.getElementById('clientInfo')
  if (clientData && clientData.length > 0) {
    const client = clientData[0]
    div.innerHTML = `<p>ID: ${client.id}<br>Nome: ${client.name}<br>Email: ${client.email}</p>`;
  } else {
    div.innerHTML = '<p>Cliente não encontrado.</p>';
  }
}