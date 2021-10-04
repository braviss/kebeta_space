<template>
  <admin-layout title="Панель управления">
    <section class="content">
            <div class="row">
              <div class="col-lg-3 col-6">
                <div class="small-box bg-info p-2 rounded">
                  <div class="inner">
                    <h3>{{ countUser }}</h3>
                    <p>Пользователя</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="/admin/users" class="small-box-footer">Смотреть всех <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="small-box bg-info p-2 rounded">
                  <div class="inner">
                    <h3>Не работает</h3>
                    <p>Постов</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="/admin" class="small-box-footer">Смотреть все <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="small-box bg-info p-2 rounded">
                  <div class="inner">
                    <h3>Не работает</h3>
                    <p>Еще что-то</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="/admin" class="small-box-footer">Смотреть все <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="small-box bg-info p-2 rounded">
                  <div class="inner">
                    <h3>Не работает</h3>
                    <p>Еще что-то</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="/admin" class="small-box-footer">Смотреть все <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
            <div class="row">
            </div>
        </section>



  </admin-layout>
</template>

<script>
import { defineComponent } from "vue"
import AdminLayout from "@/Layouts/AdminLayout.vue"


export default defineComponent({
  components: {
    AdminLayout
  },
  props: {
  countUser: Object,
  },
});
</script>
