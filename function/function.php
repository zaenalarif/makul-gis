<?php
require_once('db.php');

function tambahtempat($nama_tempat,$deskripsi,$longtitude,$langtitude,$gambar,$url)
{
    global $conn;

    $aa = mysqli_escape_string($conn, $url);
    $query = "INSERT INTO tempat (nama, deskripsi, longtitude, langtitude, gambar, url) VALUES ('$nama_tempat', '$deskripsi', $longtitude, $langtitude, '$gambar', '$aa')";
    
    if($result = mysqli_query($conn, $query)){
        return true;
    }else{
        return false;
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
function setTempat($id, $nama, $deskripsi, $langtitude, $longtitude, $gambar = "", $url)
{
    global $conn;
    $aa = mysqli_escape_string($conn, $url);
    if($gambar === ""){
        $query = "UPDATE tempat SET nama='$nama', deskripsi='$deskripsi', longtitude=$longtitude, langtitude=$langtitude, url='$aa' WHERE id=$id";
    }else if($gambar !== ""){
        $query = "UPDATE tempat SET nama='$nama', deskripsi='$deskripsi', longtitude=$longtitude, langtitude=$langtitude, gambar='$gambar', url='$aa' WHERE id=$id";
    }

    if(mysqli_query($conn, $query)){
        return true;
    }else{
        return false;
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