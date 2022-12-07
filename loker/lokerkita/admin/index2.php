<?php
include 'conn.php';

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

$sql = "SELECT * FROM 0_lokerkita";

$query=mysqli_query($conn, $sql);
// if (mysqli_num_rows($query)>0) {
//     $row=mysqli_fetch_array($query);
//     $nama=$row['nama'];
//     $harga=$row['harga'];
//     $gambar=$row['gambar'];
// }


?>

<!DOCTYPE html>
<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <style>
            .center{
                display: block;
                border-radius: 5%;
                margin-left: auto;
                margin-right: auto;
                width: 100%;
            }
            .card-text{
                text-align: center;
            }
        </style>
    </head>

<script>
    function openModal(i){
        var field = document.getElementById('id');
        field.value=i;

    }
</script>
    
    <body>
        <h1 class="p-1" style="text-align:center;">Aplikasi Penjualan Loker Kita</h1>
        <?php
            while($row = mysqli_fetch_array($query)){
                if($row['id']%4==1){
                    echo '<div class="row">';
                }
                ?>
                    <div class="col-sm-3 p-4">
                        <div class="card" id="<?php echo $row['id']; ?>">
                            <div class="card-body">
                                <img style="width: 150px; height: 150px;" class="center <?php echo $row['gambar']; ?>"> <br>
                                <h5 class="card-text">
                                    <?php
                                        if($row['nama']=="")
                                            echo '-';
                                        else
                                            echo $row['nama']; 
                                    ?>
                                </h5>
                                <p class="card-text"> 
                                    <?php
                                        if($row['nama']=="")
                                            echo '-';
                                        else
                                            echo $row['harga'];
                                    ?>
                                </p>
                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick="openModal(<?php echo $row['id']; ?>)">Update</button>
                            </div>
                        </div>
                    </div>
                <?php
                if($row['id']%4==0){
                    echo '</div>';
                }
            }
        ?>

        
        
        
        
        
        <!-- <div class="row">
            <div class="col-sm-3 p-4">
                <div class="card" id="1">
                    <div class="card-body">
                        <img class="center"><?php echo $gambar['gambar']; ?> <br>
                        <h5 class="card-text"><?php echo $nama['nama']; ?></h5>
                        <p class="card-text"><?php echo $harga['harga']; ?></p>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick="openModal(1)">Update</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 p-4">
                <div class="card" id="2">
                    <div class="card-body">
                        <img class="center" src="picture/ramen.jpeg" alt="Ramen Indomie"> <br>
                        <h5 class="card-text">Ramen Indomie</h5>
                        <p class="card-text">Rp. 25.000</p>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick="openModal(2)">Update</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 p-4">
                <div class="card" id="3">
                    <div class="card-body">
                        <img class="center" src="picture/ramen.jpeg" alt="Ramen Indomie"> <br>
                        <h5 class="card-text">Ramen Indomie</h5>
                        <p class="card-text">Rp. 25.000</p>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick="openModal(3)">Update</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 p-4">
                <div class="card" id="4">
                    <div class="card-body">
                        <img class="center" src="picture/ramen.jpeg" alt="Ramen Indomie"> <br>
                        <h5 class="card-text">Ramen Indomie</h5>
                        <p class="card-text">Rp. 25.000</p>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick="openModal(4)">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 p-4">
                <div class="card" id="5">
                    <div class="card-body">
                        <img class="center" src="picture/ramen.jpeg" alt="Ramen Indomie"> <br>
                        <h5 class="card-text">Ramen Indomie</h5>
                        <p class="card-text">Rp. 25.000</p>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick="openModal(5)">Update</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 p-4">
                <div class="card" id="6">
                    <div class="card-body">
                        <img class="center" src="picture/ramen.jpeg" alt="Ramen Indomie"> <br>
                        <h5 class="card-text">Ramen Indomie</h5>
                        <p class="card-text">Rp. 25.000</p>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick="openModal(6)">Update</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 p-4">
                <div class="card" id="7">
                    <div class="card-body">
                        <img class="center" src="picture/ramen.jpeg" alt="Ramen Indomie"> <br>
                        <h5 class="card-text">Ramen Indomie</h5>
                        <p class="card-text">Rp. 25.000</p>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick="openModal(7)">Update</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 p-4">
                <div class="card" id="8">
                    <div class="card-body">
                        <img class="center" src="picture/ramen.jpeg" alt="Ramen Indomie"> <br>
                        <h5 class="card-text">Ramen Indomie</h5>
                        <p class="card-text">Rp. 25.000</p>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick="openModal(8)">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 p-4">
                <div class="card" id="9">
                    <div class="card-body">
                        <img class="center" src="picture/ramen.jpeg" alt="Ramen Indomie"> <br>
                        <h5 class="card-text">Ramen Indomie</h5>
                        <p class="card-text">Rp. 25.000</p>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick="openModal(9)">Update</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 p-4">
                <div class="card" id="10">
                    <div class="card-body">
                        <img class="center" src="picture/ramen.jpeg" alt="Ramen Indomie"> <br>
                        <h5 class="card-text">Ramen Indomie</h5>
                        <p class="card-text">Rp. 25.000</p>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick="openModal(10)">Update</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 p-4">
                <div class="card" id="11">
                    <div class="card-body">
                        <img class="center" src="picture/ramen.jpeg" alt="Ramen Indomie"> <br>
                        <h5 class="card-text">Ramen Indomie</h5>
                        <p class="card-text">Rp. 25.000</p>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick="openModal(11)">Update</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 p-4">
                <div class="card" id="12">
                    <div class="card-body">
                        <img class="center" src="picture/ramen.jpeg" alt="Ramen Indomie"> <br>
                        <h5 class="card-text">Ramen Indomie</h5>
                        <p class="card-text">Rp. 25.000</p>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick="openModal(12)">Update</button>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                
                <!-- Modal content-->
                <!-- <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body" id="0">
                    <form action="simpanItem.php" method="post" enctype="multipart/form-data">
                        <label for="fname">Item</label><br>
                        <input type="text" id="id" name="id" value=""><br>
                        <label for="nama">Nama Item</label><br>
                        <input type="text" name="name" value="">
                        <label for="harga">Harga Item</label><br>
                        <input type="text" name="price" value="">
                        <br>
                        <input type="submit" value="Submit">
                        <form action="/action_page.php">
                        <input type="file" id="myFile" name="filename">
                        <input type="submit">
                        </form>
                    </form> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div> -->

                <div class="modal-content" id="modal<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <!-- <div class="modal-dialog">
                <div class="modal-content"> -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <!-- di dalam modal-body terdapat 4 form input yang berisi data.
                    data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
                        <div class="modal-body">
                            <form method="post" action="submit.php">
                                <div class="form-group">
                                <input type="hidden" id="id" name="id">
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input name="nama" type="text" class="form-control" value="<?php echo $row['nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input name="harga" type="number" class="form-control" rows="5"> value="<?php echo $row['harga']; ?>"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="file" id="myFile" name="filename"class="form-control">
                                </div>  
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>