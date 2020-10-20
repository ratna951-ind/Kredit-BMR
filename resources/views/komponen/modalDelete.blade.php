<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-col-danger">
            <div class="modal-header bg-danger white">
                <h4 class="modal-title white">Konfirmasi</h4>
            </div>
            <div class="modal-body">
                <p align="center">Apakah anda yakin menghapus {{$modul}} ini?</p>
                <input type="hidden" id="id_delete" disabled>
                <input type="text" class="form-control" id="name_delete" disabled>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger delete">Ya</button>
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("click", ".modal-delete", function () {
        $('#id_delete').val($(this).data('id'));
        $(".modal-body #name_delete").val($(this).data('name'));
        $('#deleteModal').modal('show');
    });
    $('.modal-footer').on('click', '.delete', function() {
        id = $('#id_delete').val();
        event.preventDefault();
        document.getElementById('deleteRecord'+id).submit();
    });
</script>