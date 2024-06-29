window.onload = function() {
	let dropdown_class = 'oc-dropdown-menu';
	let bs_toggle = 'oc-dropdown';
	let bs_target = 'data-bs-auto-close="outside"';
	let aria_control = '';
	let padding_start = 'ps-3';
	let dropdown_toggle_class = 'oc-dropdown-toggle';
	document.getElementById('oc_main_menu').innerHTML = '<li>Loading Menu..</li>';
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
				dropdown_class = 'oc-dropdown-menu oc-dropdown-menu-mobile oc-accordion-collapse oc-collapse';
				bs_toggle = 'oc-collapse';
				bs_target = 'data-bs-target="#accordion_'+item.id+'"';
				aria_control = 'aria-controls="accordion_'+item.id+'"';
				padding_start = '';
			}
			if(item.subGroups.length == 0){
				bs_toggle = '';
				dropdown_toggle_class = '';
			}
		  str += '<li class="oc-nav-item oc-dropdown"><a title="'+item.description+'" class="oc-tooltip oc-navlink oc-nav-link '+dropdown_toggle_class+'" href="#" role="button" data-bs-toggle="'+bs_toggle+'" '+bs_target+' aria-expanded="false" '+aria_control+' data-gid="'+item.id+'">'+ item.title + '<span class="oc-tooltip-text">' + item.description +'</span></a>';

		  if(item.subGroups.length > 0){
			  const subGroup = item.subGroups;
			  str += '<ul id="accordion_'+item.id+'" class="tgsz '+dropdown_class+'"><div class="oc-row">';
			  subGroup.forEach(function(gItem) {
				  let groupTitle = gItem.title;
				  str += '<div class="oc-col">'
					  + '<li  class="'+padding_start+' border-bottom oc-pb-1 oc-mb-1 submenu-lvl1">'+groupTitle.toUpperCase()+' <i class="bi bi-caret-down-fill oc-float-end oc-pe-3 show"></i><i class="bi bi-caret-up-fill oc-float-end oc-pe-3"></i></li><ul class="submenu-lvl2">';
				  if(gItem.items.length > 0){
					 const items = gItem.items;
					  items.forEach(function(lnk) {
						  str += '<li><a title="'+lnk.description+'" class="oc-dropdown-item oc-tooltip" href="'+lnk.url+'">'+lnk.title+'<span class="oc-tooltip-text">' + lnk.description +'</span></a></li>';
					  }); 
				  }
				  str += '</div>';
			  });
			  str += '</div></ul>';
		  }
		  str += '</li>';
		});
		document.getElementById('oc_main_menu').innerHTML = str;



		const dropdownToggles = document.querySelectorAll('.oc-dropdown-toggle');
		const dropdownMenus = document.querySelectorAll('.oc-dropdown-menu');

		function handleMouseOver(event) {
			event.preventDefault();
			const dropdownMenu = this.nextElementSibling;
			dropdownMenu.classList.add('show');
			dropdownMenus.forEach(menu => {
				if (menu !== dropdownMenu) {
					menu.classList.remove('show');
				}
			});
			event.stopPropagation();
		}

		function handleMouseLeave(event) {
			const dropdownMenu = this.nextElementSibling;
			dropdownMenu.classList.remove('show');
		}

		function handleDropdownMouseEnter(event) {
			this.classList.add('show');
		}

		function handleDropdownMouseLeave(event) {
			this.classList.remove('show');
		}

		function handleClick(event) {
			event.preventDefault();
			const dropdownMenu = this.nextElementSibling;
			dropdownMenu.classList.toggle('show');
			dropdownMenus.forEach(menu => {
				if (menu !== dropdownMenu) {
					menu.classList.remove('show');
				}
			});
			event.stopPropagation();
		}

		function updateEventListeners() {
			dropdownToggles.forEach(toggle => {
				const dropdownMenu = toggle.nextElementSibling;

				// Remove all event listeners
				toggle.removeEventListener('mouseover', handleMouseOver);
				toggle.removeEventListener('mouseleave', handleMouseLeave);
				toggle.removeEventListener('click', handleClick);
				dropdownMenu.removeEventListener('mouseenter', handleDropdownMouseEnter);
				dropdownMenu.removeEventListener('mouseleave', handleDropdownMouseLeave);

				if (window.innerWidth > 1300) {
					// Add hover event listeners for larger screens
					toggle.addEventListener('mouseover', handleMouseOver);
					toggle.addEventListener('mouseleave', handleMouseLeave);
					dropdownMenu.addEventListener('mouseenter', handleDropdownMouseEnter);
					dropdownMenu.addEventListener('mouseleave', handleDropdownMouseLeave);
				} else {
					// Add click event listener for smaller screens
					toggle.addEventListener('click', handleClick);
				}
			});
		}

		// Initial setup
		updateEventListeners();

		// Update event listeners on window resize
		window.addEventListener('resize', updateEventListeners);


		function closeAllDropdowns() {
			dropdownMenus.forEach(menu => {
				menu.classList.remove('show');
			});
		}

		window.addEventListener('click', function(event) {
			if (!event.target.matches('.oc-dropdown-toggle')) {
				closeAllDropdowns();
			}
		});


		

		const dropdownToggle = document.querySelector('#oc_hamburger_menu .oc-navbar-toggler');
		const dropdownMenu = document.getElementById('oc-navbarTogglerDemo02');

		dropdownToggle.addEventListener('click', function() {
			dropdownMenu.classList.toggle('show');
		});

		$(document).ready(function(){
			$('.submenu-lvl1').click(function(){

				$(this).siblings('.submenu-lvl2').toggleClass('show');

				var biDownHasClass = $(this).find('.bi-caret-down-fill');
				if(biDownHasClass.hasClass('show')) {
					$(this).find('.bi-caret-down-fill').removeClass('show');
					$(this).find('.bi-caret-up-fill').addClass('show');
				} else {
					$(this).find('.bi-caret-down-fill').addClass('show');
					$(this).find('.bi-caret-up-fill').removeClass('show');
				}



				$(this).parents('.oc-dropdown-menu-mobile.oc-dropdown-menu').addClass('showMobile');


			});

			$('.navlink').click(function(){

				var mHasxClass = $(this).siblings('.oc-dropdown-menu-mobile');
				var mHasShowClass = $(this).siblings('.oc-dropdown-menu-mobile.showMobile');

				if(mHasShowClass.hasClass('showMobile')) {
					mHasShowClass.removeClass('show');
					mHasShowClass.removeClass('showMobile');
				} else {
					mHasShowClass.addClass('showMobile');
				}

				if(mHasxClass.hasClass('showMobile')) {

					$(this).removeClass('showMobile');

				} else {
					$(this).addClass('showMobile');

				}

				$(this).parent().siblings().find('.oc-dropdown-menu-mobile').removeClass('show showMobile');
				$(this).parent().siblings().find('.oc-dropdown-menu-mobile').find('.submenu-lvl2').removeClass('show');
			});



		});

		$(document).ready(function() {
			$('.oc-tooltip').hover(
				function() {
					$(this).find('.oc-tooltip-text').addClass('show');
				},
				function() {
					$(this).find('.oc-tooltip-text').removeClass('show');
				}
			);
		});


	});
  
}

window.onresize = function(event) {
	let dropdown = document.querySelectorAll('.tgsz');
	let navlink = document.querySelectorAll('.navlink');
	let search_box = document.getElementById('oc_search_box');
	
    if(window.screen.width > 980){// big screen
		search_box.classList.add('oc-d-flex');
		for (var i = 0; i < navlink.length;  i++) {		
			if (typeof dropdown[i] !== 'undefined'){
				dropdown[i].classList.add('oc-dropdown-menu');
				dropdown[i].classList.remove('oc-accordion-collapse','oc-collapse','show');
				navlink[i].setAttribute('data-bs-toggle', 'oc-dropdown');
			}
		}
		
	}else{
		search_box.classList.remove('oc-d-flex');
		for (var j = 0; j < navlink.length;  j++) {
			let gid = navlink[j].getAttribute('data-gid');
			if (typeof dropdown[j] !== 'undefined'){
				dropdown[j].classList.add('oc-accordion-collapse','oc-collapse');
				dropdown[j].classList.remove('oc-dropdown-menu');
				navlink[j].setAttribute('data-bs-toggle', 'oc-collapse');
			}
			
			navlink[j].setAttribute('data-bs-target', '#accordion_'+gid);
			navlink[j].setAttribute('aria-controls', 'accordion_'+gid);
		}	
	}
};

