<div class="modal fade" id="updateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-col-success">
            <div class="modal-header bg-success white">
                <h4 class="modal-title white">Konfirmasi</h4>
            </div>
            <div class="modal-body">
                <p align="center">Apakah anda yakin akan menyimpan data {{$modul}} ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-success update">Ya</button>
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("click", ".modal-update", function () {
        $('#updateModal').modal('show');
    });
    $('.modal-footer').on('click', '.update', function() {
        event.preventDefault();
        document.getElementById('updateRecord').submit();
    });
</script>