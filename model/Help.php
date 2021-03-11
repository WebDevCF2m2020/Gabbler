<?php
require_once "ManagerTableAbstract.php";
/**
 * Class Help
 * Mapping of help's table
 */
class Help extends MappingTableAbstract {

    // PROPERTIES
    protected int $idHelp;
    protected string $mailHelp;
    protected string $nicknameHelp;
    protected string $subjectHelp;
    protected string $contentHelp;
    protected int $processedHelp = 1;
    protected int $userId;

    // GETTERS

    /**
     * $idHelp's getter
     * @return int
     */
    public function getIdHelp(): int {
        return $this->idHelp;
    }

    /**
     * $mailHelp's getter
     * @return string
     */
    public function getMailHelp(): string {
        return $this->mailHelp;
    }

    /**
     * $nicknameHelp's getter
     * @return string
     */
    public function getNicknameHelp(): string {
        return $this->nicknameHelp;
    }

    /**
     * $subjectHelp's getter
     * @return string
     */
    public function getSubjectHelp(): string {
        return $this->subjectHelp;
    }

    /**
     * $contentHelp's getter
     * @return string
     */
    public function getContentHelp(): string {
        return $this->contentHelp;
    }

    /**
     * $processedHelp's getter
     * @return int
     */
    public function getProcessedHelp(): int {
        return $this->processedHelp;
    }

    /**
     * $userId's getter
     * @return int
     */
    public function getUserId(): int {
        return $this->userId;
    }

    // SETTERS

    /**
     * $idHelp's setter
     * @param int $idHelp
     */
    public function setidHelp(int $idHelp): void {
        if (empty($idHelp)){
            trigger_error("The user ID can't be 0", E_USER_NOTICE);
        } else {
            $this->idHelp = $idHelp;
        }
    }

    /**
     * $mailHelp's setter
     * @param string $mailHelp
     */
    public function setMailHelp(string $mailHelp): void {
        if (!(filter_var($mailHelp, FILTER_VALIDATE_EMAIL))){
            trigger_error("A valid e-mail address is needed", E_USER_NOTICE);
        } else if (strlen($mailHelp) > 120) {
            trigger_error("The e-mail address can't be too long", E_USER_NOTICE);
        } else {
            $this->mailHelp = $mailHelp;
        }
    }

    /**
     * $nicknameHelp's setter
     * @param string $nicknameHelp
     */
    public function setNicknameHelp(string $nicknameHelp): void {
        $nicknameHelp = strip_tags(trim($nicknameHelp));
        if (empty($nicknameHelp)) {
            trigger_error("Your name / login can't be empty", E_USER_NOTICE);
        } elseif (strlen($nicknameHelp) > 80) {
            trigger_error("Your name / login can't be longer than 80 characters", E_USER_NOTICE);
        } else {
            $this->nicknameHelp = $nicknameHelp;
        }
    }

    /**
     * $subjectHelp's setter
     * @param string $subjectHelp
     */
    public function setSubjectHelp(string $subjectHelp): void {
        $subjectHelp = strip_tags(trim($subjectHelp));
        if (empty($subjectHelp)) {
            trigger_error("The message's subject can't be empty", E_USER_NOTICE);
        } elseif (strlen($subjectHelp) > 120) {
            trigger_error("The message's subject can't be longer than 120 characters", E_USER_NOTICE);
        } else {
            $this->subjectHelp = $subjectHelp;
        }
    }

    /**
     * $contentHelp's setter
     * @param string $contentHelp
     */
    public function setContentHelp(string $contentHelp): void {
        $contentHelp = strip_tags(trim($contentHelp));
        if (empty($contentHelp)) {
            trigger_error("The message's content can't be empty", E_USER_NOTICE);
        } else {
            $this->contentHelp = $contentHelp;
        }
    }

    /**
     * $processedHelp's setter
     * @param int $processedHelp
     */
    public function setProcessedHelp(int $processedHelp): void {
        if($processedHelp < 1 || $processedHelp > 3){
            trigger_error("The status has to be between 1 and 3",E_USER_NOTICE);
        } else {
            $this->processedHelp = $processedHelp;
        }
    }

    /**
     * $userId's setter
     * @param int $userId
     */
    public function setUserId(int $userId): void {
        $this->userId = $userId;
    }
}