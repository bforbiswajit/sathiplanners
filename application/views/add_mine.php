	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title">Add New Mine</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div><!-- /.box-tools -->
		</div><!-- /.box-header -->
		<div class="box-body">
			<?php
                            if($this->session->userdata('err_msg_mine')){
                        ?>
                            <div class="alert alert-success alert-dismissable" role="alert" id="mineAddForm_danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $this->session->userdata('err_msg_mine');?>
                            </div>
                        <?php
                            }
                            elseif($this->session->userdata('success_msg_mine')){
                        ?>
                            <div class="alert alert-success alert-dismissable" role="alert" id="mineAddForm_success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $this->session->userdata('success_msg_mine');?>
                            </div>
                        <?php
                            }
                        ?>
			<form id="mineAddForm" action="/mines/add" enctype="multipart/form-data">
				<div class="modal-body" style="width: 50%; margin-left: 10%;">
					<div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">File No.&nbsp;<font color="red">*</font></span>
						<input type="text" class="form-control" placeholder="Enter File Number." aria-describedby="basic-addon1" name="fileNo" required>
					</div><br/>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Lease Type&nbsp;<font color="red">*</font></span>
						<input type="text" class="form-control" placeholder="Type of Lease Agreement." aria-describedby="basic-addon1" name="leasType" required>
					</div><br/>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Area&nbsp;<font color="red">*</font></span>
						<input type="text" class="form-control" placeholder="Enter the Lease Area (Acres)." aria-describedby="basic-addon1" name="area" required>
					</div><br/>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">District&nbsp;<font color="red">*</font></span>
						<input type="text" class="form-control" placeholder="Enter District Name." aria-describedby="basic-addon1" name="district" id="mobile" required>
					</div><br/>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Mouza&nbsp;<font color="red">*</font></span>
						<input type="text" class="form-control" placeholder="Mouza under which Mines area lies." aria-describedby="basic-addon1" name="mouza" id="mobile" required>
					</div><br/>
                                        <div class="input-group">
                                            Notes/Remarks <br/><textarea name="notes" rows="5" cols="80"></textarea>
                                        </div><br/>
					<div class="modal-footer">
						<button type="reset" class="btn btn-default">Cancel</button>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</div>
			</form>
		</div><!-- /.box-body -->
	</div><!-- /.box -->