const funs = [];
funs.push(nav_icon, bottom_scrollbar, toppings); // DOM load functions
document.addEventListener("DOMContentLoaded", () => { funs.forEach(f => f()); });

// Scrolls to last item in current orders
function bottom_scrollbar() {
	let order_row = document.getElementsByClassName('orders-row')[0];
	order_row.scrollTop = order_row.scrollHeight;
}

// Creates hamburger button
function nav_icon() {
	const nav_hamburger_icon = document.getElementsByClassName('nav-hamburger-icon')[0];
	let div_tag = document.createElement('div');
	nav_hamburger_icon.appendChild(div_tag);
	div_tag.className = "nav-icon";
	const num_of_lines = nav_hamburger_icon.getAttribute('nav-lines');
	for(let i = 0; i < parseInt(num_of_lines); i++) {
		let span_tag = document.createElement('span');
		document.getElementsByClassName('nav-icon')[0].appendChild(span_tag);
	}
}

function toppings() {
	let addon_extra = document.getElementsByClassName('addons-extras')[0];
	let topping = Array.from(addon_extra.querySelectorAll('.pos-btn-block input[type="checkbox"]'));

	let checked_arr = [];
	const map_top = topping.map((t, i) => {
		let addon_option = document.getElementsByClassName('addon-option')[i];
		let add_opt = document.getElementsByClassName('add-opt')[i];
		let addon_option_arr = Array.from(addon_extra.querySelectorAll('label div ul'));

		t.onclick = (event) => {
			checked_arr.push(t.value);
			const isFound = checked_arr.filter(item => t.checked = true);
			Array.from(addon_extra.querySelectorAll('li button')).map(btn => {
				btn.onclick = () => {
					if(btn.value != 0) {
						add_opt.textContent = "- " + btn.value.toUpperCase();
						addon_option_arr.map(ae => ae.classList.remove('show'));
					} else {
						add_opt.textContent = '';
						t.checked = false;
						addon_option_arr.map(ae => ae.classList.remove('show'));
					}
				}
			});
			let filtered = checked_arr.filter((item, index) => checked_arr.indexOf(item) === index); // Removes duplicate from an array
			addon_option_arr.map(ae => ae.classList.remove('show'));
			addon_option.classList.add('show');
		}

	});

	// topping.forEach((ae, i) => {
	// 	let add_opt = document.getElementsByClassName('add-opt')[i];
	// 	let addon_option = document.getElementsByClassName('addon-option')[i];
	// 	ae.onclick = (e) => {
	// 		addon_option.classList.add('show');
	// 		addon_option.querySelectorAll('button').forEach((ab, i) => {
	// 			ab.onclick = () => {
	// 				if(ab.value != 0) {
	// 					add_opt.textContent = " - " + ab.value.toUpperCase();
	// 					addon_option.classList.remove('show');
	// 					ae.checked = true;
	// 				} else {
	// 					add_opt.textContent = "";
	// 					addon_option.classList.remove('show');
	// 					ae.checked = false;
	// 				}
	// 			}
	// 		});
	// 	}
	// });

}