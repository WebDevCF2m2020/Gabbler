<?php


class Img
{
    protected int $id_img;
    protected string $name_img;
    protected int $active_img = 2;
    protected string $date_img;

    /**
     * @return int
     */
    public function getIdImg(): int
    {
        return $this->id_img;
    }

    /**
     * @return string
     */
    public function getNameImg(): string
    {
        return $this->name_img;
    }

    /**
     * @return int
     */
    public function getActiveImg(): int
    {
        return $this->active_img;
    }

    /**
     * @return string
     */
    public function getDateImg(): string
    {
        return $this->date_img;
    }

    /**
     * @param int $id_img
     */
    public function setIdImg(int $id_img): void
    {
        $id_img = (int)$id_img;
        if (empty($id_img)) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->id_img = $id_img;
        }
    }

    /**
     * @param string $name_img
     */
    public function setNameImg(string $name_img): void
    {
        $name_img = strip_tags(trim($name_img));
        if (empty($name_img)) {
            trigger_error('', E_USER_NOTICE);
        } else if (strlen($name_img) < 5 || strlen($name_img) > 40) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->name_img = $name_img;
        }
    }

    /**
     * @param int $active_img
     */
    public function setActiveImg(int $active_img): void
    {
        $active_img = (int)$active_img;
        if (empty($active_img)) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->active_img = $active_img;
        }
    }

    /**
     * @param string $date_img
     * @throws Exception
     */
    public function setDateImg(string $date_img): void
    {
        $test_date_img = new DateTime($date_img);
        if (empty($date_img)) {
            trigger_error('', E_USER_NOTICE);
        } else if (!is_object($date_img)) {
            trigger_error('', E_USER_NOTICE);
        } else {
            $this->date_img = $date_img;
        }
    }
}