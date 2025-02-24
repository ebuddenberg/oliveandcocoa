
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in to the intranet</title>

    <link rel="shortcut icon" href="./images/favicon.png"/>

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="./bootstrap/icons/font/bootstrap-icons.min.css">
    <meta name="theme-color" content="#7952b3">

    <!-- Custom styles for this template -->
    <link href="./css/app.css" rel="stylesheet">
    <!-- Jquery CDN -->
<script src="./jquery-3.7.1.min.js"></script>
<!-- Bootstrap 5.2.3 -->
<script src="./bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-xl bg-body-tertiary p-0" style="font-size:14px;">
    <div class="container-fluid">
		<div class="row">
			<div class="col-2" id="hamburger_menu">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
					aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
			</div>
			<div class="col-10">
				<a class="navbar-brand" href="./"><img src="./images/logo.png" alt="logo"/></a>
			</div>
		</div>
        
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul id="main_menu" class="navbar-nav me-auto mb-2 mb-lg-0 mw-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="toolboxDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Planning</a>
					<ul style="width:max-content;" class="dropdown-menu">
						<div class="row">
							<div class="col">
								<li class="ps-3">test1</li>
								<li title="Provides up-to-date inventory information for our website and sales team">
									<a class="dropdown-item" href="#1">Available to Sell </a>
								</li>
                                <li title="Generates the next SKU number for Response">
                                    <a class="dropdown-item" href="#65">Next Sku V3</a>
								</li> 
							</div>
							<div class="col">
								<li title="Provides up-to-date inventory information for our website and sales team">
									<a class="dropdown-item" href="#1">Available to Sell </a>
								</li>
                                <li title="Generates the next SKU number for Response">
                                    <a class="dropdown-item" href="#65">Next Sku V3</a>
								</li> 
							</div>	
						</div>
					</ul>
				</li>
			</ul>
            <div id="search_box" class="float-end me-2 d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mw-auto">
                    <li class="nav-item dropdown d-none d-lg-flex user-dropdown text-nowrap align-items-center">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="bi bi-person-circle" alt="Profile image"> Adam Leavitt</span> </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header">
                                <p class="mb-1 mt-3 font-weight-semibold">Adam Leavitt</p>
                                <p class="fw-light text-muted mb-0">example@oliveandcocoa.com</p>
                            </div>
                            <a class="dropdown-item" href="/logout">
                                <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                        </div>
                    </li>
                </ul>
                <!--Make sure the form has the autocomplete function switched off:-->
                <div class="autocomplete">
                    <input id="navSearchInput" type="text" name="searchInput" placeholder="Search"/>
                </div>
            </div>
        </div>
    </div>
</nav>

<script src="main.js"></script>
<script type="module">
    function escapeRegExp(str) {
        return str.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    }

    function highlightSearchWords(title, searchWords) {
        const regexTextOutsideTags = /(?<=^|<\/?[a-z]*>|>)[^<>]*?(?=<|$)/gi;

        return title.replace(regexTextOutsideTags, (match) => {
            return searchWords.reduce((updatedTitle, word) => {
                if (updatedTitle.includes('<strong>') || updatedTitle.includes('</strong>')) {
                    return updatedTitle;
                }
                return updatedTitle.replace(new RegExp(`(${word})`, 'gi'), "<strong>$1</strong>");
            }, match);
        });
    }

    function searchArray(searchString, array) {
        const searchWords = searchString
            .toLowerCase()
            .trim()
            .split(' ')

        return array
            .filter(({search_text: searchText = ''}) =>
                searchWords.every(word => searchText.toLowerCase().includes(word))
            )
            .map(obj => {
                const search_title = `${obj.group} - ${obj.title}`;
                return {...obj, search_title: highlightSearchWords(search_title, searchWords)};
            });
    }

    

    function autocomplete(inp) {
        let searchItems = [{"type":"Item","group":"Sales","id":39,"title":"3CX","description":"Phone System","sort_order":"0","search_text":"3CX Phone System  Sales Customer Service "},{"type":"Item","group":"CS","id":39,"title":"3CX","description":"Phone System","sort_order":"0","search_text":"3CX Phone System  Sales Customer Service "},{"type":"Item","group":"Sales","id":14,"title":"Kronos","description":"Kronos Timeclock","sort_order":"0","search_text":"Kronos Kronos Timeclock  Sales Customer Service Human Resources "},{"type":"Item","group":"CS","id":14,"title":"Kronos","description":"Kronos Timeclock","sort_order":"0","search_text":"Kronos Kronos Timeclock  Sales Customer Service Human Resources "},{"type":"Item","group":"HR","id":14,"title":"Kronos","description":"Kronos Timeclock","sort_order":"0","search_text":"Kronos Kronos Timeclock  Sales Customer Service Human Resources "},{"type":"Item","group":"Ecommerce","id":38,"title":"OliveAndCocoa.com","description":"Our webstite!","sort_order":"0","search_text":"OliveAndCocoa.com Our webstite!  Ecommerce Sales Customer Service "},{"type":"Item","group":"Sales","id":38,"title":"OliveAndCocoa.com","description":"Our webstite!","sort_order":"0","search_text":"OliveAndCocoa.com Our webstite!  Ecommerce Sales Customer Service "},{"type":"Item","group":"CS","id":38,"title":"OliveAndCocoa.com","description":"Our webstite!","sort_order":"0","search_text":"OliveAndCocoa.com Our webstite!  Ecommerce Sales Customer Service "},{"type":"Item","group":"Batch","id":7,"title":"Order Status Summary","description":"Orders to Clear","sort_order":"1","search_text":"Order Status Summary Orders to Clear  Batch "},{"type":"Item","group":"Utilities","id":2,"title":"Inventory Search V1","description":"Allows searching of all inventory products","sort_order":"1","search_text":"Inventory Search Allows searching of all inventory products  Utilities "},{"type":"Item","group":"Planning","id":1,"title":"Available to Sell ","description":"Provides up-to-date inventory information for our website and sales team","sort_order":"1","search_text":"Available to Sell  Provides up-to-date inventory information for our website and sales team  Planning Sales Customer Service Utilities "},{"type":"Item","group":"Sales","id":1,"title":"Available to Sell ","description":"Provides up-to-date inventory information for our website and sales team","sort_order":"1","search_text":"Available to Sell  Provides up-to-date inventory information for our website and sales team  Planning Sales Customer Service Utilities "},{"type":"Item","group":"CS","id":1,"title":"Available to Sell ","description":"Provides up-to-date inventory information for our website and sales team","sort_order":"1","search_text":"Available to Sell  Provides up-to-date inventory information for our website and sales team  Planning Sales Customer Service Utilities "},{"type":"Item","group":"Utilities","id":1,"title":"Available to Sell ","description":"Provides up-to-date inventory information for our website and sales team","sort_order":"1","search_text":"Available to Sell  Provides up-to-date inventory information for our website and sales team  Planning Sales Customer Service Utilities "},{"type":"Item","group":"Ecommerce","id":67,"title":"Copy Master","description":"Where the master of the catalog copy lives","sort_order":"1","search_text":"Copy Master Where the master of the catalog copy lives  Ecommerce "},{"type":"Item","group":"Outbound Dock","id":15,"title":"Future Log Scan","description":"Scan a package for future ship","sort_order":"1","search_text":"Future Log Scan Scan a package for future ship  Outbound Dock "},{"type":"Item","group":"Warehouse","id":23,"title":"Receiving","description":"Web based receiving","sort_order":"1","search_text":"Receiving Web based receiving  Warehouse "},{"type":"Item","group":"Batch","id":8,"title":"Recalculate","description":"Run Check Correct, Run Curve Processing","sort_order":"2","search_text":"Recalculate Run Check Correct, Run Curve Processing  Planning Batch Utilities "},{"type":"Item","group":"Outbound Dock","id":16,"title":"ShipTo Mimport","description":"Mimport and mimport mopup","sort_order":"2","search_text":"ShipTo Mimport Mimport and mimport mopup  Outbound Dock "},{"type":"Item","group":"HR","id":4,"title":"Extension List","description":"A list of people and their phone extension","sort_order":"2","search_text":"Extension List A list of people and their phone extension  Sales Customer Service Human Resources Utilities "},{"type":"Item","group":"Ecommerce","id":61,"title":"CV3 Product Status","description":"OBSOLETE - need to fix with the new table in R4W_001 database","sort_order":"2","search_text":"CV3 Product Status OBSOLETE - need to fix with the new table in R4W_001 database  Planning Ecommerce "},{"type":"Item","group":"Sales","id":40,"title":"CRM 2.0","description":"CRM 2.0","sort_order":"2","search_text":"CRM 2.0 CRM 2.0  Sales "},{"type":"Item","group":"Utilities","id":3,"title":"Inventory Search V3","description":"Inventory Search - Response Tables","sort_order":"2","search_text":"Inventory Search Inventory Search - Response Tables  Planning Utilities "},{"type":"Item","group":"CS","id":55,"title":"Orders With A Balance Due","description":"Orders with a Balance due","sort_order":"2","search_text":"Orders With A Balance Due Orders with a Balance due  Sales Customer Service "},{"type":"Item","group":"Warehouse","id":24,"title":"Inventory Management","description":"Common inventory management tasks.","sort_order":"2","search_text":"Inventory Management Common inventory management tasks.  Warehouse "},{"type":"Item","group":"CS","id":72,"title":"Gift Card Search","description":"Allows searching all gift card messages for specific terms","sort_order":"3","search_text":"Gift Card Search Allows searching all gift card messages for specific terms  Customer Service "},{"type":"Item","group":"Planning","id":65,"title":"Next Sku V3","description":"Generates the next SKU number for Response","sort_order":"3","search_text":"Next Sku Generates the next SKU number for Response  Planning "},{"type":"Item","group":"Sales","id":41,"title":"CRM 3.0","description":"CRM 3.0","sort_order":"3","search_text":"CRM 3.0 CRM 3.0  Sales "},{"type":"Item","group":"Outbound Dock","id":17,"title":"Box Sizes","description":"Allows you to edit auto imported shipping box sizes","sort_order":"3","search_text":"Box Sizes Allows you to edit auto imported shipping box sizes  Outbound Dock "},{"type":"Item","group":"Ecommerce","id":68,"title":"CV3 Related Items","description":"A tool to get related items for a specific product","sort_order":"3","search_text":"CV3 Related Items A tool to get related items for a specific product  Ecommerce "},{"type":"Item","group":"Utilities","id":4,"title":"Extension List","description":"A list of people and their phone extension","sort_order":"3","search_text":"Extension List A list of people and their phone extension  Sales Customer Service Human Resources Utilities "},{"type":"Item","group":"Planning","id":64,"title":"Sundries V1","description":"Data table of consumable items","sort_order":"3","search_text":"Sundries Data table of consumable items  Planning "},{"type":"Item","group":"Warehouse","id":25,"title":"Reset Inventory Mins","description":"Reset Inventory minimums from a specific date or reset all to 0.","sort_order":"3","search_text":"Reset Invenotory Mins Reset Inventory minimums from a specific date or reset all to 0.  Warehouse "},{"type":"Item","group":"Batch","id":29,"title":"Work Orders","description":"Used to submit work order requests to facilities","sort_order":"3","search_text":"Work Orders Used to submit work order requests to facilities  Batch "},{"type":"Item","group":"Sales","id":42,"title":"XLS to CSV","description":"Checks an XLS file for validity before submitting to upload","sort_order":"4","search_text":"XLS to CSV Checks an XLS file for validity before submitting to upload  Sales "},{"type":"Item","group":"Batch","id":30,"title":"Reprint Pick Ticket","description":"Reprint a printed pickticket by shipto ID","sort_order":"4","search_text":"Reprint Pick Ticket Reprint a printed pickticket by shipto ID  Batch "},{"type":"Item","group":"Warehouse","id":26,"title":"Flower Counts","description":"Enter todays flower count","sort_order":"4","search_text":"Flower Counts Enter todays flower count  Warehouse "},{"type":"Item","group":"Utilities","id":5,"title":"Branding Status Summary","description":"Data table showing brand processing status","sort_order":"4","search_text":"Branding Status Summary Data table showing brand processing status  Sales Utilities "},{"type":"Item","group":"CS","id":73,"title":"Message Search","description":"Allows searching order messages for specific terms or by order number","sort_order":"4","search_text":"Message Search Allows searching order messages for specific terms or by order number  Customer Service "},{"type":"Item","group":"Ecommerce","id":69,"title":"OC Website Cacher","description":"Caches versions of our website twice a day, every day","sort_order":"4","search_text":"OC Website Cacher Caches versions of our website twice a day, every day  Ecommerce "},{"type":"Item","group":"Outbound Dock","id":18,"title":"Prebuild Bin Location","description":"Allows assigning a specific prebuild date to a bin","sort_order":"4","search_text":"Prebuild Bin Location Allows assigning a specific prebuild date to a bin  Outbound Dock "},{"type":"Item","group":"Planning","id":8,"title":"Recalculate","description":"Run Check Correct, Run Curve Processing","sort_order":"4","search_text":"Recalculate Run Check Correct, Run Curve Processing  Planning Batch Utilities "},{"type":"Item","group":"Batch","id":31,"title":"Print Unpick","description":"Transfers inventory from the UNPICK bin to proruction based on a SHIPTO ID","sort_order":"5","search_text":"Print Unpick Transfers inventory from the UNPICK bin to proruction based on a SHIPTO ID  Batch "},{"type":"Item","group":"Outbound Dock","id":19,"title":"GPB Bin Location","description":"Allows assigning a specific item id to a bin","sort_order":"5","search_text":"GPB Bin Location Allows assigning a specific item id to a bin  Outbound Dock "},{"type":"Item","group":"Utilities","id":6,"title":"Mimport Tools","description":"Mimport mop up","sort_order":"5","search_text":"Mimport Tools Mimport mop up  Outbound Dock Utilities "},{"type":"Item","group":"Warehouse","id":27,"title":"Flower Picker","description":"Select the current in season flowers","sort_order":"5","search_text":"Flower Picker Select the current in season flowers  Warehouse "},{"type":"Item","group":"Planning","id":61,"title":"CV3 Product Status","description":"OBSOLETE - need to fix with the new table in R4W_001 database","sort_order":"5","search_text":"CV3 Product Status OBSOLETE - need to fix with the new table in R4W_001 database  Planning Ecommerce "},{"type":"Item","group":"Sales","id":43,"title":"Accounts Auditor","description":"Reports on Salesperson accounts","sort_order":"5","search_text":"Accounts Auditor Reports on Salesperson accounts  Sales "},{"type":"Item","group":"CS","id":74,"title":"CS Hours","description":"Hours of operation for Customer Service","sort_order":"5","search_text":"CS Hours Hours of operation for Customer Service  Customer Service "},{"type":"Item","group":"Ecommerce","id":70,"title":"Response Image Mapper","description":"Maps web images to the thumbnail icon in Response","sort_order":"5","search_text":"Response Image Mapper Maps web images to the thumbnail icon in Response  Ecommerce "},{"type":"Item","group":"CS","id":75,"title":"Tracking # Search","description":"Allows searching of shiptos by tracking number","sort_order":"6","search_text":"Tracking # Search Allows searching of shiptos by tracking number  Customer Service "},{"type":"Item","group":"Outbound Dock","id":20,"title":"CPS Tracking Numbers","description":"Inserts all the tracking numbers into a table dump","sort_order":"6","search_text":"CPS Tracking Numbers Inserts all the tracking numbers into a table dump  Outbound Dock "},{"type":"Item","group":"Sales","id":44,"title":"Brand Creation Calendar","description":"Calendar of when your brand will be manufactured","sort_order":"6","search_text":"Brand Creation Calendar Calendar of when your brand will be manufactured  Sales "},{"type":"Item","group":"Warehouse","id":28,"title":"Flower Prebuild","description":"Enter todays flower prebuilds","sort_order":"6","search_text":"Flower Prebuild Enter todays flower prebuilds  Warehouse "},{"type":"Item","group":"Ecommerce","id":71,"title":"CV3 Product Builder","description":"A tool for building products for CV3","sort_order":"6","search_text":"CV3 Product Builder A tool for building products for CV3  Ecommerce "},{"type":"Item","group":"Planning","id":62,"title":"POM","description":"Purchase Order Management System","sort_order":"6","search_text":"POM Purchase Order Management System  Planning "},{"type":"Item","group":"Outbound Dock","id":6,"title":"Mimport Tools","description":"Mimport mop up","sort_order":"7","search_text":"Mimport Tools Mimport mop up  Outbound Dock Utilities "},{"type":"Item","group":"Planning","id":34,"title":"Kit List","description":"Kit Master and Component Listing","sort_order":"7","search_text":"Kit List Kit Master and Component Listing  Planning Batch "},{"type":"Item","group":"Sales","id":5,"title":"Branding Status Summary","description":"Data table showing brand processing status","sort_order":"7","search_text":"Branding Status Summary Data table showing brand processing status  Sales Utilities "},{"type":"Item","group":"Batch","id":33,"title":"Utilities","description":"Run Check Correct, Run Drop Ship Split","sort_order":"7","search_text":"Utilities Run Check Correct, Run Drop Ship Split  Batch "},{"type":"Item","group":"Utilities","id":8,"title":"Recalculate","description":"Run Check Correct, Run Curve Processing","sort_order":"7","search_text":"Recalculate Run Check Correct, Run Curve Processing  Planning Batch Utilities "},{"type":"Item","group":"CS","id":76,"title":"Shipto Search","description":"Allows searching of shiptos by First, Last, Company or Attn line","sort_order":"7","search_text":"Shipto Search Allows searching of shiptos by First, Last, Company or Attn line  Customer Service "},{"type":"Item","group":"Outbound Dock","id":21,"title":"Scan as Prebuild","description":"Scan a package for future ship","sort_order":"8","search_text":"Scan as Prebuild Scan a package for future ship  Outbound Dock "},{"type":"Item","group":"Utilities","id":9,"title":"B2B Data To Reorder Template","description":"Creates bulk reorder template files for customers","sort_order":"8","search_text":"B2B Data To Reorder Template Creates bulk reorder template files for customers  Utilities "},{"type":"Item","group":"Sales","id":45,"title":"Create A Brand SKU","description":"Use this utility to create a new Brand SKU by Response Customer ID","sort_order":"8","search_text":"Create A Brand SKU Use this utility to create a new Brand SKU by Response Customer ID  Sales "},{"type":"Item","group":"Batch","id":34,"title":"Kit List","description":"Kit Master and Component Listing","sort_order":"8","search_text":"Kit List Kit Master and Component Listing  Planning Batch "},{"type":"Item","group":"Planning","id":63,"title":"PO Lines By Vendor","description":"Data table of open purchase order lines by vendor","sort_order":"8","search_text":"PO Lines By Vendor Data table of open purchase order lines by vendor  Planning "},{"type":"Item","group":"CS","id":77,"title":"Order QC","description":"Helps identify orders for quality control purposes","sort_order":"8","search_text":"Order QC Helps identify orders for quality control purposes  Customer Service "},{"type":"Item","group":"Sales","id":46,"title":"Create a Printed Card SKU","description":"Use this utility to create a new Printed Card SKU by Response Customer ID","sort_order":"9","search_text":"Create a Printed Card SKU Use this utility to create a new Printed Card SKU by Response Customer ID  Sales "},{"type":"Item","group":"CS","id":78,"title":"Bounce Backs","description":"A tool to help manage bounce backs and high touches","sort_order":"9","search_text":"Bounce Backs A tool to help manage bounce backs and high touches  Customer Service "},{"type":"Item","group":"Utilities","id":10,"title":"Dedupe Tools","description":"Actively used in the NCOA\/PCOA dedupe process","sort_order":"9","search_text":"Dedupe Tools Actively used in the NCOA\/PCOA dedupe process  Utilities "},{"type":"Item","group":"Batch","id":32,"title":"Gift Card Editor","description":"Gift card editing tool","sort_order":"9","search_text":"Gift Card Editor Gift card editing tool  Batch "},{"type":"Item","group":"Outbound Dock","id":22,"title":"Ship a Bin V2","description":"Enter a bin to ship the items in it","sort_order":"9","search_text":"Ship a Bin Enter a bin to ship the items in it  Outbound Dock "},{"type":"Item","group":"Planning","id":60,"title":"Sundries V3","description":"Data table of consumable items","sort_order":"9","search_text":"Sundries Data table of consumable items  Planning "},{"type":"Item","group":"CS","id":79,"title":"Saturday Delivery","description":"A rough check of whether Saturday Delivery is available","sort_order":"10","search_text":"Saturday Delivery A rough check of whether Saturday Delivery is available  Customer Service "},{"type":"Item","group":"Batch","id":36,"title":"Building Work Orders","description":"Submit facilities work orders","sort_order":"10","search_text":"Building Work Orders Submit facilities work orders  Batch "},{"type":"Item","group":"Sales","id":47,"title":"Create An Addin SKU","description":"Use this utility to create a new Brand SKU by Response Customer ID","sort_order":"10","search_text":"Create An Addin SKU Use this utility to create a new Brand SKU by Response Customer ID  Sales "},{"type":"Item","group":"Sales","id":48,"title":"Custom BOM","description":"For calculating the margins for a custom bill of materials","sort_order":"11","search_text":"Custom BOM For calculating the margins for a custom bill of materials  Sales "},{"type":"Item","group":"Batch","id":37,"title":"Dropship Export","description":"Dropship export tool","sort_order":"11","search_text":"Dropship Export Dropship export tool  Batch "},{"type":"Item","group":"CS","id":80,"title":"Product Knowledge Base","description":"Where product knowledge is learned.","sort_order":"11","search_text":"Product Knowledge Base Where product knowledge is learned.  Customer Service "},{"type":"Item","group":"Utilities","id":12,"title":"Lineitem Fixer V3","description":"Line item fixed tool - take a while to load","sort_order":"11","search_text":"Lineitem Fixer Line item fixed tool - take a while to load  Utilities "},{"type":"Item","group":"Planning","id":66,"title":"RTV Fix","description":"Change the status on an RTV","sort_order":"11","search_text":"RTV Fix Change the status on an RTV  Planning "},{"type":"Item","group":"Batch","id":13,"title":"System Status","description":"Used to monitor various stored procedures","sort_order":"12","search_text":"System Status Used to monitor various stored procedures  Batch Utilities "},{"type":"Item","group":"Utilities","id":13,"title":"System Status","description":"Used to monitor various stored procedures","sort_order":"12","search_text":"System Status Used to monitor various stored procedures  Batch Utilities "},{"type":"Item","group":"Sales","id":49,"title":"Edit Prototype","description":"Edit prototype address or shipping method","sort_order":"12","search_text":"Edit Prototype Edit prototype address or shipping method  Sales "},{"type":"Item","group":"CS","id":81,"title":"Floral Call Backs","description":"A tool to help manage floral call backs","sort_order":"12","search_text":"Floral Call Backs A tool to help manage floral call backs  Customer Service "},{"type":"Item","group":"Sales","id":4,"title":"Extension List","description":"A list of people and their phone extension","sort_order":"13","search_text":"Extension List A list of people and their phone extension  Sales Customer Service Human Resources Utilities "},{"type":"Item","group":"CS","id":82,"title":"Unpick a Pickticket","description":"Submit a shipto to be unpicked","sort_order":"13","search_text":"Unpick a Pickticket Submit a shipto to be unpicked  Customer Service "},{"type":"Item","group":"Sales","id":32,"title":"Gift Card Editor","description":"Gift card editing tool","sort_order":"14","search_text":"Gift Card Editor Gift card editing tool  Batch "},{"type":"Item","group":"CS","id":83,"title":"Order Receipt","description":"This emails a receipt to the given address","sort_order":"14","search_text":"Order Receipt This emails a receipt to the given address  Customer Service "},{"type":"Item","group":"Sales","id":50,"title":"GTG Validator","description":"Validate your order before turning in your Good to Go","sort_order":"15","search_text":"GTG Validator Validate your order before turning in your Good to Go  Sales "},{"type":"Item","group":"CS","id":84,"title":"Next Sales Lead","description":"Submits a sales lead to the sales team.","sort_order":"15","search_text":"Next Sales Lead Submits a sales lead to the sales team.  Customer Service "},{"type":"Item","group":"Sales","id":51,"title":"Mass Gift Card Msg Changer","description":"Allows you to bulk change gift card messages by order number","sort_order":"16","search_text":"Mass Gift Card Msg Changer Allows you to bulk change gift card messages by order number  Sales "},{"type":"Item","group":"CS","id":85,"title":"Change Customer ID","description":"Used to change a customer ID","sort_order":"16","search_text":"Change Customer ID Used to change a customer ID  Customer Service "},{"type":"Item","group":"CS","id":86,"title":"Change Continuity Club Date","description":"Change a continuity club date","sort_order":"17","search_text":"Change Continuity Club Date Change a continuity club date  Customer Service "},{"type":"Item","group":"Sales","id":52,"title":"Mass Shipping Method Changer","description":"Allows you to bulk change shipping method","sort_order":"17","search_text":"Mass Shipping Method Changer Allows you to bulk change shipping method  Sales "},{"type":"Item","group":"Sales","id":53,"title":"Open PO Report","description":"A list of purchase orders open for the sales team","sort_order":"18","search_text":"Open PO Report A list of purchase orders open for the sales team  Sales "},{"type":"Item","group":"CS","id":4,"title":"Extension List","description":"A list of people and their phone extension","sort_order":"18","search_text":"Extension List A list of people and their phone extension  Sales Customer Service Human Resources Utilities "},{"type":"Item","group":"CS","id":32,"title":"Gift Card Editor","description":"Gift card editing tool","sort_order":"19","search_text":"Gift Card Editor Gift card editing tool  Batch "},{"type":"Item","group":"CS","id":54,"title":"Orders On Hold","description":"A list of orders on hold for the sales team","sort_order":"19","search_text":"Orders On Hold A list of orders on hold for the sales team  Sales "},{"type":"Item","group":"Sales","id":55,"title":"Orders With A Balance Due","description":"Orders with a Balance due","sort_order":"20","search_text":"Orders With A Balance Due Orders with a Balance due  Sales Customer Service "},{"type":"Item","group":"Sales","id":56,"title":"Requested Shipdate Changer","description":"Allows you to bulk change requested ship dates by order number","sort_order":"21","search_text":"Requested Shipdate Changer Allows you to bulk change requested ship dates by order number  Sales "},{"type":"Item","group":"Sales","id":57,"title":"Ribbon Roll Estimator","description":"How many rolls of ribbon do you really need\u2026","sort_order":"22","search_text":"Ribbon Roll Estimator How many rolls of ribbon do you really need\u2026  Sales "},{"type":"Item","group":"Sales","id":58,"title":"Shipping Charge Estimator","description":"This will help estimate SHIPPING \u0026 HANDLING charges","sort_order":"23","search_text":"Shipping Charge Estimator This will help estimate SHIPPING \u0026 HANDLING charges  Sales "},{"type":"Item","group":"Sales","id":59,"title":"Shipto Suppress","description":"Add a shipto to the suppression file","sort_order":"24","search_text":"Shipto Suppress Add a shipto to the suppression file  Sales "},{"type":"Item","group":"Sales","id":65,"title":"Next Sku V3","description":"Generates the next SKU number for Response","sort_order":"25","search_text":"Next Sku Generates the next SKU number for Response  Planning "},{"id":1,"title":"Planning","description":"The planning group","sort_order":"1","url":"","parent_id":null,"created_at":"2024-03-08T17:25:35.803000Z","updated_at":"2024-01-29T15:19:06.270000Z"},{"id":2,"title":"Ecommerce","description":"The ecommerce group","sort_order":"2","url":"","parent_id":null,"created_at":"2024-03-08T17:25:35.803000Z","updated_at":"2024-01-29T15:19:06.270000Z"},{"id":3,"title":"Sales","description":"The sales group","sort_order":"3","url":"","parent_id":null,"created_at":"2024-03-08T17:25:35.803000Z","updated_at":"2024-01-29T15:19:06.270000Z"},{"id":4,"title":"CS","description":"The customer service group","sort_order":"4","url":"","parent_id":null,"created_at":"2024-03-08T17:25:35.803000Z","updated_at":"2024-01-29T15:19:06.270000Z"},{"id":5,"title":"Batch","description":"The batch group","sort_order":"5","url":"","parent_id":null,"created_at":"2024-03-08T17:25:35.803000Z","updated_at":"2024-01-29T15:19:06.270000Z"},{"id":6,"title":"Warehouse","description":"The warehouse group","sort_order":"6","url":"","parent_id":null,"created_at":"2024-03-08T17:25:35.803000Z","updated_at":"2024-01-29T15:19:06.270000Z"},{"id":7,"title":"Outbound Dock","description":"The outbound dock group","sort_order":"7","url":"","parent_id":null,"created_at":"2024-03-08T17:25:35.803000Z","updated_at":"2024-01-29T15:19:06.270000Z"},{"id":8,"title":"HR","description":"The human resources group","sort_order":"8","url":"","parent_id":null,"created_at":"2024-03-08T17:25:35.803000Z","updated_at":"2024-01-29T15:19:06.270000Z"},{"id":9,"title":"Utilities","description":"General utilities","sort_order":"9","url":"","parent_id":null,"created_at":"2024-03-08T17:25:35.803000Z","updated_at":"2024-01-29T15:19:06.270000Z"}];

        let currentFocus;
        inp.addEventListener("input", function (e) {
            let a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val || val.length < 2) {
                return false;
            }
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            let includeInList = searchArray(val, searchItems)
            for (i = 0; i < includeInList.length; i++) {

                b = document.createElement("DIV");
                let aElement = document.createElement('a');

                aElement.setAttribute('class', 'nav-link');
                aElement.setAttribute('href', '#'+includeInList[i].id || '#');
                aElement.setAttribute('role', 'button');
                aElement.innerHTML = includeInList[i].search_title;
                b.appendChild(aElement);
                a.appendChild(b);
            }
        });

        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function (e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode === 40) {
                currentFocus++;
                addActive(x);
            } else if (e.keyCode === 38) { //up
                currentFocus--;
                addActive(x);
            } else if (e.keyCode === 13) {
                e.preventDefault();
                if (currentFocus > -1) {
                    if (x) x[currentFocus].click();
                }
            }
        });

        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }

        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }

        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }

        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }

    let itemsForSearch = [];
    //console.log("itemsForSearch", itemsForSearch)
    autocomplete(document.getElementById("navSearchInput"), []);
</script>

<style>
    * {
        box-sizing: border-box;
    }

    body {
        font: 16px Arial;
    }

    .autocomplete {
        /*the container must be positioned relative:*/
        position: relative;
        display: inline-block;
    }

    input {
        border: 1px solid transparent;
        background-color: #f1f1f1;
        padding: 10px;
        font-size: 16px;
    }

    input[type=text] {
        background-color: #f1f1f1;
        width: 100%;
    }

    input[type=submit] {
        background-color: DodgerBlue;
        color: #fff;
    }

    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
    }

    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
    }

    .autocomplete-items div:hover {
        /*when hovering an item:*/
        background-color: #e9e9e9;
    }

    .autocomplete-active {
        /*when navigating through the items using the arrow keys:*/
        background-color: DodgerBlue !important;
        color: #ffffff;
    }
</style>

</body>
</html>

