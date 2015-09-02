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
                    <div class="alert alert-danger alert-dismissable" role="alert" id="mineAddForm_danger">
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
                        <label for="degLat" style="color:#707075; font-family:Times New Roman, Arial; font-size:1.5em;">Lat-Long :: </label><br/>
                        <div id="lattitude" style="float:left;">
                            <input type="text" id="degLat" name="degLat" class="form-control" size="2" style="width:3em; display:inline;" title="Degree" alt="Degree" placeholder="D" pattern="[0-9]{1,2}">
                            <input type="text" size="2" style="width:3em; display:inline;" id="minLat" name="minLat" class="form-control" title="Minute" alt="Minute" placeholder="M" pattern="[0-9]{1,2}">
                            <input type="text" id="secLat" name="secLat" class="form-control" size="2" style="width:3em; display:inline;" title="Second" alt="Second" placeholder="S" pattern="[0-9]{1,2}">
                            <select id="hemiLat" name="hemiLat" class="form-control" style="width:4.5em; display:inline;">
                                <option value="N">N</option>
                                <option value="S">S</option>
                            </select>
                        </div>
                        <div id="longitude" style="display:inline; margin:0 2em 0 3em;">
                            <input type="text" id="degLng" name="degLng" size="2" style="width:3em; display:inline;" class="form-control" title="Degree" alt="Degree" placeholder="D" pattern="[0-9]{1,2}">
                            <input type="text" id="minLng" name="minLng" size="2" style="width:3em; display:inline;" class="form-control" title="Minute" alt="Minute" placeholder="M" pattern="[0-9]{1,2}">
                            <input type="text" id="secLng" name="secLng" size="2" style="width:3em; display:inline;" class="form-control" title="Second" alt="Second" placeholder="S" pattern="[0-9]{1,2}">
                            <select id="hemiLng" name="hemiLng" class="form-control" style="width:4.5em; display:inline;">
                                <option value="E">E</option>
                                <option value="W">W</option>
                            </select>
                        </div><br/><br/>
                        <div class="input-group">
                            Notes/Remarks(Optional) <br/><textarea name="notes" rows="5" cols="80"></textarea>
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
$data['err_msg_mine'] = "";
$data['success_msg_mine'] = "";
$this->session->set_userdata($data);
?>