<h1><b>Kriptografi-DES</b></h1>
<p>Tugas Mata Kuliah Kriptografi Tentang Implementasi DES</p>
<h2>Dokumentasi</h2>
<ol>
<li><h3>Inisialisasi</h3><p>Karena pada implementasi kali ini tidak diberlakukan masukan dari user, plaintext dan key yang digunakan langsung kita set sebagai variable : </p><p><b>$plaintext = 'COMPUTE'</p>
$kunci = 'SECRET01'</b><p>Karena pada Enkripsi DES yang diolah adalah representasi biner dari plaintext dan key, maka pertama tama kita ubah plaintext dan kunci menjadi representasi binernya dengan fungsi <b>tobinary</b>. Pada fungsi ini tiap karakter pertama diubah kedalam kode ASCIInya. Kode ASCII tersebut kemudian diubah menjadi biner. Maka didapatkanlah representasi biner dari plaintext dan key</li>
<li><h3>Inisialisasi l0 dan r0
