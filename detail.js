const getData = async(id) => {
	let response = await fetch(`http://127.0.0.1:8000/ofer/${id}`);
    let data = await response.json();
	console.log(data);
	printJobDetail(data);
}

const printJobDetail = (data) => {
	const jobDetail = document.getElementById('jobDetail');
	let card = document.createElement("div");
	let cardInfo = '';
	for (let i = 0; i < data.length; i++) {
		
			card.classList.add("detailCard");
			jobDetail.appendChild(card);
			
			cardInfo +=
				`<div class="img-container">
					<img class="jobImage" src="http://127.0.0.1:8000/${data[i].image}" alt=${data[i].companyName}>
				</div>
				<div class="info">
					<a href="detail.html?id=${data[i].id}" title="${data[i].positionTitle}" target="_top">
						<span class="positionTitle">${data[i].positionTitle}</span>
					</a>
					<h3 class="companyName">${data[i].companyName}</h3>
                    <p class="website">${data[i].website}</p>
                    <p class="companyDescription">${data[i].description}</p>
                    <p class="positionDescription">${data[i].positionDescription}</p>
                    <p class="requirements">${data[i].requirements}</p>
                    <p class="salary">${data[i].salary}</p>
					<small class="employmentMode">Modalidad: ${data[i].employmentMode}<span></span></small>
				</div>`;
		console.log("id "+ data[i].id);
	  }
	
	
	
	card.innerHTML = cardInfo;

}

getData(6);

