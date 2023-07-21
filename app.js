const getData = async(id) => {
	let response = await fetch(`http://127.0.0.1:8000/ofer/jobpositions`);
    let data = await response.json();
	console.log(data);
	printCards(data);
}

const printCards = (data) => {

	let cardInfo = '';
	for (let i = 0; i < data.length; i++) {			
			cardInfo +=
				`
				<div class="card-complete">

                    <div class="img-container">
					<img src="http://127.0.0.1:8000/${data[i].image}" alt=${data[i].companyName}>
                    </div>
                    <div class="info">
					<a href="detail.html?id=${data[i].id}" title="${data[i].positionTitle}" target="_top">
                            <h3 class="job-title">${data[i].positionTitle}</h3>
                        </a>
                        <h3 class="name">${data[i].companyName}</h3>
                        <small class="type">Modalidad: <br> ${data[i].employmentMode}<span></span></small>
                    </div>
                </div>
				`;
		console.log("id "+ data[i].id);
	  }
	  document.getElementById('cards-container').innerHTML = cardInfo;
}

getData(6);

function myFunction() {
	var input = document.getElementById("Search");
	var filter = input.value.toLowerCase();
	var nodes = document.getElementsByClassName('card-complete');
  
	for (i = 0; i < nodes.length; i++) {
	  if (nodes[i].innerText.toLowerCase().includes(filter)) {
		nodes[i].style.display = "flex";
		document.getElementsByClassName('bannerContainer')[0].style.height = "450px"
	  } else {
		nodes[i].style.display = "none";

	  }
	}
  }