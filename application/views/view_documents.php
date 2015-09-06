	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title">List of All Documents</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div><!-- /.box-tools -->
		</div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Total Received</th>
                                <th>Total Pending</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody id="documentListingTable">
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
                </div>
        </div>

<?php
$data = $this->session->userdata();
$data['err_msg_view_document'] = "";
$data['success_msg_view_document'] = "";
$this->session->set_userdata($data);
?>