<?php
function loadall_loaihang(){
    $sql = "SELECT * FROM loai_hang order by ma_loai desc";
    $ds_loai_hang = pdo_query($sql);
    return $ds_loai_hang;
};

function insert_loaihang($ten_loai){
    $sql = "INSERT INTO loai_hang (ma_loai, ten_loai) VALUES (NULL, '$ten_loai')";
    pdo_execute($sql);
}

function loadone_loaihang($id){
    $sql = "SELECT * FROM loai_hang WHERE ma_loai = '$id' ";
    $loai_hang = pdo_query_one($sql);
    return $loai_hang;
}

function update_loaihang($ten_loai,$id){
    $sql = "UPDATE loai_hang SET ten_loai='$ten_loai' WHERE ma_loai = '$id'";
    pdo_execute($sql);
}

function delete_loaihang($id)
{
    $sql="DELETE FROM loai_hang WHERE ma_loai = $id";
    pdo_execute($sql);
}
?>