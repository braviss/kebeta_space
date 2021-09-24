<template>
  <div>

     <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
       <div class="container">

         <!-- Logo -->
         <Link class="navbar-brand me-4" :href="route('main')">
         <jet-application-logo />
         </Link>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>


         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <!-- Left Side Of Navbar -->
           <ul class="navbar-nav me-auto">
            <!-- <jet-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
               Dashboard
             </jet-nav-link> -->
             <li class="nav-item">
             <Link class="nav-link font-weight-bolder" :href="route('dashboard')">
               <div :class="isUrl('dashboard') ? 'active text-black p-2' : 'p-2 text-indigo-300 group-hover:text-white'">Статьи</div>
             </link>
             </li>
             <li class="nav-item">
             <Link class="nav-link font-weight-bolder" :href="route('dashboard')">
               <div :class="isUrl('dashboard') ? 'active text-black p-2' : 'p-2 text-indigo-300 group-hover:text-white'">Контакты</div>
             </link>
             </li>
             <li class="nav-item">
             <Link class="nav-link font-weight-bolder" :href="route('dashboard')">
               <div :class="isUrl('dashboard') ? 'active text-black p-2' : 'p-2 text-indigo-300 group-hover:text-white'">Аксесуары</div>
             </link>
             </li>
             <li class="nav-item">
             <Link class="nav-link font-weight-bolder" :href="route('dashboard')">
               <div :class="isUrl('dashboard') ? 'active text-black p-2' : 'p-2 text-indigo-300 group-hover:text-white'">О чём сайт?</div>
             </link>
             </li>

           </ul>

           <!-- Right Side Of Navbar -->

           <ul v-if="$page.props.user" class="navbar-nav align-items-baseline">
             <!-- Team Management -->
             <jet-dropdown id="teamManagementDropdown" v-if="$page.props.jetstream.hasTeamFeatures">
               <template #trigger>
                 {{ $page.props.user.current_team.name }}

                 <svg class="me-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                   <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                 </svg>
               </template>

               <template #content>
                 <!-- Team Management -->
                 <template v-if="$page.props.jetstream.hasTeamFeatures">
                   <h6 class="dropdown-header">
                     Manage Team
                   </h6>

                   <!-- Team Settings -->
                   <jet-dropdown-link :href="route('teams.show', $page.props.user.current_team)">
                     Team Settings
                   </jet-dropdown-link>

                   <jet-dropdown-link :href="route('teams.create')" v-if="$page.props.jetstream.canCreateTeams">
                     Create New Team
                   </jet-dropdown-link>

                   <hr class="dropdown-divider">

                   <!-- Team Switcher -->
                   <h6 class="dropdown-header">
                     Switch Teams
                   </h6>

                   <template v-for="team in $page.props.user.all_teams" :key="team.id">
                     <form @submit.prevent="switchToTeam(team)">
                       <jet-dropdown-link as="button">
                         <div class="d-flex">
                           <svg v-if="team.id == $page.props.user.current_team_id" class="me-1 text-success" width="20" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                             <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                           </svg>
                           <span class="text-truncate" style="width: 12rem;">{{ team.name }}</span>
                         </div>
                       </jet-dropdown-link>
                     </form>
                   </template>
                 </template>
               </template>
             </jet-dropdown>

             <!-- Authentication Links -->
             <jet-dropdown id="settingsDropdown">
               <template #trigger>
                 <img v-if="$page.props.jetstream.managesProfilePhotos" class="rounded-circle" width="48" height="48" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />

                 <span v-else>
                   {{ $page.props.user.name }}
                   <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                     <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                   </svg>
                 </span>
               </template>

               <template #content>
                 <!-- Account Management -->
                 <h6 class="dropdown-header small text-muted">
                   Manage Account
                 </h6>

                 <jet-dropdown-link :href="route('profile.show')">
                   Profile
                 </jet-dropdown-link>

                 <jet-dropdown-link :href="route('api-tokens.index')" v-if="$page.props.jetstream.hasApiFeatures">
                   API Tokens
                 </jet-dropdown-link>

                 <hr class="dropdown-divider">

                 <!-- Authentication -->
                 <form @submit.prevent="logout">
                   <jet-dropdown-link as="button">
                     Log out
                   </jet-dropdown-link>
                 </form>
               </template>
             </jet-dropdown>
           </ul>

           <ul v-else class="navbar-nav align-items-baseline">
             <li class="nav-item">
             <Link class="nav-link font-weight-bolder" :href="route('login')">
               <div class="p-2 text-indigo-300 group-hover:text-white">Войти</div>
             </link>
             </li>

             <li class="nav-item">
             <Link class="nav-link font-weight-bolder" :href="route('register')">
               <div class="p-2 text-indigo-300 group-hover:text-white">Регистрация</div>
             </link>
             </li>
           </ul>
         </div>
       </div>
     </nav>

  <!--div class="mb-4">
        <Link v-for="category in categorys"  class="flex items-center group py-3" :href="route('organizations')">
          <icon name="office" class="w-4 h-4 mr-2" :class="isUrl('organizations') ? 'fill-white' : 'fill-indigo-400 group-hover:fill-white'" />
          <div :class="isUrl('organizations') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">{{ category.name }}</div>
        </link>
      </div> -->


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
