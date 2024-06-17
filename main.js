window.onload = function() {
	let dropdown_class = 'dropdown-menu';
	let bs_toggle = 'dropdown';
	let bs_target = 'data-bs-auto-close="outside"';
	let aria_control = '';
	let padding_start = 'ps-3';
	
fetch('menu.json')
  .then(response => response.json())
  .then(jsonResponse => {
		const groups = jsonResponse.groups;
		let str = '';
		groups.forEach(function(item) {
			if(window.screen.width < 981){
				dropdown_class = 'accordion-collapse collapse';
				bs_toggle = 'collapse';
				bs_target = 'data-bs-target="#accordion_'+item.group_id+'"';
				aria_control = 'aria-controls="accordion_'+item.group_id+'"';
				padding_start = '';
			}
		  str += '<li class="nav-item dropdown"><a class="navlink nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="'+bs_toggle+'" '+bs_target+' aria-expanded="false" '+aria_control+' data-gid="'+item.group_id+'">'+ item.title + '</a>';
		  if(item.subGroups.length > 0){
			  const subGroup = item.subGroups;
			  str += '<ul id="accordion_'+item.group_id+'" class="tgsz '+dropdown_class+'"><div class="row">';
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
  });
  
}

window.onresize = function(event) {
	let dropdown = document.querySelectorAll('.tgsz');
	let navlink = document.querySelectorAll('.navlink');
	let search_box = document.getElementById('search_box');
	
    if(window.screen.width > 980){// big screen
		search_box.classList.add('d-flex');
		for (var i = 0; i < navlink.length;  i++) {
			navlink[i].setAttribute('data-bs-toggle', 'dropdown');
			dropdown[i].classList.add('dropdown-menu');
			dropdown[i].classList.remove('accordion-collapse','collapse','show');
		}
		
	}else{
		search_box.classList.remove('d-flex');
		for (var j = 0; j < navlink.length;  j++) {
			let gid = navlink[j].getAttribute('data-gid');
			dropdown[j].classList.add('accordion-collapse','collapse');
			dropdown[j].classList.remove('dropdown-menu');
			navlink[j].setAttribute('data-bs-toggle', 'collapse');
			navlink[j].setAttribute('data-bs-target', '#accordion_'+gid);
			navlink[j].setAttribute('aria-controls', 'accordion_'+gid);
		}	
	}
};
