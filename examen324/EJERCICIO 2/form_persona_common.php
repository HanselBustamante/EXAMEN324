<?php
include 'conexion.php';

// Obtener los trámites desde la base de datos
$stmt = $pdo->prepare("SELECT * FROM Tramites");
$stmt->execute();
$tramites = $stmt->fetchAll();

// Cargar el distrito y la zona si se está editando una persona
$distritoSeleccionado = isset($persona['distrito']) ? $persona['distrito'] : '';
$zonaSeleccionada = isset($persona['zona']) ? $persona['zona'] : '';
?>

<div class="form-group">
    <label for="tipo_tramite">Tipo de Trámite:</label>
    <select name="tipo_tramite" class="form-control" required>
        <option value="">Seleccione un trámite</option>
        <?php foreach ($tramites as $tramite): ?>
            <option value="<?= $tramite['id'] ?>" <?= (isset($persona['id_tramite']) && $persona['id_tramite'] == $tramite['id']) ? 'selected' : '' ?>><?= $tramite['tipo_tramite'] ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <label for="distrito">Distrito:</label>
    <select name="distrito" id="distrito" class="form-control" required>
        <option value="">Seleccione un distrito</option>
        <option value="Centro Histórico" <?= ($distritoSeleccionado == "Centro Histórico") ? 'selected' : '' ?>>Centro Histórico</option>
        <option value="San Sebastián" <?= ($distritoSeleccionado == "San Sebastián") ? 'selected' : '' ?>>San Sebastián</option>
        <option value="Santa Teresa" <?= ($distritoSeleccionado == "Santa Teresa") ? 'selected' : '' ?>>Santa Teresa</option>
        <option value="San Pedro" <?= ($distritoSeleccionado == "San Pedro") ? 'selected' : '' ?>>San Pedro</option>
        <option value="Villa Victoria" <?= ($distritoSeleccionado == "Villa Victoria") ? 'selected' : '' ?>>Villa Victoria</option>
        <option value="El Tejar" <?= ($distritoSeleccionado == "El Tejar") ? 'selected' : '' ?>>El Tejar</option>
        <option value="San Jorge" <?= ($distritoSeleccionado == "San Jorge") ? 'selected' : '' ?>>San Jorge</option>
        <option value="Villa Fátima" <?= ($distritoSeleccionado == "Villa Fátima") ? 'selected' : '' ?>>Villa Fátima</option>
        <option value="Santiago de Huata" <?= ($distritoSeleccionado == "Santiago de Huata") ? 'selected' : '' ?>>Santiago de Huata</option>
        <option value="Miraflores" <?= ($distritoSeleccionado == "Miraflores") ? 'selected' : '' ?>>Miraflores</option>
        <option value="Cotahuma" <?= ($distritoSeleccionado == "Cotahuma") ? 'selected' : '' ?>>Cotahuma</option>
        <option value="La Portada" <?= ($distritoSeleccionado == "La Portada") ? 'selected' : '' ?>>La Portada</option>
        <option value="Achumani" <?= ($distritoSeleccionado == "Achumani") ? 'selected' : '' ?>>Achumani</option>
        <option value="Calacoto" <?= ($distritoSeleccionado == "Calacoto") ? 'selected' : '' ?>>Calacoto</option>
        <option value="La Florida" <?= ($distritoSeleccionado == "La Florida") ? 'selected' : '' ?>>La Florida</option>
        <option value="Hampaturi" <?= ($distritoSeleccionado == "Hampaturi") ? 'selected' : '' ?>>Hampaturi</option>
        <option value="Villa San Antonio" <?= ($distritoSeleccionado == "Villa San Antonio") ? 'selected' : '' ?>>Villa San Antonio</option>
        <option value="Los Pinos" <?= ($distritoSeleccionado == "Los Pinos") ? 'selected' : '' ?>>Los Pinos</option>
        <option value="Villa Armonía" <?= ($distritoSeleccionado == "Villa Armonía") ? 'selected' : '' ?>>Villa Armonía</option>
        <option value="El Alto" <?= ($distritoSeleccionado == "El Alto") ? 'selected' : '' ?>>El Alto</option>
    </select>
</div>

<div class="form-group">
    <label for="zona">Zona de Propiedad:</label>
    <select name="zona" id="zona" class="form-control" required>
        <option value="">Seleccione una zona</option>
        <!-- Las zonas se llenarán dinámicamente con JavaScript -->
    </select>
</div>

<script>
    const zonasPorDistrito = {
        "Centro Histórico": ["Plaza Murillo", "Calle Comercio", "Mercado Lanza", "San Francisco"],
        "San Sebastián": ["San Sebastián", "San Pedro", "Villa San Antonio", "La Llamita"],
        "Santa Teresa": ["Santa Teresa", "San Juan", "Villa de la Paz"],
        "San Pedro": ["San Pedro", "Sopocachi", "Villa Fátima", "El Tejar"],
        "Villa Victoria": ["Villa Victoria", "Villa El Salvador", "La Ladera"],
        "El Tejar": ["El Tejar", "El Alto de la Paz"],
        "San Jorge": ["San Jorge", "Miraflores", "Santa Cruz"],
        "Villa Fátima": ["Villa Fátima", "Villa Copacabana"],
        "Santiago de Huata": ["Santiago de Huata", "Alto Santiago"],
        "Miraflores": ["Miraflores Central", "San Miguel", "La Paz Centro"],
        "Cotahuma": ["Cotahuma", "Villa San Antonio", "Villa del Río"],
        "La Portada": ["La Portada"],
        "Achumani": ["Achumani", "La Florida", "La Senda"],
        "Calacoto": ["Calacoto", "La Florida"],
        "La Florida": ["La Florida", "El Alto de La Florida"],
        "Hampaturi": ["Hampaturi", "El Alto de Hampaturi"],
        "Villa San Antonio": ["Villa San Antonio"],
        "Los Pinos": ["Los Pinos"],
        "Villa Armonía": ["Villa Armonía"],
        "El Alto": ["El Alto (distrito independiente)"],
    };

    document.getElementById('distrito').addEventListener('change', function() {
        const zonaSelect = document.getElementById('zona');
        zonaSelect.innerHTML = ''; // Limpiar opciones anteriores
        const selectedDistrito = this.value;

        // Cargar zonas existentes si se está editando
        if (selectedDistrito in zonasPorDistrito) {
            zonasPorDistrito[selectedDistrito].forEach(zona => {
                const option = document.createElement('option');
                option.value = zona;
                option.textContent = zona;
                // Preseleccionar la zona si es la que ya estaba seleccionada
                if (zona === "<?= $zonaSeleccionada ?>") {
                    option.selected = true;
                }
                zonaSelect.appendChild(option);
            });
        }
    });

    // Trigger the change event on page load to set the correct zones
    document.getElementById('distrito').dispatchEvent(new Event('change'));
</script>
