<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Foto Tabel Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('foto_tabel/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>FotoID</th>
						<th>PropertiID</th>
						<th>Foto</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($foto_tabel as $f){ ?>
                    <tr>
						<td><?php echo $f['FotoID']; ?></td>
						<td><?php echo $f['PropertiID']; ?></td>
						<td><?php echo $f['Foto']; ?></td>
						<td>
                            <a href="<?php echo site_url('foto_tabel/edit/'.$f['FotoID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('foto_tabel/remove/'.$f['FotoID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
