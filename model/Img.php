<?php


class Img extends MappingTableAbstract
{
    protected int $id_img;
    protected string $name_img;
    protected int $active_img = 2;
    protected string $date_img;

    /**
     * Img ID getter
     * @return int
     */
    public function getIdImg(): int
    {
        return $this->id_img;
    }

    /**
     * Name Img getter
     * @return string
     */
    public function getNameImg(): string
    {
        return $this->name_img;
    }

    /**
     * Active Img getter
     * @return int
     */
    public function getActiveImg(): int
    {
        return $this->active_img;
    }

    /**
     * Date Img getter
     * @return string
     */
    public function getDateImg(): string
    {
        return $this->date_img;
    }

    /**
     * Img ID setter
     * @param int $id_img
     */
    public function setIdImg(int $id_img): void
    {
        $id_img = (int)$id_img;
        if (empty($id_img)) {
            trigger_error('The img ID is not valid', E_USER_NOTICE);
        } else {
            $this->id_img = $id_img;
        }
    }

    /**
     * Name img setter
     * @param string $name_img
     */
    public function setNameImg(string $name_img): void
    {
        $name_img = strip_tags(trim($name_img));
        if (empty($name_img)) {
            trigger_error('The name image cannot be empty', E_USER_NOTICE);
        } else if (strlen($name_img) < 5 || strlen($name_img) > 40) {
            trigger_error('The length of the name image must be between 5 and 25 characters', E_USER_NOTICE);
        } else {
            $this->name_img = $name_img;
        }
    }

    /**
     * Active img getter
     * @param int $active_img
     */
    public function setActiveImg(int $active_img): void
    {
        $active_img = (int)$active_img;
        if (empty($active_img)) {
            trigger_error('The active image is not valid', E_USER_NOTICE);
        } else {
            $this->active_img = $active_img;
        }
    }

    /**
     * Date img setter
     * @param string $date_img
     * @throws Exception
     */
    public function setDateImg(string $date_img): void
    {
        $test_date_img = new DateTime($date_img);
        if (empty($date_img)) {
            trigger_error('The date of the image cannot be empty', E_USER_NOTICE);
        } else if (!is_object($date_img)) {
            trigger_error('the date of the image is not valid', E_USER_NOTICE);
        } else {
            $this->date_img = $date_img;
        }
    }
}