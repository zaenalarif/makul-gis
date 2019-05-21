<?php
require_once('db.php');

function tambahtempat($nama_tempat,$deskripsi,$longtitude,$langtitude,$gambar)
{
    global $conn;

    $query  = "INSERT INTO tempat (nama, deskripsi, longtitude, langtitude, gambar) VALUES ('$nama_tempat', '$deskripsi', $longtitude, $langtitude, '$gambar')";
    
    if(mysqli_query($conn, $query)){
        return true;
    }else{
        error_reporting(E_ALL);
        die($query);
    }
}

function getTempat()
{
    global $conn;

    $query = "SELECT * FROM tempat";
    $result = mysqli_query($conn, $query);

    return $result;
}

function getTempatId($id)
{
    global $conn;

    $query  = "SELECT * FROM tempat WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0){
        return $result;    
    }else{
        die('gagal');
    }
    
}
function setTempat($nama, $deskripsi, $langtitude, $longtitude, $gambar)
{
    global $conn;

    $query = "UPDATE tempat SET nama='$nama', deskripsi='$deskripsi', longtitude=$longtitude, langtitude=$langtitude, gambar='$gambar'";
    if(mysqli_query($conn, $query)){
        return true;
    }else{
        die('gagal mengedit');
    }
}

function deleteTempat($id)
{
    global $conn;

    $query = "DELETE FROM tempat WHERE id='$id'";

    if(mysqli_query($conn, $query)){
        return true;
    }else{
        die('gagal menghapus');
    }
}


?>