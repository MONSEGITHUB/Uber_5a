<?php
require_once __DIR__ . '/../models/PersonaModel.php';

class PersonaController {
    private $model;

    public function __construct() {
        $this->model = new PersonaModel();
    }

    // Obtener todas las personas
    public function obtenerTodasLasPersonas() {
        return $this->model->obtenerPersonas();
    }

    // Obtener una persona por su ID
    public function obtenerPersona($id) {
        if (is_numeric($id)) {
            return $this->model->obtenerPersonaPorId($id);
        }
        throw new Exception("ID inválido");
    }

    // Agregar una nueva persona
    public function agregarPersona($nombre, $direccion, $estado_civil, $sexo, $telefono) {
        if (!empty($nombre) && !empty($direccion) && !empty($estado_civil) && !empty($sexo) && !empty($telefono)) {
            $this->model->agregarPersona($nombre, $direccion, $estado_civil, $sexo, $telefono);
        } else {
            throw new Exception("Todos los campos son obligatorios para agregar una persona");
        }
    }

    // Actualizar una persona existente
    public function actualizarPersona($id, $nombre, $direccion, $estado_civil, $sexo, $telefono) {
        if (is_numeric($id) && !empty($nombre) && !empty($direccion) && !empty($estado_civil) && !empty($sexo) && !empty($telefono)) {
            $this->model->actualizarPersona($id, $nombre, $direccion, $estado_civil, $sexo, $telefono);
        } else {
            throw new Exception("Datos incompletos o ID inválido para actualizar la persona");
        }
    }

    // Eliminar una persona
    public function eliminarPersona($id) {
        if (is_numeric($id)) {
            $this->model->eliminarPersona($id);
        } else {
            throw new Exception("ID inválido para eliminar persona");
        }
    }
}
?>