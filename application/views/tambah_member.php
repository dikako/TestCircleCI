<?php $this->load->view('_partials/head'); ?>
<?php $this->load->view('_partials/header'); ?>
<?php $this->load->view('_partials/sidebar'); ?>
<head>
	<title>New Member</title>
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
							<form id="form" action="<?php echo base_url('c_member/add/kirim') ?>" method="POST" class="form-horizontal">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
										</div>

										<h2 class="panel-title">Buat Member Baru</h2>
										<p class="panel-subtitle">
											Basic validation will display a label with the error after the form control.
										</p>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-3 control-label">Name <span class="required">*</span></label>
											<div class="col-sm-9">
												<?php echo form_error('nama_member'); ?>
												<input <?php echo form_error('nama_member') ? 'is-invalid':'' ?> type="text" name="nama_member" class="form-control" placeholder="eg.: John Doe" value="<?php echo set_value('nama_member'); ?>" required/>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Email <span class="required">*</span></label>
											<div class="col-sm-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-envelope"></i>
													</span>
													<input type="email" name="email" class="form-control" placeholder="eg.: email@email.com" value="<?php echo set_value('email'); ?>" required/>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-3 control-label">Deskripsi</label>
												<div class="col-sm-9">
													<?php //echo form_error('deskripsi'); ?>
													<input <?php //echo form_error('deskripsi') ? 'is-invalid':'' ?> class="form-control" name="deskripsi" value="<?php echo set_value('deskripsi'); ?>" />
												</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Bidang : <span class="required">*</span></label>
											<div class="col-sm-9">
												<?php foreach($bidang as $bidang): ?>
												<div class="checkbox-custom chekbox-primary">
													<input id="bidang" value="<?php echo $bidang->id_bidang ?>" type="checkbox" name="bidang[]" />
													<label for="nama_bidang"><?php echo ucfirst($bidang->nama_bidang) ?></label>
												</div>
												<?php endforeach; ?>
												<label class="error" for="for[]"></label>
											</div>
										</div>

									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<input id="click-to-close-success" class="mt-sm mb-sm btn btn-primary" type="submit" name="submit" value="Create" />

												<a href="<?php echo site_url('c_member'); ?>"><button type="button" class="btn btn-default">Batal</button></a>
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


