/*
██████╗  ██████╗ ██████╗  ██████╗ ██████╗ ███████╗██████╗ 
██╔══██╗██╔═══██╗██╔══██╗██╔═══██╗██╔══██╗██╔════╝██╔══██╗
██████╔╝██║   ██║██████╔╝██║   ██║██████╔╝█████╗  ██████╔╝
██╔═══╝ ██║   ██║██╔═══╝ ██║   ██║██╔═══╝ ██╔══╝  ██╔══██╗
██║     ╚██████╔╝██║     ╚██████╔╝██║     ███████╗██║  ██║
╚═╝      ╚═════╝ ╚═╝      ╚═════╝ ╚═╝     ╚══════╝╚═╝  ╚═╝

*/

// sử dụng cho popoper ----------------------------------------------------------

$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});

$('.popover-dismiss').popover({ 
  trigger: 'focus' // biến mất khi ấn chổ khác
})

/*
███╗   ███╗ ██████╗ ██████╗  █████╗ ██╗     
████╗ ████║██╔═══██╗██╔══██╗██╔══██╗██║     
██╔████╔██║██║   ██║██║  ██║███████║██║     
██║╚██╔╝██║██║   ██║██║  ██║██╔══██║██║     
██║ ╚═╝ ██║╚██████╔╝██████╔╝██║  ██║███████╗
╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝  ╚═╝╚══════╝

*/
// CATEGORY PRODUCT EDIT ---------------------

$('#CategoryModalEdit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipientName = button.data('namecatagory') // Extract info from data-* attributes
  var recipientCont = button.data('contentcategory') // data-* tên sau này tao tự đặt
  var recipientId = button.data('idcategory')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Sửa danh mục ' + recipientName)
  modal.find('.form-group input').val(recipientName)
  modal.find('.form-group textarea').val(recipientCont)
  modal.find('.code-edit-modal-hidden input').val(recipientId)

})

// COUNTRY EDIT

$('#BrandTagCountryModalEdit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var recipientNameCountry = button.data('namecountry')
  var recipientEnsignCountry = button.data('ensigncountry')
  var recipientIdCountry = button.data('idcountry')
  var modal = $(this)
  modal.find('.modal-title').text('Sửa danh mục ' + recipientNameCountry)
  modal.find('.form-group input').val(recipientNameCountry)
  document.getElementById('country_edit_imgpreview').src='public/media/img-icons/country/'+recipientEnsignCountry;
  modal.find('.code-edit-modal-hidden input').val(recipientIdCountry)

})

// BRAND EDIT

$('#AddBrandTagModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var recipientNameCountry = button.data('namecountry')
  var recipientIdCountry = button.data('idcountry')
  var modal = $(this)
  modal.find('.modal-title').text('Thương hiệu của ' + recipientNameCountry)
  modal.find('.code-edit-modal-hidden input').val(recipientIdCountry)

})


// DETAIL PRODUCT

$('#AddImportProductModal').on('shown.bs.modal', function() {
  $(this).find('[autofocus]').focus();
});


// view img

function showimgmodal(x)
{
    var getimg = x.getAttribute('data-nameimg');
    var ImgPreview = document.getElementById('idzoomimgPrew');
    ImgPreview.src = getimg;


}

/*
████████╗ ██████╗  ██████╗ ██╗  ████████╗██╗██████╗ 
╚══██╔══╝██╔═══██╗██╔═══██╗██║  ╚══██╔══╝██║██╔══██╗
   ██║   ██║   ██║██║   ██║██║     ██║   ██║██████╔╝
   ██║   ██║   ██║██║   ██║██║     ██║   ██║██╔═══╝ 
   ██║   ╚██████╔╝╚██████╔╝███████╗██║   ██║██║     
   ╚═╝    ╚═════╝  ╚═════╝ ╚══════╝╚═╝   ╚═╝╚═╝     
*/

// sử dụng cho tooltip -----------------------------------------------------------
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});


/*
 █████╗ ██╗     ███████╗██████╗ ████████╗
██╔══██╗██║     ██╔════╝██╔══██╗╚══██╔══╝
███████║██║     █████╗  ██████╔╝   ██║   
██╔══██║██║     ██╔══╝  ██╔══██╗   ██║   
██║  ██║███████╗███████╗██║  ██║   ██║   
╚═╝  ╚═╝╚══════╝╚══════╝╚═╝  ╚═╝   ╚═╝   

*/

// sử dụng cho alert auto close  ( thêm class .alert-auto-close vào alert cần auto close ) -----------------------------------------------------------
$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert-auto-close").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 5000);
 
});


/*
██╗███╗   ███╗ █████╗  ██████╗ ███████╗
██║████╗ ████║██╔══██╗██╔════╝ ██╔════╝
██║██╔████╔██║███████║██║  ███╗█████╗  
██║██║╚██╔╝██║██╔══██║██║   ██║██╔══╝  
██║██║ ╚═╝ ██║██║  ██║╚██████╔╝███████╗
╚═╝╚═╝     ╚═╝╚═╝  ╚═╝ ╚═════╝ ╚══════╝
                                       
*/

/* Preview image  detail product */

function PreviewImage(x) {

  // var img = x.getElementsByTagName("img");
  var getImgPreview = x.getAttribute('data-bs-img-preview');
  var img = x.getAttribute('data-bs-img-input');
  var btnctrl = document.getElementById('btncontrolprew');

  var ImgPreview = document.getElementById(getImgPreview);
  var idzoomimgPrew = document.getElementById(idzoomimgPrew);

  ImgPreview.src= img;
  btnctrl.setAttribute("data-nameimg", img);
  // idzoomimgPrew.src= img;
}

function validateFormEditCountry(){

    let inputFile = document.forms["form_edit_country"]["input_edit_country_img"];
    if (!inputFile.files[0]) {
      return true;
    }
    else if (inputFile.files[0] && inputFile.files[0].type.includes('image'))
    {
        if ((inputFile.files[0].size / 1024) > 5000 ) {
          return false;
        }
        else
        {
          return true;
        }
            
    }
    else {
         return false;
    }
}

function validateFormAddCountry(){

    let inputFile = document.forms["form_add_country"]["input_add_country_img"];
    if (!inputFile.files[0]) {
      alert('Chưa chọn ảnh quốc kỳ cho quốc gia này !');
      return false;
    }
    else if (inputFile.files[0] && inputFile.files[0].type.includes('image'))
    {
        if ((inputFile.files[0].size / 1024) > 5000 ) {
          return false;
        }
        else
        {
          return true;
        }
            
    }
    else {
         return false;
    }
}


/* Mode view product  */

/*
███████╗██╗██╗     ██╗  ████████╗███████╗██████╗     ██████╗  █████╗ ████████╗ █████╗     ██╗     ██╗███████╗████████╗
██╔════╝██║██║     ██║  ╚══██╔══╝██╔════╝██╔══██╗    ██╔══██╗██╔══██╗╚══██╔══╝██╔══██╗    ██║     ██║██╔════╝╚══██╔══╝
█████╗  ██║██║     ██║     ██║   █████╗  ██████╔╝    ██║  ██║███████║   ██║   ███████║    ██║     ██║███████╗   ██║   
██╔══╝  ██║██║     ██║     ██║   ██╔══╝  ██╔══██╗    ██║  ██║██╔══██║   ██║   ██╔══██║    ██║     ██║╚════██║   ██║   
██║     ██║███████╗███████╗██║   ███████╗██║  ██║    ██████╔╝██║  ██║   ██║   ██║  ██║    ███████╗██║███████║   ██║   
╚═╝     ╚═╝╚══════╝╚══════╝╚═╝   ╚══════╝╚═╝  ╚═╝    ╚═════╝ ╚═╝  ╚═╝   ╚═╝   ╚═╝  ╚═╝    ╚══════╝╚═╝╚══════╝   ╚═╝   
*/

function Search_class_function() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("input_search_subclas");
    filter = input.value.toUpperCase();
    ul = document.getElementById("UL_filter");
    li = ul.getElementsByClassName("row-filter");

    // alert(li.length);

    for (i = 0; i < li.length; i++) {

        a = li[i].getElementsByTagName("b")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
