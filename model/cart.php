<?php 
function insert_bill($ho_ten,$dia_chi,$sdt,$email,$pttt,$ngay_dat_hang,$thanh_tien_bill,$id_user){
 $sql = "INSERT INTO bill ( bill_name, bill_diachi, bill_sdt, bill_email, bill_pttt, ngay_dat_hang,thanh_tien_bill,bill_id_user) 
        VALUES ('$ho_ten','$dia_chi','$sdt','$email','$pttt','$ngay_dat_hang','$thanh_tien_bill','$id_user')";
        return  pdo_execute_return_lastinsertid($sql);
        
};
function insert_cart($id_user,$id_pro,$hinh_anh,$ten_hh,$so_luong,$don_gia,$tong_tien,$id_bill)
{
    $sql="INSERT INTO cart( id_user, id_pro, hinh_anh, ten_hh, so_luong, don_gia, thanh_tien, id_bill)
     VALUES ('$id_user','$id_pro','$hinh_anh','$ten_hh','$so_luong','$don_gia','$tong_tien','$id_bill')";
     pdo_execute($sql);

}; 

function loadone_bill($id_bill)
{
    $sql = "SELECT * FROM bill where id = '$id_bill'";
    $bill= pdo_query_one($sql);
    return $bill;
}

function loadone_cart($id_bill)
{
    $sql = "SELECT * FROM cart where id_bill = '$id_bill'";
    $cart= pdo_query($sql);
    return $cart;
}

?>