# Sistema de Gestão de Firma de Investimentos

## Índice

- [Sobre](#sobre)
- [Primeiros Passos](#primeiros_passos)
- [Uso](#uso)
- [Contribuindo](#contribuindo)

## Sobre <a name="sobre"></a>

Este projeto é projetado para desenvolver um sistema abrangente para uma firma de investimentos, gerenciando vários corretores e clientes que negociam títulos de participação. Os corretores são funcionários com atributos padrão, como número de funcionário, nome, datas de admissão e rescisão, telefone e salário base. Cada corretor gerencia as carteiras de seus clientes atribuídos e ganha uma comissão mensal com base no aumento dos valores das carteiras dos clientes. O sistema lida com vários tipos de títulos (ações e obrigações) emitidos por empresas, rastreia suas transações e mantém as cotações atualizadas do mercado de ações.

## Primeiros Passos <a name="primeiros_passos"></a>

Siga estas instruções para obter uma cópia do projeto em funcionamento em sua máquina local para desenvolvimento e testes. Veja [implantação](#implantacao) para notas sobre como implantar o projeto em um sistema ao vivo.

### Pré-requisitos

Você precisará do seguinte software instalado em sua máquina:

- PHP
- MySQL
- Node.js
- npm (Node Package Manager)
- Composer (gerenciador de dependências PHP)

### Instalando

1. **Clone o repositório**

   ```sh
   git clone https://github.com/nill-pixel/Broker.git
   cd Broker
   ```

2. **Instale as dependências do PHP**

   ```sh
   composer install
   ```

3. **Instale as dependências do Node.js**

   ```sh
   npm install
   ```

4. **Configure o banco de dados MySQL**

   - Crie um novo banco de dados no MySQL.
   - Importe o arquivo de esquema SQL fornecido para configurar a estrutura do banco de dados.

   ```sh
   mysql -u usuario -p nome_do_banco < database/schema.sql
   ```

5. **Configure as variáveis de ambiente**

   Renomeie `.env.example` para `.env` e atualize as configurações, como as credenciais do banco de dados.

6. **Execute o servidor de desenvolvimento**

   ```sh
   php -S localhost:8000 -t public
   ```

Termine com um exemplo de como obter alguns dados do sistema ou usá-lo para uma pequena demonstração.

## Uso <a name="uso"></a>

Para usar o sistema, siga estes passos:

1. **Inicie o servidor**

   Certifique-se de que seu servidor está em execução navegando para `http://localhost:8000` no seu navegador web.

2. **Acesse a API**

   Use Axios e JavaScript para consumir a API. Abaixo está um exemplo de como buscar dados de corretores.

   ```javascript
   axios
     .get("http://localhost:8000/api/corretores")
     .then((response) => {
       console.log(response.data);
     })
     .catch((error) => {
       console.error("Houve um erro ao buscar os dados dos corretores!", error);
     });
   ```

3. **Estilize com Tailwind e Preline**

   Certifique-se de que seu HTML inclua Tailwind e Preline para estilização. Abaixo está um exemplo de um componente simples estilizado.

   ```html
   <div class="bg-white p-6 rounded-lg shadow-lg">
     <h2 class="text-2xl font-bold mb-2">Informações do Corretor</h2>
     <p class="text-gray-700">Nome: John Doe</p>
     <p class="text-gray-700">Telefone: (123) 456-7890</p>
   </div>
   ```

## Contribuindo <a name="contribuindo"></a>

Contribuições são bem-vindas! Por favor, veja o [CONTRIBUTING.md](../CONTRIBUTING.md) para mais detalhes.

---

Este README fornece uma visão geral do Sistema de Gestão de Firma de Investimentos, incluindo instruções de configuração e uso. Para informações detalhadas sobre cada recurso e componente, consulte a documentação do projeto.
