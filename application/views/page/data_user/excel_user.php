		<?php
				header("Content-type: application/vnd.ms-excel");
				header("Content-Disposition: attachment; filename=Data User.xls");
				header("Pragma: no-cache");
				header("Expires: 0");
		?>
			<h2>DATA USER</h2>
		<table style="width:100%;text-alig:center" border="1">
			<thead>
					<tr>
						<th>Username</th>
					</tr>
			</thead>
			<tbody>
				<?php
					foreach ($data as $val){
						echo"
							<tr>
								<td>".$val['username']."</td>
							</tr>
						";
					}
				?>
			</tbody>
		</table>