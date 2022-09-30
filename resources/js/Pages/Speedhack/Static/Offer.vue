<template>
    <welcome-layout>
        <header-white></header-white>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div v-html="$page.props.sets['offer']" class="offer"></div>
                </div>
            </div>
        </div>
    </welcome-layout>
</template>
<script>
import HeaderWhite from '@/Speedhack/Components/Details/HeaderWhite';

export default {
    props: {},
    components: {
        HeaderWhite,
    },
    data() {
        return {
        }
    },
}
</script>
<style scoped>
    .offer{
        padding: 60px 0px;
    }
    .ql-align-center{
        text-align: center;
    }
</style>
