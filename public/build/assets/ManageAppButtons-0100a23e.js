import{u as _,n as d,o as b,a as v,b as t,d as u,D as r,O as i}from"./app-57320857.js";const w={class:"container"},g=t("div",null,"App Controls",-1),B={class:"row"},V={class:"col-xs-12 col-md-6"},h={class:"col-xs-12 col-md-6"},S={__name:"ManageAppButtons",props:{downloadBtn:Object},setup(c){const l=c,o=_(),s=d(l.downloadBtn.download_button!==0),n=d(l.downloadBtn.permission_button!==0),p=()=>{i.put(route("update-download-btn"),{data:s.value===!0?1:0},{onStart:()=>o.loading.show(),onSuccess:()=>o.loading.hide()})},m=()=>{i.put(route("update-permission-btn"),{data:n.value===!0?1:0},{onStart:()=>o.loading.show(),onSuccess:()=>o.loading.hide()})};return(f,e)=>(b(),v("div",w,[g,t("div",B,[t("div",V,[u(r,{modelValue:s.value,"onUpdate:modelValue":[e[0]||(e[0]=a=>s.value=a),p],label:"Enable Download Button"},null,8,["modelValue"])]),t("div",h,[u(r,{modelValue:n.value,"onUpdate:modelValue":[e[1]||(e[1]=a=>n.value=a),m],label:"Enable Permission Controls"},null,8,["modelValue"])])])]))}};export{S as default};
