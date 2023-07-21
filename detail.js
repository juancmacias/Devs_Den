const getData = async() => {
	let params = new URLSearchParams(location.search);
	var id = params.get('id');

     console.log(id);
	let response = await fetch(`http://127.0.0.1:8000/ofer/${id}`);
    let data = await response.json();
	console.log(data);
	printJobDetail(data);
}

const printJobDetail = (data) => {
	const jobDetail = document.getElementById('jobDetail');
	let card = document.createElement("div");
	let cardInfo = '';

		
			card.classList.add("detailCard");
			jobDetail.appendChild(card);
			
			cardInfo =
				`<img class="jobImage" src="http://127.0.0.1:8000/${data.image}" alt=${data.companyName}>
				<div class="info">
					<div class="status">
						<img class="" src="./images/alert.png" alt="Alert" title="Alerts">
						<img class="" src="./images/favorito.png" alt="Favorito" title="Add to favorites">
					</div>
					<h3 class="positionTitle">${data.positionTitle}</h3>
					<h3 class="companyName">${data.companyName}</h3>
					<a href="${data.website}" class="companyName">${data.website}</a>
                    <p class="companyDescription">${data.description}</p>
                    <p class="positionDescription">${data.positionDescription}</p>
                    <p class="requirements">${data.requirements}</p>
                    <p class="salary">${data.salary}</p>
					<p class="employmentMode">Modalidad: ${data.employmentMode}<p>
				</div>`;
		console.log("id "+ data.id);

	
	
	
	card.innerHTML = cardInfo;

}

getData();

