// $(".number_format").on(
//     "keydown keyup mousedown mouseup blur",
//     function (event) {
//         $(this).val(function (index, value) {
//             value = value.replace(/,/g, "");
//             return numberWithCommas(value);
//         });
//     }
// );

$("body").delegate(".number_format", "keydown keyup mousedown mouseup blur", function() {
    $(this).val(function (index, value) {
        value = value.replace(/,/g, "");
        return numberWithCommas(value);
    });
})


function numberWithCommas(x) {
    let parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}

function countProduct(id, num) {
    let idImport = 1;
    let idPurchase = 2;
    console.log(num, "num");
    var total_price_money = $(".data-import-price").val();
    let formatImportPrice = total_price_money.replace(/\W/g, "");

    var total_purchase_price = $(".data-purchase-price").val();
    let formatPurchasePrice = total_purchase_price.replace(/\W/g, "");

    console.log(currencyFormat(formatImportPrice * num), "sj");
    document.getElementById("import_prices").innerHTML = currencyFormat(
        formatImportPrice * num
    );
    document.getElementById("purchase_price").innerHTML = currencyFormat(
        formatPurchasePrice * num
    );
    var id = $("#totalPrice" + id.toString()).data("id");
    $(".updatedataProductCart").data("quantity", num);
}

function currencyFormat(num) {
    return num.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") + "VND";
}

function removeCommas($num) {
    return intval(preg_replace("/[^d.]/", "", $num));
}

$(".delete-product").on("click", function (e) {
    e.preventDefault();
    let token = $('meta[name="csrf-token"]').attr("content");
    var id = $(this).data("id");
    var urlDelete = $(this).data("url");
    $.ajax({
        url: urlDelete,
        type: "delete",
        data: {
            id: id,
            _token: token,
        },
        success: function (msg) {
            console.log(msg, "msg");
            location.reload();
        },
    });
});

$(".confirm-delete").on("click", function (e) {
    let token = $('meta[name="csrf-token"]').attr("content");
    var id = $(this).data("id");
    var urlDelete = $(this).data("url");
    $.ajax({
        type: "DELETE",
        url: urlDelete,
        // data: {id: id},
        data: {
            id: id,
            _token: token,
        },
        success: function (msg) {
            console.log(msg, "msg");
            location.reload();
        },
    });
});

$(".submit-model-all").click(function (e) {
    e.preventDefault();
    let token = $('meta[name="csrf-token"]').attr("content");
    var name = $(".name").val();
    var weight = $(".weight").val();
    var host = $(this).data("host");
    var id = $(this).data("id");
    $.ajax({
        _token: token,
        type: "POST",
        url: host,
        data: {
            id: id,
            name: name,
            weight: weight,
            _token: token,
        },

        success: function (msg) {
            $("#msg").html(msg);
            $(".alert-success").removeClass("d-none");
            window.setTimeout(function () {
                $(".alert-success").addClass("d-none");
            }, 3000);
            window.setTimeout(function () {
                location.reload();
            }, 3100);
        },
        error: function (xhr, ajaxOptions, thrownError, msg) {
            $("#msg").html(msg);
            $(".alert-danger").removeClass("d-none");
            window.setTimeout(function () {
                $(".alert-danger").addClass("d-none");
            }, 10000);
        },
    });
    // $("#submitForm").submit();
});

function changeName(name) {
    $(".submit-model-update").data("name", name);
}

function changeWeight(weight) {
    $(".submit-model-update").data("weight", weight);
}

$(".submit-model-update").click(function (e) {
    e.preventDefault();
    let token = $('meta[name="csrf-token"]').attr("content");
    var name = $(this).data("name");
    var weight = $(this).data("weight");
    var host = $(this).data("host");
    var id = $(this).data("id");
    $.ajax({
        _token: token,
        type: "POST",
        url: host,
        data: {
            id: id,
            name: name,
            weight: weight,
            _token: token,
        },

        success: function (msg) {
            $("#msg").html(msg);
            $(".alert-success").removeClass("d-none");
            window.setTimeout(function () {
                $(".alert-success").addClass("d-none");
            }, 3000);
            window.setTimeout(function () {
                location.reload();
            }, 3100);
        },
        error: function (xhr, ajaxOptions, thrownError, msg) {
            $("#msg").html(msg);
            $(".alert-danger").removeClass("d-none");
            window.setTimeout(function () {
                $(".alert-danger").addClass("d-none");
            }, 10000);
        },
    });
    // $("#submitForm").submit();
});

$(".search-categories").change(function () {
    $("#search-category").submit();
});

$(".cateOpen").on("click", function (e) {
    var id = $(this).data("id");
    if ($(this).is(":checked")) {
        $(this).closest("li").find("ul").removeClass("d-none");
    } else {
        $(this).closest("li").find("ul").addClass("d-none");
    }
});

$("#priceDiscount").change(function () {
    var main = $("#priceBalance").val();
    let formatImportPrice = main.replace(/\W/g, "");
    var disc = $("#priceDiscount").val();
    var dec = (disc / 100).toFixed(2); //its convert 10 into 0.10
    var mult = formatImportPrice * dec; // gives the value for subtract from main value
    var discont = formatImportPrice - mult;
    $("#priceResult").val(currencyFormat(discont));
});

function currencyFormat(num) {
    return num.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
}

$(".update-color-image").on("click", function (e) {
    let token = $('meta[name="csrf-token"]').attr("content");
    var idColor = $(this).data("id-color");
    var idProduct = $(this).data("id-product");
    var idProductImage = $(this).data("id-product-image");
    var urlUpdate = $(this).data("url");
    $.ajax({
        type: "POST",
        url: urlUpdate,
        // data: {id: id},
        data: {
            idProductImage: idProductImage,
            idColor: idColor,
            idProduct: idProduct,
            _token: token,
        },
        success: function (msg) {
            console.log(msg, "msg");
        },
    });
});

$("input[name=currentWeight]").change(function (e) {
    let token = $('meta[name="csrf-token"]').attr("content");
});

function changeWeight(weight) {
    $(".change-weight-api").data("weight", weight);
}

$(".change-weight-api").change(function () {
    let token = $('meta[name="csrf-token"]').attr("content");
    var idImage = $(this).data("id-image");
    var weight = $(this).data("weight");
    var urlUpdate = $(this).data("url");
    $.ajax({
        type: "put",
        url: urlUpdate,
        data: {
            idProductImage: idImage,
            weight: weight,
            _token: token,
        },
        success: function (msg) {
            result = msg;
        },
    });
});

$(".get-map").change(function () {
    var name = $(".address").val();
    console.log(name);
});

$(".update-order").on("click", function (e) {
    let token = $('meta[name="csrf-token"]').attr("content");
    var ship = $(this).data("ship");
    var id = $(this).data("id");
    var urlUpdate = $(this).data("url");
    $.ajax({
        type: "put",
        url: urlUpdate,
        data: {
            ship: ship,
            id: id,
            _token: token,
        },
        success: function (msg) {
            location.reload();
        },
    });
});

// $(".add-price-sale").on("click", function () {
//     var playerHand = ["King Ace", "King Heart"]; // and so on
//     var container = document.createElement("div");
//     //A string containing a series of divs and the contents of the Array.
//     container.innerHTML = "<div>" + playerHand.join("</div><div>") + "</div>";
//     //append inner divs to outer div
//     $(".gamebox").append(container);
// });




$(".add-price-sale").on("click", function() {
    let token = $('meta[name="csrf-token"]').attr("content");

    var playerHand = ["King Ace", "King Heart"]; // and so on
    var container = document.createElement("section");
    console.log(container, "container")
    //A string containing a series of divs and the contents of the Array.
    $(".container-price-sale").addClass('add-boder');
    let items = $(".container-price-sale .price_row").length + 1;
    var url = $(this).data("url");
    console.log(url, "url")
    $.ajax({
        type: "POST",
        url: url,
        data: {
            _token: token,
        },
        success: function (response) {
            if(response.status === true) {
                container.innerHTML = "<div class='row price_row'>" +
                "<div class='delete-item-price-sale-right delete-item-price-sale hidden-item-price-sale'>" +
                    "<i class='feather icon-x'></i>" +
                "</div>" +
                "<div class='col-md-4'>" +
                    "<div class='select-category'>" +
                        "<div class='form-group'>" +
                            "<label>Danh Mục</label>" +
                            "<div class='controls'>" +
                                "<select class='form-control' name='prductPriceSale["+items+"][parent_cate]'>" +
                                    "<option>Tất cả</option>" +
                                    response.data.map((item, key) => {
                                        return (
                                            "<option value='" + item.id  + "'>" + item.name + "</option>" +
                                            item.chillParent.map((itemChillParent , keyChillParent) => {
                                                return ("<option value='" + itemChillParent.id  + "'>&ensp;&ensp; |-->" + itemChillParent.name + "</option>") +
                                                itemChillParent.childLevelParent.map((itemChildLevelParent, keyChildLevelParent) => {
                                                    // return ("<option value='" + itemChildLevelParent.id  + "'>&ensp;&ensp;&ensp;&ensp; |---->" + itemChildLevelParent.name + "</option>")
                                                })
                                            })
                                        );
                                    })+
                                "</select>" + 
                            "</div>" +
                        "</div>" +
                    "</div>" +
                "</div>"+
                "<div class='col-md-4'>" +
                    "<div class='select-category'>" +
                        "<div class='form-group'>" +
                            "<label>Danh Mục</label>" +
                            "<div class='controls'>" +
                                "<select class='form-control' name='prductPriceSale["+items+"][cate]'>" +
                                    "<option>Tất cả</option>" +
                                    response.data.map((item, key) => {
                                        return (
                                            "<option value='" + item.id  + "'>" + item.name + "</option>" +
                                            item.chillParent.map((itemChillParent , keyChillParent) => {
                                                return ("<option value='" + itemChillParent.id  + "'>&ensp;&ensp; |-->" + itemChillParent.name + "</option>") +
                                                itemChillParent.childLevelParent.map((itemChildLevelParent, keyChildLevelParent) => {
                                                    return ("<option value='" + itemChildLevelParent.id  + "'>&ensp;&ensp;&ensp;&ensp; |---->" + itemChildLevelParent.name + "</option>")
                                                })
                                            })
                                        );
                                    })+
                                "</select>" + 
                            "</div>" +
                        "</div>" +
                    "</div>" +
                "</div>"+
                "<div class='col-md-4'>" +
                    "<div class='select-category'>" +
                        "<div class='form-group'>" +
                            "<label>Giá Giảm (VNĐ):</label>" +
                            "<div class='controls'>" +
                                "<input type='text' name='prductPriceSale["+items+"][price]' class='form-control number_format'>" +
                            "</div>" +
                        "</div>" +
                    "</div>" +
                "</div>"+
            "</div>";
            //append inner divs to outer div
            $(".container-price-sale").append(container);
            }
        },
    });
})

$("body").delegate(".delete-item-price-sale", "click", function() {
    $(this).closest('.price_row').remove()
})



$(".delete-item-price-sale").on("click", function() {
    let token = $('meta[name="csrf-token"]').attr("content");
    var id = $(this).data("id");
    var url = $(this).data("url");
    $.ajax({
        type: "delete",
        url: url,
        data: {
            id: id,
            _token: token,
        },
        success: function (response) {
            if(response.status === true) {
                location.reload();
            }
        },
    });
})
// $(document).ready(function () {
//     $("#two").after("<p>Hello, world!</p>");
//     $('<p>"Im a paragraph!"</p>').appendTo(".newclass");
//     $('<input type = "text" value = asdf></input>').appendTo(".newclass");
//     $("<p>adsf" + 2 + "</p>").appendTo(".newclass");
//     $("<p>" + 3 + "</p>").appendTo("#testid");
//     var j = [1, 23, 434, 545, 656];
//     var b = [1, 2, 3];
//     $("<p>" + b[1] + "</p>").appendTo(".newclass");
//     var sumlength = b.length + j.length;
//     for (i = 0; i < sumlength; i++) {
//         b.push(j[i]);
//         $("<div>" + b[i] + "</div>").appendTo(".newclass");
//     }
//     var toAdd = $("input[name=checkListItem]").val();
//     b.push(toAdd);
//     $("<p>" + toAdd + "</p>").appendTo(".testclass");
//     $(document).ready(function () {
//         $("#button").click(function () {
//             var toAdd = $("input[name=checkListItem]").val();
//             $(".list").append("<div class='item'>" + toAdd + "</div>");
//             b.push(toAdd);
//             for (i = 0; i < b.length; i++) {
//                 $("<p>" + b[i] + "</p>").appendTo(".testclass");
//                 //use remove method outside of method to get rid of undefined text in div class item
//             }
//         });
//     });
// });
