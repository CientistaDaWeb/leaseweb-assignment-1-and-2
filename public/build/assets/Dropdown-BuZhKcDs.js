import{o as n,f as l,k as i,c as d,b as s,e as a,z as f,g as u}from"./app-C-GaPJtV.js";import{_ as m}from"./_plugin-vue_export-helper-DlAUqK2U.js";import{c}from"./popper-BQBsAJpH.js";const w={props:{placement:{type:String,default:"bottom-end"},autoClose:{type:Boolean,default:!0}},data(){return{show:!1}},watch:{show(e){e?this.$nextTick(()=>{this.popper=c(this.$el,this.$refs.dropdown,{placement:this.placement,modifiers:[{name:"preventOverflow",options:{altBoundary:!0}}]})}):this.popper&&setTimeout(()=>this.popper.destroy(),100)}},mounted(){document.addEventListener("keydown",e=>{e.key==="Escape"&&(this.show=!1)})}};function h(e,o,p,k,t,y){return n(),l("button",{type:"button",onClick:o[2]||(o[2]=r=>t.show=!0)},[i(e.$slots,"default"),t.show?(n(),d(f,{key:0,to:"#dropdown"},[s("div",null,[s("div",{style:{position:"fixed",top:"0",right:"0",left:"0",bottom:"0","z-index":"99998",background:"black",opacity:"0.2"},onClick:o[0]||(o[0]=r=>t.show=!1)}),s("div",{ref:"dropdown",style:{position:"absolute","z-index":"99999"},onClick:o[1]||(o[1]=a(r=>t.show=!p.autoClose,["stop"]))},[i(e.$slots,"dropdown")],512)])])):u("",!0)])}const B=m(w,[["render",h]]);export{B as D};