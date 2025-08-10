@extends('admin.layouts.app')
@section('head-tag')
<title>ادمین | ساخت مقاله جدید</title>
@endsection
@section('content')
<div class="content-header row">
</div>
<div class="content-body">
   <!-- Zero configuration table -->
   <section id="basic-datatable">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h4 class="card-title">پست</h4>
                  <span><a href="<?= route('admin.blog.index') ?>" class="btn btn-success">بازگشت</a></span>
               </div>
               <div class="card-content">
                  <div class="card-body card-dashboard">
                     <form class="row" action="#" method="post" enctype="multipart/form-data">
                        <div class="col-md-6">
                           <fieldset class="form-group">
                              <label for="title">عنوان</label>
                              <input value="" name="title" type="text" id="title" class="form-control" placeholder="نام ...">
                           </fieldset>
                        </div>
                        <div class="col-md-6">
                           <fieldset class="form-group">
                              <label for="published_at">تاریخ انتشار</label>
                              <input value="" name="published_at" type="date" id="published_at" class="form-control ">
                           </fieldset>
                        </div>
                        <div class="col-md-6">
                           <fieldset class="form-group">
                              <label for="image">تصویر</label>
                              <input name="image" type="file" id="image" class="form-control-file ">
                           </fieldset>
                        </div>
                        <div class="col-md-6">
                           <fieldset class="form-group">
                              <div class="form-group">
                                 <label for="cat_id">دسته</label>
                                 <select name="cat_id" class="select2 form-control ">
                                     <?php foreach($categories as $categorySelect) {?>
                                    <option value="<?= $categorySelect->id ?>" <?= !empty(old('cat_id')) && $categorySelect->id === old('cat_id') ? 'selected' : '' ?>>
                                        <?= $categorySelect->name ?>
                                    </option>
                                    <?php  } ?>
                                 </select>
                              </div>
                           </fieldset>
                        </div>
                        <div class="col-md-12">
                           <section class="form-group">
                              <label for="body">متن</label>
                              <textarea class="form-control" id="body" rows="5" name="body" placeholder="متن ..."></textarea>
                           </section>
                        </div>
                        <div class="col-md-6">
                           <section class="form-group">
                              <button type="submit" class="btn btn-primary">ایجاد</button>
                           </section>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection
@section('script')
<script src="<?= asset('ckeditor/ckeditor.js') ?>"></script>
<script type="text/javascript">
    CKEDITOR.replace('body')
</script>
@endsection