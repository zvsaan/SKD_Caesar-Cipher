<?php  
// cek tombol yang ditekan
// jika tombol enkripsi
if (isset($_POST["enkripsi"])) {
	// buat fungsi yang menampung data input
	function cipher($char, $key){
		// cek apakah yang diinput merupakan alfabet
		if (ctype_alpha($char)) {
			// jika ya, cek lagi apakah merupakan huruf kapital atau tidak
			$nilai = ord(ctype_upper($char) ? 'A' : 'a'); // jika ya, nilainya A, jika tidak nilainya a | konversi ke ASCII dan tampung kedalam variabel
			// konversi char yang diinput ke ASCII
			$ch = ord($char);
			// buat perhitungan modulus dan tampung kedalam variabel
			$mod = fmod($ch + $key - $nilai, 26); // jumlah alfabet = 26
			// hasil modulus ditambah dengan nilai dan konversi ke bentuk alfabet, tampung dalam variabel
			$hasil = chr($mod + $nilai);
			// kembalikan hasil
			return $hasil;
		} // jika yang diinput bukan alfabet maka kembalikan char
		else{
			return $char;
		}
	} 

	// buat fungsi enkripsi
	function enkripsi($input, $key){
		// buat variabel yang menampung string
		$output = "";
		// buat variabel yang menampung data array
		$chars = str_split($input); // berisi dengan data input yang dikonversi kedalam bentuk array
		// lakukan perulangan untuk menampilkan data array
		foreach($chars as $char){
			// output menampung hasil perulangan data array
			$output .= cipher($char, $key); // yang diisi dengan hasil function cipher()
		} // kembalikan output
		return $output;
	}
	// dan jika tombol dekripsi yang ditekan
} else if (isset($_POST["dekripsi"])) {
	// buat fungsi cipher dan enkripsi lagi
	function cipher($char, $key){
		// cek apakah yang diinput merupakan alfabet
		if (ctype_alpha($char)) {
			// jika ya, cek lagi apakah merupakan huruf kapital atau tidak
			$nilai = ord(ctype_upper($char) ? 'A' : 'a'); // jika ya, nilainya A, jika tidak nilainya a | konversi ke ASCII dan tampung kedalam variabel
			// konversi char yang diinput ke ASCII
			$ch = ord($char);
			// buat perhitungan modulus dan tampung kedalam variabel
			$mod = fmod($ch + $key - $nilai, 26); // jumlah alfabet = 26
			// hasil modulus ditambah dengan nilai dan konversi ke bentuk alfabet, tampung dalam variabel
			$hasil = chr($mod + $nilai);
			// kembalikan hasil
			return $hasil;
		} // jika yang diinput bukan alfabet maka kembalikan char
		else{
			return $char;
		}
	} 

	// buat fungsi enkripsi
	function enkripsi($input, $key){
		// buat variabel yang menampung string
		$output = "";
		// buat variabel yang menampung data array
		$chars = str_split($input); // berisi dengan data input yang dikonversi kedalam bentuk array
		// lakukan perulangan untuk menampilkan data array
		foreach($chars as $char){
			// output menampung hasil perulangan data array
			$output .= cipher($char, $key); // yang diisi dengan hasil function cipher()
		} // kembalikan output
		return $output;
	}
	// lalu buat function dekripsi
	function dekripsi($input, $key){
		// kembalikan nilai fungsi enkripsi, tapi jumlah alfabet dikurangi key
		return enkripsi($input, 26 - $key);
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Webleb</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="style.css" rel="stylesheet" />
</head>
<body>
    <form action="" method="post">
        <div class="inner-container">
            <div class="box">
                <h1>Login</h1>
                <input type="text" name="plain" placeholder="Pesan Text"/>
                <input type="number" name="key" placeholder="Key"/>
                <button type="submit" name="enkripsi" class="ui-btn">
                    <span>Enkripsi</span>
                </button>
                <button type="submit" name="dekripsi" class="ui-btn">
                    <span>Deskripsi</span>
                </button>
                <textarea type="text" placeholder="Hasil">
                    <?php  
                        if (isset($_POST["enkripsi"])) { // jika tombol enkripsi yang ditekan
                            // tampilkan hasil enkripsi
                            echo enkripsi($_POST["plain"], $_POST["key"]);
                        } // dan jika dekripsi
                        else if (isset($_POST["dekripsi"])) {
                            echo dekripsi($_POST["plain"], $_POST["key"]);
                        }
                    ?>
                </textarea>
            </div>
        </div>
    </form>
</body>
</html>