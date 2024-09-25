<?php
class TareaDiseno extends Tarea {
    private $herramientaDiseno;

    public function __construct($data) {
        parent::__construct($data);
        $this->herramientaDiseno = $data['herramientaDiseno'];
    }

    public function obtenerDetallesEspecificos(): string {
        return "Herramienta de Diseño: " . $this->herramientaDiseno;
    }

    public function getHerramientaDiseno() {
        return $this->herramientaDiseno;
    }
}
