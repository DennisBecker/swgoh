<div class="row">
	<h4 class="col-12"><?php echo $playerName; ?> - <?php echo $guild; ?></h4>

	<div class="col-3">
		<h5>Characters of Interest</h5>
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
			<?php echo character('Rey (Jedi Training)', $characters); ?>
			<?php echo character('Veteran Smuggler Chewbacca', $characters); ?>
			<?php echo character('Veteran Smuggler Han Solo', $characters); ?>
			<?php echo character('Death Trooper', $characters); ?>
			</tbody>
		</table>

		<h5>Ships of Interest</h5>
		<table class="table">
			<thead>
			<tr>
				<th>Character</th>
				<th>Star</th>
				<th>Level</th>
				<th>Ready?</th>
			</tr>
			</thead>
			<tbody>
			<?php echo ship('Home One', $ships); ?>
			<?php echo ship('Endurance', $ships); ?>
			<?php echo ship('Executrix', $ships); ?>
			<?php echo ship('Chimaera', $ships); ?>
			</tbody>
		</table>
	</div>

	<div class="col-3">
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

		<h6>Rogue One</h6>
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

		<h6>Phoenix</h6>
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
			<?php echo character('Garazeb "Zeb" Orrelios', $characters); ?>
			<?php echo character('Ezra Bridger', $characters); ?>
			<?php echo character('Chopper', $characters); ?>
			<?php echo character('Sabine Wren', $characters); ?>
			<?php echo character('Kanan Jarrus', $characters); ?>
			</tbody>
		</table>
	</div>

	<div class="col-3">
		<h5>Dark Side Territory Battle</h5>
		<h6>Imperial Trooper</h6>
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

		<h6>Bounty Hunter</h6>
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
			<?php echo character('Boba Fett', $characters); ?>
			<?php echo character('Cad Bane', $characters); ?>
			<?php echo character('Dengar', $characters); ?>
			<?php echo character('Greedo', $characters); ?>
			<?php echo character('IG-88', $characters); ?>
			<?php echo character('Zam Wesell', $characters); ?>
			</tbody>
		</table>

		<h6>Empire</h6>
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
			<?php echo character('Emperor Palpatine', $characters); ?>
			<?php echo character('Darth Vader', $characters); ?>
			<?php echo character('Grand Admiral Thrawn', $characters); ?>
			<?php echo character('Grand Moff Tarkin', $characters); ?>
			<?php echo character('Imperial Probe Droid', $characters); ?>
			<?php echo character('TIE Fighter Pilot', $characters); ?>
			<?php echo character('Royal Guard', $characters); ?>
			<?php echo character('Gar Saxon', $characters); ?>
			<?php echo character('Imperial Super Commando', $characters); ?>
			<?php echo character('Director Krennic', $characters); ?>
			</tbody>
		</table>
	</div>

	<div class="col-3">
		<h5>Sith Raid</h5>
		<h6>P1 / P4 - JTR (R2 or Visas Marr)</h6>
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
			<?php echo character('Rey (Jedi Training)', $characters); ?>
			<?php echo character('BB-8', $characters); ?>
			<?php echo character('R2-D2', $characters); ?>
			<?php echo character('Visas Marr', $characters); ?>
			<?php echo character('Rey (Scavenger)', $characters); ?>
			<?php echo character('Resistance Trooper', $characters); ?>
			</tbody>
		</table>

		<h6>P1 - Detonators</h6>
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
			<?php echo character('Grand Admiral Thrawn', $characters); ?>
			<?php echo character('Hera Syndulla', $characters); ?>
			<?php echo character('First Order Officer', $characters); ?>
			<?php echo character('Ewok Elder', $characters); ?>
			<?php echo character('Jawa Engineer', $characters); ?>
			</tbody>
		</table>

		<h6>P2 - CLS</h6>
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
			<?php echo character('Hermit Yoda', $characters); ?>
			<?php echo character('Scarif Rebel Pathfinder', $characters); ?>
			<?php echo character('Sabine Wren', $characters); ?>
			<?php echo character('Ezra Bridger', $characters); ?>
			</tbody>
		</table>

		<h6>P2 - Imperial Trooper</h6>
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
			<?php echo character('Grand Admiral Thrawn', $characters); ?>
			<?php echo character('Death Trooper', $characters); ?>
			<?php echo character('Shoretrooper', $characters); ?>
			<?php echo character('Colonel Starck', $characters); ?>
			</tbody>
		</table>

		<h6>P3 - CLS (Pao or Sabine)</h6>
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
			<?php echo character('Han Solo', $characters); ?>
			<?php echo character('Death Trooper', $characters); ?>
			<?php echo character('Pao', $characters); ?>
			<?php echo character('Sabine Wren', $characters); ?>
			<?php echo character('Chirrut Îmwe', $characters); ?>
			</tbody>
		</table>

		<h6>P4 - First Order</h6>
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
			<?php echo character('Kylo Ren (Unmasked)', $characters); ?>
			<?php echo character('First Order Stormtrooper', $characters); ?>
			<?php echo character('First Order Officer', $characters); ?>
			<?php echo character('First Order Executioner', $characters); ?>
			<?php echo character('First Order SF TIE Pilot', $characters); ?>
			</tbody>
		</table>

		<h6>P4 - Nightsisters</h6>
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
			<?php echo character('Asajj Ventress', $characters); ?>
			<?php echo character('Mother Talzin', $characters); ?>
			<?php echo character('Old Daka', $characters); ?>
			<?php echo character('Nightsister Acolyte', $characters); ?>
			<?php echo character('Nightsister Zombie', $characters); ?>
			</tbody>
		</table>
	</div>
</div>