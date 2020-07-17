<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Jenisproperti Edit</h3>
            </div>
			<?php echo form_open('jenisproperti/edit/'.$jenisproperti['JenisID']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="NamaJenis" class="control-label"><span class="text-danger">*</span>NamaJenis</label>
						<div class="form-group">
							<input type="text" name="NamaJenis" value="<?php echo ($this->input->post('NamaJenis') ? $this->input->post('NamaJenis') : $jenisproperti['NamaJenis']); ?>" class="form-control" id="NamaJenis" />
							<span class="text-danger"><?php echo form_error('NamaJenis');?></span>
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