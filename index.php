<?php
$plaintext = 'COMPUTE';
$kunci = 'SECRET01';
echo 'enkripsi<br>';
function tobinary($text){
	$pisah = str_split($text, 1);
	$arrplain = array();
	for($i=0;$i<8;$i++){
		$arrtext[$i] = decbin(ord($pisah[$i]));
		$arrtext[$i] = str_pad($arrtext[$i], 8, 0, STR_PAD_LEFT);
	}
	$tobinary = $arrtext[0].$arrtext[1].$arrtext[2].$arrtext[3].$arrtext[4].$arrtext[5].$arrtext[6].$arrtext[7]; //plaintext to biner 64 bit
	return $tobinary;
}

$plaintobiner = tobinary($plaintext);
$kuncitobiner = tobinary($kunci);
echo 'plain biner : '.$plaintobiner.'<br>key biner : '.$kuncitobiner.'<br>';

//initial permutation
function l0($text){
	$hasil = $text[57].$text[49].$text[41].$text[33].$text[25].$text[17].$text[9].$text[1].
				$text[59].$text[51].$text[43].$text[35].$text[27].$text[19].$text[11].$text[3].
				$text[61].$text[53].$text[45].$text[37].$text[29].$text[21].$text[13].$text[5].
				$text[63].$text[55].$text[47].$text[39].$text[31].$text[23].$text[15].$text[7];
	return $hasil;
}

function r0($text){
	$hasil = $text[56].$text[48].$text[40].$text[32].$text[24].$text[16].$text[8].$text[0].
				$text[58].$text[50].$text[42].$text[34].$text[26].$text[18].$text[10].$text[2].
				$text[60].$text[52].$text[44].$text[36].$text[28].$text[20].$text[12].$text[4].
				$text[62].$text[54].$text[46].$text[38].$text[30].$text[22].$text[14].$text[6];
	return $hasil;
}

$l[0] =	l0($plaintobiner);
$r[0] =	r0($plaintobiner);
$ip = $l[0].$r[0];
//pc - 1
function c0($text){
	$hasil = $text[56].$text[48].$text[40].$text[32].$text[24].$text[16].$text[8].
				$text[0].$text[57].$text[49].$text[41].$text[33].$text[25].$text[17].
				$text[9].$text[1].$text[58].$text[50].$text[42].$text[34].$text[26].
				$text[18].$text[10].$text[2].$text[59].$text[51].$text[43].$text[35];
	return $hasil;
}
function d0($text){
	$hasil = $text[62].$text[54].$text[46].$text[38].$text[30].$text[22].$text[14].
				$text[6].$text[61].$text[53].$text[45].$text[37].$text[29].$text[21].
				$text[13].$text[5].$text[60].$text[52].$text[44].$text[36].$text[28].
				$text[20].$text[12].$text[4].$text[27].$text[19].$text[11].$text[3];
	return $hasil;
}

$c[0] =	c0($kuncitobiner);
$d[0] =	d0($kuncitobiner);
		
$pc_1 = $c[0].$d[0];

//left shift
function left_shift($text){
	$temp = $text[0];
	for($i=0;$i<27;$i++){
		$text[$i]=$text[$i+1];
	}
	$text[27]=$temp;
	return $text;
}
$c[1] = left_shift($c[0]);					$d[1] = left_shift($d[0]);
$c[2] = left_shift($c[1]);					$d[2] = left_shift($d[1]);
$c[3] = left_shift(left_shift($c[2]));		$d[3] = left_shift(left_shift($d[2]));
$c[4] = left_shift(left_shift($c[3]));		$d[4] = left_shift(left_shift($d[3]));
$c[5] = left_shift(left_shift($c[4]));		$d[5] = left_shift(left_shift($d[4]));
$c[6] = left_shift(left_shift($c[5]));		$d[6] = left_shift(left_shift($d[5]));
$c[7] = left_shift(left_shift($c[6]));		$d[7] = left_shift(left_shift($d[6]));
$c[8] = left_shift(left_shift($c[7]));		$d[8] = left_shift(left_shift($d[7]));
$c[9] = left_shift($c[8]);					$d[9] = left_shift($d[8]);
$c[10] = left_shift(left_shift($c[9]));		$d[10] = left_shift(left_shift($d[9]));
$c[11] = left_shift(left_shift($c[10]));	$d[11] = left_shift(left_shift($d[10]));
$c[12] = left_shift(left_shift($c[11]));	$d[12] = left_shift(left_shift($d[11]));
$c[13] = left_shift(left_shift($c[12]));	$d[13] = left_shift(left_shift($d[12]));
$c[14] = left_shift(left_shift($c[13]));	$d[14] = left_shift(left_shift($d[13]));
$c[15] = left_shift(left_shift($c[14]));	$d[15] = left_shift(left_shift($d[14]));
$c[16] = left_shift($c[15]);				$d[16] = left_shift($d[15]);

//pc - 2
function pc2($text){
	$value =	$text[13].$text[16].$text[10].$text[23].$text[0].$text[4].$text[2].$text[27].
				$text[14].$text[5].$text[20].$text[9].$text[22].$text[18].$text[11].$text[3].
				$text[25].$text[7].$text[15].$text[6].$text[26].$text[19].$text[12].$text[1].
				$text[40].$text[51].$text[30].$text[36].$text[46].$text[54].$text[29].$text[39].
				$text[50].$text[44].$text[32].$text[47].$text[43].$text[48].$text[38].$text[55].
				$text[33].$text[52].$text[45].$text[41].$text[49].$text[35].$text[28].$text[31];
	return $value;
}

$k = array();
for($i=0;$i<=16;$i++){
	$temp = $c[$i].$d[$i];
	$k[$i] = pc2($temp);
}
//ekpansi
function expansion($text){
	$value =	$text[31].$text[0].$text[1].$text[2].$text[3].$text[4].
				$text[3].$text[4].$text[5].$text[6].$text[7].$text[8].
				$text[7].$text[8].$text[9].$text[10].$text[11].$text[12].
				$text[11].$text[12].$text[13].$text[14].$text[15].$text[16].
				$text[15].$text[16].$text[17].$text[18].$text[19].$text[20].
				$text[19].$text[20].$text[21].$text[22].$text[23].$text[24].
				$text[23].$text[24].$text[25].$text[26].$text[27].$text[28].
				$text[27].$text[28].$text[29].$text[30].$text[31].$text[0];
	return $value;
}
// xor
function xorfunction($text1, $text2){
	$a = '';
	for($i=0;$i<48;$i++){
		$nilai = (string)(((int)$text1[$i]) xor ((int)$text2[$i]));
		if($nilai == ''){
			$nilai = '0';
		}
		$a = $a.$nilai;
	}
	return $a;
}

function binarytodecimal($text){
	$pisah = str_split($text,1);
	$nilai = 0;
	$nilai = 32*(int)$pisah[0] + 16*(int)$pisah[1] + 8*(int)$pisah[2] + 4*(int)$pisah[3] + 2*(int)$pisah[4] + 1*(int)$pisah[5]; 
	return $nilai;
}

function tobinary4bit($text){
	$hasil = decbin($text);
	$hasil = str_pad($hasil, 4, 0, STR_PAD_LEFT);
	return $hasil;
}

function sboxfunction($text){
	$pisah = str_split($text,6);
	$sbox1 = array(14,4,13,1,2,15,11,8,3,10,6,12,5,9,0,7,
           0,15,7,4,14,2,13,1,10,6,12,11,9,5,3,8,
           4,1,14,8,13,6,2,11,15,12,9,7,3,10,5,0,
           15,12,8,2,4,9,1,7,5,11,3,14,10,0,6,13);
	$sbox2 = array(15,1,8,14,6,11,3,4,9,7,2,13,12,0,5,10,
             3,13,4,7,15,2,8,14,12,0,1,10,6,9,11,5,
             0,14,7,11,10,4,13,1,5,8,12,6,9,3,2,15,
             13,8,10,1,3,15,4,2,11,6,7,12,0,5,14,9);
    $sbox3 = array(10,0,9,14,6,3,15,5,1,13,12,7,11,4,2,8,
             13,7,0,9,3,4,6,10,2,8,5,14,12,11,15,1,
             13,6,4,9,8,15,3,0,11,1,2,12,5,10,14,7,
             1,10,13,0,6,9,8,7,4,15,14,3,11,5,2,12);
    $sbox4 = array(7,13,14,3,0,6,9,10,1,2,8,5,11,12,4,15,
             13,8,11,5,6,15,0,3,4,7,2,12,1,10,14,9,
             10,6,9,0,12,11,7,13,15,1,3,14,5,2,8,4,
             3,15,0,6,10,1,13,8,9,4,5,11,12,7,2,14);
    $sbox5 = array(2,12,4,1,7,10,11,6,8,5,3,15,13,0,14,9,
             14,11,2,12,4,7,13,1,5,0,15,10,3,9,8,6,
             4,2,1,11,10,13,7,8,15,9,12,5,6,3,0,14,
             11,8,12,7,1,14,2,13,6,15,0,9,10,4,5,3);
    $sbox6 = array(12,1,10,15,9,2,6,8,0,13,3,4,14,7,5,11,
             10,15,4,2,7,12,9,5,6,1,13,14,0,11,3,8,
             9,14,15,5,2,8,12,3,7,0,4,10,1,13,11,6,
             4,3,2,12,9,5,15,10,11,14,1,7,6,0,8,13);
    $sbox7 = array(4,11,2,14,15,0,8,13,3,12,9,7,5,10,6,1,
             13,0,11,7,4,9,1,10,14,3,5,12,2,15,8,6,
             1,4,11,13,12,3,7,14,10,15,6,8,0,5,9,2,
             6,11,13,8,1,4,10,7,9,5,0,15,14,2,3,12);
    $sbox8 = array(13,2,8,4,6,15,11,1,10,9,3,14,5,0,12,7,
             1,15,13,8,10,3,7,4,12,5,6,11,0,14,9,2,
             7,11,4,1,9,12,14,2,0,6,10,13,15,3,5,8,
             2,1,14,7,4,10,8,13,15,12,9,0,3,5,6,11);
	$posisi[0] = $sbox1[binarytodecimal($pisah[0])];
	$posisi[1] = $sbox2[binarytodecimal($pisah[1])];
	$posisi[2] = $sbox3[binarytodecimal($pisah[2])];
	$posisi[3] = $sbox4[binarytodecimal($pisah[3])];
	$posisi[4] = $sbox5[binarytodecimal($pisah[4])];
	$posisi[5] = $sbox6[binarytodecimal($pisah[5])];
	$posisi[6] = $sbox7[binarytodecimal($pisah[6])];
	$posisi[7] = $sbox8[binarytodecimal($pisah[7])];	
	$hasil_sbox = tobinary4bit($posisi[0]).tobinary4bit($posisi[1]).tobinary4bit($posisi[2]).tobinary4bit($posisi[3]).tobinary4bit($posisi[4]).tobinary4bit($posisi[5]).tobinary4bit($posisi[6]).tobinary4bit($posisi[7]);	
	return $hasil_sbox;
}
function permutation($text){
	$hasil = 	$text[15].$text[6].$text[19].$text[20].$text[28].$text[11].$text[27].$text[16].
				$text[0].$text[14].$text[22].$text[25].$text[4].$text[17].$text[30].$text[9].
				$text[1].$text[7].$text[23].$text[13].$text[31].$text[26].$text[2].$text[8].
				$text[18].$text[12].$text[29].$text[5].$text[21].$text[10].$text[3].$text[24];
	return $hasil; 
}
function xor32bitfunction($text1, $text2){
	$a = '';
	for($i=0;$i<32;$i++){
		$nilai = (string)(((int)$text1[$i]) xor ((int)$text2[$i]));
		if($nilai == ''){
			$nilai = '0';
		}
		$a = $a.$nilai;
	}
	return $a;
}
// invers
function ipinvers($text){
	$hasil = 	$text[39].$text[7].$text[47].$text[15].$text[55].$text[23].$text[63].$text[31].
				$text[38].$text[6].$text[46].$text[14].$text[54].$text[22].$text[62].$text[30].
				$text[37].$text[5].$text[45].$text[13].$text[53].$text[21].$text[61].$text[29].
				$text[36].$text[4].$text[44].$text[12].$text[52].$text[20].$text[60].$text[28].
				$text[35].$text[3].$text[43].$text[11].$text[51].$text[19].$text[59].$text[27].
				$text[34].$text[2].$text[42].$text[10].$text[50].$text[18].$text[58].$text[26].
				$text[33].$text[1].$text[41].$text[9].$text[49].$text[17].$text[57].$text[25].
				$text[32].$text[0].$text[40].$text[8].$text[48].$text[16].$text[56].$text[24];
	return $hasil; 
}

//menentukan r dan l
for($i=1;$i<=16;$i++){
	$r[$i] = xor32bitfunction(permutation(sboxfunction(xorfunction(expansion($r[$i-1]),$k[$i]))),$l[$i-1]);
	$l[$i] = $r[$i-1];
	//echo '<br>l'.$i.' : '.$l[$i].'<br>r'.$i.' : '.$r[$i];
}

$enkripsi = ipinvers($r[16].$l[16]);
echo '<br><br> hasil enkripsi : '.$enkripsi;

//dekripsi
echo '<hr><br>dekripsi';

$le[0] = l0($enkripsi);
$re[0] = r0($enkripsi);

for($i=1;$i<=16;$i++){
	$re[$i] = xor32bitfunction(permutation(sboxfunction(xorfunction(expansion($re[$i-1]),$k[17-$i]))),$le[$i-1]);
	$le[$i] = $re[$i-1];
	//echo '<br>l'.$i.' : '.$le[$i].'<br>r'.$i.' : '.$re[$i];
}
$dekripsi = ipinvers($re[16].$le[16]);
echo '<br><br> hasil dekripsi : '.$dekripsi;
?>