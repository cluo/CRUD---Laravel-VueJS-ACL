<template>
    <div class="container">
        <div class="row">
            <ul class="thumbnails">
                <estados></estados>    
            </ul>
        </div>
    </div>
</template>
<script>
    import estados from '../estados/estados.vue'
    export default {
        components: {
            estados
        }
    }
</script>