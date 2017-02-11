<template>
    <div>
        <headerComponent></headerComponent>

        <transition name="fade" mode="out-in">
            <router-view></router-view>
        </transition>
    </div>
</template>
v
<script>
    import headerComponent from './header.vue'
    export default{
        data(){
            return{}
        },
        components: {
            headerComponent
        }
    }
</script>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
        opacity: 0
    }
</style>