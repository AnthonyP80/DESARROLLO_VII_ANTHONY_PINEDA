<?php
class TareaDesarrollo extends Tarea {
    private $lenguajeProgramacion;

    public function __construct($data) {
        parent::__construct($data);
        $this->lenguajeProgramacion = $data['lenguajeProgramacion'];
    }

    public function obtenerDetallesEspecificos(): string {
        return "Lenguaje de Programación: " . $this->lenguajeProgramacion;
    }

    public function getLenguajeProgramacion() {
        return $this->lenguajeProgramacion;
    }
}
