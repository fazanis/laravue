<template>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
                <button @click="update" class="btn btn-info" v-if="!is_refresh">Обновить - {{id}}</button>
                <span class="badge badge-primary mb-1" v-if="is_refresh">Обновление</span>
                <div class="box-body">
               <table id="example2" class="table table-bordered table-hover">
               <thead>
                   <tr>
                       <th>Наименование</th>
                       <th>URL</th>
                       <th>Действие</th>
                   </tr>
                   </thead>
                   <tbody>
                   <tr v-for="url in urldata">
                        <td>{{url.title}}</td>
                        <td>{{url.text}}</td>
                        <td>{{url.id}}</td>
                   </tr>
                   </tbody>
               </table>
               </div>
            </div>
            </div>
            </div>
            </section>
        </div>
    </div>
</template>

<script>
    export default {
        data: function(){
            return{
                urldata:[],
                is_refresh: false,
                id:0
            }
        },
        mounted() {
            this.update()
        },
        methods:{
            update: function () {
                this.is_refresh = true;
                axios.get('/getjson').then((response)=>{
                    this.urldata = response.data;
                    this.is_refresh = false;
                    this.id++
                });
            }
        }
    }
</script>
