<div id="page-wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<h2 class="page-header">Edit Surat Masuk</h2>
      </div>
	</div>
  <table class="table table-striped table-hover" id="table-user-update">
      <form action="<?php echo base_url();?>index.php/suratmasuk/dataupdate/<?php echo $updatesurat->id;?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label>Kode Surat</label>
            <input type="text" name="mail_code" class="form-control" value="<?php echo $updatesurat->mail_code;?>">
          </div>
          <div class="form-group">
            <label>Tanggal Terima</label>
            <input type="date" name="incoming_at" class="form-control" required value="<?php echo $updatesurat->incoming_at;?>">
          </div>
          <div class="form-group">
            <label>Dari</label>
            <input type="text" name="mail_from" class="form-control" required value="<?php echo $updatesurat->mail_from;?>">
          </div>
          <div class="form-group">
            <label>Kepada</label>
            <input type="text" name="mail_to" class="form-control" required value="<?php echo $updatesurat->mail_to;?>">
          </div>
          <div class="form-group">
            <label>Subjek Surat</label>
            <input type="text" name="mail_subject" class="form-control" required value="<?php echo $updatesurat->mail_subject;?>">
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea type="text" name="description" class="form-control" required ><?php echo $updatesurat->description;?></textarea>
          </div>
          <div class="form-group">
            <label>Tipe Surat</label>
           <select name="mail_typeid">
          <?php 
          foreach($tipesurat as $tampilkan)
            {
              echo '<option value="'.$tampilkan->id.'">'.$tampilkan->type.'</option>';
            }
          ?>
           </select>
          </div>
          <div class="row">
           <input type="text" value="<?php echo $this->session->userdata('id'); ?>" name="userid" style="display: none">
    </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" name="submit" class="btn btn-primary" value="Simpan">Simpan</button>
        
    </div>
      </form>
    </table>
</div>
