<template>
  <admin-layout title="Пользователи">
    <template #header>
      <h2 class="h4 font-weight-bold">
        Пользователи
      </h2>
    </template>
          <table class="table w-full">
            <thead>
              <tr>
                <th>Логин</th>
                <th>Email</th>
                <th>Статус</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in allUsers.data" :key="item.id">
                <td>{{ item.name }}</td>
                <td>{{ item.email }}</td>
                <td>{{ item.status }}</td>
              </tr>
            </tbody>
          </table>
        <!--  <Pagination class="mt-6" :links="usersList.links" /> -->
  </admin-layout>
</template>

<script>
import { defineComponent } from "vue"
import AdminLayout from "@/Layouts/AdminLayout.vue"


export default defineComponent({
  components: {
    AdminLayout,
//  Pagination
  },
  props: {
    allUsers: Object,
  },
});
</script>
