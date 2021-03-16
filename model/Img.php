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


}