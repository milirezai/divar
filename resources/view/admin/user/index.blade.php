@extends('admin.layouts.app')

@section('head-tag')
    <title>ادمین / کاربران</title>
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
                            <h4 class="card-title">کاربران</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">

                                <div class="">
                                    <table class="table zero-configuration">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ایمیل</th>
                                            <th>نام</th>
                                            <th>نام خانوادگی</th>
                                            <th>تصویر</th>
                                            <th>وضعیت</th>
                                            <th style="width: 22rem; text-align: left;">تنظیمات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($users as $user) { ?>
                                        <tr role="row" class="even">
                                            <td class="sorting_1"><?= $user->id ?></td>
                                            <td><?= $user->email ?></td>
                                            <td><?= $user->first_name ?></td>
                                            <td><?= $user->last_name ?></td>
                                            <td><img src="<?= asset($user->avatar) ?>" style="width:6rem;" alt=""></td>
                                            <td><span class="<?= $user->is_active == 1 ? 'text-success' : 'text-danger' ?>"><?= $user->is_active == 1 ? 'فعال' : 'غیرفعال' ?></span></td>
                                            <td style="width: 22rem; text-align: left;">

                                                    <?php if($user->is_active == 0) { ?>
                                                <a href="<?= route('admin.users.status', [$user->id]) ?>" class="btn btn-success">فعال</a>
                                                <?php } else { ?>
                                                <a href="<?= route('admin.users.status', [$user->id]) ?>" class="btn btn-danger">غیرفعال</a>
                                                <?php } ?>


                                            </td>
                                        </tr>
                                        <?php }?>
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