	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title">List of Mines</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div><!-- /.box-tools -->
		</div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>File #</th>
                                <th>Area</th>
                                <th>Lease Type</th>
                                <th>District</th>
                                <th>Mouza</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody id="minesListingTable">
                            <?php
                                if(isset($data) && !empty($data)){
                                    for($i = 0; $i < count($data); $i++){
                                        //echo $data[$i]->id . "\n<br/>";
                                        echo "<tr id='" . $data[$i]->id . "'><td>" . $data[$i]->fileNo . "</td><td>" . $data[$i]->area . "</td><td>" . $data[$i]->leasType . "</td><td>" . $data[$i]->district . "</td><td>" . $data[$i]->mouza . "</td><td>" . $data[$i]->notes . "</td></tr>";
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