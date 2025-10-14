<?= $header; ?>

<div class="container mt-4">
    <h1 class="mb-4">Crear Nueva Mascota</h1>
    <form action="<?= base_url('guardar') ?>" method="post">
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" required>
        </div>
        <div class="mb-3">
            <label for="Especie" class="form-label">Especie</label>
            <select class="form-select" id="Especie" name="Especie" required>
                <option value="" selected disabled>Seleccione una especie</option>
                <option value="Perro">Perro</option>
                <option value="Gato">Gato</option>
                <option value="Ave">Ave</option>
                <option value="Pez">Pez</option>
                <option value="Otro">Otro</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="Raza" class="form-label">Raza</label>
            <select class="form-select" id="Raza" name="Raza">
                <option value="" selected>Seleccione una raza (opcional)</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="Edad" class="form-label">Edad</label>
            <input type="number" class="form-control" id="Edad" name="Edad" min="0">
        </div>
        <div class="mb-3">
            <label for="Sexo" class="form-label">Sexo</label>
            <select class="form-select" id="Sexo" name="Sexo" required>
                <option value="" selected disabled>Seleccione</option>
                <option value="M">M</option>
                <option value="F">F</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="Color" class="form-label">Color</label>
            <input type="text" class="form-control" id="Color" name="Color">
        </div>
        <div class="mb-3">
            <label for="Peso" class="form-label">Peso (kg)</label>
            <input type="number" class="form-control" id="Peso" name="Peso" step="0.01" min="0">
        </div>
        <div class="mb-3">
            <label for="NombreDueno" class="form-label">Nombre Dueño</label>
            <input type="text" class="form-control" id="NombreDueno" name="NombreDueno">
        </div>
        <div class="mb-3">
            <label for="TelefonoDueno" class="form-label">Teléfono Dueño</label>
            <input type="text" class="form-control" id="TelefonoDueno" name="TelefonoDueno">
        </div>
        <div class="mb-3">
            <label for="DireccionDueno" class="form-label">Dirección Dueño</label>
            <input type="text" class="form-control" id="DireccionDueno" name="DireccionDueno">
        </div>
        <div class="mb-3">
            <label for="FechaVacunacion" class="form-label">Fecha Vacunación</label>
            <input type="date" class="form-control" id="FechaVacunacion" name="FechaVacunacion">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="<?= base_url('/') ?>" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const razaSelect = document.getElementById('Raza');
        const especieSelect = document.getElementById('Especie');

        // Opciones de razas por especie
        const razasPorEspecie = {
            'Perro': ['Labrador', 'Bulldog', 'Beagle', 'Otro'],
            'Gato': ['Siames', 'Persa', 'Maine Coon', 'Otro'],
            'Ave': ['Guacamayo', 'Canario', 'Otro'],
            'Pez': ['Betta', 'Goldfish', 'Otro'],
            'Otro': ['Otro']
        };

        especieSelect.addEventListener('change', () => {
            const especieSeleccionada = especieSelect.value;

            // Limpiar opciones actuales
            razaSelect.innerHTML = '';

            // Agregar opción por defecto
            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.textContent = 'Seleccione una raza (opcional)';
            defaultOption.selected = true;
            razaSelect.appendChild(defaultOption);

            // Llenar las razas según especie seleccionada
            if (razasPorEspecie[especieSeleccionada]) {
                razasPorEspecie[especieSeleccionada].forEach(raza => {
                    const option = document.createElement('option');
                    option.value = raza;
                    option.textContent = raza;
                    razaSelect.appendChild(option);
                });
            }
        });
    });
</script>

<?= $footer; ?>
