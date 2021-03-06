

<?php $__env->startSection('admin-title'); ?>
Danh Mục Sản Phẩm
<?php $__env->stopSection(); ?>

<?php $__env->startSection('admin-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
  <div class=" d-sm-flex align-items-center justify-content-between mb-4">
    <div>
      <a href="#" class=" mx-0 btn btn-info btn-icon-split" type="button" data-toggle="modal" data-target="#CategoryModal">
          <span class="text"><i class="fas fa-plus"></i> Thêm</span>
      </a>
     
    </div>

    <div>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="dropdownReportFile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-download fa-sm text-white-50"></i> Xuất danh sách
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownReportFile">
          <div class="dropdown-header">Xuất theo định dạng:</div>
          <a class="dropdown-item" href="#">
            <i class="fas fa-download"></i> - Excel 
            <img class="icons-download" src="<?php echo e(('media/img-icons/excel.png')); ?>">
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-download"></i> - PDF 
            <img class="icons-download" src="<?php echo e(('media/img-icons/pdf.png')); ?>">
          </a>
        </div>
    </div>

  </div>
<!-- Begin Table Content _________________________________________________________________ -->
    
    
      <?php
    $message = Session::get('message_box_add_category');
    if($message){
      echo "<div class='alert alert-auto-close alert-success alert-dismissible fade show' role='alert'>
      <strong>Thông báo : </strong>".$message."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      </button>
      </div>";
      Session::put('message_box_add_category', null); // session message = null hiện thị duy nhất 1 lần
      }
      ?>
      
      <?php
    $message = Session::get('message_box_update_category_err');
    if($message){
      echo "<div class='alert alert-auto-close alert-danger alert-dismissible fade show' role='alert'>
      <strong>Thông báo : </strong>".$message."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      </button>
      </div>";
      Session::put('message_box_update_category_err', null); // session message = null hiện thị duy nhất 1 lần
      }
      ?>

      
      <?php
    $message = Session::get('message_box_delete_category_warning');
    if($message){
      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <strong>Thông báo : </strong>".$message."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      </button>
      </div>";
      Session::put('message_box_delete_category_warning', null); // session message = null hiện thị duy nhất 1 lần
      }
      ?>

      

  <div class="container-fluid">
    <!-- DataTales category -------------------------------------------------------------->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Danh sách các loại sản phẩm</h6>
          </div>
            <div class="card-body">
              <div class="table-responsive">   
                <table class="table" id="dataTableCategory" cellspacing="0">
                  <thead class="thead-dark-cus">
                    <tr>
                      <th scope="col">Mã</th>
                      <th scope="col">Tên Danh Mục</th>
                      <th scope="col">Người Tạo</th>
                      <th scope="col">Trạng Thái</th>
                      <th scope="col">Thao Tác</th>
                      <th scope="col">&nbsp;</th>
                    </tr>
                  </thead>
                  
                  <?php $stt = 0; ?>
                  <?php $__currentLoopData = $list_category_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cate_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  

                  <?php
                      if($cate_pro->category_sub == "0"){
                        $stt=$stt+1;
                      ?>
                  <tbody class="category-main">
                    <tr>
                      <td><?php echo e($stt); ?></td>
                      <td class="w-25"><?php echo e($cate_pro->category_name); ?></td>
                      <td><?php echo e($cate_pro->category_author); ?></td>
                      <td>
                        <label class="switch">
                          <input 
                            onclick="window.location.href='<?php echo e(URL::to('/edit-category-status/'.$cate_pro->category_id.'&'.$cate_pro->category_status.'&'.$cate_pro->category_sub)); ?>'" 
                              value="" 
                              type="checkbox" 
                              <?php if($cate_pro->category_status==1){
                            echo "checked";
                          }else{
                            echo "";
                          } ?>
                          >
                          <div class="slider round"></div>
                        </label>      
                      </td>
                      <td>
                        <button title="Thêm danh mục con" type="button" class="btn btn-success btn-sm px-3 collapsed" href="#" data-toggle="collapse" data-target="#categoryaddof<?php echo e($key); ?>" aria-expanded="true" aria-controls="categoryaddof<?php echo e($key); ?>">
                          <i class="fas fa-plus"></i>
                        </button>
                        
                      
                        <button title="Mô tả danh mục" type="button" class="btn btn-info btn-sm px-3 collapsed" href="#" data-container="body" data-html="true" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<?php echo e($cate_pro->category_desc); ?>">
                          <i class="fas fa-info-circle"></i>
                        </button>

                        <button title="Sửa tên danh mục" type="button" class="btn btn-warning btn-sm px-3" data-toggle="modal" data-target="#CategoryModalEdit" data-namecatagory="<?php echo e($cate_pro->category_name); ?>" data-contentcategory="<?php echo e($cate_pro->category_desc); ?>" data-idcategory="<?php echo e($cate_pro->category_id); ?>">
                          <i class="fas fa-edit"></i>
                        </button>
                        <a onclick="return confirm('Bạn có chắc muốn xóa danh mục <?php echo e($cate_pro->category_name); ?> ? | Thao tác này có thể xóa hết tất cả các danh mục con có trong danh mục !!!')" href="<?php echo e(URL::to('/delete-category-product/'.$cate_pro->category_id.'&'.$cate_pro->category_sub)); ?>" title="Xóa danh mục" type="button" class="btn btn-danger btn-sm px-3">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td>
                      <td>

                        <a class="nav-link collapsed text-primary" href="#" data-toggle="collapse" data-target="#danhmucconof<?php echo e($key); ?>" aria-expanded="true" aria-controls="danhmucconof<?php echo e($key); ?>">
                          <i class="fas fa-bars"></i>
                          <span>&nbsp;&nbsp;&nbsp;</span>
                        </a>

                      </td>
                    </tr>
                  </tbody>
                  

                  
                  <tbody id="categoryaddof<?php echo e($key); ?>" class="category-add collapse" aria-labelledby="collapseCategoryAdd" data-parent="#dataTableCategory">
                    <tr>
                      <td>&nbsp;</td>
                      <td>
                          <form class="form-group w-100" id="save_catesub_form_<?php echo e($cate_pro->category_id); ?>" action="<?php echo e(URL::to('/save-sub-category-product')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                          <input class="" hidden type="" name="sub_category_product_sub" value="<?php echo e($cate_pro->category_id); ?>">                        
                          <textarea class="form-control w-100" placeholder="Thêm con cho danh mục <?php echo e($cate_pro->category_name); ?>" class="form-control" type="text" name="sub_category_product_name" value="" rows="1" required="true"></textarea>
                          </form>
                      </td>
                      <td>
                        <?php $name_admin = Session::get('admin_name');
                        echo $name_admin; ?>
                      </td>
                      <td>&nbsp;</td>
                      <td>
                        <button formaction="javascript:{}" 
                          onclick="document.getElementById('save_catesub_form_<?php echo e($cate_pro->category_id); ?>').submit();" 
                          title="Lưu danh mục con mới" 
                          type="button" 
                          class="btn btn-primary btn-sm px-3">
                          <i class="fas fa-save"></i>
                        </button>
                        <button title="Hủy thao tác" type="button" class="btn btn-danger btn-sm px-3 collapsed" href="#" data-toggle="collapse" data-target="#categoryaddof<?php echo e($key); ?>" aria-expanded="true" aria-controls="categoryaddof<?php echo e($key); ?>">
                          <i class="fas fa-times"></i>
                        </button>
                      </td>
                      <td>&nbsp;</td>
                    </tr>
                  </tbody>
                  

                  

                  
                  
                  <tbody id="danhmucconof<?php echo e($key); ?>" class="category-sub collapse" aria-labelledby="collapseCategory" data-parent="#dataTableCategory"> 
                  <?php $__currentLoopData = $list_category_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $sub_cate_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <?php
                          if ($sub_cate_pro->category_sub == $cate_pro->category_id) {
                      ?>                  
                    <div>
                      <tr>
                        <td><?php echo e($sub_cate_pro->category_code); ?></td>
                        <td>
                            <span class="multi-collapse" id="nameSubcate"><?php echo e($sub_cate_pro->category_name); ?></span>                        
                        </td>
                        <td><?php echo e($sub_cate_pro->category_author); ?></td>
                        <td>
                          <label class="switch">
                            <input 
                              onclick="window.location.href='<?php echo e(URL::to('edit-category-status/'.$sub_cate_pro->category_id.'&'.$sub_cate_pro->category_status.'&'.$sub_cate_pro->category_sub)); ?>'" 
                                value="" 
                                type="checkbox" 
                                <?php if($sub_cate_pro->category_status==1){
                              echo "checked";
                            }else{
                              echo "";
                            } ?>
                            >
                            <div class="slider round"></div>
                          </label>
                        </td>
                        <td>
                          <button title="Sửa tên danh mục" type="button" class="btn btn-warning btn-sm px-3" data-toggle="modal" data-target="#CategoryModalEdit" data-namecatagory="<?php echo e($sub_cate_pro->category_name); ?>" data-contentcategory="<?php echo e($sub_cate_pro->category_desc); ?>" data-idcategory="<?php echo e($sub_cate_pro->category_id); ?>">
                          <i class="fas fa-edit"></i>
                          </button>
                          <button title="Mô tả danh mục con" type="button" class="btn btn-info btn-sm px-3 collapsed" href="#" data-container="body" data-html="true" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<?php echo e($sub_cate_pro->category_desc); ?>">
                          <i class="fas fa-info-circle"></i>
                        </button>
                          <a title="Xóa danh mục con" onclick="return confirm('Bạn có chắc muốn xóa danh mục con <?php echo e($sub_cate_pro->category_name); ?> ?')" href="<?php echo e(URL::to('/delete-category-product/'.$sub_cate_pro->category_id.'&'.$sub_cate_pro->category_sub)); ?>" type="button" class="btn btn-danger btn-sm px-3">
                            <i class="fas fa-trash-alt"></i>
                          </a>
                        </td>
                        <td>&nbsp;</td>
                      </tr>
                    </div>
                    <?php
                        } // ... for if(sub_cate_pro){}
                      ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                  
                  
                  <?php

                      }  // ... for if(cate_pro){}
                  ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  
                </table>
              </div>
            </div>
    </div>
    <!-- End DataTales category -------------------------------------------------------------->
  </div>
<!-- End Table Content _________________________________________________________________ -->

<!-- Begin Modal Add Category __________________________________________________________ -->
  <div>
    <div class="modal fade" id="CategoryModal" tabindex="-1" role="dialog" aria-labelledby="CategoryModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
          <div class="modal-header">
           <h5 class="modal-title" id="CategoryModalLabel">Danh Mục Mới</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
          </div>
          <div class="modal-body">
            <form id="save_category_product_form_add" role="form" action="<?php echo e(URL::to('/save-category-product')); ?>" method="post">
              <?php echo e(csrf_field()); ?>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Tên Danh mục:</label>
                <input type="text" class="form-control" name="category_product_name" id="category-product-name" value="" required="true">
              </div>
              <div class="form-group">
                  <label for="message-text" class="col-form-label">Mô tả danh mục:</label>
                <textarea class="form-control" name="category_product_desc" id="category-product-desc"></textarea>
              </div>
              <br>           
          
          <div class="float-right">
              <a type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</a>
              <input type="submit" class="btn btn-primary" value="Lưu">
          </div>
          </form>
          </div>
        </div>
      </div>
    </div>    
  </div>
<!-- End Modal Add Category __________________________________________________________ -->

<!-- Begin Modal Edit Category __________________________________________________________ -->
  <div>
    <div class="modal fade" id="CategoryModalEdit" tabindex="-1" role="dialog" aria-labelledby="CategoryModalEditLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="CategoryModalEditLabel">Danh Mục Mới</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
          <div class="modal-body">
            <form id="save_category_product_form_edit" role="form" action="<?php echo e(URL::to('/save-update-category-product')); ?>" method="post">
              <?php echo e(csrf_field()); ?>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Tên Danh mục:</label>
                <input type="text" class="form-control" name="edit_category_product_name" id="edit_category_product_name">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Mô tả danh mục:</label>
                <textarea class="form-control" name="edit_category_product_desc" id="edit_category_product_desc"></textarea>
              </div>

              <div class="code-edit-modal-hidden">
                  <input hidden type="text" class="form-control" name="edit_category_product_id" id="edit_category_product_id" required="true" readonly>
              </div>
          <br>
          <div class="float-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
            <input type="submit" class="btn btn-primary" value="Lưu" >
          </div>
          </form>
          </div>
        </div>
      </div>
    </div>    
  </div>
<!-- End Modal Edit Category __________________________________________________________ -->



</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\e141FruitShop\resources\views/administrator/category-product.blade.php ENDPATH**/ ?>