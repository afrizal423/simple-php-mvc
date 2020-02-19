<?php

class Main extends Controller {

    /*
     * http://localhost/
     */
    function Index () {
        
        // if (!isset($_SESSION['login'])) {

        //     header('Location: /login');

        // } else {

        //     header('Location: /dashboard');
            
        // }
        $this->model('example');
        if ($_POST) {
            # code...
            //var_dump($_POST['id_warung']);
            //$data['coba'] = $_POST['id_warung'];
            $data['ww'] = $this->RandomString(5);
            $data['coba'] = $this->example->cariMenu($_POST);
        }
        $data['judul_bar'] = "Kantin";
        //$this->model('example');
        $data['anu'] = $this->example->exampleMethod();
        $this->view('template/header',$data);
        $this->view('template/menu');
        $this->view('home',$data);
        $this->view('template/footer');

        
    }

    /*
     * http://localhost/anothermainpage
     */
    function anotherMainPage () {
        echo 'Works!';
    }

    function RandomString($length) {
        return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

}

?>