import{u as f,n as g,o as h,a as b,b as t,d as a,x as v,g as i,O as c}from"./app-34262ca5.js";import{_ as y,a as k,b as p,c as w,d as C,e as j,f as O,g as $}from"./SericultureComponent-5c638333.js";import"./QChip-022a315d.js";const x={class:"row justify-center"},B={class:"col-xs-12 col-md-9 col-xl-7",style:{"background-color":"white"}},_={class:"row justify-center q-gutter-md q-pt-md q-pb-md"},E={class:"col-xs-3 col-md-1"},S={class:"col-xs-3 col-md-1"},q={__name:"SupervisorApprovalPage",props:{basicInfo:Object,agriLand:[],additional:Object,horticulture:[],landWater:[],fisheries:[],husbandry:[],sericulture:[]},setup(o){const e=f(),s=g(""),l=n=>{e.dialog({dark:!0,title:"Confirm",message:"Approve Farmer?",cancel:!0,persistent:!0}).onOk(()=>{}).onOk(()=>{c.get(route("approve-farmer",n),{},{onStart:e.loading.show(),onSuccess:()=>{e.loading.hide(),e.notify({message:"Farmer Approved",closeBtn:!0,icon:"check",iconColor:"blue"})},onError:()=>{e.loading.hide(),e.notify({message:"Error Occured",closeBtn:!0,icon:"warning",iconColor:"red"})}})}).onCancel(()=>{}).onDismiss(()=>{})},d=n=>{e.dialog({dark:!0,title:"Rejection",message:"Rejection Reason",prompt:{model:s,type:"text"},cancel:!0,persistent:!0}).onOk(r=>{c.get(route("reject-farmer",n),{data:s.value},{onStart:()=>e.loading.show(),onSuccess:()=>{e.loading.hide(),e.notify({message:"Farmer Rejected",closeBtn:!0,icon:"warning",iconColor:"red"})},onError:()=>{e.loading.hide(),e.notify({message:"Error Occured",closeBtn:!0,icon:"warning",iconColor:"red"})},preserveState:!1})}).onCancel(()=>{}).onDismiss(()=>{})},u=()=>{e.notify({message:"Farmer already Approved",icon:"check",iconColor:"green",closeBtn:!0})};return(n,r)=>(h(),b("div",x,[t("div",B,[a(y,{"basic-info":o.basicInfo},null,8,["basic-info"]),a(k,{"agri-land":o.agriLand},null,8,["agri-land"]),a(p,{additional:o.additional},null,8,["additional"]),a(w,{horticulture:o.horticulture},null,8,["horticulture"]),a(C,{"land-water":o.landWater},null,8,["land-water"]),a(j,{fisheries:o.fisheries},null,8,["fisheries"]),a(O,{husbandry:o.husbandry},null,8,["husbandry"]),a($,{sericulture:o.sericulture},null,8,["sericulture"]),a(v),t("div",_,[t("div",E,[a(i,{outline:"",label:"REJECT",style:{color:"red"},onClick:r[0]||(r[0]=m=>d(o.basicInfo.id))})]),t("div",S,[a(i,{flat:"","text-color":"white",label:"APPROVE",style:{"background-color":"#588052"},onClick:r[1]||(r[1]=m=>o.basicInfo.verification==="Approved"?u():l(o.basicInfo.id))})])])])]))}};export{q as default};
