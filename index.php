<?php
    //Koneksi Database
    $server = "db4free.net";
    $user = "christin10";
    $pass = "christin1011";
    $database = "double_j";

    $koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

    //Jika tombol simpan diklik
    if(isset($_POST['bsimpan']))
    {
        //Pengujian apakah data akan diedit atau disimpan baru
        if($_GET['hal'] == "edit")
        {
            //Data akan diedit
            $edit = mysqli_query($koneksi, "UPDATE tbarang set
                                            kode_barang = '$_POST[tkode_barang]',
                                            nama_barang = '$_POST[tnama_barang]',
                                            deskripsi_barang = '$_POST[tdeskripsi_barang]',
                                            merek = '$_POST[tmerek]',
                                            stok = '$_POST[tstok]',
                                            satuan_barang = '$_POST[tsatuan_barang]',
                                            tanggal_kadaluarsa = '$_POST[ttanggal_kadaluarsa]',
                                            jumlah_barang = '$_POST[tjumlah_barang]',
                                            harga = '$_POST[tharga]',
                                            tokoh = '$_POST[ttokoh]',
                                            supplier = '$_POST[tsupplier]',
                                            karyawan = '$_POST[tkaryawan]'
                                            WHERE id_barang = '$_GET[id]'
                                        ");
            if($edit) //jika edit sukses
            {
                echo "<script>
                      alert('Edit Data Sukses');
                      document.location= 'index.php';
                      </script>";
            }
            else
            {
                echo "<script>
                      alert('Edit Data Gagal');
                      document.location= 'index.php';
                      </script>";
            }
        }
        else
        {
            //Data akan disimpan baru
            $simpan = mysqli_query($koneksi, "INSERT INTO tbarang (kode_barang, nama_barang, deskripsi_barang, merek, stok, satuan_barang, tanggal_kadaluarsa, jumlah_barang, harga, tokoh, supplier, karyawan)
                                                VALUES ('$_POST[tkode_barang]',
                                                        '$_POST[tnama_barang]',
                                                        '$_POST[tdeskripsi_barang]',
                                                        '$_POST[tmerek]',
                                                        '$_POST[tstok]',
                                                        '$_POST[tsatuan]',
                                                        '$_POST[ttanggal_kadaluarsa]',
                                                        '$_POST[tjumlah_barang]',
                                                        '$_POST[tharga]',
                                                        '$_POST[ttokoh]',
                                                        '$_POST[tsupplier]',
                                                        '$_POST[tkaryawan]')
                                                    ");
            if($simpan) //jika simpan sukses
            {
                echo "<script>
                       alert('Simpan Data Sukses');
                       document.location= 'index.php';
                       </script>";
            }
            else
            {
                echo "<script>
                      alert('Simpan Data Gagal');
                      document.location= 'index.php';
                      </script>";
            }
        }
    }
        //Pengujian jika tombol edit atau hapus diklik 
        if(isset($_GET['hal']))
        {
            //Pengujian jika edit data
            if($_GET['hal'] == "edit")
            {
                //Tampilkan data yang diedit 
                $tampil = mysqli_query($koneksi, "SELECT * FROM tbarang WHERE id_barang = '$_GET[id]' ");
                $data = mysqli_fetch_array($tampil);
                if($data)
                {
                    //Jika data ditemukan, maka akan ditampung kedalam variabel
                    $vkode_barang = $data['kode_barang'];
                    $vnama_barang = $data['nama_barang'];
                    $vdeskripsi_barang = $data['deskripsi_barang'];
                    $vmerek = $data['merek'];
                    $vstok = $data['stok'];
                    $vsatuan_barang = $data['satuan_barang'];
                    $vtanggal_kadaluarsa = $data['tanggal_kadaluarsa'];
                    $vjumlah_barang = $data['jumlah_barang'];
                    $vharga = $data['harga'];
                    $vtokoh = $data['tokoh'];
                    $vsupplier = $data['supplier'];
                    $vkaryawan = $data['karyawan'];
                }
            }
            else if ($_GET['hal'] == "hapus")
            {
                //persiapan hapus data
                $hapus = mysqli_query($koneksi, "DELETE FROM tbarang WHERE id_barang = '$_GET[id]' ");
                if($hapus){
                     echo "<script>
                            alert('Hapus Data Sukses');
                            document.location= 'index.php';
                            </script>";
                }
            }
        }
    

?>
    <!DOCTYPE html>
        <html>
        <head>
            <title>Barang</title>
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        </head>
        <body>
        <div class="container">
            <h1 class="text-center">Input Barang</h1>
            <h2 class="text-center">Esterlita Damima (1905024)</h2>
            
            <!-- Awal Card Form -->
            <div class="card mt-4">
                <div class="card-header bg-primary text-white">
                    Form Barang 
                </div>
                <div class="card-body">
                     <form method="post" action="">
        <div class="form-group">
            <label>Kode barang</label>
            <input type="text" name="tkode_barang"  value= "<?=@$vkode_barang?>" class="form-control" placeholder="masukkan kode barang" required>
        </div>
        <div class="form-group">
            <label>Nama barang</label>
            <input type="text" name="tnama_barang" value= "<?=@$vnama_barang?>" class="form-control" placeholder="masukkan nama barang" required>
        </div>
        <div class="form-group">
            <label>Deskripsi barang</label>
            <input type="text" name="tdeskripsi_barang" value= "<?=@$vdeskripsi_barang?>" class="form-control" placeholder="masukkan deskripsi barang" required>
        </div>
        <div class="form-group">
            <label>Merek</label>
            <input type="text" name="tmerek" value= "<?=@$vmerek?>" class="form-control" placeholder="masukkan merek" required>
        </div>
        <div class="form-group">
            <label>Stok</label>
            <input type="text" name="tstok" value= "<?=@$vstok?>" class="form-control" placeholder="masukkan stok" required>
        </div>
        <div class="form-group">
            <label>Satuan barang</label>
            <input type="text" name="tsatuan_barang" value= "<?=@$vsatuan_barang?>" class="form-control" placeholder="masukkan satuan barang" required>
        </div>
        <div class="form-group">
            <label>Tanggal Kadaluarsa</label>
            <input type="text" name="ttanggal_kadaluarsa" value= "<?=@$vtanggal_kadaluarsa?>" class="form-control" placeholder="masukkan tanggal kadaluarsa" required>
        </div>
        <div class="form-group">
            <label>Jumlah barang</label>
            <input type="text" name="tjumlah_barang" value= "<?=@$vjumlah_barang?>" class="form-control" placeholder="masukkan jumlah barang" required>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="text" name="tharga" value="<?=@$vharga?>" class="form-control" placeholder="masukkan harga" required>
        </div>
        <div class="form-group">
            <label>tokoh</label>
            <input type="text" name="ttokoh" value= "<?=@$vtokoh?>" class="form-control" placeholder="masukkan tokoh" required>
        </div>
        <div class="form-group">
            <label>supplier</label>
            <input type="text" name="tsupplier" value= "<?=@$vsupplier?>" class="form-control" placeholder="masukkan supplier" required>
        </div>
        <div class="form-group">
            <label>karyawan</label>
            <input type="text" name="tkaryawan" value= "<?=@$vkaryawan?>" class="form-control" placeholder="masukkan karyawan" required>
        </div>


        <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
        <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>
    </form>
</div>
</div>
<!-- Akhir Card Form -->

<!-- Awal Card Tabel -->
<div class="card mt-4">
    <div class="card-header bg-success text-white">
        Data Barang
</div>
<div class="card-body">
  <table class="table table-bordered table-striped">
  <tr>
      <th>No</th>
      <th>Kode barang</th>
      <th>Nama barang</th>
      <th>Deskripsi barang</th>
      <th>Merek</th>
      <th>Stok</th>
      <th>Satuan barang</th>
      <th>Tanggal kadaluarsa</th>
      <th>Jumlah barang</th>
      <th>Harga</th>
      <th>Tokoh</th>
      <th>Supplier</Th>
      <th>Karyawan</th>
      <th>Aksi</th>
    </tr> 
    <?php
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM tbarang order by id_barang desc");
            while($data = mysqli_fetch_array($tampil)) :
    ?> 
    <tr>
        <td><?=$no++;?></td>
        <td><?=$data ['kode_barang'];?></td>
        <td><?=$data ['nama_barang'];?></td>
        <td><?=$data ['deskripsi_barang'];?></td>
        <td><?=$data ['merek'];?></td>
        <td><?=$data ['stok'];?></td>
        <td><?=$data ['satuan_barang'];?></td>
        <td><?=$data ['tanggal_kadaluarsa'];?></td>
        <td><?=$data ['jumlah_barang'];?></td>
        <td><?=$data ['harga'];?></td>
        <td><?=$data ['tokoh'];?></td>
        <td><?=$data ['supplier'];?></td>
        <td><?=$data ['karyawan'];?></td>
        <td>
            <a href= "index.php?hal=edit&id=<?=$data['id_barang']?>" class="btn btn-warning"> Edit </a>
            <a href = "index.php?hal=hapus&id=<?=$data['id_barang']?>" onclik="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
        </td>
    </tr>
    <?php endwhile; //Penutup perulangan while ?>
    </table>

   </div>
    </div>
   <!-- Akhir card tabel -->

</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>