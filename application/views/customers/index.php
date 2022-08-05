	<div class="container">
		<div class="row align-items-center mb-2">
			<div class="col-sm-6 col-12">
				<div class="h1">
					<?php echo $title; ?>
				</div>
			</div>
			<div class="col-sm-6 col-12">
				<div class="form-row form-inline justify-content-end">
					<div class="col-auto my-1">
						<a href="<?php echo base_url('customers/create'); ?>" class="btn btn-primary">
							New Customer
						</a>
					</div>
				</div>
			</div>
		</div>
		<table class="table table-sm">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Firstname</th>
					<th scope="col">Lastname</th>
					<th scope="col">Email</th>
					<th scope="col">Document</th>
					<th scope="col">Phone</th>
					<th scope="col" class="text-right">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($customers as $customer) : ?>
					<tr>
						<th scope="row"><?php echo $customer->id ?></th>
						<td><?php echo $customer->first_name ?></td>
						<td><?php echo $customer->last_name ?></td>
						<td><?php echo $customer->email ?></td>
						<td><?php echo $customer->document ?></td>
						<td><?php echo $customer->phone ?></td>
						<td class="text-right">
							<a href="<?php echo base_url('customers/show/'.$customer->id); ?>" class="btn btn-secondary btn-sm">
								<i class="bi bi-eye"></i>
							</a>
							<a href="<?php echo base_url('customers/edit/'.$customer->id); ?>" class="btn btn-primary btn-sm">
								<i class="bi bi-pencil"></i>
							</a>
							<form action="<?php echo base_url('customers/delete/'.$customer->id); ?>" method="POST" style="display: inline-block">
								<button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
							</form>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
