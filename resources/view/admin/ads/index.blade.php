@extends('admin.layouts.app')


@section('head-tag')
    <title>ادمین / آگهی</title>
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
                            <h4 class="card-title">آگهی</h4>
                            <span><a href="" class="btn btn-success">ایجاد</a></span>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">

                                <div class="">
                                    <table class="table zero-configuration">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عنوان</th>
                                            <th>آدرس</th>
                                            <th>نویسنده</th>
                                            <th>دسته بندی</th>
                                            <th style="min-width: 16rem; text-align: left;">تنظیمات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($ads_s as $ads) {  ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1"><?= $ads->id ?></td>
                                            <td><?= $ads->title ?></td>
                                            <td><?= $ads->address ?></td>
                                            <td><?= $ads->author()->first_name . ' ' . $ads->author()->last_name ?></td>
                                            <td><?= $ads->category()->name ?></td>
                                            <td style="min-width: 16rem; text-align: left;">
                                                <a href="<?= route('admin.ads.show',[$ads->id]) ?>" class="btn btn-success waves-effect waves-light btn-success">مشاهده</a>
                                                <a href="#" class="btn btn-success waves-effect waves-light btn-warning">گالری</a>
                                                <a href="" class="btn btn-info waves-effect waves-light">ویرایش</a>
                                                <form class="d-inline" action="" method="post">
                                                    <input type="hidden" name="_method" value="delete">
                                                    <button type="submit" class="btn btn-danger waves-effect waves-light">حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Zero configuration table -->
    </div>

@endsection