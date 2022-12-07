<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php

if($_SESSION['masukNgga'] != true){
    echo 'not logged in';
    header("Location: loginpanitia.php");
    exit;
}else{
   // echo "Semangat, ".$_SESSION['nama']."!";

};

?>
<!-- DONE: ajax jalan, login jalan, redirect ke login kalau mau masuk ke index langsung, judul huruf besar di dashboard menurut username (di tabel "user" ada kolom "nama" biar rapih aja namanya) -->
<!-- DONE: insert dan update nilai -->
<!-- TODO: input dari form masuk ke database-->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panitia PTMB - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="far fa-sad-cry"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PTMB PANITIA</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            <div class="text-center d-none d-md-inline">
                <a class="btn btn-success btn-sm" href="logoutpanitia.php">LOGOUT</a>
</div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Semangat, <?php echo $_SESSION['nama']?> !</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"><?php echo $_SESSION['nama']?></h1>
                        
                    <h1 class="h3 mb-0 text-gray-800" id="judul" hidden><?php echo $_SESSION['idpos']?></h1> 
                        <!-- cara bodoh narik session id (id pos) dari session si -->
                    </div>



<script>
// WHY ISNT THIS WORKING
    function simpanNilai(id)
{
	var nilai = document.getElementById("nilai"+id).value;
    var pos = document.getElementById("judul").innerHTML; 
    if(nilai>100 || nilai<0){
        alert("NILAI TIDAK BOLEH LEBIH DARI 100 / KURANG DARI 0");
        return false;
    }
	$.ajax({
		type: "POST",
		url: "simpan_nilai.php", 
		data: {
			id : id,
			nilai : nilai,
            pos : pos

		},
		success: function(result){
            console.log("ID KELOMPOK: "+id+" NILAI: "+nilai+" POS: "+pos+"\n"+result);
		}
	})
    ;
}
</script>





                    <!-- Content Row PUT SHIT HERE-->
                    <?php
                    include 'conn.php';
                    $id = $_SESSION['idpos'];

                    $sql = "SELECT * FROM t_hscore";
                    $Nkel = "SELECT * FROM t_kelompok";
                    $sqlAll = "SELECT * FROM t_main ";

                    $query = mysqli_query($conn, $sql);
                    $queryN = mysqli_query($conn, $Nkel); //nembak ke kelompok
                    $queryAll = mysqli_query($conn,$sqlAll); //nembak ke Main
   
                    while($row = mysqli_fetch_array($queryN)) {    
                        $idpos = $_SESSION['idpos']; //tarik idpos dari idpos session yg sudah di set di login
                        $id = $row['id']; //simpan nilai berdasarkan id kelompok
                        $nilai=0;

                        $sqlNilai ="SELECT * FROM t_main WHERE pos = '$idpos' AND id_kelompok = '$id'"; //pakai and (2 condition to search) krn idpos doang ngga unik, nanti semua value nilai ngikut value pertama. using 2 conditions, it becomes unique
                        $queryNilai = mysqli_query($conn,$sqlNilai); //lookup nilai semua kelompok yg singgah di pos 1; t_main memuat data nilai semua kelompok diunikkan dengan IDPOS dan IDKELOMPOK
                            if(mysqli_num_rows($queryNilai)>0){
                                $allRow = mysqli_fetch_array($queryNilai);
                                $nilai = $allRow['nilai']; 
                            }

                        //ngg pake form karena form ngerefresh page = console log hilang
                        //tipe (POST) sudah di specify di ajax payload

                        echo ' 
                        <div class="form-group">
                            <label for="nilai" style="color:black">KELOMPOK '.$row['kelompok'].'</label>
                                <div class="input-group mb-3">
                                        <label for="nilai" style="color:black"></label>
                                        <input type="number" class="form-control" min="0" max="100" placeholder="'.$nilai.'" id="nilai'.$id.'" name="nilai'.$id.'"';

                                        if($nilai>0){
                                        echo 'value="'.$nilai.'"'; //kalau nilai >0 echo value sbg nilai, else ?
                                    }
                        echo '> 
                                    <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" onclick="simpanNilai('.$id.')">Submit</button> 
                                </div>
                            </div>
                        </div> ';
                    }


                            
                        
?>
  </div>
</div>

                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SIEGA 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="loginpanitia.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages -->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>