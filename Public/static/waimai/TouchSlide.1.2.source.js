define(function(require, exports, module) {
	'use strict';
	var $ = require("jquery"),
	_ = require("/Public/static/waimai/jquery.lazyload.js")
var TouchSlide = function(ac) {
	ac = ac || {};
	var G = {
		slideCell: ac.slideCell || "#touchSlide",
		titCell: ac.titCell || ".hd li",
		mainCell: ac.mainCell || ".bd",
		effect: ac.effect || "left",
		autoPlay: ac.autoPlay || false,
		delayTime: ac.delayTime || 200,
		interTime: ac.interTime || 2500,
		defaultIndex: ac.defaultIndex || 0,
		titOnClassName: ac.titOnClassName || "on",
		autoPage: ac.autoPage || false,
		prevCell: ac.prevCell || ".prev",
		nextCell: ac.nextCell || ".next",
		pageStateCell: ac.pageStateCell || ".pageState",
		pnLoop: ac.pnLoop == "undefined " ? true : ac.pnLoop,
		startFun: ac.startFun || null,
		endFun: ac.endFun || null,
		switchLoad: ac.switchLoad || null
	};
	var g = document.getElementById(G.slideCell.replace("#", ""));
	if (!g) {
		return false
	}
	var d = function(aj, af) {
		aj = aj.split(" ");
		var ai = [];
		af = af || document;
		var ad = [af];
		for (var ah in aj) {
			if (aj[ah].length != 0) {
				ai.push(aj[ah])
			}
		}
		for (var ah in ai) {
			if (ad.length == 0) {
				return false
			}
			var ak = [];
			for (var a in ad) {
				if (ai[ah][0] == "#") {
					ak.push(document.getElementById(ai[ah].replace("#", "")))
				} else {
					if (ai[ah][0] == ".") {
						var al = ad[a].getElementsByTagName("*");
						for (var ag = 0; ag < al.length; ag++) {
							var ae = al[ag].className;
							if (ae && ae.search(new RegExp("\\b" + ai[ah].replace(".", "") + "\\b")) != -1) {
								ak.push(al[ag])
							}
						}
					} else {
						var al = ad[a].getElementsByTagName(ai[ah]);
						for (var ag = 0; ag < al.length; ag++) {
							ak.push(al[ag])
						}
					}
				}
			}
			ad = ak
		}
		return ad.length == 0 || ad[0] == af ? false : ad
	};
	var U = function(ad, a) {
		var i = document.createElement("div");
		i.innerHTML = a;
		i = i.children[0];
		var ae = ad.cloneNode(true);
		i.appendChild(ae);
		ad.parentNode.replaceChild(i, ad);
		R = ae;
		return i
	};
	var S = function(ad, a) {
		var i = 0;
		if (ad.currentStyle) {
			i = ad.currentStyle[a]
		} else {
			i = getComputedStyle(ad, false)[a]
		}
		return parseInt(i.replace("px", ""))
	};
	var E = function(i, a) {
		if (!i || !a || (i.className && i.className.search(new RegExp("\\b" + a + "\\b")) != -1)) {
			return
		}
		i.className += (i.className ? " " : "") + a
	};
	var t = function(i, a) {
		if (!i || !a || (i.className && i.className.search(new RegExp("\\b" + a + "\\b")) == -1)) {
			return
		}
		i.className = i.className.replace(new RegExp("\\s*\\b" + a + "\\b", "g"), "")
	};
	var W = G.effect;
	var q = d(G.prevCell, g)[0];
	var F = d(G.nextCell, g)[0];
	var D = d(G.pageStateCell)[0];
	var R = d(G.mainCell, g)[0];
	if (!R) {
		return false
	}
	var h = R.children.length;
	var x = d(G.titCell, g);
	var o = x ? x.length : h;
	var l = G.switchLoad;
	var I = parseInt(G.defaultIndex);
	var w = parseInt(G.delayTime);
	var r = parseInt(G.interTime);
	var T = (G.autoPlay == "false" || G.autoPlay == false) ? false : true;
	var s = (G.autoPage == "false" || G.autoPage == false) ? false : true;
	var f = (G.pnLoop == "false" || G.pnLoop == false) ? false : true;
	var aa = I;
	var V = null;
	var X = null;
	var C = null;
	var B = 0;
	var y = 0;
	var M = 0;
	var K = 0;
	var k = 0;
	var N = (/hp-tablet/gi).test(navigator.appVersion);
	var u = "ontouchstart" in window && !N;
	var P = u ? "touchstart" : "mousedown";
	var p = u ? "touchmove" : "";
	var v = u ? "touchend" : "mouseup";
	var H = 0;
	var A = R.parentNode.clientWidth;
	var Q;
	var c;
	var ab = h;
	if (o == 0) {
		o = h
	}
	if (s) {
		o = h;
		x = x[0];
		x.innerHTML = "";
		var J = "";
		if (G.autoPage == true || G.autoPage == "true") {
			for (var Z = 0; Z < o; Z++) {
				J += "<li>" + (Z + 1) + "</li>"
			}
		} else {
			for (var Z = 0; Z < o; Z++) {
				J += G.autoPage.replace("$", (Z + 1))
			}
		}
		x.innerHTML = J;
		x = x.children
	}
	if (W == "leftLoop") {
		ab += 2;
		R.appendChild(R.children[0].cloneNode(true));
		R.insertBefore(R.children[h - 1].cloneNode(true), R.children[0])
	}
	Q = U(R, '<div class="tempWrap" style="overflow:hidden; position:relative;"></div>');
	R.style.cssText = "width:" + ab * A + "px;position:relative;overflow:hidden;padding:0;margin:0;";
	for (var Z = 0; Z < ab; Z++) {
		R.children[Z].style.cssText = "display:table-cell;vertical-align:top;width:" + A + "px"
	}
	var Y = function() {
		if (typeof G.startFun == "function") {
			G.startFun(I, o)
		}
	};
	var m = function() {
		if (typeof G.endFun == "function") {
			G.endFun(I, o)
		}
	};
	var b = function(a) {
		var i = (W == "leftLoop" ? I + 1 : I) + a;
		var ad = function(ag) {
			var ae = R.children[ag].getElementsByTagName("img");
			for (var af = 0; af < ae.length; af++) {
				if (ae[af].getAttribute(l)) {
					ae[af].setAttribute("src", ae[af].getAttribute(l));
					ae[af].removeAttribute(l)
				}
			}
		};
		ad(i);
		if (W == "leftLoop") {
			switch (i) {
				case 0:
					ad(h);
					break;
				case 1:
					ad(h + 1);
					break;
				case h:
					ad(0);
					break;
				case h + 1:
					ad(1);
					break
			}
		}
	};
	var n = function() {
		A = Q.clientWidth;
		R.style.width = ab * A + "px";
		for (var a = 0; a < ab; a++) {
			R.children[a].style.width = A + "px"
		}
		var ad = W == "leftLoop" ? I + 1 : I;
		e(-ad * A, 0)
	};
	window.addEventListener("resize", n, false);
	var e = function(ad, i, a) {
		if (!!a) {
			a = a.style
		} else {
			a = R.style
		}
		a.webkitTransitionDuration = a.MozTransitionDuration = a.msTransitionDuration = a.OTransitionDuration = a.transitionDuration = i + "ms";
		a.webkitTransform = "translate(" + ad + "px,0)translateZ(0)";
		a.msTransform = a.MozTransform = a.OTransform = "translateX(" + ad + "px)"
	};
	var L = function(a) {
		if($(".lazy" + (I + 1))){
			$(".lazy" + (I + 1)).lazyload({
			threshold: 200
		});
		}
		switch (W) {
			case "left":
				if (I >= o) {
					I = a ? I - 1 : 0
				} else {
					if (I < 0) {
						I = a ? 0 : o - 1
					}
				} if (l != null) {
					b(0)
				}
				e((-I * A), w);
				aa = I;
				break;
			case "leftLoop":
				if (l != null) {
					b(0)
				}
				e(-(I + 1) * A, w);
				if (I == -1) {
					X = setTimeout(function() {
						e(-o * A, 0)
					}, w);
					I = o - 1
				} else {
					if (I == o) {
						X = setTimeout(function() {
							e(-A, 0)
						}, w);
						I = 0
					}
				}
				aa = I;
				break
		}
		Y();
		C = setTimeout(function() {
			m()
		}, w);
		for (var ad = 0; ad < o; ad++) {
			t(x[ad], G.titOnClassName);
			if (ad == I) {
				E(x[ad], G.titOnClassName)
			}
		}
		if (f == false) {
			t(F, "nextStop");
			t(q, "prevStop");
			if (I == 0) {
				E(q, "prevStop")
			} else {
				if (I == o - 1) {
					E(F, "nextStop")
				}
			}
		}
		if (D) {
			D.innerHTML = "<span>" + (I + 1) + "</span>/" + o
		}
	};
	L();
	if (T) {
		V = setInterval(function() {
			I++;
			L()
		}, r)
	}
	if (x) {
		for (var Z = 0; Z < o; Z++) {
			(function() {
				var a = Z;
				x[a].addEventListener("click", function(i) {
					clearTimeout(X);
					clearTimeout(C);
					I = a;
					L()
				})
			})()
		}
	}
	if (F) {
		F.addEventListener("click", function(a) {
			if (f == true || I != o - 1) {
				clearTimeout(X);
				clearTimeout(C);
				I++;
				L()
			}
		})
	}
	if (q) {
		q.addEventListener("click", function(a) {
			if (f == true || I != 0) {
				clearTimeout(X);
				clearTimeout(C);
				I--;
				L()
			}
		})
	}
	var j = function(i) {
		clearTimeout(X);
		clearTimeout(C);
		c = undefined;
		M = 0;
		var a = u ? i.touches[0] : i;
		B = a.pageX;
		y = a.pageY;
		R.addEventListener(p, z, false);
		R.addEventListener(v, O, false)
	};
	var z = function(i) {
		if (u) {
			if (i.touches.length > 1 || i.scale && i.scale !== 1) {
				return
			}
		}
		var a = u ? i.touches[0] : i;
		M = a.pageX - B;
		K = a.pageY - y;
		if (typeof c == "undefined") {
			c = !!(c || Math.abs(M) < Math.abs(K))
		}
		if (!c) {
			i.preventDefault();
			if (T) {
				clearInterval(V)
			}
			switch (W) {
				case "left":
					if ((I == 0 && M > 0) || (I >= o - 1 && M < 0)) {
						M = M * 0.4
					}
					e(-I * A + M, 0);
					break;
				case "leftLoop":
					e(-(I + 1) * A + M, 0);
					break
			}
			if (l != null && Math.abs(M) > A / 3) {
				b(M > -0 ? -1 : 1)
			}
		}
	};
	var O = function(a) {
		if (M == 0) {
			return
		}
		a.preventDefault();
		if (!c) {
			if (Math.abs(M) > A / 10) {
				M > 0 ? I-- : I++
			}
			L(true);
			if (T) {
				V = setInterval(function() {
					I++;
					L()
				}, r)
			}
		}
		R.removeEventListener(p, z, false);
		R.removeEventListener(v, O, false)
	};
	R.addEventListener(P, j, false)
};
 return TouchSlide;
})