const getData = async(id) => {
	let response = await fetch(`http://127.0.0.1:8000/ofer/${id}`);
    let data = await response.json();
	console.log(data);
	printPokemon(data);
}

const printPokemon = (data) => {
	let card = document.createElement("div");
	card.classList.add("pokemon");
	poke_container.appendChild(card);
	
	let type = data.types[0].type.name;
	let cardBackground = colors[type];
	card.style.backgroundColor = cardBackground
	


	let cardInfo =
		`<div class="img-container">
			<img src= "http://127.0.0.1:8000/${data.image}" alt=${data.companyName}>
		</div>
		<div class="info">
            <h3 class="name">${data.companyName}</h3>
			<span class="number">${data.positionTitle}</span>
			<small class="type">Modalidad: ${data.employmentMode}<span></span></small>
		</div>`;
	
	card.innerHTML = cardInfo;
}

pokeIterator();