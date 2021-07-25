<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Marketplace extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'MarketPlace System';
        $data['barang'] = $this->Model_barang->tampil_data()->result();
        $data['barang2'] = $this->Model_barang->tampil_barang()->result();
        $data['kategorisemua'] = $this->Model_kategori->kategorisemua()->result();
        $this->session->unset_userdata('keyword');
        $this->load->view('templates_marketplace/header', $data);
        $this->load->view('templates_marketplace/topbar_marketplace', $data);
        $this->load->view('marketplace_user/index', $data);
        $this->load->view('templates_marketplace/footer');
    }
    public function detail($id_barang)
    {
        $data['title'] = 'MarketPlace System';
        $data['barang'] = $this->Model_barang->detail_brg($id_barang);
        $data['armada'] = $this->Model_barang->tampil_kurir($id_barang);
        $data['kategorisemua'] = $this->Model_kategori->kategorisemua()->result();
        $this->load->view('templates_marketplace/header', $data);
        $this->load->view('templates_marketplace/topbar_marketplace');
        $this->load->view('marketplace_user/detail', $data);
        $this->load->view('templates_marketplace/footer');
    }

    function ajax_upload()
    {
        if (isset($_FILES["image_file"]["name"])) {
            $config['upload_path'] = './uploads/buktipembayaran';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image_file')) {
                echo $this->upload->display_errors();
            } else {
                $databukti = $this->upload->data();
                echo '<img src="' . base_url() . 'uploads/buktipembayaran/' . $databukti["file_name"] . '" width="300" height="225" class="img-thumbnail" />';
            }
        }
        $data = array(
            'file_name' => $databukti["file_name"],
        );
        $this->session->set_userdata($data);
    }

    public function update_bukti($id_invoice)
    {
        $data  = array(
            'foto_bukti' => $this->session->userdata('file_name'),
        );
        $where = array(
            'id_invoice' => $id_invoice,
        );
        $this->Model_profil->update_img($where, $data, 'status_transaksi');
        redirect('marketplace/index');
    }

    function upload_buktidb()
    {
        $data['title'] = 'Selesai';
        $this->load->view('templates_marketplace/header');
        $this->load->view('templates_marketplace/topbar_cart');
        $this->load->view('marketplace_user/upload_pembayaran', $data);
        $this->load->view('templates_marketplace/footer');
    }
    public function checkout()
    {
        $data['title'] = 'Checkout';
        $data['admintoko'] = $this->db->get_where('admintoko', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['toko'] = $this->db->get_where('toko', ['id' =>  $data['admintoko']['id_toko']])->row_array();
        $data['kategorisemua'] = $this->Model_kategori->kategorisemua()->result();
        $this->session->unset_userdata('keyword');
        $this->load->library('cart');
        $this->load->view('templates_marketplace/header', $data);
        // $this->load->view('templates_marketplace/sidebar_cart');
        $this->load->view('templates_marketplace/topbar_cart');
        $this->load->view('marketplace_user/checkout', $data);
        $this->load->view('templates_marketplace/footer');
    }
    public function cek_pesanan()
    {
        $invoice = $this->input->post('invoice');
        $cekinvoice = $this->db->get_where('status_transaksi', ['id_invoice' => $invoice])->row_array();
        if ($cekinvoice['id_invoice'] == $invoice) {
            if ($cekinvoice['foto_bukti'] != "0") {
                $data['title'] = 'Cek Pesanan : ' . $invoice;
                $data['cekpesanan'] = $this->Model_invoice->status_pesanan($invoice);
                $this->load->view('templates_marketplace/header', $data);
                $this->load->view('templates_marketplace/topbar_cart');
                $this->load->view('marketplace_user/cekpesanan', $data);
                $this->load->view('templates_marketplace/footer');
            } else {
                $invoice = $this->input->post('invoice');
                redirect('marketplace/belum_upload/' . $invoice);
            }
        } else {
            echo " <script>
            alert('Kode Invoice Salah atau Tidak Terdaftar!');
            document.location.href = '..' 
            </script>
            ";
        }
    }
    public function toko($id_toko)
    {
        $data['title'] = 'MarketPlace';
        $data['barang'] = $this->Model_barang->detail_toko($id_toko);
        $data['kategori'] = $this->Model_kategori->tampil_data($id_toko);
        $data['detail'] = $this->Model_kategori->tampilbarang($id_toko);
        $data['kategorisemua'] = $this->Model_kategori->kategorisemua()->result();
        $this->session->unset_userdata('keyword');
        $this->load->view('templates_marketplace/header', $data);
        $this->load->view('templates_marketplace/topbar_marketplace');
        $this->load->view('marketplace_user/toko', $data);
        $this->load->view('templates_marketplace/footer');
    }
    public function kategori($kategori)
    {
        $data['title'] = 'Category Product';
        $data['barang'] = $this->Model_barang->detail_toko($kategori);
        $data['kategori'] = $this->Model_kategori->tampil_data($kategori);
        $data['detail'] = $this->Model_kategori->tampilbarang($kategori);
        $data['kategorisemua'] = $this->Model_kategori->kategorisemua()->result();
        $this->session->unset_userdata('keyword');
        $this->load->view('templates_marketplace/header', $data);
        $this->load->view('templates_marketplace/topbar_marketplace');
        $this->load->view('marketplace_user/kategori', $data);
        $this->load->view('templates_marketplace/footer');
    }
    public function kategorisemuatoko($id)
    {
        $data['title'] = 'Category Product';
        // $data['barang'] = $this->Model_barang->detail_toko($kategori);
        $data['kategorisemua'] = $this->Model_kategori->kategorisemua()->result();
        $data['barang'] = $this->Model_kategori->tampilsemuabarang($id);

        // $data['detail'] = $this->Model_kategori->tampilbarang($kategori);
        $this->session->unset_userdata('keyword');
        $this->load->view('templates_marketplace/header', $data);
        $this->load->view('templates_marketplace/topbar_marketplace', $data);
        $this->load->view('marketplace_user/kategorisemua', $data);
        $this->load->view('templates_marketplace/footer');
    }
    public function relevance($id)
    {
        $data['title'] = 'Category Product';
        // $data['barang'] = $this->Model_barang->detail_toko($kategori);
        $data['kategorisemua'] = $this->Model_kategori->kategorisemua()->result();
        $data['barang'] = $this->Model_kategori->tampilsemuabarang($id);

        // $data['detail'] = $this->Model_kategori->tampilbarang($kategori);
        $this->session->unset_userdata('keyword');
        $this->load->view('templates_marketplace/header', $data);
        $this->load->view('templates_marketplace/topbar_marketplace', $data);
        $this->load->view('marketplace_user/kategorisemua', $data);
        $this->load->view('templates_marketplace/footer');
    }
    public function outlet()
    {
        $data['title'] = 'MarketPlace DeptStore';
        $data['dekat'] = $this->Model_store->tampil_dekat()->result();
        $data['jauh'] = $this->Model_store->tampil_jauh()->result();
        $data['lokasi'] = $this->Model_store->location()->result();
        $data['kategorisemua'] = $this->Model_kategori->kategorisemua()->result();
        $this->session->unset_userdata('keyword');
        $this->load->view('templates_marketplace/header', $data);
        $this->load->view('templates_marketplace/topbar_alamat', $data);
        $this->load->view('marketplace_user/outlet', $data);
        $this->load->view('templates_marketplace/footer');
    }

    public function proses_pesanan()
    {
        $data['title'] = 'Proses Pesanan';
        $is_processed = $this->Model_invoice->index();
        if ($is_processed) {
            $this->cart->destroy();
            $data['kodeinvoice'] = $this->Model_invoice->data_invoice();
            $totaltagihan = $this->input->post('total_tagihan');
            $datac = array(
                'tagihan'  => $totaltagihan,
            );
            $this->session->set_userdata($datac);
            $data['bayar'] = $this->Model_invoice->payment()->result_array();
            $this->load->view('templates_marketplace/header', $data);
            $this->load->view('templates_marketplace/topbar_cart');
            $this->load->view('marketplace_user/upload_pembayaran', $data, $datac);
            $this->load->view('templates_marketplace/footer');
        } else {
            echo "Maaf, Pesanan anda gagal di proses";
        }
    }
    public function belum_upload($invoice)
    {
        $data['title'] = 'Proses Pesanan';
        $data['kodeinvoice'] = $this->Model_invoice->belum_upload($invoice);
        $data['bayar'] = $this->Model_invoice->payment()->result_array();
        $this->load->view('templates_marketplace/header', $data);
        $this->load->view('templates_marketplace/topbar_cart');
        $this->load->view('marketplace_user/upload_pembayaran', $data);
        $this->load->view('templates_marketplace/footer');
    }

    public function data_customer()
    {
        $nama_pemesan = $this->input->post('nama_pemesan');
        $hp_pemesan = $this->input->post('hp_pemesan');
        $kota_pemesan = $this->input->post('kota_pemesan');
        $kodepos = $this->input->post('kodepos');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $data = array(
            'nama_pemesan' => $nama_pemesan,
            'hp_pemesan' => $hp_pemesan,
            'kota_pemesan' => $kota_pemesan,
            'kodepos' => $kodepos,
            'alamat'       => $alamat,
            'email' => $email,
        );
        $this->db->insert('data_pemesan', $data);
        redirect('marketplace/konfirmasi');
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['barang'] = $this->Model_barang->getKeyword($keyword);
        $key = $this->input->post('key');
        $data['barang2'] = $this->Model_barang->getKeyworddiskon($key);
        $data['kategorisemua'] = $this->Model_kategori->kategorisemua()->result();
        $datac = array(
            'keyword'  => $keyword,
        );
        $this->session->set_userdata($datac);
        $this->load->view('templates_marketplace/header', $data);
        $this->load->view('templates_marketplace/topbar_marketplace');
        $this->load->view('marketplace_user/searchresult', $data, $datac);
        $this->load->view('templates_marketplace/footer');
    }
    public function addcart($id)
    {
        $barang = $this->Model_barang->find($id);
        $data = array(
            'id'    => $barang->id_barang,
            'qty'   => 1,
            'price' => $barang->harga_setelahdiskon,
            'name'  => $barang->nama_barang,
            'foto_barang' => $barang->foto_barang,
            'nama_toko' => $barang->nama_toko,
            'id_toko' => $barang->id,
            'kodearea' => $barang->kodearea,
        );
        if (!$this->cart->contents()) {
            $this->cart->insert($data);
            $this->session->set_userdata($data);
            redirect('marketplace/detailcart');
        };
        if ($this->session->userdata('id_toko') == $barang->id) {
            $this->cart->insert($data);
            $this->session->set_userdata($data);
            redirect('marketplace/detailcart');
        } else {
            echo " <script>
            alert('Maaf, anda hanya bisa berbelanja dari 1 toko');
            document.location.href = '..' 
            </script>
            "; //.. artinya balik ke directory sebelumnyaa
        };
    }
    public function detailcart()
    {
        $toko = $this->session->userdata('nama_toko');
        $data['title'] = 'Keranjang Belanja : ' . $toko;
        // $data['title'] = 'Keranjang Belanja';
        $data['kategorisemua'] = $this->Model_kategori->kategorisemua()->result();
        $this->session->set_userdata($data);

        $this->load->library('cart');
        $this->load->view('templates_marketplace/header', $data);
        $this->load->view('templates_marketplace/topbar_marketplace');
        $this->load->view('marketplace_user/cart', $data);
        $this->load->view('templates_marketplace/footer', $data);
    }

    public function update_itemcart()
    {
        $data = array(
            'rowid' => $this->input->post('item-rowid'),
            'qty'   => $this->input->post('item-qty')
        );
        if ($this->cart->contents(0)) {
            $this->session->unset_userdata($data);
        };
        $this->cart->update($data);
        redirect('marketplace/detailcart');
    }
    public function delete_itemcart()
    {
        $data = array(
            'rowid' => $this->input->post('item-rowid'),
            'qty'   => 0
        );
        if ($this->cart->contents(0)) {
            $this->session->unset_userdata($data);
        };
        $this->cart->update($data);
        redirect('marketplace/detailcart');
    }

    public function detail_invoice()
    {
        $this->form_validation->set_rules('nama_pemesan', 'Nama Penerima', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('kota_pemesan', 'Kota', 'required|trim');
        $this->form_validation->set_rules('kodepos', 'Kodepos', 'required|trim');
        $this->form_validation->set_rules('hp_pemesan', 'No. Handphone', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        date_default_timezone_set('Asia/Jakarta');
        $nama_pemesan = $this->input->post('nama_pemesan');
        $hp_pemesan = $this->input->post('hp_pemesan');
        $kota_pemesan = $this->input->post('kota_pemesan');
        $kodepos = $this->input->post('kodepos');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $kodepossub = substr($kodepos, 0, 2);
        $data = array(
            'nama_pemesan' => $nama_pemesan,
            'hp_pemesan' => $hp_pemesan,
            'kota_pemesan' => $kota_pemesan,
            'kodepos' => $kodepos,
            'alamat'       => $alamat,
            'order_date'   => date('d-m-Y H:i:s'),
            'batas_bayar'  => date('d-m-Y H:i:s', mktime(date('H') + 1, date('i'), date('s'), date('m'), date('d'), date('Y'))),
            'id_toko' => $this->input->post('id_toko'),
            'email' => $email,
            'bayar' => $this->input->post('bayar'),
            'id_armada' => $this->input->post('armada'),
            'kodepossub' => $kodepossub,
            'toko_area' => $this->input->post('toko_area'),
        );
        $this->session->set_userdata($data);
        $data['ongkirwilayah'] = $this->Model_invoice->ongkirwilayah()->result_array();
        $data['ongkirlayanan'] = $this->Model_invoice->ongkirlayanan()->result_array();
        $data['bayar'] = $this->Model_invoice->payment()->result_array();
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Invoice';
            $data['armada'] = $this->Model_barang->armada()->result_array();
            $data['bayar'] = $this->Model_barang->payment()->result_array();
            $this->load->view('templates_marketplace/header', $data);
            $this->load->view('templates_marketplace/topbar_cart');
            $this->load->view('marketplace_user/konfirmasi', $data);
            $this->load->view('templates_marketplace/footer');
        } else {
            $data['title'] = 'Invoice';
            $this->load->view('templates_marketplace/header', $data);
            $this->load->view('templates_marketplace/topbar_cart');
            $this->load->view('marketplace_user/invoice', $data);
            $this->load->view('templates_marketplace/footer');
        }
    }

    public function konfirmasi()
    {
        $data['title'] = 'Checkout Item';
        $data['armada'] = $this->Model_barang->armada()->result_array();
        $data['bayar'] = $this->Model_barang->payment()->result_array();
        $this->load->view('templates_marketplace/header', $data);
        // $this->load->view('templates_marketplace/sidebar_cart');
        $this->load->view('templates_marketplace/topbar_cart');
        $this->load->view('marketplace_user/konfirmasi', $data);
        $this->load->view('templates_marketplace/footer');
    }

    public function cekongkir()
    {
        $data['title'] = 'Payment & Shipping';
        $id_kurir = $this->input->post('id_kurir');
        $data['harga_ongkir'] = $this->db->get_where('armada', ['id' => $id_kurir])->row_array();
        //var_dump($data['harga_ongkir']);
        $data = array(
            'id_kurir' => $id_kurir,
        );
        $this->session->set_userdata($data);
        $data['armada'] = $this->Model_barang->armada()->result_array();
        $data['bayar'] = $this->Model_barang->payment()->result_array();
        $data['ongkir'] = $this->Model_barang->ongkir()->result_array();
        $this->load->view('templates_marketplace/header', $data);
        // $this->load->view('templates_marketplace/sidebar_cart');
        $this->load->view('templates_marketplace/topbar_cart');
        $this->load->view('marketplace_user/konfirmasi', $data);
        $this->load->view('templates_marketplace/footer');
        redirect('marketplace/konfirmasi');
    }

    public function alamat()
    {
        $this->form_validation->set_rules('desa', 'Nama Desa', 'required');
        $this->form_validation->set_rules('kodepos', 'Kode Pos', 'required');

        $desa    = $this->input->post('desa');
        $kodepos    = $this->input->post('kodepos');
        $kodearea = substr($kodepos, 0, 2);

        $data  = array(
            'desa'   => $desa,
            'kodepos'   => $kodepos,
            'kodearea'   => $kodearea,
        );
        $this->session->set_userdata($data);
        $this->session->unset_userdata('keyword');
        // $this->db->insert('alamatuser', $data);
        redirect('marketplace/outlet_terdekat');
    }

    // public function edit_location($id)
    // {
    //     $where = array('kodepos' => $id);
    //     $data = ['kodepos'] = $this->model_store->edit_location($where, 'kodepos')->result();
    //     $this->load->view('marketplace_user/outlet', $data);
    // }

    public function update_alamat()
    {
        $desa    = $this->input->post('desa');
        $kodepos    = $this->input->post('kodepos');
        $kodearea = substr($kodepos, 0, 2);

        $data = array(
            'desa' => $desa,
            'kodepos' => $kodepos,
            'kodearea' => $kodearea
        );

        $where = array(
            'id' => 1,
        );
        $this->Model_store->update_location($where, $data, 'terdekat');
        redirect('marketplace/outlet');
    }

    public function autoalamat()
    {
        $data['provinsi'] = $this->Model_alamat->provinsi();
        // $data['kabupaten'] = $this->Model_alamat->kabupaten();
        // $data['kecamatan'] = $this->Model_alamat->kecamatan();
        // $data['kelurahan'] = $this->Model_alamat->kelurahan();
        $data['title'] = 'MarketPlace Auto alamat';
        $data['lokasi'] = $this->Model_store->location()->result();
        $data['kategorisemua'] = $this->Model_kategori->kategorisemua()->result();
        $this->load->view('templates_marketplace/header', $data);
        $this->load->view('templates_marketplace/topbar_alamat', $data);
        $this->load->view('marketplace_user/autoalamat', $data);
        $this->load->view('templates_marketplace/footer', $data);
    }
    public function fetch_kabupaten()
    {
        if ($this->input->post('id_prov')) {
            echo $this->Model_alamat->kabupaten($this->input->post('id_prov'));
        }
    }
    public function fetch_kecamatan()
    {
        if ($this->input->post('id_kab')) {
            echo $this->Model_alamat->kecamatan($this->input->post('id_kab'));
        }
    }
    public function fetch_kelurahan()
    {
        if ($this->input->post('id_kec')) {
            echo $this->Model_alamat->kelurahan($this->input->post('id_kec'));
        }
    }
    public function multiple()
    {
        $student_list = $this->model_store->student_list();
        $this->load->view('students', ['student_list' => $student_list]);
    }

    public function add_selected_student()
    {
        $student_id = $this->input->post('student_id'); //here i am getting student id from the checkbox

        for ($i = 0; $i < sizeof($student_id); $i++) {
            $data = array('student_id' => $student_id[$i]);
            $this->db->insert('added_student', $data);
        }

        $this->session->set_flashdata('msg', "Students details has been added successfully");
        $this->session->set_flashdata('msg_class', 'alert-success');

        return redirect('multiple');
    }
}
