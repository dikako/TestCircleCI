<?php $this->load->view('_partials/head'); ?>
<?php $this->load->view('_partials/header'); ?>
<?php $this->load->view('_partials/sidebar'); ?>

<section role="main" class="content-body">
					<header class="page-header">
						<h2>Editable Tables</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Tables</span></li>
								<li><span>Editable</span></li>
							</ol>
					
							<a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<!-- start: page -->
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
								</div>
								<h2 class="panel-title">Tipe Note</h2>
							</header>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="mb-md">
											<a href="<?php echo site_url('c_tipenote/add'); ?>"><button id="addToTable" class="btn btn-primary">Create <i class="fa fa-plus"></i></button></a>
										</div>
									</div>
								</div>
								<table class="table table-bordered table-striped mb-none" id="datatable-editable">
									<thead>
										<tr>
											<?php $No=1; ?>
											<th>No</th>
											<th>Nama</th>
											<th>Action</th>
										</tr>
									</thead>
									<?php foreach($tipe_note as $tipe_note): ?>
									<tbody>
										<tr class="gradeX">
											<td><?php echo $No ?></td>
											<td><?php echo $tipe_note->nama_tipe_note ?></td>
											<td class="actions">
												<a href="<?php echo site_url('c_tipenote/edit/'.$tipe_note->id_tipe_note) ?>" class="on-default edit-row"><i class="fa fa-pencil"></i></a>

												<a href="<?php echo site_url('c_tipenote/delete/'.$tipe_note->id_tipe_note)?>" class="on-default remove-row" ><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										<?php $No++ ?> 
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</section>
					<!-- end: page -->
				</section>
			</div>
			</aside>
		</section>
<?php $this->load->view('_partials/footer'); ?>
	</body>
	<html>