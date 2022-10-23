<?php 
    $listtk=loadall_thongke();
    // echo'<pre>';
    // var_dump($listtk);

?>



<h1 class="text-center text-3xl text-green-500"> Thống Kê theo danh mục</h1>

<table class="table-auto w-full">
    <thead>
        <tr class="border border-black h-[70px]">
            <th class="text-start">STT</th>
            <th class="text-start">Mã Danh Mục</th>
            <th class="text-start">Tên Danh Mục</th>
            <th class="text-start">Số lượng</th>
            <th class="text-start">Giá Cao Nhất</th>
            <th class="text-start">Giá Thấp Nhất</th>
            <th class="text-start">Giá Trung Bình</th>
        </tr>
    </thead>
    <tbody>
    <?php $stt=0; foreach ($listtk as $key => $value) : extract($value); $stt++;  ?>
                    <tr class="border border-black h-[50px]">
                        <td><?= $stt ?></td>
                        <td><?= $id ?></td>
                        <td><?= $name ?></td>
                        <td><?= $counthh ?></td>
                        <td><?= $maxprice ?>đ</td>
                        <td><?= $minprice ?>đ</td>
                        <td><?= $giatb ?> </td>
                        
                    </tr>
                <?php endforeach ?>
    </tbody>
</table>



