<table align="centre" class="table" id="check">
	<tr>
		<td>
			<div col-lg-4>
			<?php $k='A';$l='E'; $m =1; $n=4 ?>
			@for($i= $k;$i<=$l;$i++)
			    @for($j=$m;$j<=$n;$j++)
			        <td class="checkbox-inline" style="width:60px"><label id="{{ $i }}{{ $j }}-label"><input type="checkbox" name="{{ $i }}{{ $j }}" id="{{ $i }}{{ $j }}" />{{ $i }}{{ $j }}</label></td>
			    @endfor
			@endfor
			</div>
		</td>
		<td>
			<div col-lg-4>
			<?php $k='A';$l='E'; $m =5; $n=8 ?>
			@for($i= $k;$i<=$l;$i++)
			    @for($j=$m;$j<=$n;$j++)
			        <td class="checkbox-inline" style="width:60px"><label id="{{ $i }}{{ $j }}-label"><input type="checkbox" name="{{ $i }}{{ $j }}" id="{{ $i }}{{ $j }}" />{{ $i }}{{ $j }}</label></td>
			    @endfor
			@endfor
			</div>
		</td>
		<td>
			<div col-lg-4>
			<?php $k='A';$l='E'; $m =9; $n=13 ?>
			@for($i= $k;$i<=$l;$i++)
			    @for($j=$m;$j<=$n;$j++)
			        <td class="checkbox-inline" style="width:60px"><label id="{{ $i }}{{ $j }}-label"><input type="checkbox" name="{{ $i }}{{ $j }}" id="{{ $i }}{{ $j }}" />{{ $i }}{{ $j }}</label></td>
			    @endfor
			@endfor
			</div>
		</td>
	</tr>
</table>

<table align="centre" class="table" id="check">
<tr>
	<td>
		<div col-lg-4>
		<?php $k='F';$l='I'; $m =1; $n=4 ?>
		@for($i= $k;$i<=$l;$i++)
		    @for($j=$m;$j<=$n;$j++)
		        <td class="checkbox-inline" style="width:60px"><label id="{{ $i }}{{ $j }}-label"><input type="checkbox" name="{{ $i }}{{ $j }}" id="{{ $i }}{{ $j }}" />{{ $i }}{{ $j }}</label></td>
		    @endfor
		@endfor
		</div>
	</td>
	<td>
		<div col-lg-4>
		<?php $k='F';$l='I'; $m =5; $n=8 ?>
		@for($i= $k;$i<=$l;$i++)
		    @for($j=$m;$j<=$n;$j++)
		        <td class="checkbox-inline" style="width:60px"><label id="{{ $i }}{{ $j }}-label"><input type="checkbox" name="{{ $i }}{{ $j }}" id="{{ $i }}{{ $j }}" />{{ $i }}{{ $j }}</label></td>
		    @endfor
		@endfor
		</div>
	</td>
	<td>
		<div col-lg-4>
		<?php $k='F';$l='I'; $m =9; $n=13 ?>
		@for($i= $k;$i<=$l;$i++)
		    @for($j=$m;$j<=$n;$j++)
		        <td class="checkbox-inline" style="width:60px"><label id="{{ $i }}{{ $j }}-label"><input type="checkbox" name="{{ $i }}{{ $j }}" id="{{ $i }}{{ $j }}" />{{ $i }}{{ $j }}</label></td>
		    @endfor
		@endfor
		</div>
	</td>
</tr>
</table>
