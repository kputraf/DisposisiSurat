<div id="page-wrapper">
	<div class="row">
	    	<div class="col-lg-12">
	        	<h2 class="page-header">Edit File Surat Masuk</h2>
	        </div>
	</div>
	<div>
		<form action="<?php echo base_url();?>index.php/suratmasuk/dataupdatefile/<?php echo $updatesurat->id;?>" method="post" enctype="multipart/form-data">
		<div class="form-group">
            <label>Surat</label>
            <input type="file" name="update_file_upload" class="form-control" required> 
        </div>
        <div>
        	<button type="submit" class="btn btn-primary" name="submit" value="Simpan">Simpan</button>
        </div>
      </form>
	</div>
</div>