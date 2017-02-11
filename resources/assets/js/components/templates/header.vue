<template>
    <div>
        <nav class="navbar navbar-default" role="navigation">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <div class="navbar-brand navbar-brand-centered">CRUD Estados</div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-brand-centered">
              <ul class="nav navbar-nav">
                <li><a href="/#">Home</a></li>
                <li><a href="/#/admin/estados" v-if="varisLoggedIn">Administração</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown" v-if="varisLoggedIn">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Minha conta <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="/#/admin/estados">Painel</a></li>
                    </ul>
                  </li>      
                <li v-else><a href="/login">Login</a></li>
              </ul>
            </div>
          </div>
        </nav>
    </div>
</template>

<script>
    export default{
        data(){
            return{
                varisLoggedId: $("meta[name=login-user-id]").attr('content'),
                varisLoggedIn: $("meta[name=login-status]").attr('content')
            }
        },
        created(){

        },
        methods(){

        }
    }
</script>

<style type="text/css">
    .navbar {
      margin-bottom: 0;
    }
    .navbar-brand-centered {
        position: absolute;
        left: 50%;
        display: block;
        width: 160px;
        text-align: center;
        background-color: transparent;
    }
    .navbar>.container .navbar-brand-centered, 
    .navbar>.container-fluid .navbar-brand-centered {
        margin-left: -80px;
    }

</style>