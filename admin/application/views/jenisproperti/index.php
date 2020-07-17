<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Jenisproperti Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('jenisproperti/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>JenisID</th>
						<th>NamaJenis</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($jenisproperti as $j){ ?>
                    <tr>
						<td><?php echo $j['JenisID']; ?></td>
						<td><?php echo $j['NamaJenis']; ?></td>
						<td>
                            <a href="<?php echo site_url('jenisproperti/edit/'.$j['JenisID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('jenisproperti/remove/'.$j['JenisID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
