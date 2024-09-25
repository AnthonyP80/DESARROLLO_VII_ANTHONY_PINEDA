<?php
class TareaTesting extends Tarea {
    private $tipoTest;

    public function __construct($data) {
        parent::__construct($data);
        $this->tipoTest = $data['tipoTest'];
    }

    public function obtenerDetallesEspecificos(): string {
        return "Tipo de Test: " . $this->tipoTest;
    }

    public function getTipoTest() {
        return $this->tipoTest;
    }
}
