(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[530],{4894:function(e,t,o){Promise.resolve().then(o.bind(o,95005))},35371:function(e,t,o){"use strict";var a=o(57437),n=o(2265);o(16691);var s=o(28206);o(61396),t.Z=e=>{let[t,o]=(0,n.useState)(!1),[i,r]=(0,n.useState)(!1);function c(){r(!i)}return(0,a.jsx)(s.E.div,{initial:{opacity:0,y:50},animate:{opacity:1,y:0},transition:{duration:.5},children:(0,a.jsx)("div",{className:"items-center flex flex-col justify-center w-40 md:w-64 h-auto m-2 overflow-visible my-12 group relative cursor-pointer transition-all duration-200",onClick:function(){o(!t)},children:(0,a.jsxs)("div",{className:"m-2 h-full rounded-lg relative group-hover:opacity-100 justify-center items-center ",children:[(0,a.jsx)("img",{src:e.imagen,width:300,height:300,className:"group-hover:scale-125 transition-all duration-150 ease-out z-20 "}),(0,a.jsxs)("div",{className:"transition-all duration-300 ease-in-out transform group-hover:scale-100 group-hover:opacity-100 scale-0 opacity-0 text-center flex flex-col justify-center items-center ",href:"/",children:[i&&(0,a.jsx)("p",{className:"text-white text-xs md:text-md md:font-bold z-20 transition-all duration-200 absolute",onClick:c,children:e.descripcion}),(0,a.jsx)(s.E.p,{onClick:c,className:"text-white text-3xl md:text-5xl font-fuenteSoppelsa  rounded-xl w-1/2 z-20 absolute",variants:{open:{y:"100px",transition:{duration:.5}},closed:{y:"0px",transition:{duration:.5}}},animate:i?"open":"closed",children:e.nombre}),(0,a.jsx)("div",{onClick:c,style:{background:e.color},className:"absolute  rounded-full opacity-0 group-hover:opacity-70 transition-all p-20 md:p-32 z-0 ".concat(i?"scale-150 ":"")})]})]})})})}},95005:function(e,t,o){"use strict";o.r(t);var a=o(57437),n=o(2265);o(16691);var s=o(35371);t.default=()=>{let[e,t]=(0,n.useState)("sabores"),[o,i]=(0,n.useState)("none"),[r,c]=(0,n.useState)("none"),[l,d]=(0,n.useState)([]),[u,x]=(0,n.useState)([]);(0,n.useEffect)(()=>{(async function(){let e=await fetch("/Json/productos.json",{next:{revalidate:5}}),t=await e.json();d(t)})()},[]),(0,n.useEffect)(()=>{(async function(){let e=await fetch("/Json/sabores.json",{next:{revalidate:5}}),t=await e.json();x(t)})()},[]);let[m,p]=(0,n.useState)([]);(0,n.useEffect)(()=>{!async function(){let e=await fetch("/Json/categorias_productos.json",{next:{revalidate:5}}),t=await e.json();p(t)}()},[]);let[f,h]=(0,n.useState)([]);(0,n.useEffect)(()=>{!async function(){let e=await fetch("/Json/categorias_sabores.json",{next:{revalidate:5}}),t=await e.json();h(t)}()},[]);let[b,j]=(0,n.useState)([]);(0,n.useEffect)(()=>{!async function(){let e=await fetch("/Json/categoriasIproductos.json",{next:{revalidate:5}}),t=await e.json();j(t)}()},[]);let[g,w]=(0,n.useState)([]);return(0,n.useEffect)(()=>{(async function(){let e=await fetch("/Json/categoriasIsabores.json",{next:{revalidate:5}}),t=await e.json();w(t)})()},[]),(0,a.jsxs)("div",{className:"w-full bg-white flex-col text-center h-auto overflow-hidden pb-32",children:[(0,a.jsx)("h1",{className:"text-7xl text-[#d22730] mt-4 font-fuenteSoppelsa pt-16",children:"Nuestros productos"}),(0,a.jsxs)("div",{className:"flex flex-wrap text-center space-x-4 justify-center ",children:[(0,a.jsxs)("div",{className:"h-44",children:[(0,a.jsx)("h2",{className:"".concat("sabores"===e?"scale-110":""," text-sm md:text-2xl font-fuenteSoppelsaImprenta rounded-lg text-[#d22730] w-max md:w-24 lg:w-48 p-2 text-center mt-24 transition-all duration-300 cursor-pointer hover:scale-110"),onClick:()=>{t("sabores"),c("none")},children:"Sabores"}),(0,a.jsx)("div",{className:"flex flex-col text-center items-center  ",children:(0,a.jsx)("div",{className:"".concat("sabores"===e?"bg-[#d22730] p-1 w-1/2 scale-110 rounded-full":" "," transition-all scale-0 ")})})]}),(0,a.jsxs)("div",{className:"h-44 relative",children:[(0,a.jsx)("h2",{className:"".concat("productos"===e?"scale-110":""," text-sm md:text-2xl font-fuenteSoppelsaImprenta rounded-lg text-[#d22730] w-max md:w-24 lg:w-48 p-2 text-center mt-24 transition-all duration-300 cursor-pointer hover:scale-110"),onClick:()=>{t("productos"),i("none")},children:"Productos"}),(0,a.jsx)("div",{className:"flex flex-col text-center items-center  ",children:(0,a.jsx)("div",{className:"".concat("productos"===e?"bg-[#d22730] p-1 w-1/2 scale-110 rounded-full":" "," transition-all scale-0 ")})})]}),(0,a.jsxs)("div",{className:"h-44",children:[(0,a.jsx)("h2",{className:"".concat("otros"===e?"scale-110":""," text-sm md:text-2xl font-fuenteSoppelsaImprenta rounded-lg text-[#d22730] w-max md:w-24 lg:w-48 p-2 text-center mt-24 transition-all duration-300 cursor-pointer hover:scale-110"),onClick:()=>{t("otros")},children:"Cafeter\xeda"}),(0,a.jsx)("div",{className:"flex flex-col text-center items-center  ",children:(0,a.jsx)("div",{className:"".concat("otros"===e?"bg-[#d22730] p-1 w-1/2 scale-110 rounded-full":" "," transition-all scale-0 ")})})]})]}),"productos"===e?(0,a.jsx)("div",{className:"justify-center flex-wrap flex my-2 ",children:m.map(e=>(0,a.jsx)("h1",{className:"text-xs md:text-lg mt-2 font-bold rounded-lg text-red-400 w-max md:w-24 lg:w-48 p-2 text-center bg-black bg-opacity-10 mx-4 transition-all duration-300 cursor-pointer hover:scale-105 \n                    ".concat(e.id==o?"scale-110 bg-opacity-70 bg-red-300 text-white":"","\n                    \n                    "),onClick:()=>i(e.id),children:e.nombre},e.id))}):null,"sabores"===e?(0,a.jsx)("div",{className:" justify-center flex-wrap flex my-2",children:f.map(e=>(0,a.jsx)("h1",{className:"text-xs md:text-lg mt-2 font-bold rounded-lg text-red-400 w-max md:w-24 lg:w-48 p-2 text-center bg-black bg-opacity-10 mx-4 transition-all duration-300 cursor-pointer hover:scale-105 \n                    ".concat(e.id==r?"scale-110 bg-opacity-70 bg-red-300 text-white":"","\n                    \n                    "),onClick:()=>c(e.id),children:e.nombre},e.id))}):null,(0,a.jsxs)("div",{className:"flex flex-wrap w-full items-center justify-center mt-16",children:["sabores"===e&&("none"===r?u.map(e=>(0,a.jsx)(s.Z,{nombre:e.nombre,imagen:e.imagen,descripcion:e.descripcion,id:e.id,color:e.color,tipo:"Sabores"},e.id)):g.filter(e=>e.idCategoria===r).map(e=>{let t=u.find(t=>t.id===e.idSabor);return t?(0,a.jsx)(s.Z,{nombre:t.nombre,imagen:t.imagen,descripcion:t.descripcion,id:t.id,color:t.color,tipo:"Sabores"},t.id):null})),"productos"===e&&("none"===o?l.map(e=>(0,a.jsx)(s.Z,{nombre:e.nombre,imagen:e.imagen,descripcion:e.descripcion,id:e.id,color:e.color,tipo:"Producto"},e.id)):b.filter(e=>e.idCategoria===o).map(e=>{let t=l.find(t=>t.id===e.idProducto);return t?(0,a.jsx)(s.Z,{nombre:t.nombre,imagen:t.imagen,descripcion:t.descripcion,id:t.id,color:t.color,tipo:"Producto"},t.id):null})),"otros"===e&&l.map(e=>(0,a.jsx)(s.Z,{nombre:e.nombre,imagen:e.imagen,descripcion:e.descripcion,id:e.id,color:e.color,tipo:"Producto"},e.id))]})]})}},61396:function(e,t,o){e.exports=o(68326)}},function(e){e.O(0,[413,115,326,971,472,744],function(){return e(e.s=4894)}),_N_E=e.O()}]);