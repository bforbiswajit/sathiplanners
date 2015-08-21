	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title">List of All Applicants</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div><!-- /.box-tools -->
		</div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Business Title</th>
                                <th>Mobile</th>
                                <th>City</th>
                                <th>District</th>
                                <th>Registered On</th>
                                <th>Amount Due</th>
                            </tr>
                        </thead>
                        <tbody id="applicantListingTable">
                            <?php
                                if(isset($data) && !empty($data)){
                                    for($i = 0; $i < count($data); $i++){
                                        //echo $data[$i]->id . "\n<br/>";
                                        echo "<tr id='" . $data[$i]->id . "'><td>" . $data[$i]->id . "</td><td>" . $data[$i]->name . "</td><td>" . $data[$i]->businessTitle . "</td><td>" . $data[$i]->mobile . "</td><td>" . $data[$i]->city . "</td><td>" . $data[$i]->district . "</td><td>" . $data[$i]->registeredOn->format('Y-m-d') . "</td><td>-</td></tr>";
                                    }
                                }
                                elseif(isset($message)){
                                    echo "<tr><td colspan='8'>" . $message . "</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
        </div>

        
<?php if(isset($name)){?>
        <!--Edit Deal Modal-->
        <div class="modal fade" id="editApplicantModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">View/Edit Applicant Details :</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <form id="applicantEditForm" action="/applicant/Edit" enctype="multipart/form-data">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Name&nbsp;<font color="red">*</font></span>
                                    <input type="text" class="form-control" placeholder="Full Name" aria-describedby="basic-addon1" name="name" id="name" value="<?php echo $name;?>" required>
                                </div><br/>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Business Title</span>
                                    <input type="text" class="form-control" placeholder="Company Name (Optional)" aria-describedby="basic-addon1" name="businessTitle" id="businessTitle" value="<?php echo $businessTitle;?>">
                                </div><br/>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Mobile&nbsp;<font color="red">*</font></span>
                                    <input type="text" class="form-control" placeholder="10 Digit Mobile No." aria-describedby="basic-addon1" name="mobile" id="mobile" value="<?php echo $mobile;?>" required>
                                </div><br/>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Email</span>
                                    <input type="text" class="form-control" placeholder="Email Address (Optional)." aria-describedby="basic-addon1" name="email" id="email" value="<?php echo $email;?>">
                                </div><br/>
                                <div class="input-group">
                                    Address&nbsp;<font color="red">*</font><br/><textarea name="addressLine" id="addressLine" rows="5" cols="80" required><?php echo htmlspecialchars($addressLine, ENT_QUOTES, 'UTF-8') ?></textarea>
                                </div><br/>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">City&nbsp;<font color="red">*</font></span>
                                    <input type="text" class="form-control" placeholder="City/Town/Police Station." aria-describedby="basic-addon1" name="city" id="city" value="<?php echo $city;?>" required>
                                </div><br/>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">District&nbsp;<font color="red">*</font></span>
                                    <input type="text" class="form-control" placeholder="District." aria-describedby="basic-addon1" name="district" id="district" value="<?php echo $district;?>" required>
                                </div><br/>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">State&nbsp;<font color="red">*</font></span>
                                    <input type="text" class="form-control" placeholder="State." aria-describedby="basic-addon1" name="state" id="state" value="<?php echo $state;?>" required>
                                </div><br/>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">P.I.N.&nbsp;<font color="red">*</font></span>
                                    <input type="text" class="form-control" placeholder="6 Digit P.I.N." aria-describedby="basic-addon1" name="PIN" id="PIN" value="<?php echo $pin;?>" required>
                                </div><br/>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Date of Birth</span>
                                    <input type="date" class="form-control" aria-describedby="basic-addon1" name="dob" id="dob" value="<?php if($dob != "")echo date('Y-m-d',strtotime($dob));?>">
                                </div><br/>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Marriage Anniversary</span>
                                    <input type="date" class="form-control" aria-describedby="basic-addon1" name="ma" id="ma" value="<?php if($ma != "")echo date('Y-m-d',strtotime($ma));?>">
                                </div><br/>
                                <div class="input-group">
                                    Notes/Remarks <br/><textarea name="notes" id="notes" rows="5" cols="80"><?php echo htmlspecialchars($notes, ENT_QUOTES, 'UTF-8') ?></textarea>
                                </div><br/>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
<?php
}
?>