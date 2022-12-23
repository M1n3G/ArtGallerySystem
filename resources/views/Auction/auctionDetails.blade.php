@extends('master')
@section('content')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
<div class="container px-4 mt-2">
    <div class="row mt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-family: 'Poppins', sans-serif;">
                <li class="breadcrumb-item"><a href="/auction/auction" class="text-decoration-none">Auction</a></li>
                <li class="breadcrumb-item active" aria-current="page">Item Details</li>
            </ol>
        </nav>
    </div>
</div>
@if (Session::has('success'))
<div class="container alert alert-success alert-dismissible fade show mt-4" role="alert">
    <div class="text-left">
        {{ Session::get('success') }}
        {{ Session::forget('success') }}
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (Session::has('fail'))
<div class="container alert alert-success alert-dismissible fade show mt-4" role="alert">
    <div class="text-left">
        {{ Session::get('fail') }}
        {{ Session::forget('fail') }}
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="container">

    <!-- product -->
    <div class="product-content product-wrap clearfix product-deatil">
        <div class="row">
            @foreach($result as $row)
            
            
            <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="product-image">
                    <div id="myCarousel-2" class="carousel slide">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel-2" data-slide-to="0" class=""></li>
                            <li data-target="#myCarousel-2" data-slide-to="1" class="active"></li>
                            <li data-target="#myCarousel-2" data-slide-to="2" class=""></li>
                        </ol>
                        <div class="carousel-inner">
                            <!-- Slide 1 -->
                            <div class="item active">
                                <img src="{{$row->auctionImg}}" class="img-responsive" alt="" width=400 height=300 />
                            </div>
                        </div>
                        <a class="left carousel-control" href="#myCarousel-2" data-slide="prev"> <span
                                class="glyphicon glyphicon-chevron-left"></span> </a>
                        <a class="right carousel-control" href="#myCarousel-2" data-slide="next"> <span
                                class="glyphicon glyphicon-chevron-right"></span> </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-md-offset-1 col-sm-12 col-xs-12">
                <h2 class="name" style="font-weight: bold; font-size: 50px;">
                    {{$row->auctionName}}
                </h2>
                <h3 class="name">
                    <small>
                        <br />
                        <div class="wrap-countdown mercado-countdown"
                            data-expire="{{ Carbon\Carbon::parse($row->start_date)->format('Y/m/d h:i:s') }}"></div>
                    </small>
                </h3>
                <span class="fa fa-2x">

                </span>
                </h2>
                <hr />
                
                
                <h3 class="price-container">
                    

                    @if($row->bidPrice!=null)

                    Bidding Price: RM{{$row->bidPrice}}
                    @else
                    Start From: RM{{$row->startPrice}}
                    @endif
                    
                </h3>

                <div class="certified">
                    <ul>
                        <li>
                            <a href="javascript:void(0);">Auction Product ID<span>{{$row->auctionID}}</span></a>
                        </li>
                        @foreach($users as $rows)
                        <li>
                            <a href="javascript:void(0);">Product By<span>{{$rows->name}}</span></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <hr />
                <div class="description description-tabs">
                    <ul id="myTab" class="nav nav-pills">
                        <li class="active"><a href="#more-information" data-toggle="tab" class="no-margin">Product
                                Description </a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        {!!$row->auctionDesc!!}

                        <div class="tab-pane fade" id="reviews">
                            <br />
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <a href="{{ action('AuctionController@oneBid', $row->auctionID ) }}"
                            class="btn btn-success btn-lg">Buy Now: RM{{$row->endPrice}}</a>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <a href="javascript:void(0);" class="btn btn-primary btn-lg" color="" data-bs-toggle="modal"
                            data-bs-target="#ManualBid">Manual Bid</a>

                        <!-- Modal -->
                        <div class="modal fade" id="ManualBid" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('manualBid',$row->auctionID) }}" method='POST'>
                                        @csrf
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Manual Bid</h1>
                                            <input type="hidden" id="bid" name="bid" value="{{$row->bidPrice}}">
                                            <input type="hidden" id="startP" name="startP" value="{{$row->startPrice}}">
                                            <input type="hidden" id="endP" name="endP" value="{{$row->endPrice}}">
                                            <input type="hidden" id="id" name="id" value="{{$row->auctionID}}">
                                            <input type="hidden" id="picture" name="picture" value="{{$row->auctionImg}}">



                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="label fw-semibold fs-6">Enter Manual Price</label>
                                                <input type="text" id="manual" name="manual" class="form-control mt-2"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
            @endforeach
        </div>
    </div>
    <!-- end product -->
</div>
@endsection

<style>
body {
    margin-top: 20px;
    background: #eee;
}


.product-content {
    border: 1px solid #dfe5e9;
    margin-bottom: 20px;
    margin-top: 12px;
    background: #fff
}

.product-content .carousel-control.left {
    margin-left: 0
}

.product-content .product-image {
    background-color: #fff;
    display: block;
    min-height: 238px;
    overflow: hidden;
    position: relative
}

.product-content .product-deatil {
    border-bottom: 1px solid #dfe5e9;
    padding-bottom: 17px;
    padding-left: 16px;
    padding-top: 16px;
    position: relative;
    background: #fff
}

.product-content .product-deatil h5 a {
    color: #2f383d;
    font-size: 15px;
    line-height: 19px;
    text-decoration: none;
    padding-left: 0;
    margin-left: 0
}

.product-content .product-deatil h5 a span {
    color: #9aa7af;
    display: block;
    font-size: 13px
}

.product-content .product-deatil span.tag1 {
    border-radius: 50%;
    color: #fff;
    font-size: 15px;
    height: 50px;
    padding: 13px 0;
    position: absolute;
    right: 10px;
    text-align: center;
    top: 10px;
    width: 50px
}

.product-content .product-deatil span.sale {
    background-color: #21c2f8
}

.product-content .product-deatil span.discount {
    background-color: #71e134
}

.product-content .product-deatil span.hot {
    background-color: #fa9442
}

.product-content .description {
    font-size: 12.5px;
    line-height: 20px;
    padding: 10px 14px 16px 19px;
    background: #fff
}

.product-content .product-info {
    padding: 11px 19px 10px 20px
}

.product-content .product-info a.add-to-cart {
    color: #2f383d;
    font-size: 13px;
    padding-left: 16px
}

.product-content name.a {
    padding: 5px 10px;
    margin-left: 16px
}

.product-info.smart-form .btn {
    padding: 6px 12px;
    margin-left: 12px;
    margin-top: -10px
}

.product-entry .product-deatil {
    border-bottom: 1px solid #dfe5e9;
    padding-bottom: 17px;
    padding-left: 16px;
    padding-top: 16px;
    position: relative
}

.product-entry .product-deatil h5 a {
    color: #2f383d;
    font-size: 15px;
    line-height: 19px;
    text-decoration: none
}

.product-entry .product-deatil h5 a span {
    color: #9aa7af;
    display: block;
    font-size: 13px
}

.load-more-btn {
    background-color: #21c2f8;
    border-bottom: 2px solid #037ca5;
    border-radius: 2px;
    border-top: 2px solid #0cf;
    margin-top: 20px;
    padding: 9px 0;
    width: 100%
}

.product-block .product-deatil p.price-container span,
.product-content .product-deatil p.price-container span,
.product-entry .product-deatil p.price-container span,
.shipping table tbody tr td p.price-container span,
.shopping-items table tbody tr td p.price-container span {
    color: #21c2f8;
    font-family: Lato, sans-serif;
    font-size: 24px;
    line-height: 20px
}

.product-info.smart-form .rating label {
    margin-top: 0
}

.product-wrap .product-image span.tag2 {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    padding: 10px 0;
    color: #fff;
    font-size: 11px;
    text-align: center
}

.product-wrap .product-image span.sale {
    background-color: #57889c
}

.product-wrap .product-image span.hot {
    background-color: #a90329
}

.shop-btn {
    position: relative
}

.shop-btn>span {
    background: #a90329;
    display: inline-block;
    font-size: 10px;
    box-shadow: inset 1px 1px 0 rgba(0, 0, 0, .1), inset 0 -1px 0 rgba(0, 0, 0, .07);
    font-weight: 700;
    border-radius: 50%;
    padding: 2px 4px 3px !important;
    text-align: center;
    line-height: normal;
    width: 19px;
    top: -7px;
    left: -7px
}

.description-tabs {
    padding: 30px 0 5px !important
}

.description-tabs .tab-content {
    padding: 10px 0
}

.product-deatil {
    padding: 30px 30px 50px
}

.product-deatil hr+.description-tabs {
    padding: 0 0 5px !important
}

.product-deatil .carousel-control.left,
.product-deatil .carousel-control.right {
    background: none !important
}

.product-deatil .glyphicon {
    color: #3276b1
}

.product-deatil .product-image {
    border-right: none !important
}

.product-deatil .name {
    margin-top: 0;
    margin-bottom: 0
}

.product-deatil .name small {
    display: block
}

.product-deatil .name a {
    margin-left: 0
}

.product-deatil .price-container {
    font-size: 24px;
    margin: 0;
    font-weight: 300
}

.product-deatil .price-container small {
    font-size: 12px
}

.product-deatil .fa-2x {
    font-size: 16px !important
}

.product-deatil .fa-2x>h5 {
    font-size: 12px;
    margin: 0
}

.product-deatil .fa-2x+a,
.product-deatil .fa-2x+a+a {
    font-size: 13px
}

.profile-message ul {
    list-style: none;
}

.product-deatil .certified {
    margin-top: 10px
}

.product-deatil .certified ul {
    padding-left: 0
}

.product-deatil .certified ul li:not(first-child) {
    margin-left: -3px
}

.product-deatil .certified ul li {
    display: inline-block;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    padding: 13px 19px
}

.product-deatil .certified ul li:first-child {
    border-right: none
}

.product-deatil .certified ul li a {
    text-align: left;
    font-size: 12px;
    color: #6d7a83;
    line-height: 16px;
    text-decoration: none
}

.product-deatil .certified ul li a span {
    display: block;
    color: #21c2f8;
    font-size: 13px;
    font-weight: 700;
    text-align: center
}

.product-deatil .message-text {
    width: calc(100% - 70px)
}

@media only screen and (min-width:1024px) {
    .product-content div[class*=col-md-4] {
        padding-right: 0
    }

    .product-content div[class*=col-md-8] {
        padding: 0 13px 0 0
    }

    .product-wrap div[class*=col-md-5] {
        padding-right: 0
    }

    .product-wrap div[class*=col-md-7] {
        padding: 0 13px 0 0
    }

    .product-content .product-image {
        border-right: 1px solid #dfe5e9
    }

    .product-content .product-info {
        position: relative
    }
}

.message img.online {
    width: 40px;
    height: 40px;
}
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
! function(a) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], a) : a(jQuery)
}(function(a) {
    "use strict";

    function b(a) {
        if (a instanceof Date) return a;
        if (String(a).match(g)) return String(a).match(/^[0-9]*$/) && (a = Number(a)), String(a).match(/\-/) && (a =
            String(a).replace(/\-/g, "https://kute-themes.com/")), new Date(a);
        throw new Error("Couldn't cast `" + a + "` to a date object.")
    }

    function c(a) {
        var b = a.toString().replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1");
        return new RegExp(b)
    }

    function d(a) {
        return function(b) {
            var d = b.match(/%(-|!)?[A-Z]{1}(:[^;]+;)?/gi);
            if (d)
                for (var f = 0, g = d.length; f < g; ++f) {
                    var h = d[f].match(/%(-|!)?([a-zA-Z]{1})(:[^;]+;)?/),
                        j = c(h[0]),
                        k = h[1] || "",
                        l = h[3] || "",
                        m = null;
                    h = h[2], i.hasOwnProperty(h) && (m = i[h], m = Number(a[m])), null !== m && ("!" === k && (
                        m = e(l, m)), "" === k && m < 10 && (m = "0" + m.toString()), b = b.replace(j, m
                        .toString()))
                }
            return b = b.replace(/%%/, "%")
        }
    }

    function e(a, b) {
        var c = "s",
            d = "";
        return a && (a = a.replace(/(:|;|\s)/gi, "").split(/\,/), 1 === a.length ? c = a[0] : (d = a[0], c = a[1])),
            Math.abs(b) > 1 ? c : d
    }
    var f = [],
        g = [],
        h = {
            precision: 100,
            elapse: !1,
            defer: !1
        };
    g.push(/^[0-9]*$/.source), g.push(/([0-9]{1,2}\/){2}[0-9]{4}( [0-9]{1,2}(:[0-9]{2}){2})?/.source), g.push(
        /[0-9]{4}([\/\-][0-9]{1,2}){2}( [0-9]{1,2}(:[0-9]{2}){2})?/.source), g = new RegExp(g.join("|"));
    var i = {
            Y: "years",
            m: "months",
            n: "daysToMonth",
            d: "daysToWeek",
            w: "weeks",
            W: "weeksToMonth",
            H: "hours",
            M: "minutes",
            S: "seconds",
            D: "totalDays",
            I: "totalHours",
            N: "totalMinutes",
            T: "totalSeconds"
        },
        j = function(b, c, d) {
            this.el = b, this.$el = a(b), this.interval = null, this.offset = {}, this.options = a.extend({}, h),
                this.instanceNumber = f.length, f.push(this), this.$el.data("countdown-instance", this
                    .instanceNumber), d && ("function" == typeof d ? (this.$el.on("update.countdown", d), this.$el
                        .on("stoped.countdown", d), this.$el.on("finish.countdown", d)) : this.options = a
                    .extend({}, h, d)), this.setFinalDate(c), this.options.defer === !1 && this.start()
        };
    a.extend(j.prototype, {
        start: function() {
            null !== this.interval && clearInterval(this.interval);
            var a = this;
            this.update(), this.interval = setInterval(function() {
                a.update.call(a)
            }, this.options.precision)
        },
        stop: function() {
            clearInterval(this.interval), this.interval = null, this.dispatchEvent("stoped")
        },
        toggle: function() {
            this.interval ? this.stop() : this.start()
        },
        pause: function() {
            this.stop()
        },
        resume: function() {
            this.start()
        },
        remove: function() {
            this.stop.call(this), f[this.instanceNumber] = null, delete this.$el.data()
                .countdownInstance
        },
        setFinalDate: function(a) {
            this.finalDate = b(a)
        },
        update: function() {
            if (0 === this.$el.closest("html").length) return void this.remove();
            var b, c = void 0 !== a._data(this.el, "events"),
                d = new Date;
            b = this.finalDate.getTime() - d.getTime(), b = Math.ceil(b / 1e3), b = !this.options
                .elapse && b < 0 ? 0 : Math.abs(b), this.totalSecsLeft !== b && c && (this
                    .totalSecsLeft = b, this.elapsed = d >= this.finalDate, this.offset = {
                        seconds: this.totalSecsLeft % 60,
                        minutes: Math.floor(this.totalSecsLeft / 60) % 60,
                        hours: Math.floor(this.totalSecsLeft / 60 / 60) % 24,
                        days: Math.floor(this.totalSecsLeft / 60 / 60 / 24) % 7,
                        daysToWeek: Math.floor(this.totalSecsLeft / 60 / 60 / 24) % 7,
                        daysToMonth: Math.floor(this.totalSecsLeft / 60 / 60 / 24 % 30.4368),
                        weeks: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 7),
                        weeksToMonth: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 7) % 4,
                        months: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 30.4368),
                        years: Math.abs(this.finalDate.getFullYear() - d.getFullYear()),
                        totalDays: Math.floor(this.totalSecsLeft / 60 / 60 / 24),
                        totalHours: Math.floor(this.totalSecsLeft / 60 / 60),
                        totalMinutes: Math.floor(this.totalSecsLeft / 60),
                        totalSeconds: this.totalSecsLeft
                    }, this.options.elapse || 0 !== this.totalSecsLeft ? this.dispatchEvent("update") :
                    (this.stop(), this.dispatchEvent("finish")))
        },
        dispatchEvent: function(b) {
            var c = a.Event(b + ".countdown");
            c.finalDate = this.finalDate, c.elapsed = this.elapsed, c.offset = a.extend({}, this
                .offset), c.strftime = d(this.offset), this.$el.trigger(c)
        }
    }), a.fn.countdown = function() {
        var b = Array.prototype.slice.call(arguments, 0);
        return this.each(function() {
            var c = a(this).data("countdown-instance");
            if (void 0 !== c) {
                var d = f[c],
                    e = b[0];
                j.prototype.hasOwnProperty(e) ? d[e].apply(d, b.slice(1)) : null === String(e).match(
                    /^[$A-Z_][0-9A-Z_$]*$/i) ? (d.setFinalDate.call(d, e), d.start()) : a.error(
                    "Method %s does not exist on jQuery.countdown".replace(/\%s/gi, e))
            } else new j(this, b[0], b[1])
        })
    }
});
</script>
<script>
;
(function($) {

    var MERCADO_JS = {
        init: function() {
            this.mercado_countdown();

        },
        mercado_countdown: function() {
            if ($(".mercado-countdown").length > 0) {
                $(".mercado-countdown").each(function(index, el) {
                    var _this = $(this),
                        _expire = _this.data('expire');
                    _this.countdown(_expire, function(event) {
                        $(this).html(event.strftime(
                            '<span><b>%D</b> Days</span> <span><b>%-H</b> Hrs</span> <span><b>%M</b> Mins</span> <span><b>%S</b> Secs</span>'
                        ));
                    });
                });
            }
        },

    }

    window.onload = function() {
        MERCADO_JS.init();
    }

})(window.Zepto || window.jQuery, window, document);
</script>