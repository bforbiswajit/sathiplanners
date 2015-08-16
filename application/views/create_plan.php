	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title">Create New Plan</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div><!-- /.box-tools -->
		</div><!-- /.box-header -->
		<div class="box-body">
                    <?php
                        if(isset($status) && $status == "success"){
                    ?>
                            <div class="alert alert-success alert-dismissable" role="alert" id="planAddForm_success">
                                <?php echo $data[0];?>
                            </div>
                    <?php
                        }
                        elseif(isset($status) && $status == "error"){
                    ?>
                            <div class="alert alert-success alert-dismissable" role="alert" id="planAddForm_danger">
                                <?php echo $message;?>
                            </div>
                    <?php
                        }
                    ?>
                    <form id="planAddForm" action="plan/add" enctype="multipart/form-data">
                            <div class="modal-body" style="width: 50%; margin-left: 10%;">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Applicant #</span>
                                        <input class="form-control" placeholder="Select Applicant" id="applicantLookup" disabled>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" id="lookupBtn">Lookup</button>
                                        </span>
                                    </div><br/>
                                    <input type="hidden" name="applicantId" id="selectedApplicantId">
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Type of Assignment</span>
                                            <select name="type" style="height: 2em; width: 100%;" required>
                                                    <option value="">-Select-</option>
                                                    <option value="MP"><a>Only Mining Plan</a></option>
                                                    <option value="EC"><a>Only Environment Clearance</a></option>
                                                    <option value="MPEC"><a>Both Mining Plan & EC</a></option>
                                            </select>
                                    </div><br/>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Registered On</span>
                                            <input type="date" class="form-control" aria-describedby="basic-addon1" name="dateOfRegistration">
                                    </div><br/>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">RQP</span>
                                            <input type="text" class="form-control" placeholder="Name of RQP To Be Assigned To." aria-describedby="basic-addon1" name="rqp" required>
                                    </div><br/>
                                    <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Amount &#8377;</span>
                                            <input type="text" class="form-control" placeholder="Total Amount To Be Charged." aria-describedby="basic-addon1" name="amount" id="amount" required>
                                    </div><br/>
                                    <div class="modal-footer">
                                            <button type="reset" class="btn btn-default">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                            </div>
                    </form>
		</div><!-- /.box-body -->
	</div><!-- /.box -->
        
        <!--Edit Deal Modal-->
        <div class="modal fade" id="lookupApplicantModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Click on the Applicant</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Search</span>
                                <input type="text" class="form-control" aria-describedby="basic-addon1" name="lookupApplicant" id="lookupApplicant" required>
                            </div><br/>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Name</th>
                                        <th>Business Title</th>
                                        <th>City</th>
                                    </tr>
                                </thead>
                                <tbody id="lookupApplicantTable">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>