<div class="container card">
    <!-- <div class="row"> <div class="col-2"></div> <div class="col-8">konten</div>
    <div class="col-2"></div> </div> -->
    <div class="text-center">
        <h4>List pesanan #<?php echo $kode_pesanan;?></h4><br>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Warung</th>
                <th scope="col">Menu</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
        $no = 1;
        foreach ($list as $listmenu) {?>
            <tr>
                <th scope="row"><?php echo $no;?></th>
                <td><?php echo $listmenu['nama_warung'];?></td>
                <td><?php echo $listmenu['nama_menu'];?></td>
                <td><?php echo $listmenu['harga'];?></td>
                <td>
                    <a
                        class="btn btn-danger"
                        href="<?php echo BASEURL.'kantin/batalpesanan/'.$listmenu['kode_pesanan'].'/'.$listmenu['id_menu']?>"
                        role="button">Batalkan</a>
                </td>
            </tr>
            <?php $no++; } ?>
        </tbody>
    </table>
    <div class="text-right">
        <b>Total Keseluruhan: Rp.
            <?php echo $harga[0];?></b><br>
        <a class="btn btn-danger" href="<?= BASEURL ?>kantin/bataltransaksi/<?php echo $kode_pesanan;?>/" role="button">Batal pesan</a>
        <!-- <a class="btn btn-primary" href="#" role="button">Bayar Sekarang</a> -->
        <!-- Button trigger modal -->
        <button
            type="button"
            class="btn btn-success"
            data-toggle="modal"
            data-target="#staticBackdrop">
            Bayar Sekarang
        </button>

        <!-- Modal -->
        <div
            class="modal fade"
            id="staticBackdrop"
            data-backdrop="static"
            tabindex="-1"
            role="dialog"
            aria-labelledby="staticBackdropLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="text-left"  method="post"
                        action="<?= BASEURL ?>kantin/checkout/<?php echo $kode_pesanan;?>/">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Pembeli</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nama_pembeli"
                                    name="nama_pembeli">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tempat duduk</label>
                                <input type="text" class="form-control" id="tempat_duduk" name="tempat_duduk">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Close</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    Ingin menambah menu ?
    <br>
    Silahkan pilih kantin untuk memilih menu.
    <form
        action="<?= BASEURL ?>kantin/pesan/<?php echo $kode_pesanan;?>/"
        method="post">
        <div class="form-group">
            <label for="exampleFormControlSelect1"></label>
            <select class="form-control" id="exampleFormControlSelect1" name="id_warung">
                <?php foreach ($menubaru as $user) {?>
                <option value="<?php echo
            $user['id_warung'];?>"><?php echo $user['nama_warung'];?></option>
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
        <?php foreach ($carimenu as $user) {?>
        <a
            href="<?php echo
        BASEURL.'kantin/pesan/'.$kode_pesanan.'/'. $user['id_menu'];?>"
            class="list-group-item
        list-group-item-action"><?php echo $user['nama_menu'];?>
            - Rp.<?php echo
        $user['harga'];?></a>
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