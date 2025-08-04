@extends('admin.layouts.app')



    @section('head-tag')
        <title>ادمین | ساخت دسته بندی</title>
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
                                <h4 class="card-title">دسته بندی</h4>
                                <span><a href="<?= route("admin.category.index") ?>" class="btn btn-success">بازگشت</a></span>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">

                                    <form class="row" action="<?= route("admin.category.store") ?>" method="post" enctype="multipart/form-data">
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <label for="helperText">نام دسته</label>
                                                <input value="<?= old('name') ?>" name="name" type="text" id="helperText" class="form-control" placeholder="نام ..." >
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <div class="form-group">
                                                    <label for="helperText">دسته والد</label>
                                                    <select name="parent_id" class="select2 form-control" >
                                                        <option value="">درصورت وجود والد انتخاب شود</option>
                                                        <?php foreach ($parentCategory as $category) { ?>
                                                            <option <?= old('parent_id') == $category->id ? 'selected' : ''; ?> value="<?= $category->id ?>"><?= $category->name ?></option>
                                                        <?php  } ?>

                                                    </select>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <button type="submit" class="btn btn-primary">ایجاد</button>
                                            </fieldset>
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