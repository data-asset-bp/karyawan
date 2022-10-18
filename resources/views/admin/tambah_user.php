<!-- The Data User -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Data User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post">
                <div class="modal-body">
                    <label>Name</label>
                    <input type="text" name="nama" placeholder="Name" class="form-control" required>
                    <br>
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Username" class="form-control" required>
                    <br>
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm ml-2" name="tambahuser">Save</button>
                </div>
            </form>



        </div>
    </div>
</div>