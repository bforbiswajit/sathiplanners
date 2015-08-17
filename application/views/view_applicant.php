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