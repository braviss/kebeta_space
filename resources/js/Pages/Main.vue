<template>
  <app-layout title="Main">
    <template #header>
      <h2 class="h4 font-weight-bold">
        Main
      </h2>
    </template>
    <div>
      <b-tabs content-class="mt-3">
        <b-tab title="First" active><p>I'm the first tab</p></b-tab>
        <b-tab title="Second"><p>I'm the second tab</p></b-tab>
        <b-tab title="Disabled" disabled><p>I'm a disabled tab!</p></b-tab>
      </b-tabs>
    </div>

  </app-layout>
</template>

<script>
import { defineComponent } from "vue"
import AppLayout from "@/Layouts/AppLayout.vue"


export default {

       components: {AppLayout},
       methods: {

       },

   }
</script>
