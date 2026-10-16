<?php
require_once '../Catatan.php';

$c = new Catatan();
$hasil = $c->setJudul("Ketiga")
            ->setIsi("Belajar Koneksi Database MySQL")
            ->save();
            
echo $hasil ? "Berhasil disimpan" : "Gagal";