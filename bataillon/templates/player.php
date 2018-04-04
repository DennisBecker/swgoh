<div class="row">
	<h4 class="col-12"><?php echo $playerName; ?> - <?php echo $guild; ?></h4>
	<div class="col-4">
		<h5>Light Side Territory Battle</h5>
		<h6>Event Characters</h6>
		<table class="table">
			<thead>
			<tr>
				<th>Character</th>
				<th>Star</th>
				<th>Level</th>
				<th>Gear</th>
				<th>Ready?</th>
			</tr>
			</thead>
			<tbody>
			<?php echo character('Commander Luke Skywalker', $characters); ?>
			<?php echo character('Captain Han Solo', $characters); ?>
			<?php echo character('Hoth Rebel Scout', $characters); ?>
			<?php echo character('Hoth Rebel Soldier', $characters); ?>
			<?php echo character('Rebel Officer Leia Organa', $characters); ?>
			</tbody>
		</table>

		<h5>Rogue One</h5>
		<table class="table">
			<thead>
			<tr>
				<th>Character</th>
				<th>Star</th>
				<th>Level</th>
				<th>Gear</th>
				<th>Ready?</th>
			</tr>
			</thead>
			<tbody>
				<?php echo character('Jyn Erso', $characters); ?>
				<?php echo character('Chirrut Îmwe', $characters); ?>
				<?php echo character('Baze Malbus', $characters); ?>
				<?php echo character('Cassian Andor', $characters); ?>
				<?php echo character('K-2SO', $characters); ?>
				<?php echo character('Bistan', $characters); ?>
				<?php echo character('Scarif Rebel Pathfinder', $characters); ?>
				<?php echo character('Pao', $characters); ?>
			</tbody>
		</table>

		<h5>Phoenix</h5>
		<table class="table">
			<thead>
			<tr>
				<th>Character</th>
				<th>Star</th>
				<th>Level</th>
				<th>Gear</th>
				<th>Ready?</th>
			</tr>
			</thead>
			<tbody>
			<?php echo character('Hera Syndulla', $characters); ?>
			<?php echo character('Garazeb "Zeb" Orrelio', $characters); ?>
			<?php echo character('Ezra Bridger', $characters); ?>
			<?php echo character('Chopper', $characters); ?>
			<?php echo character('Sabine Wren', $characters); ?>
			<?php echo character('Kanan Jarrus', $characters); ?>
			</tbody>
		</table>
	</div>

	<div class="col-4">
		<h4>Dark Side Territory Battle</h4>
		<h5>Imperial Trooper</h5>
		<table class="table">
			<thead>
			<tr>
				<th>Character</th>
				<th>Star</th>
				<th>Level</th>
				<th>Gear</th>
				<th>Ready?</th>
			</tr>
			</thead>
			<tbody>
			<?php echo character('General Veers', $characters); ?>
			<?php echo character('Colonel Starck', $characters); ?>
			<?php echo character('Death Trooper', $characters); ?>
			<?php echo character('Shoretrooper', $characters); ?>
			<?php echo character('Magmatrooper', $characters); ?>
			<?php echo character('Snowtrooper', $characters); ?>
			<?php echo character('Stormtrooper', $characters); ?>
			</tbody>
		</table>
	</div>

	<div class="col-4">
		<h4>Sith Raid</h4>
		<table class="table">
			<thead>
			<tr>
				<th>Character</th>
				<th>Star</th>
				<th>Level</th>
				<th>Gear</th>
				<th>Ready?</th>
			</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>