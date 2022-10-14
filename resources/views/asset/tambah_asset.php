<!-- tambah data asset -->
<div class="modal fade" id="tambah_asset">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Asset</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post">
                <div class="modal-body">
                    <label>No. Asset</label>
                    <input type="text" name="no_asset" placeholder="No Asset" class="form-control" required>
                    <br>
                    <label>Type Asset</label>
                    <input type="text" name="type" placeholder="Type Asset" class="form-control" required>
                    <br>
                    <label>No. Serial</label>
                    <input type="text" name="no_serial" placeholder="No Serial" class="form-control" required>
                    <br>
                    <label>Cap Date</label>
                    <input type="date" name="cap_date" placeholder="Cap Date" class="form-control" required>
                    <br>
                    <label>Description</label>
                    <input type="text" name="description" placeholder="Description" class="form-control" required>
                    <br>


                    <button type="submit" class="btn btn-primary btn-sm ml-2" name="tambah_asset">Simpan</button>
                </div>
            </form>



        </div>
    </div>
</div>