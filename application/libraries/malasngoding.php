<?php 
//Membuat library sendiri pada folder libraries
//Deklarasi class yaitu Malasngoding
class Malasngoding{

	function nama_saya(){
		//Method nama_saya yang berisi untuk menampilkan Nama saya adalah malasngoding !
		echo "Nama saya adalah malasngoding !";
	}

	function nama_kamu($nama){
		//Method nama_kamu yang berisi untuk menampilkan Nama kamu adalah variabel nama
		echo "Nama kamu adalah ". $nama ." !";
	}
}