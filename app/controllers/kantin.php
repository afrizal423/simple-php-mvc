<?php

class Kantin extends Controller {

    /*
     * http://localhost/
     */
    function Index () {
        
        // if (!isset($_SESSION['login'])) {

        //     header('Location: /login');

        // } else {

        //     header('Location: /dashboard');
            
        // }
        
        // $data['judul_bar'] = "Kantin";
        // $this->model('example');
        // $data['anu'] = $this->example->exampleMethod();
        // $this->view('template/header',$data);
        // $this->view('login',$data);
        // $this->view('template/footer');
        header('Location: ' . BASEURL);

        //echo "sukses";
        
    }

    /*
     * http://localhost/anothermainpage
     */
    function anotherMainPage () {
        echo 'Works!';
    }
    function pesan($kode_pesanan, $id_menu) {
        //echo $kode_pesanan;
        $data['judul_bar'] = "Detail Pesanan ".$kode_pesanan;
        $data['kode_pesanan'] = $kode_pesanan;
        $this->model('example');
        if ($id_menu!=NULL) {
            $data['anu'] = $this->example->tmbhMenu($kode_pesanan,$id_menu);
           // $data['tmbh'] = $this->example->tmbhPesan($kode_pesanan);
            // if (!$_POST) {
            // $data['tmbh'] = $this->example->tmbhPesan($kode_pesanan);
            // }
            header('Location: ' . BASEURL .'kantin/pesan/'.$kode_pesanan.'/');
            # code...
        }
        if ($_POST) {
            # code...
            //var_dump($_POST['id_warung']);
            //$data['coba'] = $_POST['id_warung'];
            $data['carimenu'] = $this->example->cariMenu($_POST);
        }
        $data['list'] = $this->example->listPesanan($kode_pesanan);
        $data['harga'] = $this->example->totalharga($kode_pesanan);
        $data['menubaru'] = $this->example->exampleMethod();
        // echo '<pre>';
        // var_dump($data);
        // echo '</pre>';
        $this->view('template/header',$data);
        $this->view('template/menu');
        $this->view('detail',$data);
        $this->view('template/footer');
    }
    function in(){
        $this->view('invoice');

    }
    function batalpesanan ($kode_pesanan, $id_menu) {
        $this->model('example');
        $this->example->batalpesanan($kode_pesanan,$id_menu);
        header('Location: ' . BASEURL .'kantin/pesan/'.$kode_pesanan.'/');
        }
    function bataltransaksi ($kode_pesanan) {
        $this->model('example');
        $this->example->bataltransaksi($kode_pesanan);
        header('Location: ' . BASEURL );
    }
    function checkout($kode_pesanan) {
        $this->model('example');
        $anu=$this->example->checkout($kode_pesanan, $_POST);
        //header('Location: ' . BASEURL );
         echo "<script>alert('Sukses! Silahkan Bayar!');window.location = '/'</script>";
    }
    function list () {
       var_dump($_POST['id_warung']);
    }

}

?>