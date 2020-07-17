<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Foto Tabel Edit</h3>
            </div>
			<?php echo form_open('foto_tabel/edit/'.$foto_tabel['FotoID']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="PropertiID" class="control-label"><span class="text-danger">*</span>PropertiID</label>
						<div class="form-group">
							<input type="text" name="PropertiID" value="<?php echo ($this->input->post('PropertiID') ? $this->input->post('PropertiID') : $foto_tabel['PropertiID']); ?>" class="form-control" id="PropertiID" />
							<span class="text-danger"><?php echo form_error('PropertiID');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="Foto" class="control-label"><span class="text-danger">*</span>Foto</label>
						<div class="form-group">
							<input type="text" name="Foto" value="<?php echo ($this->input->post('Foto') ? $this->input->post('Foto') : $foto_tabel['Foto']); ?>" class="form-control" id="Foto" />
							<span class="text-danger"><?php echo form_error('Foto');?></span>
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