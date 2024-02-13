import{_ as c}from"./AppLayout-40077d8b.js";import p from"./DeleteUserForm-64a14b7a.js";import l from"./LogoutOtherBrowserSessionsForm-a5acb734.js";import{S as s}from"./SectionBorder-2d729a9f.js";import f from"./TwoFactorAuthenticationForm-82f8e4a4.js";import u from"./UpdatePasswordForm-9365247a.js";import _ from"./UpdateProfileInformationForm-9ef21a99.js";import{o,c as d,w as n,a as i,e as r,b as t,f as a,F as h}from"./app-a2a19cf5.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./DialogModal-89de6970.js";import"./SectionTitle-c495d218.js";import"./DangerButton-930f7577.js";import"./TextInput-11b83ad1.js";import"./SecondaryButton-0256f31e.js";import"./ActionMessage-bd482bca.js";import"./PrimaryButton-25be9c4b.js";import"./InputLabel-70fd184b.js";import"./FormSection-6bb836d3.js";const g=i("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Profile ",-1),$={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},w={key:0},k={key:1},y={key:2},z={__name:"Show",props:{confirmsTwoFactorAuthentication:Boolean,sessions:Array},setup(m){return(e,x)=>(o(),d(c,{title:"Profile"},{header:n(()=>[g]),default:n(()=>[i("div",null,[i("div",$,[e.$page.props.jetstream.canUpdateProfileInformation?(o(),r("div",w,[t(_,{user:e.$page.props.auth.user},null,8,["user"]),t(s)])):a("",!0),e.$page.props.jetstream.canUpdatePassword?(o(),r("div",k,[t(u,{class:"mt-10 sm:mt-0"}),t(s)])):a("",!0),e.$page.props.jetstream.canManageTwoFactorAuthentication?(o(),r("div",y,[t(f,{"requires-confirmation":m.confirmsTwoFactorAuthentication,class:"mt-10 sm:mt-0"},null,8,["requires-confirmation"]),t(s)])):a("",!0),t(l,{sessions:m.sessions,class:"mt-10 sm:mt-0"},null,8,["sessions"]),e.$page.props.jetstream.hasAccountDeletionFeatures?(o(),r(h,{key:3},[t(s),t(p,{class:"mt-10 sm:mt-0"})],64)):a("",!0)])])]),_:1}))}};export{z as default};