<template>
	<div>
		<div class="container">
			<div style="margin-bottom: 20px; margin-top: 20px;">
		        <!-- Button trigger modal -->
		        <button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModal">
		            Criar estado
		        </button>
	        </div>
	        <div v-if="!this.admin" class="alert alert-info">
	        	<p>Você está logado como Autor, não poderá deletar e alterar nenhum estado, somente adicionar!</p>
	        </div>
	        <div v-else class="alert alert-success">
	        	<p>Você está logado como Admin, sinta-se livre em nosso sistema!</p>
	        </div>
			<div class="panel panel-primary filterable">
	            <div class="panel-heading">
	                <h3 class="panel-title">Estados</h3>
	            </div>
	            <div class="panel-body">
		        	<estado v-for="estado in estados" v-bind:estado="estado" v-on:deletar-estado-post="deletarEstado" v-on:update-post="getEstados"></estado>
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Adicionar </h4>
                </div>
                <form v-on:submit.prevent="salvarEstado" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nome do estado</label>
                            <input type="text" v-model="criarForm.estado_nome" placeholder="Nome do estado" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Sigla do estado</label>
                            <input type="text" v-model="criarForm.estado_sigla" placeholder="Sliga do estado" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Historico do estado</label>
                            <textarea v-model="criarForm.estado_historico" cols="30" rows="10" id="editor" class="form-control" placeholder="Conteúdo histórico do estado"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
	</div>
</template>
<script>

    import estado from './estado.vue'

	export default {

		data(){
			return {
				estados: [],
				estado: [],
				criarForm: {
					'estado_nome': '',
					'estado_sigla': '',
					'estado_historico': ''
				},
				admin: ''
				
			}
		},
		created(){
			this.getEstados();
				if(document.querySelector('#admin').getAttribute('content') == "1"){
					this.admin = 1;
				}
		},
		methods: {
			getEstados(){
				this.$http.get('/api/estados').then(response => {
					this.estados = response.data.estados;
				});
			},
			salvarEstado(){
				this.$http.post('/api/estados/criar', this.criarForm).then(response => {
					console.log();
                    if(response.data.permissao){
                    	$.notify("Você não pode criar devido a sua permissão!", "error");
                    } else {
                    	if(response.data.errors){
							$.notify("Existe campos em brancos, preencha todos!", "info");
                    	} else {
	                    	this.estados.push(response.data.estado);
							this.criarForm = {estado_nome: '', estado_sigla: '', estado_historico: ''};
							$('#myModal').modal('hide');
							$.notify("Estado salvo com sucesso!", "success");
                    	}
                    }
				});
			},
            deletarEstado(estado){
                this.$http.delete('/api/estado/deletar/' + estado.id).then(response => {
                	if(response.data.permissao){
                    	$.notify("Você não pode criar devido a sua permissão!", "error");
                    } else {
	                    let index = this.estados.indexOf(estado);
	                    this.estados.splice(index, 1);
	                    $.notify("Estado apagado com sucesso!", "success");
	                }
                });
            }
		},
		components: {
			estado
		}
	}
</script>
<style type="text/css">
	.crud-table {
		margin-top: 40px;
	}
</style>