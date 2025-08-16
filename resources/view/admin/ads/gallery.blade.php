@extends('admin.layouts.app')


@section('head-tag')
    <title>ادمین / گالری</title>
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
                            <h4 class="card-title">آگهی - گالری</h4>
                            <span><a href="#" class="btn btn-success">بازگشت</a></span>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">

                                <form class="row" action="#" method="post" enctype="multipart/form-data">

                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label for="image">تصویر</label>
                                            <input name="image" type="file" id="image" class="form-control-file ">
                                        </fieldset>
                                    </div>

                                    <div class="col-md-12">
                                        <section class="form-group">
                                            <button type="submit" class="btn btn-primary">آپلود تصویر</button>
                                        </section>
                                    </div>
                                </form>
                                <div class="col-md-12 mt-4 pt-4">
                                    <div class="row">
                                        <div class="col-md-3 text-center">
                                            <div><img style="width: 100%;" src="../admin-assets/images/elements/apple-watch.png" alt=""></div>
                                            <a class="btn btn-danger mt-1" href="#">حذف</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
