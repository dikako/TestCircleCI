<?php $this->load->view('_partials/head'); ?>
<?php $this->load->view('_partials/header'); ?>
<?php $this->load->view('_partials/sidebar'); ?>
<head>
	<title>Input Front End Dev</title>
</head>
<body>
	
	<?php if($this->session->flashdata('success')):?>
	<div id="click-to-close-success" class="mt-sm mb-sm btn btn-success"><?php $this->session->flashdata('success'); ?></div>
	<?php endif; ?>

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
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-lg-12">
							<form id="form" action="<?php base_url('c_devfront/edit') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
								<input type="hidden" name="id" value="<?php echo $dev_frontend->id_devfront ?>">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
										</div>

										<h2 class="panel-title">Form Edit Frontend Developer</h2>
										<p class="panel-subtitle">
											Basic validation will display a label with the error after the form control.
										</p>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-3 control-label">Full Name <span class="required">*</span></label>
											<div class="col-sm-9">
												<?php echo form_error('nama_frontend'); ?>
												<input <?php echo form_error('nama_frontend') ? 'is-invalid':'' ?> type="text" name="nama_frontend" class="form-control" placeholder="eg.: John Doe" value="<?php echo $dev_frontend->nama_frontend; ?>" required/>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label">Photo</label>
											<div class="col-sm-9">
												<?php echo form_error('image') ?>
												<input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>" type="file" name="image" value="<?php echo $dev_frontend->image ?>" />
												<input type="hidden" name="old_image" value="<?php echo $dev_frontend->image ?>" />
											</div>
										</div>
										
									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button type="submit" name="submit" class="btn btn-primary">Submit</button>

												<a href="<?php echo site_url('c_devfront'); ?>"><button type="button" class="btn btn-default">Batal</button></a>
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