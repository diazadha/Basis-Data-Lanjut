<?php
class Model_invoice extends CI_Model
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $nama_pemesan = $this->session->userdata('nama_pemesan');
        $hp_pemesan = $this->session->userdata('hp_pemesan');
        $kota_pemesan = $this->session->userdata('kota_pemesan');
        $kodepos = $this->session->userdata('kodepos');
        $alamat = $this->session->userdata('alamat');
        $email = $this->session->userdata('email');

        $invoice = array(
            'nama_pemesan' => $nama_pemesan,
            'hp_pemesan' => $hp_pemesan,
            'kota_pemesan' => $kota_pemesan,
            'kodepos' => $kodepos,
            'alamat'       => $alamat,
            'order_date'   => date('Y-m-d H:i:s'),
            'batas_bayar'  => date('Y-m-d H:i:s', mktime(date('H'), date('i') + 2, date('s'), date('m'), date('d'), date('Y'))),
            'id_toko' => $this->input->post('idtoko'),
            'email' => $email,
        );
        $this->db->insert('invoice', $invoice);

        $id_invoice = $this->db->insert_id();
        $status_transaksi = array(
            'id_invoice' => $id_invoice,
            'status_bayar' => 0,
            'status_pesanan' => 0,
            'resi_kurir' => 0,
            'foto_bukti' => 0,
        );
        $this->db->insert('status_transaksi', $status_transaksi);

        foreach ($this->cart->contents() as $item) {
            //item[name]
            $data = array(
                'id_invoice' => $id_invoice,
                'id_barang' => $item['id'],
                'nama_barang' => $item['name'],
                'jumlah' => $item['qty'],
                'harga' => $item['price'],
                'id_pembayaran' => $this->input->post('bayar'),
                'id_armada' => $this->input->post('armada'),
                'ongkir' => $this->input->post('ongkir'),
            );
            $this->db->insert('orders', $data);
        }
        return true;
    }
    public function pesanan_baru()
    {
        $this->db->select('invoice.*,status_transaksi.status_bayar,status_transaksi.foto_bukti,status_transaksi.status_pesanan,status_transaksi.resi_kurir,COUNT(orders.id_invoice) as jumlah');
        $this->db->from('invoice');
        $this->db->join('admintoko', 'admintoko.id_toko = invoice.id_toko');
        $this->db->join('orders', 'orders.id_invoice = invoice.id');
        $this->db->join('status_transaksi', 'status_transaksi.id_invoice = invoice.id');
        $this->db->where('admintoko.email', $this->session->userdata('email'));
        $this->db->where('status_transaksi.status_bayar=', "0");
        $this->db->where('status_transaksi.status_pesanan=', "0");
        $this->db->where('status_transaksi.resi_kurir=', "0");
        $result = $this->db->group_by('orders.id_invoice')->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function data_invoice()
    {
        $query = "SELECT orders.id, orders.id_invoice, SUM(orders.jumlah*harga)+ongkir as tagihan, pembayaran.mitra_bayar, pembayaran.rekening, pembayaran.pemilik, invoice.batas_bayar
        FROM orders
        join pembayaran on pembayaran.id = orders.id_pembayaran
        join invoice on invoice.id = orders.id_invoice
        WHERE orders.id_invoice = (SELECT max(invoice.id) FROM invoice)";
        return $this->db->query($query)->row();
    }

    public function data_invoice_toko($id_toko)
    {
        $query = "SELECT invoice.*
        FROM invoice
        join toko on invoice.id_toko = toko.id
        WHERE invoice.id_toko = $id_toko
        order by invoice.id DESC";
        return $this->db->query($query)->result_array();
    }

    public function belum_upload($invoice)
    {
        $query = "SELECT orders.id, orders.id_invoice, SUM(orders.jumlah*harga)+ongkir as tagihan, pembayaran.mitra_bayar, pembayaran.rekening, pembayaran.pemilik, invoice.batas_bayar
        FROM orders
        join pembayaran on pembayaran.id = orders.id_pembayaran
        join invoice on invoice.id = orders.id_invoice
        WHERE orders.id_invoice = $invoice";
        return $this->db->query($query)->row();
    }

    public function data_customer()
    {
        $result = $this->db->get('data_pemesan');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function tampil_data()
    {
        $result = $this->db->get('invoice');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function getId_invoice($id_invoice)
    {
        $result = $this->db->where('id', $id_invoice)->limit(1)->get('invoice');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function status_pesanan($id_invoice)
    {
        $this->db->select('status_transaksi.*,invoice.*,orders.nama_barang,orders.id_barang,orders.jumlah,orders.harga, armada.nama_armada,armada.layanan, orders.ongkir, pembayaran.*');
        $this->db->from('status_transaksi');
        $this->db->join('invoice', 'invoice.id = status_transaksi.id_invoice');
        $this->db->join('orders', 'orders.id_invoice = invoice.id');
        $this->db->join('armada', 'armada.id = orders.id_armada');
        $this->db->join('pembayaran', 'orders.id_pembayaran = pembayaran.id');
        $result = $this->db->where('status_transaksi.id_invoice', $id_invoice)->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function detail_pemesan($id_invoice)
    {
        $this->db->select('invoice.*, pembayaran.*');
        $this->db->from('invoice');
        $this->db->join('orders', 'orders.id_invoice = invoice.id');
        $this->db->join('pembayaran', 'pembayaran.id = orders.id_pembayaran');
        $result = $this->db->where('invoice.id', $id_invoice)->limit(1)->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function getId_order($id_invoice)
    {
        $this->db->select('orders.*, armada.nama_armada, armada.layanan');
        $this->db->from('armada');
        $this->db->join('orders', 'orders.id_armada = armada.id');
        $result = $this->db->where('orders.id_invoice', $id_invoice)->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function exportinvoice($id_invoice)
    {
        $this->db->select('invoice.*, pembayaran.*, orders.*');
        $this->db->from('invoice');
        $this->db->join('orders', 'orders.id_invoice = invoice.id');
        $this->db->join('pembayaran', 'pembayaran.id = orders.id_pembayaran');
        $result = $this->db->where('orders.id_invoice', $id_invoice)->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function tampilinvoice()
    {
        $this->db->select('invoice.*');
        $result = $this->db->from('invoice')->get();
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
    public function ongkirwilayah()
    {
        $this->db->select('deliveryfee.delivfee');
        $this->db->from('deliveryfee');
        $this->db->where('deliveryfee.origin_areacode', $this->session->userdata('kodearea'))->where('deliveryfee.destination_areacode', $this->session->userdata('kodepossub'));
        return $this->db->get();
    }
    public function ongkirlayanan()
    {
        $this->db->select('nama_armada,layanan,harga_layanan');
        $this->db->from('armada');
        $this->db->where('id', $this->session->userdata('id_armada'));
        return $this->db->get();
    }

    public function payment()
    {
        $this->db->select('pembayaran.*');
        $this->db->from('pembayaran');
        $this->db->where('pembayaran.id', $this->session->userdata('bayar'));
        return $this->db->get();
    }
}
