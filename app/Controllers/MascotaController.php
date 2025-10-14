<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Mascota;

class MascotaController extends BaseController
{
    public function listar()
    {
        $model = new Mascota();
        $data['mascotas'] = $model->orderBy('ID', 'ASC')->findAll();

        // Cargar vistas parciales
        $data['header'] = view('layouts/header');
        $data['footer'] = view('layouts/footer');

        return view('mascotas/listar', $data);
    }

    public function crear()
    {
        $data['header'] = view('layouts/header');
        $data['footer'] = view('layouts/footer');

        return view('mascotas/crear', $data);
    }

    public function guardar()
    {
        $model = new Mascota();

        $data = [
            'Nombre'          => $this->request->getPost('Nombre'),
            'Especie'         => $this->request->getPost('Especie'),
            'Raza'            => $this->request->getPost('Raza'),
            'Edad'            => $this->request->getPost('Edad'),
            'Sexo'            => $this->request->getPost('Sexo'),
            'Color'           => $this->request->getPost('Color'),
            'Peso'            => $this->request->getPost('Peso'),
            'NombreDueno'     => $this->request->getPost('NombreDueno'),
            'TelefonoDueno'   => $this->request->getPost('TelefonoDueno'),
            'DireccionDueno'  => $this->request->getPost('DireccionDueno'),
            'FechaVacunacion' => $this->request->getPost('FechaVacunacion'),
        ];

        $model->insert($data);
        return redirect()->to('/');
    }

    public function editar($id = null)
    {
        $model = new Mascota();
        $data['mascota'] = $model->find($id);

        if (!$data['mascota']) {
            return redirect()->to('/');
        }

        $data['header'] = view('layouts/header');
        $data['footer'] = view('layouts/footer');

        return view('mascotas/editar', $data);
    }

    public function actualizar()
    {
        $model = new Mascota();

        $id = $this->request->getPost('ID');

        $data = [
            'Nombre'          => $this->request->getPost('Nombre'),
            'Especie'         => $this->request->getPost('Especie'),
            'Raza'            => $this->request->getPost('Raza'),
            'Edad'            => $this->request->getPost('Edad'),
            'Sexo'            => $this->request->getPost('Sexo'),
            'Color'           => $this->request->getPost('Color'),
            'Peso'            => $this->request->getPost('Peso'),
            'NombreDueno'     => $this->request->getPost('NombreDueno'),
            'TelefonoDueno'   => $this->request->getPost('TelefonoDueno'),
            'DireccionDueno'  => $this->request->getPost('DireccionDueno'),
            'FechaVacunacion' => $this->request->getPost('FechaVacunacion'),
        ];

        $model->update($id, $data);
        return redirect()->to('/');
    }

    public function borrar($id = null)
    {
        $model = new Mascota();
        $model->delete($id);
        return redirect()->to('/');
    }
}
