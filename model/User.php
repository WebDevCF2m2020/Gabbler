<?php

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
        $this->id_user = $id_user;
    }

    /**
     * @param string $nickname_user
     */
    public function setNicknameUser(string $nickname_user): void
    {
        $this->nickname_user = $nickname_user;
    }

    /**
     * @param string $pwd_user
     */
    public function setPwdUser(string $pwd_user): void
    {
        $this->pwd_user = $pwd_user;
    }

    /**
     * @param string $mail_user
     */
    public function setMailUser(string $mail_user): void
    {
        $this->mail_user = $mail_user;
    }

    /**
     * @param object $signup_date_user
     */
    public function setSignupDateUser(object $signup_date_user): void
    {
        $this->signup_date_user = $signup_date_user;
    }

    /**
     * @param string $color_user
     */
    public function setColorUser(string $color_user): void
    {
        $this->color_user = $color_user;
    }

    /**
     * @param string $confirmation_key_user
     */
    public function setConfirmationKeyUser(string $confirmation_key_user): void
    {
        $this->confirmation_key_user = $confirmation_key_user;
    }

    /**
     * @param int $validation_status_key
     */
    public function setValidationStatusKey(int $validation_status_key): void
    {
        $this->validation_status_key = $validation_status_key;
    }
}