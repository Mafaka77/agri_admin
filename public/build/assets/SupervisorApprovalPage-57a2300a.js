import{u as h,n as b,o as s,a as c,b as t,d as a,x as v,Q as l,ai as y,O as d}from"./app-56650a3d.js";import{_ as k,a as p,b as C,c as w,d as j,e as O,f as $,g as x}from"./SericultureComponent-d9bb8a18.js";import"./QChip-8aedfb60.js";const B={class:"row justify-center"},E={class:"col-xs-12 col-md-9 col-xl-7",style:{"background-color":"white"}},A={key:0,class:"row justify-center q-gutter-md q-pt-md q-pb-md"},S={class:"col-xs-3 col-md-1"},_={class:"col-xs-3 col-md-1"},D={__name:"SupervisorApprovalPage",props:{basicInfo:Object,agriLand:[],additional:Object,horticulture:[],landWater:[],fisheries:[],husbandry:[],sericulture:[]},setup(o){const e=h(),i=b(""),u=r=>{e.dialog({dark:!0,title:"Confirm",message:"Approve Farmer?",cancel:!0,persistent:!0}).onOk(()=>{}).onOk(()=>{d.get(route("approve-farmer",r),{},{onStart:e.loading.show(),onSuccess:()=>{e.loading.hide(),e.notify({message:"Farmer Approved",closeBtn:!0,icon:"check",iconColor:"blue"})},onError:()=>{e.loading.hide(),e.notify({message:"Error Occured",closeBtn:!0,icon:"warning",iconColor:"red"})}})}).onCancel(()=>{}).onDismiss(()=>{})},m=r=>{e.dialog({dark:!1,title:"Rejection",message:"Rejection Reason",prompt:{model:i,type:"text"},cancel:!0,persistent:!0}).onOk(n=>{d.get(route("reject-farmer",r),{data:i.value},{onStart:()=>e.loading.show(),onSuccess:()=>{e.loading.hide(),e.notify({message:"Farmer Rejected",closeBtn:!0,icon:"warning",iconColor:"red"})},onError:()=>{e.loading.hide(),e.notify({message:"Error Occured",closeBtn:!0,icon:"warning",iconColor:"red"})},preserveState:!1})}).onCancel(()=>{}).onDismiss(()=>{})},f=()=>{e.notify({message:"Farmer already Approved",icon:"check",iconColor:"green",closeBtn:!0})};return(r,n)=>(s(),c("div",B,[t("div",E,[a(k,{"basic-info":o.basicInfo},null,8,["basic-info"]),a(p,{"agri-land":o.agriLand},null,8,["agri-land"]),a(C,{additional:o.additional},null,8,["additional"]),a(w,{horticulture:o.horticulture},null,8,["horticulture"]),a(j,{"land-water":o.landWater},null,8,["land-water"]),a(O,{fisheries:o.fisheries},null,8,["fisheries"]),a($,{husbandry:o.husbandry},null,8,["husbandry"]),a(x,{sericulture:o.sericulture},null,8,["sericulture"]),a(v),o.basicInfo.verification!="Approved"?(s(),c("div",A,[t("div",S,[a(l,{outline:"",label:"REJECT",style:{color:"red"},onClick:n[0]||(n[0]=g=>m(o.basicInfo.id))})]),t("div",_,[a(l,{flat:"","text-color":"white",label:"APPROVE",style:{"background-color":"#588052"},onClick:n[1]||(n[1]=g=>o.basicInfo.verification==="Approved"?f():u(o.basicInfo.id))})])])):y("",!0)])]))}};export{D as default};
