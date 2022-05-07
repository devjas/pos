const multi_select_option = () => {

	const multi_select = document.getElementById('selectOption');

	let btn = document.createElement('button');
	btn.textContent = "Nothing is selected";
	btn.setAttribute('type', 'button');
	btn.className = "multi-select-btn";

	multi_select.after(btn); 

	let dropdown_parent = document.createElement('ul');
	dropdown_parent.className = "multi-dropdown"; 
	dropdown_parent.style.maxWidth = btn.clientWidth + 'px';

	const option_array = Array.from(multi_select); 

	option_array.map(o => {
		const dropdown_children = document.createElement('li');
		dropdown_children.innerHTML = o.textContent + "<i class='fas fa-check'></i>";
		dropdown_children.setAttribute('id', o.value);
		dropdown_parent.append(dropdown_children);
	});

	btn.after(dropdown_parent);

	const li_elements = Array.from(dropdown_parent.querySelectorAll('li'));

	let selected_array = [];

	option_array.map((o, i) => {

		if(o.hasAttribute('selected')) {

			selected_array.push(o.textContent);

			btn.textContent = selected_array;

		} else {

			btn.textContent = 'Nothing is selected';

		}

	});

	const a = li_elements.map((l, i) => {

		if(selected_array.includes(l.textContent)) {

			l.classList.add('highlighted');

			document.getElementsByClassName('fa-check')[i].classList.add('show');

		}

		l.onclick = (e) => {

			l.classList.toggle('highlighted');

			let svgs = document.getElementsByClassName('fa-check')[i];

			svgs.classList.toggle('show');

			option_array.map(o => {

				if(o.textContent == l.textContent) {

					o.toggleAttribute('selected');

					if(o.hasAttribute('selected')) {

						if(!selected_array.includes(l.textContent)) {

							selected_array.push(o.textContent);
							
							btn.textContent = selected_array;

						}

					} else {

						selected_array.splice(selected_array.indexOf(l.textContent), 1);

						if(selected_array.length == 0) {

							btn.textContent = 'Nothing is selected';

						} else {

							btn.textContent = selected_array;

						}
						
					}

				}

			});

		}

	});

	btn.onclick = () => {
		dropdown_parent.classList.toggle('show');
	}
}

document.addEventListener('DOMContentLoaded', multi_select_option);


