<div class="container-fluid">
    <div class="container box">
        <h3>Provinsi</h3>
        <div class="form-group">
            <select name="provinsi" id="provinsi" class="form-control input-lg">
                <option value="">Select Province</option>
                <?php foreach ($provinsi as $k) : ?>
                    <option value="<?= $k->id_prov ?>"><?= $k->nama ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <h3>Kota/Kabupaten</h3>
        <div class="form-group">
            <select name="kabupaten" id="kabupaten" class="form-control input-lg">
                <option value="">Select City</option>
            </select>
        </div>
        <h3>Kecamatan</h3>
        <div class="form-group">
            <select name="kecamatan" id="kecamatan" class="form-control input-lg">
                <option value="">Select District</option>
            </select>
        </div>
        <h3>Kelurahan</h3>
        <div class="form-group">
            <select name="kelurahan" id="kelurahan" class="form-control input-lg">
                <option value="">Select Village</option>
            </select>
        </div>
    </div>
</div>