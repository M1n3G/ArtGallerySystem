@extends('master')
@section('content')

<link href="{{ asset('css/auction.css') }}" rel="stylesheet">

<div class="container px-4 mt-2">
    <div class="row mt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-family: 'Poppins', sans-serif;">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Auction</a></li>
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

<div class="container py-5">
    <div class="row">
        <div>
            <button id="add" class="btn btn-light btn-lgs" style="float: right;margin-bottom:45px; " type="submit">Add Auction</button>
        </div>
        @if(!empty($auction) && $auction->count())
        @foreach($auction as $row)
        <div class="col-md-12 col-lg-4 mb-4" style="margin-bottom:45px;">
            <div class="card">
                <img src="{{$row -> auctionImg}}" class="card-img-top" width=200 height=300 />
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <p class="wrap-countdown mercado-countdown medium text-muted" data-expire="{{ Carbon\Carbon::parse($row->start_date)->format('Y/m/d h:i:s') }}"></p>
                        <p class="small text-danger"><s></s></p>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="mb-0 fs-3">{{$row->auctionName}}</h5>
                        <h5 class="text-dark mb-0">
                            <div class="col">
                                <span class="text-uppercase fs-6" style="color:#6c757d">
                                    Start from</span>
                            </div>
                            <div class="col mt-2">{{$row->startPrice}}</div>

                        </h5>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        <p class="text-muted mb-0">{{$row->auctionStatus}} <br /> <span class="fw-bold"></span></p>
                        <div><a class="btn-getstarted scrollto col mt-2" href="{{ action('AuctionController@viewDetails', $row->auctionID ) }}" style="text-decoration: none;">View Details</a></div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
        @else
        <div class="row">
            <h3 class="text-center">There are no Auction Item.</h3>
        </div>
        @endif
    </div>
</div>

<script type="text/javascript">
    document.getElementById("add").onclick = function() {
        location.href = "addAuction";
    };
</script>

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