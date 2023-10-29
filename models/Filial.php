<?php
class Filial implements IModel{
    private int $id;
    private string $desc;

    public function __construct($id, $desc) {
        $this->id = $id;
        $this->$desc = $desc;
    }

    public function getId() {
        return $this->id;
    }

    public function getDesc() {
        return $this->desc;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDesc($desc) {
        $this->desc = $desc;
    }

    public function update() {

    }

    public function delete() {

    }


}