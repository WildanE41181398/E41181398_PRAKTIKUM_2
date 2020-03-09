<?php 


/*Membuat class model M_data dan meng-Extends nya dengan CI_Model
*/
class M_data extends CI_Model{

	/*Di bawah dibuat method tampil_data untuk mengambil data pada tabel user.

	$this->db->get adalah syntax yang digunakan untuk mengambil data dari database.

	Nama tabel yang ingin diambil datanya diletakkan dalam parameter seperti di bawah.

	Syntax return berfungsi untuk mengembalikan data yang ditangkap pada controller
	yang mengambil method tampil_data
	
	*/
	function tampil_data(){
		return $this->db->get('user');
	}
}