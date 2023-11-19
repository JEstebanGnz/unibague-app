import{_ as g}from"./MainLayout-d9c8d406.js";import{o,e as l,a as c,t as y,F as p,b as s,O as _,K as k,k as N,w as x,h,c as d,f as m}from"./app-58547c80.js";const w=["src"],S={class:"text-black text-xl xl:text-2xl font-bold text-center truncate mt-2"},u={__name:"Module",props:{moduleName:String,icon:String},emits:["handleClick"],setup(n,{emit:r}){return(t,i)=>(o(),l(p,null,[c("div",{onClick:i[0]||(i[0]=e=>t.$emit("handleClick")),class:"w-2/3 mx-auto cursor-pointer aspect-square bg-white rounded-2xl shadow-xl backdrop-blur-sm p-3 sm:p-8 md:p-6 justify-center flex align-center"},[c("img",{class:"object-contain",src:n.icon,width:"200",alt:""},null,8,w)]),c("div",S,y(n.moduleName),1)],64))}},f={__name:"ComplexRedirect",props:{payload:String,moduleName:String,icon:String},setup(n){const t=JSON.parse(n.payload),i=()=>{let a=navigator.userAgent||navigator.vendor||window.opera;return/windows phone/i.test(a)?"Windows Phone":/android/i.test(a)?"Android":/iPad|iPhone|iPod/.test(a)&&!window.MSStream?"iOS":"unknown"},e=()=>{const a=i();a==="iOS"?window.open(t.IOSLink,"_blank"):a==="Android"?window.open(t.androidLink,"_blank"):a==="unknown"&&window.open(t.defaultLink,"_blank")};return(a,$)=>(o(),l("div",null,[s(u,{moduleName:n.moduleName,icon:n.icon,onHandleClick:e},null,8,["moduleName","icon"])]))}},b={__name:"InternalRedirect",props:{payload:String,moduleName:String,icon:String},setup(n){const t=JSON.parse(n.payload),i=()=>{_.visit(`${t.link}`,{method:"get"})};return(e,a)=>(o(),l("div",null,[s(u,{moduleName:n.moduleName,icon:n.icon,onHandleClick:i},null,8,["moduleName","icon"])]))}},v={__name:"SimpleRedirect",props:{payload:String,moduleName:String,icon:String},setup(n){const t=JSON.parse(n.payload),i=()=>{window.open(t.link,"_blank")};return(e,a)=>(o(),l("div",null,[s(u,{moduleName:n.moduleName,icon:n.icon,onHandleClick:i},null,8,["moduleName","icon"])]))}},C={class:"h-screen"},O={class:"grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 w-full gap-x-8 gap-y-10 py-6 px-5 items-center place-items-center md:px-16"},B={__name:"Dashboard",props:{modules:Array},setup(n){const r=k();return N(()=>r.props.auth.user),(t,i)=>(o(),l("div",C,[s(g,null,{default:x(()=>[c("div",O,[(o(!0),l(p,null,h(n.modules,e=>(o(),l(p,null,[e.type==="ExternalComplexRedirect"?(o(),d(f,{key:0,moduleName:e.name,icon:e.icon,payload:e.payload},null,8,["moduleName","icon","payload"])):m("",!0),e.type==="InternalRedirect"?(o(),d(b,{key:1,moduleName:e.name,icon:e.icon,payload:e.payload},null,8,["moduleName","icon","payload"])):m("",!0),e.type==="ExternalSimpleRedirect"?(o(),d(v,{key:2,moduleName:e.name,icon:e.icon,payload:e.payload},null,8,["moduleName","icon","payload"])):m("",!0)],64))),256))])]),_:1})]))}};export{B as default};
