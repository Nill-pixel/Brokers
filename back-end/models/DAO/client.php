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

    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }
}
