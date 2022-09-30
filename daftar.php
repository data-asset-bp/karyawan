<?php
session_start();
include("koneksi.php");

if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama = $_POST['nama'];
	

$addtotable = mysqli_query($con, "insert into user (nama, username, password) values('$nama', '$username','$password')");

if($addtotable){
	
	header('location:index.php?page=user');
	}else{
	    echo 'Gagal';
		header('location:index.php');
	}
};


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Daftar</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body style="background-color: cornsilk;">
        <img src="binapertiwi_logo.png" class="d-block w-100" alt="logo">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">DAFTAR USER</h3></div>
                                    <div class="card-body">
                                        <form method="post">
										
                                             <!-- Modal Header -->
                                            <div class="modal-header">
                                            <h4 class="modal-title">Inputan Data</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                        <!-- Modal body -->
                                        <form method="post" metho>
                                        <div class="modal-body">
                                        <input type="text" name="nama" placeholder="Nama" class="form-control" required>
                                        <br>
                                        <input type="text" name="username" placeholder="Username" class="form-control" required>
                                        <br>
                                        <input type="password" name="password" placeholder="Password" class="form-control" required>
                                        <br>
                                        <button type="submit" class="btn btn-primary" name="login" >Simpan</button>
                                        </div>
                                        </form>
                                        </form>
                                    </div>
              
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
