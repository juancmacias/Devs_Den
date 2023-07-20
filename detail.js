const getData = async() => {
	let params = new URLSearchParams(location.search);
	var id = params.get('id');
     //Se realiza la división de la URL
     //var split = actual.split("/");
     //Se obtiene el ultimo valor de la URL
     //var id = split[split.length-1];
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
			
			cardInfo +=
				`<div class="img-container">
					<img src="http://127.0.0.1:8000/${data.image}" alt=${data.companyName}>
				</div>
				<div class="info">
					
						<span class="positionTitle">${data.positionTitle}</span>

					<h3 class="companyName">${data.companyName}</h3>
                    <p class="companyDescription">${data.description}</p>
                    <p class="positionDescription">${data.positionDescription}</p>
                    <p class="requirements">${data.requirements}</p>
                    <p class="salary">${data.salary}</p>
					<small class="employmentMode">Modalidad: ${data.employmentMode}<span></span></small>
				</div>`;
		console.log("id "+ data.id);

	
	
	
	card.innerHTML = cardInfo;

}

getData();

