<div id="page-wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<h2 class="page-header">Edit User</h2>
        </div>
	</div>
        <?php
  $notif=$this->session->flashdata('notif');
  if($notif!=NULL)
  {
    echo '<div class="alert alert-info">'.$notif.'</div>';
  }
  ?>
   	<table class="table table-striped table-hover" id="table-user">
   		
   		<tbody>
      <form action="<?php echo base_url('index.php/user/tambah');?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
          </div>
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="fullname" class="form-control">
          </div>
          <div class="form-group">
            <label>Level</label>
            <select class="form-control" name="level">
              <option value="5">5. Pegawai</option>
              <option value="4">4. Supervisor</option>
              <option value="3">3. Manajer</option>
              <option value="2">2. Direktur</option>
              <option value="1">1. Sekretaris</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" name="submit" class="btn btn-primary" value="Simpan">Simpan</button>
        </div>
      </form>
   		</tbody>
   	</table>
</div>
<!-- modal tambah pegawai-->
<div class="modal fade" id="modal_add">
  <div class="modal-dialog">
    <div class="modal-content">
      
    </div>
  </div>
</div>