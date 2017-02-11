<template>
		<div class="panel panel-default">

                <div class="panel-heading"> 
                    <span v-if="!editar">{{ estado.estado_nome }}</span>
                    <span v-if="editar"><input type="text" v-model="editarForm.estado_nome" class="form-control"></span>
                </div>

                <div class="panel-heading"> 
                    <span v-if="!editar">{{ estado.estado_sigla }}</span>
                    <span v-if="editar"><input type="text" v-model="editarForm.estado_sigla" class="form-control"></span>
                </div>

                <div class="panel-heading"> 
                    <span v-if="!editar" v-html="estado.estado_historico"></span>
                    <span v-if="editar">
                        <textarea v-model="editarForm.estado_historico" cols="30" rows="10" id="editor" class="form-control"></textarea>
                    </span>
                </div>

                <div class="panel-footer">
                    <button class="btn btn-danger" v-on:click="$emit('deletar-estado-post', estado)" v-if="!editar">Deletar estado</button> 
                    <button class="btn btn-info" v-on:click="editarEstado" v-if="!editar">Editar estado</button>
                    <button class="btn btn-info" v-on:click="cancelarEdicao" v-if="editar">Cancelar edição</button>
                    <button class="btn btn-success" v-on:click="editarEstadoPost(estado, editarForm)" v-if="editar">Salvar estado</button>
                </div>
            </div>
</template>
<script>
    export default{
        props:['estado'],
        data(){
            return {
                editar: false,
                editarForm:{
                    estado_nome: '',
                    estado_historico: '',
                    estado_historico: '',
                    estado_autor: $("meta[name=login-user-id]").attr('content')
                },
                varisLoggedId: $("meta[name=login-user-id]").attr('content')

            }
        },
        created(){

            // console.log(tinymce.get('editor')); 
        },
        methods: {
            editarEstado(){
                this.editar = true;
                this.editarForm.estado_nome = this.estado.estado_nome;
                this.editarForm.estado_historico = this.estado.estado_historico;
                this.editarForm.estado_sigla = this.estado.estado_sigla;
            },
            cancelarEdicao(){
                this.editar = false;
                this.editarForm.estado_nome = '';
                this.editarForm.estado_historico = '';
                this.editarForm.estado_sigla = '';
            },
            editarEstadoPost(antigoEstado, editarForm){
                this.$http.patch('/api/estado/editar/' + antigoEstado.id, editarForm).then(response => {
                    console.log();
                    if(response.data.permissao){
                        $.notify("Você não pode criar devido a sua permissão!", "error");
                    } else {
                        if(response.data.errors){
                            $.notify("Existe campos em brancos, preencha todos!", "info");
                        } else {
                        $.notify("Salvo com sucesso a atualização!", "success");
                        this.$emit('update-post');
                        this.cancelarEdicao();
                        console.log(antigoEstado);
                        }
                    }
                });
            }
        }
    }
</script>
