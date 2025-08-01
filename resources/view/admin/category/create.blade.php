@extends('admin.layouts.app')

@section('head-tag')
<title>create</title>
@endsection

@section('content')
<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">


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
                                    <span><a href="#" class="btn btn-success">بازگشت</a></span>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">

                                        <form class="row" action="#" method="post" enctype="multipart/form-data">
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <label for="helperText">نام دسته</label>
                                                    <input value="" name="name" type="text" id="helperText" class="form-control" placeholder="نام ...">
                                                </fieldset>
                                            </div>

                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <div class="form-group">
                                                        <label for="helperText">دسته والد</label>
                                                        <select name="parent_id" class="select2 form-control">
                                                            <option value="">درصورت وجود والد انتخاب شود</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>

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


            </div>
        </div>
        <!-- END: Content-->

        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

    </div>

@endsection