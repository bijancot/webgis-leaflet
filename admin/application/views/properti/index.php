<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Properti Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('properti/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>PropertiID</th>
						<th>JenisID</th>
						<th>NamaProperti</th>
						<th>Alamat Properti</th>
						<th>Longitude</th>
						<th>Latitude</th>
						<th>Harga</th>
						<th>Luas</th>
						<th>Jarak</th>
						<th>Jumlah Cicil</th>
						<th>Tahun Bangun</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($properti as $p){ ?>
                    <tr>
						<td><?php echo $p['PropertiID']; ?></td>
						<td><?php echo $p['JenisID']; ?></td>
						<td><?php echo $p['NamaProperti']; ?></td>
						<td><?php echo $p['Alamat_properti']; ?></td>
						<td><?php echo $p['Longitude']; ?></td>
						<td><?php echo $p['Latitude']; ?></td>
						<td><?php echo $p['Harga']; ?></td>
						<td><?php echo $p['Luas']; ?></td>
						<td><?php echo $p['Jarak']; ?></td>
						<td><?php echo $p['Jumlah_cicil']; ?></td>
						<td><?php echo $p['Tahun_bangun']; ?></td>
						<td>
                            <a href="<?php echo site_url('properti/edit/'.$p['PropertiID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('properti/remove/'.$p['PropertiID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
