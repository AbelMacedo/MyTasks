<div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taskModalLabel">Nueva Tarea</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tasks.store') }}" method="post">
                    @csrf
                    <label for="title" class="form-label">Titulo de la tarea: </label>
                    <div class="input-group">
                        <span class="input-group-text">1</span>
                        <input type="text" name="title" id="title" class="form-control"
                            placeholder="Mi primera tarea">
                    </div>
                    <label for="description" class="form-label">Descripción de la tarea: </label>
                    <div class="input-group">
                        <span class="input-group-text">2</span>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                    <label for="priority" class="form-label">Prioridad: </label>
                    <div class="input-group">
                        <span class="input-group-text">3</span>
                        <select name="priority" id="priority" class="form-control">
                            <option value="">--Seleccione una opción--</option>
                            <option value="Alta">Alta</option>
                            <option value="Media">Media</option>
                            <option value="Baja">Baja</option>
                        </select>
                    </div>
                    <label for="due_date" class="form-label">Fecha limite: </label>
                    <div class="input-group">
                        <span class="input-group-text">2</span>
                        <input type="date" name="due_date" id="due_date" class="form-control">
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="without_due_date" name="without_due_date">
                        <label class="form-check-label" for="without_due_date">Sin fecha limite</label>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
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
        } else {
            due_date.disabled = false;
        }
    });
</script>
