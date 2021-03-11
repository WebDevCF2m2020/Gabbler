<?php

use Cassandra\Date;

class User extends MappingTableAbstract
{

    protected int $id_user;
    protected string $nickname_user;
    protected string $pwd_user;
    protected string $mail_user;
    protected string $signup_date_user;
    protected string $color_user;
    protected string $confirmation_key_user;
    protected int $validation_status_key = 1;

    /**
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->id_user;
    }

    /**
     * @return string
     */
    public function getNicknameUser(): string
    {
        return $this->nickname_user;
    }

    /**
     * @return string
     */
    public function getPwdUser(): string
    {
        return $this->pwd_user;
    }

    /**
     * @return string
     */
    public function getMailUser(): string
    {
        return $this->mail_user;
    }

    /**
     * @return string
     */
    public function getSignupDateUser(): string
    {
        return $this->signup_date_user;
    }

    /**
     * @return string
     */
    public function getColorUser(): string
    {
        return $this->color_user;
    }

    /**
     * @return string
     */
    public function getConfirmationKeyUser(): string
    {
        return $this->confirmation_key_user;
    }

    /**
     * @return int
     */
    public function getValidationStatusKey(): int
    {
        return $this->validation_status_key;
    }

    /**
     * @param int $id_user
     */
    public function setIdUser(int $id_user): void
    {
        if (!is_int($id_user) && empty($id_user)) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->id_user = $id_user;
        }
    }

    /**
     * @param string $nickname_user
     */
    public function setNicknameUser(string $nickname_user): void
    {
        if (!filter_var($nickname_user, FILTER_VALIDATE_EMAIL)) {
            trigger_error('', E_USER_NOTICE);
        } else if (strlen($nickname_user) > 60) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->nickname_user = $nickname_user;
        }
    }

    /**
     * @param string $pwd_user
     */
    public function setPwdUser(string $pwd_user): void
    {
        if (strlen($pwd_user) < 5 && strlen($pwd_user) > 255) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->pwd_user = $pwd_user;
        }
    }

    /**
     * @param string $mail_user
     */
    public function setMailUser(string $mail_user): void
    {
        if (strlen($mail_user) < 5 && strlen($mail_user) > 120) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->mail_user = $mail_user;
        }
    }

    /**
     * @param string $signup_date_user
     */
    public function setSignupDateUser(string $signup_date_user): void
    {
        $verifyDate = new Date($signup_date_user);
        if (!is_object($verifyDate)) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->signup_date_user = $signup_date_user;
        }
    }

    /**
     * @param string $color_user
     */
    public function setColorUser(string $color_user): void
    {
        if (!(is_string($color_user) && ( is_object(json_decode($color_user)) || is_array(json_decode($color_user))))) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->color_user = $color_user;
        }
    }

    /**
     * @param string $confirmation_key_user
     */
    public function setConfirmationKeyUser(string $confirmation_key_user): void
    {
        if (strlen($confirmation_key_user) < 5 && strlen($confirmation_key_user) > 60) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->confirmation_key_user = $confirmation_key_user;
        }
    }

    /**
     * @param int $validation_status_key
     */
    public function setValidationStatusKey(int $validation_status_key): void
    {
        if (!is_int($validation_status_key) && empty($validation_status_key)) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->validation_status_key = $validation_status_key;
        }
    }
}