<div class="modal fade" id="approveModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-col-success">
            <div class="modal-header bg-success white">
                <h4 class="modal-title white">Konfirmasi</h4>
            </div>
            <div class="modal-body">
                <p align="center">Apakah anda yakin menyetujui {{$modul}} ini?</p>
                <input type="hidden" id="id_approve" disabled>
                <input type="text" class="form-control" id="name_approve" disabled>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-success approve">Ya</button>
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("click", ".modal-approve", function () {
        $('#id_approve').val($(this).data('id'));
        $(".modal-body #name_approve").val($(this).data('name'));
        $('#approveModal').modal('show');
    });
    $('.modal-footer').on('click', '.approve', function() {
        id = $('#id_approve').val();
        event.preventDefault();
        document.getElementById('approveRecord'+id).submit();
    });
</script>