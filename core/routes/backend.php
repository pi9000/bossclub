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

Route::namespace('Backend')->name('admin.')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::controller('LoginController')->group(function () {
            Route::get('/', 'showLoginForm')->name('login');
            Route::post('doLogin', 'login')->name('doLogin');
            Route::get('logout', 'logout')->name('logout');
        });
    });

    Route::get('app/cronsjob', 'DashboardController@cron')->name('cron');

    Route::middleware(['admin'])->group(function () {
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('app/transaction-reports', 'DashboardController@reports')->name('reports');

        Route::get('profile', 'ProfileController@index')->name('profile');
        Route::post('profile/update', 'ProfileController@update')->name('profile.update');

        Route::get('members', 'MemberController@index')->name('members.list');
        Route::get('members/turn-over', 'MemberController@turn_over')->name('turnover');
        Route::get('members/create', 'MemberController@create')->name('member.create');
        Route::post('members/create/post', 'MemberController@createp')->name('member.createp');
        Route::get('members/{extplayer}/details', 'MemberController@details')->name('members.list.details');
        Route::get('members/{extplayer}/games/{games}', 'MemberController@games')->name('members.list.games');
        Route::get('members/{extplayer}/status/{status}', 'MemberController@status')->name('members.list.status');
        Route::post('members/{id}/update', 'MemberController@update')->name('members.list.update');
        Route::post('members/{id}/update-provider', 'MemberController@provider')->name('members.list.provider');
        Route::post('members/{extplayer}/bank', 'MemberController@banks')->name('members.list.bank');
        Route::get('members/balance', 'MemberController@balance')->name('members.balance');
        Route::post('members/balance/add', 'MemberController@balanceup')->name('members.balance.update');

        Route::get('deposits/pending', 'DepositController@index')->name('deposits.pending');
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

        Route::get('WinLoseReport/WinLose', 'GsReportController@index')->name('winlosereport.winlose');
        Route::get('WinLoseReport/ProductAgentWinLose', 'GsReportController@index')->name('winlosereport.product');
        Route::post('WinLoseReport/SearchWinLoseReport_V2', 'GsReportController@winlose')->name('winlosereport.winloses');

        Route::get('WinLoseSettlementReport/WinLose', 'GsReportController@settlement')->name('settle.winlose');
        Route::get('WinLoseSettlementReport/ProductAgentWinLose', 'GsReportController@settlement')->name('settle.product');
        Route::post('WinLoseSettlementReport/SearchWinLoseReport_V2', 'GsReportController@winloses')->name('settle.winloses');

        Route::get('admin/app/notification', 'AdminController@getNotif')->name('getNotif');
        Route::get('admin/app/notifications', 'AdminController@getNotifwd')->name('getNotif2');

        Route::get('taruhan/list', 'TaruhanController@index')->name('taruhan.list');
        Route::get('taruhan/create', 'TaruhanController@creates')->name('taruhan.creates');
        Route::post('taruhan/creates', 'TaruhanController@create')->name('taruhan.create');
        Route::get('taruhan/{id}/approve', 'TaruhanController@approve')->name('taruhan.approve');
        Route::get('taruhan/{id}/reject', 'TaruhanController@reject')->name('taruhan.reject');
    });
});

Route::get('config-clear', function () {
    Artisan::call('optimize:clear');
    return back()->with('success','Cache clear successfully');
});
