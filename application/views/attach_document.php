	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title">Attach/Detach Document With Existing File</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div><!-- /.box-tools -->
		</div><!-- /.box-header -->
		<div class="box-body">
                    <?php
                        if(isset($status) && $status == "success"){
                    ?>
                            <div class="alert alert-success alert-dismissable" role="alert" id="documentAttachForm_success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $data[0];?>
                            </div>
                    <?php
                        }
                        elseif(isset($status) && $status == "error"){
                    ?>
                            <div class="alert alert-danger alert-dismissable" role="alert" id="documentAttachForm_danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $message;?>
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
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody id="documentTable">
                                    <?php
                                        if(isset($data) && !empty($data)){
                                            for($i = 0; $i < count($data); $i++){
                                                echo "<tr id='" . $data[$i]->id . "'><td>" . $data[$i]->name . "</td><td>" . $data[$i]->pending . "</td><td>" . $data[$i]->received . "</td><td></td></tr>";
                                            }
                                        }
                                        elseif(isset($message)){
                                            echo "<tr><td colspan='4'>" . $message . "</td></tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
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
                                        <th>Name</th>
                                        <th>Business Title</th>
                                        <th>Mobile</th>
                                        <th>City</th>
                                    </tr>
                                </thead>
                                <tbody id="lookupApplicantTable">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
<?php
$data = $this->session->userdata();
$data['err_msg_attach_doc'] = "";
$data['success_msg_attach_doc'] = "";
$this->session->set_userdata($data);
?>