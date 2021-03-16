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
        $this->id_img = $id_img;
    }

    /**
     * @param string $name_img
     */
    public function setNameImg(string $name_img): void
    {
        $this->name_img = $name_img;
    }

    /**
     * @param int $active_img
     */
    public function setActiveImg(int $active_img): void
    {
        $this->active_img = $active_img;
    }

    /**
     * @param string $date_img
     */
    public function setDateImg(string $date_img): void
    {
        $this->date_img = $date_img;
    }
}