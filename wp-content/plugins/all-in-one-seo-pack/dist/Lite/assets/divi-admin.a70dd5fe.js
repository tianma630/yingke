import{_ as a}from"./js/_plugin-vue_export-helper.b97bdf23.js";import{r as i,o as l,c,d as u,G as p}from"./js/vue.runtime.esm-bundler.b39e1078.js";import{l as d}from"./js/index.ce510b7e.js";import{C as m,l as _}from"./js/index.0eabb636.js";import{l as f}from"./js/index.0b123ab1.js";import{u as h,l as A}from"./js/links.6d4c0bdb.js";import"./js/translations.6e7b2383.js";import"./js/default-i18n.3881921e.js";import"./js/constants.1758f66e.js";import"./js/Caret.164d8058.js";import"./js/isArrayLikeObject.10b615a9.js";const y={setup(){return{rootStore:h()}},components:{CoreAlert:m},data(){return{strings:{alert:this.$t.sprintf(this.$t.__("The options below are disabled because you are using %1$s to manage your SEO. They can be changed in the %2$sSearch Appearance menu%3$s.",this.$td),"All in One SEO",`<a href="${this.rootStore.aioseo.urls.aio.searchAppearance}" target="_blank">`,"</a>")}}}},b={class:"aioseo-divi-seo-admin-notice-container"};function g(n,t,o,e,r,x){const s=i("core-alert");return l(),c("div",b,[u(s,{innerHTML:r.strings.alert},null,8,["innerHTML"])])}const S=a(y,[["render",g]]),v=()=>{const n=document.querySelectorAll("#wrap-seo .et-tab-content");for(let t=0;t<n.length;t++){const o=document.createElement("div");o.setAttribute("id",`aioseo-divi-seo-admin-notice-container-${t}`),n[t].insertBefore(o,n[t].firstChild);let e=p({...S,name:"Standalone/DiviAdmin"});e=d(e),e=_(e),e=f(e),A(e),e.mount(`#${o.getAttribute("id")}`)}},w=()=>{const n=document.querySelectorAll('#wrap-seo input[type="text"], #wrap-seo textarea');for(let e=0;e<n.length;e++)n[e].style.pointerEvents="none",n[e].setAttribute("readonly",!0);const t=document.querySelectorAll("#wrap-seo select");for(let e=0;e<t.length;e++)t[e].style.pointerEvents="none",t[e].setAttribute("disabled",!0);const o=document.querySelectorAll("#wrap-seo .et-checkbox");for(let e=0;e<o.length;e++)o[e].setAttribute("disabled",!0),o[e].nextElementSibling.style.pointerEvents="none"},$=()=>{const n=window.aioseo.urls.aio.searchAppearance,t=document.querySelector('a[href="#wrap-seo"]');if(!n||!t)return;const o=t.cloneNode(!0);o.setAttribute("href",n),t.parentNode.replaceChild(o,t)};window.addEventListener("load",()=>{v(),w(),$()});
