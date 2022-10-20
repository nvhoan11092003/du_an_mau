<?php 
    function loadall_khachhang()
    {
        $sql = "SELECT * FROM khach_hang";
        $listkh = pdo_query($sql);
        return $listkh;
    }

    function loadone_khachhang($id)
    {
        $sql = "SELECT * FROM khach_hang WHERE ma_kh = $id";
        $kh = pdo_query_one($sql);
        return $kh;
    }


    function insert_khachhang($new_password,$ho_ten,$target_file,$email){
        $sql ="INSERT INTO khach_hang(ma_kh, mat_khau, ho_ten, kich_hoat, hinh_anh, email, vai_tro) VALUES ('','$new_password','$ho_ten','[value-4]','$target_file','$email','')";
        pdo_execute($sql);
    }
    
    function update_khachhang($mat_khaumoi,$ho_tenmoi,$target_file,$dia_chi,$sdt,$ma_kh){
        $sql ="UPDATE khach_hang SET mat_khau='$mat_khaumoi',ho_ten='$ho_tenmoi',hinh_anh='$target_file',dia_chi='$dia_chi',sdt='$sdt' WHERE ma_kh = $ma_kh";
        pdo_execute($sql);
    }

    function recover_password($idkh,$newpasword){
        $sql = "UPDATE khach_hang SET mat_khau='$newpasword' where ma_kh = " . $idkh;
            pdo_execute($sql);
    }
    function delete_khachhang($id)
    {
        $sql="DELETE FROM khach_hang WHERE ma_kh=$id";
        pdo_execute($sql);
    }

?>