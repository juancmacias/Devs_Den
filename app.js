const getData = async(id) => {
	let response = await fetch(`http://127.0.0.1:8000/ofer/jobpositions`);
    let data = await response.json();
	console.log(data);
	printPokemon(data);
}

const printPokemon = (data) => {
	const poke_container = document.getElementById('poke-container');
	let card = document.createElement("div");
	let cardInfo = '';
	for (let i = 0; i < data.length; i++) {
		
			card.classList.add("pokemon");
			poke_container.appendChild(card);
			
			cardInfo +=
				`<div class="img-container">
					<img src="http://127.0.0.1:8000/${data[i].image}" alt=${data[i].companyName}>
				</div>
				<div class="info">
					<a href="detail.html?id=${data[i].id}" title="${data[i].positionTitle}" target="_top">
						<span class="number">${data[i].positionTitle}</span>
					</a>
					<h3 class="name">${data[i].companyName}</h3>
					<small class="type">Modalidad: ${data[i].employmentMode}<span></span></small>
				</div>`;
		console.log("id "+ data[i].id);
	  }
	
	
	
	card.innerHTML = cardInfo;

}

getData(6);