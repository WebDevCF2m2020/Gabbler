<?php

/**
 * Class Reported
 * Mapping of the Reported's table
 */
class Reported extends MappingTableAbstract {

    // PROPERTIES
    protected int $id_reported;
    protected string $inquiry_reported;
    protected int $processed_reported = 1;
    protected int $fkey_category_id;
    protected int $fkey_message_id;


    // GETTERS

    /**
     * $id_reported's getter
     * @return int
     */
    public function getIdReported(): int {
        return $this->id_reported;
    }

    /**
     * $inquiry_reported's getter
     * @return string
     */
    public function getInquiryReported(): string {
        return $this->inquiry_reported;
    }

    /**
     * $processed_reported's getter
     * @return int
     */
    public function getProcessedReported(): int {
        return $this->processed_reported;
    }

    /**
     * $fkey_category_id's getter
     * @return int
     */
    public function getFkeyCategoryId(): int {
        return $this->fkey_category_id;
    }

    /**
     * $fkey_message_id's getter
     * @return int
     */
    public function getFkeyMessageId(): int {
        return $this->fkey_message_id;
    }

    // SETTERS

    /**
     * $id_reported's setter
     * @param int $id_reported
     */
    public function setIdReported(int $id_reported): void {
        $id_reported = (int) $id_reported;
        if (empty($id_reported)){
            trigger_error("The reported ID can't be 0", E_USER_NOTICE);
        } else {
            $this->id_reported = $id_reported;
        }
    }

    /**
     * $inquiry_reported's setter
     * @param string $inquiry_reported
     */
    public function setInquiryReported(string $inquiry_reported): void {
        $inquiry_reported = strip_tags(trim($inquiry_reported));
        if (empty($inquiry_reported)) {
            trigger_error('The inquiry content can\'t be empty', E_USER_NOTICE);
        } else {
            $this->inquiry_reported = $inquiry_reported;
        }
    }

    /**
     * $processed_reported's setter
     * @param int $processed_reported
     */
    public function setProcessedReported(int $processed_reported): void {
        $processed_reported = (int)$processed_reported;
        if($processed_reported === 1 || $processed_reported === 2){
            trigger_error("The status has to be 1 (not processed) or 2(processed)",E_USER_NOTICE);
        } else {
            $this->processed_reported = $processed_reported;
        }
    }

    /**
     * $fkey_category_id's setter
     * @param int $fkey_category_id
     */
    public function setFkeyCategoryId(int $fkey_category_id): void
    {
        $fkey_category_id = (int)$fkey_category_id;
        if (empty($fkey_category_id)) {
            trigger_error('The foreign key for the category can\'t be empty', E_USER_NOTICE);
        } else {
            $this->fkey_category_id = $fkey_category_id;
        }
    }

    /**
     * $fkey_message_id's setter
     * @param int $fkey_message_id
     */
    public function setFkeyMessageId(int $fkey_message_id): void
    {
        $fkey_message_id = (int)$fkey_message_id;
        if (empty($fkey_message_id)) {
            trigger_error('The foreign key for the message can\'t be empty', E_USER_NOTICE);
        } else {
            $this->fkey_message_id = $fkey_message_id;
        }
    }
}