<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Add New Applicant</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
        <?php
            if($this->session->userdata('err_msg_applicant')){
        ?>
            <div class="alert alert-danger alert-dismissable" role="alert" id="applicantAddForm_danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->userdata('err_msg_applicant');?>
            </div>
        <?php
            }
            elseif($this->session->userdata('success_msg_applicant')){
        ?>
            <div class="alert alert-success alert-dismissable" role="alert" id="applicantAddForm_success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->userdata('success_msg_applicant');?>
            </div>
        <?php
            }
        ?>
        <form id="applicantAddForm" method="post" action="/applicant/add" enctype="multipart/form-data">
            <div class="modal-body" style="width: 50%; margin-left: 10%;">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Name&nbsp;<font color="red">*</font></span>
                    <input type="text" class="form-control" placeholder="Full Name" aria-describedby="basic-addon1" name="name" required>
                </div><br/>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Business Title</span>
                    <input type="text" class="form-control" placeholder="Company Name (Optional)" aria-describedby="basic-addon1" name="businessTitle">
                </div><br/>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Mobile&nbsp;<font color="red">*</font></span>
                    <input type="text" class="form-control" placeholder="10 Digit Mobile No." aria-describedby="basic-addon1" name="mobile" id="mobile" required>
                </div><br/>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Email</span>
                    <input type="text" class="form-control" placeholder="Email Address (Optional)." aria-describedby="basic-addon1" name="email" id="email">
                </div><br/>
                <div class="input-group">
                    Address&nbsp;<font color="red">*</font><br/><textarea name="addressLine" rows="5" cols="80" required></textarea>
                </div><br/>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">City&nbsp;<font color="red">*</font></span>
                    <input type="text" class="form-control" placeholder="City/Town/Police Station." aria-describedby="basic-addon1" name="city" required>
                </div><br/>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">District&nbsp;<font color="red">*</font></span>
                    <input type="text" class="form-control" placeholder="District." aria-describedby="basic-addon1" name="district" required>
                </div><br/>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">State&nbsp;<font color="red">*</font></span>
                    <input type="text" class="form-control" placeholder="State." aria-describedby="basic-addon1" name="state" required>
                </div><br/>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">P.I.N.&nbsp;<font color="red">*</font></span>
                    <input type="text" class="form-control" placeholder="6 Digit P.I.N." aria-describedby="basic-addon1" name="PIN" required>
                </div><br/>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Date of Birth</span>
                    <input type="date" class="form-control" aria-describedby="basic-addon1" name="dob">
                </div><br/>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Marriage Anniversary</span>
                    <input type="date" class="form-control" aria-describedby="basic-addon1" name="ma">
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

<?php
$data = $this->session->userdata();
$data['err_msg_applicant'] = "";
$data['success_msg_applicant'] = "";
$this->session->set_userdata($data);
?>