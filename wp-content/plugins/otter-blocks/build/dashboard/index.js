!function(){var e,t={477:function(e,t,o){"use strict";var l=window.wp.element,a=o(184),s=o.n(a),n=window.wp.components,r=window.wp.i18n,i=window.wp.hooks;const{version:c}=window.themeisleGutenberg?window.themeisleGutenberg:window.otterObj,d=[{name:(0,r.__)("Plugin version","otter-blocks"),value:c},{name:(0,r.__)("Feedback","otter-blocks"),value:(0,r.__)("Text from the above text area","otter-blocks")}],m={error:(0,r.__)("There has been an error. Your feedback couldn't be sent."),emptyFeedback:(0,r.__)("Please provide a feedback before submitting the form.","otter-blocks")};var u=({source:e,status:t,setStatus:o})=>{const[a,i]=(0,l.useState)(""),[u,_]=(0,l.useState)(!1);return(0,l.useEffect)((()=>{const e=document.querySelector(".o-feedback-form .info");e&&(e.style.height=u?`${e.querySelector(".wrapper")?.clientHeight}px`:"0")}),[u]),(0,l.createElement)("form",{className:"o-feedback-form",onSubmit:t=>{t.preventDefault(),(()=>{const t=a.trim();if(5>=t.length)o("emptyFeedback");else{o("loading");try{fetch("https://api.themeisle.com/tracking/feedback",{method:"POST",headers:{"Content-Type":"application/json",Accept:"application/json, */*;q=0.1","Cache-Control":"no-cache"},body:JSON.stringify({slug:"otter-blocks",version:c,feedback:t,data:{"feedback-area":e}})}).then((e=>{e.ok?o("submitted"):o("error")}))?.catch((e=>{console.warn(e.message),o("error")}))}catch(e){console.warn(e.message),o("error")}}})()}},(0,l.createElement)(n.TextareaControl,{className:s()({invalid:"emptyFeedback"===t,"f-error":"error"===t}),placeholder:(0,r.__)("Tell us how can we help you better with Otter Blocks","otter-blocks"),value:a,rows:7,cols:50,onChange:e=>{i(e),5<e.trim().length&&o("notSubmitted")},help:m[t]||!1,autoFocus:!0}),(0,l.createElement)("div",{className:"info"},(0,l.createElement)("div",{className:"wrapper"},(0,l.createElement)("p",null,(0,r.__)("We value privacy, that's why no domain name, email address or IP addresses are collected after you submit the survey. Below is a detailed view of all data that Themeisle will receive if you fill in this survey.","otter-blocks")),d.map(((e,t)=>(0,l.createElement)("div",{className:"info-row",key:t},(0,l.createElement)("p",null,(0,l.createElement)("b",null,e.name)),(0,l.createElement)("p",null,e.value)))))),(0,l.createElement)("div",{className:"buttons-wrap"},(0,l.createElement)(n.Button,{className:"toggle-info","aria-expanded":u,variant:"link",isLink:!0,onClick:()=>_(!u)},(0,r.__)("What info do we collect?","otter-blocks")),(0,l.createElement)(n.Button,{className:"f-send",variant:"primary",type:"submit",isPrimary:!0,disabled:"loading"===t},"loading"===t?(0,l.createElement)(n.Spinner,null):(0,r.__)("Send feedback","otter-blocks"))))};const{assetsPath:_}=window.themeisleGutenberg?window.themeisleGutenberg:window.otterObj,b=_+("/"===_[_.length-1]?"":"/")+"icons/finish-feedback.svg",p=({source:e,status:t,setStatus:o,closeModal:a,isOpen:i})=>(0,l.createElement)(l.Fragment,null,i&&(0,l.createElement)(n.Modal,{className:s()("o-feedback-modal",{"no-header":"submitted"===t}),overlayClassName:"o-feedback-modal-overlay",title:(0,r.__)("What's the one thing you need in Otter?","otter-blocks"),onRequestClose:a,shouldCloseOnClickOutside:!1},"submitted"!==t?(0,l.createElement)(u,{source:e,status:t,setStatus:o}):(0,l.createElement)("div",{className:"finish-feedback"},(0,l.createElement)("img",{src:b}),(0,l.createElement)("p",{className:"f-title"},(0,r.__)("Thank you for your feedback","otter-blocks")),(0,l.createElement)("p",{className:"f-description"},(0,r.__)("Your feedback is highly appreciated and will help us to improve Otter Blocks.","otter-blocks")),(0,l.createElement)(n.Button,{className:"f-done",variant:"secondary",isSecondary:!0,onClick:a},(0,r.__)("Done","otter-blocks")))));(0,i.addFilter)("otter.feedback","themeisle-gutenberg/feedback-modal",((e,t,o=(0,r.__)("Help us improve","otter-blocks"),a="link")=>{const[s,i]=(0,l.useState)(!1),[c,d]=(0,l.useState)("notSubmitted");return(0,l.createElement)(l.Fragment,null,(0,l.createElement)(n.Button,{id:"o-feedback",variant:a,isLink:"link"===a,isSecondary:"secondary"===a,isPrimary:"primary"===a,onClick:()=>i(!s)},o),(0,l.createElement)(p,{isOpen:s,status:c,closeModal:()=>{i(!1),d("notSubmitted")},source:t,setStatus:d}))}));var k=window.lodash,h=window.wp.data,g=window.wp.notices,E=()=>{const e=(0,h.useSelect)((e=>e(g.store).getNotices()),[]),{removeNotice:t}=(0,h.useDispatch)(g.store),o=(0,k.filter)(e,{type:"snackbar"});return(0,l.createElement)(n.SnackbarList,{notices:o,className:"components-editor-notices__snackbar",onRemove:t})};const y=[{slug:"dashboard",label:(0,r.__)("Dashboard","otter-blocks"),visibility:!0},{slug:"integrations",label:(0,r.__)("Integrations","otter-blocks"),visibility:!0},{slug:"upsell",label:(0,r.__)("Free vs PRO","otter-blocks"),visibility:!Boolean(window.otterObj.hasPro)},{slug:"feedback",label:(0,r.__)("Feedback","otter-blocks"),visibility:!0}];var v=({isActive:e,setActive:t})=>(0,l.createElement)("header",{className:"otter-header"},(0,l.createElement)("div",{className:"otter-container"},(0,l.createElement)("div",{className:"otter-logo"},(0,l.createElement)("img",{src:window.otterObj.assetsPath+"images/logo.png",title:(0,r.__)("Otter – Page Builder Blocks & Extensions for Gutenberg","otter-blocks")}),(0,l.createElement)("abbr",{title:(0,r.sprintf)((0,r.__)("Version: %s","otter-blocks"),window.otterObj.version),className:"version"},window.otterObj.version)),(0,l.createElement)("nav",{className:"otter-navigation"},y.map((o=>o.visibility&&(0,l.createElement)("button",{className:s()({"is-active":o.slug===e}),onClick:()=>t(o.slug),key:o.slug},(0,l.createElement)("span",null,o.label))))))),f=window.wp.api,w=o.n(f),S=()=>{const{createNotice:e}=(0,h.dispatch)("core/notices"),[t,o]=(0,l.useState)({}),[a,s]=(0,l.useState)("loading"),n=()=>{w().loadPromise.then((async()=>{try{const e=new(w().models.Settings),t=await e.fetch();o(t)}catch(e){s("error")}finally{s("loaded")}}))};return(0,l.useEffect)((()=>{n()}),[]),[e=>t?.[e],(t,o,l=(0,r.__)("Settings saved.","otter-blocks"),a=void 0,i=(()=>{}))=>{s("saving");const c=new(w().models.Settings)({[t]:o}).save();c.success(((t,o)=>{"success"===o&&(s("loaded"),e("success",l,{isDismissible:!0,type:"snackbar",id:a})),"error"===o&&(s("error"),e("error",(0,r.__)("An unknown error occurred.","otter-blocks"),{isDismissible:!0,type:"snackbar",id:a})),n(),i?.(t)})),c.error((t=>{s("error"),e("error",t.responseJSON.message?t.responseJSON.message:(0,r.__)("An unknown error occurred.","otter-blocks"),{isDismissible:!0,type:"snackbar",id:a})}))},a]},B=({title:e,children:t})=>(0,l.createElement)(n.PanelBody,null,(0,l.createElement)("div",{className:"otter-info"},(0,l.createElement)("h3",null,e),t)),P=window.wp.apiFetch,C=o.n(P),N=()=>{const[e,t]=(0,l.useState)(!1),[o,a]=(0,l.useState)(window.otterObj?.license),[s,i]=(0,l.useState)(""),{createNotice:c}=(0,h.dispatch)("core/notices");(0,l.useEffect)((()=>{o.key&&["valid","active_expired"].includes(o.valid)&&i(o.key)}),[o]);const d="valid"===o?.valid||"valid"===o?.license;return(0,l.createElement)(B,{title:(0,r.__)("Otter Pro License","otter-blocks")},(0,l.createElement)("p",null,(0,r.__)("Enter your license from ThemeIsle purchase history in order to get plugin updates.","otter-blocks")),Boolean(window.otterObj.hasNevePro)&&(0,l.createElement)("p",null,(0,r.__)("Neve Pro license can also be used to activate Otter Pro.","otter-blocks")),(0,l.createElement)("input",{type:"text",value:d?"******************************"+s.slice(-5):s,placeholder:(0,r.__)("Enter license key","otter-blocks"),disabled:e||d,onChange:e=>i(e.target.value)}),(0,l.createElement)("div",{className:"otter-info-button-group is-single"},(0,l.createElement)(n.Button,{variant:d?"secondary":"primary",isPrimary:!d,isSecondary:d,isBusy:e,disabled:e,onClick:()=>{return e={action:d?"deactivate":"activate",key:s},t(!0),void C()({path:"otter/v1/toggle_license",method:"POST",data:e}).then((e=>{t(!1),c(e.success?"success":"error",e.message,{isDismissible:!0,type:"snackbar"}),e?.success&&e.license&&"free"!==e.license.key?(a(e.license),i(e.license.key)):(a({}),i("")),window.location.reload()})).catch((e=>{t(!1),console.log(e)}));var e}},d?(0,r.__)("Deactivate","otter-blocks"):(0,r.__)("Activate","otter-blocks"))),d&&(0,l.createElement)("div",{className:"otter-license-footer"},(0,l.createElement)("p",null,(0,l.createElement)(n.Icon,{icon:"yes"}),(0,r.sprintf)((0,r.__)("Valid - Expires %s","otter-blocks"),o.expiration))),"active_expired"===o?.valid&&(0,l.createElement)("div",{className:"otter-license-footer is-expired"},(0,l.createElement)("p",null,(0,r.__)("License Key has expired. In order to continue receiving support and software updates you must renew your license key.","otter-blocks")),(0,l.createElement)("p",null,(0,l.createElement)(n.ExternalLink,{href:`${window.otterObj.storeURL}?license=${s}`},(0,r.__)("Renew License","otter-blocks")))),!d&&(0,l.createElement)("p",{className:"otter-license-purchase-history"},(0,l.createElement)(n.ExternalLink,{href:window.otterObj.purchaseHistoryURL},(0,r.__)("Get license from Purchase History","otter-blocks"))))};window.wp.date;const O=(e,t)=>{const o=new URL(e);return o.searchParams.set("utm_campaign",t),o.toString()};var x=({setTab:e})=>(0,l.createElement)(l.Fragment,null,Boolean(window.otterObj.hasPro)?(0,l.createElement)(N,null):(0,l.createElement)(B,{title:(0,r.__)("Otter Pro","otter-blocks")},(0,l.createElement)("ul",null,(0,l.createElement)("li",null,(0,r.__)("Pro Block Addons","otter-blocks")),(0,l.createElement)("li",null,(0,r.__)("Pro Block Patterns","otter-blocks")),(0,l.createElement)("li",null,(0,r.__)("Dynamic Content","otter-blocks")),(0,l.createElement)("li",null,(0,r.__)("Block Conditions","otter-blocks")),(0,l.createElement)("li",null,(0,r.__)("WooCommerce Product Builder","otter-blocks")),(0,l.createElement)("li",null,(0,r.__)("Priority Support","otter-blocks"))),(0,l.createElement)("div",{className:"otter-info-button-group"},(0,l.createElement)(n.Button,{variant:"secondary",isSecondary:!0,onClick:()=>e("upsell")},(0,r.__)("Learn More","otter-blocks")),(0,l.createElement)(n.Button,{variant:"primary",isPrimary:!0,target:"_blank",href:O(window.otterObj.upgradeLink,"infobox")},(0,r.__)("Explore Otter Pro","otter-blocks")))),(0,l.createElement)(B,{title:(0,r.__)("Useful links","otter-blocks")},(0,l.createElement)("ul",{className:"otter-info-links"},(0,l.createElement)("li",null,(0,l.createElement)("a",{href:"https://wordpress.org/support/plugin/otter-blocks",target:"_blank"},(0,r.__)("Support","otter-blocks"))),(0,l.createElement)("li",null,(0,l.createElement)("a",{href:"https://github.com/Codeinwp/otter-blocks/discussions",target:"_blank"},(0,r.__)("Feature request","otter-blocks"))),(0,l.createElement)("li",null,(0,l.createElement)("a",{href:"https://wordpress.org/support/plugin/otter-blocks/reviews/#new-post",target:"_blank"},(0,r.__)("Leave a review","otter-blocks")))),(0,l.createElement)("div",{className:"otter-info-button-group is-single"},(0,l.createElement)(n.Button,{variant:"secondary",isSecondary:!0,target:"_blank",href:window.otterObj.docsLink},(0,r.__)("Documentation","otter-blocks"))))),L=({label:e,help:t,buttonLabel:o,disabled:a,action:r,className:i})=>(0,l.createElement)("div",{className:s()("components-base-control","otter-button-control",i)},(0,l.createElement)("div",{className:"components-base-control_labels"},(0,l.createElement)("span",{className:"components-base-control__label"},e),(0,l.createElement)("p",{className:"components-base-control__help"},t)),(0,l.createElement)("div",{className:"otter-button-control-group"},(0,l.createElement)(n.Button,{variant:"secondary",isSecondary:!0,disabled:a,onClick:r},o))),A=({status:e,getOption:t,updateOption:o})=>{(0,l.useEffect)((()=>{Boolean(window.otterObj.stylesExist)||i(!0)}),[]);const{createNotice:a}=(0,h.dispatch)("core/notices"),[s,i]=(0,l.useState)(!1),[c,d]=(0,l.useState)(!1);return(0,l.createElement)(l.Fragment,null,(0,l.createElement)(n.PanelBody,{title:(0,r.__)("Modules","otter-blocks")},(0,l.createElement)(n.PanelRow,null,(0,l.createElement)(n.ToggleControl,{label:(0,r.__)("Enable Custom CSS Module","otter-blocks"),help:(0,r.__)("Custom CSS module allows to add custom CSS to each block in Block Editor.","otter-blocks"),checked:Boolean(t("themeisle_blocks_settings_css_module")),disabled:"saving"===e,onChange:()=>o("themeisle_blocks_settings_css_module",!Boolean(t("themeisle_blocks_settings_css_module")))})),(0,l.createElement)(n.PanelRow,null,(0,l.createElement)(n.ToggleControl,{label:(0,r.__)("Enable Blocks Animation Module","otter-blocks"),help:(0,r.__)("Blocks Animation module allows to add CSS animations to each block in Block Editor.","otter-blocks"),checked:Boolean(t("themeisle_blocks_settings_blocks_animation")),disabled:"saving"===e,onChange:()=>o("themeisle_blocks_settings_blocks_animation",!Boolean(t("themeisle_blocks_settings_blocks_animation")))})),(0,l.createElement)(n.PanelRow,null,(0,l.createElement)(n.ToggleControl,{label:(0,r.__)("Enable Visibility Condition Module","otter-blocks"),help:(0,r.__)("Blocks Conditions module allows to hide/display blocks to your users based on selected conditions.","otter-blocks"),checked:Boolean(t("themeisle_blocks_settings_block_conditions")),disabled:"saving"===e,onChange:()=>o("themeisle_blocks_settings_block_conditions",!Boolean(t("themeisle_blocks_settings_block_conditions")))}))),(0,l.createElement)(n.PanelBody,{title:(0,r.__)("Other","otter-blocks")},(0,l.createElement)(n.PanelRow,null,(0,l.createElement)(n.ToggleControl,{label:(0,r.__)("Make Section your default block for Pages","otter-blocks"),help:(0,r.__)("Everytime you create a new page, Section block will be appended there by default.","otter-blocks"),checked:Boolean(t("themeisle_blocks_settings_default_block")),disabled:"saving"===e,onChange:()=>o("themeisle_blocks_settings_default_block",!Boolean(t("themeisle_blocks_settings_default_block")))})),(0,l.createElement)(n.PanelRow,null,(0,l.createElement)(n.ToggleControl,{label:(0,r.__)("Optimize Animations CSS","otter-blocks"),help:(0,r.__)("Only load CSS for the animations that are used on the page. We recommend you to regenerate styles after you toggle this option.","otter-blocks"),checked:Boolean(t("themeisle_blocks_settings_optimize_animations_css")),disabled:"saving"===e||!Boolean(t("themeisle_blocks_settings_blocks_animation")),onChange:()=>o("themeisle_blocks_settings_optimize_animations_css",!Boolean(t("themeisle_blocks_settings_optimize_animations_css")))})),(0,l.createElement)(n.PanelRow,null,(0,l.createElement)(n.ToggleControl,{label:(0,r.__)("Enable Rich Schema","otter-blocks"),help:(0,r.__)("Control if you want to show rich schema in Product Review Block.","otter-blocks"),checked:Boolean(t("themeisle_blocks_settings_disable_review_schema")),disabled:"saving"===e,onChange:()=>o("themeisle_blocks_settings_disable_review_schema",!Boolean(t("themeisle_blocks_settings_disable_review_schema")))})),(0,l.createElement)(n.PanelRow,null,(0,l.createElement)(n.ToggleControl,{label:(0,r.__)("Use 1-5 Scale for Review Block","otter-blocks"),help:(0,r.__)("Use 1-5 rating scale instead of the default 1-10.","otter-blocks"),checked:Boolean(t("themeisle_blocks_settings_review_scale")),disabled:"saving"===e,onChange:()=>o("themeisle_blocks_settings_review_scale",!Boolean(t("themeisle_blocks_settings_review_scale")))})),(0,l.createElement)(n.PanelRow,null,(0,l.createElement)(n.ToggleControl,{label:(0,r.__)("Highlight the Dynamic Text","otter-blocks"),help:(0,r.__)("Easily differentiate between dynamic and normal text in the editor.","otter-blocks"),checked:Boolean(t("themeisle_blocks_settings_highlight_dynamic")),disabled:"saving"===e,onChange:()=>o("themeisle_blocks_settings_highlight_dynamic",!Boolean(t("themeisle_blocks_settings_highlight_dynamic")))})),(0,l.createElement)(n.PanelRow,null,(0,l.createElement)(n.ToggleControl,{label:(0,r.__)("Anonymous Data Tracking.","otter-blocks"),help:(0,r.__)("Become a contributor by opting in to our anonymous data tracking. We guarantee no sensitive data is collected.","otter-blocks"),checked:"yes"===t("otter_blocks_logger_flag"),disabled:"saving"===e,onChange:()=>o("otter_blocks_logger_flag","yes"===t("otter_blocks_logger_flag")?"no":"yes")}))),(0,l.createElement)(n.PanelBody,null,(0,l.createElement)(n.PanelRow,null,(0,l.createElement)(L,{label:(0,r.__)("Regenerate Styles","otter-blocks"),help:(0,r.__)("Clicking on this will delete all the Otter generated CSS files.","otter-blocks"),buttonLabel:(0,r.__)("Regenerate","otter-blocks"),disabled:s,action:()=>d(!0)}))),c&&(0,l.createElement)(n.Modal,{title:(0,r.__)("Are you sure?","otter-blocks"),onRequestClose:()=>d(!1)},(0,l.createElement)("p",null,(0,r.__)("Are you sure you want to delete all Otter generated CSS files?","otter-blocks")),(0,l.createElement)("p",null,(0,r.__)("Note: Styles will be regenerated as users start visiting your pages.","otter-blocks")),(0,l.createElement)("div",{className:"otter-modal-actions"},(0,l.createElement)(n.Button,{isSecondary:!0,onClick:()=>d(!1)},(0,r.__)("Cancel","otter-blocks")),(0,l.createElement)(n.Button,{isPrimary:!0,disabled:"saving"===e,isBusy:"saving"===e,onClick:async()=>{const e=await C()({path:"otter/v1/regenerate",method:"DELETE"});a(e.success?"success":"error",e.data.message,{isDismissible:!0,type:"snackbar"}),i(!0),d(!1)}},(0,r.__)("Confirm","otter-blocks")))))};const T=[{label:(0,r.__)("More than 30 Custom Blocks","otter-blocks"),description:(0,r.__)("Harness the potential of the new WordPress era with the growing list of 30+ page building blocks, covering all the elements needed to build a website.","otter-blocks"),inFree:!0},{label:(0,r.__)("Extra Functionalities for all Blocks","otter-blocks"),description:(0,r.__)("Otter Blocks adds extra functionality such as Custom CSS, Animations and Visibility Conditions to default or third party blocks present on your website.","otter-blocks"),inFree:!0},{label:(0,r.__)("Premium Blocks","otter-blocks"),description:(0,r.__)("Enhance your website's design with powerful Pro Blocks, like the Add to Cart Block, Business Hours Block and more blocks are coming soon.","otter-blocks")},{label:(0,r.__)("Extended Visibility Conditions & Sticky Blocks functionality","otter-blocks"),description:(0,r.__)("The Visibility Conditions feature allows you to set which conditions should be met for your chosen blocks to be displayed on the page. While the Sticky feature lets you set a Block as sticky, so that it sticks to its parent. ","otter-blocks")},{label:(0,r.__)("Dynamic Values","otter-blocks"),description:(0,r.__)("Streamline your Workflow with Otter Dynamic Values, which allows you to bind certain elements in the editor - with the dynamic data from your website database.","otter-blocks")},{label:(0,r.__)("Review Comparison Table","otter-blocks"),description:(0,r.__)("Allows you to display and compare a selection of product reviews made on the website.","otter-blocks")},{label:(0,r.__)("WooCommerce Builder Blocks","otter-blocks"),description:(0,r.__)("Build custom Single Product Pages using WooCommerce Builder Blocks by Otter. All the new features from Otter Pro are designed to maximize your conversion rate.","otter-blocks")},{label:(0,r.__)("Extended Popups","otter-blocks"),description:(0,r.__)("Display your content in beautiful popup with many customization options. Otter Pro extends the functionality of the popups in the free Otter version, with more advanced options.","otter-blocks")},{label:(0,r.__)("Priority Support","otter-blocks"),description:(0,r.__)("Our Happiness Engineers are happy to help you get the best results from our products. On average, Otter Pro user get a reply in five hours or less.","otter-blocks")}],F=(0,l.createElement)("svg",{width:"31",height:"31",viewBox:"0 0 31 31",fill:"none",xmlns:"http://www.w3.org/2000/svg",role:"img","aria-hidden":"true"},(0,l.createElement)("path",{d:"M22.5326 10.5767L17.2226 15.8867L22.5326 21.1967L20.4176 23.3117L15.1076 18.0167L9.81262 23.3117L7.68262 21.1817L12.9776 15.8867L7.68262 10.5917L9.81262 8.46167L15.1076 13.7567L20.4176 8.46167L22.5326 10.5767Z",fill:"#FF7E65"})),I=(0,l.createElement)("svg",{width:"31",height:"31",viewBox:"0 0 31 31",fill:"none",xmlns:"http://www.w3.org/2000/svg",role:"img","aria-hidden":"true"},(0,l.createElement)("path",{d:"M22.9863 7.99243L12.7863 18.1924L8.58633 13.9924L6.48633 16.0924L12.7863 22.3924L25.0863 10.0924",fill:"#5FBFD5"}));var j=()=>(0,l.createElement)("div",{className:"otter-upsell"},(0,l.createElement)("div",{className:"upsell-title"},(0,l.createElement)("h2",null,(0,r.__)("Powerful features available only in Otter Pro","otter-blocks"))),(0,l.createElement)("ul",{className:"upsell-table"},(0,l.createElement)("li",{className:"t-head"},(0,l.createElement)("div",null),(0,l.createElement)("div",{className:"c"},(0,r.__)("Free","otter-blocks")),(0,l.createElement)("div",{className:"c"},(0,r.__)("Pro","otter-blocks"))),T.map(((e,t)=>(0,l.createElement)("li",{key:t,className:"t-row"},(0,l.createElement)("div",{className:"content"},(0,l.createElement)("div",{className:"h-wrap"},(0,l.createElement)("h4",null,e.label)),(0,l.createElement)("p",null,e.description)),(0,l.createElement)("div",{className:"c"},e?.inFree?I:F),(0,l.createElement)("div",{className:"c"},I))))),(0,l.createElement)(n.Button,{variant:"primary",href:O(window.otterObj.upgradeLink,"viewallfvsp"),target:"_blank"},(0,r.__)("View all Otter Pro features","otter-blocks"))),R=()=>{const[e,t,o]=S();(0,l.useEffect)((()=>{s(e("themeisle_google_map_block_api_key"))}),[e("themeisle_google_map_block_api_key")]),(0,l.useEffect)((()=>{d(e("themeisle_google_captcha_api_site_key")),u(e("themeisle_google_captcha_api_secret_key"))}),[e("themeisle_google_captcha_api_site_key"),e("themeisle_google_captcha_api_secret_key")]),(0,l.useEffect)((()=>{b(e("themeisle_stripe_api_key"))}),[e("themeisle_stripe_api_key")]),(0,l.useEffect)((()=>{k(e("themeisle_open_ai_api_key"))}),[e("themeisle_open_ai_api_key")]);const[a,s]=(0,l.useState)(""),[c,d]=(0,l.useState)(""),[m,u]=(0,l.useState)(""),[_,b]=(0,l.useState)(""),[p,k]=(0,l.useState)("");let h=()=>(0,l.createElement)(n.PanelBody,{title:(0,r.__)("Fonts Module","otter-blocks"),className:"is-pro"},(0,l.createElement)(n.Disabled,null,(0,l.createElement)(n.PanelRow,null,(0,l.createElement)(n.ToggleControl,{label:(0,r.__)("Save Google Fonts Locally","otter-blocks"),help:(0,r.__)("Enable this option to save Google Fonts locally to make your website faster","otter-blocks"),checked:!1,disabled:!0}))));return h=(0,i.applyFilters)("otter.dashboard.integrations",(0,l.createElement)(h,null)),(0,l.createElement)(l.Fragment,null,(0,l.createElement)(n.PanelBody,{title:(0,r.__)("Google Maps","otter-blocks")},(0,l.createElement)(n.PanelRow,null,(0,l.createElement)(n.BaseControl,{label:(0,r.__)("Google Maps API","otter-blocks"),help:(0,r.__)("In order to use Google Maps block, you need to use Google Maps and Places API.","otter-blocks"),id:"otter-options-google-map-api",className:"otter-button-field"},(0,l.createElement)(n.TextControl,{type:"password",label:(0,r.__)("Secret Key","otter-blocks"),value:a,placeholder:(0,r.__)("Google Maps API Key","otter-blocks"),disabled:"saving"===o,onChange:e=>s(e)}),(0,l.createElement)("div",{className:"otter-button-group"},(0,l.createElement)(n.Button,{variant:"secondary",isSecondary:!0,disabled:"saving"===o,onClick:()=>t("themeisle_google_map_block_api_key",a)},(0,r.__)("Save","otter-blocks")),(0,l.createElement)(n.ExternalLink,{href:"https://developers.google.com/maps/documentation/javascript/get-api-key"},(0,r.__)("Get API Key","otter-blocks")))))),h,(0,l.createElement)(n.PanelBody,{title:(0,r.__)("Google reCaptcha API","otter-blocks"),initialOpen:!1},(0,l.createElement)(n.PanelRow,null,(0,l.createElement)(n.BaseControl,{help:(0,r.__)("In order to use reCaptcha field in the Form block, you need to use Google reCaptcha API.","otter-blocks"),id:"otter-options-google-recaptcha-api",className:"otter-button-field"},(0,l.createElement)(n.TextControl,{type:"password",label:(0,r.__)("Site Key","otter-blocks"),value:c,placeholder:(0,r.__)("Site Key","otter-blocks"),disabled:"saving"===o,onChange:e=>d(e)}),(0,l.createElement)(n.TextControl,{type:"password",label:(0,r.__)("Secret Key","otter-blocks"),value:m,placeholder:(0,r.__)("Secret Key","otter-blocks"),disabled:"saving"===o,onChange:e=>u(e)}),(0,l.createElement)("div",{className:"otter-button-group"},(0,l.createElement)(n.Button,{variant:"secondary",isSecondary:!0,disabled:"saving"===o,onClick:()=>{t("themeisle_google_captcha_api_site_key",c),t("themeisle_google_captcha_api_secret_key",m)}},(0,r.__)("Save","otter-blocks")),(0,l.createElement)(n.ExternalLink,{href:"https://www.google.com/recaptcha/admin"},(0,r.__)("Get API Key","otter-blocks")))))),(0,l.createElement)(n.PanelBody,{title:(0,r.__)("Stripe","otter-blocks"),initialOpen:!1},(0,l.createElement)(n.PanelRow,null,(0,l.createElement)(n.BaseControl,{label:(0,r.__)("Stripe API","otter-blocks"),help:(0,r.__)("In order to use Stripe block, you need to use Stripe API. You can also use Restricted keys.","otter-blocks"),id:"otter-options-stripe-api",className:"otter-button-field"},(0,l.createElement)(n.TextControl,{type:"password",label:(0,r.__)("Secret Key","otter-blocks"),value:_,placeholder:(0,r.__)("Stripe API Key","otter-blocks"),disabled:"saving"===o,onChange:e=>b(e)}),(0,l.createElement)("div",{className:"otter-button-group"},(0,l.createElement)(n.Button,{variant:"secondary",isSecondary:!0,disabled:"saving"===o,onClick:()=>t("themeisle_stripe_api_key",_)},(0,r.__)("Save","otter-blocks")),(0,l.createElement)(n.ExternalLink,{href:"https://stripe.com/docs/keys"},(0,r.__)("Get API Key","otter-blocks")),(0,l.createElement)(n.ExternalLink,{href:"https://docs.themeisle.com/article/1688-integrations-related-blocks#stripe-checkout"},(0,r.__)("More Info","otter-blocks")))))),(0,l.createElement)(n.PanelBody,{title:(0,r.__)("OpenAI","otter-blocks"),initialOpen:!1},(0,l.createElement)(n.PanelRow,null,(0,l.createElement)(n.BaseControl,{label:(0,r.__)("Open API","otter-blocks"),help:(0,r.__)("In order to use AI Block, you need to use OpenAI API.","otter-blocks"),id:"otter-options-stripe-api",className:"otter-button-field"},(0,l.createElement)(n.TextControl,{type:"password",label:(0,r.__)("Secret Key","otter-blocks"),value:p,placeholder:(0,r.__)("OpenAI API Key","otter-blocks"),disabled:"saving"===o,onChange:e=>k(e)}),(0,l.createElement)("div",{className:"otter-button-group"},(0,l.createElement)(n.Button,{variant:"secondary",isSecondary:!0,disabled:"saving"===o,onClick:()=>t("themeisle_open_ai_api_key",p)},(0,r.__)("Save","otter-blocks")),(0,l.createElement)(n.ExternalLink,{href:"https://platform.openai.com/account/api-keys"},(0,r.__)("Get API Key","otter-blocks")),(0,l.createElement)(n.ExternalLink,{href:"https://docs.themeisle.com/article/1916-how-to-generate-an-openai-api-key"},(0,r.__)("More Info","otter-blocks")))))))};const M=`${window.otterObj.assetsPath}icons/finish-feedback.svg`;var D=()=>{const[e,t]=(0,l.useState)("notSubmitted");return(0,l.createElement)(B,{title:"submitted"!==e&&(0,r.__)("What's one thing you need in Otter Blocks?","otter-blocks")},"submitted"!==e?(0,l.createElement)(u,{source:"dashboard",status:e,setStatus:t}):(0,l.createElement)("div",{className:"finish-feedback"},(0,l.createElement)("img",{src:M}),(0,l.createElement)("p",{className:"f-title"},(0,r.__)("Thank you for your feedback","otter-blocks")),(0,l.createElement)("p",{className:"f-description"},(0,r.__)("Your feedback is highly appreciated and will help us to improve Otter Blocks.","otter-blocks"))))},G=function({icon:e,size:t=24,...o}){return(0,l.cloneElement)(e,{width:t,height:t,...o})},K=window.wp.primitives,W=(0,l.createElement)(K.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},(0,l.createElement)(K.Path,{d:"M12 13.06l3.712 3.713 1.061-1.06L13.061 12l3.712-3.712-1.06-1.06L12 10.938 8.288 7.227l-1.061 1.06L10.939 12l-3.712 3.712 1.06 1.061L12 13.061z"})),V=({slug:e,className:t,children:o})=>{const a=`otter-${e}-dismissed`,[r,i]=(0,l.useState)(localStorage.getItem(a));return r?null:(0,l.createElement)(n.PanelBody,{className:s()("notice-card",t)},(0,l.createElement)(n.Button,{className:"dismiss",onClick:()=>{localStorage.setItem(a,"true"),i("true")}},(0,l.createElement)(G,{icon:W})),o)};let U=(0,r.sprintf)((0,r.__)("%s Days","otter-blocks"),Number(window.otterObj.daysLeft));1===Number(window.otterObj.daysLeft)&&(U=(0,r.__)("Less than 24 hours","otter-blocks"));var z=({currentTab:e,setTab:t})=>{const[o,a,s]=S(),c=(0,i.applyFilters)("otter.feedback","","dashboard",(0,r.__)("Share your Feedback","otter-blocks"),"secondary");return"loading"===s?(0,l.createElement)(n.Placeholder,null,(0,l.createElement)(n.Spinner,null)):(0,l.createElement)(l.Fragment,null,(0,l.createElement)("div",{className:`otter-main is-${e}`},"dashboard"===e&&window.otterObj.showFeedbackNotice&&(0,l.createElement)(V,{slug:"feedback"},(0,l.createElement)("img",{src:window.otterObj.assetsPath+"images/dashboard-feedback.png",style:{maxWidth:"100%",objectFit:"cover"}}),(0,l.createElement)("div",{className:"notice-text"},(0,l.createElement)("h3",null,(0,r.__)("What's the one thing you need in Otter Blocks?","otter-blocks")),(0,l.createElement)("span",null,(0,r.__)("We're always looking for suggestions to further improve Otter Blocks and your feedback can help us do that.","otter-blocks"))),(0,l.createElement)("span",null,c)),(0,l.createElement)((()=>{switch(e){case"integrations":return(0,l.createElement)("div",{className:"otter-left"},(0,l.createElement)(R,null));case"upsell":return(0,l.createElement)(j,null);case"feedback":return(0,l.createElement)(D,null);default:return(0,l.createElement)("div",{className:"otter-left"},(0,l.createElement)(A,{status:s,getOption:o,updateOption:a}))}}),null),"upsell"!==e&&(0,l.createElement)("div",{className:"otter-right"},(0,l.createElement)(x,{setTab:t}))))},H=()=>(0,l.createElement)("footer",{className:"otter-footer"},(0,l.createElement)("div",{className:"otter-container"},(0,r.__)("No otters were harmed during the making of this plugin.","otter-blocks")));void 0===window.otterUtils&&(window.otterUtils={}),window.otterUtils.useSettings=S,(0,l.render)((0,l.createElement)((()=>{const[e,t]=(0,l.useState)("dashboard");return(0,l.createElement)(l.Fragment,null,void 0!==wp.notices.store&&(0,l.createElement)(E,null),(0,l.createElement)(v,{isActive:e,setActive:t}),(0,l.createElement)(z,{currentTab:e,setTab:t}),(0,l.createElement)(H,null))}),null),document.getElementById("otter"))},184:function(e,t){var o;!function(){"use strict";var l={}.hasOwnProperty;function a(){for(var e=[],t=0;t<arguments.length;t++){var o=arguments[t];if(o){var s=typeof o;if("string"===s||"number"===s)e.push(o);else if(Array.isArray(o)){if(o.length){var n=a.apply(null,o);n&&e.push(n)}}else if("object"===s){if(o.toString!==Object.prototype.toString&&!o.toString.toString().includes("[native code]")){e.push(o.toString());continue}for(var r in o)l.call(o,r)&&o[r]&&e.push(r)}}}return e.join(" ")}e.exports?(a.default=a,e.exports=a):void 0===(o=function(){return a}.apply(t,[]))||(e.exports=o)}()}},o={};function l(e){var a=o[e];if(void 0!==a)return a.exports;var s=o[e]={exports:{}};return t[e](s,s.exports,l),s.exports}l.m=t,e=[],l.O=function(t,o,a,s){if(!o){var n=1/0;for(d=0;d<e.length;d++){o=e[d][0],a=e[d][1],s=e[d][2];for(var r=!0,i=0;i<o.length;i++)(!1&s||n>=s)&&Object.keys(l.O).every((function(e){return l.O[e](o[i])}))?o.splice(i--,1):(r=!1,s<n&&(n=s));if(r){e.splice(d--,1);var c=a();void 0!==c&&(t=c)}}return t}s=s||0;for(var d=e.length;d>0&&e[d-1][2]>s;d--)e[d]=e[d-1];e[d]=[o,a,s]},l.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return l.d(t,{a:t}),t},l.d=function(e,t){for(var o in t)l.o(t,o)&&!l.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:t[o]})},l.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},function(){var e={826:0,431:0};l.O.j=function(t){return 0===e[t]};var t=function(t,o){var a,s,n=o[0],r=o[1],i=o[2],c=0;if(n.some((function(t){return 0!==e[t]}))){for(a in r)l.o(r,a)&&(l.m[a]=r[a]);if(i)var d=i(l)}for(t&&t(o);c<n.length;c++)s=n[c],l.o(e,s)&&e[s]&&e[s][0](),e[s]=0;return l.O(d)},o=self.webpackChunkotter_blocks=self.webpackChunkotter_blocks||[];o.forEach(t.bind(null,0)),o.push=t.bind(null,o.push.bind(o))}();var a=l.O(void 0,[431],(function(){return l(477)}));a=l.O(a)}();