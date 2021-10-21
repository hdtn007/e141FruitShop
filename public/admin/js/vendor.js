// sử dụng cho popoper ----------------------------------------------------------

$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});

$('.popover-dismiss').popover({ 
  trigger: 'focus' // biến mất khi ấn chổ khác
})

// sử dụng cho modal chỉnh sửa, truyền data -----------------------------------------------------------

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

// sử dụng cho tooltip -----------------------------------------------------------
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});

// sử dụng cho alert auto close  ( thêm class .alert-auto-close vào alert cần auto close ) -----------------------------------------------------------
$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert-auto-close").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 5000);
 
});
