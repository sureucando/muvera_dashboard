<table>
	<thead>
		<tr>
			<th>Media</th><th>Counter</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($count_data as $object) {echo '<tr><td>Okezone</td><td>' . $object->total . '</td></tr>';} ?>	
	</tbody>
</table>