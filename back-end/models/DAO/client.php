<?php
require_once './config/DB/db.php';
/**
 * @property ClientDAO $this
 */

class ClientDAO
{
  private $pdo;
  public function __construct()
  {
    $this->pdo = DB::getConnection();
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

    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  public function saveClient(ClientDTO $client)
  {
    $stm = $this->pdo->prepare("INSERT INTO clients (name, email, password) VALUES(:name, :email, :password)");
    $stm->bindParam(':name', $client->name);
    $stm->bindParam(':email', $client->email);
    $stm->bindParam(':password', $client->password);
    $stm->execute();

    $client_id = $this->pdo->lastInsertId();

    $stm = $this->pdo->prepare("INSERT INTO client_current_accounts (client_id) VALUES(:client_id)");
    $stm->bindParam(':client_id', $client_id);
    $stm->execute();
    return ($stm);
  }
  public function DeleteClient($id)
  {
    $stm = $this->pdo->prepare("DELETE FROM clients WHERE id = :id");
    $stm->bindParam(":id", $id);
    $stm->execute();

    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }
  public function UpdateClient(ClientDTO $client, $id)
  {
    $updated = (new DateTime())->setTimestamp(time());
    $updatedString = $updated->format('Y-m-d H:i:s');
    $stm = $this->pdo->prepare("UPDATE clients SET name = :name, email = :email, password = :password, updated_at = :updated_at WHERE id = :id");
    $stm->bindParam(':name', $client->name);
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
}
