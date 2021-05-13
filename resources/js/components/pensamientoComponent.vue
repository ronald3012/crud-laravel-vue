<template>
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header">Publicado en {{pensamiento.created_at}}</div>

                <div class="card-body">

                   <input v-if="modoEdicion"  type="text" name="" class="form-control" v-model="pensamiento.descripcion">

                   <p v-else>{{pensamiento.descripcion}}</p>


                </div>
                <div class="panel-footer p-2">
                    <button v-if="modoEdicion" class="btn btn-success" v-on:click="actualizarPensamiento">
                        Guardar cambios
                    </button>
                    <button v-else class="btn btn-primary" v-on:click="editarPensamiento">
                        editar
                    </button>
                    <button class="btn btn-danger" v-on:click="eliminarPensamiento">
                        Eliminar
                    </button>
                </div>
            </div>
</template>

<script>
    export default {

        props:['pensamiento'],

        data(){
            return {
                modoEdicion: false
            }
        },

        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            eliminarPensamiento(){

                axios.delete('/pensamientos/'+this.pensamiento.id).then(()=>{

                     this.$emit("eliminar")
                });

            },
            editarPensamiento(){

                this.modoEdicion = true;

            },
            actualizarPensamiento(){

                const parametros = {
                    descripcion: this.pensamiento.descripcion
                }
                axios.put('/pensamientos/'+this.pensamiento.id, parametros).then((respuesta)=>{

                        this.modoEdicion = false;

                        const pensamiento = respuesta.data;

                        this.$emit("actualizar", pensamiento);


                })


            }
        }
    }
</script>
