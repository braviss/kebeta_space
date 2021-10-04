   <template>
     <admin-layout title="Статьи">
       <template #header>
         <h2 class="h4 font-weight-bold">
           Статьи
         </h2>
       </template>




              <button class="btn btn-sm btn-primary" @click="openModal()">Add New</button>

              <table class="table w-full">
                <thead>
                  <tr>
                    <th>Заглавие</th>
                    <th>Действие</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="row in data">
                    <td>{{ row.title }}</td>
                    <td width="130">
                        <button @click="edit(row)" class="btn btn-sm btn-primary">Edit</button>
                        <button @click="deleteRow(row)" class="btn btn-sm btn-danger">Del</button>
                    </td>
                  </tr>
                </tbody>
              </table>


              <div class="modal" v-bind:class="{ 'd-block': isActive }">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title">New Contact</h4>
                          </div>
                          <div class="modal-body">
                              <div class="form-group">
                                  <label for="name">Заглавие поста</label>
                                  <input class="form-control" required id="title" v-model="form.title"/>
                              </div>
                              <div class="form-group">
                                  <label for="phone">Описание</label>
                                  <input class="form-control" required id="description" v-model="form.description"/>
                              </div>
                              <div class="form-group">
                                  <label for="phone">Текст</label>
                                  <textarea class="form-control" required id="text" v-model="form.text"/>
                              </div>
                              <div class="form-group">
                                  <label for="phone">Изображение</label>
                                  <input class="form-control" required id="image_path" v-model="form.image_path"/>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" @click="closeModal()">Close</button>
                              <button type="submit" class="btn btn-primary" v-show="!editMode" @click="save(form)">Save
                              </button>
                              <button type="submit" class="btn btn-primary" v-show="editMode" @click="update(form)">Update
                              </button>
                          </div>
                      </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->




     </admin-layout>
   </template>

   <script>
   import { defineComponent } from "vue"
   import AdminLayout from "@/Layouts/AdminLayout.vue"

   export default {
        props: ['data'],
        data() {
            return {
                isActive: false,
                editMode: false,
                form: {
                    title: null,
                    description: null,
                    text: null,
                    image_path: null,

                },
            }
        },
        components: {
          AdminLayout
        },
        methods: {
            openModal: function () {
                this.isActive = true;
            },
            closeModal: function () {
                this.isActive = false;
                this.reset();
                this.editMode=false;
            },
            reset: function () {
                this.form = {
                  title: null,
                  description: null,
                  text: null,
                  image_path: null,
                }
            },
            save: function (data) {
                this.$inertia.post('/admin/article', data)
                this.reset();
                this.closeModal();
                this.editMode = false;
            },
            edit: function (data) {
                this.form = Object.assign({}, data);
                this.editMode = true;
                this.openModal();
            },
            update: function (data) {
                if (!confirm('Sure')) return;
                data._method = 'PUT';
                this.$inertia.post('/admin/article/' + data.id, data)
                this.reset();
                this.closeModal();
            },
            deleteRow: function (data) {
                if (!confirm('Sure')) return;
                data._method = 'DELETE';
                this.$inertia.post('/admin/article/' + data.id, data)
                this.reset();
                this.closeModal();
            }
        }
    }
   </script>
