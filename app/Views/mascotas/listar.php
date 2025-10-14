<?= $header; ?>

<div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Lista de Mascotas</h4>
    <a href="<?= base_url('crear'); ?>" class="btn btn-sm btn-primary">Registrar Mascota</a>
  </div>

  <div class="table-responsive">
    <table class="table table-striped table-hover table-sm">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Especie</th>
          <th>Raza</th>
          <th>Edad</th>
          <th>Sexo</th>
          <th>Dueño</th>
          <th>Teléfono</th>
          <th>Fecha Vacunación</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php if(empty($mascotas)): ?>
          <tr>
            <td colspan="10" class="text-center">No se encontraron mascotas</td>
          </tr>
        <?php else: ?>
          <?php foreach($mascotas as $mascota): ?>
            <tr>
              <td><?= esc($mascota['ID']) ?></td>
              <td><?= esc($mascota['Nombre']) ?></td>
              <td><?= esc($mascota['Especie']) ?></td>
              <td><?= esc($mascota['Raza']) ?></td>
              <td><?= esc($mascota['Edad']) ?></td>
              <td><?= esc($mascota['Sexo']) ?></td>
              <td><?= esc($mascota['NombreDueno']) ?></td>
              <td><?= esc($mascota['TelefonoDueno']) ?></td>
              <td><?= esc($mascota['FechaVacunacion']) ?></td>
              <td>
                <a href="<?= base_url('editar/' . $mascota['ID']) ?>" class="btn btn-sm btn-info">Editar</a>
                <a href="<?= base_url('borrar/' . $mascota['ID']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar mascota ID <?= $mascota['ID'] ?>?')">Eliminar</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?= $footer; ?>
