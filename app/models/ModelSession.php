<?php 


class ModelSession {
    private $sessionStatus;

    public function __construct() {
        $this->sessionStatus = session_status();
        if ($this->sessionStatus === PHP_SESSION_NONE) {
            $this->init_session();
        }
    }

    public function init_session() {
        if ($this->sessionStatus !== PHP_SESSION_ACTIVE) {
            session_start();
            $this->sessionStatus = session_status();
        }
    }

    public function setErrorMessage($message) {
        $_SESSION['error'] = $message;
    }

    public function getErrorMessage() {
        $message = isset($_SESSION['error']) ? $_SESSION['error'] : '';
        unset($_SESSION['error']);
        return $message;
    }

    public function setSuccessMessage($message) {
        $_SESSION['success'] = $message;
    }

    public function getSuccessMessage() {
        $message = isset($_SESSION['success']) ? $_SESSION['success'] : '';
        unset($_SESSION['success']);
        return $message;
    }

    public function setUserData($userData) {
        $_SESSION['user'] = $userData;
    }

    public function getUserData() {
        return isset($_SESSION['user']) ? $_SESSION['user'] : null;
    }

    public function endSession() {
        if ($this->sessionStatus === PHP_SESSION_ACTIVE) {
            session_unset();
            session_destroy();
            $this->sessionStatus = session_status();
        }
    }
}
