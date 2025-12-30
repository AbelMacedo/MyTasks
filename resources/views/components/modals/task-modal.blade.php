<div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taskModalLabel">
                    <i class="bi bi-journal-plus me-2"></i>Nueva Tarea
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tasks.store') }}" method="post" id="taskForm">
                    @csrf
                    <label for="title" class="form-label">
                        <i class="bi bi-pencil-fill me-1"></i>Título de la tarea
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">1</span>
                        <input type="text" name="title" id="title" class="form-control"
                            placeholder="Ej: Completar informe mensual">
                    </div>

                    <label for="description" class="form-label">
                        <i class="bi bi-text-paragraph me-1"></i>Descripción
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">2</span>
                        <textarea name="description" id="description" class="form-control" placeholder="Describe los detalles de tu tarea..."></textarea>
                    </div>

                    <label for="priority" class="form-label">
                        <i class="bi bi-flag-fill me-1"></i>Prioridad
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">3</span>
                        <select name="priority" id="priority" class="form-control">
                            <option value="">--Seleccione una opción--</option>
                            <option value="alta">🔴 Alta</option>
                            <option value="media">🟡 Media</option>
                            <option value="baja">🟢 Baja</option>
                        </select>
                    </div>

                    <label for="due_date" class="form-label">
                        <i class="bi bi-calendar-event me-1"></i>Fecha límite
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">4</span>
                        <input type="date" name="due_date" id="due_date" class="form-control">
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="without_due_date" name="without_due_date">
                        <label class="form-check-label" for="without_due_date">
                            <i class="bi bi-infinity me-1"></i>Sin fecha límite
                        </label>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-1"></i>Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i>Guardar tarea
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const due_date = document.getElementById('due_date');
    const without_due_date = document.getElementById('without_due_date');

    without_due_date.addEventListener('change', function() {
        if (this.checked) {
            due_date.disabled = true;
            due_date.value = '';
            due_date.parentElement.style.opacity = '0.5';
        } else {
            due_date.disabled = false;
            due_date.parentElement.style.opacity = '1';
        }
    });

    document.getElementById('taskModal').addEventListener('hidden.bs.modal', function() {
        document.getElementById('taskForm').reset();
        due_date.disabled = false;
        due_date.parentElement.style.opacity = '1';
    });
</script>
