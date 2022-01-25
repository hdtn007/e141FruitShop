/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

/* like unlike*/
function myFunction(x) {
  x.classList.toggle(""&&"product-like-active");
}

/* long text */
function long_text(x) {
	var text = x.innerHTML
	if (text == "Xem thêm!") {
			x.innerHTML = "Ẩn bớt!"
			document.getElementById('shost_desc_product').className = "text-truncate-off";
	}
	else{
		x.innerHTML = "Xem thêm!"
		document.getElementById('shost_desc_product').className = "text-truncate";
	}
	
}

/**/

$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(form) {
	let output_provisional = form["output_provisional"];
	let output_number_unit = form["output_number_unit"];

	let input_quantity_cart = form["input_quantity_cart"];
	let input_sell_price_product = form["input_sell_price_product"];
	let input_number_unit_product = form["input_number_unit_product"];

	if (input_quantity_cart.value != '') {
		if (input_quantity_cart.value >= 0 ) {
			var x = parseInt(input_quantity_cart.value)*parseInt(input_sell_price_product.value);
			var y = parseInt(input_quantity_cart.value)*parseInt(input_number_unit_product.value);
		}
		else{
			var x = 1*parseInt(input_sell_price_product.value);
			var y = 1*parseInt(input_number_unit_product.value);
		}
		
	}
	else
	{
		var x = 1*parseInt(input_sell_price_product.value);
		var y = 1*parseInt(input_number_unit_product.value);
	}

	
	output_provisional.value = Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(x);
	output_number_unit.value = y;
}


/* View image  detail product */

function ViewImageProduct(x) {

  // var img = x.getElementsByTagName("img");
  var getImgPreview = x.getAttribute('data-bs-img-preview');
  var img = x.getAttribute('data-bs-img-input');  // detail product
  var btnctrl = document.getElementById('btncontrolprew');  // detail product

  var ImgPreview = document.getElementById(getImgPreview);
  var idzoomimgPrew = document.getElementById(idzoomimgPrew); // detail product

  ImgPreview.src= img;
  btnctrl.setAttribute("data-nameimg", img); // detail product

}

/* auto check input null*/
function auto_check_input_null(input_text)
{
    if(input_text.value==''||input_text.value==null)
        {input_text.value = '1'}
}


// setInterval(function(){
// })


// Get IP Address
/*
window.onload = function()
{
$.getJSON("https://api.ipify.org?format=json", function(data) {
       		 sessionStorage.setItem("ip_address", data.ip);
     	 });
};
*/

/* modal */
$('#quantity_update_modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') 
  var recipientID = button.data('cart-id') 
  var modal = $(this)
  modal.find('.modal-body input').val(recipient)
  modal.find('.modal-body #input_cart_id_quantity_product_update').val(recipientID)
})