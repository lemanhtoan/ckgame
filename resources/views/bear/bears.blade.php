<h2>List all bears</h2>

<?php 
// foreach ($bears->trees as $tree)
//         echo $tree->type . ' ' . $tree->age . '<br>';
?>

<p>{!! $bears->id !!}</p>
<p>{!! $bears->name !!}</p>
<p>{!! $bears->type !!}</p>
<p>{!! $bears->danger_level !!}</p>
<p>{!! $bears->fish->weight !!}</p>
<?php //echo "<pre>"; var_dump($bears);?>
{{-- @foreach ($bears as $bear)
	<?php echo "<pre>"; var_dump($bear);?>
@endforeach --}}