<div class="row">
	<h4 class="col-12"><?php echo $playerName; ?> - <?php echo $guild; ?></h4>

	<div class="col-3">
		<h5>Phase 1</h5>
		<h6>JTR (R2 or Visas Marr or Barriss)</h6>
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
			<?php echo heroicCharacter('Rey (Jedi Training)', $characters); ?>
			<?php echo heroicCharacter('BB-8', $characters); ?>
			<?php echo heroicCharacter('Resistance Trooper', $characters); ?>
			<?php echo heroicCharacter('Rey (Scavenger)', $characters); ?>
			<?php echo heroicCharacter('R2-D2', $characters); ?>
			<?php echo heroicCharacter('Visas Marr', $characters); ?>
			<?php echo heroicCharacter('Barriss Offee', $characters); ?>
			</tbody>
		</table>

		<h6>Detonators</h6>
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
			<?php echo heroicCharacter('Grand Admiral Thrawn', $characters); ?>
			<?php echo heroicCharacter('Hera Syndulla', $characters); ?>
			<?php echo heroicCharacter('First Order Officer', $characters); ?>
			<?php echo heroicCharacter('Ewok Elder', $characters); ?>
			<?php echo heroicCharacter('Jawa Engineer', $characters); ?>
			</tbody>
		</table>
	</div>

	<div class="col-3">
		<h5>Phase 2</h5>

		<h6>CLS (Ezra oder Leia)</h6>
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
			<?php echo heroicCharacter('Commander Luke Skywalker', $characters); ?>
			<?php echo heroicCharacter('Hermit Yoda', $characters); ?>
			<?php echo heroicCharacter('Scarif Rebel Pathfinder', $characters); ?>
			<?php echo heroicCharacter('Sabine Wren', $characters); ?>
			<?php echo heroicCharacter('Ezra Bridger', $characters); ?>
			<?php echo heroicCharacter('Princess Leia', $characters); ?>
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
			<?php echo character('Sabine Wren', $characters); ?>
			<?php echo character('Kanan Jarrus', $characters); ?>
			</tbody>
		</table>

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
			<?php echo heroicCharacter('General Veers', $characters); ?>
			<?php echo heroicCharacter('Grand Admiral Thrawn', $characters); ?>
			<?php echo heroicCharacter('Death Trooper', $characters); ?>
			<?php echo heroicCharacter('Shoretrooper', $characters); ?>
			<?php echo heroicCharacter('Colonel Starck', $characters); ?>
			</tbody>
		</table>

		<h6>Sith</h6>
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
			<?php echo heroicCharacter('Emperor Palpatine', $characters); ?>
			<?php echo heroicCharacter('Darth Vader', $characters); ?>
			<?php echo heroicCharacter('Darth Nihilus', $characters); ?>
			<?php echo heroicCharacter('Darth Sion', $characters); ?>
			<?php echo heroicCharacter('Grand Admiral Thrawn', $characters); ?>
			</tbody>
		</table>

	</div>

	<div class="col-3">
		<h5>Phase 3</h5>

		<h6>CLS (Pao or Sabine)</h6>
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
			<?php echo heroicCharacter('Commander Luke Skywalker', $characters); ?>
			<?php echo heroicCharacter('Han Solo', $characters); ?>
			<?php echo heroicCharacter('Death Trooper', $characters); ?>
			<?php echo heroicCharacter('Pao', $characters); ?>
			<?php echo heroicCharacter('Sabine Wren', $characters); ?>
			<?php echo heroicCharacter('Chirrut Îmwe', $characters); ?>
			</tbody>
		</table>

	</div>

	<div class="col-3">
		<h5>Phase 4</h5>

		<h6>JTR (R2 or Visas Marr or Barris)</h6>
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
			<?php echo heroicCharacter('Rey (Jedi Training)', $characters); ?>
			<?php echo heroicCharacter('BB-8', $characters); ?>
			<?php echo heroicCharacter('Rey (Scavenger)', $characters); ?>
			<?php echo heroicCharacter('Resistance Trooper', $characters); ?>
			<?php echo heroicCharacter('R2-D2', $characters); ?>
			<?php echo heroicCharacter('Visas Marr', $characters); ?>
			<?php echo heroicCharacter('Barriss Offee', $characters); ?>
			</tbody>
		</table>

		<h6>First Order</h6>
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
			<?php echo heroicCharacter('Kylo Ren (Unmasked)', $characters); ?>
			<?php echo heroicCharacter('First Order Stormtrooper', $characters); ?>
			<?php echo heroicCharacter('First Order Officer', $characters); ?>
			<?php echo heroicCharacter('First Order Executioner', $characters); ?>
			<?php echo heroicCharacter('First Order SF TIE Pilot', $characters); ?>
			</tbody>
		</table>

		<h6>Nightsisters</h6>
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
			<?php echo heroicCharacter('Asajj Ventress', $characters); ?>
			<?php echo heroicCharacter('Mother Talzin', $characters); ?>
			<?php echo heroicCharacter('Old Daka', $characters); ?>
			<?php echo heroicCharacter('Nightsister Acolyte', $characters); ?>
			<?php echo heroicCharacter('Nightsister Zombie', $characters); ?>
			</tbody>
		</table>
	</div>
</div>