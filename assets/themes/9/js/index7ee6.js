var index = new index();
var wsConn = null;
var rootUrl = location.protocol + '//' + location.host;

function index() {
    init();

    function init() {
        document_ready();
    }
}

function document_ready() {
    $(document).ready(function () {
        (function(){
            const getAlert = localStorage.getItem("loginAlert");
            if (getAlert) {
                Swal.fire(JSON.parse(getAlert))
                localStorage.removeItem("loginAlert");
            }
        })()

        // Websocket

    });

    sidenavListToggle();
    gameSearchToggle();
    starEndDateRange();
    bonusMultiSelect();
    filterDate();
}

function sidenavListToggle() {
    $('.transaksi-toggle').on("click", function () {
        $('.transaksi-toggle-menu').slideToggle("fast");
    });
    $('.memo-toggle').on("click", function () {
        $('.memo-toggle-menu').slideToggle("fast");
    });
    $('.permainan-toggle').on("click", function () {
        $('.permainan-toggle-menu').slideToggle("fast");
    });
    $('.bonus-toggle').on("click", function () {
        $('.bonus-toggle-menu').slideToggle("fast");
    });
    $('.mobile-seo__title').on("click", function () {
        $('.mobile-seo__toggle').slideToggle("fast");
    });
}

function gameSearchToggle() {
    $(document).ready(function () {
        $('.btn-search').on("click", function (event) {
            event.stopPropagation();
            $(".search-box").slideToggle("fast");
        });
        $(".search-box").on("click", function (event) {
            event.stopPropagation();
        });
    });

    $(document).on("click", function () {
        $(".search-box").hide();
    });
}

function starEndDateRange() {
    $('input[name="startDate"]').daterangepicker({
        singleDatePicker: true,
    });
    $('input[name="endDate"]').daterangepicker({
        singleDatePicker: true,
    });
    $('input[name="rebateDate"]').daterangepicker({
        singleDatePicker: true,
    });
}

function filterDate() {
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#depositRange span, #transferRange span, #withdrawRange span,  #turnoverRange span ,  #refferalRange span, #downlineRange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#depositRange, #transferRange, #withdrawRange, #refferalRange, #downlineRange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Hari ini': [moment(), moment()],
            'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            '7 Hari Terakir': [moment().subtract(6, 'days'), moment()],
            '30 Hari Terakir': [moment().subtract(29, 'days'), moment()],
            'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
            'Bulan lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        locale: {
            "customRangeLabel": "Pilih Tanggal",
        },
    }, cb);

    cb(start, end);
}

/**
 * checkJoinPromo
 *
 * @param   string  playUrl  url to play game
 *
 * @return  void
 */
function checkJoinPromo(playUrl) {
    $.ajax({
        url: rootUrl + "/promo-check",
        dataType: 'json',
        type: 'GET',
        success: function (res) {
            if (res.success) {
                if (res.data.count > 0) {
                    let appendText = '';
                    $.each(res.data.promo, function (idx, row) {
                        appendText += row.event_title + ', ';
                    });

                    Swal.fire({
                        icon: 'info',
                        title: res.title,
                        html: res.message + appendText.replace(/, +$/, ''),
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 5000,
                    });
                } else {
                    window.location.href = playUrl;
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
}

/**
 * Session Check
 *
 * @param   string  playUrl  url to play game
 *
 * @return  void
 */
function isAlive() {
    $.ajax({
        url: rootUrl + "/ping",
        dataType: 'json',
        type: 'GET',
        success: function (res) {
            if (res.alive == false) {
                window.location.reload();
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
}

/**
 * gamePlay play game after login
 *
 * @param   string  url  play game url
 *
 * @return  void
 */
function gamePlay(playUrl, newtab = false) {
    if (newtab) {
        window.open(playUrl, '_blank');
    } else {
        window.location.href = playUrl;
    }
}

/** WebSocket connection */

if (!String.prototype.format) {
    String.prototype.format = function () {
        var args = arguments;
        return this.replace(/{(\d+)}/g, function (match, number) {
            return typeof args[number] != 'undefined'
                ? args[number]
                : match
                ;
        });
    };
}

$(function () { $('[data-toggle="tooltip"]').tooltip() })


function bonusMultiSelect() {
    $('.multi-select-game').selectpicker({
        liveSearch: true,
        actionsBox: true,
        width: '100%',
        virtualScroll: 50,
    });
}