	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title">Create New Plan</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div><!-- /.box-tools -->
		</div><!-- /.box-header -->
		<div class="box-body">
			<div class="alert alert-success alert-dismissable" role="alert" id="planAddForm_success" style="display: none;"></div>
			<div class="alert alert-success alert-dismissable" role="alert" id="planAddForm_danger" style="display: none;"></div>
			<form id="planAddForm" action="/plan/add" enctype="multipart/form-data">
				<div class="modal-body" style="width: 50%; margin-left: 10%;">
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Select Applicant</span>
						<input type="text" class="form-control" placeholder="Enter Applicant #ID/ Name / Business Title" aria-describedby="basic-addon1" name="applicantId" id="applicantId" required>
						<datalist id="applicantList"></datalist>
					</div><br/>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Type of Assignment</span>
						<select name="vendorId" id="vendorList" style="height: 2em; width: 100%;" required>
							<option value="">-Select-</option>
							<option value="MP"><a>Only Mining Plan</a></option>
							<option value="EC"><a>Only Environment Clearance</a></option>
							<option value="MPEC"><a>Both Mining Plan & EC</a></option>
						</select>
					</div><br/>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Registered On</span>
						<input type="date" class="form-control" aria-describedby="basic-addon1" name="dateOfRegistration" required>
					</div><br/>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">RQP</span>
						<input type="text" class="form-control" placeholder="Name of RQP To Be Assigned To." aria-describedby="basic-addon1" name="rqp">
					</div><br/>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Amount &#8377;</span>
						<input type="text" class="form-control" placeholder="Total Amount To Be Charged." aria-describedby="basic-addon1" name="mobile" id="mobile" required>
					</div><br/>
					<div class="modal-footer">
						<button type="reset" class="btn btn-default">Cancel</button>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</div>
			</form>
		</div><!-- /.box-body -->
	</div><!-- /.box -->