<?php
require_once './config/DB/db.php';
/**
 * @property ClientDAO $this
 */
class ClientDAO
{
  private $pdo;
  private $session;
  public function __construct()
  {
    $this->pdo = DB::getConnection();
    $this->session = new SessionManager();
  }

  public function getClient()
  {
    $stm = $this->pdo->prepare("SELECT * FROM clients");
    $stm->execute();

    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getClientById($id)
  {
    $stm = $this->pdo->prepare("SELECT * FROM clients WHERE id = :id");
    $stm->bindParam(":id", $id);
    $stm->execute();

    if (empty($stm)) {
      return null;
    }
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  public function saveClient(ClientDTO $client)
  {
    $created = (new DateTime())->setTimestamp(time());
    $createdString = $created->format('Y-m-d H:i:s');

    $stm = $this->pdo->prepare("INSERT INTO clients (firstName, lastName, email, password, created_at) VALUES(:firstName, :lastName, :email, :password, :created_at)");
    $stm->bindParam(':firstName', $client->firstName);
    $stm->bindParam(':lastName', $client->lastName);
    $stm->bindParam(':email', $client->email);
    $stm->bindParam(':password', $client->password);
    $stm->bindParam(':created_at', $createdString);
    $stm->execute();

    $client_id = $this->pdo->lastInsertId();

    $stm = $this->pdo->prepare("INSERT INTO client_current_accounts (client_id, created_at) VALUES(:client_id, :created_at)");
    $stm->bindParam(':client_id', $client_id);
    $stm->bindParam(':created_at', $createdString);
    $stm->execute();
    return ($stm);
  }
  public function DeleteClient($id)
  {
    $stm = $this->pdo->prepare("DELETE FROM client_current_accounts WHERE client_id = :id");
    $stm->bindParam(":id", $id);
    $stm->execute();

    $stm = $this->pdo->prepare("DELETE FROM clients WHERE id = :id");
    $stm->bindParam(":id", $id);
    $stm->execute();

    return true;
  }
  public function UpdateClient(ClientDTO $client, $id)
  {
    $updated = (new DateTime())->setTimestamp(time());
    $updatedString = $updated->format('Y-m-d H:i:s');
    $stm = $this->pdo->prepare("UPDATE clients SET firstName = :firstName, lastName = :lastName, email = :email, password = :password, updated_at = :updated_at WHERE id = :id");
    $stm->bindParam(':firstName', $client->firstName);
    $stm->bindParam(':lastName', $client->lastName);
    $stm->bindParam(':email', $client->email);
    $stm->bindParam(':password', $client->password);
    $stm->bindParam(':updated_at', $updatedString);
    $stm->bindParam(":id", $id);
    $stm->execute();

    return true;
  }

  public function loginClient($email, $password)
  {
    $stm = $this->pdo->prepare("SELECT * FROM clients WHERE email = :email");
    $stm->bindParam(':email', $email);
    $stm->execute();

    $client = $stm->fetch(PDO::FETCH_ASSOC);

    if ($client && password_verify($password, $client['password'])) {
      $_SESSION['client_id'] = $client['id'];
      return true;
    } else {
      return false;
    }
  }
  public function getClientProfile()
  {
    $id = $_SESSION['client_id'];
    $stm = $this->pdo->prepare("SELECT * FROM clients WHERE id = :id");
    $stm->bindParam(":id", $id);
    $stm->execute();

    if (empty($stm)) {
      return null;
    }
    return $stm->fetch(PDO::FETCH_ASSOC);
  }
}
