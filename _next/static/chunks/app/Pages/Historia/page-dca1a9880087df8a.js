(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[929],{69337:(e,t,r)=>{Promise.resolve().then(r.bind(r,20116))},67396:(e,t,r)=>{"use strict";r.d(t,{default:()=>n.a});var s=r(44839),n=r.n(s)},20116:(e,t,r)=>{"use strict";r.r(t),r.d(t,{default:()=>x});var s=r(95155),n=r(12115),l=r(29127);let i={some:0,all:1};var o=r(73208);r(5565);let a=e=>{let{imagen:t,descripcion:r,titulo:n}=e;return(0,s.jsxs)("div",{className:"rounded-lg h-auto w-fulls md:w-1/2 lg:w-1/2 mx-4 my-10 group overflow-hidden hover:scale-110 ".concat(t," bg-center bg-cover transition-transform cursor-pointer hover:bg-white shadow-xl"),style:{backgroundImage:"url('".concat(t,"')")},children:[(0,s.jsx)("div",{className:"h-60 group-hover:bg-white transition-colors duration-300 rounded-t-lg",children:(0,s.jsxs)("div",{className:"opacity-0 group-hover:opacity-100 transition-opacity duration-500",children:[(0,s.jsx)("h1",{className:"font-fuenteSoppelsaImprenta text-sm md:text-xl pt-2 text-[#d22730]",children:n}),(0,s.jsx)("ul",{className:"justify-start items-start font-semibold text-xs md:text-sm lg:text-md",children:(0,s.jsxs)("li",{children:[" ",(0,s.jsx)("h2",{className:" text-black m-2 self-start text-left",children:r})]})})]})}),(0,s.jsx)("div",{className:"text-black bg-white h-full rounded-b-lg pb-2 group-hover:opacity-0  group-hover:-translate-y-16 transition-all duration-300",children:(0,s.jsx)("div",{className:"transition duration-200",children:(0,s.jsx)("h1",{className:"font-fuenteSoppelsaImprenta  text-xl  md:text-3xl pt-2 text-[#d22730]",children:n})})})]})};var c=r(19752);let d=()=>(0,s.jsxs)("div",{className:"rounded-lg h-auto w-full md:w-1/3 lg:w-1/4 m-11 group overflow-hidden hover:scale-110 bg-center bg-cover transition-transform cursor-pointer bg-white/40 shadow-xl",children:[(0,s.jsx)("div",{className:"h-60 group-hover:bg-white transition-colors duration-300 rounded-t-lg",children:(0,s.jsxs)("div",{className:"opacity-0 group-hover:opacity-100 transition-opacity duration-500",children:[(0,s.jsx)("h1",{className:"font-fuenteSoppelsaImprenta text-sm md:text-xl pt-2 text-[#d22730] skeleton h-6 w-1/2 mx-auto"}),(0,s.jsx)("ul",{className:"justify-start items-start font-semibold text-xs md:text-sm lg:text-md",children:(0,s.jsxs)("li",{children:[(0,s.jsx)("h2",{className:"skeleton h-4 w-3/4 m-2 self-start text-left"}),(0,s.jsx)("h2",{className:"skeleton h-4 w-2/3 m-2 self-start text-left"})]})})]})}),(0,s.jsx)("div",{className:"text-black bg-white h-full rounded-b-lg pb-2 group-hover:opacity-0 group-hover:-translate-y-16 transition-all duration-300",children:(0,s.jsx)("div",{className:"transition duration-200",children:(0,s.jsx)("h1",{className:"font-fuenteSoppelsaImprenta text-xl md:text-3xl pt-2 text-[#d22730] skeleton h-8 w-3/4 mx-auto"})})})]}),u=()=>{(0,n.useEffect)(()=>{window.scrollTo(0,0)},[]),(0,n.useEffect)(()=>{(async()=>{new(await r.e(110).then(r.bind(r,69110))).default({el:document.querySelector("[data-scroll-container]"),smooth:!0,direction:"horizontal"})})()},[]);let{data:e,loading:t}=(0,c.O)("/Json/historia.json"),{data:u}=(0,c.O)("/Json/fondos.json"),f=null==u?void 0:u.fondoHistoria,h={hidden:{opacity:0,x:200},visible:{opacity:1,x:0,transition:{duration:.5}}};function m(e){let{historia:t}=e,r=(0,n.useRef)(null),c=function(e,{root:t,margin:r,amount:s,once:o=!1}={}){let[a,c]=(0,n.useState)(!1);return(0,n.useEffect)(()=>{if(!e.current||o&&a)return;let n={root:t&&t.current||void 0,margin:r,amount:s};return function(e,t,{root:r,margin:s,amount:n="some"}={}){let o=(0,l.K)(e),a=new WeakMap,c=new IntersectionObserver(e=>{e.forEach(e=>{let r=a.get(e.target);if(!!r!==e.isIntersecting){if(e.isIntersecting){let r=t(e);"function"==typeof r?a.set(e.target,r):c.unobserve(e.target)}else r&&(r(e),a.delete(e.target))}})},{root:r,rootMargin:s,threshold:"number"==typeof n?n:i[n]});return o.forEach(e=>c.observe(e)),()=>c.disconnect()}(e.current,()=>(c(!0),o?void 0:()=>c(!1)),n)},[t,e,r,o]),a}(r,{once:!1,threshold:.1});return(0,s.jsx)(o.P.div,{ref:r,initial:"hidden",animate:c?"visible":"hidden",variants:h,className:"flex items-center justify-center",children:(0,s.jsx)(a,{descripcion:t.descripcion,imagen:t.imagen,titulo:t.titulo})})}let x=[1,2,3,4,5];return(0,s.jsx)("div",{className:"pt-16  bg-cover bg-center bg-fixed flex flex-col justify-center text-center text-4xl w-full text-white relative overflow-hidden",style:{backgroundImage:"url('".concat(f,"')")},children:(0,s.jsx)("div",{className:"bg-black bg-opacity-80 h-auto rounded-3xl pt-24 flex ",children:t?(0,s.jsx)("div",{className:"flex flex-col items-center",children:null==x?void 0:x.map(()=>(0,s.jsx)(d,{}))}):(0,s.jsx)("div",{className:"flex flex-col w-full  items-center justify-center ",children:null==e?void 0:e.map(e=>(0,s.jsx)(m,{historia:e},e.id))})})})};var f=r(79212),h=r(55770),m=r(38046);let x=function(){return(0,n.useEffect)(()=>{window.scrollTo(0,0)},[]),(0,s.jsxs)(s.Fragment,{children:[(0,s.jsx)(m.A,{texto:"Estas son nuestras historias",descripcion:""}),(0,s.jsxs)("div",{children:[(0,s.jsx)(f.default,{}),(0,s.jsx)(u,{}),(0,s.jsx)(h.default,{})]})]})}},38046:(e,t,r)=>{"use strict";r.d(t,{A:()=>i});var s=r(95155);r(12115);var n=r(74247),l=r(73208);r(5565);let i=e=>{let{texto:t,descripcion:r}=e;return(0,s.jsx)(n.N,{children:(0,s.jsx)(l.P.div,{className:"flex items-center justify-center h-screen bg-red-500  overflow-hidden text-center fixed inset-0 z-50",style:{zIndex:500},initial:{y:0},animate:{y:-1e3},exit:{y:-1e3},transition:{type:"spring",stiffness:10,duration:2},children:(0,s.jsxs)("div",{className:"text-white font-fuenteSoppelsa text-5xl flex flex-col items-center justify-center",children:[(0,s.jsx)("img",{src:"/Sospelsas.png",alt:"",className:"w-52 h-52"}),(0,s.jsx)("h1",{children:t}),(0,s.jsx)("h2",{children:r}),(0,s.jsx)("span",{className:"loading loading-dots loading-lg bg-white"})]})})})}},74247:(e,t,r)=>{"use strict";r.d(t,{N:()=>p});var s=r(12115),n=r(35403);function l(){let e=(0,s.useRef)(!1);return(0,n.E)(()=>(e.current=!0,()=>{e.current=!1}),[]),e}var i=r(78086),o=r(39656),a=r(99234);class c extends s.Component{getSnapshotBeforeUpdate(e){let t=this.props.childRef.current;if(t&&e.isPresent&&!this.props.isPresent){let e=this.props.sizeRef.current;e.height=t.offsetHeight||0,e.width=t.offsetWidth||0,e.top=t.offsetTop,e.left=t.offsetLeft}return null}componentDidUpdate(){}render(){return this.props.children}}function d({children:e,isPresent:t}){let r=(0,s.useId)(),n=(0,s.useRef)(null),l=(0,s.useRef)({width:0,height:0,top:0,left:0});return(0,s.useInsertionEffect)(()=>{let{width:e,height:s,top:i,left:o}=l.current;if(t||!n.current||!e||!s)return;n.current.dataset.motionPopId=r;let a=document.createElement("style");return document.head.appendChild(a),a.sheet&&a.sheet.insertRule(`
          [data-motion-pop-id="${r}"] {
            position: absolute !important;
            width: ${e}px !important;
            height: ${s}px !important;
            top: ${i}px !important;
            left: ${o}px !important;
          }
        `),()=>{document.head.removeChild(a)}},[t]),s.createElement(c,{isPresent:t,childRef:n,sizeRef:l},s.cloneElement(e,{ref:n}))}let u=({children:e,initial:t,isPresent:r,onExitComplete:n,custom:l,presenceAffectsLayout:i,mode:c})=>{let u=(0,a.M)(f),h=(0,s.useId)(),m=(0,s.useMemo)(()=>({id:h,initial:t,isPresent:r,custom:l,onExitComplete:e=>{for(let t of(u.set(e,!0),u.values()))if(!t)return;n&&n()},register:e=>(u.set(e,!1),()=>u.delete(e))}),i?void 0:[r]);return(0,s.useMemo)(()=>{u.forEach((e,t)=>u.set(t,!1))},[r]),s.useEffect(()=>{r||u.size||!n||n()},[r]),"popLayout"===c&&(e=s.createElement(d,{isPresent:r},e)),s.createElement(o.t.Provider,{value:m},e)};function f(){return new Map}var h=r(64710),m=r(65749);let x=e=>e.key||"",p=({children:e,custom:t,initial:r=!0,onExitComplete:o,exitBeforeEnter:a,presenceAffectsLayout:c=!0,mode:d="sync"})=>{var f;(0,m.V)(!a,"Replace exitBeforeEnter with mode='wait'");let p=(0,s.useContext)(h.L).forceRender||function(){let e=l(),[t,r]=(0,s.useState)(0),n=(0,s.useCallback)(()=>{e.current&&r(t+1)},[t]);return[(0,s.useCallback)(()=>i.Gt.postRender(n),[n]),t]}()[0],v=l(),g=function(e){let t=[];return s.Children.forEach(e,e=>{(0,s.isValidElement)(e)&&t.push(e)}),t}(e),j=g,y=(0,s.useRef)(new Map).current,w=(0,s.useRef)(j),b=(0,s.useRef)(new Map).current,E=(0,s.useRef)(!0);if((0,n.E)(()=>{E.current=!1,function(e,t){e.forEach(e=>{let r=x(e);t.set(r,e)})}(g,b),w.current=j}),f=()=>{E.current=!0,b.clear(),y.clear()},(0,s.useEffect)(()=>()=>f(),[]),E.current)return s.createElement(s.Fragment,null,j.map(e=>s.createElement(u,{key:x(e),isPresent:!0,initial:!!r&&void 0,presenceAffectsLayout:c,mode:d},e)));j=[...j];let N=w.current.map(x),k=g.map(x),R=N.length;for(let e=0;e<R;e++){let t=N[e];-1!==k.indexOf(t)||y.has(t)||y.set(t,void 0)}return"wait"===d&&y.size&&(j=[]),y.forEach((e,r)=>{if(-1!==k.indexOf(r))return;let n=b.get(r);if(!n)return;let l=N.indexOf(r),i=e;i||(i=s.createElement(u,{key:x(n),isPresent:!1,onExitComplete:()=>{y.delete(r);let e=Array.from(b.keys()).filter(e=>!k.includes(e));if(e.forEach(e=>b.delete(e)),w.current=g.filter(t=>{let s=x(t);return s===r||e.includes(s)}),!y.size){if(!1===v.current)return;p(),o&&o()}},custom:t,presenceAffectsLayout:c,mode:d},n),y.set(r,i)),j.splice(l,0,i)}),j=j.map(e=>{let t=e.key;return y.has(t)?e:s.createElement(u,{key:x(e),isPresent:!0,presenceAffectsLayout:c,mode:d},e)}),s.createElement(s.Fragment,null,y.size?j:j.map(e=>(0,s.cloneElement)(e)))}},29127:(e,t,r)=>{"use strict";r.d(t,{K:()=>n});var s=r(65749);function n(e,t,r){var n;if("string"==typeof e){let l=document;t&&((0,s.V)(!!t.current,"Scope provided, but no element detected."),l=t.current),r?(null!==(n=r[e])&&void 0!==n||(r[e]=l.querySelectorAll(e)),e=r[e]):e=l.querySelectorAll(e)}else e instanceof Element&&(e=[e]);return Array.from(e||[])}}},e=>{var t=t=>e(e.s=t);e.O(0,[970,28,839,983,441,517,358],()=>t(69337)),_N_E=e.O()}]);