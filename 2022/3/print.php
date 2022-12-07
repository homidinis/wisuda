<?php
include 'conn.php';
$sql=" SELECT * FROM 2022_3_t_wisudawan WHERE sesi=2";
$query=mysqli_query($conn, $sql);
$i=0;

echo "<table border='1'>";
while ($row=mysqli_fetch_array($query)){
    $i++;
    echo "<tr>";
        echo "<td>".$row['nim']."</td>";
        echo "<td style='word-wrap:break-word; width:160px; height:60px;'>".$row['nama']."</td>";
        echo "<td><img style='width:50px;' src='https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=".$row['kodeunik']."&choe=UTF-8'></td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td> SESI ".$row['sesi']." (".$row['nomorkursi'].")</td>";
        echo "<td style='word-wrap:break-word; width:160px; height:60px;' colspan='2'>";
            if($row['sesi']==1){
                echo "LOKASI PARKIR: Depan Justinus, depan Thomas Aquinas, Basement, dan depan ATM ";
            } elseif($row['sesi']==2){
                echo "LOKASI PARKIR: Depan Mikael, depan Antonius, Dormitory, Lab Anatomy Unika, dan parkiran Tinjomoyo ";
            } elseif($row['sesi']==3){
                if($row['fakultas']=="Hukum dan Komunikasi")
                    echo "LOKASI PARKIR: Parkiran Tinjomoyo ";
                else
                    echo "LOKASI PARKIR: Depan Justinus, depan Thomas Aquinas, Basement, dan depan ATM ";
            }
        echo "</td>";
    echo "</tr>";

} 
?>
