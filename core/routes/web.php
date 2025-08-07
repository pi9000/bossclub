<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::domain(env('BACKEND_URL'))->group(function () {
    Route::namespace('Backend')->name('admin.')->group(function () {
        Route::namespace('Auth')->group(function () {
            Route::controller('LoginController')->group(function () {
                Route::get('/', 'showLoginForm')->name('login');
                Route::post('doLogin', 'login')->name('doLogin');
                Route::get('logout', 'logout')->name('logout');
            });
        });

        Route::middleware(['admin'])->group(function () {
            Route::get('dashboard', 'DashboardController@index')->name('dashboard');
            Route::get('test-gateway', 'DashboardController@test_gateway')->name('gateway');
            Route::get('profile', 'ProfileController@index')->name('profile');
            Route::post('profile/update', 'ProfileController@update')->name('profile.update');
            Route::get('members', 'MemberController@index')->name('members.list');
            Route::get('members/turn-over', 'MemberController@turn_over')->name('turnover');
            Route::post('members/create', 'MemberController@create')->name('member.create');
            Route::get('members/{extplayer}/details', 'MemberController@details')->name('members.list.details');
            Route::get('members/{extplayer}/games/{games}', 'MemberController@games')->name('members.list.games');
            Route::get('members/{extplayer}/status/{status}', 'MemberController@status')->name('members.list.status');
            Route::post('members/{id}/update', 'MemberController@update')->name('members.list.update');
            Route::post('members/{id}/update-provider', 'MemberController@provider')->name('members.list.provider');
            Route::post('members/{extplayer}/bank', 'MemberController@banks')->name('members.list.bank');
            Route::get('members/balance', 'MemberController@balance')->name('members.balance');
            Route::post('members/balance/add', 'MemberController@balanceup')->name('members.balance.update');

            Route::get('deposits/pending', 'DepositController@index')->name('deposits.pending');
            Route::get('deposits/reload', 'DepositController@reload_payment')->name('deposits.reload');
            Route::get('deposits/bonus-detail/{id}', 'DepositController@bonus_detail')->name('deposits.bonus_detail');
            Route::get('deposits/transaction', 'DepositController@list')->name('deposits.list');
            Route::get('deposits/{id}/approve', 'DepositController@approve')->name('deposits.approve');
            Route::get('deposits/{id}/reject', 'DepositController@reject')->name('deposits.reject');

            Route::get('banks/account', 'BankController@index')->name('bank.list');
            Route::get('banks/{id}/edit', 'BankController@edit')->name('bank.edit');

            Route::post('banks/create', 'BankController@create')->name('bank.create');
            Route::post('banks/{id}/update', 'BankController@update')->name('bank.update');
            Route::get('banks/{id}/delete', 'BankController@delete')->name('bank.delete');

            Route::get('settings/website', 'SettingController@index')->name('settings');
            Route::get('settings/config-clear', 'SettingController@clear')->name('settings.clear');
            Route::post('settings/website/update', 'SettingController@update')->name('settings.update');

            Route::get('settings/promotion', 'PromotionController@index')->name('website.promotion');
            Route::get('settings/promotion/{id}/edit', 'PromotionController@edit')->name('website.promotion.edit');

            Route::get('settings/promotion-deposit', 'PromotionController@deposit')->name('website.deposit');
            Route::get('settings/promotion-deposit/{id}/edit', 'PromotionController@editd')->name('website.deposit.edit');

            Route::post('settings/promotion/{id}/update', 'PromotionController@update')->name('website.promotion.update');
            Route::post('settings/promotion/create', 'PromotionController@create')->name('website.promotion.create');
            Route::get('settings/promotion/{id}/delete', 'PromotionController@delete')->name('website.promotion.delete');

            Route::get('settings/banner', 'PromotionController@banner')->name('website.banner');
            Route::post('settings/banner/create', 'PromotionController@bcreate')->name('website.banner.create');
            Route::get('settings/banner/{id}/delete', 'PromotionController@bdelete')->name('website.banner.delete');

            Route::get('settings/floating', 'PromotionController@float')->name('website.floating');
            Route::get('settings/floating/{id}/edit', 'PromotionController@floatedit')->name('website.floating.edit');
            Route::post('settings/floating/{id}/update', 'PromotionController@floatupdate')->name('website.floating.update');
            Route::post('settings/floating/create', 'PromotionController@floatcreate')->name('website.floating.create');
            Route::post('settings/popup/update', 'PromotionController@popup')->name('website.floating.popup');
            Route::get('settings/floating/{id}/delete', 'PromotionController@floatdelete')->name('website.floating.delete');

            Route::get('settings/api/setting', 'ProviderController@index')->name('website.api');
            Route::post('settings/api/edit/{id}', 'ProviderController@edit')->name('website.api.update');
            Route::get('settings/api/use/{id}', 'ProviderController@use')->name('website.api.use');

            Route::get('settings/api/call-manage', 'ProviderController@call')->name('website.call');
            Route::get('settings/api/call/players', 'ProviderController@call_players')->name('website.call-players');
            Route::get('settings/api/call/list', 'ProviderController@call_list')->name('website.call_list');
            Route::get('settings/api/call/apply', 'ProviderController@call_apply')->name('website.call_apply');
            Route::get('settings/api/call/rtp', 'ProviderController@rtp')->name('website.rtp');

            Route::get('admin/app/list', 'AdminController@index')->name('admin.list');
            Route::get('admin/app/edit/{id}', 'AdminController@edit')->name('admin.list.edit');
            Route::post('admin/app/create', 'AdminController@create')->name('admin.list.create');
            Route::post('admin/app/update/{id}', 'AdminController@update')->name('admin.list.update');
            Route::get('admin/app/delete/{id}', 'AdminController@delete')->name('admin.list.delete');

            Route::get('withdrawal/pending', 'WithdrawController@index')->name('withdrawal.pending');
            Route::get('withdrawal/transaction', 'WithdrawController@list')->name('withdrawal.list');
            Route::get('withdrawal/{id}/approve', 'WithdrawController@approve')->name('withdrawal.approve');
            Route::get('withdrawal/{id}/reject', 'WithdrawController@reject')->name('withdrawal.reject');

            Route::get('settings/provider/provider_list', 'ProviderController@provider_list')->name('website.provider');
            Route::post('settings/provider/add', 'ProviderController@update_provider_add')->name('website.provider.add');
            Route::post('settings/provider/{id}/provider_list_update', 'ProviderController@update_provider')->name('website.provider.update');
            Route::get('settings/provider/{id}/provider_list_delete', 'ProviderController@delete_provider')->name('website.provider.delete');

            Route::get('settings/provider/{id}/games', 'ProviderController@gamelists')->name('website.provider.games');
            Route::post('settings/provider/games_list/update', 'ProviderController@update_games')->name('website.provider.games_update');

            Route::get('admin/app/notification', 'AdminController@getNotif')->name('getNotif');
            Route::get('admin/app/notifications', 'AdminController@getNotifwd')->name('getNotif2');

            Route::get('report/summary', 'DashboardController@reports')->name('reports.summary');
            Route::get('report/transaction_summary', 'ReportController@transaction_summary')->name('reports.transaction_summary');
        });

        Route::get('config-clear', function () {
            Artisan::call('optimize:clear');
            return back()->with('success', 'Cache clear successfully');
        });
    });
});

Route::namespace('Frontend')->group(function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('register/verify-number', 'HomeController@verify')->name('verify');
    Route::get('resend_code', 'HomeController@resend_code')->name('resend_code');
    Route::post('verify_otp', 'HomeController@verify_otp')->name('verify_otp');
    Route::get('/help', 'HomeController@help')->name('help');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::get('ip_server', 'GameController@ip_server')->name('ip_server');
    Route::get('/data', 'HomeController@getresult')->name('data');
    Route::get('promotion', 'HomeController@promotion')->name('promotion');
    Route::get('promotion/{slug}', 'HomeController@promotiondetail')->name('promotiond');
    Route::get('popular', 'HomeController@popular')->name('popular');

    Route::get('slot', 'GameController@slot')->name('slot');
    Route::get('slot/{slug}', 'GameController@game')->name('slots');
    Route::get('casino', 'GameController@casino')->name('slot');
    Route::get('casino/{slug}', 'GameController@game')->name('casinos');
    Route::get('arcade', 'GameController@arcade')->name('arcade');
    Route::get('arcade/{slug}', 'GameController@arcades')->name('arcades');
    Route::get('sportsbook', 'GameController@sports')->name('sports');
    Route::get('lottery', 'GameController@lottery')->name('lottery');
    Route::get('lottery/{slug}', 'GameController@lotterys')->name('lotterys');
    Route::get('livegames', 'GameController@live')->name('live');

    //route checkuser
    Route::post('userCheck', 'HomeController@check')->name('user.check');
    Route::post('userphone', 'HomeController@phone')->name('user.phone');
    Route::post('usernorek', 'HomeController@norek')->name('user.norek');
    Route::post('transfer_money', 'HomeController@transfer_money')->name('transfer_money');
    Route::get('transaksi/gateway/callback', 'TransactionController@callback')->name('transaksi.callback');

    Route::get('backup', 'HomeController@backup')->name('backup');

    Route::middleware(['auth'])->group(function () {
        Route::post('optionalBankCreate', 'HomeController@optionalBankCreate')->name('optionalBankCreate');
        Route::get('profile', 'UserController@profile')->name('profile');
        Route::post('profile/update-password', 'UserController@update')->name('update.password');

        Route::get('transaksi', 'TransactionController@transaction')->name('transaksi');

        Route::post('transaksi/deposit', 'TransactionController@posttrx')->name('transaksi.deposit');
        Route::post('transaksi/deposit/auto', 'TransactionController@posttrx_pg')->name('transaksi.deposit.auto');
        Route::post('transaksi/deposit/reload', 'TransactionController@posttrx_reload')->name('transaksi.deposit.reload');
        Route::post('transaksi/withdraw', 'TransactionController@withdraw')->name('transaksi.withdraw');

        Route::get('gameIframe', 'GameController@launch_game')->name('launchgame');
    });
});

Route::middleware(['auth'])->namespace('Api')->group(function () {
    Route::post('member/Getbalance2', 'SeamlesWsController@getBalance2')->name('api.balance');
    Route::get('test-api', 'SeamlesWsController@testapi')->name('apitest');
});

Route::namespace('Api')->group(function () {
    Route::get('ip-check', 'SeamlesWsController@testapi')->name('apitest');
});

Route::namespace('Auth')->group(function () {
    Route::get('member/logout', 'LoginController@logout')->name('member.logout');
});

Route::get('locale/{lange}', 'LocalizationController@setlang')->name('setlang');

Route::namespace('Backend')->name('admin.')->group(function () {
    Route::get('app/cronsjob', 'DashboardController@cron')->name('cron');
});

Auth::routes();
