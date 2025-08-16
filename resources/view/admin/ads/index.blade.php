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
                            <span><a href="<?= route("admin.ads.create") ?>" class="btn btn-success">ایجاد</a></span>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">

                                <div class="">
                                    <table class="table zero-configuration">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عنوان</th>
                                            <th>دسته</th>
                                            <th>آدرس</th>
                                            <th>تصویر</th>
                                            <th>مشخصات</th>
                                            <th>تگ</th>
                                            <th>کاربر</th>
                                            <th style="width: 22rem;">تنظیمات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($ads_s as $advertise) { ?>
                                        <tr>
                                            <td><?= $advertise->id ?></td>
                                            <td><?= $advertise->title ?></td>
                                            <td><?= $advertise->category()->name ?></td>
                                            <td><?= $advertise->address ?></td>
                                            <td><img style="width: 90px;" src="<?= asset($advertise->image) ?>" alt=""></td>
                                            <td>
                                                <ul>
                                                    <li>کف : <?= $advertise->floor ?></li>
                                                    <li>سال ساخت : <?= $advertise->year ?></li>
                                                    <li>انباری : <?= $advertise->storeroom == 1 ? 'دارد' : 'ندارد' ?></li>
                                                    <li>بالکن : <?= $advertise->balcony == 1 ? 'دارد' : 'ندارد' ?></li>
                                                    <li>متراژ (متر مربع) : <?= $advertise->area ?> </li>
                                                    <li>اتاق خواب : <?= $advertise->room ?></li>
                                                    <li>سرویس : <?= $advertise->toilet ?></li>
                                                    <li>پارکینگ : <?= $advertise->parking == 1 ? 'دارد' : 'ندارد' ?></li>
                                                </ul>
                                            </td>
                                            <td><?= $advertise->tag ?></td>
                                            <td><?= $advertise->author()->first_name . ' ' . $advertise->author()->last_name ?></td>
                                            <td style="width: 22rem;">
                                                <a href="<?= route('admin.ads.gallery', ['id' => $advertise->id]) ?>" class="btn btn-warning mt-1">گالری</a>
                                                <form class="d-inline" action="<?= route('admin.ads.delete', ['id' => $advertise->id]) ?>" method="post">
                                                    <input type="hidden" name="_method" value="delete">
                                                    <button type="submit" class="btn btn-danger mt-1" >حذف</button>
                                                </form>
                                                <a href="<?= route('admin.ads.edit', ['id' => $advertise->id]) ?>" class="btn btn-info mt-1">ویرایش</a>
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