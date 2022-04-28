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
	let topping = addon_extra.querySelectorAll('.pos-btn-block input[type="checkbox"]');
	const map_top = Array.from(topping).map((t, i) => {
		let addon_option = document.getElementsByClassName('addon-option')[i];
		let add_opt = document.getElementsByClassName('add-opt')[i];
		let addon_option_arr = Array.from(addon_extra.querySelectorAll('label div ul')); 
		t.onclick = (event) => {
			t.checked = add_opt.textContent ? true : false; // Check only if ADD, EXTRA or SIZE is chosen
			Array.from(addon_extra.querySelectorAll('li button')).map(btn => {
				btn.onclick = (e) => {
					addon_option_arr.map(ae => ae.classList.remove('show'));
					t.checked = true;  
					if(btn.value != 0) {
						add_opt.textContent = "- " + btn.value.toUpperCase();
					} else {
						add_opt.textContent = '';
						t.checked = false;
					}
				}
			});
			addon_option_arr.map(ae => ae.classList.remove('show'));
			addon_option.classList.add('show');
		}
	});
}