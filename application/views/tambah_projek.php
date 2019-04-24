<?php $this->load->view('_partials/head'); ?>
<?php $this->load->view('_partials/header'); ?>
<?php $this->load->view('_partials/sidebar'); ?>
<head>
	<title>New Projek</title>
</head>
<body>

	<section role="main" class="content-body">
					<header class="page-header">
						<h2>Form Validation</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Forms</span></li>
								<li><span>Validation</span></li>
							</ol>
					
							<a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<?php if($this->session->flashdata('success')):?>
					<div id="click-to-close-success" class="ui-pnotify click-2-close"><?php $this->session->flashdata('success'); ?></div>
					<?php endif; ?>

					<!-- start: page -->
					<div class="row">
						<div class="col-lg-12">
							<form id="form" action="<?php echo base_url('c_projek/add/kirim') ?>" method="POST" class="form-horizontal">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
										</div>

										<h2 class="panel-title">Buat Projek Baru</h2>
										<p class="panel-subtitle">
											Basic validation will display a label with the error after the form control.
										</p>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-3 control-label">Project Name <span class="required">*</span></label>
											<div class="col-sm-9">
												<?php echo form_error('nama_projek'); ?>
												<input <?php echo form_error('nama_projek') ? 'is-invalid':'' ?> type="text" name="nama_projek" class="form-control" placeholder="eg.: John Doe" value="<?php echo set_value('nama_projek'); ?>" required/>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="inputSuccess">Kategori<span class="required">*</span></label>
												<div class="col-md-6">
													<select class="form-control mb-md" name="id_kategori" id="id_kategori">
														<?php $query = $this->db->query("select id_kategori,nama_kategori from kategori"); 
															$data = $query->result();
															foreach ($data as $row) 
															{
																$idk = $row->id_kategori;
																$nama_kategori = $row->nama_kategori;?>
																<option value="<?php echo $idk; ?>"><?php echo $nama_kategori; ?></option>
														<?php		
															}
														?>
													</select>
												</div>
										</div>

										<div class="form-group">
											<label class="col-md-3 control-label">Dibuat pada</label>
											<div class="col-md-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</span>
													<input type="text" data-plugin-datepicker class="form-control" name="created_at">
												</div>
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-3 control-label">Selesai pada</label>
											<div class="col-md-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</span>
													<input type="text" data-plugin-datepicker class="form-control" name="finished_at">
												</div>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Project Manager <span class="required">*</span></label>
											<div class="col-sm-9">
												<?php //echo form_error('nama_projek'); ?>
												<input <?php //echo form_error('upload_file') ? 'is-invalid':'' ?> type="text" name="lead" class="form-control" placeholder="eg.: John Doe" value="<?php echo set_value('lead'); ?>" required/>
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-3 control-label">Deskripsi</label>
												<div class="col-sm-9">
													<?php //echo form_error('deskripsi'); ?>
													<input <?php //echo form_error('deskripsi') ? 'is-invalid':'' ?> class="form-control" name="deskripsi" value="<?php echo set_value('deskripsi'); ?>" />
												</div>
										</div>
										
									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<input id="click-to-close-success" class="mt-sm mb-sm btn btn-primary" type="submit" name="submit" value="Create" />

												<a href="<?php echo site_url('c_projek'); ?>"><button type="button" class="btn btn-default">Batal</button></a>
											</div>
										</div>
									</footer>
								</section>
							</form>
						</div>
					</div>
	<br>
</body>
<?php $this->load->view('_partials/footer'); ?>
</html>


