<template>
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header">Pensamientos</div>
                <div class="card-body">
                    <form v-on:submit.prevent="newpensamiento()">
                        <div class="form-group">
                            <label>Ahora estoy pensando en:</label>
                            <input type="text" class="form-control" name="" v-model="descripcion">
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar pensamiento</button>
                    </form>
                </div>
            </div>
</template>

<script>
    export default {
    	data(){

    		return {
    			descripcion: ""
    		}
    	},

        mounted() {
            console.log('Component2 mounted.')
        },

        methods:{
        	newpensamiento(){

                const parametros = {

                    descripcion: this.descripcion
                };
                
                this.descripcion = "";
                axios.post('/pensamientos',parametros).then((respuesta)=>{

                    const pensamiento = respuesta.data;
                    this.$emit('nuevo',pensamiento);
                });


        	}
        }
    }
</script>
