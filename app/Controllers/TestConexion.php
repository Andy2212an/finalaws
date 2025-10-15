<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Database;

class TestConexion extends Controller
{
    public function index()
    {
        $db = Database::connect();
        $query = $db->query("SELECT GETDATE() AS FechaActual");
        $row = $query->getRow();
        echo "Conexión exitosa. Fecha actual del servidor SQL: " . $row->FechaActual;
    }
}