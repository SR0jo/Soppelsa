(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[688],{72950:function(){},22868:function(){},14777:function(){},99830:function(){},70209:function(){},19579:function(e,r,a){Promise.resolve().then(a.bind(a,16524))},16524:function(e,r,a){"use strict";a.r(r),a.d(r,{default:function(){return n}});var t=a(57437),s=a(2265),o=a(94599);function l(){(0,s.useEffect)(()=>{window.scrollTo(0,0)},[]);let[e,r]=(0,s.useState)(null);(0,s.useEffect)(()=>{let e=window.localStorage.getItem("Id");console.log("".concat(e," Esta es la ID: ")),"1"===e?r("Quiero comprar/vender al por mayor"):"2"===e?r("Quiero contratar servicios de soppelsa"):"3"===e?r("Quiero mi franquicia soppelsa"):"4"===e?r("Quiero hacer una visita guiada a la f\xe1brica"):e=null},[]);let[a,l]=(0,s.useState)({}),[n,c]=(0,s.useState)(null),[i,p]=(0,s.useState)(!1),[u,d]=(0,s.useState)(!1),[f,m]=(0,s.useState)(!1),x=e=>{l({...a,[e.target.name]:e.target.value})},[b,h]=(0,o.cI)("mrgnbbbq");return b.succeeded?(0,t.jsx)("div",{className:"items-center justify-center flex flex-col",children:(0,t.jsxs)("p",{className:"mt-96 mb-96 p-5 bg-green-700 text-white flex flex-col justify-center items-center rounded-",children:["\xa1Recibimos tu solicitud!"," ",(0,t.jsx)("span",{children:" En breve nos pondremos en contacto."})]})}):b.errors?(0,t.jsx)("div",{className:"items-center justify-center flex flex-col",children:(0,t.jsxs)("p",{className:"mt-96 mb-96 p-5 bg-red-700 text-white flex flex-col justify-center items-center rounded-",children:["Hubo un problema. ",(0,t.jsx)("span",{children:" Intenta reenviar el formulario."})]})}):(0,t.jsx)("div",{className:"pt-32 pb-24 mx-4 bg-white",children:(0,t.jsxs)("form",{className:"max-w-md mx-auto",onSubmit:h,action:"https://formspree.io/f/mrgnbbbq",method:"POST",children:[(0,t.jsxs)("div",{className:"relative z-0 w-full mb-5 group",children:[(0,t.jsxs)("select",{name:"Motivo",id:"Motivo",className:"block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 decoration-0 focus:outline-none focus:ring-0 focus:border-[#d22730] ",required:!0,onChange:a=>{r(a.target.value),console.log(e)},value:e,children:[(0,t.jsx)("option",{value:""}),(0,t.jsx)("option",{value:"Quiero comprar/vender al por mayor",children:"Quiero comprar/vender al por mayor"}),(0,t.jsx)("option",{value:"Quiero contratar servicios de soppelsa",children:"Quiero contratar servicios de soppelsa"}),(0,t.jsx)("option",{value:"Quiero mi franquicia soppelsa",children:"Quiero mi franquicia soppelsa"}),(0,t.jsx)("option",{value:"Quiero hacer una visita guiada a la f\xe1brica",children:"Quiero hacer una visita guiada a la f\xe1brica"})]}),(0,t.jsx)("label",{for:"Motivo",className:"peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#d22730]  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6",children:"Motivo"})]}),(0,t.jsxs)("div",{className:"relative z-0 w-full mb-5 group",children:[(0,t.jsx)("input",{type:"email",name:"Correo electr\xf3nico del interesado:",id:"Correo electr\xf3nico del interesado:",className:"block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-[#d22730] peer",placeholder:" ",required:!0,onChange:x}),(0,t.jsx)("label",{for:"Correo electr\xf3nico del interesado:",className:"peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-[#d22730]  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6",children:"Direccion de correo"})]}),(0,t.jsxs)("div",{className:"grid md:grid-cols-2 md:gap-6",children:[(0,t.jsxs)("div",{className:"relative z-0 w-full mb-5 group",children:[(0,t.jsx)("input",{type:"text",name:"Nombre:",id:"Nombre:",className:"block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#d22730] peer",placeholder:" ",required:!0,onChange:x}),(0,t.jsx)("label",{for:"Nombre:",className:"peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#d22730]  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6",children:"Nombre"})]}),(0,t.jsxs)("div",{className:"relative z-0 w-full mb-5 group",children:[(0,t.jsx)("input",{type:"text",name:"Apellido:",id:"Apellido:",className:"block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-[#d22730] peer",placeholder:" ",required:!0,onChange:x}),(0,t.jsx)("label",{for:"Apellido:",className:"peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#d22730] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6",children:"Apellido"})]})]}),(0,t.jsxs)("div",{className:"grid md:grid-cols-2 md:gap-6",children:[(0,t.jsxs)("div",{className:"relative z-0 w-full mb-5 group",children:[(0,t.jsx)("input",{type:"tel",pattern:"+[0-9]{12}",name:"Tel\xe9fono:",id:"Tel\xe9fono:",className:"block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-[#d22730] peer",placeholder:" ",onChange:x}),(0,t.jsx)("label",{for:"Tel\xe9fono:",className:"peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#d22730]  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6",children:"N\xfamero de tel\xe9fono (+54 261...)"})]}),(0,t.jsxs)("div",{className:"relative z-0 w-full mb-5 group",children:[(0,t.jsx)("input",{type:"text",name:"Empresa:",id:"Empresa:",className:"block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-[#d22730] peer",placeholder:" ",onChange:x}),(0,t.jsx)("label",{for:"Empresa:",className:"peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#d22730]  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6",children:"Empresa (Opcional)"})]})]}),"Quiero mi franquicia soppelsa"===e?(0,t.jsxs)("div",{children:[(0,t.jsxs)("div",{className:"relative z-0 w-full mb-5 group",children:[(0,t.jsx)("input",{type:"text",name:"Raz\xf3n: ",id:"Raz\xf3n: ",className:"block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-[#d22730] peer",placeholder:" ",onChange:x}),(0,t.jsx)("label",{for:"Raz\xf3n: ",className:"peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#d22730]  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6",children:"Razon social (Opcional)"})]}),(0,t.jsxs)("div",{className:"relative z-0 w-full mb-5 group",children:[(0,t.jsx)("input",{type:"text",name:"Localidad: ",id:"Localidad:",className:"block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-[#d22730] peer",placeholder:" ",onChange:x}),(0,t.jsx)("label",{for:"Localidad:",className:"peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#d22730]  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6",children:"\xbfPosee local? \xbfD\xf3nde? (Opcional)"})]})]}):"Quiero contratar servicios de soppelsa"===e?(0,t.jsxs)("div",{children:[(0,t.jsxs)("div",{className:"relative z-0 w-full mb-5 group",children:[(0,t.jsx)("input",{type:"text",name:"Direcci\xf3n: ",id:"Direcci\xf3n:",className:"block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-[#d22730] peer",placeholder:" ",required:!0,onChange:x}),(0,t.jsx)("label",{for:"Direcci\xf3n:",className:"peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#d22730]  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6",children:"Domicilio o localidad"})]}),(0,t.jsxs)("div",{className:"relative z-0 w-full mb-5 group",children:[(0,t.jsx)("input",{type:"text",name:"Tipo: ",id:"Tipo: ",className:"block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-[#d22730] peer",placeholder:" ",required:!0,onChange:x}),(0,t.jsx)("label",{for:"Tipo: ",className:"peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#d22730]  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6",children:"Tipo de evento"})]}),(0,t.jsxs)("div",{className:"relative z-0 w-full mb-5 group",children:[(0,t.jsx)("input",{type:"Fecha: ",name:"Fecha: ",id:"Fecha:",className:"block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-[#d22730] peer",placeholder:" ",required:!0,onChange:x}),(0,t.jsx)("label",{for:"Fecha: ",className:"peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#d22730]  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6",children:"Fecha del evento"})]})]}):"Quiero comprar/vender al por mayor"===e?(0,t.jsxs)("div",{children:[(0,t.jsxs)("div",{className:"relative z-0 w-full mb-5 group",children:[(0,t.jsx)("input",{type:"text",name:"Localidad:",id:"Localidad:",className:"block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-[#d22730] peer",placeholder:" ",onChange:x}),(0,t.jsx)("label",{for:"Localidad:",className:"peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#d22730]  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6",children:"Domicilio o localidad"})]}),(0,t.jsxs)("div",{className:"relative z-0 w-full mb-5 group",children:[(0,t.jsx)("input",{type:"text",name:"Raz\xf3n:",id:"Raz\xf3n:",className:"block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-[#d22730] peer",placeholder:" ",onChange:x}),(0,t.jsx)("label",{for:"Raz\xf3n:",className:"peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#d22730]  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6",children:"Raz\xf3n social"})]}),(0,t.jsxs)("div",{className:"relative z-0 w-full mb-5 group",children:[(0,t.jsx)("input",{type:"text",name:"Rubro:",id:"Rubro:",className:"block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-[#d22730] peer",placeholder:" ",required:!0,onChange:x}),(0,t.jsx)("label",{for:"Rubro:",className:"peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#d22730]  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6",children:"Rubro"})]})]}):"Quiero hacer una visita guiada a la f\xe1brica"===e?(0,t.jsxs)("div",{children:[(0,t.jsxs)("div",{className:"relative z-0 w-full mb-5 group",children:[(0,t.jsx)("input",{type:"text",name:"Localidad:",id:"Localidad:",className:"block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-[#d22730] peer",placeholder:" ",onChange:x}),(0,t.jsx)("label",{for:"Localidad:",className:"peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#d22730]  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6",children:"Domicilio o localidad"})]}),(0,t.jsxs)("div",{className:"relative z-0 w-full mb-5 group",children:[(0,t.jsx)("input",{type:"text",name:"Institucion:",id:"Institucion:",className:"block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-[#d22730] peer",placeholder:" ",required:!0,onChange:x}),(0,t.jsx)("label",{for:"Institucion:",className:"peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#d22730]  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6",children:"Instituci\xf3n"})]}),(0,t.jsxs)("div",{className:"relative z-0 w-full mb-5 group",children:[(0,t.jsx)("input",{type:"text",name:"Participantes:",id:"Participantes:",className:"block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-[#d22730] peer",placeholder:" ",required:!0,onChange:x}),(0,t.jsx)("label",{for:"Participantes:",className:"peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#d22730]  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6",children:"Cantidad de participantes"})]})]}):null,(0,t.jsxs)("div",{className:"relative z-0 w-full mb-5 group justify-center text-center items-center",children:[(0,t.jsx)("label",{for:"Mensaje del emisor:",className:"justify-center text-center items-center text-gray-500 ",children:"Mensaje (opcional)"}),(0,t.jsx)("textarea",{name:"Mensaje del emisor:",id:"Mensaje del emisor:",className:"block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border rounded-md border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-[#d22730] peer mt-4",placeholder:"",onChange:x})]}),(0,t.jsx)("button",{disabled:b.submitting,type:"submit",className:"text-white bg-[#d22730] hover:bg-red-500 hover:scale-105 transition-transform focus:ring-4 focus:outline-none focus:ring-[#d22730] font-medium rounded-lg text-sm w-full  px-5 py-2.5 text-center items-center ",children:"Enviar"})]})})}a(90489),a(71549);var n=function(){return(0,s.useEffect)(()=>{window.scrollTo(0,0)},[]),(0,t.jsx)("div",{className:"bg-white",children:(0,t.jsx)(l,{})})}}},function(e){e.O(0,[147,971,472,744],function(){return e(e.s=19579)}),_N_E=e.O()}]);