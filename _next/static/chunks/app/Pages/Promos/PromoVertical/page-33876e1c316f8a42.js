(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[520],{53569:function(e,t,n){Promise.resolve().then(n.bind(n,47285))},47285:function(e,t,n){"use strict";n.r(t),n.d(t,{default:function(){return l}});var r=n(57437),a=n(2265),s=e=>{let[t,n]=(0,a.useState)([]);(0,a.useEffect)(()=>{!async function(){let e=await fetch("/Json/promosPantalla.json",{next:{revalidate:5}}),t=await e.json();n(t),console.log("c\xf3mo")}()},[]);let[s,l]=(0,a.useState)(0);return(0,a.useEffect)(()=>{let t=setInterval(()=>{let t=e.images.length;l(e=>e+1<t?e+1:0)},5e3);return()=>clearInterval(t)},[e.images]),(0,r.jsx)("div",{className:"relative w-full h-screen overflow-hidden",children:0!==e.images.length?(0,r.jsxs)(r.Fragment,{children:[(0,r.jsx)("img",{src:e.images[s].imagen,alt:"Imagen de fondo",className:"absolute w-full h-full  "}),(0,r.jsx)("div",{className:" bg-black bg-opacity-50 flex items-start justify-end text-white text-2xl h-screen ",children:(0,r.jsxs)("h1",{className:" absolute bg-[#d22730] p-14 rounded-tl text-6xl -rotate-90",children:["$",e.images[s].precio]})})]}):null})},l=()=>{let[e,t]=(0,a.useState)([]);return(0,a.useEffect)(()=>{async function e(){let e=await fetch("/Json/promosPantalla.json",{next:{revalidate:5}}),n=await e.json(),r=await n.filter(e=>1===e.orientacion);t(r)}e();let n=setInterval(e,5e3);return()=>clearInterval(n)},[]),(0,r.jsx)(r.Fragment,{children:(0,r.jsx)(s,{images:e})})}},30622:function(e,t,n){"use strict";var r=n(2265),a=Symbol.for("react.element"),s=Symbol.for("react.fragment"),l=Object.prototype.hasOwnProperty,o=r.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED.ReactCurrentOwner,i={key:!0,ref:!0,__self:!0,__source:!0};function c(e,t,n){var r,s={},c=null,u=null;for(r in void 0!==n&&(c=""+n),void 0!==t.key&&(c=""+t.key),void 0!==t.ref&&(u=t.ref),t)l.call(t,r)&&!i.hasOwnProperty(r)&&(s[r]=t[r]);if(e&&e.defaultProps)for(r in t=e.defaultProps)void 0===s[r]&&(s[r]=t[r]);return{$$typeof:a,type:e,key:c,ref:u,props:s,_owner:o.current}}t.Fragment=s,t.jsx=c,t.jsxs=c},57437:function(e,t,n){"use strict";e.exports=n(30622)}},function(e){e.O(0,[971,472,744],function(){return e(e.s=53569)}),_N_E=e.O()}]);