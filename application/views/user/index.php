<div id="page-wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<h2 class="page-header">List User</h2>
        </div>
	</div>
	<div class="col-sm-6">
		<button class="btn btn-success" data-toggle="modal" data-target="#modal_add">Tambah User</button></a>
	</div>
	<div class="col-sm-6">
		<div class="input-group custom-search-form">
        	<input type="text" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
            <button class="btn btn-default" type="button">
            <i class="fa fa-search"></i>
            </button>
            </span>
       	</div>
   	</div>

   	<hr>
        <?php
  $notif=$this->session->flashdata('notif');
  if($notif!=NULL)
  {
    echo '<div class="alert alert-info">'.$notif.'</div>';
  }
  ?>
   	<table class="table table-striped table-hover" id="table-user">
   		<thead>
   			<th>Username</th>
   			<th>Nama Lengkap</th>
   			<th>Level</th>
   			<th>Aksi</th>
   		</thead>
   		<tbody>
       <?php
        $no=0;
        foreach($user as $tampilkan)
        {
          echo '<tr>
   			<td>'.$tampilkan->username.'</td>
   			<td>'.$tampilkan->fullname.'</td>
   			<td>'.$tampilkan->level.'</td>
   			<td><a href="'.base_url('index.php/user/getUser/'.$tampilkan->id).'" class="btn btn-info">Update</a>
            <a href="'.base_url('index.php/user/hapus/'.$tampilkan->id).'" class="btn btn-danger fa fa-trash"></a>
        </td>
        </tr>
        ';}?>
   		</tbody>
   	</table>

</div>
<!-- modal tambah pegawai-->
<div class="modal fade" id="modal_add">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?php echo base_url('index.php/user/tambah');?>" method="post">
        <div class="modal-header">
          <h4 class="modal-title">Tambah User</h4>
        </div>
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
    </div>
  </div>
</div>