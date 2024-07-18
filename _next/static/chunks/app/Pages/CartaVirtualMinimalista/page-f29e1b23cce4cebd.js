(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[908],{28729:function(e){"use strict";var t=Object.prototype.hasOwnProperty,s="~";function n(){}function r(e,t,s){this.fn=e,this.context=t,this.once=s||!1}function a(e,t,n,a,o){if("function"!=typeof n)throw TypeError("The listener must be a function");var l=new r(n,a||e,o),i=s?s+t:t;return e._events[i]?e._events[i].fn?e._events[i]=[e._events[i],l]:e._events[i].push(l):(e._events[i]=l,e._eventsCount++),e}function o(e,t){0==--e._eventsCount?e._events=new n:delete e._events[t]}function l(){this._events=new n,this._eventsCount=0}Object.create&&(n.prototype=Object.create(null),new n().__proto__||(s=!1)),l.prototype.eventNames=function(){var e,n,r=[];if(0===this._eventsCount)return r;for(n in e=this._events)t.call(e,n)&&r.push(s?n.slice(1):n);return Object.getOwnPropertySymbols?r.concat(Object.getOwnPropertySymbols(e)):r},l.prototype.listeners=function(e){var t=s?s+e:e,n=this._events[t];if(!n)return[];if(n.fn)return[n.fn];for(var r=0,a=n.length,o=Array(a);r<a;r++)o[r]=n[r].fn;return o},l.prototype.listenerCount=function(e){var t=s?s+e:e,n=this._events[t];return n?n.fn?1:n.length:0},l.prototype.emit=function(e,t,n,r,a,o){var l=s?s+e:e;if(!this._events[l])return!1;var i,c,d=this._events[l],u=arguments.length;if(d.fn){switch(d.once&&this.removeListener(e,d.fn,void 0,!0),u){case 1:return d.fn.call(d.context),!0;case 2:return d.fn.call(d.context,t),!0;case 3:return d.fn.call(d.context,t,n),!0;case 4:return d.fn.call(d.context,t,n,r),!0;case 5:return d.fn.call(d.context,t,n,r,a),!0;case 6:return d.fn.call(d.context,t,n,r,a,o),!0}for(c=1,i=Array(u-1);c<u;c++)i[c-1]=arguments[c];d.fn.apply(d.context,i)}else{var m,f=d.length;for(c=0;c<f;c++)switch(d[c].once&&this.removeListener(e,d[c].fn,void 0,!0),u){case 1:d[c].fn.call(d[c].context);break;case 2:d[c].fn.call(d[c].context,t);break;case 3:d[c].fn.call(d[c].context,t,n);break;case 4:d[c].fn.call(d[c].context,t,n,r);break;default:if(!i)for(m=1,i=Array(u-1);m<u;m++)i[m-1]=arguments[m];d[c].fn.apply(d[c].context,i)}}return!0},l.prototype.on=function(e,t,s){return a(this,e,t,s,!1)},l.prototype.once=function(e,t,s){return a(this,e,t,s,!0)},l.prototype.removeListener=function(e,t,n,r){var a=s?s+e:e;if(!this._events[a])return this;if(!t)return o(this,a),this;var l=this._events[a];if(l.fn)l.fn!==t||r&&!l.once||n&&l.context!==n||o(this,a);else{for(var i=0,c=[],d=l.length;i<d;i++)(l[i].fn!==t||r&&!l[i].once||n&&l[i].context!==n)&&c.push(l[i]);c.length?this._events[a]=1===c.length?c[0]:c:o(this,a)}return this},l.prototype.removeAllListeners=function(e){var t;return e?(t=s?s+e:e,this._events[t]&&o(this,t)):(this._events=new n,this._eventsCount=0),this},l.prototype.off=l.prototype.removeListener,l.prototype.addListener=l.prototype.on,l.prefixed=s,l.EventEmitter=l,e.exports=l},9713:function(e,t,s){Promise.resolve().then(s.bind(s,3309))},6670:function(e,t,s){"use strict";s.d(t,{O:function(){return r},T:function(){return a}});let n=!0,r=()=>n,a=e=>{n=e,console.log(e)}},3309:function(e,t,s){"use strict";s.r(t),s.d(t,{default:function(){return p}});var n=s(57437),r=s(2265),a=s(16691),o=s.n(a),l=s(28206),i=e=>{e.destacado;let[t,s]=(0,r.useState)(!1);return(0,n.jsx)(n.Fragment,{children:(0,n.jsx)("div",{className:"bg-white p-2",children:(0,n.jsxs)(l.E.div,{initial:{opacity:0,y:50},animate:{opacity:1,y:1},transition:{duration:.2},children:[(0,n.jsx)("div",{className:"bg-white w-full md:w-1/3  flex items-center justify-start font-bold text-[#d22730] cursor-pointer group transition-all duration-300 hover:bg-gray-200",onClick:()=>handleSetActive()}),(0,n.jsxs)("div",{className:"flex flex-row justify-center items-start text-center pb-8  overflow-hidden",children:[(0,n.jsxs)("h1",{className:"font-semibold mb-2 text-sm text-start w-full ",children:[(0,n.jsx)("p",{className:"text-start mr-7 justify-start font-bold text-[#d22730] cursor-pointer text-lg",children:e.titulo}),"1"===e.destacado?(0,n.jsx)("p",{className:" text-[#d22730] mb-2",children:"Destacado"}):(0,n.jsx)("div",{className:" mb-2"}),(0,n.jsx)("p",{className:"text-gray-800",children:e.descripcion})]}),(0,n.jsx)(o(),{height:100,width:100,src:e.imagen,className:"rounded-lg w-1/2 h-1/3  ml-2"})]}),(0,n.jsx)("div",{className:"flex items-center border-b-2",children:(0,n.jsxs)("div",{className:"flex justify-between mx-4 w-full",children:[(0,n.jsxs)("p",{className:"mb-3 p-2 rounded-md bg-[#d22730] text-white w-min font-bold cursor-pointer text-lg",children:["$",e.precio]}),e.sabores?(0,n.jsxs)("div",{children:[(0,n.jsx)("button",{className:"btn text-[#d22730] bg-gray-200 hover:bg-gray-100 border-none font-bold",onClick:()=>document.getElementById("modal").showModal(),children:"Ver Sabores"}),(0,n.jsx)("dialog",{id:"modal",className:"modal",children:(0,n.jsxs)("div",{className:"modal-box bg-white",children:[(0,n.jsx)("form",{method:"dialog",children:(0,n.jsx)("button",{className:"btn btn-sm btn-circle btn-ghost absolute right-2 top-2",children:"✕"})}),(0,n.jsx)("h3",{className:"font-fuenteSoppelsaImprenta text-2xl text-[#d22730]",children:"Sabores!"}),e.sabores.sort((e,t)=>e.nombre.localeCompare(t.nombre)).map(e=>(0,n.jsx)("p",{className:"py-4 font-semibold text-gray-800",children:e.nombre},e.id))]})})]}):null]})})]})})})},c=()=>(0,n.jsxs)("div",{className:"animate-pulse m-2 border-b-2 bg-white",children:[(0,n.jsxs)("div",{className:" flex flex-row",children:[(0,n.jsxs)("div",{className:"w-full",children:[(0,n.jsx)("div",{className:"h-2.5 bg-gray-200 rounded-full w-48 mb-4"}),(0,n.jsx)("div",{className:"h-2 bg-gray-200 rounded-full max-w-[480px] mb-2.5"}),(0,n.jsx)("div",{className:"h-2 bg-gray-200 rounded-full mb-2.5"}),(0,n.jsx)("div",{className:"h-2 bg-gray-200 rounded-full mb-2.5"}),(0,n.jsx)("div",{className:"h-2 bg-gray-200 rounded-full mb-2.5"}),(0,n.jsx)("div",{className:"h-2 bg-gray-200 rounded-fullmax-w-[360px]"})]}),(0,n.jsx)("span",{className:"sr-only",children:"Loading..."}),(0,n.jsx)("div",{className:"flex ml-5 items-center justify-center w-1/2 h-24 md:h-48 bg-gray-300 rounded-lg sm:w-96",children:(0,n.jsx)("svg",{className:"w-10 h-10 text-gray-200","aria-hidden":"true",xmlns:"http://www.w3.org/2000/svg",fill:"currentColor",viewBox:"0 0 20 18",children:(0,n.jsx)("path",{d:"M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z"})})})]}),(0,n.jsx)("div",{className:"mx-5",children:(0,n.jsxs)("div",{className:"w-full mt-10 flex flex-row justify-between",children:[(0,n.jsx)("div",{className:"h-8 bg-gray-200 rounded-md w-1/3 mb-4"}),(0,n.jsx)("div",{className:"h-8 bg-gray-200 rounded-md w-1/3 mb-4"})]})})]});s(74741),s(98520),s(9499);var d=s(28729);let u=new d;var m=()=>{let[e,t]=(0,r.useState)("Helados"),[s,a]=(0,r.useState)(!0),o={},l=(e,t)=>{(0,r.useEffect)(()=>{!async function(){if(o[e])t(o[e]);else{let s=await fetch(e,{next:{revalidate:5}}),n=await s.json();t(n),a(!1),o[e]=n}}()},[])},[d,m]=(0,r.useState)([]);l("/Json/productosCarta.json",m);let[f,x]=(0,r.useState)(1);(0,r.useEffect)(()=>{u.addListener("eventoPedido",e=>{x(e.params)})},[]),console.log(f);let[h,p]=(0,r.useState)([]);l("/Json/sabores.json",p);let[v,b]=(0,r.useState)([]);l("/Json/promosCarta.json",b);let[j,g]=(0,r.useState)([]);return l("/Json/cafeteriaCarta.json",b),(0,n.jsx)("div",{className:"w-full bg-white flex justify-center items-center text-center pt-14 mt-12",children:(0,n.jsxs)("div",{className:"h-auto flex flex-col items-center justify-center overflow-hidden w-full md:w-1/2 ",children:[(0,n.jsx)("div",{className:" justify-center mt-2  items-center text-center w-full ",children:(0,n.jsxs)("div",{className:"overflow-x-scroll flex p-2 ",children:[(0,n.jsx)("div",{className:"mx-1",children:(0,n.jsx)("button",{className:"rounded-md p-2 font-bold  transition-all duration-200 hover:scale-105 ".concat("Helados"===e?"bg-[#d22730] text-white scale-105":"bg-gray-200 text-[#d22730]"),onClick:()=>t("Helados"),children:"Helados"})}),(0,n.jsx)("div",{className:"mx-1",children:(0,n.jsx)("button",{className:"rounded-md p-2 font-bold  transition-all duration-200 hover:scale-105 ".concat("Cafeter\xeda"===e?"bg-[#d22730] text-white scale-105":"bg-gray-200 text-[#d22730]"),onClick:()=>t("Cafeter\xeda"),children:"Cafeter\xeda"})}),(0,n.jsx)("div",{className:"mx-1",children:(0,n.jsx)("button",{className:"rounded-md p-2 font-bold  transition-all duration-200 hover:scale-105  ".concat("Productos"===e?"bg-[#d22730] text-white scale-105":"bg-gray-200 text-[#d22730]"),onClick:()=>t("Productos"),children:"Productos"})}),(0,n.jsx)("div",{className:"mx-1 ",children:(0,n.jsx)("button",{className:"rounded-md p-2 font-bold  transition-all duration-200 hover:scale-105 ".concat("Promos"===e?"bg-[#d22730] text-white scale-105":"bg-gray-200 text-[#d22730]"),onClick:()=>t("Promos"),children:"Promos"})})]})}),s?(0,n.jsxs)("div",{className:"w-full space-y-10",children:[(0,n.jsx)(c,{}),(0,n.jsx)(c,{}),(0,n.jsx)(c,{}),(0,n.jsx)(c,{}),(0,n.jsx)(c,{})]}):(0,n.jsxs)("div",{className:"w-full h-full bg-black",children:["Helados"===e?(0,n.jsx)("div",{className:"w-full",children:d.sort((e,t)=>t.destacado-e.destacado).map(e=>f===e.idSucursal&&1===e.helados?(0,n.jsx)(i,{titulo:e.titulo,imagen:e.imagen,descripcion:e.descripcion,precio:e.precio,destacado:e.destacado},e.id):null)}):null,"Cafeter\xeda"===e?(0,n.jsx)("div",{className:"w-full",children:d.sort((e,t)=>t.destacado-e.destacado).map(e=>f===e.idSucursal&&1===e.cafeteria?(0,n.jsx)(i,{titulo:e.titulo,imagen:e.imagen,descripcion:e.descripcion,precio:e.precio,destacado:e.destacado},e.id):null)}):null,"Productos"===e?(0,n.jsx)("div",{className:"w-full",children:d.sort((e,t)=>t.destacado-e.destacado).map(e=>f===e.idSucursal&&0===e.promos?(0,n.jsx)(i,{titulo:e.titulo,imagen:e.imagen,descripcion:e.descripcion,precio:e.precio,destacado:e.destacado},e.id):null)}):null,"Promos"===e?(0,n.jsx)("div",{className:"w-full",children:d.sort((e,t)=>t.destacado-e.destacado).map(e=>f===e.idSucursal&&1===e.promos?(0,n.jsx)(i,{titulo:e.titulo,imagen:e.imagen,descripcion:e.descripcion,precio:e.precio,destacado:e.destacado},e.id):null)}):null]})]})})},f=s(6670),x=s(60227),h=()=>{let[e,t]=(0,r.useState)([]),[s,a]=(0,r.useState)(!1),[o,l]=(0,r.useState)("Emilio Civit"),[i,c]=(0,r.useState)(1);return(0,r.useEffect)(()=>{(async function(){let e=await fetch("/Json/sucursales.json",{next:{revalidate:5}}),s=await e.json();t(s)})()},[]),(0,n.jsxs)("div",{className:"fixed w-full text-center z-10 text-lg py-5 text-red-500 bg-white  transition-all  shadow-lg",children:[(0,n.jsxs)("span",{className:"flex flex-col items-center justify-center font-fuenteSoppelsaImprenta space-x-4",onClick:()=>{document.getElementById("modal2").showModal(),a(!0)},children:[o,(0,n.jsx)(x.uaK,{className:"transition-all text-white bg-red-500 px-1 text-2xl rounded-xl ".concat(s?"rotate-180":"")})]}),(0,n.jsx)("dialog",{id:"modal2",className:"modal",children:(0,n.jsxs)("div",{className:"modal-box bg-white",children:[(0,n.jsx)("form",{method:"dialog",children:(0,n.jsx)("button",{className:"btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-xl",onClick:()=>a(!1),children:"✕"})}),(0,n.jsx)("h3",{className:"font-fuenteSoppelsaImprenta text-2xl text-[#d22730]",children:"Seleccione su sucursal!"}),e.map(e=>(0,n.jsx)("p",{className:"py-4 font-bold transition-all duration-200 text-gray-800 hover:text-[#d22730] cursor-pointer",onClick:()=>{var t;l(e.sucursal),c(t=e.id),u.emit("eventoPedido",{params:t}),document.getElementById("modal2").close(),a(!1)},children:e.sucursal},e.id))]})})]})},p=function(){let[e,t]=(0,r.useState)((0,f.O)());return(0,r.useEffect)(()=>{(0,f.T)(!1)},[e]),(0,n.jsxs)("div",{className:"bg-white overflow-hidden",children:[(0,n.jsx)(h,{}),(0,n.jsx)(m,{})]})}},91172:function(e,t,s){"use strict";s.d(t,{w_:function(){return i}});var n=s(2265),r={color:void 0,size:void 0,className:void 0,style:void 0,attr:void 0},a=n.createContext&&n.createContext(r),o=function(){return(o=Object.assign||function(e){for(var t,s=1,n=arguments.length;s<n;s++)for(var r in t=arguments[s])Object.prototype.hasOwnProperty.call(t,r)&&(e[r]=t[r]);return e}).apply(this,arguments)},l=function(e,t){var s={};for(var n in e)Object.prototype.hasOwnProperty.call(e,n)&&0>t.indexOf(n)&&(s[n]=e[n]);if(null!=e&&"function"==typeof Object.getOwnPropertySymbols)for(var r=0,n=Object.getOwnPropertySymbols(e);r<n.length;r++)0>t.indexOf(n[r])&&Object.prototype.propertyIsEnumerable.call(e,n[r])&&(s[n[r]]=e[n[r]]);return s};function i(e){return function(t){return n.createElement(c,o({attr:o({},e.attr)},t),function e(t){return t&&t.map(function(t,s){return n.createElement(t.tag,o({key:s},t.attr),e(t.child))})}(e.child))}}function c(e){var t=function(t){var s,r=e.attr,a=e.size,i=e.title,c=l(e,["attr","size","title"]),d=a||t.size||"1em";return t.className&&(s=t.className),e.className&&(s=(s?s+" ":"")+e.className),n.createElement("svg",o({stroke:"currentColor",fill:"currentColor",strokeWidth:"0"},t.attr,r,c,{className:s,style:o(o({color:e.color||t.color},t.style),e.style),height:d,width:d,xmlns:"http://www.w3.org/2000/svg"}),i&&n.createElement("title",null,i),e.children)};return void 0!==a?n.createElement(a.Consumer,null,function(e){return t(e)}):t(r)}}},function(e){e.O(0,[99,413,115,394,971,472,744],function(){return e(e.s=9713)}),_N_E=e.O()}]);