<ul>
	<?php if (!empty($result)) {
		foreach ($result as $row):?>
			<li>
				<?= $row["text"];?>
			</li>
		<?php endforeach;
	} ?>
</ul>
