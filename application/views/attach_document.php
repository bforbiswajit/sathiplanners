	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title">Attach/Detach Document With Existing File</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div><!-- /.box-tools -->
		</div><!-- /.box-header -->
		<div class="box-body">
                    <?php
                        if($this->session->userdata('success_msg_attach_doc')){
                    ?>
                            <div class="alert alert-success alert-dismissable" role="alert" id="documentAttachForm_success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $this->session->userdata('success_msg_attach_doc');?>
                            </div>
                    <?php
                        }
                        elseif($this->session->userdata('err_msg_attach_doc')){
                    ?>
                            <div class="alert alert-danger alert-dismissable" role="alert" id="documentAttachForm_danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $this->session->userdata('err_msg_attach_doc');?>
                            </div>
                    <?php
                        }
                    ?>
                    <form id="planAddForm" action="/document/attach" enctype="multipart/form-data">
                        <div class="modal-body" style="width: 50%; margin-left: 10%;">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">File #</span>
                                <input class="form-control" placeholder="Enter File No." id="fileLookup">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" id="docLookupBtn">Lookup</button>
                                </span>
                            </div><br/>
                            <div id="docStatus" style="display: none;">
                                Applicant Name : <b><span id="applicantName"></span></b><br/>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody id="documentTable">
                                        
                                    </tbody>
                                </table>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
		</div><!-- /.box-body -->
	</div><!-- /.box -->
        
<?php
$data = $this->session->userdata();
$data['err_msg_attach_doc'] = "";
$data['success_msg_attach_doc'] = "";
$this->session->set_userdata($data);
?>