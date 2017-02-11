<template>
	<div>
		<img style="width: 100%" src="https://placeholdit.imgix.net/~text?txtsize=33&txt=ESTADO&w=1200&h=300">

		<div class="container">
			<div class="row">
		            <div class="row">
		                <div class="col-md-12 text-center">
		                    <div class="box">
		                        <div class="box-content">
		                            <h1 class="tag-title"></h1>
		                            <hr />
		                            <p>Olá, essa página é referente ao estado {{ estado.estado_nome }} - {{ estado.estado_sigla }}. A página é somente para visualização no Front-end utilizando VueJS!</p>
		                            <p>{{ estado.estado_historico }}</p>
		                            <br />
		                            <div class="col-md-4 col-md-offset-4">
		                            <a href="/#" class="btn btn-block btn-primary">Voltar</a>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>           
		        </div>
			</div>
		</div>
	</div>
</template>
<script>
	export default {
		data(){
			return {
				estado: []
			}
		}, 
		created(){
			console.log(this.estado);
			this.getEstado();
		},
		methods: {
			getEstado(){
				this.$http.get('/api/estado/' + this.$route.params.id).then(response => {
					this.estado = response.data.estado;
				})
			}
		}
	}
</script>
<style type="text/css">
	.thumbnails {
		margin-top: 40px;
	}
</style>