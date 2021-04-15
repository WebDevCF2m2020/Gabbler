<?php

/**
 * Class Help
 * Mapping of help's table
 */
class Help extends MappingTableAbstract {

    // PROPERTIES
    protected int $id_help;
    protected string $mail_help;
    protected string $nickname_help;
    protected string $subject_help;
    protected string $content_help;
    protected string $date_help;
    protected int $processed_help = 1;
    protected int $user_id;

    // GETTERS

    /**
     * $id_help's getter
     * @return int
     */
    public function getIdHelp(): int {
        return $this->id_help;
    }

    /**
     * $mail_help's getter
     * @return string
     */
    public function getMailHelp(): string {
        return $this->mail_help;
    }

    /**
     * $nickname_help's getter
     * @return string
     */
    public function getNicknameHelp(): string {
        return $this->nickname_help;
    }

    /**
     * $subject_help's getter
     * @return string
     */
    public function getSubjectHelp(): string {
        return $this->subject_help;
    }

    /**
     * $content_help's getter
     * @return string
     */
    public function getContentHelp(): string {
        return $this->content_help;
    }

    /**
     * $processed_help's getter
     * @return int
     */
    public function getProcessedHelp(): int {
        return $this->processed_help;
    }

    /**
     * $user_id's getter
     * @return int
     */
    public function getUserId(): int {
        return $this->user_id;
    }

    /**
     * $date_help's getter
     * @return string
     */
    public function getDateHelp(): string {
        return $this->date_help;
    }

    // SETTERS

    /**
     * $id_help's setter
     * @param int $id_help
     */
    public function setIdHelp(int $id_help): void {
        $id_help = (int) $id_help;
        if (empty($id_help)) {
            trigger_error("The user ID can't be 0", E_USER_NOTICE);
        } else {
            $this->id_help = $id_help;
        }
    }

    /**
     * $mail_help's setter
     * @param string $mail_help
     */
    public function setMailHelp(string $mail_help): void {
        if (!(filter_var($mail_help, FILTER_VALIDATE_EMAIL))) {
            trigger_error("A valid e-mail address is needed", E_USER_NOTICE);
        } else if (strlen($mail_help) > 120) {
            trigger_error("The e-mail address can't be too long", E_USER_NOTICE);
        } else {
            $this->mail_help = $mail_help;
        }
    }

    /**
     * $nickname_help's setter
     * @param string $nickname_help
     */
    public function setNicknameHelp(string $nickname_help): void {
        $nickname_help = strip_tags(trim($nickname_help));
        if (empty($nickname_help)) {
            trigger_error("Your name / login can't be empty", E_USER_NOTICE);
        } elseif (strlen($nickname_help) > 80) {
            trigger_error("Your name / login can't be longer than 80 characters", E_USER_NOTICE);
        } else {
            $this->nickname_help = $nickname_help;
        }
    }

    /**
     * $subject_help's setter
     * @param string $subject_help
     */
    public function setSubjectHelp(string $subject_help): void {
        $subject_help = strip_tags(trim($subject_help));
        if (empty($subject_help)) {
            trigger_error("The message's subject can't be empty", E_USER_NOTICE);
        } elseif (strlen($subject_help) > 120) {
            trigger_error("The message's subject can't be longer than 120 characters", E_USER_NOTICE);
        } else {
            $this->subject_help = $subject_help;
        }
    }

    /**
     * $content_help's setter
     * @param string $content_help
     */
    public function setContentHelp(string $content_help): void {
        $content_help = strip_tags(trim($content_help));
        if (empty($content_help)) {
            trigger_error("The message's content can't be empty", E_USER_NOTICE);
        } else {
            $this->content_help = $content_help;
        }
    }

    /**
     * $processed_help's setter
     * @param int $processed_help
     */
    public function setProcessedHelp(int $processed_help): void {
        if ($processed_help < 1 || $processed_help > 3) {
            trigger_error("The status has to be between 1 and 3", E_USER_NOTICE);
        } else {
            $this->processed_help = $processed_help;
        }
    }

    /**
     * $user_id's setter
     * @param int $user_id
     */
    public function setUserId($user_id): void {
        $user_id = (int) $user_id;
        $this->user_id = $user_id;
    }

    /**
     * $date_help's setter
     * @param string $date_help
     */
    public function setDateHelp(string $date_help): void {
        $verifyDate = new DateTime($date_help);
        if (empty($date_help)) {
            trigger_error('The Help date cannot be empty', E_USER_NOTICE);
        } else if (!is_object($verifyDate)) {
            trigger_error('The Help date is not valid', E_USER_NOTICE);
        } else {
            $this->date_help = $date_help;
        }
    }

}
