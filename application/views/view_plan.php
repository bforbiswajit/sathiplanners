	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title">List of All Plans</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div><!-- /.box-tools -->
		</div><!-- /.box-header -->
                <div class="box-body">
                    <table class="display" id="planTable">
                        <thead>
                            <tr>
                                <th>File #</th>
                                <th>Type</th>
                                <th>Applicant</th>
                                <th>Registered On</th>
                                <th>RQP</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="planListingTable">
                            <?php
                                if(isset($data) && !empty($data)){
                                    for($i = 0; $i < count($data); $i++){
                                        echo "<tr id='" . $data[$i]->id . "'><td>" . $data[$i]->fileNo . "</td><td>" . $data[$i]->type . "</td><td>" . $data[$i]->applicant . "</td><td>" . $data[$i]->registeredOn->format('Y-m-d') . "</td><td>" . $data[$i]->rqp . "</td><td>" . $data[$i]->amount . "</td><td>" . $data[$i]->status . "</td></tr>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                    <script>$("#planTable").DataTable();</script>
                </div>
        </div>