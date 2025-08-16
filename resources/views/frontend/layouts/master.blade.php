<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta ßhttp-equiv="x-ua-compatible" content="ie=edge">
	@section('head')
    <meta name='robots' content='index,follow' />
    @show
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" type="image/vnd.microsoft.icon" href="{{asset('favicon.ico')}}">
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
	<link rel="canonical" href="{{ route('home') }}"/>
	<!-- Codezeel added -->
	<!-- <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet"> -->
	<link rel="stylesheet" href="{{asset('frontend/css/style-mobile.css')}}" type="text/css" media="all">
	
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('frontend/css/app-asset/theme-60842626.css')}}" type="text/css" media="all">
	<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('frontend/css/styles.css')}}" type="text/css" media="all">
	<script type="text/javascript">
		// var buttoncompare_title_add = "Add to Compare";
		// var buttoncompare_title_remove = "Remove from Compare";
		// var buttonwishlist_title_add = "Add to Wishlist";
		// var buttonwishlist_title_remove = "Remove from WishList";
		// var comparator_max_item = 3;
		// var compared_products = [];
		// var isLogged = false;
		var prestashop = { "cart": { "products": [],
			 "totals": { 
				"total": {
					"type": "total", "label": "Total", "amount": 0, "value": "\u20ac0.00" 
				}, 
				"total_including_tax": { 
					"type": "total", "label": "Total (tax incl.)", "amount": 0, "value": "\u20ac0.00" 
				}, 
				"total_excluding_tax": { 
					"type": "total", "label": "Total (tax excl.)", "amount": 0, "value": "\u20ac0.00" 
				} }, 
				"subtotals": { 
					"products": {
						 "type": "products", "label": "Subtotal", "amount": 0, "value": "\u20ac0.00" 
						}, 
						"discounts": null, 
						"shipping": { 
							"type": "shipping", "label": "Shipping", "amount": 0, "value": "Free" 
						}, "tax": null 
					}, 
					"products_count": 0, "summary_string": "0 items", 
					"vouchers": { 
						"allowed": 0, "added": [] 
					}, 
					"discounts": [], "minimalPurchase": 0, "minimalPurchaseRequired": "" 
				}, 
				"currency": { 
					"name": "Euro", "iso_code": "EUR", "iso_code_num": "978", "sign": "\u20ac" 
				}, 
		}
		var productcompare_add = "";
		var productcompare_max_item = "";
		var productcompare_remove = "";
		var productcompare_viewlistcompare = "View list compare";
		var wishlist_add = "The product was successfully added to your wishlist";
		var wishlist_cancel_txt = "Cancel";
		var wishlist_confirm_del_txt = "Delete selected item?";
		var wishlist_del_default_txt = "Cannot delete default wishlist";
		var wishlist_email_txt = "Email";
		var wishlist_loggin_required = "You must be logged in to manage your wishlist";
		var wishlist_ok_txt = "Ok";
		var wishlist_quantity_required = "You must enter a quantity";
		var wishlist_remove = "The product was successfully removed from your wishlist";
		var wishlist_reset_txt = "Reset";
		var wishlist_send_txt = "Send";
		var wishlist_send_wishlist_txt = "Send wishlist";
		var wishlist_viewwishlist = "View your wishlist";
	</script>
	<!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '2194978834048395');
        fbq('track', 'PageView');
    </script>
	<noscript>
		<img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=2194978834048395&ev=PageView&noscript=1">
	</noscript>
	{!! $informationPage->google_analytic !!}
    <!-- End Facebook Pixel Code -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet"> -->
</head>

<body id="index" class="lang-en country-de currency-eur layout-full-width page-index tax-display-enabled 
		currency-usd layout-left-column page-category category-id-3 category-sunglasses category-id-parent-2 category-depth-level-2 
		
 ">
 <!-- page-product  product-id-20 product-exercitat-virginia product-id-category-6 product-id-manufacturer-4 product-id-supplier-0 product-available-for-order -->
 <!-- currency-usd layout-left-column page-category category-id-3 category-sunglasses category-id-parent-2 category-depth-level-2 -->
	<main id="page">
		<x-menu/>
		<aside id="notifications">
			<div class="container"></div>
		</aside>
		<section id="wrapper">
			<nav data-depth="1" class="breadcrumb">
				<div class="container">
					<ol itemscope itemtype="/">
						<li itemprop="itemListElement" itemscope itemtype="/">
							<a itemprop="item" href="index.html">
								<span itemprop="name">Home</span>
							</a>
							<meta itemprop="position" content="1">
						</li>
					</ol>
				</div>
			</nav>
			@yield('content')
			
		</section>
		@include('frontend.layouts.include.chat-mobile')
		@include('frontend.layouts.include.footer')
	</main>
	<script type="text/javascript" src="{{asset('frontend/js/app-asset/bottom-7b643f25.js')}}"></script>
	<script type="text/javascript" src="{{asset('frontend/js/main.js')}}"></script>
	<script type="text/javascript" src="{{asset('frontend/js/category-product.js')}}"></script>

</body>
</html>