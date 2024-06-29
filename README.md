# Sistema de Gestão de Firma de Investimentos

## Índice

- [Sobre](#sobre)
- [Primeiros Passos](#primeiros-passos)
  - [Pré-requisitos](#pré-requisitos)
  - [Instalação](#instalacao)
- [Estrutura do Projeto](#estrutura-do-projeto)
- [Uso](#uso)
- [Licença](#licenca)

## Sobre <a name="sobre"></a>

Este projeto visa desenvolver um sistema abrangente para uma firma de investimentos, gerenciando múltiplos corretores e clientes que negociam títulos de participação. Corretores são funcionários da firma com atributos como número de funcionário, nome, datas de admissão e rescisão, telefone e salário base. Cada corretor gerencia as carteiras de seus clientes e recebe uma comissão mensal baseada no aumento do valor das carteiras. O sistema lida com vários tipos de títulos (ações e obrigações), rastreia suas transações e mantém as cotações atualizadas.

## Primeiros Passos <a name="primeiros-passos"></a>

Estas instruções o ajudarão a obter uma cópia do projeto em funcionamento na sua máquina local para desenvolvimento e testes. Veja [implantação](#implantacao) para notas sobre como implantar o projeto em um sistema ao vivo.

### Pré-requisitos <a name="pré-requisitos"></a>

Você precisará do seguinte software instalado em sua máquina:

- XAMPP (contendo Apache, PHP, e MySQL)
- Node.js
- npm (Node Package Manager)
- Composer (gerenciador de dependências PHP)

### Instalação <a name="instalacao"></a>

1. **Clone o repositório**

   ```sh
   git clone https://github.com/nill-pixel/Brokers.git
   cd Brokers
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

   - Abra o painel de controle do XAMPP e inicie o Apache e o MySQL.
   - Acesse `http://localhost/phpmyadmin` e crie um novo banco de dados chamado `broker`.
   - Importe o arquivo de esquema SQL fornecido para configurar a estrutura do banco de dados.

   ```sh
   mysql -u root -p broker < database/schema.sql
   ```

5. **Configure o Apache para servir o projeto**

   - Coloque os arquivos do projeto dentro do diretório `htdocs` do XAMPP, geralmente localizado em `C:/xampp/htdocs/`.

   ```sh
   mv * C:/xampp/htdocs/Brokers/
   ```

   - Navegue até `http://localhost/Brokers/back-end/index.php` para acessar o back-end do projeto.

## Estrutura do Projeto <a name="estrutura-do-projeto"></a>

A estrutura do projeto é organizada da seguinte maneira:

```plaintext
back-end/
  ├── config/
  ├── DB/
  │   ├── db.php
  │   ├── SessionManager.php
  ├── controllers/
  │   ├── ClientController.php
  │   ├── EmployeeController.php
  ├── models/
  │   ├── DAO/
  │   │   ├── client.php
  │   │   ├── employee.php
  │   ├── DTO/
  │       ├── client.php
  │       ├── employee.php
  ├── index.php

front-end/
  ├── node_modules/
  ├── src/
  │   ├── api/
  │   │   ├── auth.js
  │   │   ├── client.js
  │   │   ├── session.js
  │   ├── auth/
  │   │   ├── signin.html
  │   │   ├── signup.html
  │   ├── css/
  │   ├── js/
  │       ├── admin.html
  │       ├── api.html
  │       ├── deposit.html
  │       ├── home.html
  │       ├── index.html
  │       ├── updateClient.html
  │       ├── withdraw.html
  ├── package-lock.json
  ├── package.json
  ├── tailwind.config.js
  ├── README.md
```

## Uso <a name="uso"></a>

Para usar o sistema, siga os passos abaixo:

1. **Inicie o servidor**

   Certifique-se de que o servidor Apache está em execução navegando para `http://localhost/Brokers/back-end/index.php` no seu navegador web.

2. **Acesse a API**

   Utilize Axios e JavaScript para consumir a API. Aqui está um exemplo de como fazer login de um cliente:

   ```javascript
   const apiBaseUrl = "http://localhost/Brokers/back-end/index.php";

   axios
     .post(`${apiBaseUrl}/client/login`, { email, password })
     .then((response) => {
       if (response.data.error) {
         alert(response.data.error);
       } else if (response.data.success) {
         window.location.href = "../home.html";
       }
     })
     .catch((error) => {
       console.error("Houve um erro ao fazer login!", error);
     });
   ```

3. **Estilize com Tailwind e Preline**

   Certifique-se de que seu HTML inclui Tailwind e Preline para estilização. Aqui está um exemplo de um componente simples estilizado:

   ```html
   <div class="bg-white p-6 rounded-lg shadow-lg">
     <h2 class="text-2xl font-bold mb-2">Informações do Corretor</h2>
     <p class="text-gray-700">Nome: Nilvany Sunguessungue</p>
     <p class="text-gray-700">Telefone: (+244) 922108848</p>
   </div>
   ```

4. **Configuração do Banco de Dados em PHP**

   Aqui está um exemplo de como configurar a conexão com o banco de dados em PHP:

   ```php
   <?php
   class DB
   {
     public static function getConnection()
     {
       try {
         $pdo = new PDO("mysql:dbname=broker;host=localhost", "root", "");
         return $pdo;
       } catch (PDOException $err) {
         echo "Erro na conexão com o banco de dados: " . $err->getMessage();
       }
     }
   }
   ```

## Licença <a name="licenca"></a>

Este projeto está licenciado sob a Licença APACHE - veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---

Este README fornece uma visão geral do Sistema de Gestão de Firma de Investimentos, incluindo instruções de configuração e uso. Para informações detalhadas sobre cada recurso e componente, consulte a documentação do projeto.
