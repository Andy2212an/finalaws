<?php

namespace App\Models;

use CodeIgniter\Model;

class Mascota extends Model
{
    protected $table = 'Mascotas';
    protected $primaryKey = 'ID';

    protected $allowedFields = [
        'Nombre', 'Especie', 'Raza', 'Edad', 'Sexo', 'Color', 'Peso',
        'NombreDueno', 'TelefonoDueno', 'DireccionDueno', 'FechaVacunacion'
    ];

    protected $useTimestamps = false; // no usas campos created_at, updated_at
}
