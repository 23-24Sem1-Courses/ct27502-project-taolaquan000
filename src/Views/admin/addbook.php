<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
   <div class="row">
      <ol class="breadcrumb">
         <li><a href="#"><svg class="glyph stroked home">
                  <use xlink:href="#stroked-home"></use>
               </svg></a></li>
         <li><a href="">Quản lý sản phẩm</a></li>
         <li class="active">Thêm sản phẩm</li>
      </ol>
   </div>
   <!--/.row-->

   <div class="row">
      <div class="col-lg-12">
         <h1 class="page-header">Thêm sản phẩm</h1>
      </div>
   </div>
   <!--/.row-->
   <div class="row">
      <div class="col-lg-12">
         <div class="panel panel-default">
            <div class="panel-body">
               <div class="col-md-6">
                  <form action="<?= $post_url ?>" role="form" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?= htmlspecialchars($book->id)?>">
                     <div class="form-group">
                        <label>Tựa sách</label>
                        <input required name="title" class="form-control" value="<?=$book->title?>">
                     </div>

                     <div class="form-group">
                        <label>Giá sách</label>
                        <input required name="price" type="number" class="form-control" value="<?=$book->price?>">
                     </div>
                     <div class="form-group">
                        <label>Tác giả</label>
                        <input required name="author" class="form-control" value="<?=$book->author?>">
                     </div>

               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Ảnh</label>
                     <input type="file" name="fileToUpload">
                     <br>
                     <div><img src="/<?=$book->image?>" alt="" width="80px"></div>
                     <!-- <div>
                        <img style="filter: drop-shadow(0 0 5px rgb(119, 119, 145));" width="80px"
                           src="/images/gift.gif">
                     </div> -->
                  </div>
                  <div class="form-group">
                     <label>Danh mục</label>
                     <select name="category_id" class="form-control">
                        <?php if (isset($book->id) && isset($check_category)):?>
                        <option value="<?=$check_category->id?>"><?=$check_category->name?></option>
                        <?php 
                           foreach ($categories as $category): 
                              if ($category->id!= $check_category->id):?>
                                 <option value="<?=$category->id?>"><?=$category->name?></option>
                              <?php endif;?> 
                           <?php endforeach;?>
                        <?php else:
                           foreach ($categories as $category): ?> 
                                 <option value="<?=$category->id?>"><?=$category->name?></option>
                        <?php 
                           endforeach;
                           endif;?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Mô tả sản phẩm</label>
                     <textarea name="description" class="form-control" rows="3"><?=$book->description?></textarea>
                  </div>
                  <button name="submit" type="submit" class="btn btn-success">Lưu</button>
                  <button type="reset" class="btn btn-default">Làm mới</button>
               </div>
               </form>
            </div>
         </div>
      </div><!-- /.col-->
   </div><!-- /.row -->

</div>
<!--/.main-->