

<!--header-->
<header class="header">
    <!-- logo -->
    <div class="logo"><a href="<?= route('index') ?>"><img src="<?= asset('assets/imgs/logo.png') ?>"></a></div>
    <div class="search">
        <form action="<?= route('home.ads.search') ?>" method="post" class="searchForm">
            <input type="text" name="search" placeholder="جست و جو ...">
            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search-icon lucide-search"><path d="m21 21-4.34-4.34"/><circle cx="11" cy="11" r="8"/></svg></button>
        </form>
    </div>
    <div class="myAccount">
        <a href="<?= route('user.panel') ?>">
            <button class="openModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-icon lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                دیوار من
            </button>
        </a>
    </div>
    </div>
    <div class="RegisterAd">
        <a href="<?= route('user.panel.showFormStoreAds') ?>">
            ثبت آگهی
        </a>
    </div>
</header>
<!--header-->
