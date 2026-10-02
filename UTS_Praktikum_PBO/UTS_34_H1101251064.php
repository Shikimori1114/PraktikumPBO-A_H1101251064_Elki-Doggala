<?php
// 1. Deklarasi Abstract Class 
abstract class PaketBimbel {
    protected $id;
    protected $nama;
    protected $hargaDasar;

    // Constructor untuk inisialisasi awal
    public function __construct($id, $nama, $hargaDasar) {
        $this->id = $id;
        $this->nama = $nama;
        $this->hargaDasar = $hargaDasar;
    }

    // Method Getter untuk mengakses properti protected
    public function getId() { 
        return $this->id; 
    }
    public function getNama() { 
        return $this->nama; 
    }
    public function getHargaDasar() { 
        return $this->hargaDasar; 
    }

    abstract public function hitungTotal();
    abstract public function getJenis();
}

// 2. Child Class 1: Reguler
class Reguler extends PaketBimbel {
    private $bulan; // Properti private khusus class ini

    public function __construct($id, $nama, $hargaDasar, $bulan) {
        parent::__construct($id, $nama, $hargaDasar); // Memanggil constructor parent
        $this->bulan = $bulan;
    }

    // Override method abstract
    public function hitungTotal() {
        return ($this->hargaDasar * $this->bulan) + 50000;
    }

    public function getJenis() {
        return "Reguler";
    }

    // Method cetakDetail (BONUS)
    public function cetakDetail() {
        return "Paket {$this->getJenis()} {$this->bulan} bulan (termasuk modul)";
    }
}

// 3. Child Class 2: Intensif
class Intensif extends PaketBimbel {
    private $bulan;

    public function __construct($id, $nama, $hargaDasar, $bulan) {
        parent::__construct($id, $nama, $hargaDasar);
        $this->bulan = $bulan;
    }

    // Override method abstract dengan logika diskon
    public function hitungTotal() {
        $total = $this->hargaDasar * $this->bulan;
        if ($this->bulan > 3) {
            $total -= ($total * 0.10); // Diskon 10%
        }
        return $total;
    }

    public function getJenis() {
        return "Intensif";
    }

    // Method cetakDetail (BONUS)
    public function cetakDetail() {
        $infoDiskon = $this->bulan > 3 ? " (Diskon 10%)" : "";
        return "Paket {$this->getJenis()} {$this->bulan} bulan{$infoDiskon}";
    }
}

// 4. Child Class 3: Privat
class Privat extends PaketBimbel {
    private $sesi; // Properti private menggunakan sesi

    public function __construct($id, $nama, $hargaDasar, $sesi) {
        parent::__construct($id, $nama, $hargaDasar);
        $this->sesi = $sesi;
    }

    // Override method abstract
    public function hitungTotal() {
        return ($this->hargaDasar * $this->sesi) + 100000;
    }

    public function getJenis() {
        return "Privat";
    }

    // Method cetakDetail (BONUS)
    public function cetakDetail() {
        return "Paket {$this->getJenis()} {$this->sesi} sesi (termasuk transport)";
    }
}

// 5. Instansiasi 5 Objek 
$daftarPaket = [
    new Reguler("BMB-01", "Elki Doggala", 250000, 6),
    new Intensif("BMB-02", "Pierre Tristan Lamario", 350000, 4),
    new Privat("BMB-03", "Zuhayr Aljabar", 150000, 10),
    new Reguler("BMB-04", "Kylian Mbappe", 250000, 2),
    new Intensif("BMB-05", "Erling Haaland", 350000, 2)
];

echo "=== DATA PENDAFTARAN SISTEM BIMBEL ===<br><br>";

$no = 1;
$totalKeseluruhan = 0;

// 6. Polimorfisme
foreach ($daftarPaket as $paket) {
    $total = $paket->hitungTotal();
    $totalKeseluruhan += $total;
    
    echo $no . ". ID: " . $paket->getId() . "<br>";
    echo "   Nama        : " . $paket->getNama() . "<br>";
    echo "   Jenis       : " . $paket->getJenis() . "<br>";
    echo "   Harga Dasar : Rp " . $paket->getHargaDasar(). "<br>";
    echo "   Total       : Rp " . $total . "<br>";
    echo "   Detail      : " . $paket->cetakDetail() . "<br><br>";
    $no++;
}

// Menampilkan total
echo "Total Keseluruhan : Rp " . $totalKeseluruhan. "<br>";
