import h from"./Carnet-927e87be.js";import C from"./CarnetSkeleton-b5c07ddc.js";import{d,p,o as f,c as l,u as r}from"./app-0a8aa8f6.js";import"./_plugin-vue_export-helper-c27b6911.js";class c{constructor(e,n,o,a,t,s,i,g){this.name=e.toLowerCase(),this.user=n,this.role=o,this.identification=a,this.primaryInfo=t.toLowerCase(),this.secondaryInfo=s.toLowerCase(),this.color=i,this.qrCode=g,this.image=this.getImage()}getImage(){return`https://siga.unibague.edu.co/sgacampus/images/dynamic/foto/1/${this.identification}/${this.identification}.jpg`}}class v{static createCarnet(e){let n=[];return e.forEach(o=>{let a=null;try{o.role==="Estudiante"&&(a=new c(o.name,o.user,"Estudiante",o.identification,o.currentProgram,"","#003D7C")),o.role==="Funcionario"&&(a=new c(o.name,o.user,"Funcionario",o.identification,o.department,o.position,"#FF5F2C")),o.role==="Graduado"&&(a=new c(o.name,o.user,"Graduado",o.identification,o.finishedProgram,"","#FFCC00")),o.role==="Egresado"&&(a=new c(o.name,o.user,"Egresado",o.identification,o.finishedProgram,"","#FFCC00")),a&&n.push(a)}catch(t){console.log("Error creando carnet",t,o)}}),n}}const F={__name:"CarnetContainer",props:{qrCode:String},setup(u){const e=d(!0),n=async()=>{const s=route("personalInfo");console.log(s);try{const i=await axios.get(s);return i.data.length===0?alert("El usuario no posee ningún carné activo o asociado, por favor comuníquese con g3@unibague.edu.co en dado caso de tener dudas"):(e.value=!1,i.data)}catch{return alert("Error interno del servidor, por favor intentelo más tarde")}},o=d([]);let a=d(0);p(async()=>{o.value=v.createCarnet(await n())});const t=()=>{a.value<o.value.length&&(a.value++,console.log(a)),a.value===o.value.length&&(a.value=0)};return(s,i)=>e.value?(f(),l(C,{key:0})):(f(),l(h,{key:1,image:o.value[r(a)].image,name:o.value[r(a)].name,user:o.value[r(a)].user,role:o.value[r(a)].role,identification:o.value[r(a)].identification,primaryInfo:o.value[r(a)].primaryInfo,secondaryInfo:o.value[r(a)].secondaryInfo,qrCode:u.qrCode,color:o.value[r(a)].color,onCambiarCarnet:t,showChangeButton:o.value.length>1},null,8,["image","name","user","role","identification","primaryInfo","secondaryInfo","qrCode","color","showChangeButton"]))}};export{F as default};