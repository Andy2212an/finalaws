<?= $header; ?>

<div class="container mt-4">
    <h1 class="mb-4">Editar Mascota ID <?= $mascota['ID'] ?></h1>
    <form action="<?= base_url('actualizar') ?>" method="post">
        <input type="hidden" name="ID" value="<?= $mascota['ID'] ?>">
        
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?= esc($mascota['Nombre']) ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="Especie" class="form-label">Especie</label>
            <select class="form-select" id="Especie" name="Especie" required>
                <option value="" disabled>Seleccione una especie</option>
                <option value="Perro" <?= $mascota['Especie'] == 'Perro' ? 'selected' : '' ?>>Perro</option>
                <option value="Gato" <?= $mascota['Especie'] == 'Gato' ? 'selected' : '' ?>>Gato</option>
                <option value="Ave" <?= $mascota['Especie'] == 'Ave' ? 'selected' : '' ?>>Ave</option>
                <option value="Pez" <?= $mascota['Especie'] == 'Pez' ? 'selected' : '' ?>>Pez</option>
                <option value="Otro" <?= $mascota['Especie'] == 'Otro' ? 'selected' : '' ?>>Otro</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="Raza" class="form-label">Raza</label>
            <select class="form-select" id="Raza" name="Raza">
                <option value="">Seleccione una raza (opcional)</option>
                <!-- Opciones se cargarán dinámicamente con JavaScript -->
            </select>
        </div>
        
        <div class="mb-3">
            <label for="Edad" class="form-label">Edad</label>
            <input type="number" class="form-control" id="Edad" name="Edad" min="0" value="<?= esc($mascota['Edad']) ?>">
        </div>
        
        <div class="mb-3">
            <label for="Sexo" class="form-label">Sexo</label>
            <select class="form-select" id="Sexo" name="Sexo" required>
                <option value="M" <?= $mascota['Sexo'] == 'M' ? 'selected' : '' ?>>M</option>
                <option value="F" <?= $mascota['Sexo'] == 'F' ? 'selected' : '' ?>>F</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="Color" class="form-label">Color</label>
            <input type="text" class="form-control" id="Color" name="Color" value="<?= esc($mascota['Color']) ?>">
        </div>
        
        <div class="mb-3">
            <label for="Peso" class="form-label">Peso (kg)</label>
            <input type="number" class="form-control" id="Peso" name="Peso" step="0.01" min="0" value="<?= esc($mascota['Peso']) ?>">
        </div>
        
        <div class="mb-3">
            <label for="NombreDueno" class="form-label">Nombre Dueño</label>
            <input type="text" class="form-control" id="NombreDueno" name="NombreDueno" value="<?= esc($mascota['NombreDueno']) ?>">
        </div>
        
        <div class="mb-3">
            <label for="TelefonoDueno" class="form-label">Teléfono Dueño</label>
            <input type="text" class="form-control" id="TelefonoDueno" name="TelefonoDueno" value="<?= esc($mascota['TelefonoDueno']) ?>">
        </div>
        
        <div class="mb-3">
            <label for="DireccionDueno" class="form-label">Dirección Dueño</label>
            <input type="text" class="form-control" id="DireccionDueno" name="DireccionDueno" value="<?= esc($mascota['DireccionDueno']) ?>">
        </div>
        
        <div class="mb-3">
            <label for="FechaVacunacion" class="form-label">Fecha Vacunación</label>
            <input type="date" class="form-control" id="FechaVacunacion" name="FechaVacunacion" value="<?= esc($mascota['FechaVacunacion']) ?>">
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="<?= base_url('/') ?>" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const razaSelect = document.getElementById('Raza');
        const especieSelect = document.getElementById('Especie');

        const razasPorEspecie = {
            'Perro': ['Labrador', 'Bulldog', 'Beagle', 'Otro'],
            'Gato': ['Siames', 'Persa', 'Maine Coon', 'Otro'],
            'Ave': ['Guacamayo', 'Canario', 'Otro'],
            'Pez': ['Betta', 'Goldfish', 'Otro'],
            'Otro': ['Otro']
        };

        function cargarRazas(especie, razaActual) {
            razaSelect.innerHTML = '';
            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.textContent = 'Seleccione una raza (opcional)';
            razaSelect.appendChild(defaultOption);

            if (razasPorEspecie[especie]) {
                razasPorEspecie[especie].forEach(raza => {
                    const option = document.createElement('option');
                    option.value = raza;
                    option.textContent = raza;
                    if (raza === razaActual) {
                        option.selected = true;
                    }
                    razaSelect.appendChild(option);
                });
            }
        }

        // Carga inicial con los valores actuales
        cargarRazas(especieSelect.value, "<?= esc($mascota['Raza']) ?>");

        especieSelect.addEventListener('change', () => {
            cargarRazas(especieSelect.value, '');
        });
    });
</script>

<?= $footer; ?>

