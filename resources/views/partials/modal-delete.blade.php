<!-- Modal per l'eliminazione -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">ATTENZIONE</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Confermando il file <span id="modal_item_title"></span> verra eliminato?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <form id="formAction" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button btn btn-danger ms-3">Delete</button>
                </form>

            </div>
        </div>
    </div>
</div>
