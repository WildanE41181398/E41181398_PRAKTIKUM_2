<?php

//Syntax di bawah berfungsi untuk mencegah akses langsung pada file controller.

defined('BASEPATH') OR exit('No direct script access allowed');


/*Membuat controller dan di sini diberi nama class Belajar dengan diawali huruf besar
dan sesuai namanya dengan controller yang telah dibuat. Controller yang saya buat pada
praktikum ini saya jadikan satu.
*/
//Meng-extends controller dengan CI_Controller
class Belajar extends CI_Controller {

	/*function construct untuk menjalankan fungsi yang diinginkan pada saat controller diakses.
	biasanya diletakkan fungsi untuk memanggil helper atau library yang diaktifkannya di autoload.php
	*/
	function __construct(){
		parent::__construct();
		//mengatifkan atau memanggil helper html,download,url
		$this->load->helper('html','download','url');
		//mengaktifkan atau memanggil library untuk membuat form_validation
		$this->load->library('form_validation');
		//memanggil model m_data
		$this->load->model('m_data');
		
	}


	
	/*Pada latihan membuat controller saya membuat method yaitu index, jika dikases
	maka akan tampil kalimat sesuai yang ada dalam echo.

	Cara mengakses yaitu localhost/praktikum2/index.php/belajar/index
	
	Dan jika controller belajar dibuat controller defaullt dapat disetting di routes.php
	*/
	public function index(){
		echo "ini method index pada controller belajar";
	}



	/*Pada method halo ini saya menampilkan view_belajar yang telah dibuat
	 syntax $this->load->view('view_belajar') akan dengan otomatis
	 mengakses folder application/view codeigniter.
	*/

	/*Cara parsing data ke view codeigniter
	untuk memparsing data ke view yaitu dengan bantuan array
	*/

	/*Pada contoh di bawah data diparsing dengan memasukkan variabel ke dalam
	parameter kedua pada syntax $this->load->view
	*/

	//Dan dari view tinggal mengakses variabel $judul dan $tutorial seperti di bawah ini
	/*<h2><?php echo $judul; ?></h2>
	<h3><?php echo $tutorial; ?></h3>
	*/
	
	/*Pada method halo ini juga sudah diberikan salah satu helper yakni html yaitu membuat
	heading dengan funtion heading yang ada pada view_belajar.php
	*/

	//Cara mengakses localhost/praktikum2/index.php/belajar/halo

	public function halo(){
		$data = array(
			//Saya memberi nama variabel $judul dan $tutorial
			'judul' => "Cara Membuat View Pada CodeIgniter",
			'tutorial' => "CodeIgniter"
			);
		$this->load->view('view_belajar',$data);
		
	}



	/*Pada method user di bawah ini berisi syntax $this->m_data->tampil_data
	syntax tersebut berfungsi untuk memanggil method tampil_data pada model m_data

	Fungsi result berguna untuk menjadikannya array

	Data yang diambil dari method tampil_data pada model m_data dimasukkan dalam
	variabel untuk diparsing ke dalam view v_tampil yang telah dibuat

	Untuk mengaksesnya localhost/praktikum2/index.php/belajar/user

	*/

	function user(){
		$data['user'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_tampil',$data);
	}



	

	
	/*Method form di bawah dengan syntax $this->load->view untuk menampilkan v_form
	*/

	function form(){
		$this->load->view('v_form');
	}
	/*Pada v_form terdapat function form_open menetapkan aksi dari form ke method aksi 			
	*/
	function aksi(){
		//Di bawah ini syntax untuk membuat tiga buah form dan form validasi dibuat pada method aksi ini
		//Function set_rules berarti menetapkan peraturan untuk form
		//Parameter pertama berikan nama form yang divalidasi
		//Parameter kedua berikan kata yang dimunculkan pada saat validasi
		//Parameter ketiga isikan peraturan form
		//Required berarti wajib, form tersebut wajib diisi

		//Untuk mengaksesnya localhost/praktikum2/index.php/belajar/form
		//Jika form tidak diisi maka muncul peringatan
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('konfir_email','Konfirmasi Email','required');
 
		if($this->form_validation->run() != false){
			//Jika form validation telah diisi maka akan tampil kalimat seperti di bawah
			echo "Form validation oke";
		}else{
			//Jika tidak maka akan tampil view v_form
			$this->load->view('v_form');
		}
	}




	//Method download
	//Menampilkan view v_download 
	public function download(){		
		$this->load->view('v_download');
	}
	
	/*Method lakukakun_download terdapat syntax force_download yang sudah disediakan codeigniter
	fungsi tersebut berfungsi untuk membuat aksi download
	*/
	//Pada parameter pertama langsung masukkan lokasi file yang akan didownload
	//File download ini berupa gambar yang sudah ada pada folder gambar dalam folder praktikum2
	//Untuk mengakses localhost/praktikum2/index.php/belajar/download
	public function lakukan_download(){				
		force_download('gambar/wilweb.png',NULL);
	}
	
	

	//Method membuat library

	function library(){
		//Pada method library ini pertama saya memanggil dahulu library yang telah dibuat yakni malasngoding
		$this->load->library('malasngoding');
		//Memanggil method nama_saya pada library malasngoding
		$this->malasngoding->nama_saya();
				echo "<br/>";
				//Memanggil method nama kamu pada library malasngoding
                $this->malasngoding->nama_kamu("Andi");
	}

	//Fungsi dari uri segment dengan membuat method warna seperti di bawah
	//Uri segement codeigniter dhitung setelah index.php pada codeigniter
	//Data yang dikirimkan melalui url di codeigniter biasanya terletak pada segment 3
	public function warna(){
		//Untuk mengakses uri segment bisa menggunakan syntax $this->uri->segment('urutan segment')
		echo "Segment 1 adalah = " . $this->uri->segment('1') . "<br/>";		
		echo "Segment 2 adalah = " . $this->uri->segment('2') . "<br/>";		
		echo "Segment 3 adalah = " . $this->uri->segment('3') . "<br/>";		
		echo "Segment 4 adalah = " . $this->uri->segment('4') . "<br/>";		
		echo "Segment 5 adalah = " . $this->uri->segment('5') . "<br/>";	
	}
		
}

