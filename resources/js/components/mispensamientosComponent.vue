<template>
    <div class="row justify-content-center">
        <div class="col-md-8">

            <formcomponent @nuevo="agregarpensamiento"></formcomponent>

            <pensamiento-component v-for="(pensamiento, index) in pensamientos"
             :key="pensamientos.id"
             :pensamiento="pensamiento"
             @actualizar="actualizarPensamiento(index, ...arguments)"
             @eliminar="eliminarpensamiento(index)"
             >
             </pensamiento-component>

        </div>

    </div>
</template>

<script>
    export default {
        data(){
            return {
                pensamientos: []
            }
        },

        mounted() {
            axios.get('/pensamientos').then((respuesta)=>{

                this.pensamientos = respuesta.data;
            });
        },

        methods:{
            agregarpensamiento(pensamiento){

                this.pensamientos.push(pensamiento);

            },

            actualizarPensamiento(index, pensamiento){
                this.pensamientos[index] = pensamiento;
            },

            eliminarpensamiento(index){
                this.pensamientos.splice(index,1);
                return pensamiento;
            }
        }
    }
</script>
