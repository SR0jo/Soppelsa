(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[931],{99962:function(t,e,s){Promise.resolve().then(s.bind(s,13889))},13889:function(t,e,s){"use strict";s.r(e),s.d(e,{default:function(){return z}});var i=s(57437),o=s(2265),r=s(16691),l=s.n(r);s(57410);var n=s(45029);s(95005),s(51954);var a=s(61396),c=s.n(a),h=s(34570),d=s(59291),u=s(28206),p=()=>{let t=(0,o.useRef)(null),{scrollYProgress:e}=(0,h.v)({target:t,offset:["start start","start end"]}),s=(0,d.H)(e,[1,0],["-200%","100%"]);(0,d.H)(e,[0,1],["110%","0%"]);let r=(0,d.H)(e,[1,0],[0,1]),l=(0,d.H)(e,[0,1],["-200%","400%"]);return(0,i.jsx)("section",{className:"relative bg-bgCalidad bg-cover bg-fixed overflow-hidden  ",ref:t,children:(0,i.jsxs)("div",{className:"flex flex-col justify-center items-center h-auto pt-32 bg-black bg-opacity-50  text-center bg-fixed",children:[(0,i.jsx)(u.E.div,{className:"mb-32 justify-center text-white text-9xl font-fuenteSoppelsa rounded-full  z-10",style:{y:s,opacity:r},children:(0,i.jsx)("h1",{children:"Nosotros "})}),(0,i.jsx)("div",{className:"mb-32 justify-center text-white text-xl font-semibold  md:w-1/2 mx-5 z-10",children:(0,i.jsxs)(u.E.h2,{style:{opacity:r},children:["Somos la helader\xeda n\xfamero 1 de Mendoza desde 1927. Nuestros productos artesanales garantizan la calidad total, cuidando el medio ambiente y el estado natural de las materias primas que seleccionamos. Esa pureza y transparencia nos mantienen activos, renovados, con un amor permanente por lo que hacemos y por quienes nos eligen."," "]})}),(0,i.jsx)(u.E.div,{style:{y:l,opacity:r},children:(0,i.jsx)(c(),{href:"/Pages/Historia",children:(0,i.jsx)("h1",{className:"font-fuenteSoppelsaImprenta text-white text-4xl hover:text-gray-700 hover:text-opacity-70 hover:bg-white hover:scale-105 transition-all p-2 bg-white bg-opacity-20 rounded-md",children:"Conocenos"})})}),(0,i.jsx)("div",{className:"h-96"})]})})},m=s(35371),f=s(74741);s(98520),s(9499);var v=()=>{var t={dots:!1,infinite:!0,speed:500,slidesToShow:6,slidesToScroll:6,initialSlide:0,autoplay:!0,autoplaySpeed:8e3,responsive:[{breakpoint:1440,settings:{slidesToShow:4,slidesToScroll:4}},{breakpoint:1024,settings:{slidesToShow:3,slidesToScroll:3}},{breakpoint:600,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:480,settings:{slidesToShow:3,slidesToScroll:3}}]};let[e,s]=(0,o.useState)([]);(0,o.useEffect)(()=>{!async function(){let t=await fetch("/Json/sabores.json",{next:{revalidate:5}}),e=await t.json();s(e)}()},[]);let[r,l]=(0,o.useState)([]);(0,o.useEffect)(()=>{!async function(){let t=await fetch("/Json/productos.json",{next:{revalidate:5}}),e=await t.json();l(e)}()},[]);let n=(0,o.useRef)(null),{scrollYProgress:a}=(0,h.v)({target:n,offset:["start start","start end"]}),c=(0,d.H)(a,[0,1.5],["0%","30%"]),p=(0,d.H)(a,[0,1.7],["0%","100%"]),v=(0,d.H)(a,[0,1.5],["0%","-50%"]);(0,d.H)(a,[0,1.7],["0%","-100%"]);let x=(0,d.H)(a,[0,1.5],[1,.5]);return(0,i.jsx)("div",{className:"overflow-hidden",children:(0,i.jsxs)("div",{className:"",children:[(0,i.jsxs)(u.E.div,{className:"flex flex-col justify-center text-center ",style:{x:c,opacity:x},ref:n,children:[(0,i.jsx)(u.E.h2,{className:"text-5xl mt-5 text-[#d22730] font-fuenteSoppelsaImprenta",children:"Sabores destacados"}),(0,i.jsx)("h3",{className:"text-4xl mt-4 text-[#d22730] font-fuenteSoppelsa",children:"Desliza para descubrir"})]}),(0,i.jsx)(u.E.div,{style:{y:p,opacity:x},children:(0,i.jsx)(f.Z,{...t,className:"",children:e.map(t=>1===t.destacado?(0,i.jsx)(u.E.div,{className:"flex items-center justify-center mt-4 mb-16 pb-20",children:(0,i.jsx)(m.Z,{imagen:t.imagen,nombre:t.nombre,descripcion:t.descripcion,id:t.id,tipo:"Sabores",color:t.color},t.id)}):null)})}),(0,i.jsx)(u.E.div,{className:"flex flex-col justify-center text-center ",style:{x:v},children:(0,i.jsx)("h2",{className:"text-5xl mt-5 text-[#d22730] font-fuenteSoppelsaImprenta",children:"Postres destacados"})}),(0,i.jsx)(u.E.div,{style:{y:p,opacity:x},children:(0,i.jsx)(f.Z,{...t,className:"",children:r.map(t=>1===t.destacado?(0,i.jsx)(u.E.div,{className:"flex items-center justify-center mt-4 mb-16 pb-20",children:(0,i.jsx)(m.Z,{imagen:t.imagen,nombre:t.nombre,descripcion:t.descripcion,id:t.id,tipo:"Sabores",color:t.color},t.id)}):null)})})]})})},x=t=>{let e=t.link;return(0,i.jsx)(u.E.div,{initial:{opacity:0,y:50},animate:{opacity:1,y:0},transition:{duration:.5},children:(0,i.jsx)("div",{children:(0,i.jsxs)("div",{className:"bg-white flex flex-col rounded-lg m-4 justify-center text-center items-center text-red-500 shadow-lg hover:shadow-red-300 transition-shadow duration-200 cursor-pointer",children:[(0,i.jsx)("h1",{className:"text-2xl font-fuenteSoppelsaImprenta",children:t.sucursal}),(0,i.jsx)("p",{className:"w-1/2 font-bold text-gray-700 pb-4",children:t.descripcion}),(0,i.jsx)("iframe",{src:t.maps,width:"300",height:"300",style:{border:"0"},allowfullscreen:"",loading:"lazy",referrerpolicy:"no-referrer-when-downgrade"}),""!==e?(0,i.jsx)("div",{className:"flex space-x-4 mt-4",children:(0,i.jsx)(c(),{className:"flex flex-wrap mb-5 hover:scale-110 transition-transform",href:e,children:(0,i.jsx)(l(),{src:"/pedidosya.svg",width:40,height:40})})}):(0,i.jsx)("div",{className:"flex space-x-4 my-10"})]})})})},g=s(60227),y=s(62167),w=()=>{let[t,e]=(0,o.useState)([]),[s,r]=(0,o.useState)([]),l=(0,o.useRef)(null),{scrollYProgress:n}=(0,h.v)({target:l,offset:["start start","start end"]}),a=(0,d.H)(n,[.2,1.7],["0%","20%"]),c=(0,d.H)(n,[.2,1.7],["0%","50%"]),p=(0,d.H)(n,[.2,1.3],[1,0]);(0,o.useEffect)(()=>{(async function(){let t=await fetch("/Json/sucursales.json",{next:{revalidate:5}}),s=await t.json();e(s)})()},[]),(0,o.useEffect)(()=>{(async function(){let t=await fetch("/Json/zonas.json",{next:{revalidate:5}}),e=await t.json();r(e)})()},[]);let[m,f]=(0,o.useState)("Godoy Cruz"),[v,w]=(0,o.useState)(!1);return(0,i.jsxs)(i.Fragment,{children:[(0,i.jsx)(u.E.div,{id:"sucursales",className:"text-center flex flex-col justify-center items-center",ref:l,style:{x:a,opacity:p},children:(0,i.jsx)("h1",{className:"text-7xl font-fuenteSoppelsa text-white bg-red-500 p-2 rounded-b-md",children:"Nuestras sucursales"})}),(0,i.jsx)("div",{className:"flex-col justify-center mt-2 items-center text-center font-fuenteSoppelsaImprenta",children:(0,i.jsxs)("button",{className:"cursor-pointer p-2 rounded-md shadow-lg inline-flex text-xl text-red-500 font-semibold",onClick:()=>w(!v),children:[m," ",(0,i.jsx)(g.uaK,{className:"ml-2 justify-center text-center self-center transition-all ".concat(v?"rotate-180":"")})]})}),(0,i.jsx)(y.M,{children:(0,i.jsx)(u.E.div,{className:"flex-col justify-center mt-2  ".concat(v?"":"hidden"),initial:{y:-1,opacity:0},animate:{y:v?0:-20,opacity:v?1:0},exit:{y:-1,opacity:0},transition:{duration:.2},children:(0,i.jsx)("ul",{className:"flex flex-wrap justify-center space-x-2 text-md md:text-xl text-red-500 font-fuenteSoppelsaImprenta",children:s.map(t=>(0,i.jsx)("li",{className:"cursor-pointer p-2 rounded-md shadow-lg ".concat(m==t.zona?"bg-red-500 text-white":""),onClick:()=>f(t.zona),children:t.zona}))})})}),(0,i.jsx)(u.E.div,{className:"flex flex-wrap m-5 items-center justify-center",style:{y:c},children:t.map(t=>{if(t.zona==m)return(0,i.jsx)(x,{sucursal:t.sucursal,imagen:t.imagen,descripcion:t.descripcion,link:t.link,maps:t.maps},t.id)})})]})},S=t=>(0,i.jsx)("div",{className:" h-auto m-4 p-4 rounded-lg w-full lg:w-1/4 md:w-1/3 overflow-hidden group hover:scale-105 transition-transform cursor-pointer shadow-lg bg-[".concat(t.color,"]"),children:(0,i.jsxs)("div",{className:"flex flex-col justify-center items-center",children:[(0,i.jsxs)("h1",{className:"font-fuenteSoppelsa text-[#d22730] text-4xl md:text-6xl",children:[t.titulo,(0,i.jsx)("div",{className:"w-full bg-[#d22730] h-1 rounded-full "})]}),(0,i.jsx)("img",{src:t.imagen,width:400,height:400,className:"group-hover:scale-125 transition-transform "}),(0,i.jsx)("h2",{className:"font-semibold text-gray-800 text-md my-2 ",children:t.descripcion}),(0,i.jsx)("div",{className:"w-full  h-1 rounded-full bg-[#d22730]"})]})}),j=()=>{let t=(0,o.useRef)(null),{scrollYProgress:e}=(0,h.v)({target:t,offset:["start start","end start"]}),s=(0,d.H)(e,[0,.1],["10%","0%"]),r=(0,d.H)(e,[0,.1],[0,1]),l=(0,d.H)(e,[0,.15],["-30%","0%"]),[n,a]=(0,o.useState)([]);return(0,o.useEffect)(()=>{(async function(){let t=await fetch("/Json/promos.json",{next:{revalidate:5}}),e=await t.json();a(e)})()},[]),(0,i.jsx)(u.E.div,{children:(0,i.jsxs)("div",{className:"flex flex-col h-auto bg-white pb-8 mt-8",children:[(0,i.jsx)(u.E.div,{transition:{duration:2,ease:"easeOut"},style:{x:s,opacity:r},children:(0,i.jsx)("h1",{className:"font-fuenteSoppelsaImprenta text-5xl text-[#d22730] text-center mb-6",children:"Promos destacadas"})}),(0,i.jsx)(u.E.div,{className:"flex flex-wrap justify-center items-center text-center",style:{x:l},children:n.map(t=>(0,i.jsx)(S,{titulo:t.titulo,imagen:t.imagen,descripcion:t.descripcion,fondo:t.fondo,color:t.color},t.id))})]})})},b=s(28477),N=t=>(0,i.jsx)(c(),{href:"/Pages/PagFSucursal",className:"w-full h-screen overflow-hidden flex justify-center  items-center text-center cursor-pointer",style:{backgroundImage:t.color,backgroundPosition:"center",backgroundSize:"cover"},onClick:()=>localStorage.setItem("Id",t.id),children:(0,i.jsxs)("div",{className:"flex flex-col  justify-center items-center text-center bg-black h-full bg-opacity-40 md:bg-opacity-80 w-full hover:bg-opacity-30 transition-all duration-700 group",children:[(0,i.jsx)("h1",{className:"font-fuenteSoppelsa text-5xl md:text-7xl text-white mt-4 group-hover:-translate-y-24 transition-transform duration-700",children:t.servicio}),(0,i.jsx)("h2",{className:"opacity-100 md:opacity-0 bg-black bg-opacity-10 p-4 rounded-md md:bg-opacity-0 group-hover:opacity-100 text-white absolute transition-all mt-48 md:mt-2 duration-700 mx-2",children:t.descripcion})]})}),E=()=>{let t=(0,o.useRef)(null),{scrollYProgress:e}=(0,h.v)({target:t,offset:["start start","start end"]});(0,d.H)(e,[0,1.5],["0%","40%"]);let s=(0,d.H)(e,[0,1.7],["0%","100%"]),r=(0,d.H)(e,[0,1.5],["0%","90%"]),l=(0,d.H)(e,[0,1.7],["0%","60%"]),n=(0,d.H)(e,[0,1.5],[1,.5]);return(0,i.jsxs)("div",{className:"flex flex-col md:flex-row justify-center items-center w-full overflow-hidden",ref:t,id:"secContacto",children:[(0,i.jsx)(u.E.div,{className:"w-full md:w-1/4 ",style:{y:l},children:(0,i.jsx)(N,{className:"",color:"url('/compras.jpg')",servicio:"Compras por mayor",descripcion:"Para nuestros clientes interesados en comprar productos al por mayor.",id:"1"})}),(0,i.jsx)(u.E.div,{className:"w-full md:w-1/4",style:{y:r,opacity:n},children:(0,i.jsx)(N,{className:"",color:"url('/alfajores.jpg')",servicio:"Servicios para eventos",descripcion:"Para darle un toque especial a tus eventos con nuestros servicios de helader\xeda. ",id:"2"})}),(0,i.jsx)(u.E.div,{className:"w-full md:w-1/4",style:{y:l,opacity:n},children:(0,i.jsx)(N,{color:"url('/bgSucursal.jpg')",servicio:"Quiero mi sucursal",descripcion:"Para poner en marcha tu emprendimiento con una de nuestras extraordinarias sucursales. ",id:"3"})}),(0,i.jsx)(u.E.div,{className:"w-full md:w-1/4",style:{y:s,opacity:n},children:(0,i.jsx)(N,{color:"url('/fabrica.jpg')",servicio:"Visita a la f\xe1brica",descripcion:"Para coordinar una visita guiada a nuestras f\xe1bricas de excelencia. ",id:"4"})})]})},z=()=>((0,o.useEffect)(()=>{let t=new b.Z;requestAnimationFrame(function e(s){t.raf(s),requestAnimationFrame(e)})},[]),(0,o.useEffect)(()=>{window.scrollTo(0,0)},[]),(0,i.jsx)("div",{className:"App bg-white overflow-hidden",children:(0,i.jsxs)("div",{children:[" ",(0,i.jsx)(n.default,{}),(0,i.jsx)(j,{}),(0,i.jsx)(v,{}),(0,i.jsx)(p,{}),(0,i.jsx)(w,{}),(0,i.jsx)(E,{})]})}))},91172:function(t,e,s){"use strict";s.d(e,{w_:function(){return a}});var i=s(2265),o={color:void 0,size:void 0,className:void 0,style:void 0,attr:void 0},r=i.createContext&&i.createContext(o),l=function(){return(l=Object.assign||function(t){for(var e,s=1,i=arguments.length;s<i;s++)for(var o in e=arguments[s])Object.prototype.hasOwnProperty.call(e,o)&&(t[o]=e[o]);return t}).apply(this,arguments)},n=function(t,e){var s={};for(var i in t)Object.prototype.hasOwnProperty.call(t,i)&&0>e.indexOf(i)&&(s[i]=t[i]);if(null!=t&&"function"==typeof Object.getOwnPropertySymbols)for(var o=0,i=Object.getOwnPropertySymbols(t);o<i.length;o++)0>e.indexOf(i[o])&&Object.prototype.propertyIsEnumerable.call(t,i[o])&&(s[i[o]]=t[i[o]]);return s};function a(t){return function(e){return i.createElement(c,l({attr:l({},t.attr)},e),function t(e){return e&&e.map(function(e,s){return i.createElement(e.tag,l({key:s},e.attr),t(e.child))})}(t.child))}}function c(t){var e=function(e){var s,o=t.attr,r=t.size,a=t.title,c=n(t,["attr","size","title"]),h=r||e.size||"1em";return e.className&&(s=e.className),t.className&&(s=(s?s+" ":"")+t.className),i.createElement("svg",l({stroke:"currentColor",fill:"currentColor",strokeWidth:"0"},e.attr,o,c,{className:s,style:l(l({color:t.color||e.color},e.style),t.style),height:h,width:h,xmlns:"http://www.w3.org/2000/svg"}),a&&i.createElement("title",null,a),t.children)};return void 0!==r?i.createElement(r.Consumer,null,function(t){return e(t)}):e(o)}},28477:function(t,e,s){"use strict";function i(){return(i=Object.assign?Object.assign.bind():function(t){for(var e=1;e<arguments.length;e++){var s=arguments[e];for(var i in s)Object.prototype.hasOwnProperty.call(s,i)&&(t[i]=s[i])}return t}).apply(this,arguments)}function o(t,e,s){return Math.max(t,Math.min(e,s))}s.d(e,{Z:function(){return c}});class r{advance(t){var e,s,i,r;if(!this.isRunning)return;let l=!1;if(this.lerp)this.value=(s=this.value,i=this.to,(1-(r=1-Math.exp(-60*this.lerp*t)))*s+r*i),Math.round(this.value)===this.to&&(this.value=this.to,l=!0);else{this.currentTime+=t;let e=o(0,this.currentTime/this.duration,1);l=e>=1;let s=l?1:this.easing(e);this.value=this.from+(this.to-this.from)*s}null==(e=this.onUpdate)||e.call(this,this.value,l),l&&this.stop()}stop(){this.isRunning=!1}fromTo(t,e,{lerp:s=.1,duration:i=1,easing:o=t=>t,onStart:r,onUpdate:l}){this.from=this.value=t,this.to=e,this.lerp=s,this.duration=i,this.easing=o,this.currentTime=0,this.isRunning=!0,null==r||r(),this.onUpdate=l}}class l{constructor({wrapper:t,content:e,autoResize:s=!0}={}){if(this.resize=()=>{this.onWrapperResize(),this.onContentResize()},this.onWrapperResize=()=>{this.wrapper===window?(this.width=window.innerWidth,this.height=window.innerHeight):(this.width=this.wrapper.clientWidth,this.height=this.wrapper.clientHeight)},this.onContentResize=()=>{this.scrollHeight=this.content.scrollHeight,this.scrollWidth=this.content.scrollWidth},this.wrapper=t,this.content=e,s){var i;let t;let e=(i=this.resize,function(){let e=arguments,s=this;clearTimeout(t),t=setTimeout(function(){i.apply(s,e)},250)});this.wrapper!==window&&(this.wrapperResizeObserver=new ResizeObserver(e),this.wrapperResizeObserver.observe(this.wrapper)),this.contentResizeObserver=new ResizeObserver(e),this.contentResizeObserver.observe(this.content)}this.resize()}destroy(){var t,e;null==(t=this.wrapperResizeObserver)||t.disconnect(),null==(e=this.contentResizeObserver)||e.disconnect()}get limit(){return{x:this.scrollWidth-this.width,y:this.scrollHeight-this.height}}}class n{constructor(){this.events={}}emit(t,...e){let s=this.events[t]||[];for(let t=0,i=s.length;t<i;t++)s[t](...e)}on(t,e){var s;return(null==(s=this.events[t])?void 0:s.push(e))||(this.events[t]=[e]),()=>{var s;this.events[t]=null==(s=this.events[t])?void 0:s.filter(t=>e!==t)}}off(t,e){var s;this.events[t]=null==(s=this.events[t])?void 0:s.filter(t=>e!==t)}destroy(){this.events={}}}class a{constructor(t,{wheelMultiplier:e=1,touchMultiplier:s=2,normalizeWheel:i=!1}){this.onTouchStart=t=>{let{clientX:e,clientY:s}=t.targetTouches?t.targetTouches[0]:t;this.touchStart.x=e,this.touchStart.y=s,this.lastDelta={x:0,y:0}},this.onTouchMove=t=>{let{clientX:e,clientY:s}=t.targetTouches?t.targetTouches[0]:t,i=-(e-this.touchStart.x)*this.touchMultiplier,o=-(s-this.touchStart.y)*this.touchMultiplier;this.touchStart.x=e,this.touchStart.y=s,this.lastDelta={x:i,y:o},this.emitter.emit("scroll",{deltaX:i,deltaY:o,event:t})},this.onTouchEnd=t=>{this.emitter.emit("scroll",{deltaX:this.lastDelta.x,deltaY:this.lastDelta.y,event:t})},this.onWheel=t=>{let{deltaX:e,deltaY:s}=t;this.normalizeWheel&&(e=o(-100,e,100),s=o(-100,s,100)),e*=this.wheelMultiplier,s*=this.wheelMultiplier,this.emitter.emit("scroll",{deltaX:e,deltaY:s,event:t})},this.element=t,this.wheelMultiplier=e,this.touchMultiplier=s,this.normalizeWheel=i,this.touchStart={x:null,y:null},this.emitter=new n,this.element.addEventListener("wheel",this.onWheel,{passive:!1}),this.element.addEventListener("touchstart",this.onTouchStart,{passive:!1}),this.element.addEventListener("touchmove",this.onTouchMove,{passive:!1}),this.element.addEventListener("touchend",this.onTouchEnd,{passive:!1})}on(t,e){return this.emitter.on(t,e)}destroy(){this.emitter.destroy(),this.element.removeEventListener("wheel",this.onWheel,{passive:!1}),this.element.removeEventListener("touchstart",this.onTouchStart,{passive:!1}),this.element.removeEventListener("touchmove",this.onTouchMove,{passive:!1}),this.element.removeEventListener("touchend",this.onTouchEnd,{passive:!1})}}class c{constructor({wrapper:t=window,content:e=document.documentElement,wheelEventsTarget:s=t,eventsTarget:o=s,smoothWheel:c=!0,smoothTouch:h=!1,syncTouch:d=!1,syncTouchLerp:u=.1,__iosNoInertiaSyncTouchLerp:p=.4,touchInertiaMultiplier:m=35,duration:f,easing:v=t=>Math.min(1,1.001-Math.pow(2,-10*t)),lerp:x=!f&&.1,infinite:g=!1,orientation:y="vertical",gestureOrientation:w="vertical",touchMultiplier:S=1,wheelMultiplier:j=1,normalizeWheel:b=!1,autoResize:N=!0}={}){this.onVirtualScroll=({deltaX:t,deltaY:e,event:s})=>{if(s.ctrlKey)return;let o=s.type.includes("touch"),r=s.type.includes("wheel");if("both"===this.options.gestureOrientation&&0===t&&0===e||"vertical"===this.options.gestureOrientation&&0===e||"horizontal"===this.options.gestureOrientation&&0===t||o&&"vertical"===this.options.gestureOrientation&&0===this.scroll&&!this.options.infinite&&e<=0)return;let l=s.composedPath();if((l=l.slice(0,l.indexOf(this.rootElement))).find(t=>{var e;return(null==t.hasAttribute?void 0:t.hasAttribute("data-lenis-prevent"))||o&&(null==t.hasAttribute?void 0:t.hasAttribute("data-lenis-prevent-touch"))||r&&(null==t.hasAttribute?void 0:t.hasAttribute("data-lenis-prevent-wheel"))||(null==(e=t.classList)?void 0:e.contains("lenis"))}))return;if(this.isStopped||this.isLocked)return void s.preventDefault();if(this.isSmooth=(this.options.smoothTouch||this.options.syncTouch)&&o||this.options.smoothWheel&&r,!this.isSmooth)return this.isScrolling=!1,void this.animate.stop();s.preventDefault();let n=e;"both"===this.options.gestureOrientation?n=Math.abs(e)>Math.abs(t)?e:t:"horizontal"===this.options.gestureOrientation&&(n=t);let a=o&&this.options.syncTouch,c=o&&"touchend"===s.type&&Math.abs(n)>1;c&&(n=this.velocity*this.options.touchInertiaMultiplier),this.scrollTo(this.targetScroll+n,i({programmatic:!1},a&&{lerp:c?this.syncTouchLerp:this.options.__iosNoInertiaSyncTouchLerp}))},this.onNativeScroll=()=>{if(!this.__preventNextScrollEvent&&!this.isScrolling){let t=this.animatedScroll;this.animatedScroll=this.targetScroll=this.actualScroll,this.velocity=0,this.direction=Math.sign(this.animatedScroll-t),this.emit()}},window.lenisVersion="1.0.29",t!==document.documentElement&&t!==document.body||(t=window),this.options={wrapper:t,content:e,wheelEventsTarget:s,eventsTarget:o,smoothWheel:c,smoothTouch:h,syncTouch:d,syncTouchLerp:u,__iosNoInertiaSyncTouchLerp:p,touchInertiaMultiplier:m,duration:f,easing:v,lerp:x,infinite:g,gestureOrientation:w,orientation:y,touchMultiplier:S,wheelMultiplier:j,normalizeWheel:b,autoResize:N},this.animate=new r,this.emitter=new n,this.dimensions=new l({wrapper:t,content:e,autoResize:N}),this.toggleClass("lenis",!0),this.velocity=0,this.isLocked=!1,this.isStopped=!1,this.isSmooth=d||c||h,this.isScrolling=!1,this.targetScroll=this.animatedScroll=this.actualScroll,this.options.wrapper.addEventListener("scroll",this.onNativeScroll,{passive:!1}),this.virtualScroll=new a(o,{touchMultiplier:S,wheelMultiplier:j,normalizeWheel:b}),this.virtualScroll.on("scroll",this.onVirtualScroll)}destroy(){this.emitter.destroy(),this.options.wrapper.removeEventListener("scroll",this.onNativeScroll,{passive:!1}),this.virtualScroll.destroy(),this.dimensions.destroy(),this.toggleClass("lenis",!1),this.toggleClass("lenis-smooth",!1),this.toggleClass("lenis-scrolling",!1),this.toggleClass("lenis-stopped",!1),this.toggleClass("lenis-locked",!1)}on(t,e){return this.emitter.on(t,e)}off(t,e){return this.emitter.off(t,e)}setScroll(t){this.isHorizontal?this.rootElement.scrollLeft=t:this.rootElement.scrollTop=t}resize(){this.dimensions.resize()}emit(){this.emitter.emit("scroll",this)}reset(){this.isLocked=!1,this.isScrolling=!1,this.animatedScroll=this.targetScroll=this.actualScroll,this.velocity=0,this.animate.stop()}start(){this.isStopped=!1,this.reset()}stop(){this.isStopped=!0,this.animate.stop(),this.reset()}raf(t){let e=t-(this.time||t);this.time=t,this.animate.advance(.001*e)}scrollTo(t,{offset:e=0,immediate:s=!1,lock:i=!1,duration:r=this.options.duration,easing:l=this.options.easing,lerp:n=!r&&this.options.lerp,onComplete:a=null,force:c=!1,programmatic:h=!0}={}){if(!this.isStopped&&!this.isLocked||c){if(["top","left","start"].includes(t))t=0;else if(["bottom","right","end"].includes(t))t=this.limit;else{var d;let s;if("string"==typeof t?s=document.querySelector(t):null!=(d=t)&&d.nodeType&&(s=t),s){if(this.options.wrapper!==window){let t=this.options.wrapper.getBoundingClientRect();e-=this.isHorizontal?t.left:t.top}let i=s.getBoundingClientRect();t=(this.isHorizontal?i.left:i.top)+this.animatedScroll}}if("number"==typeof t){if(t+=e,t=Math.round(t),this.options.infinite?h&&(this.targetScroll=this.animatedScroll=this.scroll):t=o(0,t,this.limit),s)return this.animatedScroll=this.targetScroll=t,this.setScroll(this.scroll),this.reset(),void(null==a||a(this));if(!h){if(t===this.targetScroll)return;this.targetScroll=t}this.animate.fromTo(this.animatedScroll,t,{duration:r,easing:l,lerp:n,onStart:()=>{i&&(this.isLocked=!0),this.isScrolling=!0},onUpdate:(t,e)=>{this.isScrolling=!0,this.velocity=t-this.animatedScroll,this.direction=Math.sign(this.velocity),this.animatedScroll=t,this.setScroll(this.scroll),h&&(this.targetScroll=t),e||this.emit(),e&&(this.reset(),this.emit(),null==a||a(this),this.__preventNextScrollEvent=!0,requestAnimationFrame(()=>{delete this.__preventNextScrollEvent}))}})}}}get rootElement(){return this.options.wrapper===window?document.documentElement:this.options.wrapper}get limit(){return this.dimensions.limit[this.isHorizontal?"x":"y"]}get isHorizontal(){return"horizontal"===this.options.orientation}get actualScroll(){return this.isHorizontal?this.rootElement.scrollLeft:this.rootElement.scrollTop}get scroll(){var t;return this.options.infinite?(this.animatedScroll%(t=this.limit)+t)%t:this.animatedScroll}get progress(){return 0===this.limit?1:this.scroll/this.limit}get isSmooth(){return this.__isSmooth}set isSmooth(t){this.__isSmooth!==t&&(this.__isSmooth=t,this.toggleClass("lenis-smooth",t))}get isScrolling(){return this.__isScrolling}set isScrolling(t){this.__isScrolling!==t&&(this.__isScrolling=t,this.toggleClass("lenis-scrolling",t))}get isStopped(){return this.__isStopped}set isStopped(t){this.__isStopped!==t&&(this.__isStopped=t,this.toggleClass("lenis-stopped",t))}get isLocked(){return this.__isLocked}set isLocked(t){this.__isLocked!==t&&(this.__isLocked=t,this.toggleClass("lenis-locked",t))}get className(){let t="lenis";return this.isStopped&&(t+=" lenis-stopped"),this.isLocked&&(t+=" lenis-locked"),this.isScrolling&&(t+=" lenis-scrolling"),this.isSmooth&&(t+=" lenis-smooth"),t}toggleClass(t,e){this.rootElement.classList.toggle(t,e),this.emitter.emit("className change",this)}}}},function(t){t.O(0,[99,413,115,326,394,566,410,111,971,472,744],function(){return t(t.s=99962)}),_N_E=t.O()}]);