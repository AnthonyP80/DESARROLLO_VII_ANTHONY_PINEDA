<?php
abstract class Clases {
    protected $id;
    protected $titulo;
    protected $descripcion;
    protected $estado;
    protected $prioridad;
    protected $fechaCreacion;

    public function __construct($data) {
        $this->id = $data['id'];
        $this->titulo = $data['titulo'];
        $this->descripcion = $data['descripcion'];
        $this->estado = $data['estado'];
        $this->prioridad = $data['prioridad'];
        $this->fechaCreacion = $data['fechaCreacion'];
    }

    public function getId() {
        return $this->id;
    }



    abstract public function obtenerDetallesEspecificos(): string;
   
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
}

    class GestorTareas {
        private $tareas = [];
        
        private $archivoJson = 'tareas.json';
    
        public function __construct() {
            $this->cargarTareas();
        }
    
        public function cargarTareas() {
            if (file_exists($this->archivoJson)) {
                $data = json_decode(file_get_contents($this->archivoJson), true);
                foreach ($data as $tareaData) {
                    switch ($tareaData['tipo']) {
                        case 'desarrollo':
                            $this->tareas[] = new TareaDesarrollo($tareaData);
                            break;
                        case 'diseno':
                            $this->tareas[] = new TareaDiseno($tareaData);
                            break;
                        case 'testing':
                            $this->tareas[] = new TareaTesting($tareaData);
                            break;
                    }
                }
            }
        }
    
        public function agregarTarea($tarea) {
            $this->tareas[] = $tarea;
            $this->guardarTareas();
        }
    
        public function eliminarTarea($id) {
            foreach ($this->tareas as $index => $tarea) {
                if ($tarea->id === $id) {
                    unset($this->tareas[$index]);
                    break;
                }
            }
            $this->guardarTareas();
        }
    
        public function actualizarTarea($tareaActualizada) {
            foreach ($this->tareas as $index => $tarea) {
                if ($tarea->id === $tareaActualizada->id) {
                    $this->tareas[$index] = $tareaActualizada;
                    break;
                }
            }
            $this->guardarTareas();
        }
    
        public function actualizarEstadoTarea($id, $nuevoEstado) {
            foreach ($this->tareas as $tarea) {
                if ($tarea->id === $id) {
                    $tarea->setEstado($nuevoEstado);
                    break;
                }
            }
            $this->guardarTareas();
        }
    
        public function buscarTareasPorEstado($estado) {
            return array_filter($this->tareas, function ($tarea) use ($estado) {
                return $tarea->getEstado() === $estado;
            });
        }
    
        public function listarTareas($filtroEstado = '') {
            if ($filtroEstado) {
                return $this->buscarTareasPorEstado($filtroEstado);
            }
            return $this->tareas;
        }
    
        public function guardarTareas() {
            $data = array_map(function ($tarea) {
                return [
                    'id' => $tarea->getId(), // Cambiado para usar el método getter
                    'titulo' => $tarea->titulo,
                    'descripcion' => $tarea->descripcion,
                    'estado' => $tarea->getEstado(),
                    'prioridad' => $tarea->prioridad,
                    'fechaCreacion' => $tarea->fechaCreacion,
                    'tipo' => strtolower((new \ReflectionClass($tarea))->getShortName()),
                    'lenguajeProgramacion' => $tarea instanceof TareaDesarrollo ? $tarea->getLenguajeProgramacion() : null,
                    'herramientaDiseno' => $tarea instanceof TareaDiseno ? $tarea->getHerramientaDiseno() : null,
                    'tipoTest' => $tarea instanceof TareaTesting ? $tarea->getTipoTest() : null,
                ];
            }, $this->tareas);
        
            file_put_contents($this->archivoJson, json_encode($data, JSON_PRETTY_PRINT));
        }
        
        
    }


