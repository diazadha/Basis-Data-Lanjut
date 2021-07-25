<!DOCTYPE html>
<html><head>
    <title></title>
</head><body>
    <label>Alamat Pengiriman</label>
    <hr>

    <table width="100%">
        <?php
        foreach ($export as $inv) :
        ?>
           
        <?php endforeach; ?>
         <tr>
                <td>Nama Pembeli</td>
                <td ><?= $inv->nama_pemesan ?></td>
        </tr>
        <tr>
             <td>Email</td>
                <td><?= $inv->email ?></td>
        </tr>
        <tr>
            <td>No.Handphone</td>
                <td ><?= $inv->hp_pemesan ?></td>
        </tr>
        <tr>
             <td>Alamat</td>
                <td > <?= $inv->alamat ?>, <?= $inv->kota_pemesan ?> <?= $inv->kodepos ?></td>
        </tr>
        <tr>
            <td>Tanggal Transaksi</td>
                <td ><?= $inv->batas_bayar ?></td>
        </tr>
        <tr>
            <td>Metode Bayar</td>
                <td ><?= $inv->metode_bayar ?> <?= $inv->mitra_bayar ?> <?= $inv->rekening ?> A/N <?= $inv->pemilik ?></td>
        </tr>


    </table>

    <br><br>
    <label>Data Pesanan</label>
    <hr>
    <label>ID Invoice : <?= $inv->id_invoice ?></label>

    <table border="1" width="100%">

        <tr align="center">
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub Total</th>
        </tr>

        <?php
        $total = 0;
        foreach ($export as $psn) :
            $subtotal = $psn->jumlah * $psn->harga;
            $total += $subtotal;
        ?>
            <tr>
                <td align="center"><?= $psn->id_barang ?></td>
                <td align="center"><?= $psn->nama_barang ?></td>
                <td align="center"><?= $psn->jumlah ?></td>
                <td align="center">Rp. <?= number_format($psn->harga, 0, ',', '.') ?></td>
                <td>Rp. <?= number_format($subtotal, 0, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4" align="right"><strong>Total Belanja</strong></td>
            <td align="left"><strong>Rp. <?= number_format($total, 0, ',', '.') ?></strong></td>
        </tr>
        <tr>
            <td colspan="4" align="right"><strong>Pengiriman</strong></td>
            <td align="left"><strong>Rp. <?= number_format($psn->ongkir, 0, ',', '.') ?></strong></td>
        </tr>
        <tr>

            <td colspan="4" align="right"><strong>Grand Total</strong></td>
            <td align="left"><strong>Rp. <?= number_format($total + $psn->ongkir, 0, ',', '.') ?></strong></td>

        </tr>

    </table>
</body></html>