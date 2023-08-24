import{u as q,r as h,o as l,b as c,e,w as r,d as o,t as s,h as _,F as u,i as y,m as b,l as g,k,O as f}from"./app-4496f01d.js";const j={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},C=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Full Name")],-1),A={class:"col-xs-6 col-md-3"},I=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Date of Birth")],-1),D={class:"col-xs-6 col-md-3"},O={class:"row justify-between q-pa-md q-gutter-y-md"},N=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Relationship")],-1),S={class:"col-xs-6 col-md-3"},F=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Relation Name")],-1),B={class:"col-xs-6 col-md-3"},R={class:"row justify-between q-pa-md q-gutter-y-md"},L=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Aadhaar Card")],-1),T={class:"col-xs-6 col-md-3"},E=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Aadhaar Verification")],-1),P={class:"col-xs-6 col-md-3"},V={class:"row justify-between q-pa-md q-gutter-y-md"},G=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Farmer Category")],-1),W={class:"col-xs-6 col-md-3"},H=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Qualification")],-1),M={class:"col-xs-6 col-md-3"},K={class:"row justify-between q-pa-md q-gutter-y-md"},U=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Main Income?")],-1),Y={class:"col-xs-6 col-md-3"},z=o("div",{class:"col-xs-6 col-md-2"},null,-1),Q=o("div",{class:"col-xs-6 col-md-3"},null,-1),J={class:"row justify-between q-pa-md q-gutter-y-md"},X=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Other Source")],-1),Z={class:"col-xs-6 col-md-3"},oo=o("div",{class:"col-xs-6 col-md-2"},null,-1),so=o("div",{class:"col-xs-6 col-md-3"},null,-1),to={class:"row justify-between q-pa-md q-gutter-y-md"},lo=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"District")],-1),co={class:"col-xs-6 col-md-3"},eo=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Sub-Division")],-1),io={class:"col-xs-6 col-md-3"},no={class:"row justify-between q-pa-md q-gutter-y-md"},ao=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Block")],-1),ro={class:"col-xs-6 col-md-3"},_o=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Village")],-1),uo={class:"col-xs-6 col-md-3"},mo={class:"row justify-between q-pa-md q-gutter-y-md"},vo=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Bank Name")],-1),ho={class:"col-xs-6 col-md-3"},yo=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Account Number")],-1),xo={class:"col-xs-6 col-md-3"},$o={class:"row justify-between q-pa-md q-gutter-y-md"},qo=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Branch Name")],-1),po={class:"col-xs-6 col-md-3"},fo=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"IFSC Code")],-1),wo={class:"col-xs-6 col-md-3"},bo={__name:"BasicInfoComponent",props:{basicInfo:Object},setup(n){const d=n;return q(),(x,a)=>{const v=h("q-separator"),t=h("q-expansion-item");return l(),c("div",null,[e(t,{label:"Basic Information","default-opened":"",class:"overflow-hidden","header-class":"bg-primary text-white"},{default:r(()=>[o("div",j,[C,o("div",A,[o("div",null,s(d.basicInfo.full_name),1)]),I,o("div",D,[o("div",null,s(d.basicInfo.dob),1)])]),o("div",O,[N,o("div",S,[o("div",null,s(d.basicInfo.relationship),1)]),F,o("div",B,[o("div",null,s(d.basicInfo.relationship_name),1)])]),o("div",R,[L,o("div",T,[o("div",null,s(d.basicInfo.aadhaar_no),1)]),E,o("div",P,[o("div",null,s(d.basicInfo.aadhaar_verify_type),1)])]),o("div",V,[G,o("div",W,[o("div",null,s(d.basicInfo.farmer_category.f_category_name),1)]),H,o("div",M,[o("div",null,s(d.basicInfo.education_qualification),1)])]),o("div",K,[U,o("div",Y,[o("div",null,s(d.basicInfo.is_farming_main_income==1?"Yes":"No"),1)]),z,Q]),o("div",J,[X,o("div",Z,[o("div",null,s(d.basicInfo.other_income==null?"N/A":d.basicInfo.other_income),1)]),oo,so]),e(v),o("div",to,[lo,o("div",co,[o("div",null,s(d.basicInfo.district.district_name),1)]),eo,o("div",io,[o("div",null,s(d.basicInfo.sub_division.sub_division_name),1)])]),o("div",no,[ao,o("div",ro,[o("div",null,s(d.basicInfo.block.block_name),1)]),_o,o("div",uo,[o("div",null,s(d.basicInfo.village.village_name),1)])]),e(v),o("div",mo,[vo,o("div",ho,[o("div",null,s(d.basicInfo.farmer_bank_details.bank_name),1)]),yo,o("div",xo,[o("div",null,s(d.basicInfo.farmer_bank_details.account_number),1)])]),o("div",$o,[qo,o("div",po,[o("div",null,s(d.basicInfo.farmer_bank_details.branch_name),1)]),fo,o("div",wo,[o("div",null,s(d.basicInfo.farmer_bank_details.ifsc_code),1)])])]),_:1})])}}},go={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},ko=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Agri Farmer ID")],-1),jo={class:"col-xs-6 col-md-3"},Co=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Land Owner")],-1),Ao={class:"col-xs-6 col-md-3"},Io={class:"row justify-between q-pa-md q-gutter-y-md"},Do=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Total Farm Area")],-1),Oo={class:"col-xs-6 col-md-3"},No=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Land Holding")],-1),So={class:"col-xs-6 col-md-3"},Fo={class:"row justify-between q-pa-md q-gutter-y-md"},Bo=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"District")],-1),Ro={class:"col-xs-6 col-md-3"},Lo=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Sub Division")],-1),To={class:"col-xs-6 col-md-3"},Eo={class:"row justify-between q-pa-md q-gutter-y-md"},Po=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Block")],-1),Vo={class:"col-xs-6 col-md-3"},Go=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Village")],-1),Wo={class:"col-xs-6 col-md-3"},Ho={class:"row justify-between q-pa-md q-gutter-y-md"},Mo=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Ownership Type")],-1),Ko={class:"col-xs-6 col-md-3"},Uo=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Document No.")],-1),Yo={class:"col-xs-6 col-md-3"},zo={class:"row justify-between q-pa-md q-gutter-y-md"},Qo=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Ownership Documents")],-1),Jo={class:"col-xs-6 col-md-3"},Xo={href:"#"},Zo=o("div",{class:"col-xs-6 col-md-2"},null,-1),os=o("div",{class:"col-xs-6 col-md-3"},null,-1),ss={class:"row justify-start q-pa-md q-gutter-y-md"},ts=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Irrigation Infrasctructure")],-1),ls={class:"row col-xs-6 col-md-9"},cs={class:"row justify-start q-pa-md q-gutter-y-md"},ds=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Farm Machinery")],-1),es={class:"row col-xs-6 col-md-9"},is={class:"row justify-start q-pa-md q-gutter-y-md"},ns=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Crops Grown(Kharif)")],-1),as={class:"row col-xs-6 col-md-9"},rs={class:"row justify-between q-pa-md q-gutter-y-md"},_s=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Area Sown(Kharif)")],-1),us={class:"col-xs-6 col-md-3"},ms=o("div",{class:"col-xs-6 col-md-2"},null,-1),vs=o("div",{class:"col-xs-6 col-md-3"},null,-1),hs={class:"row justify-start q-pa-md q-gutter-y-md"},ys=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Crops Grown(Rabi)")],-1),xs={class:"row col-xs-6 col-md-9"},$s={class:"row justify-between q-pa-md q-gutter-y-md"},qs=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Area Sown(Rabi)")],-1),ps={class:"col-xs-6 col-md-3"},fs=o("div",{class:"col-xs-6 col-md-2"},null,-1),ws=o("div",{class:"col-xs-6 col-md-3"},null,-1),bs={class:"row justify-between q-pa-md q-gutter-y-md"},gs=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Oil Palm Plantation")],-1),ks={class:"col-xs-6 col-md-3"},js=o("div",{class:"col-xs-6 col-md-2"},null,-1),Cs=o("div",{class:"col-xs-6 col-md-3"},null,-1),As={class:"row justify-between q-pa-md q-gutter-y-md"},Is=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Oil Palm Area Sown")],-1),Ds={class:"col-xs-6 col-md-3"},Os=o("div",{class:"col-xs-6 col-md-2"},null,-1),Ns=o("div",{class:"col-xs-6 col-md-3"},null,-1),Ss={__name:"AgriLandComponent",props:{agriLand:Object},setup(n){q();const d=x=>{window.open("/storage/"+x,"_blank")};return(x,a)=>{const v=h("q-separator"),t=h("q-btn"),i=h("q-chip"),p=h("q-expansion-item");return l(!0),c(u,null,_(n.agriLand,m=>(l(),c("div",null,[e(p,{label:"Agriculture Land Details"},{default:r(()=>[o("div",go,[ko,o("div",jo,[o("div",null,s(m.farmer_agri_id),1)]),Co,o("div",Ao,[o("div",null,s(m.land_owner_name),1)])]),o("div",Io,[Do,o("div",Oo,[o("div",null,s(m.area_of_land)+" Acres",1)]),No,o("div",So,[o("div",null,s(m.land_holding.land_holding_name),1)])]),o("div",Fo,[Bo,o("div",Ro,[o("div",null,s(m.district.district_name),1)]),Lo,o("div",To,[o("div",null,s(m.sub_division.sub_division_name),1)])]),o("div",Eo,[Po,o("div",Vo,[o("div",null,s(m.block.block_name),1)]),Go,o("div",Wo,[o("div",null,s(m.village.village_name),1)])]),e(v),o("div",Ho,[Mo,o("div",Ko,[o("div",null,s(m.ownership_type.ownership_type_name),1)]),Uo,o("div",Yo,[o("div",null,s(m.landholding_documents_number),1)])]),o("div",zo,[Qo,o("div",Jo,[o("a",Xo,[e(t,{label:"VIEW DOCUMENT",flat:"",color:"white",style:{"background-color":"#588052"},onClick:$=>d(m.land_holding_file)},null,8,["onClick"])])]),Zo,os]),e(v),o("div",ss,[ts,o("div",ls,[(l(!0),c(u,null,_(m.irrigation_infrastructures,$=>(l(),c("div",null,[e(i,{style:{"background-color":"#588052"},"text-color":"white"},{default:r(()=>[y(s($.irrigation_infrastructures_name),1)]),_:2},1024)]))),256))])]),o("div",cs,[ds,o("div",es,[(l(!0),c(u,null,_(m.farm_equipments,$=>(l(),c("div",null,[e(i,{style:{"background-color":"#588052"},"text-color":"white"},{default:r(()=>[y(s($.equipment_name),1)]),_:2},1024)]))),256))])]),o("div",is,[ns,o("div",as,[(l(!0),c(u,null,_(m.kharif_crops,$=>(l(),c("div",null,[e(i,{style:{"background-color":"#588052"},"text-color":"white"},{default:r(()=>[y(s($.kharif_crops_name),1)]),_:2},1024)]))),256))])]),o("div",rs,[_s,o("div",us,[o("div",null,s(m.kharif_total_area)+" Acres",1)]),ms,vs]),o("div",hs,[ys,o("div",xs,[(l(!0),c(u,null,_(m.rabi_crops,$=>(l(),c("div",null,[e(i,{style:{"background-color":"#588052"},"text-color":"white"},{default:r(()=>[y(s($.rabi_crops_name),1)]),_:2},1024)]))),256))])]),o("div",$s,[qs,o("div",ps,[o("div",null,s(m.rabi_total_area)+" Acres",1)]),fs,ws]),o("div",bs,[gs,o("div",ks,[o("div",null,s(m.oil_palm_plantation==1?"Yes":"No"),1)]),js,Cs]),o("div",As,[Is,o("div",Ds,[o("div",null,s(m.oil_palm_area==null?"N/A":m.oil_palm_area)+s(m.oil_palm_area==null?"":x.Acres),1)]),Os,Ns])]),_:2},1024)]))),256)}}},Fs={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},Bs=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Ration Card Number")],-1),Rs={class:"col-xs-6 col-md-3"},Ls=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Ration Card Document")],-1),Ts={class:"col-xs-6 col-md-3"},Es={href:"#",style:{"text-decoration":"none"}},Ps={class:"row justify-start q-pa-md q-gutter-y-md q-gutter-y-md"},Vs=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Schemes Applied")],-1),Gs={class:"col-xs-6 col-md-10"},Ws={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},Hs=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"KCC Availed")],-1),Ms={class:"col-xs-6 col-md-3"},Ks=o("div",{class:"col-xs-6 col-md-2"},null,-1),Us=o("div",{class:"col-xs-6 col-md-3"},null,-1),Ys={key:0},zs={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},Qs=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"KCC Card No")],-1),Js={class:"col-xs-6 col-md-3"},Xs=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"New/Renew")],-1),Zs={class:"col-xs-6 col-md-3"},ot={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},st=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Bank Name")],-1),tt={class:"col-xs-6 col-md-3"},lt=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Branch Name")],-1),ct={class:"col-xs-6 col-md-3"},dt={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},et=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Year of Amount Sanction")],-1),it={class:"col-xs-6 col-md-3"},nt=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Amount Sanction")],-1),at={class:"col-xs-6 col-md-3"},rt={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},_t=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Aadhaar Card")],-1),ut={class:"col-xs-6 col-md-3"},mt={href:"#",style:{"text-decoration":"none"}},vt=o("div",{class:"col-xs-6 col-md-2"},null,-1),ht=o("div",{class:"col-xs-6 col-md-3"},null,-1),yt={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},xt=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Bank Passbook")],-1),$t={class:"col-xs-6 col-md-3"},qt={href:"#",style:{"text-decoration":"none"}},pt=o("div",{class:"col-xs-6 col-md-2"},null,-1),ft=o("div",{class:"col-xs-6 col-md-3"},null,-1),wt={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},bt=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Date of Collection")],-1),gt={class:"col-xs-6 col-md-3"},kt=o("div",{class:"col-xs-6 col-md-2"},null,-1),jt=o("div",{class:"col-xs-6 col-md-3"},null,-1),Ct={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},At=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Remarks")],-1),It={class:"col-xs-6 col-md-3"},Dt=o("div",{class:"col-xs-6 col-md-2"},null,-1),Ot=o("div",{class:"col-xs-6 col-md-3"},null,-1),Nt={__name:"AdditionalComponent",props:{additional:Object},setup(n){q();const d=x=>{window.open("/storage/"+x,"_blank")};return(x,a)=>{const v=h("q-btn"),t=h("q-expansion-item");return l(),b(t,{label:"Additional Details","expand-separator":""},{default:r(()=>[o("div",Fs,[Bs,o("div",Rs,[o("div",null,s(n.additional.ration_card_number),1)]),Ls,o("div",Ts,[o("a",Es,[e(v,{label:"VIEW DOCUMENT",flat:"",style:{"background-color":"#2e6525"},"text-color":"white",onClick:a[0]||(a[0]=i=>x.openRationCard(n.additional.ration_card_path))})])])]),o("div",Ps,[Vs,o("div",Gs,[(l(!0),c(u,null,_(n.additional.scheme_applied,i=>(l(),c("div",null,[o("div",null,"Scheme Name: "+s(i.scheme_name),1),o("div",null,"Availed: "+s(i.availed==1?"Yes":"No"),1),o("div",null,"Amount: "+s(i.amount),1)]))),256))])]),o("div",Ws,[Hs,o("div",Ms,[o("div",null,s(n.additional.is_kcc_availed==1?"Yes":"No"),1)]),Ks,Us]),n.additional.is_kcc_availed===1?(l(),c("div",Ys,[o("div",zs,[Qs,o("div",Js,[o("div",null,s(n.additional.kcc_card_no),1)]),Xs,o("div",Zs,[o("div",null,s(n.additional.kcc_renew_or_new),1)])]),o("div",ot,[st,o("div",tt,[o("div",null,s(n.additional.bank_name),1)]),lt,o("div",ct,[o("div",null,s(n.additional.branch_name),1)])]),o("div",dt,[et,o("div",it,[o("div",null,s(n.additional.year_of_amount_sanction),1)]),nt,o("div",at,[o("div",null,s(n.additional.amount_sanction),1)])])])):g("",!0),o("div",rt,[_t,o("div",ut,[o("a",mt,[e(v,{label:"VIEW DOCUMENT",flat:"",style:{"background-color":"#2e6525"},"text-color":"white",onClick:a[1]||(a[1]=i=>d(n.additional.aadhaar_card_path))})])]),vt,ht]),o("div",yt,[xt,o("div",$t,[o("a",qt,[e(v,{label:"VIEW DOCUMENT",flat:"",style:{"background-color":"#2e6525"},"text-color":"white",onClick:a[2]||(a[2]=i=>d(n.additional.bank_passbook_path))})])]),pt,ft]),o("div",wt,[bt,o("div",gt,[o("div",null,s(n.additional.date_of_data_collection),1)]),kt,jt]),o("div",Ct,[At,o("div",It,[o("div",null,s(n.additional.remarks),1)]),Dt,Ot])]),_:1})}}},St={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},Ft=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Horticulture ID")],-1),Bt={class:"col-xs-6 col-md-3"},Rt=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Location")],-1),Lt={class:"col-xs-6 col-md-3"},Tt={class:"row justify-start q-pa-md q-gutter-y-md q-gutter-y-md"},Et=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Crops Grown (Kharif)")],-1),Pt={class:"row col-xs-6 col-md-3"},Vt={class:"row justify-between q-pa-md q-gutter-y-md"},Gt=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Area Sown(Kharif)")],-1),Wt={class:"col-xs-6 col-md-3"},Ht=o("div",{class:"col-xs-6 col-md-2"},null,-1),Mt=o("div",{class:"col-xs-6 col-md-3"},null,-1),Kt={class:"row justify-start q-pa-md q-gutter-y-md q-gutter-y-md"},Ut=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Crops Grown (Rabi)")],-1),Yt={class:"row col-xs-6 col-md-3"},zt={class:"row justify-between q-pa-md q-gutter-y-md"},Qt=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Area Sown(Rabi)")],-1),Jt={class:"col-xs-6 col-md-3"},Xt=o("div",{class:"col-xs-6 col-md-2"},null,-1),Zt=o("div",{class:"col-xs-6 col-md-3"},null,-1),ol={class:"row justify-start q-pa-md q-gutter-y-md q-gutter-y-md"},sl=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Orchards Grown")],-1),tl={class:"row col-xs-6 col-md-3"},ll={class:"row justify-start q-pa-md q-gutter-y-md q-gutter-y-md"},cl=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Plantation Grown")],-1),dl={class:"row col-xs-6 col-md-3"},el={class:"row justify-start q-pa-md q-gutter-y-md q-gutter-y-md"},il=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Green House Grown")],-1),nl={class:"row col-xs-6 col-md-3"},al={class:"row justify-between q-pa-md q-gutter-y-md"},rl=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Area (Green House)")],-1),_l={class:"col-xs-6 col-md-3"},ul=o("div",{class:"col-xs-6 col-md-2"},null,-1),ml=o("div",{class:"col-xs-6 col-md-3"},null,-1),vl={__name:"HorticultureComponent",props:{horticulture:Object},setup(n){return q(),(d,x)=>{const a=h("q-chip"),v=h("q-expansion-item");return l(!0),c(u,null,_(n.horticulture,t=>(l(),c("div",null,[e(v,{label:"Horticulture Details","expand-separator":""},{default:r(()=>[o("div",St,[Ft,o("div",Bt,[o("div",null,s(t.farmer_horticulture_id),1)]),Rt,o("div",Lt,[o("div",null,s(t.location),1)])]),o("div",Tt,[Et,o("div",Pt,[(l(!0),c(u,null,_(t.farmer_horti_kharif_crops,i=>(l(),c("div",null,[e(a,{"text-color":"white",style:{"background-color":"#588052"}},{default:r(()=>[y(s(i.kharif_crops_name),1)]),_:2},1024)]))),256))])]),o("div",Vt,[Gt,o("div",Wt,[o("div",null,s(t.kharif_total_area)+" Acres",1)]),Ht,Mt]),o("div",Kt,[Ut,o("div",Yt,[(l(!0),c(u,null,_(t.farmer_horti_rabi_crops,i=>(l(),c("div",null,[e(a,{"text-color":"white",style:{"background-color":"#588052"}},{default:r(()=>[y(s(i.rabi_crops_name),1)]),_:2},1024)]))),256))])]),o("div",zt,[Qt,o("div",Jt,[o("div",null,s(t.rabi_total_area)+" Acres",1)]),Xt,Zt]),o("div",ol,[sl,o("div",tl,[(l(!0),c(u,null,_(t.farmer_orchids,i=>(l(),c("div",null,[e(a,{"text-color":"white",style:{"background-color":"#588052"}},{default:r(()=>[y(s(i.orchards_name),1)]),_:2},1024)]))),256))])]),o("div",ll,[cl,o("div",dl,[(l(!0),c(u,null,_(t.farmer_plantation,i=>(l(),c("div",null,[e(a,{"text-color":"white",style:{"background-color":"#588052"}},{default:r(()=>[y(s(i.plantation_name),1)]),_:2},1024)]))),256))])]),o("div",el,[il,o("div",nl,[(l(!0),c(u,null,_(t.green_house_plants,i=>(l(),c("div",null,[e(a,{"text-color":"white",style:{"background-color":"#588052"}},{default:r(()=>[y(s(i.name),1)]),_:2},1024)]))),256))])]),o("div",al,[rl,o("div",_l,[o("div",null,s(t.total_greenhouse_area==null?"N/A":t.total_greenhouse_area)+" "+s(t.total_greenhouse_area==null?"":d.Acres),1)]),ul,ml])]),_:2},1024)]))),256)}}},hl={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},yl=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Owner ID No.")],-1),xl={class:"col-xs-6 col-md-3"},$l=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Location")],-1),ql={class:"col-xs-6 col-md-3"},pl={class:"row justify-start q-pa-md q-gutter-y-md q-gutter-y-md"},fl=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Crops Grown")],-1),wl={class:"row col-xs-6 col-md-10"},bl={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},gl=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Area Sown")],-1),kl={class:"col-xs-6 col-md-3"},jl=o("div",{class:"col-xs-6 col-md-2"},null,-1),Cl=o("div",{class:"col-xs-6 col-md-3"},null,-1),Al={__name:"LandWaterComponent",props:{landWater:Object},setup(n){return q(),(d,x)=>{const a=h("q-chip"),v=h("q-expansion-item");return l(!0),c(u,null,_(n.landWater,t=>(l(),c("div",null,[e(v,{label:"Land Resource, Soil & Water Conservation Details"},{default:r(()=>[o("div",hl,[yl,o("div",xl,[o("div",null,s(t.owner_id),1)]),$l,o("div",ql,[o("div",null,s(t.location),1)])]),o("div",pl,[fl,o("div",wl,[(l(!0),c(u,null,_(t.land_crops,i=>(l(),c("div",null,[e(a,{"text-color":"white",style:{"background-color":"#588052"}},{default:r(()=>[y(s(i.crop_name),1)]),_:2},1024)]))),256))])]),o("div",bl,[gl,o("div",kl,[o("div",null,s(t.total_area),1)]),jl,Cl])]),_:2},1024)]))),256)}}},Il={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},Dl=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Fisheries ID")],-1),Ol={class:"col-xs-6 col-md-3"},Nl=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Location")],-1),Sl={class:"col-xs-6 col-md-3"},Fl={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},Bl=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Total Area")],-1),Rl={class:"col-xs-6 col-md-3"},Ll=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Total Ponds")],-1),Tl={class:"col-xs-6 col-md-3"},El={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},Pl=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Nursery Pond")],-1),Vl={class:"col-xs-6 col-md-2"},Gl=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Rearing Ponds")],-1),Wl={class:"col-xs-6 col-md-2"},Hl=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Grew Out Ponds")],-1),Ml={class:"col-xs-6 col-md-2"},Kl={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},Ul=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Type of Fish")],-1),Yl={class:"row col-xs-6 col-md-10"},zl=o("div",{class:"col-xs-6 col-md-2"},null,-1),Ql=o("div",{class:"col-xs-6 col-md-3"},null,-1),Jl={__name:"FisheriesComponent",props:{fisheries:Object},setup(n){return q(),(d,x)=>{const a=h("q-chip"),v=h("q-expansion-item");return l(!0),c(u,null,_(n.fisheries,t=>(l(),c("div",null,[e(v,{label:"Fisheries Details"},{default:r(()=>[o("div",Il,[Dl,o("div",Ol,[o("div",null,s(t.fisheries_id),1)]),Nl,o("div",Sl,[o("div",null,s(t.location),1)])]),o("div",Fl,[Bl,o("div",Rl,[o("div",null,s(t.total_area),1)]),Ll,o("div",Tl,[o("div",null,s(t.total_ponds),1)])]),o("div",El,[Pl,o("div",Vl,[o("div",null,s(t.nursery_ponds),1)]),Gl,o("div",Wl,[o("div",null,s(t.rearing_ponds),1)]),Hl,o("div",Ml,[o("div",null,s(t.grew_out_ponds),1)])]),o("div",Kl,[Ul,o("div",Yl,[(l(!0),c(u,null,_(t.fish,i=>(l(),c("div",null,[e(a,{"text-color":"white",style:{"background-color":"#588052"}},{default:r(()=>[y(s(i.fish_name),1)]),_:2},1024)]))),256))]),zl,Ql])]),_:2},1024)]))),256)}}},Xl={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},Zl=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Husbandry ID")],-1),oc={class:"col-xs-6 col-md-3"},sc=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Location")],-1),tc={class:"col-xs-6 col-md-3"},lc={class:"row justify-start q-pa-md q-gutter-y-md q-gutter-y-md"},cc=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Livestock")],-1),dc={class:"row col-xs-6 col-md-3"},ec={class:"row justify-start q-pa-md q-gutter-y-md q-gutter-y-md"},ic=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Type of Breed")],-1),nc={class:"row col-xs-6 col-md-3"},ac={class:"row justify-start q-pa-md q-gutter-y-md q-gutter-y-md"},rc=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Type of Farm")],-1),_c={class:"row col-xs-6 col-md-3"},uc={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},mc=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Adult Male")],-1),vc={class:"row col-xs-6 col-md-2"},hc=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Adult Female")],-1),yc={class:"row col-xs-6 col-md-2"},xc=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Total Livestock")],-1),$c={class:"row col-xs-6 col-md-2"},qc={class:"row justify-start q-pa-md q-gutter-y-md q-gutter-y-md"},pc=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Poultry Farm Type")],-1),fc={class:"row col-xs-6 col-md-3"},wc={class:"row justify-start q-pa-md q-gutter-y-md q-gutter-y-md"},bc=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Poultry Farm Breed")],-1),gc={class:"row col-xs-6 col-md-3"},kc={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},jc=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Poultry Total")],-1),Cc={class:"row col-xs-6 col-md-3"},Ac=o("div",{class:"col-xs-6 col-md-2"},null,-1),Ic=o("div",{class:"row col-xs-6 col-md-3"},null,-1),Dc={__name:"HusbandryComponent",props:{husbandry:Object},setup(n){return q(),(d,x)=>{const a=h("q-chip"),v=h("q-expansion-item");return l(!0),c(u,null,_(n.husbandry,t=>(l(),c("div",null,[e(v,{label:"Animal Husbandry Details","expand-separator":""},{default:r(()=>[o("div",Xl,[Zl,o("div",oc,[o("div",null,s(t.husbandry_id),1)]),sc,o("div",tc,[o("div",null,s(t.location),1)])]),o("div",lc,[cc,o("div",dc,[(l(!0),c(u,null,_(t.livestock,i=>(l(),c("div",null,[e(a,{"text-color":"white",style:{"background-color":"#588052"}},{default:r(()=>[y(s(i.livestock_name),1)]),_:2},1024)]))),256))])]),o("div",ec,[ic,o("div",nc,[(l(!0),c(u,null,_(t.husbandry_type_breed,i=>(l(),c("div",null,[e(a,{"text-color":"white",style:{"background-color":"#588052"}},{default:r(()=>[y(s(i.name),1)]),_:2},1024)]))),256))])]),o("div",ac,[rc,o("div",_c,[(l(!0),c(u,null,_(t.type_of_farm,i=>(l(),c("div",null,[e(a,{"text-color":"white",style:{"background-color":"#588052"}},{default:r(()=>[y(s(i.name),1)]),_:2},1024)]))),256))])]),o("div",uc,[mc,o("div",vc,[o("div",null,s(t.adult_male),1)]),hc,o("div",yc,[o("div",null,s(t.adult_female),1)]),xc,o("div",$c,[o("div",null,s(t.total),1)])]),o("div",qc,[pc,o("div",fc,[(l(!0),c(u,null,_(t.poultry_farm,i=>(l(),c("div",null,[e(a,{"text-color":"white",style:{"background-color":"#588052"}},{default:r(()=>[y(s(i.name),1)]),_:2},1024)]))),256))])]),o("div",wc,[bc,o("div",gc,[(l(!0),c(u,null,_(t.type_of_breed,i=>(l(),c("div",null,[e(a,{"text-color":"white",style:{"background-color":"#588052"}},{default:r(()=>[y(s(i.name),1)]),_:2},1024)]))),256))])]),o("div",kc,[jc,o("div",Cc,[o("div",null,s(t.no_of_poultry),1)]),Ac,Ic])]),_:2},1024)]))),256)}}},Oc={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},Nc=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Sericulture ID")],-1),Sc={class:"col-xs-6 col-md-3"},Fc=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Location")],-1),Bc={class:"col-xs-6 col-md-3"},Rc={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},Lc=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Total Farm Area")],-1),Tc={class:"col-xs-6 col-md-3"},Ec=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Size of Rearing Unit")],-1),Pc={class:"col-xs-6 col-md-3"},Vc={class:"row justify-start q-pa-md q-gutter-y-md q-gutter-y-md"},Gc=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Silkworms Reared")],-1),Wc={class:"row col-xs-6 col-md-3"},Hc={class:"row justify-between q-pa-md q-gutter-y-md q-gutter-y-md"},Mc=o("div",{class:"col-xs-6 col-md-2"},[o("div",{style:{color:"#588052"}},"Silkworm Feed Area")],-1),Kc={class:"col-xs-6 col-md-3"},Uc=o("div",{class:"col-xs-6 col-md-2"},null,-1),Yc=o("div",{class:"col-xs-6 col-md-3"},null,-1),zc={__name:"SericultureComponent",props:{sericulture:Object},setup(n){return q(),(d,x)=>{const a=h("q-chip"),v=h("q-expansion-item");return l(!0),c(u,null,_(n.sericulture,t=>(l(),c("div",null,[e(v,{label:"Sericulture Details"},{default:r(()=>[o("div",Oc,[Nc,o("div",Sc,[o("div",null,s(t.sericulture_id),1)]),Fc,o("div",Bc,[o("div",null,s(t.location),1)])]),o("div",Rc,[Lc,o("div",Tc,[o("div",null,s(t.total_area),1)]),Ec,o("div",Pc,[o("div",null,s(t.size_of_rearing_unit),1)])]),o("div",Vc,[Gc,o("div",Wc,[(l(!0),c(u,null,_(t.silkworm,i=>(l(),c("div",null,[e(a,{"text-color":"white",style:{"background-color":"#588052"}},{default:r(()=>[y(s(i.silkworm_name),1)]),_:2},1024)]))),256))])]),o("div",Hc,[Mc,o("div",Kc,[o("div",null,s(t.plantation_total_area),1)]),Uc,Yc])]),_:2},1024)]))),256)}}},Qc={class:"row justify-center"},Jc={class:"col-xs-12 col-md-9 col-xl-7",style:{"background-color":"white"}},Xc={class:"row justify-center q-gutter-md q-pt-md q-pb-md"},Zc={class:"col-xs-3 col-md-1"},od={class:"col-xs-3 col-md-1"},td={__name:"SupervisorApprovalPage",props:{basicInfo:Object,agriLand:[],additional:Object,horticulture:[],landWater:[],fisheries:[],husbandry:[],sericulture:[]},setup(n){const d=q(),x=k(""),a=i=>{d.dialog({dark:!0,title:"Confirm",message:"Approve Farmer?",cancel:!0,persistent:!0}).onOk(()=>{}).onOk(()=>{f.get(route("approve-farmer",i),{},{onStart:d.loading.show(),onSuccess:()=>{d.loading.hide(),d.notify({message:"Farmer Approved",closeBtn:!0,icon:"check",iconColor:"blue"})},onError:()=>{d.loading.hide(),d.notify({message:"Error Occured",closeBtn:!0,icon:"warning",iconColor:"red"})}})}).onCancel(()=>{}).onDismiss(()=>{})},v=i=>{d.dialog({dark:!0,title:"Rejection",message:"Rejection Reason",prompt:{model:x,type:"text"},cancel:!0,persistent:!0}).onOk(p=>{f.get(route("reject-farmer",i),{data:x.value},{onStart:()=>d.loading.show(),onSuccess:()=>{d.loading.hide(),d.notify({message:"Farmer Rejected",closeBtn:!0,icon:"warning",iconColor:"red"})},onError:()=>{d.loading.hide(),d.notify({message:"Error Occured",closeBtn:!0,icon:"warning",iconColor:"red"})},preserveState:!1})}).onCancel(()=>{}).onDismiss(()=>{})},t=()=>{d.notify({message:"Farmer already Approved",icon:"check",iconColor:"green",closeBtn:!0})};return(i,p)=>{const m=h("q-separator"),$=h("q-btn");return l(),c("div",Qc,[o("div",Jc,[e(bo,{"basic-info":n.basicInfo},null,8,["basic-info"]),e(Ss,{"agri-land":n.agriLand},null,8,["agri-land"]),e(Nt,{additional:n.additional},null,8,["additional"]),e(vl,{horticulture:n.horticulture},null,8,["horticulture"]),e(Al,{"land-water":n.landWater},null,8,["land-water"]),e(Jl,{fisheries:n.fisheries},null,8,["fisheries"]),e(Dc,{husbandry:n.husbandry},null,8,["husbandry"]),e(zc,{sericulture:n.sericulture},null,8,["sericulture"]),e(m),o("div",Xc,[o("div",Zc,[e($,{outline:"",label:"REJECT",style:{color:"red"},onClick:p[0]||(p[0]=w=>v(n.basicInfo.id))})]),o("div",od,[e($,{flat:"","text-color":"white",label:"APPROVE",style:{"background-color":"#588052"},onClick:p[1]||(p[1]=w=>n.basicInfo.verification==="Approved"?t():a(n.basicInfo.id))})])])])])}}};export{td as default};
