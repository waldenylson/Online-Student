<?php //pr($dados); ?>
<div style="width:402px; height:585px; background-image:url(<?php echo Mapper::url('/images/top10.png'); ?>); margin:0 auto; margin-top:60px;">
	<table class="tabelaTop10" cellspacing="3">
		<tbody>
			<?php foreach($dados as $row) { ?>
			<tr>
				<td style="background-color:transparent;">
					<?php echo $row["aluno"]; ?>
				</td>
			</tr>			
			<?php } ?>
		</tbody>
	</table>
</div>