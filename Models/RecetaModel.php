<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class RecetaModel extends Model {
    
	protected $table = 'receta';
	protected $primaryKey = 'id_receta';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['id_visita', 'desc_receta'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
	protected $with = ['visita'];

    public function visita() {
        return $this->belongsTo(VisitaModel::class, 'id_visita', 'id_visita');
    } 

    public function obtenerRecetasConNombreMascota() {
        return $this->select('receta.id_receta, mascota.nombre as nombre_mascota')
                    ->join('visita', 'visita.id_visita = receta.id_visita')
                    ->join('mascota', 'mascota.id_mascota = visita.id_mascota')
                    ->findAll();
    }
}