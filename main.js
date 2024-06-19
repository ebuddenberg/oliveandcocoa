window.onload = function() {
	let dropdown_class = 'dropdown-menu';
	let bs_toggle = 'dropdown';
	let bs_target = 'data-bs-auto-close="outside"';
	let aria_control = '';
	let padding_start = 'ps-3';
	let dropdown_toggle_class = 'dropdown-toggle';
	document.getElementById('main_menu').innerHTML = '<li>Loading Menu..</li>';
fetch('https://oc-api.com/api/nav/items',{
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
	  'username':'EverettDev',
	  'token':'lBKZK1BcBRlOTnSxIlug6MhXKHmvETJl8AgcwOnUBORtySWkfkdEUhlD3rIO'
    }
	})
  .then(response => response.json())
  .then(jsonResponse => {
		const groups = jsonResponse.groups;
		let str = '';
		groups.forEach(function(item) {
			if(window.screen.width < 981){
				dropdown_class = 'accordion-collapse collapse';
				bs_toggle = 'collapse';
				bs_target = 'data-bs-target="#accordion_'+item.id+'"';
				aria_control = 'aria-controls="accordion_'+item.id+'"';
				padding_start = '';
			}
			if(item.subGroups.length == 0){
				bs_toggle = '';
				dropdown_toggle_class = '';
			}
		  str += '<li class="nav-item dropdown"><a class="navlink nav-link '+dropdown_toggle_class+'" href="#" role="button" data-bs-toggle="'+bs_toggle+'" '+bs_target+' aria-expanded="false" '+aria_control+' data-gid="'+item.id+'">'+ item.title + '</a>';
		  if(item.subGroups.length > 0){
			  const subGroup = item.subGroups;
			  str += '<ul id="accordion_'+item.id+'" class="tgsz '+dropdown_class+'"><div class="row">';
			  subGroup.forEach(function(gItem) {
				  let groupTitle = gItem.title;
				  str += '<div class="col"><li class="'+padding_start+' border-bottom pb-1 mb-1">'+groupTitle.toUpperCase()+'</li>';
				  if(gItem.items.length > 0){
					 const items = gItem.items;
					  items.forEach(function(lnk) {
						  str += '<li><a class="dropdown-item" href="#1">'+lnk.title+'</a></li>';
					  }); 
				  }
				  str += '</div>';
			  });
			  str += '</div></ul>';
		  }
		  str += '</li>';
		});
		document.getElementById('main_menu').innerHTML = str;

		const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
		const dropdownMenus = document.querySelectorAll('.dropdown-menu');

		function closeAllDropdowns() {
			dropdownMenus.forEach(menu => {
				menu.classList.remove('show');
			});
		}

		dropdownToggles.forEach(toggle => {
			toggle.addEventListener('click', function(event) {
				event.preventDefault();

				const dropdownMenu = toggle.nextElementSibling;

				dropdownMenu.classList.toggle('show');

				dropdownMenus.forEach(menu => {
					if (menu !== dropdownMenu) {
						menu.classList.remove('show');
					}
				});

				event.stopPropagation();
			});
		});

		window.addEventListener('click', function(event) {
			if (!event.target.matches('.dropdown-toggle')) {
				closeAllDropdowns();
			}
		});


		const dropdownToggle = document.querySelector('#hamburger_menu .navbar-toggler');
		const dropdownMenu = document.getElementById('navbarTogglerDemo02');

		dropdownToggle.addEventListener('click', function() {
			dropdownMenu.classList.toggle('show');
		});

  });
  
}

window.onresize = function(event) {
	let dropdown = document.querySelectorAll('.tgsz');
	let navlink = document.querySelectorAll('.navlink');
	let search_box = document.getElementById('search_box');
	
    if(window.screen.width > 980){// big screen
		search_box.classList.add('d-flex');
		for (var i = 0; i < navlink.length;  i++) {		
			if (typeof dropdown[i] !== 'undefined'){
				dropdown[i].classList.add('dropdown-menu');
				dropdown[i].classList.remove('accordion-collapse','collapse','show');
				navlink[i].setAttribute('data-bs-toggle', 'dropdown');
			}
		}
		
	}else{
		search_box.classList.remove('d-flex');
		for (var j = 0; j < navlink.length;  j++) {
			let gid = navlink[j].getAttribute('data-gid');
			if (typeof dropdown[j] !== 'undefined'){
				dropdown[j].classList.add('accordion-collapse','collapse');
				dropdown[j].classList.remove('dropdown-menu');
				navlink[j].setAttribute('data-bs-toggle', 'collapse');
			}
			
			navlink[j].setAttribute('data-bs-target', '#accordion_'+gid);
			navlink[j].setAttribute('aria-controls', 'accordion_'+gid);
		}	
	}
};
