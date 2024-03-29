import{Z as V,i as k,r as n,o as s,f as l,a as i,b as o,w as u,d,t as p,c as L,g as f,e as S,F as _,l as v,h as B,v as A}from"./app-DgPWu283.js";import{I as T}from"./Icon-Dakr8WTa.js";import{L as U}from"./Layout-Bf2ZegyR.js";import{L as C,T as I}from"./LoadingButton-BXgd0Mr5.js";import{T as N}from"./TrashedMessage-gFuMMqRw.js";import{S as M}from"./SelectInput-Bm3Av8bM.js";import{_ as D}from"./_plugin-vue_export-helper-DlAUqK2U.js";/* empty css            */import"./Logo-HB5MViY6.js";import"./Dropdown-e0af9Wzh.js";import"./popper-BQBsAJpH.js";import"./FlashMessages-QiDrnY8u.js";import"./v4-D8aEg3BZ.js";const H={components:{SelectInput:M,Head:V,Icon:T,Link:k,LoadingButton:C,TextInput:I,TrashedMessage:N},layout:U,props:{server:Object,brands:Array,memories:Array,memories_attached:Array},remember:"form",data(){return{form:this.$inertia.form({id:this.server.id,asset_id:this.server.asset_id,name:this.server.name,brand_id:this.server.brand_id,price:this.server.price,memories:this.memories_attached})}},methods:{update(){this.form.put(`/servers/${this.server.id}`)},destroy(){confirm("Are you sure you want to delete this server?")&&this.$inertia.delete(`/servers/${this.server.id}`)},restore(){confirm("Are you sure you want to restore this server?")&&this.$inertia.put(`/servers/${this.server.id}/restore`)}}},E={class:"mb-8 text-3xl font-bold"},F=o("span",{class:"text-indigo-400 font-medium"},"/",-1),O={class:"max-w-3xl bg-white rounded-md shadow overflow-hidden"},P={class:"flex flex-wrap -mb-8 -mr-6 p-8"},R=o("option",{value:null,selected:""},"Please Select One",-1),j=["value"],z=o("h2",{class:"mt-12 text-2xl font-bold"},"Memory (select at least one)",-1),G={class:"flex flex-wrap mb-4 mt-2"},Z={class:"lg:w-1/5 h-8"},q=["value"],J={class:"flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100"};function K(Q,t,m,W,r,a){const b=n("Head"),h=n("Link"),x=n("trashed-message"),c=n("text-input"),g=n("select-input"),y=n("loading-button");return s(),l("div",null,[i(b,{title:r.form.name},null,8,["title"]),o("h1",E,[i(h,{class:"text-indigo-400 hover:text-indigo-600",href:"/servers"},{default:u(()=>[d("Servers")]),_:1}),F,d(" "+p(r.form.name),1)]),m.server.deleted_at?(s(),L(x,{key:0,class:"mb-6",onRestore:a.restore},{default:u(()=>[d(" This server has been deleted. ")]),_:1},8,["onRestore"])):f("",!0),o("div",O,[o("form",{onSubmit:t[6]||(t[6]=S((...e)=>a.update&&a.update(...e),["prevent"]))},[o("div",P,[i(c,{modelValue:r.form.asset_id,"onUpdate:modelValue":t[0]||(t[0]=e=>r.form.asset_id=e),error:r.form.errors.asset_id,type:"number",class:"pb-8 pr-6 w-full lg:w-1/2",label:"Asset Id"},null,8,["modelValue","error"]),i(c,{modelValue:r.form.name,"onUpdate:modelValue":t[1]||(t[1]=e=>r.form.name=e),error:r.form.errors.name,class:"pb-8 pr-6 w-full lg:w-1/2",label:"Name"},null,8,["modelValue","error"]),i(g,{modelValue:r.form.brand_id,"onUpdate:modelValue":t[2]||(t[2]=e=>r.form.brand_id=e),error:r.form.errors.brand_id,class:"pb-8 pr-6 w-full lg:w-1/2",label:"Brand"},{default:u(()=>[R,(s(!0),l(_,null,v(m.brands,e=>(s(),l("option",{value:e.id},p(e.name),9,j))),256))]),_:1},8,["modelValue","error"]),i(c,{modelValue:r.form.price,"onUpdate:modelValue":t[3]||(t[3]=e=>r.form.price=e),error:r.form.errors.price,type:"currency",class:"pb-8 pr-6 w-full lg:w-1/2",label:"Price"},null,8,["modelValue","error"])]),z,o("div",G,[(s(!0),l(_,null,v(m.memories,e=>(s(),l("div",Z,[o("label",null,[B((s(),l("input",{type:"checkbox","onUpdate:modelValue":t[4]||(t[4]=w=>r.form.memories=w),"true-value":[],key:e.id,value:e.id},null,8,q)),[[A,r.form.memories]]),d(" "+p(e.type)+" - "+p(e.size)+"GB ",1)])]))),256))]),o("div",J,[m.server.deleted_at?f("",!0):(s(),l("button",{key:0,class:"text-red-600 hover:underline",tabindex:"-1",type:"button",onClick:t[5]||(t[5]=(...e)=>a.destroy&&a.destroy(...e))},"Delete Server")),i(y,{loading:r.form.processing,class:"btn-indigo ml-auto",type:"submit"},{default:u(()=>[d("Update Server")]),_:1},8,["loading"])])],32)])])}const me=D(H,[["render",K]]);export{me as default};
