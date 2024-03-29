import{Z as x,i as g,r as s,o as i,f as u,a,b as o,w as m,d,t as y,c as w,g as p,e as k}from"./app-C-GaPJtV.js";import{I as v}from"./Icon-Du1o5-gs.js";import{L as B}from"./Layout-ay5aFoPW.js";import{L,T as V}from"./LoadingButton-BfUgNxK3.js";import{T}from"./TrashedMessage-DDclK9Mb.js";import{_ as N}from"./_plugin-vue_export-helper-DlAUqK2U.js";/* empty css            */import"./Logo-jAQlM2iT.js";import"./Dropdown-BuZhKcDs.js";import"./popper-BQBsAJpH.js";import"./FlashMessages-CtTDOf6h.js";import"./v4-D8aEg3BZ.js";const C={components:{Head:x,Icon:v,Link:g,LoadingButton:L,TextInput:V,TrashedMessage:T},layout:B,props:{brand:Object},remember:"form",data(){return{form:this.$inertia.form({name:this.brand.name})}},methods:{update(){this.form.put(`/brands/${this.brand.id}`)},destroy(){confirm("Are you sure you want to delete this brand?")&&this.$inertia.delete(`/brands/${this.brand.id}`)},restore(){confirm("Are you sure you want to restore this brand?")&&this.$inertia.put(`/brands/${this.brand.id}/restore`)}}},H={class:"mb-8 text-3xl font-bold"},I=o("span",{class:"text-indigo-400 font-medium"},"/",-1),A={class:"max-w-3xl bg-white rounded-md shadow overflow-hidden"},D={class:"flex flex-wrap -mb-8 -mr-6 p-8"},E={class:"flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100"};function M(R,e,l,S,t,r){const c=s("Head"),f=s("Link"),b=s("trashed-message"),_=s("text-input"),h=s("loading-button");return i(),u("div",null,[a(c,{title:t.form.name},null,8,["title"]),o("h1",H,[a(f,{class:"text-indigo-400 hover:text-indigo-600",href:"/brands"},{default:m(()=>[d("Brands")]),_:1}),I,d(" "+y(t.form.name),1)]),l.brand.deleted_at?(i(),w(b,{key:0,class:"mb-6",onRestore:r.restore},{default:m(()=>[d(" This brand has been deleted. ")]),_:1},8,["onRestore"])):p("",!0),o("div",A,[o("form",{onSubmit:e[2]||(e[2]=k((...n)=>r.update&&r.update(...n),["prevent"]))},[o("div",D,[a(_,{modelValue:t.form.name,"onUpdate:modelValue":e[0]||(e[0]=n=>t.form.name=n),error:t.form.errors.name,class:"pb-8 pr-6 w-full lg:w-1/2",label:"Name"},null,8,["modelValue","error"])]),o("div",E,[l.brand.deleted_at?p("",!0):(i(),u("button",{key:0,class:"text-red-600 hover:underline",tabindex:"-1",type:"button",onClick:e[1]||(e[1]=(...n)=>r.destroy&&r.destroy(...n))},"Delete Brand")),a(h,{loading:t.form.processing,class:"btn-indigo ml-auto",type:"submit"},{default:m(()=>[d("Update Brand")]),_:1},8,["loading"])])],32)])])}const W=N(C,[["render",M]]);export{W as default};