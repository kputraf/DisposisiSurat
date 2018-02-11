<div id="page-wrapper">
	<div class="row">
    	<div class="col-lg-12">
        	<h2 class="page-header">Surat Masuk</h2>
        </div>
	</div>
	<div class="col-sm-6">
		<button class="btn btn-success" data-toggle="modal" data-target="#modal_add">Tambah Surat</button></a>
	</div>
	<div class="col-sm-6">
       <form action="<?php echo base_url('index.php/suratmasuk/cari/');?>" method="get">
		<div class="input-group custom-search-form">
        	<input type="text" name="cari" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
           	<button class="btn btn-default" type="submit">
            <i class="fa fa-search"></i>
            </button></a>
            </span>
       	</div>
        </form>
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
   			
   			<th>Kode Surat</th>
   			<th>Tanggal Terima</th>
   			<th>Dari</th>
   			<th>Kepada</th>
   			<th>Subjek Surat</th>
   			<th>Deskripsi</th>
   			<th>Surat</th>
   			<th>Tipe</th>
   			<th>Aksi</th>
   		</thead>
   		<tbody>
      <?php
        $no=0;
        foreach($suratmasuk as $tampilkan)
        {
          echo '<tr>
   			<td>'.$tampilkan->mail_code.'</td>
   			<td>'.$tampilkan->incoming_at.'</td>
   			<td>'.$tampilkan->mail_from.'</td>
   			<td>'.$tampilkan->mail_to.'</td>
   			<td>'.$tampilkan->mail_subject.'</td>
   			<td>'.$tampilkan->description.'</td>
   			<td>'.$tampilkan->file_upload.'</td>
   			<td>'.$tampilkan->type.'</td>
   		
   			<td><a href="'.base_url('uploads/'.$tampilkan->file_upload).'" class="btn btn-sm btn-warning fa fa-info" target="_blank"> Lihat</a>
   			<a href="'.base_url('index.php/suratmasuk/lihatupdate/'.$tampilkan->id).'" class="btn btn-sm btn-primary fa fa-pencil"> Update</a>
        <a href="'.base_url('index.php/suratmasuk/updatefile/'.$tampilkan->id).'" class="btn btn-sm btn-success fa fa-pencil"> Ubah Surat</a>
            <a href="'.base_url('index.php/suratmasuk/hapus/'.$tampilkan->id).'" class="btn btn-sm btn-danger fa fa-trash"></a>
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
      <form action="<?php echo base_url('index.php/suratmasuk/tambah');?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Surat</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Kode Surat</label>
            <input type="text" name="mail_code" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Tanggal Terima</label>
            <input type="date" name="incoming_at" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Dari</label>
            <input type="text" name="mail_from" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Kepada</label>
            <input type="text" name="mail_to" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Subjek Surat</label>
            <input type="text" name="mail_subject" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea type="text" name="description" class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label>Surat</label>
            <input type="file" name="surat" class="form-control" required> 
          </div>
          <div class="form-group">
            <label>Tipe Surat</label>
           <select name="mail_typeid">
           	<option value='1'>Eksternal</option>
           	<option value='2'>Internal</option>
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
    </div>
  </div>
</div>