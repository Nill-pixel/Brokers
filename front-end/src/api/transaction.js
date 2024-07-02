const deposit_form = document.getElementById('deposit-form')
if (deposit_form) {
  deposit_form.addEventListener('submit', function (event) {
    event.preventDefault();

    const amountInput = document.getElementById("amount");
    const amount = amountInput.value;

    axios.post(`${apiBaseUrl}/portfolios/deposit`, { amount })
      .then(response => {
        if (response.data.error) {
          alert(response.data.error)
        } else if (response.data.success) {
          alert(response.data.success)
          amountInput.value = ''
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
  })
}

const withdraw_form = document.getElementById('withdraw-form')
if (withdraw_form) {
  withdraw_form.addEventListener('submit', function (event) {
    event.preventDefault();

    const amountInput = document.getElementById("amount");
    const amount = amountInput.value;

    axios.post(`${apiBaseUrl}/portfolios/withdraw`, { amount })
      .then(response => {
        if (response.data.error) {
          alert(response.data.error)
        } else if (response.data.success) {
          alert(response.data.success)
          amountInput.value = ''
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
  })
}

const transactionsTable = document.getElementById("transactionsTable")
if (transactionsTable) {
  document.addEventListener('DOMContentLoaded', function () {
    axios.get(`${apiBaseUrl}/portfolios/transaction`)
      .then(response => {
        const transactions = response.data
        const tableBody = document.querySelector('#transactionsTable tbody')
        tableBody.innerHTML = ''

        transactions.forEach(transaction => {
          const row = `
          <tr tabindex="0">
                <td class="py-2">
                  <span class="font-sans text-sm font-medium leading-none text-muted-500 dark:text-muted-300">
                    ${transaction.transaction_date}
                  </span>
                </td>
                <td class="py-2">
                  <span class="font-sm  text-sm  font-medium  leading-none  text-muted-500  dark:text-muted-300">
                    ${transaction.firstName} ${transaction.lastName}
                  </span>
                </td>
                <td class="py-2 px-4">
                  <span class="font-sans text-base font-medium leading-none text-muted-800 dark:text-muted-100">
                    ${transaction.amount}
                  </span>
                </td>
                <td class="py-2 px-4">
                  <span class="font-sans text-sm font-medium leading-none text-muted-400">
                    ${transaction.type}
                  </span>
                </td>
              </tr>`
          tableBody.innerHTML += row
        })
      })
      .catch(error => output.textContent = error)
  })
}