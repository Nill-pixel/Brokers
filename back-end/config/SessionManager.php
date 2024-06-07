<?php
class SessionManager
{
  public function isLogged(): bool
  {
    return isset($_SESSION['client_id']);
  }
  public function destroy(): void
  {
    session_destroy();
  }

  public function verify()
  {
    if (!$this->isLogged()) {
      echo
      "<script>alert('Error Login!');location.href='./sign-in';</script>";
    }
  }
}
