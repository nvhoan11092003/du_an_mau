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

function loadall_thongke()
{
    $sql = "SELECT loai_hang.ma_loai AS id , loai_hang.ten_loai as name ,
    COUNT(hang_hoa.ma_hh) as counthh ,MIN(hang_hoa.don_gia) AS minprice , 
    MAX(hang_hoa.don_gia) AS maxprice, AVG(hang_hoa.don_gia) AS giatb FROM
     hang_hoa inner join loai_hang WHERE loai_hang.ma_loai = hang_hoa.ma_loai GROUP BY loai_hang.ma_loai , 		loai_hang.ten_loai
     ORDER BY loai_hang.ma_loai DESC ";
        $listtk= pdo_query($sql);
        return $listtk;
}

function loadall_bill($kyw="")
{
    $sql = "SELECT * FROM bill ";
    if ($kyw !="") {
        $sql .= " where id like '%$kyw%' ";
    }
    $sql .= "order by id desc";
    $listbill= pdo_query($sql);
    return $listbill;
}

 function loadall_bill_user($id_user=0)
{
    $sql = "SELECT * FROM bill where bill_id_user = '$id_user'";
    $listbill= pdo_query($sql);
    return $listbill;
}

function loadone_bill($id_bill)
{
    $sql = "SELECT * FROM bill where id = '$id_bill'";
    $bill= pdo_query_one($sql);
    return $bill;
}

function delete_bill($id)
{
    $sql = "DELETE FROM bill WHERE id = '$id'";
    pdo_execute($sql);
}

function update_bill_status($stt,$id)
{
        $sql = "UPDATE bill SET bill_status = '$stt' where id = '$id' ";
        pdo_execute($sql);
}

function bill_status($bill_stt)
{
    switch ($bill_stt) {
        case '0':
            $stt = "Đơn Hàng Mới";
            break;
        case '1':
            $stt= "Đang xử lý" ;
            break;
        case '2':
            $stt="Đang Giao Hàng" ;
            break;
        case '3':
            $stt="Hoàn Tất" ;
            break;
        default:
            $stt = "Đơn Hàng Mới";
            break;
    }
    return $stt;
}

function loadone_cart($id_bill)
{
    $sql = "SELECT * FROM cart where id_bill = '$id_bill'";
    $cart= pdo_query($sql);
    return $cart;
}

 function bill_pttt($bill_pttt)
{
    switch ($bill_pttt) {
        case '1':
            $pttt = "Trả Tiền Khi nhận Hàng";
            break;
        case '2':
            $pttt="Chuyên Khoản ngân hàng" ;
            break;
        case '3':
            $pttt="Thanh Toán Bằng Ví momo" ;
            break;
        default:
            $pttt = "Trả Tiền Khi nhận Hàng";
            break;
    }
    return $pttt;
}
