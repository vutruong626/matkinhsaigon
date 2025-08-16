// event onclick search Category
$(".category-item").on('click', function () {
    $("#search-products").submit();
})
/*! rangeslider.js - v2.1.1 | (c) 2016 @andreruffert | MIT license | https://github.com/andreruffert/rangeslider.js */
!function (a) 
{ 
    "use strict"; "function" == typeof define && define.amd ? define(["jquery"], a) : "object" == typeof exports ? module.exports = a(require("jquery")) : a(jQuery) 
}
(function (a) { 
        "use strict"; function b() { 
            var a = document.createElement("input"); 
            return a.setAttribute("type", "range"), 
            "text" !== a.type 
    } 
    function c(a, b) { 
        var c = Array.prototype.slice.call(arguments, 2); 
        return setTimeout(function () { 
            return a.apply(null, c) }, b) 
        } 
        function d(a, b) { 
            return b = b || 100, 
            function () { 
                if (!a.debouncing) { 
                    var c = Array.prototype.slice.apply(arguments); 
                    a.lastReturnVal = a.apply(window, c), a.debouncing = !0 
                } 
                return clearTimeout(a.debounceTimeout), 
                a.debounceTimeout = setTimeout(function () { 
                    a.debouncing = !1 }, b), a.lastReturnVal } 
                } function e(a) { 
                    return a && (0 === a.offsetWidth || 0 === a.offsetHeight || a.open === !1) 
                } function f(a) { 
                    for (var b = [], c = a.parentNode; e(c);)b.push(c), c = c.parentNode; return b 
                } function g(a, b) { 
                    function c(a) { 
                        "undefined" != typeof a.open && (a.open = a.open ? !1 : !0) 
                    } var d = f(a), e = d.length, g = [], h = a[b]; if (e) { for (var i = 0; e > i; i++)g[i] = d[i].style.cssText, d[i].style.setProperty ? d[i].style.setProperty("display", "block", "important") : d[i].style.cssText += ";display: block !important", d[i].style.height = "0", d[i].style.overflow = "hidden", d[i].style.visibility = "hidden", c(d[i]); h = a[b]; for (var j = 0; e > j; j++)d[j].style.cssText = g[j], c(d[j]) } return h } function h(a, b) { var c = parseFloat(a); return Number.isNaN(c) ? b : c } function i(a) { return a.charAt(0).toUpperCase() + a.substr(1) } function j(b, e) { if (this.$window = a(window), this.$document = a(document), this.$element = a(b), this.options = a.extend({}, n, e), this.polyfill = this.options.polyfill, this.orientation = this.$element[0].getAttribute("data-orientation") || this.options.orientation, this.onInit = this.options.onInit, this.onSlide = this.options.onSlide, this.onSlideEnd = this.options.onSlideEnd, this.DIMENSION = o.orientation[this.orientation].dimension, this.DIRECTION = o.orientation[this.orientation].direction, this.DIRECTION_STYLE = o.orientation[this.orientation].directionStyle, this.COORDINATE = o.orientation[this.orientation].coordinate, this.polyfill && m) return !1; this.identifier = "js-" + k + "-" + l++, this.startEvent = this.options.startEvent.join("." + this.identifier + " ") + "." + this.identifier, this.moveEvent = this.options.moveEvent.join("." + this.identifier + " ") + "." + this.identifier, this.endEvent = this.options.endEvent.join("." + this.identifier + " ") + "." + this.identifier, this.toFixed = (this.step + "").replace(".", "").length - 1, this.$fill = a('<div class="' + this.options.fillClass + '" />'), this.$handle = a('<div class="' + this.options.handleClass + '" />'), this.$range = a('<div class="' + this.options.rangeClass + " " + this.options[this.orientation + "Class"] + '" id="' + this.identifier + '" />').insertAfter(this.$element).prepend(this.$fill, this.$handle), this.$element.css({ position: "absolute", width: "1px", height: "1px", overflow: "hidden", opacity: "0" }), this.handleDown = a.proxy(this.handleDown, this), this.handleMove = a.proxy(this.handleMove, this), this.handleEnd = a.proxy(this.handleEnd, this), this.init(); var f = this; this.$window.on("resize." + this.identifier, d(function () { c(function () { f.update(!1, !1) }, 300) }, 20)), this.$document.on(this.startEvent, "#" + this.identifier + ":not(." + this.options.disabledClass + ")", this.handleDown), this.$element.on("change." + this.identifier, function (a, b) { if (!b || b.origin !== f.identifier) { var c = a.target.value, d = f.getPositionFromValue(c); f.setPosition(d) } }) } Number.isNaN = Number.isNaN || function (a) { return "number" == typeof a && a !== a }; var k = "rangeslider", l = 0, m = b(), n = { polyfill: !0, orientation: "horizontal", rangeClass: "rangeslider", disabledClass: "rangeslider--disabled", horizontalClass: "rangeslider--horizontal", verticalClass: "rangeslider--vertical", fillClass: "rangeslider__fill", handleClass: "rangeslider__handle", startEvent: ["mousedown", "touchstart", "pointerdown"], moveEvent: ["mousemove", "touchmove", "pointermove"], endEvent: ["mouseup", "touchend", "pointerup"] }, o = { orientation: { horizontal: { dimension: "width", direction: "left", directionStyle: "left", coordinate: "x" }, vertical: { dimension: "height", direction: "top", directionStyle: "bottom", coordinate: "y" } } }; return j.prototype.init = function () { this.update(!0, !1), this.onInit && "function" == typeof this.onInit && this.onInit() }, j.prototype.update = function (a, b) { a = a || !1, a && (this.min = h(this.$element[0].getAttribute("min"), 0), this.max = h(this.$element[0].getAttribute("max"), 100), this.value = h(this.$element[0].value, Math.round(this.min + (this.max - this.min) / 2)), this.step = h(this.$element[0].getAttribute("step"), 1)), this.handleDimension = g(this.$handle[0], "offset" + i(this.DIMENSION)), this.rangeDimension = g(this.$range[0], "offset" + i(this.DIMENSION)), this.maxHandlePos = this.rangeDimension - this.handleDimension, this.grabPos = this.handleDimension / 2, this.position = this.getPositionFromValue(this.value), this.$element[0].disabled ? this.$range.addClass(this.options.disabledClass) : this.$range.removeClass(this.options.disabledClass), this.setPosition(this.position, b) }, j.prototype.handleDown = function (a) { if (this.$document.on(this.moveEvent, this.handleMove), this.$document.on(this.endEvent, this.handleEnd), !((" " + a.target.className + " ").replace(/[\n\t]/g, " ").indexOf(this.options.handleClass) > -1)) { var b = this.getRelativePosition(a), c = this.$range[0].getBoundingClientRect()[this.DIRECTION], d = this.getPositionFromNode(this.$handle[0]) - c, e = "vertical" === this.orientation ? this.maxHandlePos - (b - this.grabPos) : b - this.grabPos; this.setPosition(e), b >= d && b < d + this.handleDimension && (this.grabPos = b - d) } }, j.prototype.handleMove = function (a) { a.preventDefault(); var b = this.getRelativePosition(a), c = "vertical" === this.orientation ? this.maxHandlePos - (b - this.grabPos) : b - this.grabPos; this.setPosition(c) }, j.prototype.handleEnd = function (a) { a.preventDefault(), this.$document.off(this.moveEvent, this.handleMove), this.$document.off(this.endEvent, this.handleEnd), this.$element.trigger("change", { origin: this.identifier }), this.onSlideEnd && "function" == typeof this.onSlideEnd && this.onSlideEnd(this.position, this.value) }, j.prototype.cap = function (a, b, c) { return b > a ? b : a > c ? c : a }, j.prototype.setPosition = function (a, b) { var c, d; void 0 === b && (b = !0), c = this.getValueFromPosition(this.cap(a, 0, this.maxHandlePos)), d = this.getPositionFromValue(c), this.$fill[0].style[this.DIMENSION] = d + this.grabPos + "px", this.$handle[0].style[this.DIRECTION_STYLE] = d + "px", this.setValue(c), this.position = d, this.value = c, b && this.onSlide && "function" == typeof this.onSlide && this.onSlide(d, c) }, j.prototype.getPositionFromNode = function (a) { for (var b = 0; null !== a;)b += a.offsetLeft, a = a.offsetParent; return b }, j.prototype.getRelativePosition = function (a) { var b = i(this.COORDINATE), c = this.$range[0].getBoundingClientRect()[this.DIRECTION], d = 0; return "undefined" != typeof a["page" + b] ? d = a["client" + b] : "undefined" != typeof a.originalEvent["client" + b] ? d = a.originalEvent["client" + b] : a.originalEvent.touches && a.originalEvent.touches[0] && "undefined" != typeof a.originalEvent.touches[0]["client" + b] ? d = a.originalEvent.touches[0]["client" + b] : a.currentPoint && "undefined" != typeof a.currentPoint[this.COORDINATE] && (d = a.currentPoint[this.COORDINATE]), d - c }, j.prototype.getPositionFromValue = function (a) { var b, c; return b = (a - this.min) / (this.max - this.min), c = Number.isNaN(b) ? 0 : b * this.maxHandlePos }, j.prototype.getValueFromPosition = function (a) { var b, c; return b = a / (this.maxHandlePos || 1), c = this.step * Math.round(b * (this.max - this.min) / this.step) + this.min, Number(c.toFixed(this.toFixed)) }, j.prototype.setValue = function (a) { (a !== this.value || "" === this.$element[0].value) && this.$element.val(a).trigger("input", { origin: this.identifier }) }, j.prototype.destroy = function () { this.$document.off("." + this.identifier), this.$window.off("." + this.identifier), this.$element.off("." + this.identifier).removeAttr("style").removeData("plugin_" + k), this.$range && this.$range.length && this.$range[0].parentNode.removeChild(this.$range[0]) }, a.fn[k] = function (b) { var c = Array.prototype.slice.call(arguments, 1); return this.each(function () { var d = a(this), e = d.data("plugin_" + k); e || d.data("plugin_" + k, e = new j(this, b)), "string" == typeof b && e[b].apply(e, c) }) }, "rangeslider.js is available in jQuery context e.g $(selector).rangeslider(options);" });
$(function () {
    $('input[type="range"]').rangeslider({
        polyfill: false,
        
        onInit: function () {
            // var val = $(this).val();
            // console.log( val);
            getPrice = $("#pointstopredicts").data('price') ?? 0;
            var requestPrice = getPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            
            $('.header .pull-right').text(requestPrice ? requestPrice + 'VND' : $('input[type="range"]').val() + 'VND' );
        },
        onSlide: function (position, value) {
            // console.log('onSlide');
            // console.log('position: ' + position, 'value: ' + value);
            var price = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            $('.header .pull-right').text(price + 'VND');
            $("#search-products").submit();
        },
        onSlideEnd: function (position, value) {
            // console.log('onSlideEnd');
            // console.log('position2: ' + position, 'value2: ' + value);
        }
        
    });
});

$('.add-cart').on('click', function () {
    let token = $('meta[name="csrf-token"]').attr('content');
    let id = $(this).data('id');
    let name = $(this).data('name');
    let price = $(this).data('price');
    let quantity = $(this).data('quantity');
    let image = $(this).data('image');
    let color = $(this).data('color');
    let brand = $(this).data('brand');
    let url = $(this).data('url');
    
    $.ajax({
        type: "POST",
        url: url,
        data: {
            _token: token,
            id:id,
            name:name,
            price:price,
            quantity:quantity,
            image:image,
            color:color,
            brand:brand,
           
        },
        success:function(msg){
            // localStorage.setItem('data', JSON.stringify(msg));
            sessionStorage.setItem("data", JSON.stringify(msg));
        },
        error: function (xhr, ajaxOptions, thrownError, msg) {
            
        }
    });
})


// update add to cart
function countProduct(id, num) {
    var total_price_money = document.getElementById("totalPrice" + id.toString()).getAttribute("data-price");
    document.getElementById("p_" + id.toString()).innerHTML = currencyFormat(total_price_money * num);
    var id = $("#totalPrice"+id.toString()).data('id');
    $(".updatedataProductCart").data('quantity',  num);
    console.log(total_price_money * num, "total_price_money")
    console.log(num, "num")
}

function currencyFormat(num) {
    return num.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + 'VND'
}


function countProductDetail(id, num) {
    var total_price_money = document.getElementById("totalPrice" + id.toString()).getAttribute("data-price");
    document.getElementById("p_" + id.toString()).innerHTML = currencyFormat(total_price_money * num);
    var id = $("#totalPrice"+id.toString()).data('id');
    $(".add-to-cart-product").data('quantity',  num);
}


$(".updatedataProductCart").on('click', function (e) {
    let token = $('meta[name="csrf-token"]').attr('content');
    let id = $(this).data('id');
    let name = $(this).data('name');
    let price = $(this).data('price');
    let quantity = $(this).data('quantity');
    let image = $(this).data('image');
    let color = $(this).data('color');
    let brand = $(this).data('brand');
    let url = $(this).data('url');
    $.ajax({
        type: "POST",
        url: url,
        data: {
            _token: token,
            id:id,
            name:name,
            price:price,
            quantity:quantity,
            image:image,
            color:color,
            brand:brand,
           
        },
        success:function(msg){
            // localStorage.setItem('data', JSON.stringify(msg));
            sessionStorage.setItem("data", JSON.stringify(msg));
            location.reload();
        },
        error: function (xhr, ajaxOptions, thrownError, msg) {
            
        }
    });

});


$('.confirm-delete').on('click', function (e) {
    var urlDelete = $(this).data('url');
    $.ajax({
        type: "GET",
        url: urlDelete,
        success: function (data) {
            location.reload();
        },
    });
});


// Select City
$('#select-city').on('change', function() {
    // var selValue = $(this).val();

    var id = $(this).val();
    var city_name = $(this).children("option:selected").html();
    var city_val = $(this).children("option:selected").val();
    $('#city_name').val(city_val);
    $('#district').html('');

    if(id != -1){
        $.ajax({
            url: 'load-city/' + id,
            type: 'GET',
            success: function(data) {
                data.map(e=>{
                    $('#district').append("<option value="+e.id+">"+e.name+"</option>")
                })

                var district_name = $("#district").children("option:selected").html();
                var district_val = $("#district").children("option:selected").val();

                $('#district_name').val(district_val);
            }
        });
    }else {
        $('#district').append("<option value='-1'>Vui nhập chọn quận huyện</option>");
    }

});

// district
$('#district').change(function(event) {
    var id = $(this).val();
    var district_val  = $(this).children("option:selected").val();
    var city_val = $("#select-city").children("option:selected").val();
    $('#city_name').val(city_val);
    $('#district_name').val(district_val);
});

// event onclick search News
$(".checkbox-input-item").on('click', function () {
    $("#search-news").submit();
})

// For View in cart

$(".cart").on('click', function () {
    var $this = $(this),
    addToCart = $this.find(".add-to-cart"),
    viewInCart = $this.find(".view-in-cart");
    if(addToCart.is(':visible')) {
      addToCart.addClass("d-none");
      viewInCart.addClass("d-inline-block");
    }
    else{
      var href= viewInCart.attr('href');
      window.location.href = href;
    }
})

$(".view-in-cart").on('click', function(e){
    e.preventDefault();
});

// event onclick search News
$(".tab-brand-item").on('click', function () {
    var BrandID = $(this).data('brand');
    $("#search-tab-brand-" +  BrandID).submit();
})


function changeQuantity (name) {
    $(".add-to-cart-product").data('quantity',  name);
}

$(".add-to-cart-product").on('click', function (){
    let token = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).data('id');
    var name = $(this).data('name');
    var price = $(this).data('price');
    var image = $(this).data('image');
    var color = $(this).data('color');
    var brand = $(this).data('brand');
    var url = $(this).data('url');
    var quantity = $(this).data('quantity');
    var checkout = $(this).data('checkout');
    var nameSale = $(this).data('name-sale');
    $.ajax({
        url: url,
        type: 'POST',
        // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
        data: {
            _token: token,
            id:id,
            name:name,
            price:price,
            quantity:quantity,
            image:image,
            color:color,
            brand:brand,
            nameSale:nameSale,
        },
        dataType: 'json',
        success:function(msg){
            window.location.href = checkout;
        },
    })

})

// $('#slick1').slick({
//     rows: 1,
//     dots: false,
//     arrows: true,
//     infinite: true,
//     speed: 300,
//     slidesToShow: 6,
//     slidesToScroll: 6
// });

$('.onclick-item').on('click', function (e) {
    var id = $(this).data('id');
    var url = $(this).data('url');
    $.ajax({
        url: url,
        type: 'GET',
        // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)'
        success: function (data) {
            window.setTimeout(function(){ } ,1000);
            location.href = url + '#tab-Categories'
            // location.reload();
        },
    })
})

$('.click-all-brand').on('click', function (e) {
    var url = $(this).data('url');
    location.href = url + '#tab-Categories'
})


$("#detail-brand-carousel").owlCarousel({
    items: 1,
    autoplay: false,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    margin: 0,
    nav: false,
    dots: true,
    loop: true,
    
    onInitialized: counter, //When the plugin has initialized.
    onTranslated: counter // When the translation of the stage has finished.
});

$("#detail-popup-brand-carousel").owlCarousel({
    items: 1,
    autoplay: false,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    margin: 0,
    nav: false,
    dots: true,
    loop: true,
    
    onInitialized: counter, //When the plugin has initialized.
    onTranslated: counter // When the translation of the stage has finished.
});
// cusotmer slider news home

$(".home-news #news-carousel").owlCarousel({
    items: 4,
    autoplay: false,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    margin: 0,
    nav: false,
    dots: true,
    loop: true,
    responsive: {
        
        0: {
            items: 1,
            dots: true,
            loop: true,
        },
        640: {
            items: 1,
            dots: true,
            loop: true,
        },
        768: {
            items: 3,
            dots: true,
            loop: true,
        },
        992: {
            items: 4,
            dots: true,
        },
        1200: {
            items: 4
        },
        1800: {
            items: 4
        }
    },
    onInitialized: counter, //When the plugin has initialized.
    onTranslated: counter // When the translation of the stage has finished.
});
function counter(event) {
    var element = event.target;         // DOM element, in this example .owl-carousel
    var items = event.item.count;     // Number of items
    var item = event.item.index + 1;     // Position of the current item

    // it loop is true then reset counter from 1
    if (item > items) {
        item = item - items
    }
    $('.home-news .owl-page').html(item + "of" + items)
}

$("#product-detail #detail-product-carousel").owlCarousel({
    items: 1,
    autoplay: false,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    margin: 0,
    nav: false,
    dots: true,
    loop: true,
    
    onInitialized: counter, //When the plugin has initialized.
    onTranslated: counter // When the translation of the stage has finished.
});
function counter(event) {
    var element = event.target;         // DOM element, in this example .owl-carousel
    var items = event.item.count;     // Number of items
    var item = event.item.index + 1;     // Position of the current item

    // it loop is true then reset counter from 1
    if (item > items) {
        item = item - items
    }
    $('.home-news .owl-page').html(item + "of" + items)
}

$("#featured-category").owlCarousel({
    items: 5,
    autoplay: false,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    margin: 0,
    nav: false,
    dots: true,
    loop: true,
    responsive: {
        
        0: {
            items: 1,
            dots: true,
            loop: true,
        },
        640: {
            items: 1,
            dots: true,
            loop: true,
        },
        768: {
            items: 3,
            dots: true,
            loop: true,
        },
        992: {
            items: 4,
            dots: true,
        },
        1200: {
            items: 4
        },
        1800: {
            items: 4
        }
    },
    onInitialized: counter, //When the plugin has initialized.
    onTranslated: counter // When the translation of the stage has finished.
});


$(".change-image").on('click', function (){
    let token = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).data('id');
    var idProduct = $(this).data('id-product');
    // $(".img-left-product").addClass("hidden-group-image");
    let url = $(this).data('url');
    let data = {
        _token: token,
        "idColor":  id,
        "idProduct":  idProduct,
    }
    if(id) {
        $.ajax({
            
            type: 'POST',
            url: url,
            data: data,
            // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)'
            dataType: 'json',
            success: function (response) {
                if(response.status == true) {
                    $("#change-image-color").html(response.html);
                    additionalCarousel('.additional-carousel');
                    // window.location.reload
                    // console.log(response, "response")
                    // var district_val = $("#district")
                    // var district_val = $("#district").children("option:selected").val();

                    // $('#district_name').val(district_val);
                }
                
            },
        })
    }
})

$('.load-image-oa').on('click', function (e) {
    console.log('object')
})



$('.get-price-sale').on('change', function (e) {
    $(".product-prices .price").addClass("d-none");
    $(".product-prices .discount-sale").addClass("d-none");
    $(".product-prices .price-sale").addClass("d-none");
    let price = 0;
    let nameCategory = [];
    $('select.get-price-sale').each(function(){
        price = price + parseInt($(this).find('option:selected').val());
        nameCategory.push({"name": $(this).find('option:selected').text()})
    })
    $(".product-prices .current-price").append('<span itemprop="price" class="price show-rice-sale">' + price.toLocaleString() + " VNĐ" +'</span>');
    if(price === 0) {
        $(".product-prices .price").removeClass("d-none");
        $(".product-prices .discount-sale").removeClass("d-none");
        $(".product-prices .price-sale").removeClass("d-none");
        $(".product-prices .show-rice-sale").addClass("d-none");
    }
    totalPrice = price.toLocaleString()
    $(".add-to-cart-product").data('price',  price);
    $(".add-to-cart-product").data('name-sale',  nameCategory);
    console.log(nameCategory)
    console.log(price)
});
/*
	Load more content with jQuery - May 21, 2013
	(c) 2013 @ElmahdiMahmoud
*/   



// $('body').bind('cut copy paste',function(e) { // vô hiệu hóa trên toàn bộ web
//     e.preventDefault(); return false; 
// });
// $('#not-coppy-content').bind('cut copy paste',function(e) { // vô hiệu hóa trên 1 thẻ được chỉ định ID
//     e.preventDefault(); return false; 
// });


//Vô hiệu hóa: chuột phải
// $("body").on("contextmenu",function(e){ // vô hiệu hóa trên toàn bộ web
//     return false;
// });
$('.not-coppy-content').on("contextmenu",function(e){ // vô hiệu hóa trên 1 thẻ được chỉ định ID
    return false;
});


// $(window).on('resize', function(){
//     var win = $(this); //this = window
//     if (win.width()< 992) { 
//         alert('Please'); 
//         $('.menu-category-destop').remove()
//     }
// });


$(function () {
    $(".item-load-more").slice(0, 10).show();
    $("#loadMore").on('click', function (e) {
        e.preventDefault();
        $(".item-load-more:hidden").slice(0, 10).slideDown();
        if ($(".item-load-more:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }
        $('html,body').animate({
            scrollTop: $(this).offset().top
        }, 1500);
    });
});

// $('a[href=#top]').click(function () {
//     $('body,html').animate({
//         scrollTop: 0
//     }, 600);
//     return false;
// });

// $(window).scroll(function () {
//     if ($(this).scrollTop() > 50) {
//         $('.totop a').fadeIn();
//     } else {
//         $('.totop a').fadeOut();
//     }
// });

// function isMobile() {
//     return $(window).width() <= 900;
// }

// Usage example
// if (isMobile()) {
//     console.log("Mobile viewport detected!");
//     let getClassDestop = document.getElementsByClassName('topnav-category');
//     for (let i = 0; i < getClassDestop.length; i++) {
//         getClassDestop[i].classList.add('dropdown-category-mobile');
//     }
// } else {
//     let getClassDestop = document.getElementsByClassName('topnav-category');
//     for (let i = 0; i < getClassDestop.length; i++) {
//         getClassDestop[i].classList.add('dropdown-category-destop');
//     }

//     console.log(getClassDestop, "getClassDestop")
// }