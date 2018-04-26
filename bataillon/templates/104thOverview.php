<tr>
	<td><?php echo $playerName; ?> - <?php echo $guild; ?></td>
	<td <?php echo matchesRequirement('Rey (Jedi Training)', $characters, 7, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Rey (Jedi Training)', $characters); ?></td>
	<td <?php echo matchesRequirement('Veteran Smuggler Han Solo', $characters, 5, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Veteran Smuggler Han Solo', $characters); ?></td>
	<td <?php echo matchesRequirement('Veteran Smuggler Chewbacca', $characters, 5, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Veteran Smuggler Chewbacca', $characters); ?></td>
	<td <?php echo matchesRequirement('BB-8', $characters, 7, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('BB-8', $characters); ?></td>
	<td <?php echo matchesRequirement('R2-D2', $characters, 7, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('R2-D2', $characters); ?></td>
	<td <?php echo matchesRequirement('Resistance Trooper', $characters, 7, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Resistance Trooper', $characters); ?></td>
	<td <?php echo matchesRequirement('Commander Luke Skywalker', $characters, 7, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Commander Luke Skywalker', $characters); ?></td>
	<td <?php echo matchesRequirement('Han Solo', $characters, 7, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Han Solo', $characters); ?></td>
	<td <?php echo matchesRequirement('Captain Han Solo', $characters, 5, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Captain Han Solo', $characters); ?></td>
	<td <?php echo matchesRequirement('Hoth Rebel Scout', $characters, 5, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Hoth Rebel Scout', $characters); ?></td>
	<td <?php echo matchesRequirement('Hoth Rebel Soldier', $characters, 5, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Hoth Rebel Soldier', $characters); ?></td>
	<td <?php echo matchesRequirement('Pao', $characters, 5, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Pao', $characters); ?></td>
	<td <?php echo matchesRequirement('General Veers', $characters, 5, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('General Veers', $characters); ?></td>
	<td <?php echo matchesRequirement('Colonel Starck', $characters, 5, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Colonel Starck', $characters); ?></td>
	<td <?php echo matchesRequirement('Shoretrooper', $characters, 5, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Shoretrooper', $characters); ?></td>
	<td <?php echo matchesRequirement('Death Trooper', $characters, 5, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Death Trooper', $characters); ?></td>
	<td <?php echo matchesRequirement('Snowtrooper', $characters, 7, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Snowtrooper', $characters); ?></td>
	<td <?php echo matchesRequirement('Grand Admiral Thrawn', $characters, 7, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Grand Admiral Thrawn', $characters); ?></td>
	<td <?php echo matchesRequirement('Chirrut Îmwe', $characters, 6, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Chirrut Îmwe', $characters); ?></td>
	<td <?php echo matchesRequirement('Baze Malbus', $characters, 6, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Baze Malbus', $characters); ?></td>
	<td <?php echo matchesRequirement('Asajj Ventress', $characters, 5, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Asajj Ventress', $characters); ?></td>
	<td <?php echo matchesRequirement('Mother Talzin', $characters, 5, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Mother Talzin', $characters); ?></td>
	<td <?php echo matchesRequirement('Old Daka', $characters, 5, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Old Daka', $characters); ?></td>
	<td <?php echo matchesRequirement('Talia', $characters, 5, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Talia', $characters); ?></td>
	<td <?php echo matchesRequirement('Nightsister Acolyte', $characters, 5, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Nightsister Acolyte', $characters); ?></td>
	<td <?php echo matchesRequirement('Nightsister Zombie', $characters, 5, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Nightsister Zombie', $characters); ?></td>
	<td <?php echo matchesRequirement('Nightsister Initiate', $characters, 5, 8) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasChar('Nightsister Zombie', $characters); ?></td>
	<td>&nbsp;</td>
	<td <?php echo matchesRequirement('Home One', $ships, 6) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasShip('Home One', $ships); ?></td>
	<td <?php echo matchesRequirement('Endurance', $ships, 6) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasShip('Endurance', $ships); ?></td>
	<td <?php echo matchesRequirement('Executrix', $ships, 6) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasShip('Executrix', $ships); ?></td>
	<td <?php echo matchesRequirement('Chimaera', $ships, 6) ? 'class="ready"' : 'class="notReady"'; ?>><?php echo hasShip('Chimaera', $ships); ?></td>
</tr>