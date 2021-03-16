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

}