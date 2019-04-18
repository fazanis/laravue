<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <table>
                   <tr>
                       <th>Наименование</th>
                       <th>URL</th>
                   </tr>
                   <tr v-for="url in urldata">
                        <td>{{url.title}}</td>
                        <td>{{url.url}}</td>
                   </tr>
               </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:[
            'urldata'
        ],
        mounted() {
            this.update()
        },
        methods:{
            update: function () {
                console.log(this.data)
            }
        }
    }
</script>
