<ul>
	<?php if (!empty($result)) {
		print_r($result);
		foreach ($result as $row):?>
			<li>
				<a href="/answer/<?= $row["id"];?>"><?= $row["text"];?></a>
			</li>
		<?php endforeach;
	} ?>
</ul>
