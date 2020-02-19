<div class="container card">
    <!-- <div class="row"> <div class="col-2"></div> <div class="col-8">konten</div>
    <div class="col-2"></div> </div> -->
    <div class="text-center">
        <h1>Selamat datang di Qantin!</h1><br>
    </div>
    Silahkan pilih kantin untuk memilih menu.
    <form action="<?= BASEURL ?>" method="post">
        <div class="form-group">
            <label for="exampleFormControlSelect1"></label>
            <select class="form-control" id="exampleFormControlSelect1" name="id_warung">
                <?php foreach ($anu as $user) {?>
                <option value="<?php echo $user['id_warung'];?>"><?php echo $user['nama_warung'];?></option>
                <?php } ?>
            </select>
            <button type="submit" class="btn btn-primary">Lihat Menu</button>
        </div>
    </form>
    <?php if($_POST) { //echo json_encode($coba);?>
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
        Pilihan menu
        </a>
        <?php foreach ($coba as $user) {?>
        <a href="<?php echo BASEURL.'kantin/pesan/'.$ww.'/'. $user['id_menu'];?>" class="list-group-item list-group-item-action"><?php echo $user['nama_menu'];?> - Rp.<?php echo $user['harga'];?></a>
        <?php } }?>
        
    </div>
    <?php //echo $_SERVER['DOCUMENT_ROOT'];
    //echo BASEURL;?>
</div>
<!-- <a class="header" href="/login/log_in">Log in</a> -->
<?php //echo json_encode($anu);
// $no = 0;
// while($data = $anu->fetch(\PDO::FETCH_ASSOC)){
//     $no++;
//     echo $no; }
// foreach ($anu as $user) {
//     echo $user['id'] . '<br />';
// }
    ?>