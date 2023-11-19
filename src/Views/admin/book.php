<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
   <div class="row">
      <ol class="breadcrumb">
         <li><a href="#"><svg class="glyph stroked home">
                  <use xlink:href="#stroked-home"></use>
               </svg></a></li>
         <li class="active">Danh sách sản phẩm</li>
      </ol>
   </div>
   <!--/.row-->

   <div class="row">
      <div class="col-lg-12">
         <h1 class="page-header">Danh sách sản phẩm</h1>
      </div>
   </div>
   <!--/.row-->
   <div id="toolbar" class="btn-group">
      <a href="/admin/books/add" class="btn btn-success">
         <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
      </a>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="panel panel-default">
            <div class="panel-body">
               <table data-toolbar="#toolbar" data-toggle="table">

                  <thead>
                     <tr>
                        <th data-field="id" data-sortable="true">ID</th>
                        <th data-field="name" data-sortable="true">Tên sản phẩm</th>
                        <th data-field="price" data-sortable="true">Giá</th>
                        <th>Ảnh sản phẩm</th>
                        <!-- <th>Số lượng đã bán</th> -->
                        <th>Danh mục</th>
                        <th>Hành động</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $stt=1;
                                 foreach ($books as $book):?>
                     <tr id="<?=$book->id?>">
                        <td><?=$stt?></td>
                        <td><?=$book->title?></td>
                        <td><?=currency_format($book->price)?></td>
                        <td style="text-align: center"><img width="130" height="180" src="/<?=$book->image?>" /></td>
                        <!-- <td>10</td> -->
                        <td>
                           <?php foreach ($categories as $category):
                                          if ($book->category_id == $category->id):
                                       ?>
                        <td><?=$category->name?></td>
                        <?php endif;
                                             endforeach;?>
                        </td>
                        <td class="form-group">
                           <a href="/admin/books/edit/<?= $book->id?>" class="btn btn-primary"><i
                                 class="fa fa-pencil"></i></a>
                           <a href="#" class="btn btn-danger delete_product"><i class="fa fa-trash"></i></a>
                        </td>
                     </tr>
                     <?php $stt++; 
                           endforeach;?>

                  </tbody>
               </table>
            </div>
            <div class="panel-footer">
               <nav aria-label="Page navigation example">
                  <ul class="pagination">
                     <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                     <li class="page-item"><a class="page-link" href="#">1</a></li>
                     <li class="page-item"><a class="page-link" href="#">2</a></li>
                     <li class="page-item"><a class="page-link" href="#">3</a></li>
                     <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  </ul>
               </nav>
            </div>
         </div>
      </div>
   </div>
   <!--/.row-->
</div>
<!--/.main-->