$(document).ready(function() {
	loadCharacters();
});

function loadCharacters() {
	$.ajax('./data/characters.json')
	.done(function (data) {
		displayCharacterData(data);
	});
}

function displayCharacterData(data) {
	const characterData = $('#characterData');

	let characterMods = [];
	$.each(data, function (name, character) {
		let stringify = '<h3>' + name + '</h3>';
		stringify += '<table>';
		stringify += '<thead><tr><th>Square</th><th>Arrow</th><th>Diamond</th><th>Triangle</th><th>Circle</th><th>Plus</th></tr></thead>'
		stringify += '<tbody>';

		$.each(character, function(index, mods) {
			for (let i = 0; i < 5; i++) {
				stringify += '<tr>';
				stringify += '<td><strong>' + getModName(mods.slot1[i]) + '</strong> '+ getModCount(mods.slot1[i]) +'<br>' + getModPrimary(mods.slot1[i]) + '</td>';
				stringify += '<td><strong>' + getModName(mods.slot2[i]) + '</strong> '+ getModCount(mods.slot2[i]) +'<br>' + getModPrimary(mods.slot2[i]) + '</td>';
				stringify += '<td><strong>' + getModName(mods.slot3[i]) + '</strong> '+ getModCount(mods.slot3[i]) +'<br>' + getModPrimary(mods.slot3[i]) + '</td>';
				stringify += '<td><strong>' + getModName(mods.slot4[i]) + '</strong> '+ getModCount(mods.slot4[i]) +'<br>' + getModPrimary(mods.slot4[i]) + '</td>';
				stringify += '<td><strong>' + getModName(mods.slot5[i]) + '</strong> '+ getModCount(mods.slot5[i]) +'<br>' + getModPrimary(mods.slot5[i]) + '</td>';
				stringify += '<td><strong>' + getModName(mods.slot6[i]) + '</strong> '+ getModCount(mods.slot6[i]) +'<br>' + getModPrimary(mods.slot6[i]) + '</td>';
				stringify += '</tr>';
			}
		});

		stringify += '</tbody>';
		stringify += '</table>';

		characterMods.push(stringify);
	});

	characterData.html(characterMods.join(''));
}

function getModName(mod) {
	if (typeof mod === 'undefined') {
		return '';
	}

	return mod.name;
}

function getModPrimary(mod) {
	if (typeof mod === 'undefined') {
		return '';
	}

	return mod.primary;
}

function getModCount(mod) {
	if (typeof mod === 'undefined') {
		return '';
	}

	return '(' + mod.count + ')';
}
