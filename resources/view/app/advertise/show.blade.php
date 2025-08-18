@extends('app.layouts.app')

@section('head-tag')
    <title><?= $advertise->title ?></title>
@endsection

@section('content')
    <!-- main -->
    <main class="mainAdverPage">

        <!-- description adver -->
        <div class="descriptionAdver">
            <!-- title -->
            <div class="titleDescriptionAdver"><h2><?= $advertise->title ?></h2></div>
            <!-- box scroll adver -->
            <div class="boxAvere">
                <!-- سال ساخت و متراژ و اتاق -->
                <div class="informationDMO">
                    <div class="meterageAdver">
                        <h3>متراژ</h3>
                        <h4><?= $advertise->area ?> متر </h4>
                    </div>
                    <div class="dateAdver">
                        <h3>سال ساخت</h3>
                        <h4><?= $advertise->year ?></h4>
                    </div>
                    <div class="roomAdver">
                        <h3>اتاق</h3>
                        <h4><?= $advertise->room ?></h4>
                    </div>
                </div>
                <div class="info1">
                    <button  type="button" class="contactInformation">اطلاعات تماس</button>
                    <div class="fadeIn"><div class="contact"><h3>شماره موبایل</h3><h4></h4></div></div>
                </div>
                <!-- info -->
                <div class="info"><h3>آدرس</h3><h4><?= $advertise->address ?></h4></div>
                <div class="info"><h3>نوع آگهی</h3><h4><?= $advertise->sellStatus() ?></h4></div>
                <div class="info"><h3>دسته بندی</h3><h4><?= $advertise->category()->name ?></h4></div>
                <div class="info"><h3>قیمت کل</h3><h4><?= $advertise->amount ?></h4></div>
                <div class="info"><h3>پارکینگ</h3><h4><?= $advertise->parking == 1 ? 'دارد' : 'ندارد'  ?></h4></div>
                <div class="info"><h3>انباری</h3><h4><?= $advertise->storeroom == 1 ? 'دارد' : 'ندارد'  ?></h4></div>
                <div class="info"><h3>بالکن</h3><h4><?= $advertise->balcony == 1 ? 'دارد' : 'ندارد'  ?></h4></div>
                <div class="info"><h3>کف</h3><h4><?= $advertise->floor ?></h4></div>
                <div class="info"><h3>تگ</h3><h4><?= $advertise->tag ?></h4></div>
                <div class="info"><h3>توالت</h3><h4><?= $advertise->toilet ?></h4></div>
                <div class="info"><h3>نوع ملک</h3><h4><?= $advertise->type ?></h4></div>
            </div>
        </div>
        </div>

        <!-- img adver -->
        <div class="imgAdverPage"></div>
    </main>
    <div class="textAdver"><?= $advertise->description ?></div>
@endsection
