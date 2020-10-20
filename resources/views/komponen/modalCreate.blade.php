<div class="modal fade" id="createModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-col-danger">
            <div class="modal-header bg-danger white">
                <h4 class="modal-title white">Konfirmasi</h4>
            </div>
            <div class="modal-body">
                <p align="center">Apakah anda yakin menambahkan {{$modul}} ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger create">Ya</button>
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("click", ".modal-create", function () {
        $('#createModal').modal('show');
    });
    $('.modal-footer').on('click', '.create', function() {
        event.preventDefault();
        document.getElementById('createRecord').submit();
    });
</script>