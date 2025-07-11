/*! skrollr 0.6.29 (2014-11-17) | Alexander Prinzhorn - https://github.com/Prinzhorn/skrollr | Free to use under terms of MIT license */
(function(e, t, r) {
    "use strict";
    function n(r) {
        if (o = t.documentElement, a = t.body, Y(), lt = this, r = r || {}, mt = r.constants || {}, r.easing)
            for (var n in r.easing)
                X[n] = r.easing[n];
        Tt = r.edgeStrategy || "set", ft = {
            beforerender: r.beforerender,
            render: r.render,
            keyframe: r.keyframe
        }, ut = r.forceHeight !== !1, ut && (zt = r.scale || 1), pt = r.mobileDeceleration || x, gt = r.smoothScrolling !== !1, vt = r.smoothScrollingDuration || A, ht = {
            targetTop: lt.getScrollTop()
        }, Kt = (r.mobileCheck || function() {
            return /Android|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent || navigator.vendor || e.opera)
        })(), Kt ? (ct = t.getElementById(r.skrollrBody || E), ct && it(), j(), Dt(o, [y, S], [T])) : Dt(o, [y, b], [T]), lt.refresh(), kt(e, "resize orientationchange", function() {
            var e = o.clientWidth,
                t = o.clientHeight;
            (t !== Bt || e !== $t) && (Bt = t, $t = e, _t = !0)
        });
        var i = R();
        return function l() {
            J(), St = i(l)
        }(), lt
    }
    var o,
        a,
        i = {
            get: function() {
                return lt
            },
            init: function(e) {
                return lt || new n(e)
            },
            VERSION: "0.6.29"
        },
        l = Object.prototype.hasOwnProperty,
        s = e.Math,
        c = e.getComputedStyle,
        f = "touchstart",
        u = "touchmove",
        m = "touchcancel",
        p = "touchend",
        d = "skrollable",
        g = d + "-before",
        v = d + "-between",
        h = d + "-after",
        y = "skrollr",
        T = "no-" + y,
        b = y + "-desktop",
        S = y + "-mobile",
        k = "linear",
        w = 1e3,
        x = .004,
        E = "skrollr-body",
        A = 200,
        F = "start",
        C = "end",
        H = "center",
        D = "bottom",
        I = "___skrollable_id",
        P = /^(?:input|textarea|button|select)$/i,
        N = /^\s+|\s+$/g,
        O = /^data(?:-(_\w+))?(?:-?(-?\d*\.?\d+p?))?(?:-?(start|end|top|center|bottom))?(?:-?(top|center|bottom))?$/,
        V = /\s*(@?[\w\-\[\]]+)\s*:\s*(.+?)\s*(?:;|$)/gi,
        z = /^(@?[a-z\-]+)\[(\w+)\]$/,
        q = /-([a-z0-9_])/g,
        L = function(e, t) {
            return t.toUpperCase()
        },
        M = /[\-+]?[\d]*\.?[\d]+/g,
        $ = /\{\?\}/g,
        B = /rgba?\(\s*-?\d+\s*,\s*-?\d+\s*,\s*-?\d+/g,
        _ = /[a-z\-]+-gradient/g,
        G = "",
        K = "",
        Y = function() {
            var e = /^(?:O|Moz|webkit|ms)|(?:-(?:o|moz|webkit|ms)-)/;
            if (c) {
                var t = c(a, null);
                for (var n in t)
                    if (G = n.match(e) || +n == n && t[n].match(e))
                        break;
                if (!G)
                    return G = K = "", r;
                G = G[0], "-" === G.slice(0, 1) ? (K = G, G = {
                    "-webkit-": "webkit",
                    "-moz-": "Moz",
                    "-ms-": "ms",
                    "-o-": "O"
                }[G]) : K = "-" + G.toLowerCase() + "-"
            }
        },
        R = function() {
            var t = e.requestAnimationFrame || e[G.toLowerCase() + "RequestAnimationFrame"],
                r = Nt();
            return (Kt || !t) && (t = function(t) {
                var n = Nt() - r,
                    o = s.max(0, 1e3 / 60 - n);
                return e.setTimeout(function() {
                    r = Nt(), t()
                }, o)
            }), t
        },
        U = function() {
            var t = e.cancelAnimationFrame || e[G.toLowerCase() + "CancelAnimationFrame"];
            return (Kt || !t) && (t = function(t) {
                return e.clearTimeout(t)
            }), t
        },
        X = {
            begin: function() {
                return 0
            },
            end: function() {
                return 1
            },
            linear: function(e) {
                return e
            },
            quadratic: function(e) {
                return e * e
            },
            cubic: function(e) {
                return e * e * e
            },
            swing: function(e) {
                return -s.cos(e * s.PI) / 2 + .5
            },
            sqrt: function(e) {
                return s.sqrt(e)
            },
            outCubic: function(e) {
                return s.pow(e - 1, 3) + 1
            },
            bounce: function(e) {
                var t;
                if (.5083 >= e)
                    t = 3;
                else if (.8489 >= e)
                    t = 9;
                else if (.96208 >= e)
                    t = 27;
                else {
                    if (!(.99981 >= e))
                        return 1;
                    t = 91
                }
                return 1 - s.abs(3 * s.cos(1.028 * e * t) / t)
            }
        };
    n.prototype.refresh = function(e) {
        var n,
            o,
            a = !1;
        for (e === r ? (a = !0, st = [], Gt = 0, e = t.getElementsByTagName("*")) : e.length === r && (e = [e]), n = 0, o = e.length; o > n; n++) {
            var i = e[n],
                l = i,
                s = [],
                c = gt,
                f = Tt,
                u = !1;
            if (a && I in i && delete i[I], i.attributes) {
                for (var m = 0, p = i.attributes.length; p > m; m++) {
                    var g = i.attributes[m];
                    if ("data-anchor-target" !== g.name)
                        if ("data-smooth-scrolling" !== g.name)
                            if ("data-edge-strategy" !== g.name)
                                if ("data-emit-events" !== g.name) {
                                    var v = g.name.match(O);
                                    if (null !== v) {
                                        var h = {
                                            props: g.value,
                                            element: i,
                                            eventType: g.name.replace(q, L)
                                        };
                                        s.push(h);
                                        var y = v[1];
                                        y && (h.constant = y.substr(1));
                                        var T = v[2];
                                        /p$/.test(T) ? (h.isPercentage = !0, h.offset = (0 | T.slice(0, -1)) / 100) : h.offset = 0 | T;
                                        var b = v[3],
                                            S = v[4] || b;
                                        b && b !== F && b !== C ? (h.mode = "relative", h.anchors = [b, S]) : (h.mode = "absolute", b === C ? h.isEnd = !0 : h.isPercentage || (h.offset = h.offset * zt))
                                    }
                                } else
                                    u = !0;
                            else
                                f = g.value;
                        else
                            c = "off" !== g.value;
                    else if (l = t.querySelector(g.value), null === l)
                        throw 'Unable to find anchor target "' + g.value + '"'
                }
                if (s.length) {
                    var k,
                        w,
                        x;
                    !a && I in i ? (x = i[I], k = st[x].styleAttr, w = st[x].classAttr) : (x = i[I] = Gt++, k = i.style.cssText, w = Ht(i)), st[x] = {
                        element: i,
                        styleAttr: k,
                        classAttr: w,
                        anchorTarget: l,
                        keyFrames: s,
                        smoothScrolling: c,
                        edgeStrategy: f,
                        emitEvents: u,
                        lastFrameIndex: -1
                    }, Dt(i, [d], [])
                }
            }
        }
        for (At(), n = 0, o = e.length; o > n; n++) {
            var E = st[e[n][I]];
            E !== r && (Q(E), tt(E))
        }
        return lt
    }, n.prototype.relativeToAbsolute = function(e, t, r) {
        var n = o.clientHeight,
            a = e.getBoundingClientRect(),
            i = a.top,
            l = a.bottom - a.top;
        return t === D ? i -= n : t === H && (i -= n / 2), r === D ? i += l : r === H && (i += l / 2), i += lt.getScrollTop(), 0 | i + .5
    }, n.prototype.animateTo = function(e, t) {
        t = t || {};
        var n = Nt(),
            o = lt.getScrollTop();
        return dt = {
            startTop: o,
            topDiff: e - o,
            targetTop: e,
            duration: t.duration || w,
            startTime: n,
            endTime: n + (t.duration || w),
            easing: X[t.easing || k],
            done: t.done
        }, dt.topDiff || (dt.done && dt.done.call(lt, !1), dt = r), lt
    }, n.prototype.stopAnimateTo = function() {
        dt && dt.done && dt.done.call(lt, !0), dt = r
    }, n.prototype.isAnimatingTo = function() {
        return !!dt
    }, n.prototype.isMobile = function() {
        return Kt
    }, n.prototype.setScrollTop = function(t, r) {
        return yt = r === !0, Kt ? Yt = s.min(s.max(t, 0), Vt) : e.scrollTo(0, t), lt
    }, n.prototype.getScrollTop = function() {
        return Kt ? Yt : e.pageYOffset || o.scrollTop || a.scrollTop || 0
    }, n.prototype.getMaxScrollTop = function() {
        return Vt
    }, n.prototype.on = function(e, t) {
        return ft[e] = t, lt
    }, n.prototype.off = function(e) {
        return delete ft[e], lt
    }, n.prototype.destroy = function() {
        var e = U();
        e(St), xt(), Dt(o, [T], [y, b, S]);
        for (var t = 0, n = st.length; n > t; t++)
            at(st[t].element);
        o.style.overflow = a.style.overflow = "", o.style.height = a.style.height = "", ct && i.setStyle(ct, "transform", "none"), lt = r, ct = r, ft = r, ut = r, Vt = 0, zt = 1, mt = r, pt = r, qt = "down", Lt = -1, $t = 0, Bt = 0, _t = !1, dt = r, gt = r, vt = r, ht = r, yt = r, Gt = 0, Tt = r, Kt = !1, Yt = 0, bt = r
    };
    var j = function() {
            var n,
                i,
                l,
                c,
                d,
                g,
                v,
                h,
                y,
                T,
                b,
                S;
            kt(o, [f, u, m, p].join(" "), function(e) {
                var o = e.changedTouches[0];
                for (c = e.target; 3 === c.nodeType;)
                    c = c.parentNode;
                switch (d = o.clientY, g = o.clientX, T = e.timeStamp, P.test(c.tagName) || e.preventDefault(), e.type) {
                case f:
                    n && n.blur(), lt.stopAnimateTo(), n = c, i = v = d, l = g, y = T;
                    break;
                case u:
                    P.test(c.tagName) && t.activeElement !== c && e.preventDefault(), h = d - v, S = T - b, lt.setScrollTop(Yt - h, !0), v = d, b = T;
                    break;
                default:
                case m:
                case p:
                    var a = i - d,
                        k = l - g,
                        w = k * k + a * a;
                    if (49 > w) {
                        if (!P.test(n.tagName)) {
                            n.focus();
                            var x = t.createEvent("MouseEvents");
                            x.initMouseEvent("click", !0, !0, e.view, 1, o.screenX, o.screenY, o.clientX, o.clientY, e.ctrlKey, e.altKey, e.shiftKey, e.metaKey, 0, null), n.dispatchEvent(x)
                        }
                        return
                    }
                    n = r;
                    var E = h / S;
                    E = s.max(s.min(E, 3), -3);
                    var A = s.abs(E / pt),
                        F = E * A + .5 * pt * A * A,
                        C = lt.getScrollTop() - F,
                        H = 0;
                    C > Vt ? (H = (Vt - C) / F, C = Vt) : 0 > C && (H = -C / F, C = 0), A *= 1 - H, lt.animateTo(0 | C + .5, {
                        easing: "outCubic",
                        duration: A
                    })
                }
            }), e.scrollTo(0, 0), o.style.overflow = a.style.overflow = "hidden"
        },
        W = function() {
            var e,
                t,
                r,
                n,
                a,
                i,
                l,
                c,
                f,
                u,
                m,
                p = o.clientHeight,
                d = Ft();
            for (c = 0, f = st.length; f > c; c++)
                for (e = st[c], t = e.element, r = e.anchorTarget, n = e.keyFrames, a = 0, i = n.length; i > a; a++)
                    l = n[a], u = l.offset, m = d[l.constant] || 0, l.frame = u, l.isPercentage && (u *= p, l.frame = u), "relative" === l.mode && (at(t), l.frame = lt.relativeToAbsolute(r, l.anchors[0], l.anchors[1]) - u, at(t, !0)), l.frame += m, ut && !l.isEnd && l.frame > Vt && (Vt = l.frame);
            for (Vt = s.max(Vt, Ct()), c = 0, f = st.length; f > c; c++) {
                for (e = st[c], n = e.keyFrames, a = 0, i = n.length; i > a; a++)
                    l = n[a], m = d[l.constant] || 0, l.isEnd && (l.frame = Vt - l.offset + m);
                e.keyFrames.sort(Ot)
            }
        },
        Z = function(e, t) {
            for (var r = 0, n = st.length; n > r; r++) {
                var o,
                    a,
                    s = st[r],
                    c = s.element,
                    f = s.smoothScrolling ? e : t,
                    u = s.keyFrames,
                    m = u.length,
                    p = u[0],
                    y = u[u.length - 1],
                    T = p.frame > f,
                    b = f > y.frame,
                    S = T ? p : y,
                    k = s.emitEvents,
                    w = s.lastFrameIndex;
                if (T || b) {
                    if (T && -1 === s.edge || b && 1 === s.edge)
                        continue;
                    switch (T ? (Dt(c, [g], [h, v]), k && w > -1 && (Et(c, p.eventType, qt), s.lastFrameIndex = -1)) : (Dt(c, [h], [g, v]), k && m > w && (Et(c, y.eventType, qt), s.lastFrameIndex = m)), s.edge = T ? -1 : 1, s.edgeStrategy) {
                    case "reset":
                        at(c);
                        continue;
                    case "ease":
                        f = S.frame;
                        break;
                    default:
                    case "set":
                        var x = S.props;
                        for (o in x)
                            l.call(x, o) && (a = ot(x[o].value), 0 === o.indexOf("@") ? c.setAttribute(o.substr(1), a) : i.setStyle(c, o, a));
                        continue
                    }
                } else
                    0 !== s.edge && (Dt(c, [d, v], [g, h]), s.edge = 0);
                for (var E = 0; m - 1 > E; E++)
                    if (f >= u[E].frame && u[E + 1].frame >= f) {
                        var A = u[E],
                            F = u[E + 1];
                        for (o in A.props)
                            if (l.call(A.props, o)) {
                                var C = (f - A.frame) / (F.frame - A.frame);
                                C = A.props[o].easing(C), a = nt(A.props[o].value, F.props[o].value, C), a = ot(a), 0 === o.indexOf("@") ? c.setAttribute(o.substr(1), a) : i.setStyle(c, o, a)
                            }
                        k && w !== E && ("down" === qt ? Et(c, A.eventType, qt) : Et(c, F.eventType, qt), s.lastFrameIndex = E);
                        break
                    }
            }
        },
        J = function() {
            _t && (_t = !1, At());
            var e,
                t,
                n = lt.getScrollTop(),
                o = Nt();
            if (dt)
                o >= dt.endTime ? (n = dt.targetTop, e = dt.done, dt = r) : (t = dt.easing((o - dt.startTime) / dt.duration), n = 0 | dt.startTop + t * dt.topDiff), lt.setScrollTop(n, !0);
            else if (!yt) {
                var a = ht.targetTop - n;
                a && (ht = {
                    startTop: Lt,
                    topDiff: n - Lt,
                    targetTop: n,
                    startTime: Mt,
                    endTime: Mt + vt
                }), ht.endTime >= o && (t = X.sqrt((o - ht.startTime) / vt), n = 0 | ht.startTop + t * ht.topDiff)
            }
            if (Kt && ct && i.setStyle(ct, "transform", "translate(0, " + -Yt + "px) " + bt), yt || Lt !== n) {
                qt = n > Lt ? "down" : Lt > n ? "up" : qt, yt = !1;
                var l = {
                        curTop: n,
                        lastTop: Lt,
                        maxTop: Vt,
                        direction: qt
                    },
                    s = ft.beforerender && ft.beforerender.call(lt, l);
                s !== !1 && (Z(n, lt.getScrollTop()), Lt = n, ft.render && ft.render.call(lt, l)), e && e.call(lt, !1)
            }
            Mt = o
        },
        Q = function(e) {
            for (var t = 0, r = e.keyFrames.length; r > t; t++) {
                for (var n, o, a, i, l = e.keyFrames[t], s = {}; null !== (i = V.exec(l.props));)
                    a = i[1], o = i[2], n = a.match(z), null !== n ? (a = n[1], n = n[2]) : n = k, o = o.indexOf("!") ? et(o) : [o.slice(1)], s[a] = {
                        value: o,
                        easing: X[n]
                    };
                l.props = s
            }
        },
        et = function(e) {
            var t = [];
            return B.lastIndex = 0, e = e.replace(B, function(e) {
                return e.replace(M, function(e) {
                    return 100 * (e / 255) + "%"
                })
            }), K && (_.lastIndex = 0, e = e.replace(_, function(e) {
                return K + e
            })), e = e.replace(M, function(e) {
                return t.push(+e), "{?}"
            }), t.unshift(e), t
        },
        tt = function(e) {
            var t,
                r,
                n = {};
            for (t = 0, r = e.keyFrames.length; r > t; t++)
                rt(e.keyFrames[t], n);
            for (n = {}, t = e.keyFrames.length - 1; t >= 0; t--)
                rt(e.keyFrames[t], n)
        },
        rt = function(e, t) {
            var r;
            for (r in t)
                l.call(e.props, r) || (e.props[r] = t[r]);
            for (r in e.props)
                t[r] = e.props[r]
        },
        nt = function(e, t, r) {
            var n,
                o = e.length;
            if (o !== t.length)
                throw "Can't interpolate between \"" + e[0] + '" and "' + t[0] + '"';
            var a = [e[0]];
            for (n = 1; o > n; n++)
                a[n] = e[n] + (t[n] - e[n]) * r;
            return a
        },
        ot = function(e) {
            var t = 1;
            return $.lastIndex = 0, e[0].replace($, function() {
                return e[t++]
            })
        },
        at = function(e, t) {
            e = [].concat(e);
            for (var r, n, o = 0, a = e.length; a > o; o++)
                n = e[o], r = st[n[I]], r && (t ? (n.style.cssText = r.dirtyStyleAttr, Dt(n, r.dirtyClassAttr)) : (r.dirtyStyleAttr = n.style.cssText, r.dirtyClassAttr = Ht(n), n.style.cssText = r.styleAttr, Dt(n, r.classAttr)))
        },
        it = function() {
            bt = "translateZ(0)", i.setStyle(ct, "transform", bt);
            var e = c(ct),
                t = e.getPropertyValue("transform"),
                r = e.getPropertyValue(K + "transform"),
                n = t && "none" !== t || r && "none" !== r;
            n || (bt = "")
        };
    i.setStyle = function(e, t, r) {
        var n = e.style;
        if (t = t.replace(q, L).replace("-", ""), "zIndex" === t)
            n[t] = isNaN(r) ? r : "" + (0 | r);
        else if ("float" === t)
            n.styleFloat = n.cssFloat = r;
        else
            try {
                G && (n[G + t.slice(0, 1).toUpperCase() + t.slice(1)] = r), n[t] = r
            } catch (o) {}
    };
    var lt,
        st,
        ct,
        ft,
        ut,
        mt,
        pt,
        dt,
        gt,
        vt,
        ht,
        yt,
        Tt,
        bt,
        St,
        kt = i.addEvent = function(t, r, n) {
            var o = function(t) {
                return t = t || e.event, t.target || (t.target = t.srcElement), t.preventDefault || (t.preventDefault = function() {
                    t.returnValue = !1, t.defaultPrevented = !0
                }), n.call(this, t)
            };
            r = r.split(" ");
            for (var a, i = 0, l = r.length; l > i; i++)
                a = r[i], t.addEventListener ? t.addEventListener(a, n, !1) : t.attachEvent("on" + a, o), Rt.push({
                    element: t,
                    name: a,
                    listener: n
                })
        },
        wt = i.removeEvent = function(e, t, r) {
            t = t.split(" ");
            for (var n = 0, o = t.length; o > n; n++)
                e.removeEventListener ? e.removeEventListener(t[n], r, !1) : e.detachEvent("on" + t[n], r)
        },
        xt = function() {
            for (var e, t = 0, r = Rt.length; r > t; t++)
                e = Rt[t], wt(e.element, e.name, e.listener);
            Rt = []
        },
        Et = function(e, t, r) {
            ft.keyframe && ft.keyframe.call(lt, e, t, r)
        },
        At = function() {
            var e = lt.getScrollTop();
            Vt = 0, ut && !Kt && (a.style.height = ""), W(), ut && !Kt && (a.style.height = Vt + o.clientHeight + "px"), Kt ? lt.setScrollTop(s.min(lt.getScrollTop(), Vt)) : lt.setScrollTop(e, !0), yt = !0
        },
        Ft = function() {
            var e,
                t,
                r = o.clientHeight,
                n = {};
            for (e in mt)
                t = mt[e], "function" == typeof t ? t = t.call(lt) : /p$/.test(t) && (t = t.slice(0, -1) / 100 * r), n[e] = t;
            return n
        },
        Ct = function() {
            var e,
                t = 0;
            return ct && (t = s.max(ct.offsetHeight, ct.scrollHeight)), e = s.max(t, a.scrollHeight, a.offsetHeight, o.scrollHeight, o.offsetHeight, o.clientHeight), e - o.clientHeight
        },
        Ht = function(t) {
            var r = "className";
            return e.SVGElement && t instanceof e.SVGElement && (t = t[r], r = "baseVal"), t[r]
        },
        Dt = function(t, n, o) {
            var a = "className";
            if (e.SVGElement && t instanceof e.SVGElement && (t = t[a], a = "baseVal"), o === r)
                return t[a] = n, r;
            for (var i = t[a], l = 0, s = o.length; s > l; l++)
                i = Pt(i).replace(Pt(o[l]), " ");
            i = It(i);
            for (var c = 0, f = n.length; f > c; c++)
                -1 === Pt(i).indexOf(Pt(n[c])) && (i += " " + n[c]);
            t[a] = It(i)
        },
        It = function(e) {
            return e.replace(N, "")
        },
        Pt = function(e) {
            return " " + e + " "
        },
        Nt = Date.now || function() {
            return +new Date
        },
        Ot = function(e, t) {
            return e.frame - t.frame
        },
        Vt = 0,
        zt = 1,
        qt = "down",
        Lt = -1,
        Mt = Nt(),
        $t = 0,
        Bt = 0,
        _t = !1,
        Gt = 0,
        Kt = !1,
        Yt = 0,
        Rt = [];
    "function" == typeof define && define.amd ? define([], function() {
        return i
    }) : "undefined" != typeof module && module.exports ? module.exports = i : e.skrollr = i
})(window, document);
