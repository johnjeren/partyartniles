/* jquery.nicescroll 3.2.0 InuYaksa*2013 MIT http://areaaperta.com/nicescroll */
(function(e) {
    var y = !1,
        D = !1,
        J = 5E3,
        K = 2E3,
        x = 0,
        L = function() {
            var e = document.getElementsByTagName("script"),
                e = e[e.length - 1].src.split("?")[0];
            return 0 < e.split("/").length ? e.split("/").slice(0, -1).join("/") + "/" : ""
        }();
    Array.prototype.forEach || (Array.prototype.forEach = function(e, c) {
        for (var h = 0, l = this.length; h < l; ++h)
            e.call(c, this[h], h, this)
    });
    var v = window.requestAnimationFrame || !1,
        w = window.cancelAnimationFrame || !1;
    ["ms", "moz", "webkit", "o"].forEach(function(e) {
        v || (v = window[e + "RequestAnimationFrame"]);
        w || (w =
        window[e + "CancelAnimationFrame"] || window[e + "CancelRequestAnimationFrame"])
    });
    var z = window.MutationObserver || window.WebKitMutationObserver || !1,
        F = {
            zindex: "auto",
            cursoropacitymin: 0,
            cursoropacitymax: 1,
            cursorcolor: "#424242",
            cursorwidth: "5px",
            cursorborder: "1px solid #fff",
            cursorborderradius: "5px",
            scrollspeed: 60,
            mousescrollstep: 24,
            touchbehavior: !1,
            hwacceleration: !0,
            usetransition: !0,
            boxzoom: !1,
            dblclickzoom: !0,
            gesturezoom: !0,
            grabcursorenabled: !0,
            autohidemode: !0,
            background: "",
            iframeautoresize: !0,
            cursorminheight: 32,
            preservenativescrolling: !0,
            railoffset: !1,
            bouncescroll: !0,
            spacebarenabled: !0,
            railpadding: {
                top: 0,
                right: 0,
                left: 0,
                bottom: 0
            },
            disableoutline: !0,
            horizrailenabled: !0,
            railalign: "right",
            railvalign: "bottom",
            enabletranslate3d: !0,
            enablemousewheel: !0,
            enablekeyboard: !0,
            smoothscroll: !0,
            sensitiverail: !0,
            enablemouselockapi: !0,
            cursorfixedheight: !1,
            directionlockdeadzone: 6,
            hidecursordelay: 400,
            nativeparentscrolling: !0,
            enablescrollonselection: !0,
            overflowx: !0,
            overflowy: !0,
            cursordragspeed: 0.3,
            rtlmode: !1,
            cursordragontouch: !1
        },
        E = !1,
        M = function() {
            if (E)
                return E;
            var e = document.createElement("DIV"),
                c = {
                    haspointerlock: "pointerLockElement" in document || "mozPointerLockElement" in document || "webkitPointerLockElement" in document
                };
            c.isopera = "opera" in window;
            c.isopera12 = c.isopera && "getUserMedia" in navigator;
            c.isie = "all" in document && "attachEvent" in e && !c.isopera;
            c.isieold = c.isie && !("msInterpolationMode" in e.style);
            c.isie7 = c.isie && !c.isieold && (!("documentMode" in document) || 7 == document.documentMode);
            c.isie8 = c.isie && "documentMode" in document &&
            8 == document.documentMode;
            c.isie9 = c.isie && "performance" in window && 9 <= document.documentMode;
            c.isie10 = c.isie && "performance" in window && 10 <= document.documentMode;
            c.isie9mobile = /iemobile.9/i.test(navigator.userAgent);
            c.isie9mobile && (c.isie9 = !1);
            c.isie7mobile = !c.isie9mobile && c.isie7 && /iemobile/i.test(navigator.userAgent);
            c.ismozilla = "MozAppearance" in e.style;
            c.iswebkit = "WebkitAppearance" in e.style;
            c.ischrome = "chrome" in window;
            c.ischrome22 = c.ischrome && c.haspointerlock;
            c.ischrome26 = c.ischrome && "transition" in
            e.style;
            c.cantouch = "ontouchstart" in document.documentElement || "ontouchstart" in window;
            c.hasmstouch = window.navigator.msPointerEnabled || !1;
            c.ismac = /^mac$/i.test(navigator.platform);
            c.isios = c.cantouch && /iphone|ipad|ipod/i.test(navigator.platform);
            c.isios4 = c.isios && !("seal" in Object);
            c.isandroid = /android/i.test(navigator.userAgent);
            c.trstyle = !1;
            c.hastransform = !1;
            c.hastranslate3d = !1;
            c.transitionstyle = !1;
            c.hastransition = !1;
            c.transitionend = !1;
            for (var h = ["transform", "msTransform", "webkitTransform", "MozTransform",
                "OTransform"], l = 0; l < h.length; l++)
                if ("undefined" != typeof e.style[h[l]]) {
                    c.trstyle = h[l];
                    break
                }
            c.hastransform = !1 != c.trstyle;
            c.hastransform && (e.style[c.trstyle] = "translate3d(1px,2px,3px)", c.hastranslate3d = /translate3d/.test(e.style[c.trstyle]));
            c.transitionstyle = !1;
            c.prefixstyle = "";
            c.transitionend = !1;
            for (var h = "transition webkitTransition MozTransition OTransition OTransition msTransition KhtmlTransition".split(" "), n = " -webkit- -moz- -o- -o -ms- -khtml-".split(" "), t = "transitionend webkitTransitionEnd transitionend otransitionend oTransitionEnd msTransitionEnd KhtmlTransitionEnd".split(" "),
                l = 0; l < h.length; l++)
                if (h[l] in e.style) {
                    c.transitionstyle = h[l];
                    c.prefixstyle = n[l];
                    c.transitionend = t[l];
                    break
                }
            c.ischrome26 && (c.prefixstyle = n[1]);
            c.hastransition = c.transitionstyle;
            a:
            {
                h = ["-moz-grab", "-webkit-grab", "grab"];
                if (c.ischrome && !c.ischrome22 || c.isie)
                    h = [];
                for (l = 0; l < h.length; l++)
                    if (n = h[l], e.style.cursor = n, e.style.cursor == n) {
                        h = n;
                        break a
                    }
                h = "url(http://www.google.com/intl/en_ALL/mapfiles/openhand.cur),n-resize"
            }c.cursorgrabvalue = h;
            c.hasmousecapture = "setCapture" in e;
            c.hasMutationObserver = !1 !== z;
            return E =
            c
        },
        N = function(k, c) {
            function h() {
                var d = b.win;
                if ("zIndex" in d)
                    return d.zIndex();
                for (; 0 < d.length && 9 != d[0].nodeType;) {
                    var c = d.css("zIndex");
                    if (!isNaN(c) && 0 != c)
                        return parseInt(c);
                    d = d.parent()
                }
                return !1
            }
            function l(d, c, g) {
                c = d.css(c);
                d = parseFloat(c);
                return isNaN(d) ? (d = u[c] || 0, g = 3 == d ? g ? b.win.outerHeight() - b.win.innerHeight() : b.win.outerWidth() - b.win.innerWidth() : 1, b.isie8 && d && (d += 1), g ? d : 0) : d
            }
            function n(d, c, g, e) {
                b._bind(d, c, function(b) {
                    b = b ? b : window.event;
                    var e = {
                        original: b,
                        target: b.target || b.srcElement,
                        type: "wheel",
                        deltaMode: "MozMousePixelScroll" == b.type ? 0 : 1,
                        deltaX: 0,
                        deltaZ: 0,
                        preventDefault: function() {
                            b.preventDefault ? b.preventDefault() : b.returnValue = !1;
                            return !1
                        },
                        stopImmediatePropagation: function() {
                            b.stopImmediatePropagation ? b.stopImmediatePropagation() : b.cancelBubble = !0
                        }
                    };
                    "mousewheel" == c ? (e.deltaY = -0.025 * b.wheelDelta, b.wheelDeltaX && (e.deltaX = -0.025 * b.wheelDeltaX)) : e.deltaY = b.detail;
                    return g.call(d, e)
                }, e)
            }
            function t(d, c, g) {
                var e,
                    f;
                0 == d.deltaMode ? (e = -Math.floor(d.deltaX * (b.opt.mousescrollstep / 54)), f = -Math.floor(d.deltaY *
                (b.opt.mousescrollstep / 54))) : 1 == d.deltaMode && (e = -Math.floor(d.deltaX * b.opt.mousescrollstep), f = -Math.floor(d.deltaY * b.opt.mousescrollstep));
                c && (0 == e && f) && (e = f, f = 0);
                e && (b.scrollmom && b.scrollmom.stop(), b.lastdeltax += e, b.debounced("mousewheelx", function() {
                    var d = b.lastdeltax;
                    b.lastdeltax = 0;
                    b.rail.drag || b.doScrollLeftBy(d)
                }, 120));
                if (f) {
                    if (b.opt.nativeparentscrolling && g && !b.ispage && !b.zoomactive)
                        if (0 > f) {
                            if (b.getScrollTop() >= b.page.maxh)
                                return !0
                        } else if (0 >= b.getScrollTop())
                            return !0;
                    b.scrollmom && b.scrollmom.stop();
                    b.lastdeltay += f;
                    b.debounced("mousewheely", function() {
                        var d = b.lastdeltay;
                        b.lastdeltay = 0;
                        b.rail.drag || b.doScrollBy(d)
                    }, 120)
                }
                d.stopImmediatePropagation();
                return d.preventDefault()
            }
            var b = this;
            this.version = "3.4.0";
            this.name = "nicescroll";
            this.me = c;
            this.opt = {
                doc: e("body"),
                win: !1
            };
            e.extend(this.opt, F);
            this.opt.snapbackspeed = 80;
            if (k)
                for (var q in b.opt)
                    "undefined" != typeof k[q] && (b.opt[q] = k[q]);
            this.iddoc = (this.doc = b.opt.doc) && this.doc[0] ? this.doc[0].id || "" : "";
            this.ispage = /BODY|HTML/.test(b.opt.win ? b.opt.win[0].nodeName :
            this.doc[0].nodeName);
            this.haswrapper = !1 !== b.opt.win;
            this.win = b.opt.win || (this.ispage ? e(window) : this.doc);
            this.docscroll = this.ispage && !this.haswrapper ? e(window) : this.win;
            this.body = e("body");
            this.iframe = this.isfixed = this.viewport = !1;
            this.isiframe = "IFRAME" == this.doc[0].nodeName && "IFRAME" == this.win[0].nodeName;
            this.istextarea = "TEXTAREA" == this.win[0].nodeName;
            this.forcescreen = !1;
            this.canshowonmouseevent = "scroll" != b.opt.autohidemode;
            this.page = this.view = this.onzoomout = this.onzoomin = this.onscrollcancel =
            this.onscrollend = this.onscrollstart = this.onclick = this.ongesturezoom = this.onkeypress = this.onmousewheel = this.onmousemove = this.onmouseup = this.onmousedown = !1;
            this.scroll = {
                x: 0,
                y: 0
            };
            this.scrollratio = {
                x: 0,
                y: 0
            };
            this.cursorheight = 20;
            this.scrollvaluemax = 0;
            this.observerremover = this.observer = this.scrollmom = this.scrollrunning = this.checkrtlmode = !1;
            do this.id = "ascrail" + K++;
            while (document.getElementById(this.id));
            this.hasmousefocus = this.hasfocus = this.zoomactive = this.zoom = this.selectiondrag = this.cursorfreezed = this.cursor =
            this.rail = !1;
            this.visibility = !0;
            this.hidden = this.locked = !1;
            this.cursoractive = !0;
            this.overflowx = b.opt.overflowx;
            this.overflowy = b.opt.overflowy;
            this.nativescrollingarea = !1;
            this.checkarea = 0;
            this.events = [];
            this.saved = {};
            this.delaylist = {};
            this.synclist = {};
            this.lastdeltay = this.lastdeltax = 0;
            this.detected = M();
            var f = e.extend({}, this.detected);
            this.ishwscroll = (this.canhwscroll = f.hastransform && b.opt.hwacceleration) && b.haswrapper;
            this.istouchcapable = !1;
            f.cantouch && (f.ischrome && !f.isios && !f.isandroid) && (this.istouchcapable =
            !0, f.cantouch = !1);
            f.cantouch && (f.ismozilla && !f.isios) && (this.istouchcapable = !0, f.cantouch = !1);
            b.opt.enablemouselockapi || (f.hasmousecapture = !1, f.haspointerlock = !1);
            this.delayed = function(d, c, g, e) {
                var f = b.delaylist[d],
                    h = (new Date).getTime();
                if (!e && f && f.tt)
                    return !1;
                f && f.tt && clearTimeout(f.tt);
                if (f && f.last + g > h && !f.tt)
                    b.delaylist[d] = {
                        last: h + g,
                        tt: setTimeout(function() {
                            b.delaylist[d].tt = 0;
                            c.call()
                        }, g)
                    };
                else if (!f || !f.tt)
                    b.delaylist[d] = {
                        last: h,
                        tt: 0
                    }, setTimeout(function() {
                        c.call()
                    }, 0)
            };
            this.debounced = function(d,
            c, g) {
                var f = b.delaylist[d];
                (new Date).getTime();
                b.delaylist[d] = c;
                f || setTimeout(function() {
                    var c = b.delaylist[d];
                    b.delaylist[d] = !1;
                    c.call()
                }, g)
            };
            this.synched = function(d, c) {
                b.synclist[d] = c;
                (function() {
                    b.onsync || (v(function() {
                        b.onsync = !1;
                        for (d in b.synclist) {
                            var c = b.synclist[d];
                            c && c.call(b);
                            b.synclist[d] = !1
                        }
                    }), b.onsync = !0)
                })();
                return d
            };
            this.unsynched = function(d) {
                b.synclist[d] && (b.synclist[d] = !1)
            };
            this.css = function(d, c) {
                for (var g in c)
                    b.saved.css.push([d, g, d.css(g)]), d.css(g, c[g])
            };
            this.scrollTop = function(d) {
                return "undefined" ==
                typeof d ? b.getScrollTop() : b.setScrollTop(d)
            };
            this.scrollLeft = function(d) {
                return "undefined" == typeof d ? b.getScrollLeft() : b.setScrollLeft(d)
            };
            BezierClass = function(b, c, g, f, e, h, l) {
                this.st = b;
                this.ed = c;
                this.spd = g;
                this.p1 = f || 0;
                this.p2 = e || 1;
                this.p3 = h || 0;
                this.p4 = l || 1;
                this.ts = (new Date).getTime();
                this.df = this.ed - this.st
            };
            BezierClass.prototype = {
                B2: function(b) {
                    return 3 * b * b * (1 - b)
                },
                B3: function(b) {
                    return 3 * b * (1 - b) * (1 - b)
                },
                B4: function(b) {
                    return (1 - b) * (1 - b) * (1 - b)
                },
                getNow: function() {
                    var b = 1 - ((new Date).getTime() - this.ts) /
                        this.spd,
                        c = this.B2(b) + this.B3(b) + this.B4(b);
                    return 0 > b ? this.ed : this.st + Math.round(this.df * c)
                },
                update: function(b, c) {
                    this.st = this.getNow();
                    this.ed = b;
                    this.spd = c;
                    this.ts = (new Date).getTime();
                    this.df = this.ed - this.st;
                    return this
                }
            };
            if (this.ishwscroll) {
                this.doc.translate = {
                    x: 0,
                    y: 0,
                    tx: "0px",
                    ty: "0px"
                };
                f.hastranslate3d && f.isios && this.doc.css("-webkit-backface-visibility", "hidden");
                var r = function() {
                    var d = b.doc.css(f.trstyle);
                    return d && "matrix" == d.substr(0, 6) ? d.replace(/^.*\((.*)\)$/g, "$1").replace(/px/g, "").split(/, +/) :
                    !1
                };
                this.getScrollTop = function(d) {
                    if (!d) {
                        if (d = r())
                            return 16 == d.length ? -d[13] : -d[5];
                        if (b.timerscroll && b.timerscroll.bz)
                            return b.timerscroll.bz.getNow()
                    }
                    return b.doc.translate.y
                };
                this.getScrollLeft = function(d) {
                    if (!d) {
                        if (d = r())
                            return 16 == d.length ? -d[12] : -d[4];
                        if (b.timerscroll && b.timerscroll.bh)
                            return b.timerscroll.bh.getNow()
                    }
                    return b.doc.translate.x
                };
                this.notifyScrollEvent = document.createEvent ? function(b) {
                    var c = document.createEvent("UIEvents");
                    c.initUIEvent("scroll", !1, !0, window, 1);
                    b.dispatchEvent(c)
                } :
                document.fireEvent ? function(b) {
                    var c = document.createEventObject();
                    b.fireEvent("onscroll");
                    c.cancelBubble = !0
                } : function(b, c) {};
                f.hastranslate3d && b.opt.enabletranslate3d ? (this.setScrollTop = function(d, c) {
                    b.doc.translate.y = d;
                    b.doc.translate.ty = -1 * d + "px";
                    b.doc.css(f.trstyle, "translate3d(" + b.doc.translate.tx + "," + b.doc.translate.ty + ",0px)");
                    c || b.notifyScrollEvent(b.win[0])
                }, this.setScrollLeft = function(d, c) {
                    b.doc.translate.x = d;
                    b.doc.translate.tx = -1 * d + "px";
                    b.doc.css(f.trstyle, "translate3d(" + b.doc.translate.tx +
                    "," + b.doc.translate.ty + ",0px)");
                    c || b.notifyScrollEvent(b.win[0])
                }) : (this.setScrollTop = function(d, c) {
                    b.doc.translate.y = d;
                    b.doc.translate.ty = -1 * d + "px";
                    b.doc.css(f.trstyle, "translate(" + b.doc.translate.tx + "," + b.doc.translate.ty + ")");
                    c || b.notifyScrollEvent(b.win[0])
                }, this.setScrollLeft = function(d, c) {
                    b.doc.translate.x = d;
                    b.doc.translate.tx = -1 * d + "px";
                    b.doc.css(f.trstyle, "translate(" + b.doc.translate.tx + "," + b.doc.translate.ty + ")");
                    c || b.notifyScrollEvent(b.win[0])
                })
            } else
                this.getScrollTop = function() {
                    return b.docscroll.scrollTop()
                },
                this.setScrollTop = function(d) {
                    return b.docscroll.scrollTop(d)
                }, this.getScrollLeft = function() {
                    return b.docscroll.scrollLeft()
                }, this.setScrollLeft = function(d) {
                    return b.docscroll.scrollLeft(d)
                };
            this.getTarget = function(b) {
                return !b ? !1 : b.target ? b.target : b.srcElement ? b.srcElement : !1
            };
            this.hasParent = function(b, c) {
                if (!b)
                    return !1;
                for (var g = b.target || b.srcElement || b || !1; g && g.id != c;)
                    g = g.parentNode || !1;
                return !1 !== g
            };
            var u = {
                thin: 1,
                medium: 3,
                thick: 5
            };
            this.getOffset = function() {
                if (b.isfixed)
                    return {
                        top: parseFloat(b.win.css("top")),
                        left: parseFloat(b.win.css("left"))
                    };
                if (!b.viewport)
                    return b.win.offset();
                var d = b.win.offset(),
                    c = b.viewport.offset();
                return {
                    top: d.top - c.top + b.viewport.scrollTop(),
                    left: d.left - c.left + b.viewport.scrollLeft()
                }
            };
            this.updateScrollBar = function(d) {
                if (b.ishwscroll)
                    b.rail.css({
                        height: b.win.innerHeight()
                    }), b.railh && b.railh.css({
                        width: b.win.innerWidth()
                    });
                else {
                    var c = b.getOffset(),
                        g = c.top,
                        f = c.left,
                        g = g + l(b.win, "border-top-width", !0);
                    b.win.outerWidth();
                    b.win.innerWidth();
                    var f = f + (b.rail.align ? b.win.outerWidth() -
                        l(b.win, "border-right-width") - b.rail.width : l(b.win, "border-left-width")),
                        e = b.opt.railoffset;
                    e && (e.top && (g += e.top), b.rail.align && e.left && (f += e.left));
                    b.locked || b.rail.css({
                        top: g,
                        left: f,
                        height: d ? d.h : b.win.innerHeight()
                    });
                    b.zoom && b.zoom.css({
                        top: g + 1,
                        left: 1 == b.rail.align ? f - 20 : f + b.rail.width + 4
                    });
                    b.railh && !b.locked && (g = c.top, f = c.left, d = b.railh.align ? g + l(b.win, "border-top-width", !0) + b.win.innerHeight() - b.railh.height : g + l(b.win, "border-top-width", !0), f += l(b.win, "border-left-width"), b.railh.css({
                        top: d,
                        left: f,
                        width: b.railh.width
                    }))
                }
            };
            this.doRailClick = function(d, c, g) {
                var f;
                b.locked || (b.cancelEvent(d), c ? (c = g ? b.doScrollLeft : b.doScrollTop, f = g ? (d.pageX - b.railh.offset().left - b.cursorwidth / 2) * b.scrollratio.x : (d.pageY - b.rail.offset().top - b.cursorheight / 2) * b.scrollratio.y, c(f)) : (c = g ? b.doScrollLeftBy : b.doScrollBy, f = g ? b.scroll.x : b.scroll.y, d = g ? d.pageX - b.railh.offset().left : d.pageY - b.rail.offset().top, g = g ? b.view.w : b.view.h, f >= d ? c(g) : c(-g)))
            };
            b.hasanimationframe = v;
            b.hascancelanimationframe = w;
            b.hasanimationframe ? b.hascancelanimationframe ||
            (w = function() {
                b.cancelAnimationFrame = !0
            }) : (v = function(b) {
                return setTimeout(b, 15 - Math.floor(+new Date / 1E3) % 16)
            }, w = clearInterval);
            this.init = function() {
                b.saved.css = [];
                if (f.isie7mobile)
                    return !0;
                f.hasmstouch && b.css(b.ispage ? e("html") : b.win, {
                    "-ms-touch-action": "none"
                });
                b.zindex = "auto";
                b.zindex = !b.ispage && "auto" == b.opt.zindex ? h() || "auto" : b.opt.zindex;
                !b.ispage && "auto" != b.zindex && b.zindex > x && (x = b.zindex);
                b.isie && (0 == b.zindex && "auto" == b.opt.zindex) && (b.zindex = "auto");
                if (!b.ispage || !f.cantouch && !f.isieold &&
                !f.isie9mobile) {
                    var d = b.docscroll;
                    b.ispage && (d = b.haswrapper ? b.win : b.doc);
                    f.isie9mobile || b.css(d, {
                        "overflow-y": "hidden"
                    });
                    b.ispage && f.isie7 && ("BODY" == b.doc[0].nodeName ? b.css(e("html"), {
                        "overflow-y": "hidden"
                    }) : "HTML" == b.doc[0].nodeName && b.css(e("body"), {
                        "overflow-y": "hidden"
                    }));
                    f.isios && (!b.ispage && !b.haswrapper) && b.css(e("body"), {
                        "-webkit-overflow-scrolling": "touch"
                    });
                    var c = e(document.createElement("div"));
                    c.css({
                        position: "relative",
                        top: 0,
                        "float": "right",
                        width: b.opt.cursorwidth,
                        height: "0px",
                        "background-color": b.opt.cursorcolor,
                        border: b.opt.cursorborder,
                        "background-clip": "padding-box",
                        "-webkit-border-radius": b.opt.cursorborderradius,
                        "-moz-border-radius": b.opt.cursorborderradius,
                        "border-radius": b.opt.cursorborderradius
                    });
                    c.hborder = parseFloat(c.outerHeight() - c.innerHeight());
                    b.cursor = c;
                    var g = e(document.createElement("div"));
                    g.attr("id", b.id);
                    g.addClass("nicescroll-rails");
                    var l,
                        k,
                        n = ["left", "right"],
                        G;
                    for (G in n)
                        k = n[G], (l = b.opt.railpadding[k]) ? g.css("padding-" + k, l + "px") : b.opt.railpadding[k] = 0;
                    g.append(c);
                    g.width = Math.max(parseFloat(b.opt.cursorwidth),
                    c.outerWidth()) + b.opt.railpadding.left + b.opt.railpadding.right;
                    g.css({
                        width: g.width + "px",
                        zIndex: b.zindex,
                        background: b.opt.background,
                        cursor: "default"
                    });
                    g.visibility = !0;
                    g.scrollable = !0;
                    g.align = "left" == b.opt.railalign ? 0 : 1;
                    b.rail = g;
                    c = b.rail.drag = !1;
                    b.opt.boxzoom && (!b.ispage && !f.isieold) && (c = document.createElement("div"), b.bind(c, "click", b.doZoom), b.zoom = e(c), b.zoom.css({
                        cursor: "pointer",
                        "z-index": b.zindex,
                        backgroundImage: "url(" + L + "zoomico.png)",
                        height: 18,
                        width: 18,
                        backgroundPosition: "0px 0px"
                    }), b.opt.dblclickzoom &&
                    b.bind(b.win, "dblclick", b.doZoom), f.cantouch && b.opt.gesturezoom && (b.ongesturezoom = function(d) {
                        1.5 < d.scale && b.doZoomIn(d);
                        0.8 > d.scale && b.doZoomOut(d);
                        return b.cancelEvent(d)
                    }, b.bind(b.win, "gestureend", b.ongesturezoom)));
                    b.railh = !1;
                    if (b.opt.horizrailenabled) {
                        b.css(d, {
                            "overflow-x": "hidden"
                        });
                        c = e(document.createElement("div"));
                        c.css({
                            position: "relative",
                            top: 0,
                            height: b.opt.cursorwidth,
                            width: "0px",
                            "background-color": b.opt.cursorcolor,
                            border: b.opt.cursorborder,
                            "background-clip": "padding-box",
                            "-webkit-border-radius": b.opt.cursorborderradius,
                            "-moz-border-radius": b.opt.cursorborderradius,
                            "border-radius": b.opt.cursorborderradius
                        });
                        c.wborder = parseFloat(c.outerWidth() - c.innerWidth());
                        b.cursorh = c;
                        var m = e(document.createElement("div"));
                        m.attr("id", b.id + "-hr");
                        m.addClass("nicescroll-rails");
                        m.height = Math.max(parseFloat(b.opt.cursorwidth), c.outerHeight());
                        m.css({
                            height: m.height + "px",
                            zIndex: b.zindex,
                            background: b.opt.background
                        });
                        m.append(c);
                        m.visibility = !0;
                        m.scrollable = !0;
                        m.align = "top" == b.opt.railvalign ? 0 : 1;
                        b.railh = m;
                        b.railh.drag = !1
                    }
                    b.ispage ?
                    (g.css({
                        position: "fixed",
                        top: "0px",
                        height: "100%"
                    }), g.align ? g.css({
                        right: "0px"
                    }) : g.css({
                        left: "0px"
                    }), b.body.append(g), b.railh && (m.css({
                        position: "fixed",
                        left: "0px",
                        width: "100%"
                    }), m.align ? m.css({
                        bottom: "0px"
                    }) : m.css({
                        top: "0px"
                    }), b.body.append(m))) : (b.ishwscroll ? ("static" == b.win.css("position") && b.css(b.win, {
                        position: "relative"
                    }), d = "HTML" == b.win[0].nodeName ? b.body : b.win, b.zoom && (b.zoom.css({
                        position: "absolute",
                        top: 1,
                        right: 0,
                        "margin-right": g.width + 4
                    }), d.append(b.zoom)), g.css({
                        position: "absolute",
                        top: 0
                    }),
                    g.align ? g.css({
                        right: 0
                    }) : g.css({
                        left: 0
                    }), d.append(g), m && (m.css({
                        position: "absolute",
                        left: 0,
                        bottom: 0
                    }), m.align ? m.css({
                        bottom: 0
                    }) : m.css({
                        top: 0
                    }), d.append(m))) : (b.isfixed = "fixed" == b.win.css("position"), d = b.isfixed ? "fixed" : "absolute", b.isfixed || (b.viewport = b.getViewport(b.win[0])), b.viewport && (b.body = b.viewport, !1 == /relative|absolute/.test(b.viewport.css("position")) && b.css(b.viewport, {
                        position: "relative"
                    })), g.css({
                        position: d
                    }), b.zoom && b.zoom.css({
                        position: d
                    }), b.updateScrollBar(), b.body.append(g), b.zoom &&
                    b.body.append(b.zoom), b.railh && (m.css({
                        position: d
                    }), b.body.append(m))), f.isios && b.css(b.win, {
                        "-webkit-tap-highlight-color": "rgba(0,0,0,0)",
                        "-webkit-touch-callout": "none"
                    }), f.isie && b.opt.disableoutline && b.win.attr("hideFocus", "true"), f.iswebkit && b.opt.disableoutline && b.win.css({
                        outline: "none"
                    }));
                    !1 === b.opt.autohidemode ? (b.autohidedom = !1, b.rail.css({
                        opacity: b.opt.cursoropacitymax
                    }), b.railh && b.railh.css({
                        opacity: b.opt.cursoropacitymax
                    })) : !0 === b.opt.autohidemode ? (b.autohidedom = e().add(b.rail), f.isie8 &&
                    (b.autohidedom = b.autohidedom.add(b.cursor)), b.railh && (b.autohidedom = b.autohidedom.add(b.railh)), b.railh && f.isie8 && (b.autohidedom = b.autohidedom.add(b.cursorh))) : "scroll" == b.opt.autohidemode ? (b.autohidedom = e().add(b.rail), b.railh && (b.autohidedom = b.autohidedom.add(b.railh))) : "cursor" == b.opt.autohidemode ? (b.autohidedom = e().add(b.cursor), b.railh && (b.autohidedom = b.autohidedom.add(b.cursorh))) : "hidden" == b.opt.autohidemode && (b.autohidedom = !1, b.hide(), b.locked = !1);
                    if (f.isie9mobile)
                        b.scrollmom = new H(b), b.onmangotouch =
                        function(d) {
                            d = b.getScrollTop();
                            var c = b.getScrollLeft();
                            if (d == b.scrollmom.lastscrolly && c == b.scrollmom.lastscrollx)
                                return !0;
                            var g = d - b.mangotouch.sy,
                                f = c - b.mangotouch.sx;
                            if (0 != Math.round(Math.sqrt(Math.pow(f, 2) + Math.pow(g, 2)))) {
                                var p = 0 > g ? -1 : 1,
                                    e = 0 > f ? -1 : 1,
                                    h = +new Date;
                                b.mangotouch.lazy && clearTimeout(b.mangotouch.lazy);
                                80 < h - b.mangotouch.tm || b.mangotouch.dry != p || b.mangotouch.drx != e ? (b.scrollmom.stop(), b.scrollmom.reset(c, d), b.mangotouch.sy = d, b.mangotouch.ly = d, b.mangotouch.sx = c, b.mangotouch.lx = c, b.mangotouch.dry =
                                p, b.mangotouch.drx = e, b.mangotouch.tm = h) : (b.scrollmom.stop(), b.scrollmom.update(b.mangotouch.sx - f, b.mangotouch.sy - g), b.mangotouch.tm = h, g = Math.max(Math.abs(b.mangotouch.ly - d), Math.abs(b.mangotouch.lx - c)), b.mangotouch.ly = d, b.mangotouch.lx = c, 2 < g && (b.mangotouch.lazy = setTimeout(function() {
                                    b.mangotouch.lazy = !1;
                                    b.mangotouch.dry = 0;
                                    b.mangotouch.drx = 0;
                                    b.mangotouch.tm = 0;
                                    b.scrollmom.doMomentum(30)
                                }, 100)))
                            }
                        }, g = b.getScrollTop(), m = b.getScrollLeft(), b.mangotouch = {
                            sy: g,
                            ly: g,
                            dry: 0,
                            sx: m,
                            lx: m,
                            drx: 0,
                            lazy: !1,
                            tm: 0
                        }, b.bind(b.docscroll,
                        "scroll", b.onmangotouch);
                    else {
                        if (f.cantouch || b.istouchcapable || b.opt.touchbehavior || f.hasmstouch) {
                            b.scrollmom = new H(b);
                            b.ontouchstart = function(d) {
                                if (d.pointerType && 2 != d.pointerType)
                                    return !1;
                                if (!b.locked) {
                                    if (f.hasmstouch)
                                        for (var c = d.target ? d.target : !1; c;) {
                                            var g = e(c).getNiceScroll();
                                            if (0 < g.length && g[0].me == b.me)
                                                break;
                                            if (0 < g.length)
                                                return !1;
                                            if ("DIV" == c.nodeName && c.id == b.id)
                                                break;
                                            c = c.parentNode ? c.parentNode : !1
                                        }
                                    b.cancelScroll();
                                    if ((c = b.getTarget(d)) && /INPUT/i.test(c.nodeName) && /range/i.test(c.type))
                                        return b.stopPropagation(d);
                                    !("clientX" in d) && "changedTouches" in d && (d.clientX = d.changedTouches[0].clientX, d.clientY = d.changedTouches[0].clientY);
                                    b.forcescreen && (g = d, d = {
                                        original: d.original ? d.original : d
                                    }, d.clientX = g.screenX, d.clientY = g.screenY);
                                    b.rail.drag = {
                                        x: d.clientX,
                                        y: d.clientY,
                                        sx: b.scroll.x,
                                        sy: b.scroll.y,
                                        st: b.getScrollTop(),
                                        sl: b.getScrollLeft(),
                                        pt: 2,
                                        dl: !1
                                    };
                                    if (b.ispage || !b.opt.directionlockdeadzone)
                                        b.rail.drag.dl = "f";
                                    else {
                                        var g = e(window).width(),
                                            p = e(window).height(),
                                            h = Math.max(document.body.scrollWidth, document.documentElement.scrollWidth),
                                            l = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight),
                                            p = Math.max(0, l - p),
                                            g = Math.max(0, h - g);
                                        b.rail.drag.ck = !b.rail.scrollable && b.railh.scrollable ? 0 < p ? "v" : !1 : b.rail.scrollable && !b.railh.scrollable ? 0 < g ? "h" : !1 : !1;
                                        b.rail.drag.ck || (b.rail.drag.dl = "f")
                                    }
                                    b.opt.touchbehavior && (b.isiframe && f.isie) && (g = b.win.position(), b.rail.drag.x += g.left, b.rail.drag.y += g.top);
                                    b.hasmoving = !1;
                                    b.lastmouseup = !1;
                                    b.scrollmom.reset(d.clientX, d.clientY);
                                    if (!f.cantouch && !this.istouchcapable && !f.hasmstouch) {
                                        if (!c ||
                                        !/INPUT|SELECT|TEXTAREA/i.test(c.nodeName))
                                            return !b.ispage && f.hasmousecapture && c.setCapture(), b.cancelEvent(d);
                                        /SUBMIT|CANCEL|BUTTON/i.test(e(c).attr("type")) && (pc = {
                                            tg: c,
                                            click: !1
                                        }, b.preventclick = pc)
                                    }
                                }
                            };
                            b.ontouchend = function(d) {
                                if (d.pointerType && 2 != d.pointerType)
                                    return !1;
                                if (b.rail.drag && 2 == b.rail.drag.pt && (b.scrollmom.doMomentum(), b.rail.drag = !1, b.hasmoving && (b.hasmoving = !1, b.lastmouseup = !0, b.hideCursor(), f.hasmousecapture && document.releaseCapture(), !f.cantouch)))
                                    return b.cancelEvent(d)
                            };
                            var q = b.opt.touchbehavior &&
                            b.isiframe && !f.hasmousecapture;
                            b.ontouchmove = function(d, c) {
                                if (d.pointerType && 2 != d.pointerType)
                                    return !1;
                                if (b.rail.drag && 2 == b.rail.drag.pt) {
                                    if (f.cantouch && "undefined" == typeof d.original)
                                        return !0;
                                    b.hasmoving = !0;
                                    b.preventclick && !b.preventclick.click && (b.preventclick.click = b.preventclick.tg.onclick || !1, b.preventclick.tg.onclick = b.onpreventclick);
                                    d = e.extend({
                                        original: d
                                    }, d);
                                    "changedTouches" in d && (d.clientX = d.changedTouches[0].clientX, d.clientY = d.changedTouches[0].clientY);
                                    if (b.forcescreen) {
                                        var g = d;
                                        d = {
                                            original: d.original ?
                                            d.original : d
                                        };
                                        d.clientX = g.screenX;
                                        d.clientY = g.screenY
                                    }
                                    g = ofy = 0;
                                    if (q && !c) {
                                        var p = b.win.position(),
                                            g = -p.left;
                                        ofy = -p.top
                                    }
                                    var h = d.clientY + ofy,
                                        p = h - b.rail.drag.y,
                                        l = d.clientX + g,
                                        k = l - b.rail.drag.x,
                                        s = b.rail.drag.st - p;
                                    b.ishwscroll && b.opt.bouncescroll ? 0 > s ? s = Math.round(s / 2) : s > b.page.maxh && (s = b.page.maxh + Math.round((s - b.page.maxh) / 2)) : (0 > s && (h = s = 0), s > b.page.maxh && (s = b.page.maxh, h = 0));
                                    if (b.railh && b.railh.scrollable) {
                                        var m = b.rail.drag.sl - k;
                                        b.ishwscroll && b.opt.bouncescroll ? 0 > m ? m = Math.round(m / 2) : m > b.page.maxw && (m = b.page.maxw +
                                        Math.round((m - b.page.maxw) / 2)) : (0 > m && (l = m = 0), m > b.page.maxw && (m = b.page.maxw, l = 0))
                                    }
                                    g = !1;
                                    if (b.rail.drag.dl)
                                        g = !0, "v" == b.rail.drag.dl ? m = b.rail.drag.sl : "h" == b.rail.drag.dl && (s = b.rail.drag.st);
                                    else {
                                        var p = Math.abs(p),
                                            k = Math.abs(k),
                                            n = b.opt.directionlockdeadzone;
                                        if ("v" == b.rail.drag.ck) {
                                            if (p > n && k <= 0.3 * p)
                                                return b.rail.drag = !1, !0;
                                            k > n && (b.rail.drag.dl = "f", e("body").scrollTop(e("body").scrollTop()))
                                        } else if ("h" == b.rail.drag.ck) {
                                            if (k > n && p <= 0.3 * az)
                                                return b.rail.drag = !1, !0;
                                            p > n && (b.rail.drag.dl = "f", e("body").scrollLeft(e("body").scrollLeft()))
                                        }
                                    }
                                    b.synched("touchmove",
                                    function() {
                                        b.rail.drag && 2 == b.rail.drag.pt && (b.prepareTransition && b.prepareTransition(0), b.rail.scrollable && b.setScrollTop(s), b.scrollmom.update(l, h), b.railh && b.railh.scrollable ? (b.setScrollLeft(m), b.showCursor(s, m)) : b.showCursor(s), f.isie10 && document.selection.clear())
                                    });
                                    f.ischrome && b.istouchcapable && (g = !1);
                                    if (g)
                                        return b.cancelEvent(d)
                                }
                            }
                        }
                        b.onmousedown = function(d, c) {
                            if (!(b.rail.drag && 1 != b.rail.drag.pt)) {
                                if (b.locked)
                                    return b.cancelEvent(d);
                                b.cancelScroll();
                                b.rail.drag = {
                                    x: d.clientX,
                                    y: d.clientY,
                                    sx: b.scroll.x,
                                    sy: b.scroll.y,
                                    pt: 1,
                                    hr: !!c
                                };
                                var g = b.getTarget(d);
                                !b.ispage && f.hasmousecapture && g.setCapture();
                                b.isiframe && !f.hasmousecapture && (b.saved.csspointerevents = b.doc.css("pointer-events"), b.css(b.doc, {
                                    "pointer-events": "none"
                                }));
                                return b.cancelEvent(d)
                            }
                        };
                        b.onmouseup = function(d) {
                            if (b.rail.drag && (f.hasmousecapture && document.releaseCapture(), b.isiframe && !f.hasmousecapture && b.doc.css("pointer-events", b.saved.csspointerevents), 1 == b.rail.drag.pt))
                                return b.rail.drag = !1, b.cancelEvent(d)
                        };
                        b.onmousemove = function(d) {
                            if (b.rail.drag &&
                            1 == b.rail.drag.pt) {
                                if (f.ischrome && 0 == d.which)
                                    return b.onmouseup(d);
                                b.cursorfreezed = !0;
                                if (b.rail.drag.hr) {
                                    b.scroll.x = b.rail.drag.sx + (d.clientX - b.rail.drag.x);
                                    0 > b.scroll.x && (b.scroll.x = 0);
                                    var c = b.scrollvaluemaxw;
                                    b.scroll.x > c && (b.scroll.x = c)
                                } else
                                    b.scroll.y = b.rail.drag.sy + (d.clientY - b.rail.drag.y), 0 > b.scroll.y && (b.scroll.y = 0), c = b.scrollvaluemax, b.scroll.y > c && (b.scroll.y = c);
                                b.synched("mousemove", function() {
                                    b.rail.drag && 1 == b.rail.drag.pt && (b.showCursor(), b.rail.drag.hr ? b.doScrollLeft(Math.round(b.scroll.x *
                                    b.scrollratio.x), b.opt.cursordragspeed) : b.doScrollTop(Math.round(b.scroll.y * b.scrollratio.y), b.opt.cursordragspeed))
                                });
                                return b.cancelEvent(d)
                            }
                        };
                        if (f.cantouch || b.opt.touchbehavior)
                            b.onpreventclick = function(d) {
                                if (b.preventclick)
                                    return b.preventclick.tg.onclick = b.preventclick.click, b.preventclick = !1, b.cancelEvent(d)
                            }, b.bind(b.win, "mousedown", b.ontouchstart), b.onclick = f.isios ? !1 : function(d) {
                                return b.lastmouseup ? (b.lastmouseup = !1, b.cancelEvent(d)) : !0
                            }, b.opt.grabcursorenabled && f.cursorgrabvalue && (b.css(b.ispage ?
                            b.doc : b.win, {
                                cursor: f.cursorgrabvalue
                            }), b.css(b.rail, {
                                cursor: f.cursorgrabvalue
                            }));
                        else {
                            var r = function(d) {
                                if (b.selectiondrag) {
                                    if (d) {
                                        var c = b.win.outerHeight();
                                        d = d.pageY - b.selectiondrag.top;
                                        0 < d && d < c && (d = 0);
                                        d >= c && (d -= c);
                                        b.selectiondrag.df = d
                                    }
                                    0 != b.selectiondrag.df && (b.doScrollBy(2 * -Math.floor(b.selectiondrag.df / 6)), b.debounced("doselectionscroll", function() {
                                        r()
                                    }, 50))
                                }
                            };
                            b.hasTextSelected = "getSelection" in document ? function() {
                                return 0 < document.getSelection().rangeCount
                            } : "selection" in document ? function() {
                                return "None" !=
                                document.selection.type
                            } : function() {
                                return !1
                            };
                            b.onselectionstart = function(d) {
                                b.ispage || (b.selectiondrag = b.win.offset())
                            };
                            b.onselectionend = function(d) {
                                b.selectiondrag = !1
                            };
                            b.onselectiondrag = function(d) {
                                b.selectiondrag && b.hasTextSelected() && b.debounced("selectionscroll", function() {
                                    r(d)
                                }, 250)
                            }
                        }
                        f.hasmstouch && (b.css(b.rail, {
                            "-ms-touch-action": "none"
                        }), b.css(b.cursor, {
                            "-ms-touch-action": "none"
                        }), b.bind(b.win, "MSPointerDown", b.ontouchstart), b.bind(document, "MSPointerUp", b.ontouchend), b.bind(document, "MSPointerMove",
                        b.ontouchmove), b.bind(b.cursor, "MSGestureHold", function(b) {
                            b.preventDefault()
                        }), b.bind(b.cursor, "contextmenu", function(b) {
                            b.preventDefault()
                        }));
                        this.istouchcapable && (b.bind(b.win, "touchstart", b.ontouchstart), b.bind(document, "touchend", b.ontouchend), b.bind(document, "touchcancel", b.ontouchend), b.bind(document, "touchmove", b.ontouchmove));
                        b.bind(b.cursor, "mousedown", b.onmousedown);
                        b.bind(b.cursor, "mouseup", b.onmouseup);
                        b.railh && (b.bind(b.cursorh, "mousedown", function(d) {
                            b.onmousedown(d, !0)
                        }), b.bind(b.cursorh,
                        "mouseup", function(d) {
                            if (!(b.rail.drag && 2 == b.rail.drag.pt))
                                return b.rail.drag = !1, b.hasmoving = !1, b.hideCursor(), f.hasmousecapture && document.releaseCapture(), b.cancelEvent(d)
                        }));
                        if (b.opt.cursordragontouch || !f.cantouch && !b.opt.touchbehavior)
                            b.rail.css({
                                cursor: "default"
                            }), b.railh && b.railh.css({
                                cursor: "default"
                            }), b.jqbind(b.rail, "mouseenter", function() {
                                b.canshowonmouseevent && b.showCursor();
                                b.rail.active = !0
                            }), b.jqbind(b.rail, "mouseleave", function() {
                                b.rail.active = !1;
                                b.rail.drag || b.hideCursor()
                            }), b.opt.sensitiverail &&
                            (b.bind(b.rail, "click", function(d) {
                                b.doRailClick(d, !1, !1)
                            }), b.bind(b.rail, "dblclick", function(d) {
                                b.doRailClick(d, !0, !1)
                            }), b.bind(b.cursor, "click", function(d) {
                                b.cancelEvent(d)
                            }), b.bind(b.cursor, "dblclick", function(d) {
                                b.cancelEvent(d)
                            })), b.railh && (b.jqbind(b.railh, "mouseenter", function() {
                                b.canshowonmouseevent && b.showCursor();
                                b.rail.active = !0
                            }), b.jqbind(b.railh, "mouseleave", function() {
                                b.rail.active = !1;
                                b.rail.drag || b.hideCursor()
                            }), b.opt.sensitiverail && (b.bind(b.railh, "click", function(d) {
                                b.doRailClick(d,
                                !1, !0)
                            }), b.bind(b.railh, "dblclick", function(d) {
                                b.doRailClick(d, !0, !0)
                            }), b.bind(b.cursorh, "click", function(d) {
                                b.cancelEvent(d)
                            }), b.bind(b.cursorh, "dblclick", function(d) {
                                b.cancelEvent(d)
                            })));
                        !f.cantouch && !b.opt.touchbehavior ? (b.bind(f.hasmousecapture ? b.win : document, "mouseup", b.onmouseup), b.bind(document, "mousemove", b.onmousemove), b.onclick && b.bind(document, "click", b.onclick), !b.ispage && b.opt.enablescrollonselection && (b.bind(b.win[0], "mousedown", b.onselectionstart), b.bind(document, "mouseup", b.onselectionend),
                        b.bind(b.cursor, "mouseup", b.onselectionend), b.cursorh && b.bind(b.cursorh, "mouseup", b.onselectionend), b.bind(document, "mousemove", b.onselectiondrag)), b.zoom && (b.jqbind(b.zoom, "mouseenter", function() {
                            b.canshowonmouseevent && b.showCursor();
                            b.rail.active = !0
                        }), b.jqbind(b.zoom, "mouseleave", function() {
                            b.rail.active = !1;
                            b.rail.drag || b.hideCursor()
                        }))) : (b.bind(f.hasmousecapture ? b.win : document, "mouseup", b.ontouchend), b.bind(document, "mousemove", b.ontouchmove), b.onclick && b.bind(document, "click", b.onclick), b.opt.cursordragontouch &&
                        (b.bind(b.cursor, "mousedown", b.onmousedown), b.bind(b.cursor, "mousemove", b.onmousemove), b.cursorh && b.bind(b.cursorh, "mousedown", b.onmousedown), b.cursorh && b.bind(b.cursorh, "mousemove", b.onmousemove)));
                        b.opt.enablemousewheel && (b.isiframe || b.bind(f.isie && b.ispage ? document : b.docscroll, "mousewheel", b.onmousewheel), b.bind(b.rail, "mousewheel", b.onmousewheel), b.railh && b.bind(b.railh, "mousewheel", b.onmousewheelhr));
                        !b.ispage && (!f.cantouch && !/HTML|BODY/.test(b.win[0].nodeName)) && (b.win.attr("tabindex") || b.win.attr({
                            tabindex: J++
                        }),
                        b.jqbind(b.win, "focus", function(d) {
                            y = b.getTarget(d).id || !0;
                            b.hasfocus = !0;
                            b.canshowonmouseevent && b.noticeCursor()
                        }), b.jqbind(b.win, "blur", function(d) {
                            y = !1;
                            b.hasfocus = !1
                        }), b.jqbind(b.win, "mouseenter", function(d) {
                            D = b.getTarget(d).id || !0;
                            b.hasmousefocus = !0;
                            b.canshowonmouseevent && b.noticeCursor()
                        }), b.jqbind(b.win, "mouseleave", function() {
                            D = !1;
                            b.hasmousefocus = !1
                        }))
                    }
                    b.onkeypress = function(d) {
                        if (b.locked && 0 == b.page.maxh)
                            return !0;
                        d = d ? d : window.e;
                        var c = b.getTarget(d);
                        if (c && /INPUT|TEXTAREA|SELECT|OPTION/.test(c.nodeName) &&
                        (!c.getAttribute("type") && !c.type || !/submit|button|cancel/i.tp))
                            return !0;
                        if (b.hasfocus || b.hasmousefocus && !y || b.ispage && !y && !D) {
                            c = d.keyCode;
                            if (b.locked && 27 != c)
                                return b.cancelEvent(d);
                            var g = d.ctrlKey || !1,
                                p = d.shiftKey || !1,
                                f = !1;
                            switch (c) {
                            case 38:
                            case 63233:
                                b.doScrollBy(72);
                                f = !0;
                                break;
                            case 40:
                            case 63235:
                                b.doScrollBy(-72);
                                f = !0;
                                break;
                            case 37:
                            case 63232:
                                b.railh && (g ? b.doScrollLeft(0) : b.doScrollLeftBy(72), f = !0);
                                break;
                            case 39:
                            case 63234:
                                b.railh && (g ? b.doScrollLeft(b.page.maxw) : b.doScrollLeftBy(-72), f = !0);
                                break;
                            case 33:
                            case 63276:
                                b.doScrollBy(b.view.h);
                                f = !0;
                                break;
                            case 34:
                            case 63277:
                                b.doScrollBy(-b.view.h);
                                f = !0;
                                break;
                            case 36:
                            case 63273:
                                b.railh && g ? b.doScrollPos(0, 0) : b.doScrollTo(0);
                                f = !0;
                                break;
                            case 35:
                            case 63275:
                                b.railh && g ? b.doScrollPos(b.page.maxw, b.page.maxh) : b.doScrollTo(b.page.maxh);
                                f = !0;
                                break;
                            case 32:
                                b.opt.spacebarenabled && (p ? b.doScrollBy(b.view.h) : b.doScrollBy(-b.view.h), f = !0);
                                break;
                            case 27:
                                b.zoomactive && (b.doZoom(), f = !0)
                            }
                            if (f)
                                return b.cancelEvent(d)
                        }
                    };
                    b.opt.enablekeyboard && b.bind(document, f.isopera &&
                    !f.isopera12 ? "keypress" : "keydown", b.onkeypress);
                    b.bind(window, "resize", b.lazyResize);
                    b.bind(window, "orientationchange", b.lazyResize);
                    b.bind(window, "load", b.lazyResize);
                    if (f.ischrome && !b.ispage && !b.haswrapper) {
                        var t = b.win.attr("style"),
                            g = parseFloat(b.win.css("width")) + 1;
                        b.win.css("width", g);
                        b.synched("chromefix", function() {
                            b.win.attr("style", t)
                        })
                    }
                    b.onAttributeChange = function(d) {
                        b.lazyResize(250)
                    };
                    !b.ispage && !b.haswrapper && (!1 !== z ? (b.observer = new z(function(d) {
                        d.forEach(b.onAttributeChange)
                    }), b.observer.observe(b.win[0],
                    {
                        childList: !0,
                        characterData: !1,
                        attributes: !0,
                        subtree: !1
                    }), b.observerremover = new z(function(d) {
                        d.forEach(function(d) {
                            if (0 < d.removedNodes.length)
                                for (var c in d.removedNodes)
                                    if (d.removedNodes[c] == b.win[0])
                                        return b.remove()
                        })
                    }), b.observerremover.observe(b.win[0].parentNode, {
                        childList: !0,
                        characterData: !1,
                        attributes: !1,
                        subtree: !1
                    })) : (b.bind(b.win, f.isie && !f.isie9 ? "propertychange" : "DOMAttrModified", b.onAttributeChange), f.isie9 && b.win[0].attachEvent("onpropertychange", b.onAttributeChange), b.bind(b.win, "DOMNodeRemoved",
                    function(d) {
                        d.target == b.win[0] && b.remove()
                    })));
                    !b.ispage && b.opt.boxzoom && b.bind(window, "resize", b.resizeZoom);
                    b.istextarea && b.bind(b.win, "mouseup", b.lazyResize);
                    b.checkrtlmode = !0;
                    b.lazyResize(30)
                }
                if ("IFRAME" == this.doc[0].nodeName) {
                    var I = function(d) {
                        b.iframexd = !1;
                        try {
                            var c = "contentDocument" in this ? this.contentDocument : this.contentWindow.document
                        } catch (g) {
                            b.iframexd = !0, c = !1
                        }
                        if (b.iframexd)
                            return "console" in window && console.log("NiceScroll error: policy restriced iframe"), !0;
                        b.forcescreen = !0;
                        b.isiframe &&
                        (b.iframe = {
                            doc: e(c),
                            html: b.doc.contents().find("html")[0],
                            body: b.doc.contents().find("body")[0]
                        }, b.getContentSize = function() {
                            return {
                                w: Math.max(b.iframe.html.scrollWidth, b.iframe.body.scrollWidth),
                                h: Math.max(b.iframe.html.scrollHeight, b.iframe.body.scrollHeight)
                            }
                        }, b.docscroll = e(b.iframe.body));
                        !f.isios && (b.opt.iframeautoresize && !b.isiframe) && (b.win.scrollTop(0), b.doc.height(""), d = Math.max(c.getElementsByTagName("html")[0].scrollHeight, c.body.scrollHeight), b.doc.height(d));
                        b.lazyResize(30);
                        f.isie7 &&
                        b.css(e(b.iframe.html), {
                            "overflow-y": "hidden"
                        });
                        b.css(e(b.iframe.body), {
                            "overflow-y": "hidden"
                        });
                        "contentWindow" in this ? b.bind(this.contentWindow, "scroll", b.onscroll) : b.bind(c, "scroll", b.onscroll);
                        b.opt.enablemousewheel && b.bind(c, "mousewheel", b.onmousewheel);
                        b.opt.enablekeyboard && b.bind(c, f.isopera ? "keypress" : "keydown", b.onkeypress);
                        if (f.cantouch || b.opt.touchbehavior)
                            b.bind(c, "mousedown", b.onmousedown), b.bind(c, "mousemove", function(d) {
                                b.onmousemove(d, !0)
                            }), b.opt.grabcursorenabled && f.cursorgrabvalue &&
                            b.css(e(c.body), {
                                cursor: f.cursorgrabvalue
                            });
                        b.bind(c, "mouseup", b.onmouseup);
                        b.zoom && (b.opt.dblclickzoom && b.bind(c, "dblclick", b.doZoom), b.ongesturezoom && b.bind(c, "gestureend", b.ongesturezoom))
                    };
                    this.doc[0].readyState && "complete" == this.doc[0].readyState && setTimeout(function() {
                        I.call(b.doc[0], !1)
                    }, 500);
                    b.bind(this.doc, "load", I)
                }
            };
            this.showCursor = function(d, c) {
                b.cursortimeout && (clearTimeout(b.cursortimeout), b.cursortimeout = 0);
                if (b.rail) {
                    b.autohidedom && (b.autohidedom.stop().css({
                        opacity: b.opt.cursoropacitymax
                    }),
                    b.cursoractive = !0);
                    if (!b.rail.drag || 1 != b.rail.drag.pt)
                        "undefined" != typeof d && !1 !== d && (b.scroll.y = Math.round(1 * d / b.scrollratio.y)), "undefined" != typeof c && (b.scroll.x = Math.round(1 * c / b.scrollratio.x));
                    b.cursor.css({
                        height: b.cursorheight,
                        top: b.scroll.y
                    });
                    b.cursorh && (!b.rail.align && b.rail.visibility ? b.cursorh.css({
                        width: b.cursorwidth,
                        left: b.scroll.x + b.rail.width
                    }) : b.cursorh.css({
                        width: b.cursorwidth,
                        left: b.scroll.x
                    }), b.cursoractive = !0);
                    b.zoom && b.zoom.stop().css({
                        opacity: b.opt.cursoropacitymax
                    })
                }
            };
            this.hideCursor =
            function(d) {
                !b.cursortimeout && (b.rail && b.autohidedom) && (b.cursortimeout = setTimeout(function() {
                    if (!b.rail.active || !b.showonmouseevent)
                        b.autohidedom.stop().animate({
                            opacity: b.opt.cursoropacitymin
                        }), b.zoom && b.zoom.stop().animate({
                            opacity: b.opt.cursoropacitymin
                        }), b.cursoractive = !1;
                    b.cursortimeout = 0
                }, d || b.opt.hidecursordelay))
            };
            this.noticeCursor = function(d, c, g) {
                b.showCursor(c, g);
                b.rail.active || b.hideCursor(d)
            };
            this.getContentSize = b.ispage ? function() {
                return {
                    w: Math.max(document.body.scrollWidth, document.documentElement.scrollWidth),
                    h: Math.max(document.body.scrollHeight, document.documentElement.scrollHeight)
                }
            } : b.haswrapper ? function() {
                return {
                    w: b.doc.outerWidth() + parseInt(b.win.css("paddingLeft")) + parseInt(b.win.css("paddingRight")),
                    h: b.doc.outerHeight() + parseInt(b.win.css("paddingTop")) + parseInt(b.win.css("paddingBottom"))
                }
            } : function() {
                return {
                    w: b.docscroll[0].scrollWidth,
                    h: b.docscroll[0].scrollHeight
                }
            };
            this.onResize = function(d, c) {
                if (!b.win)
                    return !1;
                if (!b.haswrapper && !b.ispage) {
                    if ("none" == b.win.css("display"))
                        return b.visibility &&
                        b.hideRail().hideRailHr(), !1;
                    !b.hidden && !b.visibility && b.showRail().showRailHr()
                }
                var g = b.page.maxh,
                    f = b.page.maxw,
                    e = b.view.w;
                b.view = {
                    w: b.ispage ? b.win.width() : parseInt(b.win[0].clientWidth),
                    h: b.ispage ? b.win.height() : parseInt(b.win[0].clientHeight)
                };
                b.page = c ? c : b.getContentSize();
                b.page.maxh = Math.max(0, b.page.h - b.view.h);
                b.page.maxw = Math.max(0, b.page.w - b.view.w);
                if (b.page.maxh == g && b.page.maxw == f && b.view.w == e) {
                    if (b.ispage)
                        return b;
                    g = b.win.offset();
                    if (b.lastposition && (f = b.lastposition, f.top == g.top && f.left ==
                    g.left))
                        return b;
                    b.lastposition = g
                }
                0 == b.page.maxh ? (b.hideRail(), b.scrollvaluemax = 0, b.scroll.y = 0, b.scrollratio.y = 0, b.cursorheight = 0, b.setScrollTop(0), b.rail.scrollable = !1) : b.rail.scrollable = !0;
                0 == b.page.maxw ? (b.hideRailHr(), b.scrollvaluemaxw = 0, b.scroll.x = 0, b.scrollratio.x = 0, b.cursorwidth = 0, b.setScrollLeft(0), b.railh.scrollable = !1) : b.railh.scrollable = !0;
                b.locked = 0 == b.page.maxh && 0 == b.page.maxw;
                if (b.locked)
                    return b.ispage || b.updateScrollBar(b.view), !1;
                !b.hidden && !b.visibility ? b.showRail().showRailHr() :
                !b.hidden && !b.railh.visibility && b.showRailHr();
                b.istextarea && (b.win.css("resize") && "none" != b.win.css("resize")) && (b.view.h -= 20);
                b.cursorheight = Math.min(b.view.h, Math.round(b.view.h * (b.view.h / b.page.h)));
                b.cursorheight = b.opt.cursorfixedheight ? b.opt.cursorfixedheight : Math.max(b.opt.cursorminheight, b.cursorheight);
                b.cursorwidth = Math.min(b.view.w, Math.round(b.view.w * (b.view.w / b.page.w)));
                b.cursorwidth = b.opt.cursorfixedheight ? b.opt.cursorfixedheight : Math.max(b.opt.cursorminheight, b.cursorwidth);
                b.scrollvaluemax =
                b.view.h - b.cursorheight - b.cursor.hborder;
                b.railh && (b.railh.width = 0 < b.page.maxh ? b.view.w - b.rail.width : b.view.w, b.scrollvaluemaxw = b.railh.width - b.cursorwidth - b.cursorh.wborder);
                b.checkrtlmode && b.railh && (b.checkrtlmode = !1, b.opt.rtlmode && 0 == b.scroll.x && b.setScrollLeft(b.page.maxw));
                b.ispage || b.updateScrollBar(b.view);
                b.scrollratio = {
                    x: b.page.maxw / b.scrollvaluemaxw,
                    y: b.page.maxh / b.scrollvaluemax
                };
                b.getScrollTop() > b.page.maxh ? b.doScrollTop(b.page.maxh) : (b.scroll.y = Math.round(b.getScrollTop() * (1 / b.scrollratio.y)),
                b.scroll.x = Math.round(b.getScrollLeft() * (1 / b.scrollratio.x)), b.cursoractive && b.noticeCursor());
                b.scroll.y && 0 == b.getScrollTop() && b.doScrollTo(Math.floor(b.scroll.y * b.scrollratio.y));
                return b
            };
            this.resize = b.onResize;
            this.lazyResize = function(d) {
                d = isNaN(d) ? 30 : d;
                b.delayed("resize", b.resize, d);
                return b
            };
            this._bind = function(d, c, g, f) {
                b.events.push({
                    e: d,
                    n: c,
                    f: g,
                    b: f,
                    q: !1
                });
                d.addEventListener ? d.addEventListener(c, g, f || !1) : d.attachEvent ? d.attachEvent("on" + c, g) : d["on" + c] = g
            };
            this.jqbind = function(d, c, g) {
                b.events.push({
                    e: d,
                    n: c,
                    f: g,
                    q: !0
                });
                e(d).bind(c, g)
            };
            this.bind = function(d, c, g, e) {
                var h = "jquery" in d ? d[0] : d;
                "mousewheel" == c ? "onwheel" in b.win ? b._bind(h, "wheel", g, e || !1) : (d = "undefined" != typeof document.onmousewheel ? "mousewheel" : "DOMMouseScroll", n(h, d, g, e || !1), "DOMMouseScroll" == d && n(h, "MozMousePixelScroll", g, e || !1)) : h.addEventListener ? (f.cantouch && /mouseup|mousedown|mousemove/.test(c) && b._bind(h, "mousedown" == c ? "touchstart" : "mouseup" == c ? "touchend" : "touchmove", function(b) {
                    if (b.touches) {
                        if (2 > b.touches.length) {
                            var d = b.touches.length ?
                            b.touches[0] : b;
                            d.original = b;
                            g.call(this, d)
                        }
                    } else
                        b.changedTouches && (d = b.changedTouches[0], d.original = b, g.call(this, d))
                }, e || !1), b._bind(h, c, g, e || !1), f.cantouch && "mouseup" == c && b._bind(h, "touchcancel", g, e || !1)) : b._bind(h, c, function(d) {
                    if ((d = d || window.event || !1) && d.srcElement)
                        d.target = d.srcElement;
                    "pageY" in d || (d.pageX = d.clientX + document.documentElement.scrollLeft, d.pageY = d.clientY + document.documentElement.scrollTop);
                    return !1 === g.call(h, d) || !1 === e ? b.cancelEvent(d) : !0
                })
            };
            this._unbind = function(b, c, g, f) {
                b.removeEventListener ?
                b.removeEventListener(c, g, f) : b.detachEvent ? b.detachEvent("on" + c, g) : b["on" + c] = !1
            };
            this.unbindAll = function() {
                for (var d = 0; d < b.events.length; d++) {
                    var c = b.events[d];
                    c.q ? c.e.unbind(c.n, c.f) : b._unbind(c.e, c.n, c.f, c.b)
                }
            };
            this.cancelEvent = function(b) {
                b = b.original ? b.original : b ? b : window.event || !1;
                if (!b)
                    return !1;
                b.preventDefault && b.preventDefault();
                b.stopPropagation && b.stopPropagation();
                b.preventManipulation && b.preventManipulation();
                b.cancelBubble = !0;
                b.cancel = !0;
                return b.returnValue = !1
            };
            this.stopPropagation =
            function(b) {
                b = b.original ? b.original : b ? b : window.event || !1;
                if (!b)
                    return !1;
                if (b.stopPropagation)
                    return b.stopPropagation();
                b.cancelBubble && (b.cancelBubble = !0);
                return !1
            };
            this.showRail = function() {
                if (0 != b.page.maxh && (b.ispage || "none" != b.win.css("display")))
                    b.visibility = !0, b.rail.visibility = !0, b.rail.css("display", "block");
                return b
            };
            this.showRailHr = function() {
                if (!b.railh)
                    return b;
                if (0 != b.page.maxw && (b.ispage || "none" != b.win.css("display")))
                    b.railh.visibility = !0, b.railh.css("display", "block");
                return b
            };
            this.hideRail =
            function() {
                b.visibility = !1;
                b.rail.visibility = !1;
                b.rail.css("display", "none");
                return b
            };
            this.hideRailHr = function() {
                if (!b.railh)
                    return b;
                b.railh.visibility = !1;
                b.railh.css("display", "none");
                return b
            };
            this.show = function() {
                b.hidden = !1;
                b.locked = !1;
                return b.showRail().showRailHr()
            };
            this.hide = function() {
                b.hidden = !0;
                b.locked = !0;
                return b.hideRail().hideRailHr()
            };
            this.toggle = function() {
                return b.hidden ? b.show() : b.hide()
            };
            this.remove = function() {
                b.stop();
                b.cursortimeout && clearTimeout(b.cursortimeout);
                b.doZoomOut();
                b.unbindAll();
                !1 !== b.observer && b.observer.disconnect();
                !1 !== b.observerremover && b.observerremover.disconnect();
                b.events = [];
                b.cursor && (b.cursor.remove(), b.cursor = null);
                b.cursorh && (b.cursorh.remove(), b.cursorh = null);
                b.rail && (b.rail.remove(), b.rail = null);
                b.railh && (b.railh.remove(), b.railh = null);
                b.zoom && (b.zoom.remove(), b.zoom = null);
                for (var d = 0; d < b.saved.css.length; d++) {
                    var c = b.saved.css[d];
                    c[0].css(c[1], "undefined" == typeof c[2] ? "" : c[2])
                }
                b.saved = !1;
                b.me.data("__nicescroll", "");
                b.me = null;
                b.doc = null;
                b.docscroll =
                null;
                b.win = null;
                return b
            };
            this.scrollstart = function(d) {
                this.onscrollstart = d;
                return b
            };
            this.scrollend = function(d) {
                this.onscrollend = d;
                return b
            };
            this.scrollcancel = function(d) {
                this.onscrollcancel = d;
                return b
            };
            this.zoomin = function(d) {
                this.onzoomin = d;
                return b
            };
            this.zoomout = function(d) {
                this.onzoomout = d;
                return b
            };
            this.isScrollable = function(b) {
                b = b.target ? b.target : b;
                if ("OPTION" == b.nodeName)
                    return !0;
                for (; b && 1 == b.nodeType && !/BODY|HTML/.test(b.nodeName);) {
                    var c = e(b),
                        c = c.css("overflowY") || c.css("overflowX") || c.css("overflow") ||
                        "";
                    if (/scroll|auto/.test(c))
                        return b.clientHeight != b.scrollHeight;
                    b = b.parentNode ? b.parentNode : !1
                }
                return !1
            };
            this.getViewport = function(b) {
                for (b = b && b.parentNode ? b.parentNode : !1; b && 1 == b.nodeType && !/BODY|HTML/.test(b.nodeName);) {
                    var c = e(b),
                        g = c.css("overflowY") || c.css("overflowX") || c.css("overflow") || "";
                    if (/scroll|auto/.test(g) && b.clientHeight != b.scrollHeight || 0 < c.getNiceScroll().length)
                        return c;
                    b = b.parentNode ? b.parentNode : !1
                }
                return !1
            };
            this.onmousewheel = function(d) {
                if (b.locked)
                    return !0;
                if (b.rail.drag)
                    return b.cancelEvent(d);
                if (!b.rail.scrollable)
                    return b.railh && b.railh.scrollable ? b.onmousewheelhr(d) : !0;
                var c = +new Date,
                    g = !1;
                b.opt.preservenativescrolling && b.checkarea + 600 < c && (b.nativescrollingarea = b.isScrollable(d), g = !0);
                b.checkarea = c;
                if (b.nativescrollingarea)
                    return !0;
                if (d = t(d, !1, g))
                    b.checkarea = 0;
                return d
            };
            this.onmousewheelhr = function(d) {
                if (b.locked || !b.railh.scrollable)
                    return !0;
                if (b.rail.drag)
                    return b.cancelEvent(d);
                var c = +new Date,
                    g = !1;
                b.opt.preservenativescrolling && b.checkarea + 600 < c && (b.nativescrollingarea = b.isScrollable(d),
                g = !0);
                b.checkarea = c;
                return b.nativescrollingarea ? !0 : b.locked ? b.cancelEvent(d) : t(d, !0, g)
            };
            this.stop = function() {
                b.cancelScroll();
                b.scrollmon && b.scrollmon.stop();
                b.cursorfreezed = !1;
                b.scroll.y = Math.round(b.getScrollTop() * (1 / b.scrollratio.y));
                b.noticeCursor();
                return b
            };
            this.getTransitionSpeed = function(c) {
                var f = Math.round(10 * b.opt.scrollspeed);
                c = Math.min(f, Math.round(c / 20 * b.opt.scrollspeed));
                return 20 < c ? c : 0
            };
            b.opt.smoothscroll ? b.ishwscroll && f.hastransition && b.opt.usetransition ? (this.prepareTransition = function(c,
            e) {
                var g = e ? 20 < c ? c : 0 : b.getTransitionSpeed(c),
                    h = g ? f.prefixstyle + "transform " + g + "ms ease-out" : "";
                if (!b.lasttransitionstyle || b.lasttransitionstyle != h)
                    b.lasttransitionstyle = h, b.doc.css(f.transitionstyle, h);
                return g
            }, this.doScrollLeft = function(c, f) {
                var g = b.scrollrunning ? b.newscrolly : b.getScrollTop();
                b.doScrollPos(c, g, f)
            }, this.doScrollTop = function(c, f) {
                var g = b.scrollrunning ? b.newscrollx : b.getScrollLeft();
                b.doScrollPos(g, c, f)
            }, this.doScrollPos = function(c, e, g) {
                var h = b.getScrollTop(),
                    l = b.getScrollLeft();
                (0 >
                (b.newscrolly - h) * (e - h) || 0 > (b.newscrollx - l) * (c - l)) && b.cancelScroll();
                !1 == b.opt.bouncescroll && (0 > e ? e = 0 : e > b.page.maxh && (e = b.page.maxh), 0 > c ? c = 0 : c > b.page.maxw && (c = b.page.maxw));
                if (b.scrollrunning && c == b.newscrollx && e == b.newscrolly)
                    return !1;
                b.newscrolly = e;
                b.newscrollx = c;
                b.newscrollspeed = g || !1;
                if (b.timer)
                    return !1;
                b.timer = setTimeout(function() {
                    var g = b.getScrollTop(),
                        h = b.getScrollLeft(),
                        l,
                        k;
                    l = c - h;
                    k = e - g;
                    l = Math.round(Math.sqrt(Math.pow(l, 2) + Math.pow(k, 2)));
                    l = b.newscrollspeed && 1 < b.newscrollspeed ? b.newscrollspeed :
                    b.getTransitionSpeed(l);
                    b.newscrollspeed && 1 >= b.newscrollspeed && (l *= b.newscrollspeed);
                    b.prepareTransition(l, !0);
                    b.timerscroll && b.timerscroll.tm && clearInterval(b.timerscroll.tm);
                    0 < l && (!b.scrollrunning && b.onscrollstart && b.onscrollstart.call(b, {
                        type: "scrollstart",
                        current: {
                            x: h,
                            y: g
                        },
                        request: {
                            x: c,
                            y: e
                        },
                        end: {
                            x: b.newscrollx,
                            y: b.newscrolly
                        },
                        speed: l
                    }), f.transitionend ? b.scrollendtrapped || (b.scrollendtrapped = !0, b.bind(b.doc, f.transitionend, b.onScrollEnd, !1)) : (b.scrollendtrapped && clearTimeout(b.scrollendtrapped),
                    b.scrollendtrapped = setTimeout(b.onScrollEnd, l)), b.timerscroll = {
                        bz: new BezierClass(g, b.newscrolly, l, 0, 0, 0.58, 1),
                        bh: new BezierClass(h, b.newscrollx, l, 0, 0, 0.58, 1)
                    }, b.cursorfreezed || (b.timerscroll.tm = setInterval(function() {
                        b.showCursor(b.getScrollTop(), b.getScrollLeft())
                    }, 60)));
                    b.synched("doScroll-set", function() {
                        b.timer = 0;
                        b.scrollendtrapped && (b.scrollrunning = !0);
                        b.setScrollTop(b.newscrolly);
                        b.setScrollLeft(b.newscrollx);
                        if (!b.scrollendtrapped)
                            b.onScrollEnd()
                    })
                }, 50)
            }, this.cancelScroll = function() {
                if (!b.scrollendtrapped)
                    return !0;
                var c = b.getScrollTop(),
                    e = b.getScrollLeft();
                b.scrollrunning = !1;
                f.transitionend || clearTimeout(f.transitionend);
                b.scrollendtrapped = !1;
                b._unbind(b.doc, f.transitionend, b.onScrollEnd);
                b.prepareTransition(0);
                b.setScrollTop(c);
                b.railh && b.setScrollLeft(e);
                b.timerscroll && b.timerscroll.tm && clearInterval(b.timerscroll.tm);
                b.timerscroll = !1;
                b.cursorfreezed = !1;
                b.showCursor(c, e);
                return b
            }, this.onScrollEnd = function() {
                b.scrollendtrapped && b._unbind(b.doc, f.transitionend, b.onScrollEnd);
                b.scrollendtrapped = !1;
                b.prepareTransition(0);
                b.timerscroll && b.timerscroll.tm && clearInterval(b.timerscroll.tm);
                b.timerscroll = !1;
                var c = b.getScrollTop(),
                    e = b.getScrollLeft();
                b.setScrollTop(c);
                b.railh && b.setScrollLeft(e);
                b.noticeCursor(!1, c, e);
                b.cursorfreezed = !1;
                0 > c ? c = 0 : c > b.page.maxh && (c = b.page.maxh);
                0 > e ? e = 0 : e > b.page.maxw && (e = b.page.maxw);
                if (c != b.newscrolly || e != b.newscrollx)
                    return b.doScrollPos(e, c, b.opt.snapbackspeed);
                b.onscrollend && b.scrollrunning && b.onscrollend.call(b, {
                    type: "scrollend",
                    current: {
                        x: e,
                        y: c
                    },
                    end: {
                        x: b.newscrollx,
                        y: b.newscrolly
                    }
                });
                b.scrollrunning =
                !1
            }) : (this.doScrollLeft = function(c, f) {
                var g = b.scrollrunning ? b.newscrolly : b.getScrollTop();
                b.doScrollPos(c, g, f)
            }, this.doScrollTop = function(c, f) {
                var g = b.scrollrunning ? b.newscrollx : b.getScrollLeft();
                b.doScrollPos(g, c, f)
            }, this.doScrollPos = function(c, f, g) {
                function e() {
                    if (b.cancelAnimationFrame)
                        return !0;
                    b.scrollrunning = !0;
                    if (r = 1 - r)
                        return b.timer = v(e) || 1;
                    var c = 0,
                        d = sy = b.getScrollTop();
                    if (b.dst.ay) {
                        var d = b.bzscroll ? b.dst.py + b.bzscroll.getNow() * b.dst.ay : b.newscrolly,
                            g = d - sy;
                        if (0 > g && d < b.newscrolly || 0 < g && d > b.newscrolly)
                            d =
                            b.newscrolly;
                        b.setScrollTop(d);
                        d == b.newscrolly && (c = 1)
                    } else
                        c = 1;
                    var f = sx = b.getScrollLeft();
                    if (b.dst.ax) {
                        f = b.bzscroll ? b.dst.px + b.bzscroll.getNow() * b.dst.ax : b.newscrollx;
                        g = f - sx;
                        if (0 > g && f < b.newscrollx || 0 < g && f > b.newscrollx)
                            f = b.newscrollx;
                        b.setScrollLeft(f);
                        f == b.newscrollx && (c += 1)
                    } else
                        c += 1;
                    2 == c ? (b.timer = 0, b.cursorfreezed = !1, b.bzscroll = !1, b.scrollrunning = !1, 0 > d ? d = 0 : d > b.page.maxh && (d = b.page.maxh), 0 > f ? f = 0 : f > b.page.maxw && (f = b.page.maxw), f != b.newscrollx || d != b.newscrolly ? b.doScrollPos(f, d) : b.onscrollend && b.onscrollend.call(b,
                    {
                        type: "scrollend",
                        current: {
                            x: sx,
                            y: sy
                        },
                        end: {
                            x: b.newscrollx,
                            y: b.newscrolly
                        }
                    })) : b.timer = v(e) || 1
                }
                f = "undefined" == typeof f || !1 === f ? b.getScrollTop(!0) : f;
                if (b.timer && b.newscrolly == f && b.newscrollx == c)
                    return !0;
                b.timer && w(b.timer);
                b.timer = 0;
                var h = b.getScrollTop(),
                    l = b.getScrollLeft();
                (0 > (b.newscrolly - h) * (f - h) || 0 > (b.newscrollx - l) * (c - l)) && b.cancelScroll();
                b.newscrolly = f;
                b.newscrollx = c;
                if (!b.bouncescroll || !b.rail.visibility)
                    0 > b.newscrolly ? b.newscrolly = 0 : b.newscrolly > b.page.maxh && (b.newscrolly = b.page.maxh);
                if (!b.bouncescroll ||
                !b.railh.visibility)
                    0 > b.newscrollx ? b.newscrollx = 0 : b.newscrollx > b.page.maxw && (b.newscrollx = b.page.maxw);
                b.dst = {};
                b.dst.x = c - l;
                b.dst.y = f - h;
                b.dst.px = l;
                b.dst.py = h;
                var k = Math.round(Math.sqrt(Math.pow(b.dst.x, 2) + Math.pow(b.dst.y, 2)));
                b.dst.ax = b.dst.x / k;
                b.dst.ay = b.dst.y / k;
                var n = 0,
                    q = k;
                0 == b.dst.x ? (n = h, q = f, b.dst.ay = 1, b.dst.py = 0) : 0 == b.dst.y && (n = l, q = c, b.dst.ax = 1, b.dst.px = 0);
                k = b.getTransitionSpeed(k);
                g && 1 >= g && (k *= g);
                b.bzscroll = 0 < k ? b.bzscroll ? b.bzscroll.update(q, k) : new BezierClass(n, q, k, 0, 1, 0, 1) : !1;
                if (!b.timer) {
                    (h ==
                    b.page.maxh && f >= b.page.maxh || l == b.page.maxw && c >= b.page.maxw) && b.checkContentSize();
                    var r = 1;
                    b.cancelAnimationFrame = !1;
                    b.timer = 1;
                    b.onscrollstart && !b.scrollrunning && b.onscrollstart.call(b, {
                        type: "scrollstart",
                        current: {
                            x: l,
                            y: h
                        },
                        request: {
                            x: c,
                            y: f
                        },
                        end: {
                            x: b.newscrollx,
                            y: b.newscrolly
                        },
                        speed: k
                    });
                    e();
                    (h == b.page.maxh && f >= h || l == b.page.maxw && c >= l) && b.checkContentSize();
                    b.noticeCursor()
                }
            }, this.cancelScroll = function() {
                b.timer && w(b.timer);
                b.timer = 0;
                b.bzscroll = !1;
                b.scrollrunning = !1;
                return b
            }) : (this.doScrollLeft = function(c,
            f) {
                var g = b.getScrollTop();
                b.doScrollPos(c, g, f)
            }, this.doScrollTop = function(c, f) {
                var g = b.getScrollLeft();
                b.doScrollPos(g, c, f)
            }, this.doScrollPos = function(c, f, g) {
                var e = c > b.page.maxw ? b.page.maxw : c;
                0 > e && (e = 0);
                var h = f > b.page.maxh ? b.page.maxh : f;
                0 > h && (h = 0);
                b.synched("scroll", function() {
                    b.setScrollTop(h);
                    b.setScrollLeft(e)
                })
            }, this.cancelScroll = function() {});
            this.doScrollBy = function(c, f) {
                var g = 0,
                    g = f ? Math.floor((b.scroll.y - c) * b.scrollratio.y) : (b.timer ? b.newscrolly : b.getScrollTop(!0)) - c;
                if (b.bouncescroll) {
                    var e =
                    Math.round(b.view.h / 2);
                    g < -e ? g = -e : g > b.page.maxh + e && (g = b.page.maxh + e)
                }
                b.cursorfreezed = !1;
                py = b.getScrollTop(!0);
                if (0 > g && 0 >= py)
                    return b.noticeCursor();
                if (g > b.page.maxh && py >= b.page.maxh)
                    return b.checkContentSize(), b.noticeCursor();
                b.doScrollTop(g)
            };
            this.doScrollLeftBy = function(c, f) {
                var g = 0,
                    g = f ? Math.floor((b.scroll.x - c) * b.scrollratio.x) : (b.timer ? b.newscrollx : b.getScrollLeft(!0)) - c;
                if (b.bouncescroll) {
                    var e = Math.round(b.view.w / 2);
                    g < -e ? g = -e : g > b.page.maxw + e && (g = b.page.maxw + e)
                }
                b.cursorfreezed = !1;
                px = b.getScrollLeft(!0);
                if (0 > g && 0 >= px || g > b.page.maxw && px >= b.page.maxw)
                    return b.noticeCursor();
                b.doScrollLeft(g)
            };
            this.doScrollTo = function(c, f) {
                f && Math.round(c * b.scrollratio.y);
                b.cursorfreezed = !1;
                b.doScrollTop(c)
            };
            this.checkContentSize = function() {
                var c = b.getContentSize();
                (c.h != b.page.h || c.w != b.page.w) && b.resize(!1, c)
            };
            b.onscroll = function(c) {
                b.rail.drag || b.cursorfreezed || b.synched("scroll", function() {
                    b.scroll.y = Math.round(b.getScrollTop() * (1 / b.scrollratio.y));
                    b.railh && (b.scroll.x = Math.round(b.getScrollLeft() * (1 / b.scrollratio.x)));
                    b.noticeCursor()
                })
            };
            b.bind(b.docscroll, "scroll", b.onscroll);
            this.doZoomIn = function(c) {
                if (!b.zoomactive) {
                    b.zoomactive = !0;
                    b.zoomrestore = {
                        style: {}
                    };
                    var h = "position top left zIndex backgroundColor marginTop marginBottom marginLeft marginRight".split(" "),
                        g = b.win[0].style,
                        l;
                    for (l in h) {
                        var k = h[l];
                        b.zoomrestore.style[k] = "undefined" != typeof g[k] ? g[k] : ""
                    }
                    b.zoomrestore.style.width = b.win.css("width");
                    b.zoomrestore.style.height = b.win.css("height");
                    b.zoomrestore.padding = {
                        w: b.win.outerWidth() - b.win.width(),
                        h: b.win.outerHeight() -
                        b.win.height()
                    };
                    f.isios4 && (b.zoomrestore.scrollTop = e(window).scrollTop(), e(window).scrollTop(0));
                    b.win.css({
                        position: f.isios4 ? "absolute" : "fixed",
                        top: 0,
                        left: 0,
                        "z-index": x + 100,
                        margin: "0px"
                    });
                    h = b.win.css("backgroundColor");
                    ("" == h || /transparent|rgba\(0, 0, 0, 0\)|rgba\(0,0,0,0\)/.test(h)) && b.win.css("backgroundColor", "#fff");
                    b.rail.css({
                        "z-index": x + 101
                    });
                    b.zoom.css({
                        "z-index": x + 102
                    });
                    b.zoom.css("backgroundPosition", "0px -18px");
                    b.resizeZoom();
                    b.onzoomin && b.onzoomin.call(b);
                    return b.cancelEvent(c)
                }
            };
            this.doZoomOut =
            function(c) {
                if (b.zoomactive)
                    return b.zoomactive = !1, b.win.css("margin", ""), b.win.css(b.zoomrestore.style), f.isios4 && e(window).scrollTop(b.zoomrestore.scrollTop), b.rail.css({
                        "z-index": b.zindex
                    }), b.zoom.css({
                        "z-index": b.zindex
                    }), b.zoomrestore = !1, b.zoom.css("backgroundPosition", "0px 0px"), b.onResize(), b.onzoomout && b.onzoomout.call(b), b.cancelEvent(c)
            };
            this.doZoom = function(c) {
                return b.zoomactive ? b.doZoomOut(c) : b.doZoomIn(c)
            };
            this.resizeZoom = function() {
                if (b.zoomactive) {
                    var c = b.getScrollTop();
                    b.win.css({
                        width: e(window).width() -
                        b.zoomrestore.padding.w + "px",
                        height: e(window).height() - b.zoomrestore.padding.h + "px"
                    });
                    b.onResize();
                    b.setScrollTop(Math.min(b.page.maxh, c))
                }
            };
            this.init();
            e.nicescroll.push(this)
        },
        H = function(e) {
            var c = this;
            this.nc = e;
            this.steptime = this.lasttime = this.speedy = this.speedx = this.lasty = this.lastx = 0;
            this.snapy = this.snapx = !1;
            this.demuly = this.demulx = 0;
            this.lastscrolly = this.lastscrollx = -1;
            this.timer = this.chky = this.chkx = 0;
            this.time = function() {
                return +new Date
            };
            this.reset = function(e, l) {
                c.stop();
                var k = c.time();
                c.steptime =
                0;
                c.lasttime = k;
                c.speedx = 0;
                c.speedy = 0;
                c.lastx = e;
                c.lasty = l;
                c.lastscrollx = -1;
                c.lastscrolly = -1
            };
            this.update = function(e, l) {
                var k = c.time();
                c.steptime = k - c.lasttime;
                c.lasttime = k;
                var k = l - c.lasty,
                    t = e - c.lastx,
                    b = c.nc.getScrollTop(),
                    q = c.nc.getScrollLeft(),
                    b = b + k,
                    q = q + t;
                c.snapx = 0 > q || q > c.nc.page.maxw;
                c.snapy = 0 > b || b > c.nc.page.maxh;
                c.speedx = t;
                c.speedy = k;
                c.lastx = e;
                c.lasty = l
            };
            this.stop = function() {
                c.nc.unsynched("domomentum2d");
                c.timer && clearTimeout(c.timer);
                c.timer = 0;
                c.lastscrollx = -1;
                c.lastscrolly = -1
            };
            this.doSnapy = function(e,
            l) {
                var k = !1;
                0 > l ? (l = 0, k = !0) : l > c.nc.page.maxh && (l = c.nc.page.maxh, k = !0);
                0 > e ? (e = 0, k = !0) : e > c.nc.page.maxw && (e = c.nc.page.maxw, k = !0);
                k && c.nc.doScrollPos(e, l, c.nc.opt.snapbackspeed)
            };
            this.doMomentum = function(e) {
                var l = c.time(),
                    k = e ? l + e : c.lasttime;
                e = c.nc.getScrollLeft();
                var t = c.nc.getScrollTop(),
                    b = c.nc.page.maxh,
                    q = c.nc.page.maxw;
                c.speedx = 0 < q ? Math.min(60, c.speedx) : 0;
                c.speedy = 0 < b ? Math.min(60, c.speedy) : 0;
                k = k && 50 >= l - k;
                if (0 > t || t > b || 0 > e || e > q)
                    k = !1;
                e = c.speedx && k ? c.speedx : !1;
                if (c.speedy && k && c.speedy || e) {
                    var f = Math.max(16,
                    c.steptime);
                    50 < f && (e = f / 50, c.speedx *= e, c.speedy *= e, f = 50);
                    c.demulxy = 0;
                    c.lastscrollx = c.nc.getScrollLeft();
                    c.chkx = c.lastscrollx;
                    c.lastscrolly = c.nc.getScrollTop();
                    c.chky = c.lastscrolly;
                    var r = c.lastscrollx,
                        u = c.lastscrolly,
                        d = function() {
                            var e = 600 < c.time() - l ? 0.04 : 0.02;
                            if (c.speedx && (r = Math.floor(c.lastscrollx - c.speedx * (1 - c.demulxy)), c.lastscrollx = r, 0 > r || r > q))
                                e = 0.1;
                            if (c.speedy && (u = Math.floor(c.lastscrolly - c.speedy * (1 - c.demulxy)), c.lastscrolly = u, 0 > u || u > b))
                                e = 0.1;
                            c.demulxy = Math.min(1, c.demulxy + e);
                            c.nc.synched("domomentum2d",
                            function() {
                                c.speedx && (c.nc.getScrollLeft() != c.chkx && c.stop(), c.chkx = r, c.nc.setScrollLeft(r));
                                c.speedy && (c.nc.getScrollTop() != c.chky && c.stop(), c.chky = u, c.nc.setScrollTop(u));
                                c.timer || (c.nc.hideCursor(), c.doSnapy(r, u))
                            });
                            1 > c.demulxy ? c.timer = setTimeout(d, f) : (c.stop(), c.nc.hideCursor(), c.doSnapy(r, u))
                        };
                    d()
                } else
                    c.doSnapy(c.nc.getScrollLeft(), c.nc.getScrollTop())
            }
        },
        A = e.fn.scrollTop;
    e.cssHooks.pageYOffset = {
        get: function(k, c, h) {
            return (c = e.data(k, "__nicescroll") || !1) && c.ishwscroll ? c.getScrollTop() : A.call(k)
        },
        set: function(k, c) {
            var h = e.data(k, "__nicescroll") || !1;
            h && h.ishwscroll ? h.setScrollTop(parseInt(c)) : A.call(k, c);
            return this
        }
    };
    e.fn.scrollTop = function(k) {
        if ("undefined" == typeof k) {
            var c = this[0] ? e.data(this[0], "__nicescroll") || !1 : !1;
            return c && c.ishwscroll ? c.getScrollTop() : A.call(this)
        }
        return this.each(function() {
            var c = e.data(this, "__nicescroll") || !1;
            c && c.ishwscroll ? c.setScrollTop(parseInt(k)) : A.call(e(this), k)
        })
    };
    var B = e.fn.scrollLeft;
    e.cssHooks.pageXOffset = {
        get: function(k, c, h) {
            return (c = e.data(k, "__nicescroll") ||
            !1) && c.ishwscroll ? c.getScrollLeft() : B.call(k)
        },
        set: function(k, c) {
            var h = e.data(k, "__nicescroll") || !1;
            h && h.ishwscroll ? h.setScrollLeft(parseInt(c)) : B.call(k, c);
            return this
        }
    };
    e.fn.scrollLeft = function(k) {
        if ("undefined" == typeof k) {
            var c = this[0] ? e.data(this[0], "__nicescroll") || !1 : !1;
            return c && c.ishwscroll ? c.getScrollLeft() : B.call(this)
        }
        return this.each(function() {
            var c = e.data(this, "__nicescroll") || !1;
            c && c.ishwscroll ? c.setScrollLeft(parseInt(k)) : B.call(e(this), k)
        })
    };
    var C = function(k) {
        var c = this;
        this.length =
        0;
        this.name = "nicescrollarray";
        this.each = function(e) {
            for (var h = 0; h < c.length; h++)
                e.call(c[h]);
            return c
        };
        this.push = function(e) {
            c[c.length] = e;
            c.length++
        };
        this.eq = function(e) {
            return c[e]
        };
        if (k)
            for (a = 0; a < k.length; a++) {
                var h = e.data(k[a], "__nicescroll") || !1;
                h && (this[this.length] = h, this.length++)
            }
        return this
    };
    (function(e, c, h) {
        for (var l = 0; l < c.length; l++)
            h(e, c[l])
    })(C.prototype, "show hide toggle onResize resize remove stop doScrollPos".split(" "), function(e, c) {
        e[c] = function() {
            var e = arguments;
            return this.each(function() {
                this[c].apply(this,
                e)
            })
        }
    });
    e.fn.getNiceScroll = function(k) {
        return "undefined" == typeof k ? new C(this) : e.data(this[k], "__nicescroll") || !1
    };
    e.extend(e.expr[":"], {
        nicescroll: function(k) {
            return e.data(k, "__nicescroll") ? !0 : !1
        }
    });
    e.fn.niceScroll = function(k, c) {
        "undefined" == typeof c && ("object" == typeof k && !("jquery" in k)) && (c = k, k = !1);
        var h = new C;
        "undefined" == typeof c && (c = {});
        k && (c.doc = e(k), c.win = e(this));
        var l = !("doc" in c);
        !l && !("win" in c) && (c.win = e(this));
        this.each(function() {
            var k = e(this).data("__nicescroll") || !1;
            k || (c.doc = l ?
            e(this) : c.doc, k = new N(c, e(this)), e(this).data("__nicescroll", k));
            h.push(k)
        });
        return 1 == h.length ? h[0] : h
    };
    window.NiceScroll = {
        getjQuery: function() {
            return e
        }
    };
    e.nicescroll || (e.nicescroll = new C, e.nicescroll.options = F)
})(jQuery);
