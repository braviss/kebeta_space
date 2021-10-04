<template>
  <div>
     <nav class="navbar navbar-dark bg-dark navbar-expand-lg border-bottom sticky-top">
       <div class="container">
         <Link class="navbar-brand me-4" :href="route('main')">
         <jet-application-logo />
         </Link>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav me-auto">
             <li class="nav-item">
             <Link class="nav-link font-weight-bolder" :href="route('article.index')">
               <div :class="isUrl('article.index') ? 'active text-white p-2' : 'p-2 text-indigo-300 group-hover:text-white'">Статьи</div>
             </link>
             </li>
             <li class="nav-item">
             <Link class="nav-link font-weight-bolder" :href="route('users')">
               <div :class="isUrl('users') ? 'active text-white p-2' : 'p-2 text-indigo-300 group-hover:text-white'">Пользователи</div>
             </link>
             </li>
             <li class="nav-item">
             <Link class="nav-link font-weight-bolder" :href="route('logs')">
               <div :class="isUrl('logs') ? 'active text-white p-2' : 'p-2 text-indigo-300 group-hover:text-white'">Логи</div>
             </link>
             </li>
           </ul>
         </div>
       </div>
     </nav>
  </div>
</template>
<script>
import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'
import JetBanner from '@/Jetstream/Banner.vue'
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
import JetDropdown from '@/Jetstream/Dropdown.vue'
import JetDropdownLink from '@/Jetstream/DropdownLink.vue'
import JetNavLink from '@/Jetstream/NavLink.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';


export default {
  components: {
    JetApplicationLogo,
    JetBanner,
    JetApplicationMark,
    JetDropdown,
    JetDropdownLink,
    JetNavLink,
    Head,
    Link,

  },

  data() {
    return {
      showingNavigationDropdown: false,
    }
  },

  methods: {
    isUrl(...urls) {
      let currentUrl = this.$page.url.substr(1)
      if (urls[0] === '') {
        return currentUrl === ''
      }
      return urls.filter(url => currentUrl.startsWith(url)).length
    },
    switchToTeam(team) {
      this.$inertia.put(route('current-team.update'), {
        'team_id': team.id
      }, {
        preserveState: false
      })
    },
    logout() {
      this.$inertia.post(route('logout'));
    },

  },
  computed: {
    path() {
      return window.location.pathname
    }
  }

}
</script>
