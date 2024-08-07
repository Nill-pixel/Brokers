document.addEventListener('DOMContentLoaded', function () {
  getClient()
  getBalance()
})
function getClient() {
  axios.get(`${apiBaseUrl}/client/profile`)
    .then(response => {
      const client = response.data

      const welcome = document.querySelector('#welcome')
      const signed = document.querySelector('#profile-email')
      const logout = document.querySelector('#profile-logout')

      welcome.innerHTML = ''
      signed.innerHTML = ''
      logout.innerHTML = ''

      const profile_name = `<h4 class="font-heading font-semibold text-sm uppercase text-muted-400">
            ${client.firstName}'s Account
          </h4>
          <h2 class="font-heading font-medium text-4xl ptablet:text-2xl text-muted-800 dark:text-white">
            Welcome back, ${client.firstName}! 👋
          </h2>
           <p class="font-sans text-muted-500">
            Everything seems ok and up-to-date with your account since your last
            visit.
          </p>`
      welcome.innerHTML += profile_name

      const profile_email = `
            <p class="text-sm text-gray-500 dark:text-neutral-400">Signed in as</p>
            <p class="text-sm font-medium text-gray-800 dark:text-neutral-300">${client.email}</p>
               `
      signed.innerHTML += profile_email

      const profile_logout = `
      <a onclick="logout()" class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300"
                    href="#">
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                      viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round">
                      <path d="M15 3V15H9V3H15ZM12 9H18V11H12Z" />
                      <path d="M12 12v9" />
          </svg>
          Logout
      </a>`

      logout.innerHTML += profile_logout

    })
    .catch(error => error)
}

function getBalance() {
  axios.get(`${apiBaseUrl}/portfolios/balance`)
    .then(response => {
      const balance = response.data

      const money = document.querySelector('#money')
      money.innerHTML = ''

      const row = `<div class="h-full py-16 px-10 bg-white dark:bg-muted-1000 rounded-xl border border-muted-200 dark:border-muted-800
        shadow-xl shadow-muted-400/10 dark:shadow-muted-800/10">
        <div class="h-full flex flex-col justify-between gap-7">
          <h4 class="font-heading font-semibold text-sm uppercase text-muted-400">
            Money
          </h4>
          <div>
            <span
              class="font-sans font-medium text-4xl text-muted-800 dark:text-white before:content-[''] before:text-xl">
              ${balance.balance} Kzs
            </span>
          </div>

          <div class="space-y-1">
            <p class="font-sans text-muted-500">No outgoing transactions yet</p>
            <div class="w-full h-1 bg-muted-200 dark:bg-muted-800"></div>
          </div>
        </div>
      </div>`
      money.innerHTML += row
    })
    .catch(error => error)
}

function logout() {
  axios.get(`${apiBaseUrl}/logout`)
    .then(response => {
      window.location.href = 'auth/signin.html'
    })
    .catch(error => {
      console.error('Erro', error)
    })
}