<?php

/*
 * Every class derriving from Model has access to $this->db
 * $this->db is a PDO object
 * Has a config in /core/config/database.php
 */
class Example extends Model {

    function exampleMethod () {
        $stmt = $this->db->prepare("SELECT * FROM warung");
        $stmt->execute();    
        $result = $stmt->fetchAll();
        return $result;
    }

    function cariMenu ($data) {
        $stmt = $this->db->prepare("SELECT * FROM menu INNER join warung using(id_warung) where id_warung  like  :user_id ");
        $stmt->execute(array(":user_id"=>'%'.$data['id_warung'].'%' ));    
        $result = $stmt->fetchAll();
        return $result;
    }

    function tmbhMenu($kode_pesanan,$id_menu){
        $sql = "SELECT count(*) FROM pesanan WHERE kode_pesanan = '$kode_pesanan'"; 
        $result = $this->db->prepare($sql); 
        $result->execute(); 
        $number_of_rows = $result->fetchColumn(); 
        if ($number_of_rows == 0) {
            $status="hutang";
            $stmt = $this->db->prepare("INSERT INTO pesanan(kode_pesanan,status,waktu) 
            VALUES(:kode_pesanan, :id_menu, NOW()) ");
            $stmt->bindparam(":kode_pesanan", $kode_pesanan);
            $stmt->bindparam(":id_menu", $status);	
            $stmt->execute();
        }
        
        if($id_menu != NULL){
            $stmt = $this->db->prepare("INSERT INTO detail_pesanan(kode_pesanan,id_menu) 
            VALUES(:kode_pesanan, :id_menu) ");
            $stmt->bindparam(":kode_pesanan", $kode_pesanan);
            $stmt->bindparam(":id_menu", $id_menu);	
            $stmt->execute();
        }
        return $stmt;
    }
    function tmbhPesan($kode_pesanan,$status="hutang"){
        $stmt = $this->db->prepare("INSERT INTO pesanan(kode_pesanan,status) 
        VALUES(:kode_pesanan, :id_menu) ");
        $stmt->bindparam(":kode_pesanan", $kode_pesanan);
        $stmt->bindparam(":id_menu", $status);	
        $stmt->execute();
        return $stmt;
    }
    function listPesanan($data) {
        $stmt = $this->db->prepare("SELECT * FROM detail_pesanan 
        INNER join menu using(id_menu) 
        INNER join warung using(id_warung)
        where kode_pesanan  like  :user_id ");
        $stmt->execute(array(":user_id"=> $data ));    
        $result = $stmt->fetchAll();
        return $result;
    }

    function checkout($kode_pesanan, $data) {
        $stmt = $this->db->prepare("UPDATE pesanan
        SET nama_pembeli = :nama, 
        tempat_duduk = :tempat,
        status = 'lunas' 
        WHERE kode_pesanan = :kode_pesanan;");
        $stmt->bindparam(":kode_pesanan", $kode_pesanan);
        $stmt->bindparam(":nama", $data['nama_pembeli']);
        $stmt->bindparam(":tempat", $data['tempat_duduk']);		
        $stmt->execute();
        return $stmt;
    }

    function totalHarga($data) {
        $stmt = $this->db->prepare("SELECT sum(harga) FROM detail_pesanan INNER join menu using(id_menu) where kode_pesanan  like  :user_id ");
        $stmt->execute(array(":user_id"=> $data ));    
        $result = $stmt->fetch();
        return $result;
    }

    function batalpesanan ($kode_pesanan, $id_menu) {
        $stmt = $this->db->prepare("DELETE FROM detail_pesanan 
        WHERE kode_pesanan = :kode_pesanan 
        AND id_menu = :id_menu ");
        $stmt->bindparam(":kode_pesanan", $kode_pesanan);
        $stmt->bindparam(":id_menu", $id_menu);	
        $stmt->execute();
        return $stmt;
    }

    function bataltransaksi ($kode_pesanan) {
        $stmt = $this->db->prepare("DELETE FROM detail_pesanan 
        WHERE kode_pesanan = :kode_pesanan");
        $stmt->bindparam(":kode_pesanan", $kode_pesanan);
        $stmt->execute();
        $stmt = $this->db->prepare("DELETE FROM pesanan 
        WHERE kode_pesanan = :kode_pesanan");
        $stmt->bindparam(":kode_pesanan", $kode_pesanan);
        $stmt->execute();
        return $stmt;
    }

}

?>