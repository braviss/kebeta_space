<template>
  <admin-layout title="Логи">
    <template #header>
      <h2 class="h4 font-weight-bold">
        Логи
      </h2>
    </template>


  </admin-layout>
</template>

<script>
import { defineComponent } from "vue"
import AdminLayout from "@/Layouts/AdminLayout.vue"


export default defineComponent({
  components: {
    AdminLayout
  }
});
</script>
