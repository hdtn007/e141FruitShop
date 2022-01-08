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
  var recipientDescCountry = button.data('desccountry')

  var modal = $(this)
  modal.find('.modal-title').text('Thông tin xuất xứ từ ' + recipientNameCountry)
  modal.find('.form-group input').val(recipientNameCountry)
  modal.find('.form-group textarea').val(recipientDescCountry)
  document.getElementById('country_edit_imgpreview').src='public/media/img-icons/country/'+recipientEnsignCountry;
  modal.find('.code-edit-modal-hidden input').val(recipientIdCountry)

})

// BRAND ADD

$('#AddBrandTagModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var recipientNameCountry = button.data('namecountry')
  var recipientIdCountry = button.data('idcountry')
  var modal = $(this)
  modal.find('.modal-title').text('Thương hiệu của ' + recipientNameCountry)
  modal.find('.code-edit-modal-hidden input').val(recipientIdCountry)

})

// SUPPLIER EDIT

$('#supplier_modal_edit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var recipientNameSupplier = button.data('namesupplier')
  var recipientAddressSupplier = button.data('addresssupplier')
  var recipientPhoneSupplier = button.data('phonesupplier')
  var recipientEmailSupplier = button.data('emailsupplier')
  var recipientIdSupplier = button.data('idsupplier')

  var modal = $(this)
  modal.find('.modal-title').text('Sửa nhà cung cấp ' + recipientNameSupplier)
  modal.find('.form-group #edit_name_supplier').val(recipientNameSupplier)
  modal.find('.form-group #edit_address_supplier').val(recipientAddressSupplier)
  modal.find('.form-group #edit_phone_supplier').val(recipientPhoneSupplier)
  modal.find('.form-group #edit_email_supplier').val(recipientEmailSupplier)
  modal.find('.code-edit-modal-hidden input').val(recipientIdSupplier)

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

/* preview image country */

function PreviewUploadImage(inputFile) {

  var getImgPreview = inputFile.getAttribute('data-bs-img-preview');
  var getLinkZoom = inputFile.getAttribute('data-link-zoom-img'); //add&edit product
  
  var getmess_err = inputFile.getAttribute('data-bs-mess-err');
  var ImgPreview = document.getElementById(getImgPreview);
  var linkZoom = document.getElementById(getLinkZoom); //add&edit product
  var mainImg = document.getElementById('idzoomimg'); //add&edit product
  var linkmainImg = document.getElementById('btncontrolprew'); //add&edit product
  var mess_err = document.getElementById(getmess_err);

  ImgPreview.src=URL.createObjectURL(event.target.files[0]);
  mainImg.src=URL.createObjectURL(event.target.files[0]);
  linkZoom.setAttribute('data-bs-img-input' , URL.createObjectURL(event.target.files[0]));
  linkmainImg.setAttribute('data-nameimg' , URL.createObjectURL(event.target.files[0]));

    if (!inputFile.files[0]) {
        mess_err.innerHTML = "<i class='text-danger'> Chưa chọn hình ảnh !</i>";
    }
    else if (inputFile.files[0] && inputFile.files[0].type.includes('image'))
    {
        if ((inputFile.files[0].size / 1024) > 5000 ) {
          mess_err.innerHTML = "<i class='text-danger'> Ảnh phải nhỏ hơn 5MB !</i>";
        }
        else
        {
          mess_err.innerHTML = "<i class='text-info'> Ảnh phù hợp !</i>";
        }
            
    }
    else {
         mess_err.innerHTML = "<i class='text-danger'> Ảnh không đúng định dạng !</i>";
    }
}
/*
function previewUploadManyImages() {

  var preview = document.querySelector('#preview_many_img');
  
  if (this.files) {
    [].forEach.call(this.files, readAndPreview);
  }

  function readAndPreview(file) {

    // Make sure `file.name` matches our extensions criteria
    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
      return alert(file.name + " is not an image");
    } // else...
    
    var reader = new FileReader();
    
    reader.addEventListener("load", function() {
      var image = new Image();
      image.height = 80;
      image.title  = file.name;
      image.src    = this.result;
      //image.innerHTML= '<a onclick="ViewImageProduct(this)" data-bs-img-preview="idzoomimg" data-bs-img-input="'+this.result+'"> <img width="80" src="'+this.result+'" ></a>';
      preview.appendChild(image);
    });
    
    reader.readAsDataURL(file);
    
  }

}
document.querySelector('#input_add_img_product').addEventListener("change", previewUploadManyImages);
*/
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



/*
███████╗ ██████╗ ██████╗ ███╗   ███╗
██╔════╝██╔═══██╗██╔══██╗████╗ ████║
█████╗  ██║   ██║██████╔╝██╔████╔██║
██╔══╝  ██║   ██║██╔══██╗██║╚██╔╝██║
██║     ╚██████╔╝██║  ██║██║ ╚═╝ ██║
╚═╝      ╚═════╝ ╚═╝  ╚═╝╚═╝     ╚═╝
                                    
██╗   ██╗ █████╗ ██╗     ██╗██████╗  █████╗ ████████╗██╗ ██████╗ ███╗   ██╗
██║   ██║██╔══██╗██║     ██║██╔══██╗██╔══██╗╚══██╔══╝██║██╔═══██╗████╗  ██║
██║   ██║███████║██║     ██║██║  ██║███████║   ██║   ██║██║   ██║██╔██╗ ██║
╚██╗ ██╔╝██╔══██║██║     ██║██║  ██║██╔══██║   ██║   ██║██║   ██║██║╚██╗██║
 ╚████╔╝ ██║  ██║███████╗██║██████╔╝██║  ██║   ██║   ██║╚██████╔╝██║ ╚████║
  ╚═══╝  ╚═╝  ╚═╝╚══════╝╚═╝╚═════╝ ╚═╝  ╚═╝   ╚═╝   ╚═╝ ╚═════╝ ╚═╝  ╚═══╝

*/

// Example starter JavaScript for disabling form submissions if there are invalid fields
// https://getbootstrap.com/docs/4.6/components/forms/
// https://stackoverflow.com/questions/43481237/bootstrap-4-form-validation
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

// validateForm


function auto_check_price(input_text)
{
    if(input_text.value==''||input_text.value==null)
        {input_text.value = '0'}
}

function check_format_input(check, input_text){

    var id_mess_err = input_text.getAttribute("data-mess-err");
    var mess_err = document.getElementById(id_mess_err);

    if (check == 1) // check email format
    {
        // var regEmail = /^[A-Za-z][\w$.]+@[\w]+\.\w+$/;
        var regEmail = /^[A-Za-z][\w$.]+@[\w]+\.[\w]{3,}$/;

            if (regEmail.test(input_text.value)){
                // mess_err.innerHTML = '';
            }
            else
            {
                mess_err.innerHTML = 'Email không hợp lệ !';
                return false;
            }
    }
    else if(check == 2) // check text code
    {
        var regCode = /^[A-Za-z0-9]{1,}$/;

        if (regCode.test(input_text.value)){
                // mess_err.innerHTML = '';
        }
        else
        {
            mess_err.innerHTML = 'Mã nhập không hợp lệ !';
            return false;
        }
    }



}

function validationForm(){
  var input_add_code_product = document.forms["form_add_product"]["input_add_code_product"];
  if(check_format_input(2,input_add_code_product)==false){
       return false;
    }

  return true;
}


// checkbox value
function input_status_checkbox(input_text)
{
    
    if (input_text.checked) {
        input_text.value = 1;
    }
    else{
        input_text.value = 0;
    }
}

/*
 █████╗ ██╗   ██╗████████╗ ██████╗ 
██╔══██╗██║   ██║╚══██╔══╝██╔═══██╗
███████║██║   ██║   ██║   ██║   ██║
██╔══██║██║   ██║   ██║   ██║   ██║
██║  ██║╚██████╔╝   ██║   ╚██████╔╝
╚═╝  ╚═╝ ╚═════╝    ╚═╝    ╚═════╝ 
                                 
*/

// auto change text Đơn Vị Tính

function auto_change_text_dvt(input_text)
{
    var dvt = document.getElementsByClassName('dvt__dvt');

    var number = document.getElementById('input_add_numberunit_product');
    var unit = document.getElementById('input_add_unit_product');

    for(var i = 0; i < dvt.length; i++){
    dvt[i].innerText= number.value +' '+ unit.value;    // Change the content
    }
}

function auto_change_text_dvt_update(input_text)
{
    var dvt = document.getElementsByClassName('dvt__dvt');

    var number = document.getElementById('input_update_numberunit_product');
    var unit = document.getElementById('input_update_unit_product');

    for(var i = 0; i < dvt.length; i++){
    dvt[i].innerText= number.value +' '+ unit.value;    // Change the content
    }
}

// thay đổi thông báo chọn ngày tháng năm
function auto_change_text_ddmmyy(input_text)
{
    var mess = document.getElementsByClassName('ddmmyy');

    if (input_text.value == 1) {
        mess[0].innerText='';
    }
    else if(input_text.value == 2)
    {
        mess[0].innerText='Lưu ý : chu kỳ sẽ được tính theo ngày (30n/1T)'
    }
    else
    {
        mess[0].innerText='Lưu ý : chu kỳ sẽ được tính theo ngày (365n/1N)'
    }
}


/*
██████╗ ███████╗██████╗ ███████╗███╗   ██╗██████╗ ███████╗███╗   ██╗████████╗    
██╔══██╗██╔════╝██╔══██╗██╔════╝████╗  ██║██╔══██╗██╔════╝████╗  ██║╚══██╔══╝    
██║  ██║█████╗  ██████╔╝█████╗  ██╔██╗ ██║██║  ██║█████╗  ██╔██╗ ██║   ██║       
██║  ██║██╔══╝  ██╔═══╝ ██╔══╝  ██║╚██╗██║██║  ██║██╔══╝  ██║╚██╗██║   ██║       
██████╔╝███████╗██║     ███████╗██║ ╚████║██████╔╝███████╗██║ ╚████║   ██║       
╚═════╝ ╚══════╝╚═╝     ╚══════╝╚═╝  ╚═══╝╚═════╝ ╚══════╝╚═╝  ╚═══╝   ╚═╝       

██████╗ ██████╗  ██████╗ ██████╗ ██████╗  ██████╗ ██╗    ██╗███╗   ██╗
██╔══██╗██╔══██╗██╔═══██╗██╔══██╗██╔══██╗██╔═══██╗██║    ██║████╗  ██║
██║  ██║██████╔╝██║   ██║██████╔╝██║  ██║██║   ██║██║ █╗ ██║██╔██╗ ██║
██║  ██║██╔══██╗██║   ██║██╔═══╝ ██║  ██║██║   ██║██║███╗██║██║╚██╗██║
██████╔╝██║  ██║╚██████╔╝██║     ██████╔╝╚██████╔╝╚███╔███╔╝██║ ╚████║
╚═════╝ ╚═╝  ╚═╝ ╚═════╝ ╚═╝     ╚═════╝  ╚═════╝  ╚══╝╚══╝ ╚═╝  ╚═══╝
                                                                      
*/

jQuery(document).ready(function(){
    jQuery('#input_add_country_product').change(function(){
        // code
        let cid = jQuery(this).val();
        //alert(cid);
        if (cid) {}
        

    });
});


/*
██████╗ ██╗   ██╗████████╗████████╗ ██████╗ ███╗   ██╗
██╔══██╗██║   ██║╚══██╔══╝╚══██╔══╝██╔═══██╗████╗  ██║
██████╔╝██║   ██║   ██║      ██║   ██║   ██║██╔██╗ ██║
██╔══██╗██║   ██║   ██║      ██║   ██║   ██║██║╚██╗██║
██████╔╝╚██████╔╝   ██║      ██║   ╚██████╔╝██║ ╚████║
╚═════╝  ╚═════╝    ╚═╝      ╚═╝    ╚═════╝ ╚═╝  ╚═══╝

*/

function status_btn(input_text) {
    var status = 0;
    if (input_text.checked == true) {
        status = status + 1;
        document.getElementById("btn_delete_product").className = "btn btn-danger";
    }
    else{
        if (status == 1) {
            document.getElementById("btn_delete_product").className = "btn disabled btn-danger";
        }
        else{
            status = status - 1;
        }
    }
}