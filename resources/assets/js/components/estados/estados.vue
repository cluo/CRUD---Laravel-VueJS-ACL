<template>
	<div>
		<div class="col-md-4" v-for="estado in estados">
            <div class="thumbnail">
                <img src="http://placehold.it/320x200" alt="ALT NAME" class="img-responsive" />
                <div class="caption">
                    <h3>{{ estado.estado_nome }}</h3>
                    <p>A sigla do estado {{ estado.estado_nome }} é <strong>{{ estado.estado_sigla }}</strong></p>
                    <p align="center"><a href="#/" class="btn btn-primary btn-block" v-bind:href="'#/estado/'+estado.id">Open</a></p>
                </div>
            </div>
        </div>
	</div>
</template>
<script>
	export default {
		data(){
			return {
				estados: []
			}
		},
		created(){
			this.getEstados();
			console.log('O arquivo estado.vue foi executado!');
		},
		methods: {
			getEstados(){
				this.$http.get('/api/estados').then(response => {
					this.estados = response.data.estados;
				});
			}
		}
	}
</script>