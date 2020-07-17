<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Properti Edit</h3>
            </div>
			<?php echo form_open('properti/edit/'.$properti['PropertiID']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="JenisID" class="control-label"><span class="text-danger">*</span>JenisID</label>
						<div class="form-group">
							<input type="text" name="JenisID" value="<?php echo ($this->input->post('JenisID') ? $this->input->post('JenisID') : $properti['JenisID']); ?>" class="form-control" id="JenisID" />
							<span class="text-danger"><?php echo form_error('JenisID');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="NamaProperti" class="control-label"><span class="text-danger">*</span>NamaProperti</label>
						<div class="form-group">
							<input type="text" name="NamaProperti" value="<?php echo ($this->input->post('NamaProperti') ? $this->input->post('NamaProperti') : $properti['NamaProperti']); ?>" class="form-control" id="NamaProperti" />
							<span class="text-danger"><?php echo form_error('NamaProperti');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Alamat_properti" class="control-label"><span class="text-danger">*</span>Alamat Properti</label>
						<div class="form-group">
							<input type="text" name="Alamat_properti" value="<?php echo ($this->input->post('Alamat_properti') ? $this->input->post('Alamat_properti') : $properti['Alamat_properti']); ?>" class="form-control" id="Alamat_properti" />
							<span class="text-danger"><?php echo form_error('Alamat_properti');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Longitude" class="control-label"><span class="text-danger">*</span>Longitude</label>
						<div class="form-group">
							<input type="text" name="Longitude" value="<?php echo ($this->input->post('Longitude') ? $this->input->post('Longitude') : $properti['Longitude']); ?>" class="form-control" id="Longitude" />
							<span class="text-danger"><?php echo form_error('Longitude');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Latitude" class="control-label"><span class="text-danger">*</span>Latitude</label>
						<div class="form-group">
							<input type="text" name="Latitude" value="<?php echo ($this->input->post('Latitude') ? $this->input->post('Latitude') : $properti['Latitude']); ?>" class="form-control" id="Latitude" />
							<span class="text-danger"><?php echo form_error('Latitude');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Harga" class="control-label"><span class="text-danger">*</span>Harga</label>
						<div class="form-group">
							<input type="text" name="Harga" value="<?php echo ($this->input->post('Harga') ? $this->input->post('Harga') : $properti['Harga']); ?>" class="form-control" id="Harga" />
							<span class="text-danger"><?php echo form_error('Harga');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Luas" class="control-label">Luas</label>
						<div class="form-group">
							<input type="text" name="Luas" value="<?php echo ($this->input->post('Luas') ? $this->input->post('Luas') : $properti['Luas']); ?>" class="form-control" id="Luas" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="Jarak" class="control-label"><span class="text-danger">*</span>Jarak</label>
						<div class="form-group">
							<input type="text" name="Jarak" value="<?php echo ($this->input->post('Jarak') ? $this->input->post('Jarak') : $properti['Jarak']); ?>" class="form-control" id="Jarak" />
							<span class="text-danger"><?php echo form_error('Jarak');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Jumlah_cicil" class="control-label"><span class="text-danger">*</span>Jumlah Cicil</label>
						<div class="form-group">
							<input type="text" name="Jumlah_cicil" value="<?php echo ($this->input->post('Jumlah_cicil') ? $this->input->post('Jumlah_cicil') : $properti['Jumlah_cicil']); ?>" class="form-control" id="Jumlah_cicil" />
							<span class="text-danger"><?php echo form_error('Jumlah_cicil');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Tahun_bangun" class="control-label">Tahun Bangun</label>
						<div class="form-group">
							<input type="text" name="Tahun_bangun" value="<?php echo ($this->input->post('Tahun_bangun') ? $this->input->post('Tahun_bangun') : $properti['Tahun_bangun']); ?>" class="has-datepicker form-control" id="Tahun_bangun" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>